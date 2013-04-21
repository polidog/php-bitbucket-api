<?php
namespace Bitbucket\Api;
class Repositories extends AbstractApi
{
	
	public function __call($name, $arguments) {
		if (isset($arguments[0])) {
			return $this->object($arguments[0], $name);
		}
		parent::__call($name,$arguments);
	}
	
	
	public function find($name) {
		return $this->get('repositories',array('name' => $name));
	}
	
	public function show($username,$slug) {
		return $this->get(sprintf('repositories/%s/%s',urlencode($username),urlencode($slug)));
	}	
	
	public function create($name,$scm = 'git') {
		return $this->post('repositories',  compact('name','scm'));
	}
	
	public function update($username,$slug,$data) {
		return $this->put(sprintf('repositories/%s/%s',urlencode($username),urlencode($slug)),$data);
	}
	
	public function remove($username,$slug) {
		return $this->delete(sprintf('repositories/%s/%s',urlencode($username),urlencode($slug)));
	}
	
	public function event($username, $slug) {
		return $this->get(sprintf('repositories/%s/%s/events',urlencode($username),urlencode($slug)));
	}
	
	public function tags($username,$slug) {
		return $this->get(sprintf('repositories/%s/%s/tags',urlencode($username),urlencode($slug)));
	}
	
	public function branches($username,$slug) {
		return $this->get(sprintf('repositories/%s/%s/branches',urlencode($username),urlencode($slug)));
	}
	
	public function followers($username,$slug) {
		return $this->get(sprintf('repositories/%s/%s/followers',urlencode($username),urlencode($slug)));
	}
	
	public function wiki($username,$slug) {
		return new Repositories\Wiki($this->client, $username, $slug);
	}
	
	public function object($username,$slug) {
		return new Repositories\Repository($this->client, $username, $slug);
	}	
	
}