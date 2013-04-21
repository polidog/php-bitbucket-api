<?php
namespace Bitbucket\Api\Repositories;

class Repository extends  AbstractRepository
{
	public function show() {
		return $this->get(sprintf('repositories/%s/%s',$this->username,$this->slug));
	}
	
	public function update(array $data) {
		return $this->put(sprintf('repositories/%s/%s',$this->username,$this->slug),$data);
	}
	
	public function remove() {
		return $this->delete(sprintf('repositories/%s/%s',$this->username,$this->slug));
	}
	
	public function event() {
		return $this->get(sprintf('repositories/%s/%s/events',$this->username,$this->slug));
	}
	
	public function tags() {
		return $this->get(sprintf('repositories/%s/%s/tags',$this->username,$this->slug));
	}
	
	public function branches() {
		return $this->get(sprintf('repositories/%s/%s/branches',$this->username,$this->slug));
	}
	
	public function followers() {
		return $this->get(sprintf('repositories/%s/%s/followers',$this->username,$this->slug));
	}
	
	public function wiki() {
		return new Wiki($this->client, $this->username, $this->slug);
	}
	
	public function issus() {
		return new Issus($this->client, $this->username, $this->slug);
	}
}