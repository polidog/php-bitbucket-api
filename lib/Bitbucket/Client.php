<?php
namespace Bitbucket;

use Buzz\Client\Curl;
use Buzz\Client\ClientInterface;

use Bitbucket\HttpClient\HttpClientInterface;
use Bitbucket\HttpClient\HttpClient;

/**
 * @property HttpClient $httpClient Description
 */
class Client 
{

	private $options = array(
		'base_url'		=> 'https://api.bitbucket.org/1.0/',
		'user_argent'	=> 'php-bitbucket-api',
		'timeout'		=> 10,
		'api_limit'		=> 5000,
	);
	
	private $httpClient;
	
	public function __construct(HttpClientInterface $httpClient = null) {
		if (!is_null($httpClient)) {
			$this->httpClient = $httpClient;
		}
	}
	
	public function api($name) {
		switch (strtolower($name)) {
			case "user":
			case "users":
				$api = new Api\User($this);
				break;
			case "repo":
			case "repos":
			case "repository":
			case "repositories":
				$api = new Api\Repositories($this);
				break;
			case "email":
				$api = new Api\Email($this);
				break;
			case "group":
			case "groups":
				$api = new Api\Groups($this);
				break;
			case "group_privileges":
			case "group-privileges":
				$api = new Api\GroupPrivileges($this);
				break;
			default:
				throw new \InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
		} 
		
		return $api;
	}
	
	public function authenticate($username,$password) {
		if (is_null($username) || is_null($password)) {
			throw new \InvalidArgumentException('You need to specify authentication method!');
		}
		$this->getHttpClient()->authenticate($username, $password);
		return $this;
	}
	
	
	public function base64Authenticate($base64) {
		if (is_null($base64)) {
			throw new \InvalidArgumentException('You need to specify authentication method!');
		}
		$this->getHttpClient()->base64Authenticate($base64);
		return $this;
	}
	
	/**
	 * 
	 * @return HttpClient\HttpClient
	 */
	public function getHttpClient() {
		if (is_null($this->httpClient)) {
			$this->httpClient = new HttpClient($this->options);
		}
		return $this->httpClient;
	}
	
	public function setHttpClient(HttpClientInterface $httpClient) {
		$this->httpClient = $httpClient;
	}
	
	public function clearHeaders() {
		$this->getHttpClient()->clearHeaders();
		return $this;
	}
	
	public function setHttpHeaders(array $headers) {
		$this->getHttpClient()->setHeaders($headers);
		return $this;
	}
	
	public function getOption($key) {
		if (is_null($key)) {
			throw new InvalidArgumentException('Undefined option called: null');
		}
		
		if (!isset($this->options[$key])) {
			 throw new InvalidArgumentException(sprintf('Undefined option called: "%s"', $key));
		}
		return $this->options[$key];
	}
	
	public function setOption($key, $value) {
		if (!isset($this->options[$key])) {
			throw new InvalidArgumentException(sprintf('Undefined option called: "%s"', $key));
		}
		 $this->options[$key] = $value;
		 return $this;
	}
	
}