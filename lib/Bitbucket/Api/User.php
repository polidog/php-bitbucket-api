<?php
namespace Bitbucket\Api;

class User extends AbstractApi
{
	public function show($username = null) {
		if (is_null($username)) {
			return $this->get('user');
		}
		return $this->get('users/'.urlencode($username));
	}
	
	public function followers($username = null) {
		if (is_null($username)) {
			return $this->get('user/followers');
		} 
		return $this->get('users/'.urlencode($username).'/followers');
	}
	
	public function repositories($username = null) {
		if (is_null($username)) {
			return $this->get('user/repositories/');
		}
		return $this->get('users/'.urlencode($username).'/repositories');
	}
	
	public function events($username, $page = 1, $limit = 20) {
		$start = $limit * ($page - 1);
		return $this->get('users/'.urlencode($username).'/events',array('start' => $start,'limit' => $limit));
	}
	
	public function create($name,$email,$password,$username = null) {
		if (is_null($username)) {
			$username = $name;
		}
		return $this->post('users/newuser', compact('name','email','password','usename'));
	}
}