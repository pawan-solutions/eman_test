<?php

App::uses('UserMgmtAppModel', 'Usermgmt.Model');
class UserDetail extends UserMgmtAppModel {

	/**
	 * model validation array
	 *
	 * @var array
	 */
	var $validate = array();
	function RegisterValidate() {
		$validate1 = array(
				/*"gender" => array(
					'rule' => array('comparison', '!=', ''),
					'message'=> 'Please select gender'
                 ),*/
				"marital_status" => array(
					'rule' => array('comparison', '!=', ''),
					'message'=> 'Please select marital status'),
				"cellphone" => array(
                    'notEmpty'=>array(
                        'rule' => 'notEmpty',
                        'message'=> 'Please enter your valid cellphone no'
                        ),
                    'cellphone'=>array(
                        'rule' => array('cellphone'),
                        'message'=> 'Please enter valid cellphone no (10 digits)'
                        )
                    ),
				'photo' => array(
					'rule'    => array('extension', array('gif', 'jpeg', 'png', 'jpg', '')),
					'message' => 'Please supply a valid image'
				)
			);
		$this->validate=$validate1;
		return $this->validates();
	}

}