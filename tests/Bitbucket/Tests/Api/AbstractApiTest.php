<?php

namespace Bitbucket\Tests\Api;

use Bitbucket\Api\AbstractApi;

class AbstractApiTest extends \PHPUnit_Framework_TestCase
{
	/*
	 * unit tests
	 */
	
	
	/**
	 * @test
	 */
	public function shouldPassGETRequestToClient() {
		$expected = array('value');
		$httpClient = $this->getHttpMock();
		$httpClient->expects($this->any())
					->method('get')
					->with('/path',array('param1' => 'param1value'),array('header1' => 'header1value'))
					->will($this->returnValue($expected));
				 ;
	
		$client = $this->getClientMock();
		$client->setHttpClient($httpClient);
		
		$api = $this->getAbstractApiObject($client);
		$this->assertEquals($expected, $api->get('/path', array('param1' => 'param1value'), array('header1' => 'header1value')));
	}
	
	/*
	 * other
	 */
	
	protected function getClientMock() {
		return new \Bitbucket\Client($this->getHttpMock());
	}
	
	protected function getHttpMock() {
		return $this->getMock('Bitbucket\HttpClient\HttpClient',array(),array(array(),));
	}
	
	protected function getHttpClientMock() {
		$mock = $this->getMock('Buzz\Client\ClientInterface', array('setTimeout', 'setVerifyPeer', 'send'));
		$mock->expects($this->any())
			 ->method('setTimeout')
			 ->with(10);
		
		$mock->expects($this->any())
			 ->method('setTimeout')
			 ->with(10);		
	}

	/**
	 * @param \Buzz\Client\ClientInterface $client
	 * @return \Bitbucket\Tests\Api\AbstractApiInstanceTest
	 */
    protected function getAbstractApiObject($client)
    {
        return new AbstractApiInstanceTest($client);
    }	
}


class AbstractApiInstanceTest extends AbstractApi
{
	/**
	 * {@inheritDoc}
	 */
	public function get($path, array $parameters = array(), $requestHeaders = array())
	{
		return $this->client->getHttpClient()->get($path, $parameters, $requestHeaders);
	}

	/**
	 * {@inheritDoc}
	 */
	public function post($path, array $parameters = array(), $requestHeaders = array())
	{
		return $this->client->getHttpClient()->post($path, $parameters, $requestHeaders);
	}

	/**
	 * {@inheritDoc}
	 */
	public function patch($path, array $parameters = array(), $requestHeaders = array())
	{
		return $this->client->getHttpClient()->patch($path, $parameters, $requestHeaders);
	}

	/**
	 * {@inheritDoc}
	 */
	public function put($path, array $parameters = array(), $requestHeaders = array())
	{
		return $this->client->getHttpClient()->put($path, $parameters, $requestHeaders);
	}

	/**
	 * {@inheritDoc}
	 */
	public function delete($path, array $parameters = array(), $requestHeaders = array())
	{
		return $this->client->getHttpClient()->delete($path, $parameters, $requestHeaders);
	}
}