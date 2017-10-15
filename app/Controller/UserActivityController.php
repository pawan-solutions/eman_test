<?php
Class UserActivityController extends AppController {
	public $uses = array('PassportMassager','User','Application','UserGroup','Company','Notification','ApplicationAction',"PassportTracking");
	
	public function everyone()
	{
		$this->layout='user_layout_new';
		$owner_id = $this->Common->getOwnerId();
		$employees = $this->User->find('all', array('recursive'=>-1, 'conditions'=>array('User.owner_id'=>$owner_id), 'order'=>'User.id desc'));
    $this->set('employees',$employees);
	}

	public function me()
	{ 
		$this->layout='user_layout_new';
		$user_id = $this->UserAuth->getUserId();
		$userGroup = $this->Session->read('UserAuth.UserGroup.Name');
		$userinfo = $this->User->find('first', array('recursive'=>0, 'conditions'=>array('User.id'=>$user_id)));
        
        if($userGroup=="User")
        {
        	$role = "Owner";
        }else{
        	$role = $userGroup;
        }
        $this->set('role',$role);
        $this->set('userinfo',$userinfo);

	}

	public function view_employee($user_id)
	{
		$this->layout='user_layout_new';
		$userinfo = $this->User->find('first', array('conditions'=>array('User.id'=>$user_id)));
		$group_id = $userinfo['User']['user_group_id'];
		$company_ids = json_decode($userinfo['User']['company_id']);
		$group_info = $this->UserGroup->find('first', array('recursive'=>-1,'conditions'=>array('UserGroup.id'=>$group_id)));
		$companies = $this->Company->find('list', array('recursive'=>-1, 'fields'=>array('Company.id','Company.company_name'), 'conditions'=>array('Company.id'=>$company_ids)));
        
        $db = ConnectionManager::getDataSource("default");
        $query_proc = "CALL user_action_history($user_id)";
        $user_action_history = $db->query($query_proc);
        
        $role = $group_info['UserGroup']['name'];
		$this->set(compact('userinfo','role','companies','user_action_history'));

	}

	public function change_password()
	{
		$this->layout='user_layout_new';
	}

	public function notifications($read=null)
	{
		$this->layout='user_layout_new';
		$owner_id = $this->Common->getOwnerId();
		$userGroup = $this->Session->read('UserAuth.UserGroup.Name');
		if(strtolower($userGroup)==GRO)
           {
           		$notifications = $this->Notification->find('all', array('conditions'=>array('read'=>false, 'owner_id'=>$owner_id, 'type'=>array(1,3)), 'order'=>'id desc'));
           		foreach ($notifications as $notification) {
           			$app_ids[] = $notification['Notification']['application_id'];
           		}
           }else{
           		$notifications = $this->Notification->find('all', array('conditions'=>array('read'=>false, 'owner_id'=>$owner_id, 'type'=>array(2,4)),'order'=>'id desc'));
           		foreach ($notifications as $notification) {
           			$app_ids[] = $notification['Notification']['application_id'];
           		}

           		if(!empty($app_ids))
           		{
           		$appInfo = $this->Application->find('list', array('conditions'=>array('id'=>$app_ids), 
           			'fields'=>array('id','employee_name')));
           		}
           }

           if($read=="read")
           {
           	 $this->Notification->updateAll(array('Notification.read' => 1), array('Notification.application_id'=>$app_ids));
           	 $this->Session->setFlash(__('All Notification Marked As Read.'));
             $this->redirect("/UserActivity/notifications");
        
           }

           // if((strtolower($userGroup)==GRO || strtolower($userGroup)==HR) && !empty($app_ids))
           // {
           // 	$this->Notification->updateAll(array('Notification.read' => 1), array('Notification.application_id'=>$app_ids));
           // }
		$this->set(compact('notifications', 'appInfo'));
	
	}


  public function passport_tracking($barcodes=null,$from=null){
      $this->layout='';
      $userGroup = strtolower($this->Session->read('UserAuth.UserGroup.Name'));
      $user_id = $this->UserAuth->getUserId();
      $owner_id = $this->Common->getOwnerId();

      if($this->request->data || $barcodes){
          if(empty($barcodes)){
            $barcode = $this->request->data['barcodes'];
            $barcode_exp = explode(",", $barcode);
            $barcode_exp = array_filter($barcode_exp);
            $barcodes = array_unique($barcode_exp);
          }
          $dispatchable_hr = $receivable_hr = $receivable_gro = $dispatchable_gro = $completed = $dsptchd_hr_datetime = array();
          $barcode_in_process = $wrong_barcode = $dispatched_barcode_hr = $received_barcode_gro = $dispatched_barcode_gro = $received_barcode_hr = array();
          $barcode_results = $this->Application->find('list', array('conditions'=>array('Application.barcode'=>$barcodes, 'Application.user_id'=>$owner_id),'fields'=>array('Application.id', 'Application.barcode')));
          if(!empty($barcode_results))
          {

              $tracking_result = $this->PassportTracking->find('all', array('conditions'=>array('PassportTracking.barcode'=>$barcode_results, 'PassportTracking.user_id'=>$owner_id),'fields'=>array('PassportTracking.barcode', 'PassportTracking.process_type', 'PassportTracking.created_date')));
              foreach ($tracking_result as $tracking) {

                  $p_type = $tracking['PassportTracking']['process_type'];
                  $barcode = $tracking['PassportTracking']['barcode'];
                  $created_date = $tracking['PassportTracking']['created_date'];
                  
                  $barcode_in_process[] = $barcode;
                  if($p_type==PASSPORT_DIPATCH_HR)
                  {
                    $dispatched_barcode_hr[] = $barcode;
                    $rcvble_hr_datetime[$barcode] = $created_date;
                  }elseif($p_type==PASSPORT_RECEIVED_GRO)
                  {
                    $received_barcode_gro[] = $barcode;;
                  }elseif($p_type==PASSPORT_DIPATCH_GRO)
                  {
                    $dispatched_barcode_gro[] = $barcode;
                    $rcvble_gro_datetime[$barcode] = $created_date;
                  }elseif($p_type==PASSPORT_RECEIVED_HR)
                  {
                    $received_barcode_hr[] = $barcode;
                  }
              }
             //pr($dispatched_barcode_hr);pr($received_barcode_gro);pr($dispatched_barcode_gro);pr($received_barcode_hr);die;

              $wrong_barcode = array_diff($barcodes,$barcode_results);
              $dispatchable_hr = array_diff($barcode_results,$barcode_in_process);
              $receivable_hr = array_diff($dispatched_barcode_gro,$received_barcode_hr);

              $receivable_gro = array_diff($dispatched_barcode_hr,$received_barcode_gro);
              $dispatchable_gro = array_diff($received_barcode_gro,$dispatched_barcode_gro);
              $completed = $dispatched_barcode_gro;
        
          }else{
            $wrong_barcode = $barcodes;
          }
      }

      //pr($wrong_barcode);pr($dispatchable_hr);pr($receivable_gro);pr($dispatchable_gro);pr($receivable_hr);die;
      if($from=="passport_tracking_submit")
      {
        return array('userGroup'=>$userGroup, 'wrong_barcode'=>$wrong_barcode,'dispatchable_hr'=>$dispatchable_hr,'receivable_hr'=>$receivable_hr, 'receivable_gro'=>$receivable_gro, 'dispatchable_gro'=>$dispatchable_gro);
        }else{
        $dispatch_to = array(1=>"GR", 2=>'HR', 3=>"Zajel");  
        $name_and_barcode = $this->Application->find('list', array('conditions'=>array('Application.barcode'=>$barcode_results, 'Application.user_id'=>$owner_id),'fields'=>array('Application.barcode', 'Application.employee_name')));
        $dispatch_by = $this->Session->read("UserAuth.User.first_name");
        $this->set(compact('completed',"dispatch_by","dispatch_to","name_and_barcode",'userGroup', 
          'wrong_barcode','dispatchable_hr','receivable_hr', 'receivable_gro','dispatchable_gro',
          'rcvble_hr_datetime', 'rcvble_gro_datetime'));
        return;
      }
  }

  
  public function passport_tracking_submit(){
      $this->layout = $this->autoRender = false;
      $userGroup = strtolower($this->Session->read('UserAuth.UserGroup.Name'));
      $user_id = $this->UserAuth->getUserId();
      $owner_id = $this->Common->getOwnerId();
      $step1_array = $step2_array = array();

      $barcode = $this->request->data['barcodes'];
      $barcodes = explode(",", $barcode);
      $barcodes = array_unique($barcodes);
      $from = "passport_tracking_submit";

      $save_array = array();
      if($this->request->data){
          $splitted_barcode = $this->passport_tracking($barcodes, $from);
          
          $userGroup = $splitted_barcode['userGroup'];
          $wrong_barcode = $splitted_barcode['wrong_barcode'];
          $dispatchable_hr = $splitted_barcode['dispatchable_hr']; 
          $receivable_hr = $splitted_barcode['receivable_hr'];
          $receivable_gro = $splitted_barcode['receivable_gro'];
          $dispatchable_gro = $splitted_barcode['dispatchable_gro'];
          if(empty($dispatchable_hr) && empty($dispatchable_hr) && empty($dispatchable_hr) && empty($dispatchable_hr))
          {
            echo "Not any status updated due to wrong barcode";
            exit;
          }
          
          if($userGroup== HR || $userGroup== "user")
          {
            $user_type = 1; 
            $save_array = $this->passport_track_array($save_array,$dispatchable_hr,$user_type,PASSPORT_DIPATCH_HR,$owner_id,$user_id);
            $save_array = $this->passport_track_array($save_array,$receivable_hr,$user_type,PASSPORT_RECEIVED_HR,$owner_id,$user_id);
          }elseif($userGroup== GRO){
            $user_type = 2;
            $save_array = $this->passport_track_array($save_array,$receivable_gro,$user_type,PASSPORT_RECEIVED_GRO,$owner_id,$user_id);
            $save_array = $this->passport_track_array($save_array,$dispatchable_gro,$user_type,PASSPORT_DIPATCH_GRO,$owner_id,$user_id);
          }
      
           
          if(!empty($save_array))
          {
              $this->PassportTracking->saveAll($save_array);
              if($dispatchable_hr!= '' || $dispatchable_gro!='')
              {
              $dispatch_to = $this->request->data['dispatch_to'];
              $massager_name = $this->request->data['massager_name'];
              $created_date = date("Y-m-d H:i:s");
              $passport_tracking_ids = '';
              $massager_array = array('id'=>'', 'user_id'=>$owner_id,'dispatch_to'=>$dispatch_to,'massager_name'=>$massager_name,
                'passport_tracking_ids'=>$passport_tracking_ids,'barcodes'=>json_encode($barcodes),'created_by'=>$user_id, 'created_date'=>$created_date);
              $this->PassportMassager->save($massager_array);
              }
              
          }
          return "Barcode status updated successfully";
      }
    }

    function passport_track_array($save_array, $barcodes,$user_type,$process_type,$owner_id,$created_by)
    {
        if(!empty($barcodes))
        {
            $created_date = date("Y-m-d H:i:s");
            foreach ($barcodes as $key => $barcode) {
                $barcode_app_id = (int)str_replace("E", "", $barcode);
                $save_array[] = array('id'=>'', 'barcode'=>$barcode, 'application_id'=>$barcode_app_id, 'user_id'=>$owner_id , 'user_type'=>$user_type, 'process_type'=>$process_type, 'created_by'=>$created_by , 'created_date'=>$created_date);
            }
        }
        return $save_array;
    }

}

