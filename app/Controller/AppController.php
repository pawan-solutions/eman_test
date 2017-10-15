<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array('Usermgmt.UserAuth','Security','Session', 'RequestHandler', "Common");
	var $helpers = array('Usermgmt.UserAuth', 'Session', 'Form', 'Html', 'Js', "Custom", 'Usermgmt.Image');
    var $uses = array("Event", 'Usermgmt.User','ApiKey','Order');
    
	function beforeFilter(){
        $this->userAuth();
        $this->checkLoginRedirection();
         $action  =  isset($this->params['action'])?$this->params['action']:'';
         if($action=='search'){
              $this->request->query['location'] = Sanitize::clean(isset($this->request->query['location'])?$this->request->query['location']:'', array('encode' => true, 'remove_html' => true));
              //$this->request->query['location'] =  Sanitize::paranoid(isset($this->request->query['location'])?$this->request->query['location']:'');   
            }else if($action =='befoBooking' || $action =='referal' ||
             $this->request->isAjax() || $action =='marketing' ||  
             $action =='manage'  
             || $action=='savePriority' || $action =='index' 
             || $action =='saveParameterValues'
             || $action == 'login'
             || $action =='processInventoryAdmin' || $action=='create' || $action =='activatePassword' 
             || $action =='downloadExcelTemplateFromAdmin'
             || $action =='renew_residency'
             || $action =='update_process'
             || $action =='visa_process_feedback' 
             || $action =='visa_process_feedback_hr'
             || $action =='local_transfer'
             || $action =='add'
             || $action =='new_residency'
             || $action =='cancellation'
             || $action =='put_refernece_number'
             || $action =='everything' 
             || $action =='edit_employee'
             || $action =='edit_new_residency'
             || $action =='edit_renew_residency'
             || $action =='edit_local_transfer'
             || $action =='edit_cancellation'
             || $action =='upload_single_document'
             || $action =='adjustment'
             
             
             ){
                 $this->Security->csrfCheck = false;
                 $this->Security->validatePost = false; 
             
            }

    }

   
   
	private function userAuth(){
        $this->UserAuth->beforeFilter($this);
   } 
    /**
     * Cvalidate login when userlogin via social site
     */
    private function checkLoginRedirection () {

         if($this->Session->check('UserAuth.FacebookLogin')) {
            $this->Session->delete('UserAuth.FacebookLogin');
            if($this->Session->check('UserAuth.FacebookChangePass')) {
                $this->redirect('/changePassword');
            } else {
                $OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
                $this->Session->delete('Usermgmt.OriginAfterLogin');
                $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : $this->referer();
                $this->redirect($redirect);
            }
        }
        if($this->Session->check('UserAuth.GmailLogin')) {
            $this->Session->delete('UserAuth.GmailLogin');
            if($this->Session->check('UserAuth.GmailChangePass')) {
                $this->redirect('/changePassword');
            } else {
                $OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
                $this->Session->delete('Usermgmt.OriginAfterLogin');
                $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : $this->referer();
                $this->redirect($redirect);
            }
        }
        if($this->Session->check('UserAuth.LinkedinLogin')) {
            $this->Session->delete('UserAuth.LinkedinLogin');
            if($this->Session->check('UserAuth.LinkedinChangePass')) {
                $this->redirect('/changePassword');
            } else {
                $OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
                $this->Session->delete('Usermgmt.OriginAfterLogin');
                $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
                $this->redirect($redirect);
            }
        }
        if($this->Session->check('UserAuth.FoursquareLogin')) {
            $this->Session->delete('UserAuth.FoursquareLogin');
            if($this->Session->check('UserAuth.FoursquareChangePass')) {
                $this->redirect('/changePassword');
            } else {
                $OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
                $this->Session->delete('Usermgmt.OriginAfterLogin');
                $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
                $this->redirect($redirect);
            }
        }
        if($this->Session->check('UserAuth.YahooLogin')) {
            $this->Session->delete('UserAuth.YahooLogin');
            if($this->Session->check('UserAuth.YahooChangePass')) {
                $this->redirect('/changePassword');
            } else {
                $OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
                $this->Session->delete('Usermgmt.OriginAfterLogin');
                $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
                $this->redirect($redirect);
            }
        }
    }

    function forReadFile($templet) {
        // For PHP 5 and up
        if(!file_exists($templet))
            return null;
        $handle = fopen($templet, "rb");
        $contents = stream_get_contents($handle);
        fclose($handle);
        return $contents ;
    }

    function beforeRender () {
        if ($this->name == 'CakeError') {
            $this->layout = "error";
        }
        $userId = $this->Session->read('UserAuth.User.id');
        $userName = null;
        if(!empty($userId)) {
            $userName = $this->User->findById($userId);
        }
       // pr($userName['User']["first_name"]);die;
        $this->set("userName", $userName['User']["first_name"]);
    }
	
}
