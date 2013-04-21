<?php
namespace Bitbucket\Api\Repositories\Issus;

class Comments extends AbstractIssus
{
	public function all() {
		return $this->get($this->getPath().'comments');
	}
	
	public function show($id) {
		return $this->get($this->getPath().'comments/'.(int)$id);
	}
	
	public function create($comment) {
		return $this->post($this->getPath().'comments',array('content' => $comment));
	}
	
	public function update($comment) {
		return $this->put($this->getPath().'comments',array('content' => $comment));
	}
	
	public function remove($id) {
		return $this->delete($this->getPath().'comments/'.(int)$id);
	}	
}