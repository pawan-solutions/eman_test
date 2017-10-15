<?php

class UserAuthComponent extends Component {
	/**
	 * This component uses following components
	 *
	 * @var array
	 */
	var $components = array('Session', 'Cookie', 'RequestHandler', 'Usermgmt.Ssl');
	/**
	 * configur key
	 *
	 * @var string
	 */
	var $configureKey='User';

	function initialize(Controller $controller) {

	}

	function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
	}

	function startup(Controller $controller = null) {

	}
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @param object $c current controller object
	 * @return void
	 */
	function beforeFilter(Controller $c) {
		$user = $this->__getActiveUser();
		UsermgmtInIt($this);
		$pageRedirect = $c->Session->read('permission_error_redirect');
		$c->Session->delete('permission_error_redirect');
		$controller = $c->params['controller']; 
		$action = $c->params['action'];
	    $actionUrl = $controller.'/'.$action;
	    $this->updateActivity($c, $actionUrl);
	    $requested= (isset($controller->params['requested']) && $controller->params['requested']==1) ? true : false;
		$permissionFree = array('users/login', 'users/logout', 'users/register', 'users/userVerification', 'users/forgotPassword', 'users/activatePassword', 'pages/display', 'users/accessDenied', 'users/emailVerification', 'pages/index', "storage_spaces/location_suggestion", "storage_spaces/search", "storage_spaces/view", "reviews/reviewResults", "reviewDetails/save", "storage_spaces/marketing", "storage_spaces/marketing", "contacts/saveContact", "storage_spaces/storage_images", "storageContacts/saveStorageContact", "storage_inventories/getYearlyStorageAvailSpaces",'webservice/actionInventory','webservice/callAgain');
		if ((empty($pageRedirect) || $actionUrl!='users/login') && !$requested && !in_array($actionUrl, $permissionFree)) {
			
			App::import("Model", "Usermgmt.UserGroup");
			$userGroupModel = new UserGroup;
            if (!$this->isLogged()) {
                  
				if (!$userGroupModel->isGuestAccess($controller, $action)) {
					$c->log('permission: actionUrl-'.$actionUrl, LOG_DEBUG);
					$c->Session->write('permission_error_redirect','/users/login');
					//$c->Session->setFlash('You need to be signed in to view this page.');
					$cUrl = '/'.$c->params->url;
					if(!empty($_SERVER['QUERY_STRING'])) {
						$rUrl = $_SERVER['REQUEST_URI'];
						$pos =strpos($rUrl, $cUrl);
						$cUrl=substr($rUrl, $pos, strlen($rUrl));
					}
					$c->Session->write('Usermgmt.OriginAfterLogin', $cUrl);
                    
                    if($c->RequestHandler->isAjax ()) {
                        $this->layout = false;
                        echo json_encode(array("status"=> "access_denied", "url" => false));
                        exit;
                    } else {
                        $c->redirect('/login');
                    }
				}
			} else {
				   
				if (!$userGroupModel->isUserGroupAccess($controller, $action, $this->getGroupId())) {
                   
					$c->log('permission: actionUrl-'.$actionUrl, LOG_DEBUG);
					$c->Session->write('permission_error_redirect','/users/login');
					$c->redirect('/accessDenied');
					
					
				}
			}
		}
	}
	function beforeRender(Controller $c) {
		if(defined('USE_HTTPS') && USE_HTTPS) {
			$this->Ssl->force($c);
		} else {
			$controller = $c->params['controller'];
			$action = $c->params['action'];
			$actionUrl = strtolower($controller.'/'.$action);
			if(defined('HTTPS_URLS')) {
				$httpsUrls= explode(',', strtolower(HTTPS_URLS));
				$httpsUrls = array_map('trim', $httpsUrls);
				if(in_array($actionUrl, $httpsUrls)) {
					$this->Ssl->force($c);
				} else {
					$this->Ssl->unforce($c);
				}
			}
		}
		$var = $this->getUser();
		if(isset($var['LoginToken'])) {
			unset($var['LoginToken']);
		}
		if(isset($var['Search'])) {
			unset($var['Search']);
		}
		$c->set('var', $var);
	}
	/**
	 * Used to check whether user is logged in or not
	 *
	 * @access public
	 * @return boolean
	 */
	public function isLogged() {
		return ($this->getUserId() !== null);
	}
	/**
	 * Used to get user from session
	 *
	 * @access public
	 * @return array
	 */
	public function getUser() {
		return $this->Session->read('UserAuth');
	}
	/**
	 * Used to get user id from session
	 *
	 * @access public
	 * @return integer
	 */
	public function getUserId() {
		 return $this->Session->read('UserAuth.User.id'); 
	}
	/**
	 * Used to get group id from session
	 *
	 * @access public
	 * @return integer
	 */
	public function getGroupId() {
		return $this->Session->read('UserAuth.User.user_group_id');
	}
	/**
	 * Used to get group name from session
	 *
	 * @access public
	 * @return string
	 */
	public function getGroupName() {
		return $this->Session->read('UserAuth.UserGroup.name');
	}
	/**
	 * Used to check is admin logged in
	 *
	 * @access public
	 * @return string
	 */
	public function isAdmin() {
		$idName = $this->Session->read('UserAuth.UserGroup.idName');
		if(isset($idName[ADMIN_GROUP_ID])) {
			return true;
		}
		return false;
	}
	/**
	 * Used to check is guest logged in
	 *
	 * @access public
	 * @return string
	 */
	public function isGuest() {
		$idName = $this->Session->read('UserAuth.UserGroup.idName');
		if(empty($idName)) {
			return true;
		}
		return false;
	}
	/**
	 * Used to make password in hash format
	 *
	 * @access public
	 * @param string $pass password of user
	 * @param string $salt salt of user for password
	 * @return hash
	 */
	public function makePassword($pass, $salt) {
		return md5(md5($pass).md5($salt));
	}
	/**
	 * Used to make salt in hash format
	 *
	 * @access public
	 * @return hash
	 */
	public function makeSalt() {
		$rand = mt_rand(0, 32);
		$salt = md5($rand . time());
		return $salt;
	}
	/**
	 * Used to generate random password
	 *
	 * @access public
	 * @return string
	 */
	public function generatePassword()  {
		$rand = mt_rand(0, 32);
		$newpass = md5($rand . time());
		$newpass = substr($newpass, 0,7);
		return md5($newpass);
	}
	/**
	 * Used to maintain login session of user
	 *
	 * @access public
	 * @param mixed $type possible values 'guest', 'cookie', user array
	 * @param string $credentials credentials of cookie, default null
	 * @return array
	 */
	public function login($type = 'guest', $credentials = null) {
		$user=array();
		App::import("Model", "Usermgmt.User");
		$userModel = new User;
		if (is_string($type) && ($type=='guest' || $type=='cookie')) {
			$user = $userModel->authsomeLogin($type, $credentials);
		} elseif (is_array($type)) {
			$user =$type;
		}
		if(isset($user['User']['user_group_id'])) {
			App::import("Model", "Usermgmt.UserGroup");
			$userGroupModel = new UserGroup;
			$groups = $userGroupModel->getGroupsByIds($user['User']['user_group_id'], true);
			$user['UserGroup']['idName']=$groups;
			$user['UserGroup']['Name']=implode(', ', $groups);
		}
		Configure::write($this->configureKey, $user);
		$this->Session->write('UserAuth', $user);
		if(isset($user['User']['id'])) {
			$user['User']['last_login']=date('Y-m-d h:i:s');
			$userModel->save($user,false);
		}
		return $user;
	}
	/**
	 * Used to delete user session and cookie
	 *
	 * @access public
	 * @return void
	 */
	public function logout() {
		$this->deleteActivity($this->getUserId());
		$this->Session->delete('UserAuth');
		Configure::write($this->configureKey, array());
		$this->Cookie->delete('UMPremiumCookie');
	}
	/**
	 * Used to persist cookie for remember me functionality
	 *
	 * @access public
	 * @param string $duration duration of cookie life time on user's machine
	 * @return boolean
	 */
	public function persist($duration = '2 weeks') {
		App::import("Model", "Usermgmt.User");
		$userModel = new User;
		$token = $userModel->authsomePersist($this->getUserId(), $duration);
		$token = $token.':'.$duration;
		return $this->Cookie->write(
			'UMPremiumCookie',
			$token,
			true, // encrypt = true
			$duration
		);
	}
	/**
	 * Used to check user's session if user's session is not available then it tries to get login from cookie if it exist
	 *
	 * @access private
	 * @return array
	 */
	private function __getActiveUser() {
		$user = Configure::read($this->configureKey);
		if (!empty($user)) {
			return $user;
		}

		$this->__useSession() || $this->__useCookieToken() || $this->__useGuestAccount();

		$user = Configure::read($this->configureKey);
		if (is_null($user)) {
			throw new Exception(
				'Unable to initilize user'
			);
		}
		return $user;
	}
	/**
	 * Used to get user from session
	 *
	 * @access private
	 * @return boolean
	 */
	private function __useSession() {
		$user = $this->getUser();
		if (!$user) {
			return false;
		}
		Configure::write($this->configureKey, $user);
		return true;
	}
	/**
	 * Used to get login from cookie
	 *
	 * @access private
	 * @return boolean
	 */
	private function __useCookieToken() {
		$token = $this->Cookie->read('UMPremiumCookie');
		if (!$token) {
			return false;
		}

		// Extract the duration appendix from the token
		$tokenParts = split(':', $token);
		$duration = array_pop($tokenParts);
		$token = join(':', $tokenParts);
		$user = $this->login('cookie', compact('token', 'duration'));
		// Delete the cookie once its been used
		$this->Cookie->delete('UMPremiumCookie');
		if (!$user) {
			return;
		}
		$this->persist($duration);
		return (bool)$user;
	}
	/**
	 * Used to get login as guest
	 *
	 * @access private
	 * @return array
	 */
	private function __useGuestAccount() {
		return $this->login('guest');
	}
	/**
	 * Used to update update activities of user or a guest
	 *
	 * @access private
	 * @return void
	 */
	private function updateActivity($c, $actionUrl) {
		if(($actionUrl !='users/logout' && $actionUrl !='users/login' && !isset($c->params['requested']) && !isset($c->RequestHandler->__acceptTypes[0])) || ($actionUrl !='users/logout' && $actionUrl !='users/login' && isset($c->RequestHandler->__acceptTypes[0]) && $c->RequestHandler->__acceptTypes[0]=='text/html')) {
			$useragent=$this->Session->read('Config.userAgent');
			$user_id=$this->getUserId();
			$last_action=$this->Session->read('Config.time');
			$last_url=$c->here;
			$user_browser=(isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : "";
			$ip=(isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : "";

			App::import("Model", "Usermgmt.UserActivity");
			$activityModel = new UserActivity;
			$activityModel->id=null;
			$res=$activityModel->findByUseragent($useragent);
			if(!empty($res['UserActivity']['logout'])) {
				$c->redirect('/logout');
			}
			if(!empty($res['UserActivity']['deleted'])) {
				$c->redirect('/logout');
			}
			$status = ($user_id) ? 1 : 0;
			$res['UserActivity']['useragent']=$useragent;
			$res['UserActivity']['user_id']=$user_id;
			$res['UserActivity']['last_action']=$last_action;
			$res['UserActivity']['last_url']=$last_url;
			$res['UserActivity']['user_browser']=$user_browser;
			$res['UserActivity']['ip_address']=$ip;
			$res['UserActivity']['status']=$status;
			unset($res['UserActivity']['modified']);
			$activityModel->save($res, false);
		}
	}
	/**
	 * Used to delete activity after logout
	 *
	 * @access public
	 * @return void
	 */
	public function deleteActivity($user_id) {
		if(!empty($user_id)) {
			App::import("Model", "Usermgmt.UserActivity");
			$activityModel = new UserActivity;
			$activityModel->deleteAll(array('UserActivity.user_id'=>$user_id), false);
		}
	}
}