<?php
namespace Bitbucket\Api\Repositories\Issus;
use Bitbucket\Api\Repositories\AbstractRepository;
class Versions extends  AbstractRepository
{
	public function show($id = null) {
		if (is_null($id)) {
			return $this->get($this->getPath().'versions');
		}
		return $this->get($this->getPath().'versions/'.(int)$id);
	}
	
	public function create($name) {
		$params = array('name',$name);
		return $this->post($this->getPath().'versions',$params);
	}
	
	public function update($id, $name) {
		$params = array('name',$name);
		return $this->put($this->getPath().'versions/'.(int)$id,$params);
	}
	
	public function remove($id) {
		return $this->delete($this->getPath().'versions/'.(int)$id);
	}
	
}