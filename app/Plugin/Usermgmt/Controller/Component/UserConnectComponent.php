<?php


class UserConnectComponent  extends Component {
	/**
	 * This component uses following components
	 *
	 * @var array
	 */
	var $components = array('Session', 'Cookie', 'RequestHandler');

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

	}
	/**
	 *
	 *
	 * @return array
	 */
	function facebook_connect() {
		App::import("Vendor", "Usermgmt.facebook/facebook");
		$fb_array=array();
		$facebook = new Facebook(array('appId'  => FB_APP_ID,'secret' => FB_SECRET));
		$fbuser = $facebook->getUser();
		if($fbuser) {
			try {
				$fb_array['user_profile']= $facebook->api('/me');
				$fb_array['user_profile']['accessToken']= $facebook->getAccessToken();
			} catch (FacebookApiException $e) {
				$fbuser = null;
			}
		}
		if($fbuser) {
			$fb_array['logoutUrl']= $facebook->getLogoutUrl();
			$fb_array['loginUrl']='';
		} else {
			$fb_array['loginUrl'] = $facebook->getLoginUrl(array('canvas' => 1, 'fbconnect' => 0, 'display' => 'popup', 'scope'=> FB_SCOPE));
			$fb_array['logoutUrl']='';
		}
		return $fb_array;
	}
	/**
	 *
	 *
	 * @return array
	 */
	function twitter_connect() {
		$twt_array=array();
		App::import("Vendor", "Usermgmt.twitter/EpiCurl");
		App::import("Vendor", "Usermgmt.twitter/EpiOAuth");
		App::import("Vendor", "Usermgmt.twitter/EpiTwitter");

		$twitterObj = new EpiTwitter(TWT_APP_ID, TWT_SECRET);
		$twt_array['url'] = $twitterObj->getAuthorizationUrl();
		if(isset($_GET['oauth_token'])) {
			$twitterObj->setToken($_GET['oauth_token']);
			$token = $twitterObj->getAccessToken();
			$twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);
			$_SESSION['ot'] = $token->oauth_token;
			$_SESSION['ots'] = $token->oauth_token_secret;
			$user_profile= $twitterObj->get_accountVerify_credentials()->response;
			$twtToken=$token->oauth_token;
			$twtSecret=$token->oauth_token_secret;
		}
		$twt_array['user_profile']=(isset($user_profile)) ? $user_profile : '';
		$twt_array['user_profile']['accessToken']=(isset($twtToken)) ? $twtToken : '';
		$twt_array['user_profile']['accessSecret']=(isset($twtSecret)) ? $twtSecret : '';
		return $twt_array;
	}
	/**
	 *
	 *
	 * @return array
	 */
//	function gmail_connect() {
//		App::import('Vendor', 'Usermgmt.openid/Lightopenid');
//		$gmail_array=array();
//		$openid = new Lightopenid($_SERVER['SERVER_NAME']);
//		if($openid->mode == 'cancel') {
//			/* Do nothing user canceled authentication */
//		} elseif(isset($_GET['openid_mode'])) {
//			$ret = $openid->getAttributes();
//			if(isset($ret['contact/email']) && $openid->validate()) {
//				$gmail_array['email']=$ret['contact/email'];
//				$gmail_array['first_name']=$ret['namePerson/first'];
//				$gmail_array['last_name']=$ret['namePerson/last'];
//				$gmail_array['name']=$ret['namePerson/first']." ".$ret['namePerson/last'];
//				$gmail_array['location']= (isset($ret['contact/country/home'])) ? $ret['contact/country/home'] : "";
//			}
//		} else {
//			$openid->identity = "https://www.google.com/accounts/o8/id";
//			$openid->required = array('contact/email', 'namePerson', 'person/gender', 'contact/country/home', 'namePerson/first', 'namePerson/last', 'pref/language');
//			$openid->returnUrl = SITE_URL.'login/gmail';
//			$gmail_array['url']=$openid->authUrl();
//		}
//		return $gmail_array;
//	}
    
    function gmail_connect() {
        App::import('Vendor', 'Usermgmt.google/autoload');
        $client_id = GOOGLE_APP_ID;
        $client_secret = GOOGLE_SECRET;
        $redirect_uri = SITE_URL.'login/gmail';
        $client = new Google_Client();
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setScopes('email');

        $cl = new Google_Service_Oauth2 ($client);

        if (isset($_REQUEST['logout'])) {
          unset($_SESSION['access_token']);
        }

        if (isset($_GET['code'])) {
          $client->authenticate($_GET['code']);
          $_SESSION['access_token'] = $client->getAccessToken();
          $redirect = $redirect_uri;
         // echo $redirect;
          header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
          $client->setAccessToken($_SESSION['access_token']);
        } else {
          $authUrl = $client->createAuthUrl();
          $gmail_array['url']=$authUrl;

        }

        if ($client->getAccessToken()) {
          $_SESSION['access_token'] = $client->getAccessToken();
          $token_data = $client->verifyIdToken()->getAttributes();
        }
        if (isset($token_data)) {

    $gmail_data=$cl->userinfo_v2_me->get();
    //pr($gmail_data);exit;
    $gmail_array['name']=$gmail_data->name;
    $gmail_array['first_name']=$gmail_data->givenName;
    $gmail_array['last_name']=$gmail_data->familyName;
    $gmail_array['email']=$gmail_data->email;
    $gmail_array['location']=$gmail_data->locale;

    }
        //pr($gmail_array);exit;
            return $gmail_array;
    }
	/**
	 *
	 *
	 * @return array
	 */
	function linkedin_connect() {
		App::import("Vendor", "Usermgmt.linkedin/linkedin_3.2.0.class");
		$ldn_array=array();
		$user_profile=array();
		$ldnToken='';
		$ldnSecret='';
		$API_CONFIG = array('appKey' => LDN_API_KEY,'appSecret' => LDN_SECRET_KEY,'callbackUrl' => NULL );
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
			$protocol = 'https';
		} else {
			$protocol = 'http';
		}
		$API_CONFIG['callbackUrl'] = SITE_URL.'login/ldn?' . LINKEDIN::_GET_TYPE . '=initiate&' . LINKEDIN::_GET_RESPONSE . '=1';
		$OBJ_linkedin = new LinkedIn($API_CONFIG);
		// check for response from LinkedIn
		$_GET[LINKEDIN::_GET_RESPONSE] = (isset($_GET[LINKEDIN::_GET_RESPONSE])) ? $_GET[LINKEDIN::_GET_RESPONSE] : '';
		if(!$_GET[LINKEDIN::_GET_RESPONSE]) {
			// LinkedIn hasn't sent us a response, the user is initiating the connection
			// send a request for a LinkedIn access token
			$response = $OBJ_linkedin->retrieveTokenRequest();
			if($response['success'] === TRUE) {
				// store the request token
				$_SESSION['oauth']['linkedin']['request'] = $response['linkedin'];
				// redirect the user to the LinkedIn authentication/authorisation page to initiate validation.
				$ldn_array['url']=LINKEDIN::_URL_AUTH . $response['linkedin']['oauth_token'];
			} else {
				// bad token request
				$ldn_array['Request_Token_Failed_Response']=$response;
				$ldn_array['Request_Token_Failed_Linkedin']=$OBJ_linkedin;
			}
		} else {
			// LinkedIn has sent a response, user has granted permission, take the temp access token, the user's secret and the verifier to request the user's real secret key
			$response = $OBJ_linkedin->retrieveTokenAccess($_SESSION['oauth']['linkedin']['request']['oauth_token'], $_SESSION['oauth']['linkedin']['request']['oauth_token_secret'], $_GET['oauth_verifier']);
			if($response['success'] === TRUE) {
				// the request went through without an error, gather user's 'access' tokens
				$_SESSION['oauth']['linkedin']['access'] = $response['linkedin'];
				// set the user as authorized for future quick reference
				$_SESSION['oauth']['linkedin']['authorized'] = TRUE;
				// redirect the user back to the demo page
				//header('Location: ' . $_SERVER['PHP_SELF']);
				$response = $OBJ_linkedin->profile('~:(id,first-name,last-name,picture-url)');
				if($response['success'] === TRUE) {
					$user_profile = new SimpleXMLElement($response['linkedin']);
					$ldnSecret=$_SESSION['oauth']['linkedin']['request']['oauth_token_secret'];
					$ldnToken=$_SESSION['oauth']['linkedin']['request']['oauth_token'];
				} else {
					// request failed
					$user_profile='';
					$ldnSecret=$_SESSION['oauth']['linkedin']['request']['oauth_token_secret'];
					$ldnToken=$_SESSION['oauth']['linkedin']['request']['oauth_token'];
				}
			} else {
				// bad token access
				$ldn_array['Request_Token_Failed_Response']=$response;
				$ldn_array['Request_Token_Failed_Linkedin']=$OBJ_linkedin;
			}
		}
		$ldn_array['user_profile']=$user_profile;
		return $ldn_array;
	}
	/**
	 *
	 *
	 * @return array
	 */
	function foursquare_connect() {
		App::import("Vendor", "Usermgmt.foursquare/EpiCurl");
		App::import("Vendor", "Usermgmt.foursquare/EpiFoursquare");
		$fs_array=array();
		$foursquareObj = new EpiFoursquare(FS_CLIENT_ID, FS_CLIENT_SECRET);
		$redirectUri = SITE_URL.'login/fs';
		if(!isset($_GET['code']) && !isset($_SESSION['fs_access_token'])) {
			$url = $foursquareObj->getAuthorizeUrl($redirectUri);
			$fs_array['url']=$url;
		} else {
			if(!isset($_SESSION['fs_access_token'])) {
				$token = $foursquareObj->getAccessToken($_GET['code'], $redirectUri);
				//setcookie('fs_access_token', $token->access_token);
				$_SESSION['fs_access_token'] = $token->access_token;
			}
			$foursquareObj->setAccessToken($_SESSION['fs_access_token']);
			$foursquareInfo = $foursquareObj->get('/users/self');
			$user_profile= (array) $foursquareInfo->response;
			$fsToken=$_SESSION['fs_access_token'];
		}
		$fs_array['user_profile']=(isset($user_profile)) ? $user_profile : '';
		$fs_array['user_profile']['accessToken']=(isset($fsToken)) ? $fsToken : '';
		return $fs_array;
	}
	/**
	 *
	 * @return array
	 */
	function yahoo_connect() {
		App::import('Vendor', 'Usermgmt.openid/Lightopenid');
		$yahoo_array=array();
		$openid = new Lightopenid($_SERVER['SERVER_NAME']);

		if($openid->mode == 'cancel') {
			/* Do nothing user canceled authentication */
		} elseif(isset($_GET['openid_mode'])) {
			$ret = $openid->getAttributes();
			if(isset($ret['contact/email']) && $openid->validate()) {
				$yahoo_array['email']=$ret['contact/email'];
				$yahoo_array['name']=$ret['namePerson'];
				if($ret['person/gender']=="F")
					$yahoo_array['gender']='female';
				else
					$yahoo_array['gender']='male';
				$name=explode(' ', $ret['namePerson']);
				$yahoo_array['first_name']=$name[0];
				$last_name='';
				if(isset($name[2])) {
					unset($name[0]);
					$last_name=implode(' ', $name);
				} else if(isset($name[1])) {
					$last_name=$name[1];
				}
				$yahoo_array['last_name']=$last_name;
			}
		} else {
			$openid->identity = "http://me.yahoo.com/";
			$openid->required = array('contact/email', 'namePerson', 'person/gender');
			$openid->returnUrl = SITE_URL.'login/yahoo';
			$yahoo_array['url']=$openid->authUrl();
		}
		return $yahoo_array;
	}
}