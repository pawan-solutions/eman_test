<?php
class ApplicationsController  extends AppController {

    var $uses = array("ApplicationProcessHistory", "Notification","Company", "ApplicationAction","Application",
        'ApplicationProcess','ApplicationDetail',"ApplicationReferenceNumber","ApplicationIssue","ApplicationLog",
        "ConvertedApplication");
    var $component = array("Common");
    public $paginate = array();  

    public function image_uploading($req_data, $image_for)
    {
        $file_path = WWW_ROOT.IMAGES_URL."applications/".$image_for;
        if(!is_dir($file_path))
        {
           mkdir($file_path);
        }
        
        $trade_image = $req_data['Application'][$image_for];
        $path_info = pathinfo($trade_image['name']);
        $fileName = $image_for.'-'.time().".".$path_info['extension'];
        if(move_uploaded_file($trade_image['tmp_name'], $file_path.DS.$fileName)) {
            return $fileName;
        }
    }

    public function new_residency() { 
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        if($this->request->data){
            $this->request->data['Application']['user_id'] = $owner_id;
            $this->request->data['Application']['process_type'] = NEW_RESIDENCY;
            $this->request->data['Application']['created_by'] = $user_id;

            //Upload Photo of all document
            $image_types = array("emp_photo", "emp_passport1", "emp_passport2", "emp_passport3", "visa_form", 
                "education_certificate","emirates_id","emirates_id_back", "health_insurence","other_approval","other", "visit_visa_copy");
            
            foreach ($image_types as $image_type) {
                if(!empty($this->request->data['Application'][$image_type]['name']))
                {
                    $fileName = $this->image_uploading($this->request->data, $image_type);
                    $this->request->data['ApplicationDetail'][$image_type] = $fileName;
                }else{
                    $this->request->data['ApplicationDetail'][$image_type] = '';
                }  
            }
            
            if($this->Application->save($this->request->data))
            {
            $application_id = $this->Application->getLastInsertID();    
            $this->Common->BarcodeGenerateAndSave($application_id);
            $this->request->data['ApplicationDetail']['application_id'] = $application_id;    
            $this->ApplicationDetail->save($this->request->data);
            $this->Notification->save_data($application_id,$owner_id,1, NEW_RESIDENCY );
            $barcode = $this->Common->BarcodeGenerate($application_id);
            $this->Application->id = $application_id;
            $this->Application->saveField("barcode",$barcode);
            $this->Session->setFlash(__('New Residency has been “Applied should be uploaded instead” successfully.'));
            $this->redirect("/applications/everything");
            }
        }
        $user_id = $this->UserAuth->getUserId();
        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $companies = $this->Company->companyLists($owner_id, $userGroupId, $session_company_id);
        $country_type = unserialize(COUNTRY_TYPE);
        $country_type[1] = "Inside UAE";
        $country_type[2] = "Outside UAE";
        $marital_status = unserialize(MARITAL_STATUS);
        $gender_list = array(''=>'Select Male/ Female', 'male'=>'Male', 'female'=>'Female');
        $this->set(compact("companies","country_type","marital_status", "gender_list"));
	}

	public function renew_residency() {
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);

         if($this->request->data){
            $this->request->data['Application']['user_id'] = $owner_id;
            $this->request->data['Application']['process_type'] = RENEW_RESIDENCY;
            $this->request->data['Application']['created_by'] = $user_id;


            //Upload Photo of all document
            $image_types = array("emp_photo", "emp_passport1", "emp_passport2", "emp_passport3", "emirates_id",
                "emirates_id_back", "health_insurence","medical_certificate", "education_certificate", "visa_form", "other_approval", "other", "residency_copy", "labour_card");
            
            foreach ($image_types as $image_type) {
                if(!empty($this->request->data['Application'][$image_type]['name']))
                {
                    $fileName = $this->image_uploading($this->request->data, $image_type);
                    $this->request->data['ApplicationDetail'][$image_type] = $fileName;
                }else{
                    $this->request->data['ApplicationDetail'][$image_type] = '';
                }  
            }

            if($this->Application->save($this->request->data))
            {
            $application_id = $this->Application->getLastInsertId();   
            $this->request->data['ApplicationDetail']['application_id'] = $application_id;    
            $this->ApplicationDetail->save($this->request->data);  
            $this->Notification->save_data($application_id,$owner_id,1, RENEW_RESIDENCY);
            $barcode = $this->Common->BarcodeGenerate($application_id);
            $this->Application->id = $application_id;
            $this->Application->saveField("barcode",$barcode); 
            $this->Session->setFlash(__('Renew Residency has been “Applied should be uploaded instead” successfully.'));
            $this->redirect("/applications/everything");
            }
        }
        
        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $companies = $this->Company->companyLists($owner_id, $userGroupId, $session_company_id);
        $country_type = unserialize(COUNTRY_TYPE);
        $marital_status = unserialize(MARITAL_STATUS);
        $this->set(compact("companies","country_type","marital_status"));
	}
	public function local_transfer() {
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);

        if($this->request->data){
            $this->request->data['Application']['user_id'] = $owner_id;
            $this->request->data['Application']['process_type'] = LOCAL_TRANSFER;
            $this->request->data['Application']['created_by'] = $user_id;

            //Upload Photo of all document
            $image_types = array("emp_photo", "emp_passport1", "emp_passport2", "emp_passport3", "trade_license", 
                "establishment_card","emp_contract","education_certificate", "visa_form","other_approval","other", "residency_copy");
            
            foreach ($image_types as $image_type) {
                if(!empty($this->request->data['Application'][$image_type]['name']))
                {
                    $fileName = $this->image_uploading($this->request->data, $image_type);
                    $this->request->data['ApplicationDetail'][$image_type] = $fileName;
                }else{
                    $this->request->data['ApplicationDetail'][$image_type] = '';
                }  
            }

            if($this->Application->save($this->request->data))
            {
            $application_id = $this->Application->getLastInsertId();    
            $this->request->data['ApplicationDetail']['application_id'] =  $application_id;   
            $this->ApplicationDetail->save($this->request->data);   
            $this->Notification->save_data($application_id,$owner_id,1, LOCAL_TRANSFER);
            $barcode = $this->Common->BarcodeGenerate($application_id);
            $this->Application->id = $application_id;
            $this->Application->saveField("barcode",$barcode);
            $this->Session->setFlash(__('Local transfer has been “Applied should be uploaded instead” successfully.'));
            $this->redirect("/applications/everything");
            }
        }
        
        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $companies = $this->Company->companyLists($owner_id, $userGroupId, $session_company_id);
        $country_type = unserialize(COUNTRY_TYPE);
        $marital_status = unserialize(MARITAL_STATUS);
        $this->set(compact("companies","country_type","marital_status"));
	}

	public function cancellation() {
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);

        if($this->request->data){


            //Upload Photo of all document
            $image_types = array("emp_photo", "emp_passport1", "emp_passport2", "emp_passport3", "visa_form", "other_approval","other", "residency_copy", "labour_card");
            
            foreach ($image_types as $image_type) {
                if(!empty($this->request->data['Application'][$image_type]['name']))
                {
                    $fileName = $this->image_uploading($this->request->data, $image_type);
                    $this->request->data['ApplicationDetail'][$image_type] = $fileName;
                }else{
                    $this->request->data['ApplicationDetail'][$image_type] = '';
                }  
            }

            $this->request->data['Application']['user_id'] = $owner_id;
            $this->request->data['Application']['created_by'] = $user_id;
            $this->request->data['Application']['process_type'] = CANCELLATION;
            if($this->Application->saveAll($this->request->data))
            {
            $application_id = $this->Application->getLastInsertId();    
            $this->request->data['ApplicationDetail']['application_id'] =  $application_id;   
            $this->ApplicationDetail->save($this->request->data);   
            $this->Notification->save_data($application_id,$owner_id,1, CANCELLATION);
            $barcode = $this->Common->BarcodeGenerate($application_id);
            $this->Application->id = $application_id;
            $this->Application->saveField("barcode",$barcode);
            $this->Session->setFlash(__('Cancellation has been “Applied should be uploaded instead” successfully.'));
            $this->redirect("/applications/everything");
            }
        }
        
        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $companies = $this->Company->companyLists($owner_id, $userGroupId, $session_company_id);
        $country_type = unserialize(COUNTRY_TYPE);
        $marital_status = unserialize(MARITAL_STATUS);
        $this->set(compact("companies","country_type","marital_status"));
	}

	public function adjustment() {
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);

        if($this->request->data){


            //Upload Photo of all document
            $image_types = array("emp_photo", "emp_passport1", "emp_passport2", "residency_copy", "education_certificate", "labour_card");
            
            foreach ($image_types as $image_type) {
                if(!empty($this->request->data['Application'][$image_type]['name']))
                {
                    $fileName = $this->image_uploading($this->request->data, $image_type);
                    $this->request->data['ApplicationDetail'][$image_type] = $fileName;
                }else{
                    $this->request->data['ApplicationDetail'][$image_type] = '';
                }  
            }

            $this->request->data['Application']['user_id'] = $owner_id;
            $this->request->data['Application']['created_by'] = $user_id;
            $this->request->data['Application']['process_type'] = ADJUSTMENT;
            if($this->Application->saveAll($this->request->data))
            {
            $application_id = $this->Application->getLastInsertId();    
            $this->request->data['ApplicationDetail']['application_id'] =  $application_id;   
            $this->ApplicationDetail->save($this->request->data);   
            $this->Notification->save_data($application_id,$owner_id,1, ADJUSTMENT);
            $barcode = $this->Common->BarcodeGenerate($application_id);
            $this->Application->id = $application_id;
            $this->Application->saveField("barcode",$barcode);
            $this->Session->setFlash(__('Adjustment has been “Applied should be uploaded instead” successfully.'));
            $this->redirect("/applications/everything");
            }
        }

        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $companies = $this->Company->companyLists($owner_id, $userGroupId, $session_company_id);
        $country_type = unserialize(COUNTRY_TYPE);
        $marital_status = unserialize(MARITAL_STATUS);
        $this->set(compact("companies","country_type","marital_status"));
	}

    public function everything() {
        
        $this->layout='user_layout_new';
        $userGroup = $this->Session->read('UserAuth.UserGroup.Name');
        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        
        $application_type = unserialize(APPLICATION_TYPE);
        $limit = PAGE_LIMIT;
        $search_conditions = array();
        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $condition_cmp_ids = $this->Common->allowed_company($userGroupId, $session_company_id,"application");

        if($this->request->is('post')) {
            $search_conditions = $this->search_conditions($this->request->data);
            $this->request->params['named']['page'] = 1;
        }elseif(isset($this->request->params['pass'][0]))
        {  
            $first_params = isset($this->request->params['pass'][0])?$this->request->params['pass'][0]:'';
            $process_stages_array = unserialize(PROCESS_STAGES);

            //REFERER FROM "PASSPORT MOVEMENT LOG"
            $passport_track_type = unserialize(PASSPORT_TRACK_TYPE);
            if($first_params=="new_apps")
            {
                $result = $this->Application->new_app_release_passport_to_be_hr($owner_id);
                $process_type = isset($this->request->params['pass'][1])?$this->request->params['pass'][1]:'';
                $app_ids = $result[$process_type];
                $search_conditions = array('Application.id'=>$app_ids);

            }elseif($first_params=="app_error"){
                $result = $this->Application->get_app_issue_report($owner_id);
                $process_type = isset($this->request->params['pass'][1])?$this->request->params['pass'][1]:'';
                $app_ids = $result[$process_type];
                $search_conditions = array('Application.id'=>$app_ids);
            }else
            if(in_array($first_params,$passport_track_type))
            {
                $search_conditions = $this->Application->search_conditions_for_passport_tracking($first_params,$owner_id);
            }
             //REFERER FROM "APPLICATION PROCESS REPORT"
            elseif(in_array($first_params,$process_stages_array))
            {   
                $second_params = isset($this->request->params['pass'][1])?$this->request->params['pass'][1]:'';
                $chart_type = $second_params; //1 for typing, 2 for process completion
                if($second_params==1)
                {
                $search_conditions = $this->search_conditions_for_typing($first_params);
                }elseif($second_params==2){
                $search_conditions = $this->search_conditions_for_completion($first_params);    
                }
                
            }else{
                $app_id_from_notification = isset($this->request->params['pass'][0])?$this->request->params['pass'][0]:'';
                if($app_id_from_notification!='')
                {

                    $search_conditions = array('Application.id'=>$app_id_from_notification);
                     if((strtolower($userGroup)==GRO || strtolower($userGroup)==HR))
                     {
                      $this->Notification->updateAll(array('Notification.read' => 1), array('Notification.application_id'=>$app_id_from_notification));
                     }

                }
            }
           
        }



        $conditions = array('Application.user_id'=>$owner_id, 'Application.process_closed'=>false)+$search_conditions+$condition_cmp_ids;
        $fields = array('Application.*', 'Company.company_name','Company.id','Company.company_type');
        $this->paginate = array('limit' => $limit, 'conditions' => $conditions, 'order'=>'Application.id desc',
            'fields'=>$fields);
        $companies = $this->Company->companyLists($owner_id,$userGroupId, $session_company_id);
        $companies = array(''=>'Select company')+$companies;

        $this->Session->write('paginate', $this->paginate);
        $this->paginate = $this->Session->read('paginate');
        $applications = $this->paginate('Application');
        $application_count = $this->Application->find('count', array('conditions'=>array('Application.user_id'=>$owner_id, 'Application.process_closed'=>false)));
       
        $this->set(compact("applications", "application_type", "companies", "application_count", "userGroupId","userGroup"));
        if(strtolower($userGroup)==HR)
        {
            $this->render('everything_hr');
        }
    }


    public function update_process()
    {
        $this->layout = $this->autoRender = false;

        if($this->request->data)
        { 
            if(!empty($this->request->data['Application']['supporting_file']['name']))
            {       
                $supporting_file_path = WWW_ROOT.IMAGES_URL.SUPPORTING_DOCS;
                $img_image = $this->request->data['Application']['supporting_file'];
                $path_info = pathinfo($img_image['name']);
                $fileName = 'supporting-'.time().".".$path_info['extension'];
                if(move_uploaded_file($img_image['tmp_name'], $supporting_file_path.DS.$fileName)) {
                    chmod($supporting_file_path.DS.$fileName, 0777);
                    $this->request->data['Application']['supporting_file'] = $fileName;
                }
            }else{
                $this->request->data['Application']['supporting_file'] = '';
            }

            $application_id = $this->request->data['Application']['application_id']; 
            $process_stage = $this->request->data['Application']['process_stage']; 
            $appRes = $this->Application->findById($application_id,'Application.process_status');
            $current_process_stage = isset($appRes['Application']['process_status'])?$appRes['Application']['process_status']:'';
            if($process_stage==1 || ($current_process_stage == ($process_stage-1)))
            {
                $user_id = $this->UserAuth->getUserId();
                $owner_id = $this->Application->getOwnerId($user_id);
                $created_date = date('Y-m-d H:i:s');
                $this->Application->id = $application_id;
                $this->Application->saveField("process_status",$process_stage);
                $process_array['ApplicationProcess'] = array('id'=>'',
                    'user_id'=>$owner_id,
                    'application_id'=>$application_id,
                    'process_stage'=>$process_stage,
                    'completion_date'=>$this->request->data['Application']['completion_date'],
                    'supporting_document'=>$this->request->data['Application']['supporting_file'],
                    'created_by'=>$user_id,
                    'created_date'=>$created_date);
                $this->ApplicationProcess->save($process_array);
                return 'Process updated successfully.';
            }else{
               return "Please complete previous stage"; 
            }
        }
    }

    public function visa_process_feedback()
    {
        $this->layout = $this->autoRender = false;

        if($this->request->data)
        {  
            $application_id = trim($this->request->data['ApplicationProcess']['application_id']); 
            $process_stage = trim($this->request->data['ApplicationProcess']['process_stage']); 
            $type = trim($this->request->data['ApplicationProcess']['type']); 
            $user_id = $this->UserAuth->getUserId();
            $owner_id = $this->Application->getOwnerId($user_id);
            $created_date = date('Y-m-d H:i:s');

            $app_res = $this->Application->find('first',array('conditions'=>array('Application.id'=>$application_id),
                'fields'=>array('Application.country_type', 'Application.process_status','Application.process_issue','Application.process_type', 'Application.next_typing', 'Application.ref_number_status')));
            $process_type = $app_res['Application']['process_type'];
            $next_typing_fromdb = $app_res['Application']['next_typing'];
            if($type=="what")  //issue
            { 
                if(!empty($app_res['Application']['process_issue']))
                {
                  $db_process_issue = json_decode($app_res['Application']['process_issue']);
                  array_push($db_process_issue,$process_stage);
                  $process_issues =  json_encode($db_process_issue);
                }else{
                  $process_issues =  json_encode(array($process_stage));   
                }
               
                $comment = trim($this->request->data['ApplicationProcess']['comment']); 
                $issues = json_encode($this->request->data['issues']); 


                $issue_id = $this->ApplicationIssue->save_issue($user_id,$owner_id,$application_id,$process_type,$process_stage,$issues,$comment);
                $this->Application->id = $application_id;
                $this->Application->saveField("process_issue",$process_issues);
                $this->Notification->save_data($application_id,$owner_id,2);
            
                //Mail sent to HR person
                //$this->Application->ApplicationIssueMailToHR($application_id,$process_stage,$owner_id);

            }elseif($type=="checkbox"){  //next process

                if(!empty($this->request->data['ApplicationProcess']['supporting_file']['name']))
                {       
                    $supporting_file_path = WWW_ROOT.IMAGES_URL.SUPPORTING_DOCS;
                    $img_image = $this->request->data['ApplicationProcess']['supporting_file'];
                    $path_info = pathinfo($img_image['name']);
                    $fileName = 'supporting-'.time().".".$path_info['extension'];
                    if(move_uploaded_file($img_image['tmp_name'], $supporting_file_path.DS.$fileName)) {
                        chmod($supporting_file_path.DS.$fileName, 0777);
                        $this->request->data['Application']['supporting_file'] = $fileName;
                    }
                }else{
                    $this->request->data['Application']['supporting_file'] = '';
                }

                    $supporting_document = $this->request->data['Application']['supporting_file'];
                    if(!empty($app_res['Application']['process_status']))
                    {
                      $db_process_issue = json_decode($app_res['Application']['process_status']);
                      $newArr = array($process_stage=>$supporting_document);
                      $newArrMerge = (array)$db_process_issue+$newArr;
                      $process_statuses =  json_encode($newArrMerge);
                    }else{
                      $process_statuses =  json_encode(array($process_stage=>$supporting_document));   
                    }

                    $updated_process_count = count((array)json_decode($process_statuses));
                    $pro_type = $app_res['Application']['process_type'];
                    $process_steps = unserialize(PROCESS_STEPS);
                    $last_process_type = $process_steps[$pro_type];

                    if($updated_process_count == $last_process_type)
                    {
                        $this->Application->id = $application_id;
                        $this->Application->saveField("process_closed",true); 
                    }
                    //find next stage
                    $next_stage = $this->Common->next_to_be_steps($process_statuses);
                    
                    $completion_date = $this->request->data['ApplicationProcess']['completion_date'];
                    $this->ApplicationProcess->save_data($user_id,$owner_id,$application_id, $process_type, $process_stage,$completion_date,$supporting_document);
                    $this->Application->id = $application_id;
                    $this->Application->saveField("process_status",$process_statuses);
                    $this->Application->saveField("process_status_next",$next_stage);
                    if($next_stage==2 && $next_typing_fromdb==2 && $process_type==1 && $app_res['Application']['country_type']==2)
                    {
                        $this->Application->saveField("next_typing",3);
                        
                        $db_ref_status = json_decode($app_res['Application']['ref_number_status']);
                        $RefNewArr = array($next_stage=>'');
                        $newRefMerge = (array)$db_ref_status+$RefNewArr;
                        $ref_statuses =  json_encode($newRefMerge);
                        $this->Application->saveField("ref_number_status",$ref_statuses);
                        
                        $RefArr = array("application_id"=>$application_id,'user_id'=>$owner_id, "process_stage"=>$next_stage, "ref_number"=>'dummy',
                        "process_type"=>$process_type, "ref_date"=>date("Y-m-d"), "created_by"=>$user_id,"created_date"=>date("Y-m-d H:i:s"));
                        $this->ApplicationReferenceNumber->create();
                        $this->ApplicationReferenceNumber->save($RefArr);
                    }
                    $this->Notification->save_data($application_id,$owner_id,4,$pro_type, $process_stage);
                    
            }

            return 'Process updated successfully.';
            
            
        }
    }

    public function get_documents()
    {   

        $this->layout =  false;
        $application_id = $this->request->data['application_id'];
        $employee_documents = $this->ApplicationDetail->findByApplicationId($application_id,array("application_id","emp_photo","emp_passport1","emp_passport2", "emp_passport3","trade_license",
            "establishment_card","emp_noc","emp_contract","education_certificate","visa_form","emirates_id", "emirates_id_back","health_insurence","other_approval","other", "visit_visa_copy", "residency_copy", 'labour_card'));
        
        $visa_documents = $this->Application->find('first', array('conditions'=>array('Application.id'=>$application_id), 'fields'=>array('Application.country_type','Application.process_status','Application.process_type',"ref_number_status", 'Company.company_type')));
        $this->set(compact("employee_documents","visa_documents"));
    }

    public function completed() {
        $this->layout='user_layout_new';
        $userGroup = $this->Session->read('UserAuth.UserGroup.Name');
        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        $new_residency_process = unserialize(NEW_RESIDENCY_PROCESS); //array(1=>"Entry Permit",2=>"Outpass",3=>"Emirates ID", 4=>"Medical Test",5=>"Zajel",6=>"Residence Permit");
        $renew_residency_process = unserialize(RENEW_RESIDENCY_PROCESS);//array(1=>"Emirates ID",2=>"Medical Test",3=>"Zajel",4=>"Residence Permit");
        $local_transfer_process = unserialize(LOCAL_TRANSFER_PROCESS);//array(1=>"Immigration Approval", 2=>"eVision Approval", 3=>"Emirates ID", 4=>"Medical Test",5=>"Zajel",6=>"Residence Permit");
        $cancellation_process = unserialize(CANCELLATION_PROCESS);//array(1=>"Visa Cancellation");
        $application_type = unserialize(APPLICATION_TYPE);
        $search_conditions = array();
        $limit = 50;

        if($this->request->is('post')) {

            $search_conditions = $this->search_conditions($this->request->data);
        }

        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $condition_cmp_ids = $this->Common->allowed_company($userGroupId, $session_company_id,"application");

        $conditions = array('Application.user_id'=>$owner_id, 'Application.process_closed'=>true)+$search_conditions+$condition_cmp_ids;
        $this->paginate = array('limit' => $limit, 'conditions' => $conditions, 'order'=>'Application.id desc');
        $companies = $this->Company->companyLists($owner_id, $userGroupId, $session_company_id);
        $companies = array(''=>'Select company')+$companies;

        $this->Session->write('paginate', $this->paginate);
        $this->paginate = $this->Session->read('paginate');
        $applications = $this->paginate('Application');


        //$applications = $this->Application->find('all', array('conditions'=>array('Application.user_id'=>$owner_id, 'Application.process_closed'=>true)));
        $this->set(compact("applications", "new_residency_process","renew_residency_process","local_transfer_process","cancellation_process","application_type", "companies","userGroupId"));
        
    }

    function search_conditions($field_values=null)
    {
        $this->Session->write("AppSearch", $field_values);
        if(isset($field_values))
        {
            $s_name = $s_comp = $s_p_type = array();
            $this->request->data = $field_values;
            
            $emp_name = isset($this->request->data['Application']['employee_name'])?$this->request->data['Application']['employee_name']:'';
            $company_id = isset($this->request->data['Application']['company_id'])?$this->request->data['Application']['company_id']:'';
            $process_type = isset($this->request->data['Application']['process_type'])?$this->request->data['Application']['process_type']:'';
            $created_from = isset($this->request->data['Application']['created_from'])?$this->request->data['Application']['created_from']:'';
            $created_to = isset($this->request->data['Application']['created_to'])?$this->request->data['Application']['created_to']:'';
            
            if(!empty($emp_name))
            {
            $s_name = array('Application.employee_name LIKE' => '%' . $emp_name . '%');
            }
            if(!empty($company_id))
            {
            $s_comp = array('Application.company_id'=>$company_id);
            }
            if(!empty($process_type))
            {
            $s_p_type = array('Application.process_type'=>$process_type);
            }
            if(!empty($created_from) && !empty($created_to))
            {
            $created_from = date("Y-m-d", strtotime($created_from));   
            $created_to =  date("Y-m-d", strtotime('+1 day', strtotime($created_to))); 
            $s_p_type = array('Application.created >='=>$created_from, 'Application.created <'=>$created_to);
            }
            $search_aaray = $s_name+$s_comp+$s_p_type;
            return $search_aaray;
        }
    }

    function search_conditions_for_typing($process_type=null)
    {
        $search_conditions = array();
        $owner_id = $this->Common->getOwnerId();
        
        $result = $this->Application->getNextTyping($owner_id);
        $app_ids = $result[$process_type];
        return $search_conditions = array('Application.id'=>$app_ids);

        /*$search_conditions = array();
        if($first_params=='entry_permit'){
        $search_conditions = array('Application.process_type'=>1, 'Application.next_typing'=>1);
        }elseif($first_params=='outpass'){
        $search_conditions = array('Application.process_type'=>1, 'Application.next_typing'=>2);
        }elseif($first_params=='emirates_id'){
        $search_conditions = array(
            'OR'=>array(
                array('Application.process_type'=>1, 'Application.next_typing'=>3),
                array('Application.process_type'=>2, 'Application.next_typing'=>1),
                array('Application.process_type'=>3, 'Application.next_typing'=>2),
                ));
        }elseif($first_params=='medical_test'){
        $search_conditions = array(
            'OR'=>array(
                array('Application.process_type'=>1, 'Application.next_typing'=>4),
                array('Application.process_type'=>2, 'Application.next_typing'=>2),
                array('Application.process_type'=>3, 'Application.next_typing'=>3),
                ));   
        
        }elseif($first_params=='zajel'){
        $search_conditions = array(
            'OR'=>array(
                array('Application.process_type'=>1, 'Application.next_typing'=>5),
                array('Application.process_type'=>2, 'Application.next_typing'=>3),
                array('Application.process_type'=>3, 'Application.next_typing'=>3),
                ));
        }elseif($first_params=='residence_permit'){
        $search_conditions = array(
            'OR'=>array(
                array('Application.process_type'=>1, 'Application.next_typing'=>6),
                array('Application.process_type'=>2, 'Application.next_typing'=>4),
                array('Application.process_type'=>3, 'Application.next_typing'=>6),
                ));
        }elseif($first_params=='immigration_approval'){
        $search_conditions = array('Application.process_type'=>3, 'Application.next_typing'=>1);
        }elseif($first_params=='evision_approval'){
        $search_conditions = array('Application.process_type'=>3, 'Application.next_typing'=>4);
        }elseif($first_params=='visa_cancellation'){
        $search_conditions = array('Application.process_type'=>4, 'Application.next_typing'=>1);
        }
        return $search_conditions;*/
    }

    function search_conditions_for_completion($process_type=null)
    {
        $search_conditions = array();
        $owner_id = $this->Common->getOwnerId();
        
        $result = $this->Application->getFollowUpAppsId($owner_id);
        $app_ids = $result[$process_type];
        return $search_conditions = array('Application.id'=>$app_ids);
        
    }

    public function download_docs($field,$filename,$docs_type)
    {
        $this->layout = $this->autoRender = false;
        if($docs_type=="employee")
        {
        $imagePath = WWW_ROOT ."img".DS."applications".DS.$field.DS.$filename;
        }elseif($docs_type=="visa"){
        $imagePath = WWW_ROOT ."img".DS."applications".DS."supporting_document".DS.$filename;
        }
        $this->Common->file_download($imagePath);
        
    }

    public function get_issue_detail()
    {
       $this->layout = false;
       $application_id = $this->request->data['application_id'];
       $process_stage = $this->request->data['process_stage'];
       $processArray  = $this->ApplicationIssue->find('first', array('conditions'=>array('ApplicationIssue.application_id'=>$application_id, 'ApplicationIssue.process_stage'=>$process_stage)));
       $this->set(compact("processArray"));
         
    }

    public function visa_process_feedback_hr(){
       // issue_support_document  
        $this->layout = $this->autoRender = false; 
        $owner_id = $this->Common->getOwnerId();
        $uploaded_files = array();

        $application_id = $this->request->data['ApplicationProcess']['application_id'];
        $process_stage = $this->request->data['ApplicationProcess']['process_stage'];
        $appRes  = $this->Application->find('first', array('conditions'=>array('Application.id'=>$application_id)));
        $appIssueRes  = $this->ApplicationIssue->find('first', array('conditions'=>array('ApplicationIssue.application_id'=>$application_id, 'ApplicationIssue.process_stage'=>$process_stage)));
        $issue_array1 = json_decode($appIssueRes['ApplicationIssue']['issues']);
        $image_types = array_filter($issue_array1);
        //Upload Photo of all document
        
        foreach ($image_types as $image_type) {
            $file_path = WWW_ROOT.IMAGES_URL."applications/issue_support_document";
            $path_info = pathinfo($this->request->data[$image_type]['name']);
            $fileName = 'support-'.time().".".$path_info['extension'];
            if(move_uploaded_file($this ->request->data[$image_type]['tmp_name'], $file_path.DS.$fileName)) {
                $uploaded_files[$image_type] = $fileName;
            } 
        }
            
        $up_files = json_encode($uploaded_files);
        $process_issue_updated = array();
        $process_issue = json_decode($appRes['Application']['process_issue']);
        foreach ($process_issue as $issue_value) {
            if($issue_value!=$process_stage)
            {
                $process_issue_updated[] = $issue_value;
            }
           
        }
        $process_issue_updated1 = json_encode($process_issue_updated);
        $this->Application->id = $application_id;
        $this->Application->saveField("process_issue",$process_issue_updated1);
        $modified_date = date("Y-m-d H:i:s");
        //$this->ApplicationIssue->updateAll(array('ApplicationIssue.supporting_document' => $up_files), array('ApplicationIssue.application_id'=>$application_id, 'ApplicationIssue.process_stage'=>$process_stage));
        $this->ApplicationIssue->query("UPDATE application_issues SET supporting_document = '".$up_files."', modified_date='".$modified_date."', issue_solved=1 where application_id=".$application_id." and process_stage=".$process_stage);
        $this->Notification->save_data($application_id,$owner_id,3);
        return "Successfully submitted";
    }

    public function app_delete(){
        $this->layout = $this->autoRender = false;
        if($this->request->isAjax()){
            $application_id = $this->request->data['application_id'];
            $this->ApplicationIssue->deleteAll(array('ApplicationIssue.application_id'=>$application_id));
            $this->ApplicationProcess->deleteAll(array('ApplicationProcess.application_id'=>$application_id));
            $this->ApplicationReferenceNumber->deleteAll(array('ApplicationReferenceNumber.application_id'=>$application_id));
            $this->ApplicationDetail->deleteAll(array('ApplicationDetail.application_id'=>$application_id));
            $this->Notification->deleteAll(array('Notification.application_id'=>$application_id));
            $this->Application->delete($application_id);
            return "success";
        }
    }

    public function download_all($application_id)
    {
        $employee_documents = $this->ApplicationDetail->findByApplicationId($application_id,array("application_id","emp_photo","emp_passport1","emp_passport2", "emp_passport3","trade_license",
            "establishment_card","emirates_id", "emirates_id_back", "medical_certificate", "health_insurence","emp_noc","emp_contract","education_certificate","visa_form","other_approval","other"));
        $employee_documents = array_filter($employee_documents['ApplicationDetail']);
        unset($employee_documents['application_id']);
        $file_names = array();
        //echo $file_path= WWW_ROOT.IMAGES_URL."applications/";
        //pr($employee_documents);die;
        foreach ($employee_documents as $dirc => $imgFile) {
            $file_names[] = $dirc."/".$imgFile; 
        }
        
        //Archive name
        $archive_file_name='employee_document.zip';
        //Download Files path
        $file_path= WWW_ROOT.IMAGES_URL."applications/"; 
        $this->Common->zipFilesAndDownload($file_names,$archive_file_name,$file_path);

    }

    
     public function view($application_id)
     {
        $this->layout='user_layout_new';
        $owner_id = $this->Common->getOwnerId();
        $app_detail  = $this->Application->find('first', array('conditions'=>array('Application.id'=>$application_id, 'Application.user_id'=>$owner_id)));
        if(!empty($app_detail))
        {
            $created_by = $app_detail['Application']['created_by'];
            $visa_aaply_by = $this->User->find('first', array('conditions'=>array('User.id'=>$created_by), 
                'fields'=>array('first_name','last_name')));
            $process_type = $app_detail['Application']['process_type'];
            //$visa_process = $this->Application->getVisaProcesseByType($process_type); 
            $process_actions = $this->ApplicationAction->find('all', array('conditions'=>array('ApplicationAction.application_id'=>$application_id), 'order'=>'created_date'));
            //pr($process_actions);die;
            $supporting_document = $this->ApplicationIssue->find('all', array('conditions'=>array('ApplicationIssue.application_id'=>$application_id, 'ApplicationIssue.supporting_document != '=>'')));
            $converted_app_res = $this->ConvertedApplication->find('first', array('conditions'=>array('ConvertedApplication.application_id'=>$application_id)));
            //$process_actions = $this->ApplicationProcess->find('all', array('conditions'=>array('ApplicationProcess.application_id'=>$application_id)));
            $all_app_type = unserialize(APPLICATION_TYPE);
            $this->set(compact('app_detail','visa_aaply_by','all_app_type','process_actions','supporting_document', 'converted_app_res'));
        }else{
            $this->Session->setFlash(__('Visa application not found.'));
            $this->redirect("/applications/everything");
        }
     } 

     public function put_refernece_number()
     {
        $this->layout = $this->autoRender = false;
        if($this->request->data)
        { 
            $application_id = trim($this->request->data['Application']['application_id']); 
            $process_stage = trim($this->request->data['Application']['process_stage']); 
            $ref_date = trim($this->request->data['Application']['ref_date']); 
            $reference_number = trim($this->request->data['Application']['reference_number']);
            $user_id = $this->UserAuth->getUserId();
            $owner_id = $this->Application->getOwnerId($user_id);
            $created_date = date('Y-m-d H:i:s');

            $app_res = $this->Application->find('first',array('conditions'=>array('Application.id'=>$application_id),'fields'=>array('Application.ref_number_status','Application.process_type')));
            if(isset($application_id) && isset($process_stage))
            {   
                    if(($app_res['Application']['process_type']==1 && $process_stage==3) || ($app_res['Application']['process_type']==3 && $process_stage==2) )
                    {  //means if Emirates id
                      $reference_number = trim($this->request->data['Application']['reference_number_biometric']);
                    }

                    if(!empty($app_res['Application']['ref_number_status']))
                    {
                      $db_ref = json_decode($app_res['Application']['ref_number_status']);
                      $newArr = array($process_stage=>$reference_number);
                      $newArrMerge = (array)$db_ref+$newArr;
                      $ref_number_array =  json_encode($newArrMerge);
                    }else{
                      $ref_number_array =  json_encode(array($process_stage=>$reference_number));   
                    }


                    $next_stage = $this->Common->next_to_be_steps($ref_number_array);
                    $this->Application->id = $application_id;
                    //$this->Application->saveField("ref_number_status",$ref_number_array);
                    $this->Application->query("UPDATE applications SET ref_number_status = '$ref_number_array', next_typing='$next_stage' where id=".$application_id);
                    $process_type = $app_res['Application']['process_type'];
                    $RefArr = array("application_id"=>$application_id,'user_id'=>$owner_id, "process_stage"=>$process_stage, "ref_number"=>$reference_number,
                        "process_type"=>$process_type, "ref_date"=>date("Y-m-d", strtotime($ref_date)), "created_by"=>$user_id,"created_date"=>date("Y-m-d H:i:s"));
                    $this->ApplicationReferenceNumber->save($RefArr);
                    
                return 'Reference Number Added successfully.';
            }else{
                return 'Error occurred';  
            }
            
           
        }
     } 

    

     public function test()
     {
        $this->layout = $this->autoRender = false;
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        $res = $this->Application->getProgressChart($owner_id);
        pr($res);die;

        $res = $this->ApplicationDetail->find('all', array('recursive'=>-1, 
            'fields'=>array("id","emp_passport1","emp_passport2", "emp_passport3","trade_license", "establishment_card",
                "emirates_id", "emirates_id_back", "medical_certificate", "health_insurence","emp_noc",
                "emp_contract", "education_certificate", "visa_form"), 
            'conditions'=>array('ApplicationDetail.application_id >'=>1076),'order'=>'id desc'));
        foreach ($res as $key => $single) {
            $app_id = $single['ApplicationDetail']['id'];
            unset($single['ApplicationDetail']['id']);
            foreach ($single['ApplicationDetail'] as $f_name => $f_value) {
                if($f_value!='')
                {
                   $old_val = $f_value; 
                   $new_value = str_replace("photo", $f_name, $f_value);
                   rename("img/applications/".$f_name."/".$old_val,"img/applications/".$f_name."/".$new_value);
                   $new_array[$f_name] = $new_value;
                }else{
                    $new_array[$f_name] = $f_value;
                }
            }
            $new_array2 = array_filter($new_array);
            $this->ApplicationDetail->id = $app_id;
            $this->ApplicationDetail->save($new_array2);
            //$bunch[] = $new_array;


        }
        //pr($bunch);die;
    }


     public function edit_new_residency($id) { 
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $companies = $this->Company->companyLists($owner_id, $userGroupId, $session_company_id);
        $country_type = unserialize(COUNTRY_TYPE);
        $country_type[1] = "Inside UAE";
        $country_type[2] = "Outside UAE";
        $marital_status = unserialize(MARITAL_STATUS);
        $data = $this->Application->read(null, $id);

        if($this->request->data){
            $old_data['ApplicationLog'] = $data['Application'];
            $old_data['ApplicationLog']['id']='';
            $old_data['ApplicationLog']['application_id']=$id;
            $this->ApplicationLog->save($old_data);// old data save into logs
            $this->request->data['Application']['id'] = $id;
            unset($this->request->data['Application']['company_id']);
            unset($this->request->data['Application']['employee_name']);
            unset($this->request->data['Application']['country_type']);
            unset($this->request->data['Application']['designation']);
            
            //Upload Photo of all document
            $image_types = array("emp_photo", "emp_passport1", "emp_passport2", "emp_passport3", "visa_form", 
                "education_certificate","emirates_id","emirates_id_back", "health_insurence","other_approval","other");
            
            foreach($image_types as $image_type) {
                if(!empty($this->request->data['Application'][$image_type]['name']))
                {
                    $fileName = $this->image_uploading($this->request->data, $image_type);
                    $this->request->data['ApplicationDetail'][$image_type] = $fileName;
                }else{
                    unset($this->request->data['Application'][$image_type]);
                }  
            }

            if($this->Application->save($this->request->data))
            {
                $this->request->data['ApplicationDetail']['application_id'] = $id;    
                $this->request->data['ApplicationDetail']['id'] = $data['ApplicationDetail']['id'];  
                $this->ApplicationDetail->save($this->request->data);
                $this->Session->setFlash(__('Application Successfully updated'));
                $this->redirect("/applications/everything");
            }
            
        }

        if(!empty($data) && $data['Application']['user_id']==$owner_id){
            $this->request->data = $data;
        }else{
            $this->Session->setFlash(__('Application not found'));
            $this->redirect("/applications/everything");
        }  
        $this->set(compact("companies","country_type","marital_status"));
     }



     public function edit_renew_residency($id) {
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $companies = $this->Company->companyLists($owner_id, $userGroupId, $session_company_id);
        $country_type = unserialize(COUNTRY_TYPE);
        $marital_status = unserialize(MARITAL_STATUS);
        
        $data = $this->Application->read(null, $id);
        
         if($this->request->data){
            $old_data['ApplicationLog'] = $data['Application'];
            $old_data['ApplicationLog']['id']='';
            $old_data['ApplicationLog']['application_id']=$id;
            $this->ApplicationLog->save($old_data);// old data save into logs
            //$this->request->data['Application']['id'] = $id;
            unset($this->request->data['Application']['company_id']);
            unset($this->request->data['Application']['employee_name']);
            unset($this->request->data['Application']['designation']);
            
            //Upload Photo of all document
            $image_types = array("emp_photo", "emp_passport1", "emp_passport2", "emp_passport3", "emirates_id",
                "emirates_id_back", "health_insurence","medical_certificate", "education_certificate", "visa_form", "other_approval", "other");
            
            foreach ($image_types as $image_type) {
                if(!empty($this->request->data['Application'][$image_type]['name']))
                {   $fileName = $this->image_uploading($this->request->data, $image_type);
                    $this->request->data['ApplicationDetail'][$image_type] = $fileName;
                }else{
                    unset($this->request->data['Application'][$image_type]);
                }  
            }
           
            //if(
                $this->Application->id = $id;
                $this->Application->save($this->request->data);//)
            //{   
                $this->request->data['ApplicationDetail']['application_id'] = $id;    
                $this->request->data['ApplicationDetail']['id'] = $data['ApplicationDetail']['id'];
                $this->ApplicationDetail->save($this->request->data);  
                $this->Session->setFlash(__('Application Successfully updated'));
                $this->redirect("/applications/everything");
            //+}-
        }

        if(!empty($data) && $data['Application']['user_id']==$owner_id){
            $this->request->data = $data;
        }else{
            $this->Session->setFlash(__('Application not found'));
            $this->redirect("/applications/everything");
        }  
        
        $this->set(compact("companies","country_type","marital_status"));
    }

    public function edit_local_transfer($id) {
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        $data = $this->Application->read(null, $id);
        
        if($this->request->data){
            $this->request->data['Application']['user_id'] = $owner_id;
            $this->request->data['Application']['process_type'] = LOCAL_TRANSFER;
            $this->request->data['Application']['created_by'] = $user_id;
            $old_data['ApplicationLog'] = $data['Application'];
            $old_data['ApplicationLog']['id']='';
            $old_data['ApplicationLog']['application_id']=$id;
            $this->ApplicationLog->save($old_data);// old data save into logs
            

            //Upload Photo of all document
            $image_types = array("emp_photo", "emp_passport1", "emp_passport2", "emp_passport3", "trade_license", 
                "establishment_card","emp_contract","education_certificate", "visa_form","other_approval","other");
            
            foreach ($image_types as $image_type) {
                if(!empty($this->request->data['Application'][$image_type]['name']))
                {
                    $fileName = $this->image_uploading($this->request->data, $image_type);
                    $this->request->data['ApplicationDetail'][$image_type] = $fileName;
                }else{
                    unset($this->request->data['Application'][$image_type]);
                }  
            }

            $this->request->data['Application']['id'] = $id;
            unset($this->request->data['Application']['company_id']);
            unset($this->request->data['Application']['employee_name']);
            unset($this->request->data['Application']['designation']);
            //pr($this->request->data);die;
            //if(
            $this->Application->save($this->request->data);//)
            //{
            $this->request->data['ApplicationDetail']['application_id'] =  $id;   
            $this->request->data['ApplicationDetail']['id'] =  $data['ApplicationDetail']['id'];   
            $this->ApplicationDetail->save($this->request->data);   
            $this->Notification->save_data($application_id,$owner_id,1, LOCAL_TRANSFER);
            $this->Session->setFlash(__('Local transfer has been “Applied should be uploaded instead” successfully.'));
            $this->redirect("/applications/everything");
            //}
        }

        if(!empty($data) && $data['Application']['user_id']==$owner_id){
            $this->request->data = $data;
        }else{
            $this->Session->setFlash(__('Application not found'));
            $this->redirect("/applications/everything");
        }  
        
        
        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $companies = $this->Company->companyLists($owner_id, $userGroupId, $session_company_id);
        $country_type = unserialize(COUNTRY_TYPE);
        $marital_status = unserialize(MARITAL_STATUS);
        $this->set(compact("companies","country_type","marital_status"));
    }

    public function edit_cancellation($id) {
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Application->getOwnerId($user_id);
        $data = $this->Application->read(null, $id);
        
        if($this->request->data){
            //Upload Photo of all document
            $image_types = array("emp_photo", "emp_passport1", "emp_passport2", "emp_passport3", "visa_form", "other_approval","other");
            $old_data['ApplicationLog'] = $data['Application'];
            $old_data['ApplicationLog']['id']='';
            $old_data['ApplicationLog']['application_id']=$id;
            $this->ApplicationLog->save($old_data);// old data save into logs
            
            foreach ($image_types as $image_type) {
                if(!empty($this->request->data['Application'][$image_type]['name']))
                {
                    $fileName = $this->image_uploading($this->request->data, $image_type);
                    $this->request->data['ApplicationDetail'][$image_type] = $fileName;
                }else{
                    unset($this->request->data['Application'][$image_type]);
                }  
            }

            $this->request->data['Application']['id'] = $id;
            unset($this->request->data['Application']['company_id']);
            unset($this->request->data['Application']['employee_name']);
            unset($this->request->data['Application']['designation']);
            
            //if(
            $this->Application->save($this->request->data['Application']);//)
            //{
            $this->request->data['ApplicationDetail']['application_id'] = $id;   
            $this->request->data['ApplicationDetail']['id'] = $data['ApplicationDetail']['id'];   
            $app_detail = $this->request->data['ApplicationDetail'];
            $this->ApplicationDetail->save($app_detail);   
            //$this->Notification->save_data($application_id,$owner_id,1, CANCELLATION);
            $this->Session->setFlash(__('Cancellation has been “Applied should be uploaded instead” successfully.'));
            $this->redirect("/applications/everything");
            //}
        }

        if(!empty($data) && $data['Application']['user_id']==$owner_id){
            $this->request->data = $data;
        }else{
            $this->Session->setFlash(__('Application not found'));
            $this->redirect("/applications/everything");
        }  
        
        $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
        $session_company_id = $this->Session->read('UserAuth.User.company_id');
        $companies = $this->Company->companyLists($owner_id, $userGroupId, $session_company_id);
        $country_type = unserialize(COUNTRY_TYPE);
        $marital_status = unserialize(MARITAL_STATUS);
        $this->set(compact("companies","country_type","marital_status"));
    }

    public function convert_into_cancellation(){
        $this->layout = $this->autoRender = false;
        $user_id = $this->UserAuth->getUserId();
        if($this->request->isAjax()){
            $application_id = $this->request->data['application_id'];
            $app_res = $this->Application->find('first',array('conditions'=>array('Application.id'=>$application_id), 'recursive'=>-1));
            if(!empty($app_res))
            {
                if($app_res['Application']['process_type'] !=CANCELLATION)
                {
                    $save_data['Application']['id'] = $application_id;
                    $save_data['Application']['process_type'] = CANCELLATION;
                    $save_data['Application']['process_status'] = null;
                    $save_data['Application']['process_status_next'] = 1;
                    $save_data['Application']['ref_number_status'] = null;
                    $save_data['Application']['next_typing'] = 1;
                    $save_data['Application']['modified'] = date("Y-m-d H:i:s");
                    $this->Application->saveAll($save_data);

                    $prev_process_type = $app_res['Application']['process_type'];
                    $curr_process_type = CANCELLATION;
                    $convert_data['ConvertedApplication'] = array('id'=>'', 'application_id'=>$application_id,
                        'previous_process_type'=>$prev_process_type, 'current_process_type'=>$curr_process_type, 
                        'created_date'=>date("Y-m-d H:i:s"), 'created_by'=>$user_id);
                    $this->ConvertedApplication->save($convert_data);// converted record save into "converted_application" table
                    return "success";
                }
            }
        }
    }

    public function lists($owner_id) {
        $this->paginate = array('limit' => 20, 'order'=>'Application.id desc', 'recursive'=>-1,
            'conditions'=>array('Application.user_id'=>$owner_id));
        $applications = $this->paginate('Application');
        $application_type = unserialize(APPLICATION_TYPE);
        
        $this->set(compact('applications', 'application_type'));
    }

    public function get_barcode_image(){
        $this->layout = $this->autoRender = false;
        App::import('Vendor', 'Barcode/BarcodeBase');
        App::import('Vendor', 'Barcode/Code39');
        $encode = $this->request->data['barcode'];
        $company_name = $this->request->data['company_name'];
        
        $bcode = array();
        $bcode['c39']   = array('name' => 'Code39', 'obj' => new emberlabs\Barcode\Code39());
        foreach($bcode as $k => $value)
        {
            try
            {
                $bcode[$k]['obj']->setData($encode);
                $bcode[$k]['obj']->setDimensions(300, 40);
                $bcode[$k]['obj']->draw();
                $b64 = $bcode[$k]['obj']->base64();

                echo "<img src='data:image/png;base64,$b64' /><br/>";
                echo "<p style='margin-left:100px;'>".$company_name. "</p><br/>";
            }
            catch (Exception $e)
            {
                //bcode_error($e->getMessage());
            }
        }
    }

    public function barcode_print($app_id){
        $this->layout  = false;
        $owner_id = $this->Common->getOwnerId();
        $app_res = $this->Application->find('first',array('conditions'=>array('Application.id'=>$app_id, 'Application.user_id'=>$owner_id),
            'fields'=>array('Application.barcode', 'Company.company_name')));
        
        if(count($app_res))
        {
            $barcode = $app_res['Application']['barcode'];
            $company_name = $app_res['Company']['company_name'];
            App::import('Vendor', 'Barcode/BarcodeBase');
            App::import('Vendor', 'Barcode/Code39');
            
            $bcode = array();
            $bcode['c39']   = array('name' => 'Code39', 'obj' => new emberlabs\Barcode\Code39());
            foreach($bcode as $k => $value)
            {
                try
                {
                    $bcode[$k]['obj']->setData($barcode);
                    $bcode[$k]['obj']->setDimensions(220, 35);
                    $bcode[$k]['obj']->draw();
                    $b64 = $bcode[$k]['obj']->base64();
                }
                catch (Exception $e)
                {
                    //bcode_error($e->getMessage());
                }
            }

            
        }else{
            echo "You have selected wrong application."; exit;
        }
        
        $this->set(compact('b64','company_name'));
    }

  function test2(){
        $this->layout = $this->autoRender = false;
        $all = $this->Application->find('all',array('recursive'=>-1, 'fields'=>array('Application.id', 'Application.barcode')));
            foreach ($all as $key => $value) {
                $id = $value['Application']['id'];
                $barcode = $this->Common->BarcodeGenerate($id);
                $this->Application->id = $id;
                $this->Application->saveField("barcode", $barcode); 
                echo $barcode.'=='.$id."<br/>";
            }
         }
    
}
