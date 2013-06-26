<?php
namespace Bitbucket\Api;

class Email extends AbstractApi
{
	public function	show() {
		return $this->get('emails/');
	}
	
	public function create($email) {
		return $this->put('emails/'.$email);
	}
	
	public function isActive($email) {
		$result =  $this->get('emails/'.$email);
		if (!empty($result['active'])) {
			return true;
		}
		return false;
	}
	
	public function remove($email) {
		return $this->delete('emails/'.$email);
	}
}