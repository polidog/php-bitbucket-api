<?php
namespace Bitbucket\Api\Repositories\Issus;

use Bitbucket\Api\Repositories\AbstractRepository;
use \Bitbucket\Client;

abstract class AbstractIssus extends AbstractRepository 
{
	protected $username;
	protected $slug;
	protected $issusId;
	final public function __construct(Client $client, $username, $slug, $issusId) {
		parent::__construct($client, $username, $slug);
		$this->issusId = $issusId;
	}
	
	protected function getPath() {
		return sprintf('repositories/%s/%s/issues/%d/',$this->username,$this->slug, $this->issusId);
	}
}
