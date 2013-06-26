<?php
namespace Bitbucket\Api;

interface ApiInterface
{
	public function configure();
	
	public function get($path, array $parameters = array(), $requestHeaders = array());
	
	public function post($path, array $parameters = array(), $requestHeaders = array());
	
	public function put($path, array $parameters = array(), $requestHeaders = array());
	
}