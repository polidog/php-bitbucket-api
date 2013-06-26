<?php

namespace Bitbucket\Tests\Api;

use Bitbucket\Api\AbstractApi;

class AbstractApiTest extends \PHPUnit_Framework_TestCase
{
	/*
	 * tests
	 */
	
	/*
	 * other
	 */
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
}