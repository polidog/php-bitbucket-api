<?php

namespace Bitbucket\Api\Repositories;

class Wiki extends AbstractRepository {

	public function show($page) {
		return $this->get($this->getPath() . 'wiki/' . urlencode($page));
	}

	public function create($page, $data) {
		$parameters = array(
			'data' => $data
		);
		return $this->post($this->getPath() . 'wiki/' . urlencode($page), $parameters);
	}

	public function update($page, $data, $rev = null) {
		$parameters = array(
			'data' => $data
		);
		if (!is_nul($rev)) {
			$parameters['rev'] = $rev;
		}
		return $this->post($this->getPath.'wiki/'.urlencode($page), $parameters);
	}

}