<?php

class UserMgmtAppController extends AppController {
	/**
	 * This controller uses following components
	 *
	 * @var array
	 */
    //public $components = array('Session', 'Security');
	
    /**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
	}
}