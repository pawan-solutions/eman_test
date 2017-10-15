<?php
    App::uses('AppHelper', 'View/Helper');
    App::import('Component', 'CommonComponent');
    class CustomHelper extends AppHelper{
        
       public function app_notification_count()
       {
            $collection = new ComponentCollection();
            $this->CommonComponent = new CommonComponent($collection);
            $ownerid = $this->CommonComponent->getOwnerId();
            return 5;// find the notification count for HR and GRO person

       }

       public function app_process_count($user_id)
       {
          App::import("Model", "Application");
          $AppObj = new Application();
          $ownerid = $AppObj->getOwnerId($user_id);
            
          $user_group_id = $_SESSION['UserAuth']['User']['user_group_id'];
          if($user_group_id==SUPER_USER)
            {
              $pendingApp = $AppObj->find("count", array('conditions'=>array('Application.user_id'=>$ownerid,'Application.process_closed'=>false)));
              $closedApp = $AppObj->find("count", array('conditions'=>array('Application.user_id'=>$ownerid,'Application.process_closed'=>true)));
            }else{
              $company_id = json_decode($_SESSION['UserAuth']['User']['company_id']);
              $pendingApp = $AppObj->find("count", array('conditions'=>array('Application.user_id'=>$ownerid,'Application.process_closed'=>false, 'Application.company_id'=>$company_id)));
              $closedApp = $AppObj->find("count", array('conditions'=>array('Application.user_id'=>$ownerid,'Application.process_closed'=>true, 'Application.company_id'=>$company_id)));
            }
            return array("pending"=>$pendingApp, "closed"=>$closedApp);          
       }

       public function user_info_by_id($id)
       {
          App::import("Model", "User");
          $UserObj = new User();
          return $uinfo = $UserObj->find('first', array('conditions'=>array('User.id'=>$id), 
            'fields'=>array('first_name','last_name'), 'recursive'=>-1));
        
       }

       public function unread_notification_count($userGroup)
       {
           $collection = new ComponentCollection();
           $this->CommonComponent = new CommonComponent($collection);
           $owner_id = $this->CommonComponent->getOwnerId();
           App::import("Model", "Notification");
           $notifObj = new Notification();
           if(strtolower($userGroup)==GRO)
           {
           return $notification_count = $notifObj->find('count', array('conditions'=>array('read'=>false, 'owner_id'=>$owner_id, 'type'=>array(1,3))));
           }else{
           return $notification_count = $notifObj->find('count', array('conditions'=>array('read'=>false, 'owner_id'=>$owner_id, 'type'=>array(2,4))));
           }
       }

        public function get_process_text($process_type)
        {
          $c_type = '';
             if($process_type==1)
              {
                $c_type = 'New visa application request';
              }elseif($process_type==2)
              {
                $c_type = 'Renew visa application request';
              }elseif($process_type==3)
              {
                $c_type = 'Local transfer application request';
              }elseif($process_type==4)
              {
                $c_type = 'Visa cancellation application request';
              }
              return $c_type;
        }

        public function get_visa_completed_text($process_type,$process_stage,$name, $from_action=null)
        {
          $c_type = '';
             if($process_type==1)
              {
                $pr_stages = unserialize(NEW_RESIDENCY_PROCESS);
              }elseif($process_type==2)
              {
                $pr_stages = unserialize(RENEW_RESIDENCY_PROCESS);
              }elseif($process_type==3)
              {
                $pr_stages = unserialize(LOCAL_TRANSFER_PROCESS);
              }elseif($process_type==4)
              {
                $pr_stages = unserialize(CANCELLATION_PROCESS);
              }
              
              if(!empty($pr_stages))
              {
                $action_txt = '';
                if($from_action=="reference"){
                $action_txt = "have added reference no.";
                }elseif($from_action=="issue"){
                $action_txt = "have marked issue.";
                }else{
                $action_txt = "is completed";
                }
                $c_type = "<b>".$pr_stages[$process_stage]."</b> of <b>".$name."</b> ".$action_txt;
              }
              return $c_type;
        }


         public function getFormatedAmount ($amount, $withCurrency = true) {
            $fAmount = null;
            if(is_null($amount))
            return $amount;
            if($withCurrency) {
            $fAmount = CURRENCY;
            }
            setlocale(LC_MONETARY, 'en_IN');
            $amount = round ($amount); // Decimal Not Required

            if(function_exists ('money_format')) {
            $fAmount .= money_format('%!.0n', $amount);
            } else {
            $fAmount .= number_format($amount, 0, ".", ",");
            }
            return $fAmount;
          }

          public function find_reference_data($app_id, $process_type=null)
          {
            App::import("Model", "ApplicationReferenceNumber");
            $Obj = new ApplicationReferenceNumber();
            $array_res = array();
            $result = $Obj->find('all', array('conditions'=>array('application_id'=>$app_id, 'process_type'=>$process_type), 'recursive'=>-1 , 'fields'=>array('process_stage', 'process_type', 'ref_date')));
            if(!empty($result))
            {
              foreach ($result as $key => $value) {
              $array_res[$value['ApplicationReferenceNumber']['process_stage']] = $value['ApplicationReferenceNumber']['ref_date'];
              }
            }
            return $array_res;
          }

        public function getVisaProcesseByType($process_type, $company_type=null)
        {
            if($company_type==LABOUR_TYPE){
                if($process_type==NEW_RESIDENCY){
                  $visa_process = unserialize(NEW_RESIDENCY_LABOUR);
                }elseif($process_type==RENEW_RESIDENCY){
                  $visa_process = unserialize(RENEW_RESIDENCY_LABOUR);
                }elseif($process_type==LOCAL_TRANSFER){
                  $visa_process = unserialize(LOCAL_TRANSFER_LABOUR);
                }elseif($process_type==ADJUSTMENT){
                  $visa_process = unserialize(ADJUSTMENT_LABOUR);
                }elseif($process_type==CANCELLATION){
                  $visa_process = unserialize(CANCELLATION_LABOUR);
                }
            }else{
                if($process_type==NEW_RESIDENCY){
                  $visa_process = unserialize(NEW_RESIDENCY_PROCESS);
                }elseif($process_type==RENEW_RESIDENCY){
                  $visa_process = unserialize(RENEW_RESIDENCY_PROCESS);
                }elseif($process_type==LOCAL_TRANSFER){
                  $visa_process = unserialize(LOCAL_TRANSFER_PROCESS);
                }elseif($process_type==ADJUSTMENT){
                  $visa_process = unserialize(ADJUSTMENT_PROCESS);
                }elseif($process_type==CANCELLATION){
                  $visa_process = unserialize(CANCELLATION_PROCESS);
                }
            }
            
            return $visa_process; 
        }

        function groupNameById($group_id){
            App::import("Model", "userGroup");
            $Obj = new userGroup();
            return $group_res = $Obj->find('first', array('conditions'=>array('UserGroup.id'=>$group_id), 'fields'=>array('UserGroup.id','UserGroup.name'), 'recursive'=>-1));
        }

       
      
}
