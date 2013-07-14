<?php
namespace Bitbucket\Api;

class GroupPrivileges extends AbstractApi
{

	/**
	 * すべて取得
	 * @param string $username
	 * @return array
	 */
	public function all($username,$filter = null) {
		$params = array();
		if (!empty($filter)) {
			$params["filter"] = $filter;
		}
		return $this->get("group-privileges/".$username."/",$params);
	}
	
	/**
	 * 指定したリポジトリの権限を取得する
	 * @param type $repository
	 * @param type $branch
	 * @return type
	 */
	public function find($username,$repository) {
		return $this->get("group-privileges/".$username."/".$repository);
	}
	
	/**
	 * 権限を付与する
	 * @param string $username
	 * @param string $repository
	 * @param string $auth
	 * @return array
	 */
	public function add($username, $repository, $auth) {
		return $this->put("group-privileges/".$username."/".$repository,array($auth));
	}
	
}