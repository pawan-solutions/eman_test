<?php

App::uses('UserMgmtAppModel', 'Usermgmt.Model');
class UserActivity extends UserMgmtAppModel {

	var $belongsTo = array('Usermgmt.User');

}