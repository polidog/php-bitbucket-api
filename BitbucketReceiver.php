<?php
require 'vendor/autoload.php';
/**
 * 
 */
class BitbucketProxy
{
	private $Bitbucket;
	
	public function __construct() {
		$this->Bitbucket = new Bitbucket\Client();
	}
	
	public function __call($name, $arguments) {
		return call_user_func_array(array($this->Bitbucket,$name), $arguments);
	}
	
}