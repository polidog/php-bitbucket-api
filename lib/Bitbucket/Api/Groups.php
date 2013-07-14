<?php
namespace Bitbucket\Api;

class Groups extends AbstractApi
{
	
	/**
	 * メンバー一覧を取得する
	 * @param string $groups
	 * @param string $username
	 * @return array
	 */
	public function members($group, $username) {
		return $this->get("groups/".$username."/".$group."/members");
	}
	
	/**
	 * メンバーを追加する
	 * @param string $group
	 * @param string $member
	 * @param string $username
	 */
	public function membarAdd($group, $member, $username) {
		return $this->put("groups/".$username."/".$group."/members/".$member);
	}
	
	/**
	 * メンバーを削除する
	 * @param string $group
	 * @param string $member
	 * @param string $username
	 * @return array
	 */
	public function memberRemove($group, $member, $username) {
		return $this->delete("groups/".$username."/".$group."/members/".$member);
	}
	
	/**
	 * 指定した名前のグループ情報を取得する
	 * @param string $username username or email address
	 * @return array
	 */
	public function show($username) {
		return $this->get("groups/".$username);
	}
	
	/**
	 * グループを新規作成する
	 * @param string $group
	 * @param string $username
	 */
	public function create($group, $username) {
		return $this->post("groups/".$username,array("name" => $group));
	}
	
	/**
	 * 更新する
	 * @param string $group
	 * @param string $username
	 * @param array $settings
	 */
	public function update($group, $username, array $settings) {
		return $this->post("groups/".$username."/".$group."/",$settings);
	}
	
	
	/**
	 * グループを削除する
	 * @param string $group group name 
	 * @param string $username user name
	 * @return array
	 */
	public function remove($group, $username) {
		return $this->delete("groups/".$username."/".$group);
	}
}