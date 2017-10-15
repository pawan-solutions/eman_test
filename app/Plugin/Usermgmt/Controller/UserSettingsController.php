<?php
App::uses('UserMgmtAppController', 'Usermgmt.Controller');
class UserSettingsController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $uses = array('Usermgmt.UserSetting');
	/**
	 * This controller uses following components
	 *
	 * @var array
	 */
	public $components = array('RequestHandler', 'Usermgmt.Search');
	/**
	 * This controller uses following helpers
	 *
	 * @var array
	 */
	public $helpers = array('Js');
	/**
	 * This controller uses following default pagination values
	 *
	 * @var array
	 */
	public $paginate = array(
		'limit' => 25
	);
	/**
	 * This controller uses search filters in following functions for ex index function
	 *
	 * @var array
	 */
	var $searchFields = array
		(
			'index' => array(
				'UserSetting' => array(
					'UserSetting.name_public'=> array(
						'type' => 'text',
						'label' => 'Setting Name',
						'inputOptions'=>array('style'=>'width:300px;')
					)
				)
			)
		);
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		if(isset($this->Security) &&  $this->RequestHandler->isAjax()){
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}
	/**
	 * Used to view all settings by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		$this->paginate = array('limit' => 10, 'order'=>'UserSetting.id');
		$userSettings = $this->paginate('UserSetting');
		$this->set('userSettings', $userSettings);
		if($this->RequestHandler->isAjax()) {
			$this->layout = 'ajax';
		}
	}
	/**
	 * Used to edit setting on the site by Admin
	 *
	 * @access public
	 * @param integer $settingId group id
	 * @return void
	 */
	public function editSetting($settingId=null) {
		if (!empty($settingId)) {
			if ($this->request -> isPut()) {
				$data = $this->UserSetting->read(null, $settingId);
				if(!empty($data)) {
					$data['UserSetting']['value'] = $this->request->data['UserSetting']['value'];
					$this->UserSetting->save($data,false);
					$this->Session->setFlash(__('Selected setting is successfully updated'));
				}
				$this->redirect('/allSettings');
			} else {
				$this->request->data = $this->UserSetting->read(null, $settingId);
				if(empty($this->request->data)) {
					$this->redirect('/allSettings');
				}
			}
		} else {
			$this->redirect('/allSettings');
		}
	}
}