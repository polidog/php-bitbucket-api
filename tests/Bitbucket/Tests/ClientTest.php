<?php

namespace Bitbucket\Tests;

use Bitbucket\Client;
use Bitbucket\HttpClient\HttpClient;

class ClientTest extends \PHPUnit_Framework_TestCase {
	/*
	 * ------------------------------------------
	 * test methods
	 * ------------------------------------------
	 */

	/**
	 * @test
	 * 
	 * HTTPClientが生成されるか検査する
	 */
	public function shouldNotHavToPassHttpClientToConstructor() {
		$client = new Client();
		$this->assertInstanceOf('Bitbucket\HttpClient\HttpClient', $client->getHttpClient());
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * 
	 * 認証が失敗している場合にExceptionが発生するかテストする
	 */
	public function shouldThrowExceptionWhenAuthenticatingWithoutMethodSet() {
		$client = new Client($this->getHttpClientMock(array('addListener')));
		$client->authenticate(null, null);
	}

	/**
	 * @test 
	 * @dataProvider getAuthenticationFullData
	 */
	public function shouldAuthenticateUsingAllGivenParameters($username, $password) {

		$httpClient = $this->getHttpClientMock(array('authenticate'));
		$httpClient->expects($this->once())->method('authenticate')->with($username, $password);

		$client = new Client($httpClient);
		$client->authenticate($username, $password);
	}

	/**
	 * @test
	 * 
	 * ApiInterfaceを継承したオブジェクトが取得できるか確認する
	 */
	public function shouldGetApiInterface() {
		$client = new Client();
		$this->assertInstanceOf('Bitbucket\Api\ApiInterface', $client->api('user'));
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * 
	 * サポートしていないAPIを使用した場合はInvalidArgumentExceptionが発生する
	 */
	public function shouldThrowExceptionWhenNoSupportApi() {
		$client = new Client();
		$client->api('hoge');
	}

	/*
	 * ------------------------------------------
	 * not test methods
	 * ------------------------------------------
	 */

	/**
	 * HTTP ClientのMockを取得する
	 * @param array $methods
	 * @return Bitbucket\HttpClient\HttpClientInterface
	 */
	public function getHttpClientMock(array $methods = array()) {
		$methods = array_merge(array(
			'get', 'post', 'put', 'delete', 'request', 'setOption', 'setHeaders'
				), $methods);

		return $this->getMock('Bitbucket\HttpClient\HttpClientInterface', $methods);
	}
	
	/**
	 * Auth用のパスワード
	 * @return array
	 */
	public function getAuthenticationFullData() {
		return array(
			array('hoge', 'fuga'),
		);
	}

}