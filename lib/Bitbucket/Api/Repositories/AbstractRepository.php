<?php
namespace Bitbucket\Api\Repositories;

use Bitbucket\Api\AbstractApi;
use \Bitbucket\Client;

abstract class AbstractRepository extends AbstractApi 
{
	protected $username;
	protected $slug;

	public function __construct(Client $client, $username, $slug) {
		parent::__construct($client);
		$this->setUsername($username)->setSlug($slug);
	}
	
	final public function getUsername($username) {
		return $this->username;
	}
	
	final public function setUsername($username) {
		$this->username = $username;
		return $this;
	}
	
	final public function getSlug() {
		return $this->slug;
	}
	
	final public function setSlug($slug) {
		$this->slug = $slug;
		return $this;
	}
	
	final public function chnage($username,$slug) {
		$this->setUsername($username)->setSlug($slug);
	}
	
	public function getPath() {
		return sprintf('repositories/%s/%s/',$this->username,$this->slug);
	}
}
