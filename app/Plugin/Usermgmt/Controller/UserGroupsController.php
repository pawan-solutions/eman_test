<?php


App::uses('UserMgmtAppController', 'Usermgmt.Controller');
class UserGroupsController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $uses = array('Usermgmt.UserGroup', 'Usermgmt.User');
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
				'UserGroup' => array(
					'UserGroup.name'=> array(
						'type' => 'text',
						'label' => 'Group Name'
					),
					'UserGroup.alias_name' => array(
						'type' => 'text',
						'label' => 'Group Alias Name'
					),
					'UserGroup.allowRegistration' => array(
						'type' => 'select',
						'label' => 'Allow Registration',
						'options' => array(''=>'Select', '1'=>'Yes', '0'=>'No')
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
	 * Used to view all groups by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		$this->UserGroup->unbindModel( array('hasMany' => array('UserGroupPermission')));
		$this->paginate = array('limit' => 10, 'order'=>'UserGroup.id');
		$userGroups = $this->paginate('UserGroup');
		$this->set('userGroups', $userGroups);
		if($this->RequestHandler->isAjax()) {
			$this->layout = 'ajax';
		}
	}
	/**
	 * Used to add group on the site by Admin
	 *
	 * @access public
	 * @return void
	 */
	public function addGroup() {
		if ($this->request -> isPost()) {
			$this->UserGroup->set($this->data);
			$UserGroupAddValidate = $this->UserGroup->addValidate();
			if($this->RequestHandler->isAjax()) {
				$this->layout = 'ajax';
				$this->autoRender = false;
				if ($UserGroupAddValidate) {
					$response = array('error' => 0, 'message' => 'Succes');
					return json_encode($response);
				} else {
					$response = array('error' => 1,'message' => 'failure');
					$response['data']['UserGroup']  = $this->UserGroup->validationErrors;
					return json_encode($response);
				}
			} else {
				if ($UserGroupAddValidate) {
					$this->UserGroup->save($this->request->data,false);
					$this->Session->setFlash(__('The group is successfully added'));
					$this->redirect('/addGroup');
				}
			}
		}
	}
	/**
	 * Used to edit group on the site by Admin
	 *
	 * @access public
	 * @param integer $groupId group id
	 * @return void
	 */
	public function editGroup($groupId=null) {
		if (!empty($groupId)) {
			if(!$this->UserGroup->isValidUserId($groupId)) {
				$this->redirect('/allGroups');
			}
			if ($this->request -> isPut()) {
				$this->UserGroup->set($this->data);
				$UserGroupAddValidate = $this->UserGroup->addValidate();
				if($this->RequestHandler->isAjax()) {
					$this->layout = 'ajax';
					$this->autoRender = false;
					if ($UserGroupAddValidate) {
						$response = array('error' => 0, 'message' => 'Succes');
						return json_encode($response);
					} else {
						$response = array('error' => 1,'message' => 'failure');
						$response['data']['UserGroup']  = $this->UserGroup->validationErrors;
						return json_encode($response);
					}
				} else {
					if ($UserGroupAddValidate) {
						$this->UserGroup->save($this->request->data,false);
						$this->Session->setFlash(__('The group is successfully updated'));
						$this->redirect('/allGroups');
					}
				}
			} else {
				$this->request->data = $this->UserGroup->read(null, $groupId);
			}
		} else {
			$this->redirect('/allGroups');
		}
	}
	/**
	 * Used to delete group on the site by Admin
	 *
	 * @access public
	 * @param integer $userId group id
	 * @return void
	 */
	public function deleteGroup($groupId = null) {
		if (!empty($groupId)) {
			if ($this->request -> isPost()) {
				$users=$this->User->isUserAssociatedWithGroup($groupId);
				if($users) {
					$this->Session->setFlash(__('Sorry some users are associated with this group, You cannot delete'));
					$this->redirect('/allGroups');
				}
				if ($this->UserGroup->delete($groupId, false)) {
					$this->Session->setFlash(__('Group is successfully deleted'));
				}
			}
			$this->redirect('/allGroups');
		} else {
			$this->redirect('/allGroups');
		}
	}
}