<?php

App::uses('UserMgmtAppModel', 'Usermgmt.Model');
class UserSetting extends UserMgmtAppModel {

	/**
	 * model validation array
	 *
	 * @var array
	 */
	var $validate = array();
	/**
	 * Used to get settings by name
	 *
	 * @access public
	 * @param array $name setting name
	 * @return array
	 */
	public function getSettingByName($name=null)    {
		$setting='';
		if(!empty($name)) {
			$data = $this->findByName($name);
			if(!empty($data)) {
				$setting = $data['UserSetting']['value'];
			}
		}
		return $setting;
	}
	/**
	 * Used to get all settings
	 *
	 * @access public
	 * @return array
	 */
	public function getAllSettings() {
		$setting=array();
		$data = $this->find('all');
		foreach($data as $row) {
			$setting[$row['UserSetting']['name']]['value'] = $row['UserSetting']['value'];
		}
		return $setting;
	}
}