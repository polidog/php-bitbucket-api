<?php
namespace Bitbucket\Api;
use Bitbucket\Client;
abstract class AbstractApi implements ApiInterface {
	
	protected $client;
	
	public function __construct(Client $client) {
		$this->client = $client;
	}
	
	public function configure()
	{
	}
	
	public function get($path, array $parameters = array(), $requestHeaders = array()) {
		$response = $this->client->getHttpClient()->get($path, $parameters, $requestHeaders);
		return $response->getContent();
	}
	
	public function post($path, array $parameters = array(), $requestHeaders = array()) {
		$response = $this->client->getHttpClient()->post($path, $parameters, $requestHeaders);
		return $response->getContent();		
	}
	
	
	public function put($path, array $parameters = array(), $requestHeaders = array()) {
		$response = $this->client->getHttpClient()->put($path, $parameters, $requestHeaders);
		return $response->getContent();
	}
	
	public function delete($path, array $parameters = array(), $requestHeaders = array()) {
		$response = $this->client->getHttpClient()->delete($path, $parameters, $requestHeaders);
		return $response->getContent();
	}
	
}