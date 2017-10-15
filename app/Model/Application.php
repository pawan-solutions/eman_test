<?php
    class Application extends AppModel{
        var $belongsTo = array("Company");
        var $hasOne = array("ApplicationDetail");
          public $validate = array(
            "company_id" => array(
                "rule" => "notEmpty",
                "message" => "Select any organisation"
            ),
           
           "country_type" => array(
                "rule" => "notEmpty",
                "message" => "Select country type"
            ),
           
            "employee_name" => array(
                "rule" => "notEmpty",
                "message" => "Enter employee name"
            ),
           
            "designation" => array(
                "rule1" => array(
                    "rule" => "notEmpty",
                    "message" => "Enter employee designation"
                ),
                
            )
            
        );


        public function sendMailToHr() {
            $email = new CakeEmail();
            $fromConfig = "pawan199115@gmail.com";
            $fromNameConfig = "pawan test";
            $email->from(array( $fromConfig => $fromNameConfig));
            $email->sender(array( $fromConfig => $fromNameConfig));
            $email->to("pawanpnf@gmail.com");
            $email->subject('Email HR Mail');
            $body="test mail";
            $result = $email->send($body);
            pr($result);
            //$this->log($result, LOG_DEBUG);
        }

        public function getVisaProcesseByType($process_type)
        {
            if($process_type==NEW_RESIDENCY)
            {
            $visa_process = unserialize(NEW_RESIDENCY_PROCESS);
            }elseif($process_type==RENEW_RESIDENCY)
            {
            $visa_process = unserialize(RENEW_RESIDENCY_PROCESS);
            }elseif($process_type==LOCAL_TRANSFER)
            {
                $visa_process = unserialize(LOCAL_TRANSFER_PROCESS);
            }elseif($process_type==CANCELLATION)
            {
                $visa_process = unserialize(CANCELLATION_PROCESS);
            }
            return $visa_process; 
        }

        public function ApplicationIssueMailToHR($app_id,$process_stage,$owner_id)
        {
            $hrDetail = $this->getHrDetail($owner_id);
            $to = $hrDetail['User']['email'];
            $subject = "Issue in visa process";
            $message = 'I got issue please fix them';
            $this->mailSend($to,$subject,$message);
        }

        public function mailSend($to,$subject,$message)
        {
            $email = new CakeEmail();
            $fromConfig = "support@emandoobi.com";
            $fromNameConfig = "Emandoobi Support";
            $email->from(array( $fromConfig => $fromNameConfig));
            $email->sender(array( $fromConfig => $fromNameConfig));
            $email->to($to);
            $email->subject($subject);
            $body = $message;
            $result = $email->send($body);
            $sentMailArray = array("mail_to"=>$to, "mail_subject"=>$subject, "mail_message"=>$message);
            $this->EmailNotification->save($sentMailArray);
        }

        public function getFollowUpAppsId($owner_id)
        {
            // $back1_day = date("Y-m-d",strtotime("-1 day"));
            // $back2_day = date("Y-m-d",strtotime("-2 day"));
            // $back3_day = date("Y-m-d",strtotime("-3 day"));
            // $back7_day = date("Y-m-d",strtotime("-7 day"));

            $ref_array = $ref_app_ids = $process_array = $process_app_ids = $only_app_id = array();
            $appActions = $this->query("select application_id,action_type,process_type,process_stage,field1 from application_actions as ApplicationAction where (action_type='app_references' || action_type='app_processes') && application_id in (select id from applications where process_closed=0 and user_id=$owner_id)");
            foreach ($appActions as $row_val) {
                $only_app_id[] = $row_val['ApplicationAction']['application_id'];
            }
            $final_result = array();

            $app_coutry_type = $this->find('list', array('conditions'=>array('id'=>$only_app_id), 'fields'=>array('id','country_type'), 'recursive'=>-1));
            foreach ($appActions as $key => $row) {
                $fieldArray = $row['ApplicationAction'];
                    $app_id = $fieldArray['application_id'];
                    $action_type = $fieldArray['action_type'];
                    $process_type = $fieldArray['process_type'];
                    $process_stage = $fieldArray['process_stage'];
                    $country_type = $app_coutry_type[$app_id];
                    $cr_date = $fieldArray['field1'];
                    
                    if($action_type=="app_references")
                    {   
                        if(/*$cr_date<$back2_day &&*/ $process_type==1 && $process_stage==1)
                        {
                           $ref_array['entry_permit'][] = $ref_app_ids[] = $fieldArray['application_id'];
                        }elseif(($process_type==1 && $process_stage==2 && $country_type==1))
                        { //outpass is inside
                           $ref_array['change_status'][] = $ref_app_ids[] = $fieldArray['application_id'];
                        }elseif(($process_type==1 && $process_stage==2 && $country_type==2))
                        { //outpass is outside
                           $ref_array['entry_stamp'][] = $ref_app_ids[] = $fieldArray['application_id'];
                        }elseif(/*($cr_date<$back7_day) &&*/ ($process_type==1 && $process_stage==3) || ($process_type==2 && $process_stage==1) || ($process_type==3 && $process_stage==2))
                        {
                           $ref_array['emirates_id'][] = $ref_app_ids[] = $fieldArray['application_id'];
                        }elseif(/*($cr_date<$back3_day) &&*/ ($process_type==1 && $process_stage==4) || ($process_type==2 && $process_stage==2) || ($process_type==3 && $process_stage==3))
                        {
                           $ref_array['medical_test'][] = $ref_app_ids[] = $fieldArray['application_id'];
                        }elseif(/*($cr_date<$back3_day) &&*/ ($process_type==1 && $process_stage==5) || ($process_type==2 && $process_stage==3) || ($process_type==3 && $process_stage==5))
                        {
                           $ref_array['zajel'][] = $ref_app_ids[] = $fieldArray['application_id'];
                        }elseif(/*($cr_date<$back2_day) &&*/ ($process_type==1 && $process_stage==6) || ($process_type==2 && $process_stage==4) || ($process_type==3 && $process_stage==6))
                        {
                           $ref_array['residence_permit'][] = $ref_app_ids[] = $fieldArray['application_id'];
                        }elseif(($process_type==3 && $process_stage==1))
                        {
                           $ref_array['immigration_approval'][] = $ref_app_ids[] = $fieldArray['application_id'];
                        }elseif(/*($cr_date<$back3_day) &&*/ ($process_type==3 && $process_stage==4)) 
                        {
                           $ref_array['evision_approval'][] = $ref_app_ids[] = $fieldArray['application_id'];
                        }elseif(/*($cr_date<$back2_day) &&*/ ($process_type==4 && $process_stage==1))
                        {
                           $ref_array['visa_cancellation'][] = $ref_app_ids[] = $fieldArray['application_id'];
                        }
                    }elseif($action_type=="app_processes")
                    {
                        if($process_type==1 && $process_stage==1)
                        {
                           $process_array['entry_permit'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }elseif($process_type==1 && $process_stage==2 && $country_type==1)
                        { //outpass is inside
                           $process_array['change_status'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }elseif($process_type==1 && $process_stage==2 && $country_type==2)
                        { //outpass is outside
                           $process_array['entry_stamp'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }elseif(($process_type==1 && $process_stage==3) || ($process_type==2 && $process_stage==1) || ($process_type==3 && $process_stage==2))
                        {
                           $process_array['emirates_id'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }elseif(($process_type==1 && $process_stage==4) || ($process_type==2 && $process_stage==2) || ($process_type==3 && $process_stage==3))
                        {
                           $process_array['medical_test'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }elseif(($process_type==1 && $process_stage==5) || ($process_type==2 && $process_stage==3) || ($process_type==3 && $process_stage==5))
                        {
                           $process_array['zajel'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }elseif(($process_type==1 && $process_stage==6) || ($process_type==2 && $process_stage==4) || ($process_type==3 && $process_stage==6))
                        {
                           $process_array['residence_permit'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }elseif(($process_type==3 && $process_stage==1))
                        {
                           $process_array['immigration_approval'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }elseif(($process_type==3 && $process_stage==4)) 
                        {
                           $process_array['evision_approval'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }elseif(($process_type==4 && $process_stage==1))
                        {
                           $process_array['visa_cancellation'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }
                    }

            }
            
            //pr($process_array); die;
            if(!empty($ref_app_ids))
            {
                $matched_ids = array_intersect($ref_app_ids, $process_app_ids); 
                if(!empty($matched_ids))
                {
                    foreach($ref_array as $key => $value) {
                        if(isset($process_array[$key]))
                        {
                        $final_result[$key] = array_diff($value, $process_array[$key]);
                        }else{
                        $final_result[$key] = $value;    
                        }
                    }
                }else{
                    $final_result = $ref_array;
                }
            }
            return $final_result;
        }


        
    public function getNextTyping($owner_id)
    {
        $for_next_typing = $process_array = $process_app_ids = array();
        //only for all first stage
        $typing_first_stage = $this->find('all', array('fields'=>array('id', 'next_typing', 'process_type'),'recursive'=>-1 ,'conditions'=>array('user_id'=>$owner_id, 'process_closed'=>0, 'next_typing'=>1)));
            if(!empty($typing_first_stage))
            {
                foreach ($typing_first_stage as $key => $value) {
                   $app_id = $value['Application']['id']; 
                   $next_typing = $value['Application']['next_typing'];
                   $process_type = $value['Application']['process_type'];
                   $process_stage = $next_typing;
                        if($process_type==1 && $process_stage==1)
                        {
                           $process_array['entry_permit'][] = $process_app_ids[] = $app_id;
                        }elseif($process_type==2 && $process_stage==1)
                        {
                           $process_array['emirates_id'][] = $process_app_ids[] = $app_id;
                        }elseif(($process_type==3 && $process_stage==1))
                        {
                           $process_array['immigration_approval'][] = $process_app_ids[] = $app_id;
                        }elseif(($process_type==4 && $process_stage==1))
                        {
                           $process_array['visa_cancellation'][] = $process_app_ids[] = $app_id;
                        }
                }
            }

        //for next next stage
        $typing_results = $this->find('all', array('fields'=>array('id', 'process_type','next_typing', 'process_status_next', 'country_type'),'recursive'=>-1 ,'conditions'=>array('user_id'=>$owner_id, 'process_closed'=>0, 'next_typing !='=>1)));
            
            foreach ($typing_results as $row) {
               $app_id = $row['Application']['id']; 
               $next_typing = $row['Application']['next_typing'];
               $next_process = $row['Application']['process_status_next'];
               $process_type = $row['Application']['process_type'];
               $country_type = $row['Application']['country_type'];

               if($next_process>=$next_typing)
               {    
                    if($process_type==1 && $next_typing==2 && $next_process==2 && $country_type==2)
                    {
                    //incase of outpass(outside) not consider in typing    
                    }else{
                        $for_next_typing[$next_typing][] = $app_id;

                        $process_stage = $next_typing;
                        if($process_type==1 && $process_stage==1)
                        {
                           $process_array['entry_permit'][] = $process_app_ids[] = $fieldArray['application_id'];
                        }elseif($process_type==1 && $process_stage==2 && $country_type==1)
                        {
                            //outpass =>inside (change status)
                           $process_array['change_status'][] = $process_app_ids[] = $app_id;
                        }elseif(($process_type==1 && $process_stage==3) || ($process_type==2 && $process_stage==1) || ($process_type==3 && $process_stage==2))
                        {
                           $process_array['emirates_id'][] = $process_app_ids[] = $app_id;
                        }elseif(($process_type==1 && $process_stage==4) || ($process_type==2 && $process_stage==2) || ($process_type==3 && $process_stage==3))
                        {
                           $process_array['medical_test'][] = $process_app_ids[] = $app_id;
                        }elseif(($process_type==1 && $process_stage==5) || ($process_type==2 && $process_stage==3) || ($process_type==3 && $process_stage==5))
                        {
                           $process_array['zajel'][] = $process_app_ids[] = $app_id;
                        }elseif(($process_type==1 && $process_stage==6) || ($process_type==2 && $process_stage==4) || ($process_type==3 && $process_stage==6))
                        {
                           $process_array['residence_permit'][] = $process_app_ids[] = $app_id;
                        }elseif(($process_type==3 && $process_stage==1))
                        {
                           $process_array['immigration_approval'][] = $process_app_ids[] = $app_id;
                        }elseif(($process_type==3 && $process_stage==4)) 
                        {
                           $process_array['evision_approval'][] = $process_app_ids[] = $app_id;
                        }elseif(($process_type==4 && $process_stage==1))
                        {
                           $process_array['visa_cancellation'][] = $process_app_ids[] = $app_id;
                        }


                    }
                     
               }
            }
            return $process_array;
        }

      function new_app_release_passport_to_be_hr($owner_id)
        {
            $app_res = $this->query("select id,process_type, country_type, barcode, employee_name from applications as Application where barcode not in 
                (select barcode from passport_trackings group by barcode) and process_closed=0 and user_id=".$owner_id);
            $process_array = array();
            foreach ($app_res as $row) {
                $app_id = $row['Application']['id']; 
                $process_type = $row['Application']['process_type'];
                $country_type = $row['Application']['country_type'];

                if($process_type==NEW_RESIDENCY)
                {
                    if($country_type==1){
                    $process_array['new_residency_inside'][] = $app_id;    
                    }else{
                    $process_array['new_residency_outside'][] = $app_id;    
                    }
                }elseif($process_type==RENEW_RESIDENCY)
                {
                $process_array['renew_residency'][] = $app_id;
                }elseif($process_type==LOCAL_TRANSFER)
                {
                $process_array['local_transfer'][] = $app_id;
                }elseif($process_type==CANCELLATION)
                {
                $process_array['cancellation'][] = $app_id;
                }
            }
            return $process_array;
        }


        function get_app_issue_report($owner_id){
            $appIssues = $this->query("select application_id,process_type,process_stage from application_issues as ApplicationIssue where  user_id=$owner_id and issue_solved=0");
            foreach ($appIssues as $row) {
               $app_id = $row['ApplicationIssue']['application_id']; 
               $process_type = $row['ApplicationIssue']['process_type'];
               $process_stage = $row['ApplicationIssue']['process_stage'];

                if($process_type==1 && $process_stage==1)
                {
                   $process_array['entry_permit'][] = $app_id;
                }elseif($process_type==1 && $process_stage==2)
                {
                   $process_array['change_status'][] = $app_id;
                }elseif(($process_type==1 && $process_stage==3) || ($process_type==2 && $process_stage==1) || ($process_type==3 && $process_stage==2))
                {
                   $process_array['emirates_id'][] = $app_id;
                }elseif(($process_type==1 && $process_stage==4) || ($process_type==2 && $process_stage==2) || ($process_type==3 && $process_stage==3))
                {
                   $process_array['medical_test'][] = $app_id;
                }elseif(($process_type==1 && $process_stage==5) || ($process_type==2 && $process_stage==3) || ($process_type==3 && $process_stage==5))
                {
                   $process_array['zajel'][] = $app_id;
                }elseif(($process_type==1 && $process_stage==6) || ($process_type==2 && $process_stage==4) || ($process_type==3 && $process_stage==6))
                {
                   $process_array['residence_permit'][] = $app_id;
                }elseif(($process_type==3 && $process_stage==1))
                {
                   $process_array['immigration_approval'][] = $app_id;
                }elseif(($process_type==3 && $process_stage==4)) 
                {
                   $process_array['evision_approval'][] = $app_id;
                }elseif(($process_type==4 && $process_stage==1))
                {
                   $process_array['visa_cancellation'][] = $app_id;
                }

            }
            return $process_array;
        }

    public function get_passport_tracking($owner_id){
        
         
         App::import ("Model", "PassportTracking");
         $model = new PassportTracking;

          $barcode_results = $this->find('list', array('conditions'=>array('Application.barcode !='=>'', 'Application.user_id'=>$owner_id, 'Application.process_closed'=>false),'fields'=>array('Application.id', 'Application.barcode')));
          if(!empty($barcode_results))
          {

              $received_barcode_gro = $dispatched_barcode_gro = $dispatched_barcode_gro = $received_barcode_hr = 
              $received_barcode_gro = $dispatched_barcode_gro = $barcode_in_process = 
              $dispatched_barcode_hr = $received_barcode_hr = array();
  
              $tracking_result = $model->find('all', array('conditions'=>array('PassportTracking.barcode'=>$barcode_results, 'PassportTracking.user_id'=>$owner_id),'fields'=>array('PassportTracking.barcode', 'PassportTracking.process_type')));
              
              foreach ($tracking_result as $tracking) {

                  $p_type = $tracking['PassportTracking']['process_type'];
                  $barcode = $tracking['PassportTracking']['barcode'];
                  $barcode_in_process[] = $barcode;
                  if($p_type==PASSPORT_DIPATCH_HR)
                  {
                    $dispatched_barcode_hr[] = $barcode;
                  }elseif($p_type==PASSPORT_RECEIVED_GRO)
                  {
                    $received_barcode_gro[] = $barcode;;
                  }elseif($p_type==PASSPORT_DIPATCH_GRO)
                  {
                    $dispatched_barcode_gro[] = $barcode;
                  }elseif($p_type==PASSPORT_RECEIVED_HR)
                  {
                    $received_barcode_hr[] = $barcode;
                  }
              }
              
              $passport_released_gro    = array_diff($dispatched_barcode_gro,$received_barcode_hr);
              $passport_received_gro    = array_diff($received_barcode_gro,$dispatched_barcode_gro);
              $passport_released_hr     = array_diff($dispatched_barcode_hr,$received_barcode_gro);
              $passport_received_hr     = $received_barcode_hr;
              return array('passport_released_gro'=>$passport_released_gro, 'passport_received_gro'=>$passport_received_gro,
                'passport_released_hr'=>$passport_released_hr, 'passport_received_hr'=>$passport_received_hr);
              
        } 

    }

        public function search_conditions_for_passport_tracking($first_params,$owner_id){
            $result = $this->get_passport_tracking($owner_id);
            $barcodes = $result[$first_params];
            return $search_conditions = array('Application.barcode'=>$barcodes);
        }

}