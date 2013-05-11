<?php
namespace Bitbucket\Tests;

use Bitbucket\Client;
use Bitbucket\HttpClient\HttpClient;

class ClientTest extends \PHPUnit_Framework_TestCase
{
	
	/**
	 * @test
	 * HTTPClientが生成されるか検査する
	 */
	public function shouldNotHavToPassHttpClientToConstructor() {
		$client = new Client();
		$this->assertInstanceOf('Bitbucket\HttpClient\HttpClient',$client->getHttpClient());
	}
	
	
	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function shouldThrowExceptionWhenAuthenticatingWithoutMethodSet() {
		$client = new Client($this->getHttpClientMock(array('addListener')));
		$client->authenticate(null, null);
	}
	
	
	/**
	 * HTTP ClientのMockを取得する
	 * @param array $methods
	 * @return Bitbucket\HttpClient\HttpClientInterface
	 */
	public function getHttpClientMock(array $methods  = array()) {
		$methods = array_merge(array(
			'get','post','put','delete','request','setOption','setHeaders'
		),$methods);
		
		return $this->getMock('Bitbucket\HttpClient\HttpClientInterface',$methods);
	}
}