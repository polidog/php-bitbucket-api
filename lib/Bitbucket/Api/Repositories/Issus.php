<?php

namespace Bitbucket\Api\Repositories;

use Bitbucket\Api\Repositories\Issus\Versions;
use Bitbucket\Api\Repositories\Issus\Comments;
class Issus extends AbstractRepository {

	public function find(array $params) {
		return $this->get(sprintf('repositories/%s/%s/issues', $this->username, $this->slug), $params);
	}

	public function show($id) {
		return $this->get(sprintf('repositories/%s/%s/issues/%d', $this->username, $this->slug, $id));
	}
	
	public function versions() {
		return new Versions($this->client,$this->username,$this->slug);
	}
	
	public function comments($issusId) {
		return new Versions($this->client,$this->username,$this->slug, $issusId);
	}

	public function create($title, $content, array $extends = null) {
		$params = array(
			'title' => $title,
			'content' => $content
		);
		if (!is_null($extends)) {
			$params += $extends;
		}
		return $this->post(sprintf('repositories/%s/%s/issues', $this->username, $this->slug), $params);
	}

	public function update($id, $title, $content, array $extends = null) {
		$params = array(
			'title' => $title,
			'content' => $content
		);
		if (!is_null($extends)) {
			$params += $extends;
		}
		return $this->put(sprintf('repositories/%s/%s/issues/%d', $this->username, $this->slug, $id), $params);
	}

	public function remove($id) {
		return $this->delete(sprintf('repositories/%s/%s/issues/%d', $this->username, $this->slug, $id));
	}

	public function followers() {
		return $this->get(sprintf('repositories/%s/%s/issues/%d/followers', $this->username, $this->slug, $id));
	}
}
