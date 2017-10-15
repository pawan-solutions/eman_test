<?php


App::uses('UserMgmtAppModel', 'Usermgmt.Model');
App::uses('CakeEmail', 'Network/Email');

class User extends UserMgmtAppModel {

	/**
	 * This model has following models
	 *
	 * @var array
	 */
	var $hasMany = array('LoginToken'=>array('className'=>'Usermgmt.LoginToken','limit' =>1));
	var $hasOne = array('Usermgmt.UserDetail');
	/**
	 * model validation array
	 *
	 * @var array
	 */
	var $validate = array();
	/**
	 * UsetAuth component object
	 *
	 * @var object
	 */
	var $userAuth;
	/**
	 * model validation array
	 *
	 * @var array
	 */
	function LoginValidate() {
		$validate1 = array(
				'email'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter email'
                      ),
                    'mustBeEmail'=> array(
						'rule' => array('email'),
						'message' => 'Please enter valid email',
						'last'=>true
                     )
                ),
				'password'=>array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter password')
					)
			);
		$this->validate=$validate1;
		return $this->validates();
	}
	/**
	 * model validation array
	 *
	 * @var array
	 */
	function RegisterValidate() {
		$validate1 = array(
				"user_group_id" => array(
					'rule' => array('multiple', array('min' => 1)),
					'message'=> 'Please select group'),
				/*'username'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter username',
						'last'=>true),
					'mustAlphaNumeric'=>array(
						'rule' => 'alphaNumericDashUnderscore',
						'message'=> 'Username must be alphaNumeric',
						'last'=>true),
					'mustAlpha'=>array(
						'rule' => 'alpha',
						'message'=> 'Username must contain any letter',
						'last'=>true),
					'mustUnique'=>array(
						'rule' =>'isUnique',
						'message' =>'This username already taken',
						'last'=>true),
					'mustNotBanned'=>array(
						'rule' =>'isBanned',
						'message' =>'',
						'last'=>true),
					'mustBeLonger'=>array(
						'rule' => array('minLength', 4),
						'message'=> 'Username must be greater than 3 characters',
						'last'=>true),
					),*/
				'first_name'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter first name',
						'last'=>true),
					'mustAlphaNumeric'=>array(
						'rule' => 'alphaNumericDashUnderscoreSpace',
						'message'=> 'Please enter valid first name',
						'last'=>true),
					'mustAlpha'=>array(
						'rule' => 'alpha',
						'message'=> 'Please enter valid first name',
						'last'=>true),
					),
				/*'last_name'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter last name',
						'last'=>true),
					'mustAlphaNumeric'=>array(
						'rule' => 'alphaNumericDashUnderscoreSpace',
						'message'=> 'Please enter valid last name',
						'last'=>true),
					'mustAlpha'=>array(
						'rule' => 'alpha',
						'message'=> 'Please enter valid last name',
						'last'=>true),
					),*/
				'email'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter email',
						'last'=>true),
					'mustBeEmail'=> array(
						'rule' => array('email'),
						'message' => 'Please enter valid email',
						'last'=>true),
					'mustUnique'=>array(
						'rule' =>'isUnique',
						/* Please note if you want to change this message then also change this in change_password.ctp */
						'message' =>'This email is already registered'
						)
					),
				'oldpassword'=>array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter old password',
						'last'=>true),
					'mustMatch'=>array(
						'rule' => array('verifyOldPass'),
						'message' => 'Please enter correct old password'),
					),
				'password'=>array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter password',
						'on' => 'create',
						'last'=>true),
					'mustBeLonger'=>array(
						'rule' => array('minLength', 6),
						'message'=> 'Password must be greater than 5 characters',
						'on' => 'create',
						'last'=>true),
					'mustMatch'=>array(
						'rule' => array('verifies'),
						'message' => 'Both passwords must match'),
					),
				//'captcha'=>array(
					//'mustMatch'=>array(
					//	'rule' => array('recaptchaValidate'),
					//	'message' => ''),
					//)
			);
		$this->validate=$validate1;
		return $this->validates();
	}
	/**
	 * Used to validate captcha
	 *
	 * @access protected
	 * @return boolean
	 */

	function EmployeeValidate() {
		$validate1 = array(
				'first_name'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter full name',
						'last'=>true),
					'mustAlpha'=>array(
						'rule' => 'alpha',
						'message'=> 'Please enter valid full name',
						'last'=>true),
					),
				'email'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter email'
                      ),
                    'mustBeEmail'=> array(
						'rule' => array('email'),
						'message' => 'Please enter valid email',
						'last'=>true
                     ),
                    'mustUnique'=>array(
						'rule' =>'isUnique',
						/* Please note if you want to change this message then also change this in change_password.ctp */
						'message' =>'This email is already registered'
						)
                ),
                 'user_group_id'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please select role',
						'last'=>true)
				),
                'cellphone'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter phone number',
						'last'=>true)
				)
				
			);
		$this->validate=$validate1;
		return $this->validates();
	}


	public function recaptchaValidate() {
		App::import("Vendor", "Usermgmt.recaptcha/recaptchalib");
		$recaptcha_challenge_field = (isset($_POST['recaptcha_challenge_field'])) ? $_POST['recaptcha_challenge_field'] : "";
		$recaptcha_response_field = (isset($_POST['recaptcha_response_field'])) ? $_POST['recaptcha_response_field'] : "";
		$resp = recaptcha_check_answer(PRIVATE_KEY_FROM_RECAPTCHA, $_SERVER['REMOTE_ADDR'], $recaptcha_challenge_field, $recaptcha_response_field);
		$error = $resp->error;
		if(!$resp->is_valid) {
			$this->validationErrors['captcha'][0]=$error;
		}
		return true;
	}
	/**
	 * Used to validate banned usernames
	 *
	 * @access public
	 * @return boolean
	 */
	public function isBanned() {
		$bannedUsers= explode(',', strtolower(BANNED_USERNAMES));
		$bannedUsers = array_map('trim', $bannedUsers);
		if(!empty($bannedUsers)) {
			if(isset($this->data['User']['id'])) {
				$oldUsername= $this->getUserNameById($this->data['User']['id']);
			}
			if(!isset($oldUsername) || $oldUsername !=$this->data['User']['username']) {
				if(in_array(strtolower($this->data['User']['username']), $bannedUsers)) {
					$this->validationErrors['username'][0]="You cannot set this username";
				}
			}
		}
		return true;
	}
	/**
	 * Used to match old password
	 *
	 * @access public
	 * @return boolean
	 */
	public function verifyOldPass() {
		$userId = $this->userAuth->getUserId();
		$user = $this->findById($userId);
		$oldpass=$this->userAuth->makePassword($this->data['User']['oldpassword'], $user['User']['salt']);
		return ($user['User']['password']===$oldpass);
	}
	/**
	 * Used to send registration mail to user
	 *
	 * @access public
	 * @param array $user user detail array
	 * @return void
	 */
	
	public function forReadFile($templet) {
            // For PHP 5 and up
            $handle = fopen($templet, "rb");
            $contents = stream_get_contents($handle);
            fclose($handle);
            return $contents ;
        }
	
	
	public function sendRegistrationMail($user) {
		// send email to newly created user
		$userId = $user['User']['id'];
        
        $eventFields =array(
            'sender_id' => RECEIVER_ID,
            'receiver_id' => $userId,
            'first_name' => $user['User']['first_name']
       );
		//Process for send sms and mail to register user
		/*if(isset($user['UserDetail']['cellphone']) && !empty($user['UserDetail']['cellphone'])){
			$smsdata =array();
			$smsdata['To'] =$user['UserDetail']['cellphone'];
			$sendSMSList =unserialize(SEND_SMSLIST);
			$message = $sendSMSList[REGISTRATION];
			$smsdata['Message'] =$message;
			App::import('Controller', 'Events');
			$events = new EventsController;
			$events->sendsms($smsdata); 
		}*/
		
		// App::import('Model', 'Event');
		// $event = new Event;
  //       $event->addEvent(EVENT_MAIL_TYPE, REGISTRATION, $eventFields);
	}
	/**
	 * Used to send email verification mail to user
	 *
	 * @access public
	 * @param array $user user detail array
	 * @return void
	 */
	public function sendVerificationMail($user) {
		$userId=$user['User']['id'];
		$email = new CakeEmail();
		$fromConfig = EMAIL_FROM_ADDRESS;
		$fromNameConfig = EMAIL_FROM_NAME;
		$email->from(array( $fromConfig => $fromNameConfig));
		$email->sender(array( $fromConfig => $fromNameConfig));
		$email->to($user['User']['email']);
		$email->subject('Email Verification Mail');
		$activate_key = $this->getActivationKey($user['User']['password']);
		$link = Router::url("/userVerification?ident=$userId&activate=$activate_key",true);
		$body="Hi ".$user['User']['first_name'].", Click the link below to confirm your email address \n\n ".$link;
		try{
			$result = $email->send($body);
		} catch (Exception $ex){
			// we could not send the email, ignore it
			$result="Could not send verification email to userid-".$userId;
		}
		$this->log($result, LOG_DEBUG);
	}
	/**
	 * Used to send email verification code to user
	 *
	 * @access public
	 * @param array $user user detail array
	 * @return void
	 */
	public function sendVerificationCode($userId, $emailadd, $code) {
		$name = $this->getNameById($userId);
		$email = new CakeEmail();
		$fromConfig = EMAIL_FROM_ADDRESS;
		$fromNameConfig = EMAIL_FROM_NAME;
		$email->from(array( $fromConfig => $fromNameConfig));
		$email->sender(array( $fromConfig => $fromNameConfig));
		$email->to($emailadd);
		$email->subject('Email Verification Code');
		$body="Hi ".$name.", \n\n Your email verification code is ".$code;
		try{
			$result = $email->send($body);
		} catch (Exception $ex){
			// we could not send the email, ignore it
			$result="Could not send verification code email to userid-".$userId;
		}
		$this->log($result, LOG_DEBUG);
	}
	/**
	 * Used to generate activation key
	 *
	 * @access public
	 * @param string $password user password
	 * @return hash
	 */
	public function getActivationKey($password) {
		$salt = Configure::read ( "Security.salt" );
		return md5(md5($password).$salt);
	}
	/**
	 * Used to send forgot password mail to user
	 *
	 * @access public
	 * @param array $user user detail
	 * @return void
	 */
	
		
	
	public function sendForgotPasswordMail($user) {
		$userId=$user['User']['id'];
		
		//Process for send sms and mail to forgot password
		$activate_key = $this->getActivationKey($user['User']['password']);
		$link = Router::url("/activatePassword?ident=$userId&activate=$activate_key",true);
		
		/*if(isset($user['UserDetail']['cellphone']) && !empty($user['UserDetail']['cellphone'])){
			$smsdata =array();
			$smsdata['To'] =$user['UserDetail']['cellphone'];
			$sendSMSList =unserialize(SEND_SMSLIST);
			$message = $sendSMSList[FORGOT_POSSWORD];
			$message = str_replace('%PASSWORD_RESET_LINK%',$link,$message);
			$smsdata['Message'] =$message;
			//pr($smsdata);
			App::import('Controller', 'Events');
			$events = new EventsController;
			$events->sendsms($smsdata);
		}*/
		
         $eventFields =array(
            'sender_id' => RECEIVER_ID,
            'receiver_id' => $userId,
            'first_name' => $user['User']['first_name'],
            'receiver_email' => $user['User']['email'],
             "link" => $link
       );
         
		App::import('Model', 'Event');
		$event = new Event;
		$subject = "Forgot Password";
		$event->send_email($user['User']['email'],$subject,$eventFields);
        //$event->addEvent(EVENT_MAIL_TYPE, FORGOT_POSSWORD, $eventFields);
	}
	/**
	 * Used to send change password mail to user
	 *
	 * @access public
	 * @param array $user user detail
	 * @return void
	 */
	public function sendChangePasswordMail($user) {
		$userId=$user['User']['id'];
		$email = new CakeEmail();
		$fromConfig = EMAIL_FROM_ADDRESS;
		$fromNameConfig = EMAIL_FROM_NAME;
		$email->from(array( $fromConfig => $fromNameConfig));
		$email->sender(array( $fromConfig => $fromNameConfig));
		$email->to($user['User']['email']);
		$email->subject(SITE_NAME.': Change Password Confirmation');
		$body= "Hey ".$user['User']['first_name'].", You recently changed your password on ".date('Y M d h:i:s', time()).".

As a security precaution, this notification has been sent to your email addresse associated with your account.

Thanks,\n".

SITE_NAME;
		try{
			$result = $email->send($body);
		} catch (Exception $ex){
			// we could not send the email, ignore it
			$result="Could not send change password email to userid-".$userId;
		}
		$this->log($result, LOG_DEBUG);
	}
	/**
	 * Used to mark cookie used
	 *
	 * @access public
	 * @param string $type
	 * @param string $credentials
	 * @return array
	 */
	public function authsomeLogin($type, $credentials = array()) {
		switch ($type) {
			case 'guest':
				// You can return any non-null value here, if you don't
				// have a guest account, just return an empty array
				return array();
			case 'cookie':
				$loginToken=false;
				if(strpos($credentials['token'], ":") !==false) {
					list($token, $userId) = split(':', $credentials['token']);
					$duration = $credentials['duration'];

					$loginToken = $this->LoginToken->find('first', array(
						'conditions' => array(
							'user_id' => $userId,
							'token' => $token,
							'duration' => $duration,
							'used' => false,
							'expires <=' => date('Y-m-d H:i:s', strtotime($duration)),
						),
						'contain' => false
					));
				}
				if (!$loginToken) {
					return false;
				}
				$loginToken['LoginToken']['used'] = true;
				$this->LoginToken->save($loginToken);

				$conditions = array(
					'User.id' => $loginToken['LoginToken']['user_id']
				);
			break;
			default:
				return array();
		}
		return $this->find('first', compact('conditions'));
	}
	/**
	 * Used to generate cookie token
	 *
	 * @access public
	 * @param integer $userId user id
	 * @param string $duration cookie persist life time
	 * @return string
	 */
	public function authsomePersist($userId, $duration) {
		$token = md5(uniqid(mt_rand(), true));
		$this->LoginToken->create(array(
			'user_id' => $userId,
			'token' => $token,
			'duration' => $duration,
			'expires' => date('Y-m-d H:i:s', strtotime($duration)),
		));
		$this->LoginToken->deleteAll(array('user_id'=>$userId),false);
		$this->LoginToken->save();
		return "${token}:${userId}";
	}
	/**
	 * Used to get name by user id
	 *
	 * @access public
	 * @param integer $userId user id
	 * @return string
	 */
	public function getNameById($userId) {
		$this->unbindModel(array('hasMany' => array('LoginToken'), 'hasOne' => array('UserDetail')));
		$res = $this->findById($userId);
		$name=(!empty($res)) ? ($res['User']['first_name'].' '.$res['User']['last_name']) : '';
		return $name;
	}
	/**
	 * Used to get username by user id
	 *
	 * @access public
	 * @param integer $userId user id
	 * @return string
	 */
	public function getUserNameById($userId) {
		$this->unbindModel(array('hasMany' => array('LoginToken'), 'hasOne' => array('UserDetail')));
		$res = $this->findById($userId);
		$name=(!empty($res)) ? ($res['User']['username']) : '';
		return $name;
	}
	/**
	 * Used to get email by user id
	 *
	 * @access public
	 * @param integer $userId user id
	 * @return string
	 */
	public function getEmailById($userId) {
		$this->unbindModel(array('hasMany' => array('LoginToken'), 'hasOne' => array('UserDetail')));
		$res = $this->findById($userId);
		$email=(!empty($res)) ? ($res['User']['email']) : '';
		return $email;
	}
	/**
	 * Used to get user by user id
	 *
	 * @access public
	 * @param integer $userId user id
	 * @return string
	 */
	public function getUserById($userId) {
		$res = $this->findById($userId);
		return $res;
	}
	/**
	 * Used to get gender array
	 *
	 * @access public
	 * @return string
	 */
	public function getGenderArray($select=true) {
		$gender = array();
		if($select) {
			$gender['']="Select Gender";
		}
		$gender['male']="Male";
		$gender['female']="Female";
		return $gender;
	}
	/**
	 * Used to get gender array
	 *
	 * @access public
	 * @return string
	 */
	public function getMaritalArray($select=true) {
		$rel = array();
		if($select) {
			$rel['']="Select Status";
		}
		$rel['single']="Single";
		$rel['married']="Married";
		$rel['divorced']="Divorced";
		$rel['widowed']="Widowed";
		return $rel;
	}
	/**
	 * Used to check user by user id
	 *
	 * @access public
	 * @param integer $userId user id
	 * @return boolean
	 */
	public function isValidUserId($userId) {
		$this->unbindModel(array('hasMany' => array('LoginToken'), 'hasOne' => array('UserDetail')));
		$res = $this->findById($userId);
		if(!empty($res)) {
			return true;
		}
		return false;
	}
	/**
	 * Used to check users by group id
	 *
	 * @access public
	 * @param integer $groupId user id
	 * @return boolean
	 */
	public function isUserAssociatedWithGroup($groupId) {
		$res = $this->find('count', array('conditions'=>array('User.user_group_id'=>$groupId)));
		if(!empty($res)) {
			return true;
		}
		return false;
	}
        
        public function userIsAdmin ($userId) {
            return $this->find('count', array('conditions'=>array('User.user_group_id' => ADMIN_GROUP_ID, 'User.id' => $userId)));
        }
        
        public function getUserlistByGroup ($groupId) {
            return $this->find ("list", array(
                        "conditions" => array("user_group_id" => $groupId),
                        "fields" => array("id", "email")
                    )
                );
        }
        
        /**
         * Function to get the admin user by email id (admin and operator are same at the time of code written)
         * @param type $user : user email id
         * @return the admin user details
         */
        public function findByEmailAdmin($user = NULL){
        	$adminGroupIds = unserialize(EMANDOOBI_ADMIN_GROUP_ID);
			array_push($adminGroupIds,ADMIN_GROUP_ID);
            return $this->find('first', array('conditions'=>array('User.email'=>$user, 'User.user_group_id'=>$adminGroupIds)));
        }
        
        /**
         * Function to get the user by email id 
         * @param type $user : user email id
         * @return the user details
         */
        public function findByEmailNormal($user = NULL){
        	$adminGroupIds = unserialize(EMANDOOBI_ADMIN_GROUP_ID);
			array_push($adminGroupIds,ADMIN_GROUP_ID);
            return $this->find('first', array('conditions'=>array('User.email'=>$user, 'NOT'=>array('User.user_group_id'=>$adminGroupIds))));
        }


       public function sendEmpNotificationMail($user) {
		$userId=$user['User']['id'];
		$email = new CakeEmail();
		$fromConfig = EMAIL_FROM_ADDRESS;
		$fromNameConfig = EMAIL_FROM_NAME;
		$email->from(array( $fromConfig => $fromNameConfig));
		$email->sender(array( $fromConfig => $fromNameConfig));
		$email->to($user['User']['email']);
		$email->subject("You've been added on Emandoobi");
		$activate_key = $this->getActivationKey($user['User']['first_name']);
		$link = Router::url("/invitation?ident=$userId&activate=$activate_key",true);
		$body="Hi ".$user['User']['first_name'].",\n\n
		 Accept this invitation to get started click on below link \n\n ".$link;
		try{
			$result = $email->send($body);
		} catch (Exception $ex){
			// we could not send the email, ignore it
			$result="Could not send invitation email to userid-".$userId;
		}
		$this->log($result, LOG_DEBUG);
	}
        
}
