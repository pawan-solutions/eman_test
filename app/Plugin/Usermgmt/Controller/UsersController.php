<?php


App::uses('UserMgmtAppController', 'Usermgmt.Controller');
class UsersController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.UserSetting', 'Usermgmt.TmpEmail', 'Usermgmt.UserDetail', 'Usermgmt.UserActivity', 'Usermgmt.LoginToken', 'Usermgmt.UserGroupPermission','Company');
	/**
	 * This controller uses following components
	 *
	 * @var array
	 */
	public $components = array('RequestHandler', 'Usermgmt.UserConnect', 'Cookie', 'Usermgmt.Search', 'Usermgmt.ControllerList');
	/**
	 * This controller uses following default pagination values
	 *
	 * @var array
	 */
	public $paginate = array(
		'limit' => 25
	);
	/**
	 * This controller uses following helpers
	 *
	 * @var array
	 */
	public $helpers = array('Js');
	/**
	 * This controller uses search filters in following functions for ex index, online function
	 *
	 * @var array
	 */
	var $searchFields = array
		(
			'index' => array(
				'User' => array(
					'User.id'=> array(
						'type' => 'text',
						'condition' => '=',
						'label' => 'User Id'
					),
					'User.first_name'=> array(
						'type' => 'text',
						'label' => 'Name'
					),
					'User.email' => array(
						'type' => 'text',
						'label' => 'Email'
					),
					'User.user_group_id' => array(
						'type' => 'select',
						'condition' => 'comma',
						'label' => 'Group',
						'model' => 'UserGroup',
						'selector' => 'getGroups'
					),
					'User.email_verified' => array(
						'type' => 'select',
						'label' => 'Email Verified',
						'options' => array(''=>'Select', '0'=>'No', '1'=>'Yes')
					),
					'User.active' => array(
						'type' => 'select',
						'label' => 'Status',
						'options' => array(''=>'Select', '1'=>'Active', '0'=>'Inactive')
					)
				)
			),
			'online' => array(
				'UserActivity' => array(
					'UserActivity.status' => array(
						'type' => 'select',
						'label' => 'Status',
						'options' => array(''=>'Select', '0'=>'Guest', '1'=>'Online')
					),
					'User.first_name'=> array(
						'type' => 'text',
						'label' => 'Name'
					),
					'User.email' => array(
						'type' => 'text',
						'label' => 'Email'
					),
					'UserActivity.ip_address' => array(
						'type' => 'text',
						'label' => 'Ip Address',
						'condition' => '=',
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
		$this->User->userAuth=$this->UserAuth;
		if(isset($this->Security) &&  $this->RequestHandler->isAjax()){
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}
	/**
	 * Used to display all users by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		//$this->layout = 'user';
		$this->User->unbindModel( array('hasMany' => array('LoginToken')));
		$this->paginate = array('limit' => 10, 'order'=>'User.id desc', 'conditions'=>array('User.owner_id'=>0, 'User.user_group_id'=>SUPER_USER));
		$users = $this->paginate('User');

		$i=0;
		foreach($users as $user) {
			$users[$i]['UserGroup']['name']=$this->UserGroup->getGroupsByIds($user['User']['user_group_id']);
			$i++;
		}
		$this->set('users', $users);
		if($this->RequestHandler->isAjax()) {
			$this->layout = 'ajax';
		}
	}
	/**
	 * Used to display all online users by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function online() {
		$this->paginate = array('limit' => 10, 'order'=>'UserActivity.modified desc', 'conditions'=>array('UserActivity.modified >'=>(date('Y-m-d G:i:s', strtotime('-'.VIEW_ONLINE_USER_TIME.' minutes', time()))), 'UserActivity.logout'=>0));
		$users = $this->paginate('UserActivity');
		$this->set('users', $users);
		if($this->RequestHandler->isAjax()) {
			$this->layout = 'ajax';
		}
	}
	/**
	 * Used to display detail of user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return array
	 */
	public function viewUser($userId=null) {
		if (!empty($userId)) {
			$user = $this->User->read(null, $userId);
			if(empty($user)) {
				$this->redirect('/allUsers');
			}
			$user['UserGroup']['name']=$this->UserGroup->getGroupsByIds($user['User']['user_group_id']);
			$this->set('user', $user);
			$this->set('userId', $userId);
		} else {
			$this->redirect('/allUsers');
		}
	}
	
	/**
	 * Used to display detail of facilities
	 *
	 * @access public
	 * @return array
	 */
	public function facilities(){
		$this->paginate = array('limit' => 10, 'order'=>'Facility.id DESC');
		$Facility = $this->paginate('Facility');
		$this->set('Facility', $Facility);
		if($this->RequestHandler->isAjax()) {
			$this->layout = 'ajax';
		}
	}
    
    /**
     * Function to view review (earlier given by end user)(by Admin)
     * @param type $id
     */
    public function facilityView($id = NULL){
        if(!empty($id)){
        $result = $this->Facility->find('first', ['conditions'=>['Facility.id'=>$id]]);
            if(!empty($result)){
                $this->set('result', $result);
                $this->set('id', $id);
                
            }else{
                $this->Session->setFlash(__('Facility not found'));
                $this->redirect('/facilities');
            }
        }
    }
	/**
	 * Used to delete facility by Admin
	 *
	 * @access public
	 * @param integer $facilityId
	 * @return void
	 */
	public function delete_facility($facilityId = null) {
		if (!empty($facilityId)) {
			if ($this->request -> isPost()) {
				if ($this->Facility->delete($facilityId, false)) {
					$this->Session->setFlash(__('Facility is successfully deleted'));
				}
			}
			$this->redirect('/facilities');
		} else {
			$this->redirect('/facilities');
		}
	}
	/**
	 * Used to display detail of user by user
	 *
	 * @access public
	 * @return array
	 */
	public function myprofile() {
		$userId = $this->UserAuth->getUserId();
		$user = $this->User->read(null, $userId);
        if($user['User']['user_group_id'] == AUTH_USER_GROUP_ID) {
            $this->layout = USER_LAYOUT;
        }
		$user['UserGroup']['name']=$this->UserGroup->getGroupsByIds($user['User']['user_group_id']);
        $this->set("user_group", $user['User']['user_group_id']);
		$this->set('user', $user);
	}
	/**
	 * Used to edit profile on the site by user
	 *
	 * @access public
	 * @return void
	 */
	public function editProfile() {
		$userId = $this->UserAuth->getUserId();
		if (!empty($userId)) {
			$gender= $this->User->getGenderArray();
			$this->set('gender', $gender);
			$marital= $this->User->getMaritalArray();
			$this->set('marital', $marital);
			if ($this->request -> isPut() || $this->request -> isPost()) {
				$this->User->set($this->data);
				$this->UserDetail->set($this->data);
				$UserRegisterValidate = $this->User->RegisterValidate();
				$UserDetailRegisterValidate = $this->UserDetail->RegisterValidate();
				if($this->RequestHandler->isAjax()) {
					$this->layout = 'ajax';
					$this->autoRender = false;
					if ($UserRegisterValidate && $UserDetailRegisterValidate) {
						$response = array('error' => 0, 'message' => 'Succes');
						return json_encode($response);
					} else {
						$response = array('error' => 1,'message' => 'failure');
						$response['data']['User']   = $this->User->validationErrors;
						$response['data']['UserDetail'] = $this->UserDetail->validationErrors;
						return json_encode($response);
					}
				} else {
					if ($UserRegisterValidate && $UserDetailRegisterValidate) {
						if(is_uploaded_file($this->request->data['UserDetail']['photo']['tmp_name']) && !empty($this->request->data['UserDetail']['photo']['tmp_name'])) {
							$path_info = pathinfo($this->request->data['UserDetail']['photo']['name']);
							chmod ($this->request->data['UserDetail']['photo']['tmp_name'], 0644);
							$photo=time().mt_rand().".".$path_info['extension'];
							$fullpath= WWW_ROOT."img".DS.IMG_DIR;
							$res1 = is_dir($fullpath);
							if($res1 != 1)
								$res2= mkdir($fullpath, 0777, true);
							move_uploaded_file($this->request->data['UserDetail']['photo']['tmp_name'],$fullpath.DS.$photo);
							$this->request->data['UserDetail']['photo']=$photo;
						} else {
							unset($this->request->data['UserDetail']['photo']);
						}
						if(!ALLOW_CHANGE_USERNAME) {
							unset($this->request->data['User']['username']);
						}
						$user =$this->User->getUserById($userId);
						if($user['User']['email'] != $this->request->data['User']['email']) {
							$this->request->data['User']['email_verified']=0;
							$user['User']['email']= $this->request->data['User']['email'];
							$this->User->sendVerificationMail($user);
							$this->Cookie->delete('UMPremiumCookie');
						}
						$this->User->saveAssociated($this->request->data);
						$this->Session->setFlash(__('Your profile has been successfully updated'));
						$this->redirect($this->referer());
					}
				}
			} else {
				$this->User->unbindModel(array('hasMany' => array('LoginToken')));
				$user = $this->User->read(null, $userId);
				$this->request->data=null;
				if (!empty($user)) {
					$user['User']['password']='';
					$this->request->data = $user;
				}
			}
		} else {
			$this->redirect('/myprofile');
		}
	}
	/**
	 * Used to logged in the site
	 *
	 * @access public
	 * @return void
	 */
	public function login($connect=null, $from=null, $admin = null) {
		
        $this->autoRender = $this->render = false;
        $this->set(compact('connect', 'from', 'admin'));
        if($connect == 'login' && $from == 'panel' && $admin == ADMIN_LOGIN_STRING){
        	$this->layout = '';
            $renderPage = 'login_admin';
        }else{
        	$this->layout = 'guest_layout';
            $renderPage = 'login';
        }
        $userId = $this->UserAuth->getUserId();
        //pr($userId);die;
        if ($userId) {
            // redirect to home page
            $this->redirect("/");
        }
           if($connect=='fb') {
            $this->Session->read();
            $this->layout=NULL;
            $fbData=$this->UserConnect->facebook_connect();
            if(isset($_GET['error'])) {
                /* Do nothing user canceled authentication */
            } elseif(!empty($fbData['loginUrl'])) {
                $this->redirect($fbData['loginUrl']);
            } else {
                $emailCheck=true;
                $user = $this->User->findByFbId($fbData['user_profile']['id']);
                if(empty($user)) {
                    $user = $this->User->findByEmail($fbData['user_profile']['email']);
                    $emailCheck=false;
                }
                if(empty($user)) {
                    if(SITE_REGISTRATION) {
                        $user['User']['fb_id']=$fbData['user_profile']['id'];
                        $user['User']['fb_access_token']=$fbData['user_profile']['accessToken'];
                        $user['User']['user_group_id']=DEFAULT_GROUP_ID;
                        $user['User']['username']= $this->generateUserName($fbData['user_profile']['name']);
                        $password = $this->UserAuth->generatePassword();
                        $user['User']['password'] = $this->UserAuth->generatePassword($password);
                        $user['User']['email']=$fbData['user_profile']['email'];
                        $user['User']['first_name']=$fbData['user_profile']['first_name'];
                        $user['User']['last_name']=$fbData['user_profile']['last_name'];
                        $user['User']['active']=1;
                        $user['User']['email_verified']=1;
                        $userImageUrl = 'http://graph.facebook.com/'.$fbData['user_profile']['id'].'/picture?type=large';
                        $photo = $this->updateProfilePic($userImageUrl);
                        $user['UserDetail']['photo']=$photo;
                        $user['UserDetail']['gender']=$fbData['user_profile']['gender'];
                        $this->User->save($user,false);
						$name        =   $fbData['user_profile']['first_name'];
						$last_name   =   $fbData['user_profile']['last_name'];
						$email       =   $fbData['user_profile']['email'];
						//$this->createOnLeadSquare($name,$email,$last_name);
                        $userId=$this->User->getLastInsertID();
                        $user['UserDetail']['user_id']=$userId;
                        $this->UserDetail->save($user,false);
                        $user = $this->User->findById($userId);
                        $this->UserAuth->login($user);
                        $this->Session->write('UserAuth.FacebookLogin', true);
                        $this->Session->write('UserAuth.FacebookChangePass', true);
                    } else {
                        $this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
                        $this->render($renderPage);
                    }
                } else {
                    $login=false;
                    if(!$emailCheck) {
                        $user['User']['fb_id']=$fbData['user_profile']['id'];
                        $user['User']['fb_access_token']=$fbData['user_profile']['accessToken'];
                        $user['User']['email_verified']=1;
                        $this->User->save($user,false);
                        $login=true;
                    } else if($user['User']['email_verified']==1) {
                        $login=true;
                    } else if($user['User']['email']==$fbData['user_profile']['email']) {
                        $user['User']['email_verified']=1;
                        $this->User->save($user,false);
                        $login=true;
                    }
                    if($login) {
                        $user = $this->User->findById($user['User']['id']);
                        if ($user['User']['id'] != 1 and $user['User']['active']==0) {
                            $this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'));
                            $this->render($renderPage);
                        } else {
                            $this->UserAuth->login($user);
                            $this->Session->write('UserAuth.FacebookLogin', true);
                        }
                    } else {
                        $this->Session->setFlash(__('Sorry your email is not verified yet'));
                        $this->render($renderPage);
                    }
                }
            }
            $this->render('popup');
        } elseif($connect=='twt') {
            $this->Session->read();
            $this->layout=NULL;
            $twtData=$this->UserConnect->twitter_connect();
            if(isset($_GET['denied'])) {
                $this->redirect('/login');
            } elseif(!isset($_GET['oauth_token'])) {
                $this->redirect($twtData['url']);
            } else {
                $twtId  = $twtData['user_profile']['id'];
                $user = $this->User->findByTwtId($twtId);
                if(empty($user)) {
                    if(SITE_REGISTRATION) {
                        $user['User']['twt_id']=$twtData['user_profile']['id'];
                        $user['User']['twt_access_token']=$twtData['user_profile']['accessToken'];
                        $user['User']['twt_access_secret']=$twtData['user_profile']['accessSecret'];
                        $user['User']['user_group_id']=DEFAULT_GROUP_ID;
                        $user['User']['username']= $this->generateUserName($twtData['user_profile']['screen_name']);
                        $password = $this->UserAuth->generatePassword();
                        $user['User']['password'] = $this->UserAuth->generatePassword($password);
                        $name=preg_replace("/ /", "~", $twtData['user_profile']['name'], 1);
                        $name= explode('~', $name);
                        $user['User']['first_name']=$name[0];
                        $user['User']['last_name']=(isset($name[1])) ? $name[1] : "";
                        $user['User']['active']=1;
                        $user['UserDetail']['location']=$twtData['user_profile']['location'];
                        $userImageUrl = 'http://api.twitter.com/1/users/profile_image?screen_name='.$twtData['user_profile']['screen_name'].'&size=original';
                        $photo = $this->updateProfilePic($userImageUrl);
                        $user['UserDetail']['photo']=$photo;
                        $this->User->save($user,false);
                        $userId=$this->User->getLastInsertID();
                        $user['UserDetail']['user_id']=$userId;
                        $this->UserDetail->save($user,false);
                        $user = $this->User->findById($userId);
                        $this->UserAuth->login($user);
                        $this->Session->write('UserAuth.TwitterChangePass', true);
                        $this->redirect('/changePassword');
                    } else {
                        $this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
                        $this->render($renderPage);
                        $this->redirect("/login");
                    }
                } else {
                    if ($user['User']['id'] != 1 and $user['User']['active']==0) {
                        $this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'));
                        $this->render($renderPage);
                        $this->redirect("/login");
                    } else {
                        $this->UserAuth->login($user);
                        $OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
                        $this->Session->delete('Usermgmt.OriginAfterLogin');
                        $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
                        $this->redirect($redirect);
                    }
                }
            }
            $this->render('popup');
        } elseif($connect=='gmail') {
            $OriginAfterLogin = $this->Session->read('Usermgmt.OriginAfterLogin');
             if(empty($OriginAfterLogin) || (!empty($OriginAfterLogin) && $OriginAfterLogin == SITE_URL)) {
                 $this->Session->write('Usermgmt.OriginAfterLogin', $this->referer());
             }
            $this->Session->read();
            $this->layout=NULL;
            $gmailData=$this->UserConnect->gmail_connect();
            if(isset($gmailData['url'])) {
                $this->redirect($gmailData['url']);
            } else {
                if(!empty($gmailData)) {
                    $user = $this->User->findByEmail($gmailData['email']);
                    if(empty($user)) {
                        if(SITE_REGISTRATION) {
                            $user['User']['user_group_id']=DEFAULT_GROUP_ID;
                            $user['User']['username']= $this->generateUserName($gmailData['name']);
                            $password = $this->UserAuth->generatePassword();
                            $user['User']['password'] = $this->UserAuth->generatePassword($password);
                            $user['User']['first_name']=$gmailData['first_name'];
                            $user['User']['last_name']=$gmailData['last_name'];
                            $user['User']['email']=$gmailData['email'];
                            $user['User']['active']=1;
                            $user['User']['email_verified']=1;
                            $user['UserDetail']['location']=$gmailData['location'];
                            $this->User->save($user,false);
                            $userId=$this->User->getLastInsertID();
                            $user['UserDetail']['user_id']=$userId;
                            $this->UserDetail->save($user,false);
                            $user = $this->User->findById($userId);
                            $this->UserAuth->login($user);
						    $name        =   $gmailData['first_name'];
					    	$last_name   =   $gmailData['last_name'];
						    $email       =   $gmailData['email'];
                           // $this->createOnLeadSquare($name,$email,$last_name);
                            $this->Session->write('UserAuth.GmailLogin', true);
                            $this->Session->write('UserAuth.GmailChangePass', true);


                        } else {
                            $this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
                            $this->render($renderPage);
                        }
                    } else {
                        if($user['User']['email_verified'] !=1) {
                            $user['User']['email_verified']=1;
                            $this->User->save($user,false);
                        }
                        $user = $this->User->findById($user['User']['id']);
                        if ($user['User']['id'] != 1 and $user['User']['active']==0) {
                            $this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'));
                            $this->render($renderPage);
                        } else {
                            $this->UserAuth->login($user);
                            $this->Session->write('UserAuth.GmailLogin', true);
                        }
                    }
                }
            }
            $this->render('popup');
        } elseif($connect=='ldn') {
            $this->Session->read();
            $this->layout=NULL;
            $ldnData=$this->UserConnect->linkedin_connect();
            if(!$_GET[LINKEDIN::_GET_RESPONSE]) {
                $this->redirect($ldnData['url']);
            } else {
                $ldnData = json_decode(json_encode($ldnData['user_profile']),TRUE);
                if(!empty($ldnData)) {
                    $user = $this->User->findByLdnId($ldnData['id']);
                    if(empty($user)) {
                        if(SITE_REGISTRATION) {
                            $user['User']['ldn_id']=$ldnData['id'];
                            $user['User']['user_group_id']=DEFAULT_GROUP_ID;
                            $user['User']['username']= $this->generateUserName($ldnData['first-name']. ' '.$ldnData['last-name']);
                            $password = $this->UserAuth->generatePassword();
                            $user['User']['password'] = $this->UserAuth->generatePassword($password);
                            $user['User']['first_name']=$ldnData['first-name'];
                            $user['User']['last_name']=$ldnData['last-name'];
                            $user['User']['active']=1;
                            if(isset($ldnData['picture-url'])) {
                                $photo = $this->updateProfilePic($ldnData['picture-url']);
                                $user['UserDetail']['photo']=$photo;
                            }
                            $this->User->save($user,false);
                            $userId=$this->User->getLastInsertID();
                            $user['UserDetail']['user_id']=$userId;
                            $this->UserDetail->save($user,false);
                            $user = $this->User->findById($userId);
                            $this->UserAuth->login($user);
                            $this->Session->write('UserAuth.LinkedinLogin', true);
                            $this->Session->write('UserAuth.LinkedinChangePass', true);
                        } else {
                            $this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
                            $this->render($renderPage);
                        }
                    } else {
                        if ($user['User']['id'] != 1 and $user['User']['active']==0) {
                            $this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'));
                            $this->render($renderPage);
                        } else {
                            $this->UserAuth->login($user);
                            $this->Session->write('UserAuth.LinkedinLogin', true);
                        }
                    }
                }
            }
            $this->render('popup');
        } elseif($connect=='fs') {
            $this->Session->read();
            $this->layout=NULL;
            $fsData=$this->UserConnect->foursquare_connect();
            if(!isset($_GET['code']) && !isset($_GET['error']) && empty($_SESSION['fs_access_token'])) {
                $this->redirect($fsData['url']);
            } else {
                $fsData = json_decode(json_encode($fsData['user_profile']),TRUE);
                if(!empty($fsData) && isset($fsData['user']['contact']['email'])) {
                    $user = $this->User->findByEmail($fsData['user']['contact']['email']);
                    if(empty($user)) {
                        if(SITE_REGISTRATION) {
                            $user['User']['user_group_id']=DEFAULT_GROUP_ID;
                            $user['User']['username']= $this->generateUserName($fsData['user']['firstName']. ' '.$fsData['user']['lastName']);
                            $password = $this->UserAuth->generatePassword();
                            $user['User']['password'] = $this->UserAuth->generatePassword($password);
                            $user['User']['first_name']=$fsData['user']['firstName'];
                            $user['User']['last_name']=$fsData['user']['lastName'];
                            $user['User']['gender']=$fsData['user']['gender'];
                            $user['User']['active']=1;
                            $this->User->save($user,false);
                            $userId=$this->User->getLastInsertID();
                            $user = $this->User->findById($userId);
                            $this->UserAuth->login($user);
                            $this->Session->write('UserAuth.FoursquareLogin', true);
                            $this->Session->write('UserAuth.FoursquareChangePass', true);
                        } else {
                            $this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
                            $this->render($renderPage);
                            $this->redirect("/login");
                        }
                    } else {
                        if ($user['User']['id'] != 1 and $user['User']['active']==0) {
                            $this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'));
                            $this->render($renderPage);
                            $this->redirect("/login");
                        } else {
                            $this->UserAuth->login($user);
                            $this->Session->write('UserAuth.FoursquareLogin', true);
                        }
                    }
                }
            }
            $this->redirect('/login');
        } elseif($connect=='yahoo') {
            $this->Session->read();
            $this->layout=NULL;
            $yahooData=$this->UserConnect->yahoo_connect();
            if(!isset($_GET['openid_mode'])) {
                $this->redirect($yahooData['url']);
            } else {
                if(!empty($yahooData)) {
                    $user = $this->User->findByEmail($yahooData['email']);
                    if(empty($user)) {
                        if(SITE_REGISTRATION) {
                            $user['User']['user_group_id']=DEFAULT_GROUP_ID;
                            $user['User']['username']= $this->generateUserName($yahooData['name']);
                            $password = $this->UserAuth->generatePassword();
                            $user['User']['password'] = $this->UserAuth->generatePassword($password);
                            $user['User']['first_name']=$yahooData['first_name'];
                            $user['User']['last_name']=$yahooData['last_name'];
                            $user['User']['email']=$yahooData['email'];
                            $user['User']['active']=1;
                            $user['User']['email_verified']=1;
                            $user['UserDetail']['gender']=$yahooData['gender'];
                            $this->User->save($user,false);
                            $userId=$this->User->getLastInsertID();
                            $user['UserDetail']['user_id']=$userId;
                            $this->UserDetail->save($user,false);
                            $user = $this->User->findById($userId);
                            $this->UserAuth->login($user);
                            $this->Session->write('UserAuth.YahooLogin', true);
                            $this->Session->write('UserAuth.YahooChangePass', true);
                        } else {
                            $this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
                            $this->render($renderPage);
                        }
                    } else {
                        if($user['User']['email_verified'] !=1) {
                            $user['User']['email_verified']=1;
                            $this->User->save($user,false);
                        }
                        if ($user['User']['id'] != 1 and $user['User']['active']==0) {
                            $this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'));
                            $this->render($renderPage);
                        } else {
                            $this->UserAuth->login($user);
                            $this->Session->write('UserAuth.YahooLogin', true);
                        }
                    }
                }
            }
            $this->render('popup');
        } else if(($connect == null) || (($admin == ADMIN_LOGIN_STRING) && ($connect == 'login') && $from == 'panel')){
            if ($this->request -> isPost()) {
                $this->User->set($this->data);
                 $UserLoginValidate = $this->User->LoginValidate();
                 if($this->RequestHandler->isAjax()) {
                    $this->layout = 'ajax';
                    $this->autoRender = false;
                    if ($UserLoginValidate) {
                        $email  = $this->data['User']['email'];
                        $password = $this->data['User']['password'];
                        if($admin == null) {
                            $user = $this->User->findByEmailNormal($email);
                            if (empty($user)) {
                                $response = array('error' => 1,'message' => 'failure');
                                $response['data']['User']['email'] = "Either the email id or password is incorrect.";
                            } else {
                                $hashed = $this->UserAuth->makePassword($password, $user['User']['salt']);
                                if ($user['User']['password'] === $hashed) {
                                	//$this->UserAuth->login($user);
                                    $response = array('error' => 0, 'message' => 'Success');
                                } else {
                                    $response = array('error' => 1,'message' => 'failure');
                                    $response['data']['User']['email'] = "Either the email id or password is incorrect.";
                                }
                            } 
                        } else {
                        	//$this->UserAuth->login($user);
                            $response = array('error' => 0, 'message' => 'Success');
                        }
                        return json_encode($response);
                    } else {
                        $response = array('error' => 1,'message' => 'failure');
                        $response['data']['User']   = $this->User->validationErrors;
                        return json_encode($response);
                    }
                }
                if($UserLoginValidate) {
                    $email  = $this->data['User']['email'];
                    $password = $this->data['User']['password'];
                    if($admin == ADMIN_LOGIN_STRING){
                        $user = $this->User->findByEmailAdmin($email);
                        if (empty($user)) {
                            $this->Session->setFlash(__('Either the email id or password is incorrect. Please try again'));
                            $this->render($renderPage);
                            return;
                        }
                    }elseif($admin == null){
                        $user = $this->User->findByEmailNormal($email);
                        if (empty($user)) {
                            $this->Session->setFlash(__('Either the email id or password is incorrect. Please try again'));
                            $this->render($renderPage);
                            return;
                        }
                    }
                    
                    $hashed = $this->UserAuth->makePassword($password, $user['User']['salt']);
                    if ($user['User']['password'] === $hashed) {
                        // check for inactive account
                        if ($user['User']['id'] != 1 and $user['User']['active']==0) {
                            $this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'));
                            $this->render($renderPage);
                            return;
                        }
                        // check for verified account
                        if ($user['User']['id'] != 1 and $user['User']['email_verified']==0) {
                            $this->Session->setFlash(__('Your email has not been confirmed please verify your email or contact to Administrator'));
                            $this->render($renderPage);
                            return;
                        }
                        $this->UserAuth->login($user);
                        $remember = (!empty($this->data['User']['remember']));
                        if ($remember) {
                            $this->UserAuth->persist('2 weeks');
                        }
                           $OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
                           $this->Session->delete('Usermgmt.OriginAfterLogin');
						   $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : $this->referer();
                           if($user['User']['user_group_id']==ADMIN){
                           	$this->redirect("/dashboard");
                           }else{
                       	   $this->redirect("/reports/progress");
                       	   }
                    } else {
                        $this->Session->setFlash(__('Either The Email Id Or Password Is Incorrect. Please Try Again'));
                        $this->render($renderPage);
                        return;
                    }
                }
            //$this->redirect("/dashboard");
            //$this->render($renderPage);
            }
            
            $this->render($renderPage);
        }
    }
	/**
	 * Used to generate unique username
	 *
	 * @access private
	 * @return String
	 */
	private function generateUserName($name=null) {
		$username='';
		if(!empty($name)) {
			$username = str_replace(' ', '', strtolower($name));
			while ($this->User->findByUsername($username)) {
				$username = str_replace(' ', '', strtolower($name)) . '_' . rand(1000, 9999);
			}
		}
		return $username;
	}
	/**
	 * Used to logged out from the site
	 *
	 * @access public
	 * @return void
	 */
	public function logout($msg=true) {
		$this->UserAuth->logout();
		if($msg) {
			//$this->Session->setFlash(__('You are successfully signed out'));
		}
		$this->redirect(LOGOUT_REDIRECT_URL);
	}
	/**
	 * Used to register on the site
	 *
	 * @access public
	 * @return void
	 */
	/*
	public function register() {
		$this->layout = '';
		$userId = $this->UserAuth->getUserId();
		if ($userId) {
			$this->redirect("/dashboard");
		}
		if (SITE_REGISTRATION) {
			$userGroups=$this->UserGroup->getGroupsForRegistration();
			$this->set('userGroups', $userGroups);
			if ($this->request -> isPost()) {
				if(USE_RECAPTCHA && !$this->RequestHandler->isAjax()) {
					$this->request->data['User']['captcha']= (isset($this->request->data['recaptcha_response_field'])) ? $this->request->data['recaptcha_response_field'] : "";
				}
				$this->User->set($this->data);
				$UserRegisterValidate = $this->User->RegisterValidate();
				if($this->RequestHandler->isAjax()) {
					$this->layout = 'ajax';
					$this->autoRender = false;
					if ($UserRegisterValidate) {
						$response = array('error' => 0, 'message' => 'Succes');
						return json_encode($response);
					} else {
						$response = array('error' => 1,'message' => 'failure');
						$response['data']['User']   = $this->User->validationErrors;
						return json_encode($response);
					}
				} else {
					if ($UserRegisterValidate) {
						if (!isset($this->data['User']['user_group_id'])) {
							$this->request->data['User']['user_group_id']=DEFAULT_GROUP_ID;
						} elseif (!$this->UserGroup->isAllowedForRegistration($this->data['User']['user_group_id'])) {
							$this->Session->setFlash(__('Please select correct register as'));
							return;
						}
						if (!EMAIL_VERIFICATION) {
							$this->request->data['User']['email_verified']=1;
						}
						$this->request->data['User']['active']=1;
						$salt = $this->UserAuth->makeSalt();
						$this->request->data['User']['salt']=$salt;
						$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
						$this->User->save($this->request->data,false);
						$userId=$this->User->getLastInsertID();
						$user = $this->User->findById($userId);
						if (SEND_REGISTRATION_MAIL && !EMAIL_VERIFICATION) {
							$this->User->sendRegistrationMail($user);
						}
						if (EMAIL_VERIFICATION) {
							$this->User->sendVerificationMail($user);
						}
						if (isset($this->request->data['User']['active']) && $this->request->data['User']['active'] && !EMAIL_VERIFICATION) {
						   $this->UserAuth->login($user);
                           $name        =  isset($this->request->data['User']['first_name'])?$this->request->data['User']['first_name']:'';
                           $last_name   =  isset($this->request->data['User']['last_name'])?$this->request->data['User']['last_name']:'';
                           $email       =  isset($this->request->data['User']['email'])?$this->request->data['User']['email']:'';
						   if(IS_ALLOW_FOR_ONLINE_ONLY =='true'){
                               $this->createOnLeadSquare($name,$email,$last_name);
                           }
                          


                           $OriginAfterLogin = $this->Session->read('Usermgmt.OriginAfterLogin');
                            $this->Session->delete('Usermgmt.OriginAfterLogin');
                            $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : $this->referer();
                            return $this->redirect($redirect);
							//$this->redirect('/dashboard');
						} else {
							$this->Session->setFlash(__('Please check your mail and confirm your registration'));
							$this->redirect('/login');
						}
					}
				}
			}
		} else {
			$this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
			$this->redirect('/login');
		}
	}*/


	public function register() {
		$this->layout = 'guest_layout';
		$userId = $this->UserAuth->getUserId();
		if ($userId) {
			$this->redirect("/dashboard");
		}
		if ($this->request->data) { 
			$userGroups=$this->UserGroup->getGroupsForRegistration();
			$this->set('userGroups', $userGroups);
			if ($this->request -> isPost()) {
				if(USE_RECAPTCHA && !$this->RequestHandler->isAjax()) {
					$this->request->data['User']['captcha']= (isset($this->request->data['recaptcha_response_field'])) ? $this->request->data['recaptcha_response_field'] : "";
				}
				$this->User->set($this->data);
				$UserRegisterValidate = $this->User->RegisterValidate();
				if($this->RequestHandler->isAjax()) {
					$this->layout = 'ajax';
					$this->autoRender = false;
					if ($UserRegisterValidate) {
						$response = array('error' => 0, 'message' => 'Succes');
						return json_encode($response);
					} else {
						$response = array('error' => 1,'message' => 'failure');
						$response['data']['User']   = $this->User->validationErrors;
						return json_encode($response);
					}
				} else {
					if ($UserRegisterValidate) {
						if (!isset($this->data['User']['user_group_id'])) {
							$this->request->data['User']['user_group_id']=DEFAULT_GROUP_ID;
						} elseif (!$this->UserGroup->isAllowedForRegistration($this->data['User']['user_group_id'])) {
							$this->Session->setFlash(__('Please select correct register as'));
							return;
						}
						if (!EMAIL_VERIFICATION) {
							$this->request->data['User']['email_verified']=1;
							$this->request->data['User']['active']=1;
						}
						
						$salt = $this->UserAuth->makeSalt();
						$this->request->data['User']['salt']=$salt;
						$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
						$this->User->save($this->request->data,false);
						$userId=$this->User->getLastInsertID();
						$user = $this->User->findById($userId);

						if (SEND_REGISTRATION_MAIL && !EMAIL_VERIFICATION) {
							$this->User->sendRegistrationMail($user);
						}
						if (EMAIL_VERIFICATION) {
							$this->User->sendVerificationMail($user);
						}
						if (isset($this->request->data['User']['active']) && $this->request->data['User']['active'] && !EMAIL_VERIFICATION) {
						   $this->UserAuth->login($user);
                           $name        =  isset($this->request->data['User']['first_name'])?$this->request->data['User']['first_name']:'';
                           $last_name   =  isset($this->request->data['User']['last_name'])?$this->request->data['User']['last_name']:'';
                           $email       =  isset($this->request->data['User']['email'])?$this->request->data['User']['email']:'';
						   
                           $OriginAfterLogin = $this->Session->read('Usermgmt.OriginAfterLogin');
                            $this->Session->delete('Usermgmt.OriginAfterLogin');
                            $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : $this->referer();
                            return $this->redirect($redirect);
							//$this->redirect('/dashboard');
						} else {
							$this->Session->setFlash(__('Please check your mail and confirm your registration'));
							$this->redirect('/login');
						}
					}
				}
			}
		} /*else {
			$this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
			$this->redirect('/login');
		}*/
	}

    // create a lead on Lead Saquar
	function createOnLeadSquare($name,$email,$last_name){
             $accessKey = LEAD_SQUARE_ACCESS_KEY;
             $secretKey = LEAD_SQUARE_SECRET_KEY;
             $contact_request_type ='Customer-B2C';
             $json_data = '[  {"Attribute":"FirstName", "Value": "'.$name.'"},
                              {"Attribute":"EmailAddress", "Value": "'.$email.'"},
                              {"Attribute":"LastName", "Value": "'.$last_name.'"}, 
                               {"Attribute":"mx_Lead_Type", "Value": "'.$contact_request_type.'"},
                               {"Attribute":"OwnerId", "Value": "'.LEAD_SQUARE_OWNER_ID.'"}
                           ]';
             $url = "https://api.leadsquared.com/v2/LeadManagement.svc/Lead.Create?accessKey=".$accessKey."&secretKey=".$secretKey.""; 
                                        try
                                        {
                                        $curl = curl_init($url);
                                        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($curl, CURLOPT_HEADER, 0);
                                        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
                                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                                        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                                                                                    'Content-Type:application/json',
                                                                                    'Content-Length:'.strlen($json_data)
                                                                                    ));
                                        $json_response = curl_exec($curl);
                                        $response = json_decode($json_response);
                                         curl_close($curl);
                                          } catch (Exception $ex) { 
                                          curl_close($curl);
                                        }
         }
	/**
	 * Used to change the password by user
	 *
	 * @access public
	 * @return void
	 */
	public function changePassword() {
		$userId = $this->UserAuth->getUserId();
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if(!empty($this->request->data['User']['emailVerifyCode']) && !empty($this->request->data['User']['email'])) {
				$tmpEmail = $this->TmpEmail->findByEmail($this->request->data['User']['email']);
				if(!empty($tmpEmail) && $tmpEmail['TmpEmail']['code']==$this->request->data['User']['emailVerifyCode']) {
					$this->User->unbindModel(array('hasMany' => array('LoginToken')));
					$user = $this->User->findById($userId);
					$this->User->unbindModel(array('hasMany' => array('LoginToken')));
					$userOld = $this->User->findByEmail($this->request->data['User']['email']);
					$success=0;
					if($this->Session->check('UserAuth.TwitterChangePass')) {
						$userOld['User']['twt_id']=$user['User']['twt_id'];
						$userOld['User']['twt_access_token']=$user['User']['twt_access_token'];
						$userOld['User']['twt_access_secret']=$user['User']['twt_access_secret'];
						if(empty($userOld['UserDetail']['photo'])) {
							$userOld['UserDetail']['photo'] = $user['UserDetail']['photo'];
						}
						if(empty($userOld['UserDetail']['location'])) {
							$userOld['UserDetail']['location'] = $user['UserDetail']['location'];
						}
						$this->Session->delete('UserAuth.EmailVerifyCode');
						$this->User->saveAssociated($userOld);
						$success=1;
					} elseif ($this->Session->check('UserAuth.LinkedinChangePass')) {
						$userOld['User']['ldn_id']=$user['User']['ldn_id'];
						if(empty($userOld['UserDetail']['photo'])) {
							$userOld['UserDetail']['photo'] = $user['UserDetail']['photo'];
						}
						$this->Session->delete('UserAuth.EmailVerifyCode');
						$this->User->saveAssociated($userOld);
						$success=1;
					}
					if($success) {
						$this->User->delete($userId, false);
						$this->UserDetail->delete($user['UserDetail']['id'], false);
						$this->TmpEmail->delete($tmpEmail['TmpEmail']['id'], false);
						$this->Session->delete('UserAuth.TwitterChangePass');
						$this->Session->delete('UserAuth.LinkedinChangePass');
						$this->UserAuth->login($userOld);
						$this->Session->setFlash(__('Your accounts were successfully merged'));
						$this->redirect('/dashboard');
					}
				} else {
					$this->Session->setFlash(__('Email verification code is incorrect, please try again'));
				}
			}
            if($this->RequestHandler->isAjax()) {
                $this->layout = 'ajax';
                $this->autoRender = false;
                if ($this->User->RegisterValidate()) {
                    $response = array('error' => 0, 'message' => 'Succes');
                    return json_encode($response);
                } else {
                    $response = array('error' => 1,'message' => 'failure');
                    $response['data']['User']   = $this->User->validationErrors;
                    $response['data']['UserDetail'] = $this->UserDetail->validationErrors;
                    return json_encode($response);
                }
            }else{
			if ($this->User->RegisterValidate()) {
				$this->User->id=$userId;
				$salt = $this->UserAuth->makeSalt();
				$this->request->data['User']['salt'] = $salt;
				$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
				$this->User->save($this->request->data,false);
				$user =$this->User->getUserById($userId);
				if(!empty($this->request->data['User']['email'])) {
					$this->User->sendVerificationMail($user);
				}
				if(SEND_PASSWORD_CHANGE_MAIL) {
					$this->User->sendChangePasswordMail($user);
				}
				$this->Session->delete('UserAuth.FacebookChangePass');
				$this->Session->delete('UserAuth.TwitterChangePass');
				$this->Session->delete('UserAuth.GmailChangePass');
				$this->Session->delete('UserAuth.LinkedinChangePass');
				$this->Session->delete('UserAuth.FoursquareChangePass');
				$this->Session->delete('UserAuth.YahooChangePass');
				$this->Session->setFlash(__('Password changed successfully'));
				$this->redirect('/dashboard');
			} else {
				if(isset($this->data['verify']) && !empty($this->request->data['User']['email'])) {
					$emailSent=1;
					if($this->Session->check('UserAuth.EmailVerifyCode')) {
						$emailSent += $this->Session->read('UserAuth.EmailVerifyCode');
					}
					if($emailSent >2) {
						$this->Session->setFlash(__('Sorry we have sent already 2 emails for verification code'));
					} else {
						$code= rand(10000, 1000000);
						$tmpEmail = $this->TmpEmail->findByEmail($this->request->data['User']['email']);
						$tmpEmail['TmpEmail']['code']=$code;
						$tmpEmail['TmpEmail']['email']=$this->request->data['User']['email'];
						$this->TmpEmail->save($tmpEmail, false);
						$this->User->sendVerificationCode($userId, $tmpEmail['TmpEmail']['email'], $code);
						$this->Session->write('UserAuth.EmailVerifyCode', $emailSent);
						$this->Session->setFlash(__('We have sent you an email verification code'));
					}
				}
			}
            }
		}
	}
	/**
	 * Used to change the user password by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function changeUserPassword($userId=null) {
		$page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1;
		if (!empty($userId)) {
			if(!$this->User->isValidUserId($userId)) {
				$this->redirect('/allUsers');
			}
			$name=$this->User->getNameById($userId);
			$this->set('name', $name);
			if ($this->request -> isPost()) {
				$this->User->set($this->data);
				$UserRegisterValidate = $this->User->RegisterValidate();
				if($this->RequestHandler->isAjax()) {
					$this->layout = 'ajax';
					$this->autoRender = false;
					if ($UserRegisterValidate) {
						$response = array('error' => 0, 'message' => 'Succes');
						return json_encode($response);
					} else {
						$response = array('error' => 1,'message' => 'failure');
						$response['data']['User']   = $this->User->validationErrors;
						return json_encode($response);
					}
				} else {
					if ($UserRegisterValidate) {
						$this->User->id=$userId;
						$salt = $this->UserAuth->makeSalt();
						$this->request->data['User']['salt']= $salt;
						$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
						$this->User->save($this->request->data,false);
						$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
						$this->Session->setFlash(__('Password for %s changed successfully', $name));
						$this->redirect(array('action'=>'index', 'page'=>$page));
					}
				}
			}
		} else {
			$this->redirect(array('action'=>'index', 'page'=>$page));
		}
	}
	/**
	 * Used to add user on the site by Admin
	 *
	 * @access public
	 * @return void
	 */
	public function addUser() {
		$userGroups=$this->UserGroup->getGroups();
		unset($userGroups['']);
		$this->set('userGroups', $userGroups);
		if ($this->request -> isPost()) {
			if($this->RequestHandler->isAjax()) {
				configure::write('debug', 0);
				$this->layout = 'ajax';     // uses an empty layout
				$this->autoRender = false;  // renders nothing by default
			}
			$this->User->set($this->data);
			$UserRegisterValidate = $this->User->RegisterValidate();
			if($this->RequestHandler->isAjax()) {
				$this->layout = 'ajax';
				$this->autoRender = false;
				if ($UserRegisterValidate) {
					$response = array('error' => 0, 'message' => 'Succes');
					return json_encode($response);
				} else {
					$response = array('error' => 1,'message' => 'failure');
					$response['data']['User']   = $this->User->validationErrors;
					return json_encode($response);
				}
			} else {
				if ($UserRegisterValidate) {
					sort($this->request->data['User']['user_group_id']);
					$this->request->data['User']['user_group_id'] = implode(',',$this->request->data['User']['user_group_id']);
					$this->request->data['User']['active']=1;
					$this->request->data['User']['email_verified']=1;
					$this->request->data['User']['by_admin']=1;
					$salt = $this->UserAuth->makeSalt();
					$this->request->data['User']['salt']= $salt;
					$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
					$this->User->save($this->request->data,false);
					$userId=$this->User->getLastInsertID();
					$this->request->data['UserDetail']['user_id']=$userId;
					$this->UserDetail->save($this->request->data,false);
					$this->Session->setFlash(__('The user is successfully added'));
					$this->redirect('/addUser');
				}
			}
		}
	}
	/**
	 * Used to edit user on the site by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function editUser($userId=null) {
		$page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1;
		if (!empty($userId)) {
			if(!$this->User->isValidUserId($userId)) {
				$this->redirect('/allUsers');
			}
			$userGroups=$this->UserGroup->getGroups();
			$this->set('userGroups', $userGroups);
			$gender= $this->User->getGenderArray();
			$this->set('gender', $gender);
			$marital= $this->User->getMaritalArray();
			$this->set('marital', $marital);
			if ($this->request -> isPut() || $this->request -> isPost()) {
				$this->User->set($this->data);
				$this->UserDetail->set($this->data);
				$UserRegisterValidate = $this->User->RegisterValidate();
				$UserDetailRegisterValidate = $this->UserDetail->RegisterValidate();
				if($this->RequestHandler->isAjax()) {
					$this->layout = 'ajax';
					$this->autoRender = false;
					if ($UserRegisterValidate && $UserDetailRegisterValidate) {
						$response = array('error' => 0, 'message' => 'Succes');
						return json_encode($response);
					} else {
						$response = array('error' => 1,'message' => 'failure');
						$response['data']['User']   = $this->User->validationErrors;
						$response['data']['UserDetail'] = $this->UserDetail->validationErrors;
						return json_encode($response);
					}
				} else {
					if ($UserRegisterValidate && $UserDetailRegisterValidate) {
						if(is_uploaded_file($this->request->data['UserDetail']['photo']['tmp_name']) && !empty($this->request->data['UserDetail']['photo']['tmp_name']))
						{
							$path_info = pathinfo($this->request->data['UserDetail']['photo']['name']);
							chmod ($this->request->data['UserDetail']['photo']['tmp_name'], 0644);
							$photo=time().mt_rand().".".$path_info['extension'];
							$fullpath= ROOT.DS."app".DS."webroot".DS."img".DS.IMG_DIR;
							$res1 = is_dir($fullpath);
							if($res1 != 1)
								$res2= mkdir($fullpath, 0777, true);
							move_uploaded_file($this->request->data['UserDetail']['photo']['tmp_name'],$fullpath.DS.$photo);
							$this->request->data['UserDetail']['photo']=$photo;
						}
						else {
							unset($this->request->data['UserDetail']['photo']);
						}
						sort($this->request->data['User']['user_group_id']);
						$this->request->data['User']['user_group_id'] = implode(',',$this->request->data['User']['user_group_id']);
						$this->User->saveAssociated($this->request->data);
						$this->Session->setFlash(__('The user is successfully updated'));
						$this->redirect(array('action'=>'index', 'page'=>$page));
					}
				}
			} else {
				$this->User->unbindModel(array('hasMany' => array('LoginToken')));
				$user = $this->User->read(null, $userId);
				$this->request->data=null;
				if (!empty($user)) {
					$user['User']['password']='';
					$this->request->data = $user;
					$this->request->data['User']['user_group_id'] = explode(',',$this->request->data['User']['user_group_id']);
				}
			}
		} else {
			$this->redirect(array('action'=>'index', 'page'=>$page));
		}
	}
	/**
	 * Used to delete the user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function deleteUser($userId = null) {
		$page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1;
		$msg="Sorry there was a problem, please try again";
		$status=0;
		if (!empty($userId)) {
			if ($this->request -> isPost() || $this->RequestHandler->isAjax()) {
				if ($this->User->delete($userId, false)) {
					$this->UserDetail->deleteAll(array('UserDetail.user_id'=>$userId), false);
					$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
					$this->UserActivity->updateAll(array('UserActivity.deleted'=>1), array('UserActivity.user_id'=>$userId));
					$msg = __('User is successfully deleted');
					$status=1;
				}
			}
		}
		if($this->RequestHandler->isAjax()) {
			$this->set('userId', $userId);
			$this->set('result', $status);
			$this->set('funcName', 'deleteUser');
			$this->set('updateMsg', $msg);
			$this->render('Elements/update_div');
		} else {
			$this->Session->setFlash($msg);
			$this->redirect(array('action'=>'index', 'page'=>$page));
		}
	}
	/**
	 * Used to delete the user by self
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function deleteAccount($userId = null) {
		if (!empty($userId)) {
			if ($this->request -> isPost()) {
				if(ALLOW_DELETE_ACCOUNT) {
					if ($this->User->delete($userId)) {
						$this->UserDetail->deleteAll(array('UserDetail.user_id'=>$userId), false);
						$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
						$this->UserActivity->updateAll(array('UserActivity.deleted'=>1), array('UserActivity.user_id'=>$userId));
						$this->Session->setFlash(__('Your account is successfully deleted'));
						$this->logout(false);
					}
				}
			}
			$this->redirect('/dashboard');
		} else {
			$this->redirect('/dashboard');
		}
	}
	/**
	 * Used to logout the user by Admin
	 *
	 * @access public
	  * @param integer $userId user id of user
	 * @return void
	 */
	public function logoutUser($userId = null) {
		if (!empty($userId)) {
			if ($this->request -> isPost()) {
				$this->UserActivity->updateAll(array('UserActivity.logout'=>1), array('UserActivity.user_id'=>$userId));
				$this->Session->setFlash(__('User is successfully signed out'));
			}
			$this->redirect('/usersOnline');
		} else {
			$this->redirect('/usersOnline');
		}
	}
	/**
	 * Used to logout the user and make inactive by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function makeInactive($userId = null) {
		if ($this->request -> isPost()) {
			if (!empty($userId)) {
				$this->UserActivity->updateAll(array('UserActivity.logout'=>1), array('UserActivity.user_id'=>$userId));
				$this->User->updateAll(array('User.active'=>0), array('User.id'=>$userId));
				$this->Session->setFlash(__('User is successfully signed out and deactivated'));
			}
			$this->redirect('/usersOnline');
		} else {
			$this->redirect('/usersOnline');
		}
	}
	/**
	 * Used to show dashboard of the user
	 *
	 * @access public
	 * @return array
	 */
	public function dashboard() {
        if($this->UserAuth->getGroupId() == '2'){
            //$this->layout = '';
            $this->set('isUser', true);
        }
        
	}
	/**
	 * Used to activate or deactivate user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @param integer $active active or inactive
	 * @return void
	 */
	public function makeActiveInactive($userId = null, $active=0) {
		$page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1;
		$msg="Sorry there was a problem, please try again";
		if (!empty($userId)) {
			if ($this->request -> isPost() || $this->RequestHandler->isAjax()) {
				$this->User->updateAll(array('User.active'=>$active), array('User.id'=>$userId));
				if($active) {
					$res = $this->UserActivity->updateAll(array('UserActivity.logout'=>0), array('UserActivity.user_id'=>$userId));
					if($res) {
						$msg = __('User is successfully activated');
						$active = 0;
					}

				} else {
					$res = $this->UserActivity->updateAll(array('UserActivity.logout'=>1), array('UserActivity.user_id'=>$userId));
					if($res) {
						$msg = __('User is successfully deactivated');
						$active = 1;
					}
				}
			}
		}
		if($this->RequestHandler->isAjax()) {
			$this->set('userId', $userId);
			$this->set('result', $active);
			$this->set('funcName', 'makeActiveInactive');
			$this->set('updateMsg', $msg);
			$this->render('Elements/update_div');
		} else {
			$this->Session->setFlash($msg);
			$this->redirect(array('action'=>'index', 'page'=>$page));
		}
	}
	/**
	 * Used to verify email of user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function verifyEmail($userId = null) {
		$page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1;
		$msg="Sorry there was a problem, please try again";
		$status=0;
		if (!empty($userId)) {
			if ($this->request -> isPost() || $this->RequestHandler->isAjax()) {
				$this->User->updateAll(array('User.email_verified'=>1), array('User.id'=>$userId));
				$msg = __('User email is successfully verified');
				$status=1;
			}
		}
		if($this->RequestHandler->isAjax()) {
			$this->set('userId', $userId);
			$this->set('result', $status);
			$this->set('funcName', 'verifyEmail');
			$this->set('updateMsg', $msg);
			$this->render('Elements/update_div');
		} else {
			$this->Session->setFlash($msg);
			$this->redirect(array('action'=>'index', 'page'=>$page));
		}
	}
	/**
	 * Used to show access denied page if user want to view the page without permission
	 *
	 * @access public
	 * @return void
	 */
	public function accessDenied() {
		$this->layout='user_layout_new';
        	
		$userId = $this->UserAuth->getUserId();
        $user = $this->User->read(null, $userId);
        $user_group_id = $user['User']['user_group_id'];
        $user_group = $this->UserGroup->find('first', array('conditions'=>array('UserGroup.id'=>$user_group_id), 'fields'=>array('UserGroup.role_for'),'recursive'=>-1));
        if($user_group['UserGroup']['role_for']==1);
        {
        	$this->layout='user_layout_new';
        	$this->render("user_access_denied");
        }
	}
	/**
	 * Used to verify user's email address
	 *
	 * @access public
	 * @return void
	 */
	public function userVerification() {
		if (isset($_GET['ident']) && isset($_GET['activate'])) {
			$userId= $_GET['ident'];
			$activateKey= $_GET['activate'];
			$user = $this->User->read(null, $userId);
			if (!empty($user)) {
				if (!$user['User']['email_verified']) {
					$password = $user['User']['password'];
					$theKey = $this->User->getActivationKey($password);
					if ($activateKey==$theKey) {
						$user['User']['email_verified']=1;
						$res= $this->User->save($user,false);
						if (SEND_REGISTRATION_MAIL && EMAIL_VERIFICATION) {
							$this->User->sendRegistrationMail($user);
						}
						if($user['User']['active']==1)
						{
						$this->Session->setFlash(__('Thank you, your account is activated now'));
						}else{
						$this->Session->setFlash(__('Thank you, your email verified but account will activate by admin.'));
						}
					}
				} else {
					$this->Session->setFlash(__('Thank you, your account is already activated'));
				}
			} else {
				$this->Session->setFlash(__('Sorry something went wrong, please click on the link again'));
			}
		} else {
			$this->Session->setFlash(__('Sorry something went wrong, please click on the link again'));
		}
		$this->redirect('/login');
	}
	/**
	 * Used to send forgot password email to user
	 *
	 * @access public
	 * @return void
	 */
	public function forgotPassword() {
		$this->layout = 'guest_layout';
		$userId = $this->UserAuth->getUserId();
        if ($userId) {
            // redirect to home page
            $this->redirect("/");
        }
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->LoginValidate()) {
				$email  = $this->data['User']['email'];
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('This email ID is not registered with us. Please check the ID once again.'));
						return;
					}
				
				// check for unverified account
				if ($user['User']['id'] != 1 and $user['User']['email_verified']==0) {
					$this->Session->setFlash(__('Your registration has not been confirmed yet please verify your email before reset password'));
					return;
				}
				$this->User->sendForgotPasswordMail($user);
				$this->Session->setFlash(__('Your password reset link has been sent to your registered email id.'));
				$this->redirect('/login');
			}
		}
	}
	/**
	 * Used to send email verification mail to user
	 *
	 * @access public
	 * @return void
	 */
	public function emailVerification() {
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->LoginValidate()) {
				$email  = $this->data['User']['email'];
				$user = $this->User->findByUsername($email);
				if (empty($user)) {
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('Either The Email Id Or Password Is Incorrect. Please Try Again'));
						return;
					}
				}
				if($user['User']['email_verified']==0) {
					$this->User->sendVerificationMail($user);
					$this->Session->setFlash(__('Please check your mail to verify your email'));
				} else {
					$this->Session->setFlash(__('Your email is already verified'));
				}
				$this->redirect('/login');
			}
		}
	}
	/**
	 *  Used to reset password when user comes on the by clicking the password reset link from their email.
	 *
	 * @access public
	 * @return void
	 */
	public function activatePassword() {
		$this->layout = "front_layout";
		if ($this->request -> isPost()) {
			if (!empty($this->data['User']['ident']) && !empty($this->data['User']['activate'])) {
				$this->set('ident',$this->data['User']['ident']);
				$this->set('activate',$this->data['User']['activate']);
				$this->User->set($this->data);
				if ($this->User->RegisterValidate()) {
					$userId= $this->data['User']['ident'];
					$activateKey= $this->data['User']['activate'];
					$user = $this->User->read(null, $userId);
					if (!empty($user)) {
						$password = $user['User']['password'];
						$thekey =$this->User->getActivationKey($password);
						if ($thekey==$activateKey) {
							$user['User']['password']=$this->data['User']['password'];
							$salt = $this->UserAuth->makeSalt();
							$user['User']['salt']= $salt;
							$user['User']['password'] = $this->UserAuth->makePassword($user['User']['password'], $salt);
							$this->User->save($user,false);
							$this->Session->setFlash(__('Your password has been reset successfully'));
							$this->redirect('/login');
						} else {
							$this->Session->setFlash(__('Something went wrong, please send password reset link again'));
						}
					} else {
						$this->Session->setFlash(__('Something went wrong, please click again on the link in email'));
					}
				}
			} else {
				$this->Session->setFlash(__('Something went wrong, please click again on the link in email'));
			}
		} else {
			if (isset($_GET['ident']) && isset($_GET['activate'])) {
				$this->set('ident',$_GET['ident']);
				$this->set('activate',$_GET['activate']);
			}
		}
	}
	/**
	 *  Used to update profile pic from given url
	 *
	 * @access private
	 * @param integer $file_location url of pic
	 * @return String
	 */
	private function updateProfilePic($file_location) {
		$fullpath= WWW_ROOT."tmp";
		$res1 = is_dir($fullpath);
		if($res1 != 1) {
			$res2= mkdir($fullpath, 0777, true);
		}
		$imgContent = file_get_contents($file_location);
		$photo=time().mt_rand().".jpg";
		$tempfile=$fullpath.DS.$photo;
		$fp = fopen($tempfile, "w");
		fwrite($fp, $imgContent);
		fclose($fp);
		$fullimagepath= WWW_ROOT."img".DS.IMG_DIR;
		rename($tempfile, $fullimagepath.DS.$photo);
		return $photo;
	}
	/**
	 *  Used to delete cache of cakephp on production
	 *
	 * @access public
	 * @return void
	 */
	public function deleteCache() {
		$iterator = new RecursiveDirectoryIterator(CACHE);
		foreach (new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST) as $file) {
			$path_info = pathinfo($file);
			if($path_info['dirname']==CACHE."models"  && $path_info['basename']!='.svn') {
				@unlink($file->getPathname());
			}
			if($path_info['dirname']==CACHE."persistent"  && $path_info['basename']!='.svn') {
				@unlink($file->getPathname());
			}
			if($path_info['dirname']==CACHE."views"  && $path_info['basename']!='.svn') {
				@unlink($file->getPathname());
			}
			if($path_info['dirname']==TMP."cache" && $path_info['basename']!='.svn') {
				if(!is_dir($file->getPathname())) {
					@unlink($file->getPathname());
				}
			}
		}
		$this->Session->setFlash('Cache has been deleted successfully');
		$this->redirect('/dashboard');
	}
	/**
	 *  Used to view user's permissions by admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function viewUserPermissions($userId) {
		$name='';
		$permissions=array();
		if (!empty($userId)) {
			$user = $this->User->read(null, $userId);
			if (!empty($user)) {
				$name = trim($user['User']['first_name']." ".$user['User']['last_name']);
				$userGroupIDArray= explode(',', $user['User']['user_group_id']);
				$userGroupIDArray = array_map('trim', $userGroupIDArray);
				$result = $this->UserGroupPermission->find('all',array('conditions'=>array('UserGroupPermission.user_group_id' => $userGroupIDArray, 'UserGroupPermission.allowed'=>1), 'fields'=>array('UserGroupPermission.controller', 'UserGroupPermission.action', 'UserGroup.name'), 'order'=>'UserGroupPermission.controller'));
				$allControllers=$this->ControllerList->getControllers();
				$allControllers = array_flip($allControllers);
				foreach($result as $row) {
					$conAct = $row['UserGroupPermission']['controller'].'/'.$row['UserGroupPermission']['action'];
					if(isset($permissions[$conAct])) {
						$permissions[$conAct]['group'] .= ", ".$row['UserGroup']['name'];
					} else {
						$permissions[$conAct]['controller'] = $row['UserGroupPermission']['controller'];
						$permissions[$conAct]['action'] = $row['UserGroupPermission']['action'];
						$permissions[$conAct]['group'] = $row['UserGroup']['name'];
						$permissions[$conAct]['index'] = $allControllers[$row['UserGroupPermission']['controller']];
					}
				}
				$this->set('permissions',$permissions);
				$this->set('name',$name);
			}
		}
		$this->set('permissions',$permissions);
		$this->set('name',$name);
	}

	public function add_employee()
	{
		$this->layout='user_layout_new';
		$owner_id = $this->Common->getOwnerId();
		if($this->request->data){
			$this->User->set($this->data);
			$EmployeeValidate = $this->User->EmployeeValidate();
			$user_id = $this->UserAuth->getUserId();
			$this->request->data['User']['owner_id'] = $owner_id;
			$this->request->data['User']['active'] = true;
			$this->request->data['User']['email_verified'] = true;
			$this->request->data['User']['company_id'] = json_encode($this->request->data['User']['company_id']);
			if($this->User->save($this->request->data))
    		{
	    		$userId=$this->User->getLastInsertID();
				$user = $this->User->findById($userId);	
	    		$this->User->sendEmpNotificationMail($user);	
	    		$this->Session->setFlash(__('User has been added and sent invitation successfully.'));
	            $this->redirect("/UserActivity/everyone");
    		}
		}

        $roles = $this->UserGroup->find('list', array('recursive'=>-1, 'fields'=>array('UserGroup.id','UserGroup.name'), 'conditions'=>array('UserGroup.role_for'=>1)));
        $companies = $this->Company->find('list', array('recursive'=>-1, 'fields'=>array('Company.id','Company.company_name'), 'conditions'=>array('Company.user_id'=>$owner_id)));
        
        $this->set(compact('roles','companies'));
	}

	

	public function userInvitation() {
		$this->layout = "guest_layout";
		if ($this->request -> isPost()) {
			if (!empty($this->data['User']['ident']) && !empty($this->data['User']['activate'])) {
				$this->set('ident',$this->data['User']['ident']);
				$this->set('activate',$this->data['User']['activate']);
				$this->User->set($this->data);
				if ($this->User->RegisterValidate()) {
					$userId= $this->data['User']['ident'];
					$activateKey= $this->data['User']['activate'];
					$user = $this->User->read(null, $userId);
					if (!empty($user)) {
						$password = $user['User']['first_name'];
						$thekey =$this->User->getActivationKey($password);
						if ($thekey==$activateKey) {
							$user['User']['password']=$this->data['User']['password'];
							$salt = $this->UserAuth->makeSalt();
							$user['User']['salt']= $salt;
							$user['User']['password'] = $this->UserAuth->makePassword($user['User']['password'], $salt);
							$user['User']['email_verified']=1;
							$this->User->save($user,false);
							$this->Session->setFlash(__('Your password has been saved successfully'));
							$this->redirect('/login');
						} else {
							$this->Session->setFlash(__('Something went wrong, please send password reset link again'));
						}
					} else {
						$this->Session->setFlash(__('Something went wrong, please click again on the link in email'));
					}
				}
			} else {
				$this->Session->setFlash(__('Something went wrong, please click again on the link in email'));
			}
		} else {
			if (isset($_GET['ident']) && isset($_GET['activate'])) {
				$userId = $_GET['ident'];
				$user = $this->User->findById($userId);
				
				$this->set('user',$user);
				$this->set('ident',$_GET['ident']);
				$this->set('activate',$_GET['activate']);
			}
		}
	}


	public function edit_employee($id)
	{
		$this->layout='user_layout_new';
		$owner_id = $this->Common->getOwnerId();
		$user_id = $this->UserAuth->getUserId();
		if($this->request->data){
			$this->User->set($this->data);
			//$this->request->data['User']['owner_id'] = $user_id;
			$this->request->data['User']['id'] = $id;
			$this->request->data['User']['company_id'] = json_encode($this->request->data['User']['company_id']);
			if($this->User->save($this->request->data))
    		{
	    		$this->Session->setFlash(__('User has been added and sent invitation successfully.'));
	            $this->redirect("/UserActivity/everyone");
    		}
		}else{
			$data = $this->User->read(null, $id);
            $this->request->data = $data;
            
		}
		$user_group_id = $this->request->data['User']['user_group_id'];
		$selected_company_ids = json_decode($this->request->data['User']['company_id']);
		
        $roles = $this->UserGroup->find('list', array('recursive'=>-1, 'fields'=>array('UserGroup.id','UserGroup.name'), 'conditions'=>array('UserGroup.role_for'=>1)));
        $companies = $this->Company->find('list', array('recursive'=>-1, 'fields'=>array('Company.id','Company.company_name'), 'conditions'=>array('Company.user_id'=>$owner_id)));
        $selected_companies = $this->Company->find('list', array('recursive'=>-1, 'fields'=>array('Company.id','Company.company_name'), 'conditions'=>array('Company.id'=>$selected_company_ids)));
        
        $this->set(compact('roles', 'user_group_id','companies','selected_companies','selected_company_ids','owner_id','user_id'));
	}

	public function sub_user($owner_id) {
		//$this->layout = 'user';
		$this->User->unbindModel( array('hasMany' => array('LoginToken')));
		$this->paginate = array('limit' => 10, 'order'=>'User.id desc', 'conditions'=>array('User.owner_id'=>$owner_id));
		$users = $this->paginate('User');
		$i=0;
		foreach($users as $user) {
			$users[$i]['UserGroup']['name']=$this->UserGroup->getGroupsByIds($user['User']['user_group_id']);
			$i++;
		}
		$this->set('users', $users);
		if($this->RequestHandler->isAjax()) {
			$this->layout = 'ajax';
		}
	}

}