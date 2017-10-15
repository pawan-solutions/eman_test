<?php
class CompaniesController  extends AppController {

    var $uses = array("Company","CompanyDocument", "CompanyHistory", "CompanyDocumentHistory", "Application");
    var $components = array('Usermgmt.Search');

    var $searchFields = array(
        'all' => array(
            "Company" => array(
                'Company.id'=> array(
                   'type' => 'text',
                   'label' => 'Company Id'
                ),
                'Company.company_name' => array(
                   'type' => 'text',
                   'label' => 'Company Name'
                ),
                'Company.company_email' => array(
                   'type' => 'text',
                   'label' => 'Company Email'
                ),
                
            )
            )  
        );

    public function index() {
      $this->layout='user_layout_new';
      $userGroupId = $this->Session->read('UserAuth.User.user_group_id');
      $user_id = $this->UserAuth->getUserId();
      $owner_id = $this->Company->getOwnerId($user_id);
      $session_company_id = $this->Session->read('UserAuth.User.company_id');
      $condition_cmp_ids = $this->Common->allowed_company($userGroupId, $session_company_id,"company");

      $condition = array('Company.user_id'=>$owner_id);
      $conditions = $condition+$condition_cmp_ids;
      $companies = $this->Company->find('all',array('conditions'=>$conditions, 'order'=>array('Company.id'=>'DESC')));
      $this->set("companies",$companies);
    }

    public function view($id) {
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Company->getOwnerId($user_id);
        $company_license_permit = unserialize(COMPANY_LICENSE_PERMIT);
        $company_legal_document = unserialize(COMPANY_LEGAL_DOCUMENT);
        $company_type = unserialize(COMPANY_TYPE);
        
        $docs_types = $company_license_permit+$company_legal_document;
        if($id!=''){
            $result = $this->Company->findById($id); 
            $company_id = $id;
            $company_type = unserialize(COMPANY_TYPE);
            $histories = $this->CompanyHistory->find('all',array('conditions'=>array('CompanyHistory.company_id'=>$id),'order'=>'CompanyHistory.id desc')); 
            
            $document_histories = $this->CompanyDocumentHistory->find('all',array('conditions'=>array('CompanyDocumentHistory.company_id'=>$id))); 
            $application_count = $this->Application->find('count',array('conditions'=>array('Application.company_id'=>$id),'recursive'=>-1)); 
            $user_count_result = $this->Common->get_employee_count_of_company($id,$owner_id); 
            $user_count = $user_count_result['user_count'];
            $this->set(compact("company_id", "result", "histories", "company_type", "document_histories",'owner_id', 
                'docs_types', 'application_count', 'user_count'));
        }

    }

    public function upload_documents($req_data, $image_for,$owner_id)
    {
        $file_path = WWW_ROOT.IMAGES_URL."company_files/".$owner_id;
        if (!file_exists($file_path) && !is_dir($file_path)) {
            mkdir($file_path);         
        } 
        $docs_image = $req_data['CompanyDocument'][$image_for];
        $path_info = pathinfo($docs_image['name']);
        $fileName = $image_for.'-'.time().".".$path_info['extension'];
        if(move_uploaded_file($docs_image['tmp_name'], $file_path.DS.$fileName)) {
            return $fileName;
        }
    }

    public function add() {
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Company->getOwnerId($user_id);
        $comapny_file_path = $this->Common->getCompanyFilePath();
    	$company_type = unserialize(COMPANY_TYPE);
        $company_license_permit = unserialize(COMPANY_LICENSE_PERMIT);
        $company_legal_document = unserialize(COMPANY_LEGAL_DOCUMENT);
        $uploaded_docs_array = array();
        $fileName = '';

        if($this->request->data){

            //Upload Photo of all document
            $image_types = $company_license_permit+$company_legal_document;
            foreach ($image_types as $image_type=>$image_text) {
                if(!empty($this->request->data['CompanyDocument'][$image_type]['name']))
                {
                    $fileName = $this->upload_documents($this->request->data, $image_type,$owner_id);
                    $this->request->data['CompanyDocument'][$image_type] = $fileName;

                    $exp_date = isset($this->request->data['CompanyDocument'][$image_type."_expiry"])?$this->request->data['CompanyDocument'][$image_type."_expiry"]:'';
                    $uploaded_docs_array[$image_type] = array($fileName, $exp_date);
                }else{
                    $this->request->data['CompanyDocument'][$image_type] = '';
                } 
                $this->request->data['Company'][$image_type] = ''; 
            }

            
            $this->request->data['Company']['user_id'] = $owner_id;
            $this->request->data['Company']['created_by'] = $user_id;
            $this->request->data['Company']['status'] = 1;
            
            if($this->Company->save($this->request->data))
    		{
                $company_id = $this->Company->getLastInsertID();    
                $this->request->data['CompanyDocument']['company_id'] = $company_id;    
                $this->request->data['CompanyDocument']['user_id'] = $owner_id;    
                $this->request->data['CompanyDocument']['created_date'] = date("Y-m-d H:i:s");    
                $this->CompanyDocument->save($this->request->data);

                $company_history['CompanyHistory'] = $this->request->data['Company'];
                $company_history['CompanyHistory']['company_id'] = $company_id; 
                $this->CompanyHistory->save($company_history); 
                //History maintain for documents
                if(!empty($uploaded_docs_array)){
                    foreach ($uploaded_docs_array as $doc_type => $doc_and_exp_date) {
                    $document_history_arr[] = array('id'=>'', 'company_id'=>$company_id, 'document_type'=>$doc_type, 
                        'document_name'=>$doc_and_exp_date[0], 'document_expiry_date'=>$doc_and_exp_date[1], 
                        'created_date'=>date("Y-m-d H:i:s"), 'created_by'=>$user_id);
                    }
                    $this->CompanyDocumentHistory->saveAll($document_history_arr);
                }
                
        		$this->Session->setFlash(__('Company has been added successfully'));
                $this->redirect("/companies/index");
    		} 
    	}
        
        $this->set(compact("company_type","company_license_permit","company_legal_document"));
	}

    public function all($owner_id=null){
        if($owner_id!=null)
        {
            $this->paginate = array('limit' => 20, 'order'=>'Company.id desc', 
            'conditions'=>array('Company.user_id'=>$owner_id));
        }else{
            $this->paginate = array('limit' => 10, 'order'=>'Company.id desc');    
        }
        
        $companies = $this->paginate('Company');
        $this->set('companies', $companies);
    }

    public function edit($id){
        $this->layout='user_layout_new';
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Common->getOwnerId();
        $company_license_permit = unserialize(COMPANY_LICENSE_PERMIT);
        $company_legal_document = unserialize(COMPANY_LEGAL_DOCUMENT);
        $document_history = $history_data = array();
        if(!empty($this->request->data)){

            //Upload Photo of all document
            $image_types = $company_license_permit+$company_legal_document;
            foreach ($image_types as $image_type=>$image_text) {
                if(!empty($this->request->data['CompanyDocument'][$image_type]['name']))
                {
                    $fileName = $this->upload_documents($this->request->data, $image_type,$owner_id);
                    $this->request->data['CompanyDocument'][$image_type] = $fileName;

                    $expiry_field_name = $image_type.'_expiry';
                    $exp_date_value = isset($this->request->data['CompanyDocument'][$expiry_field_name])?$this->request->data['CompanyDocument'][$expiry_field_name]:'';
                    $document_history[] = array('id'=>'', 'company_id'=>$id, 'document_type'=>$image_type, 
                        'document_name'=>$fileName, 'document_expiry_date'=>$exp_date_value, 
                        'created_date'=>date("Y-m-d H:i:s"), 'created_by'=>$user_id);
                }else{
                    unset($this->request->data['CompanyDocument'][$image_type]);
                } 
                $this->request->data['Company'][$image_type] = ''; 
            }
                
            $this->request->data['Company']['id'] = $id;
            $this->request->data['Company']['modified'] = date("Y-m-d H:i:s");
            if($this->Company->saveAll($this->request->data))
            {
                
                $history_data['CompanyHistory'] = $this->request->data['Company'];
                $history_data['CompanyHistory']['id'] = '';
                $history_data['CompanyHistory']['user_id'] = $owner_id;
                $history_data['CompanyHistory']['company_id'] = $id;
                $history_data['CompanyHistory']['created_by'] = $user_id;
                $history_data['CompanyHistory']['created'] = date("Y-m-d H:i:s");
                $this->CompanyHistory->save($history_data); 
                $this->CompanyDocumentHistory->saveAll($document_history); 
                $this->Session->setFlash(__('Company has been updated successfully'));
                return $this->redirect('/companies');
            }
        }else{
            $data = $this->Company->read(null, $id);
            $this->request->data = $data;
        }

        $company_type = unserialize(COMPANY_TYPE);
        $company_id = $id;
        $this->set(compact("company_id","company_type","company_license_permit","company_legal_document",'owner_id'));
        
                       
    }

    public function delete_row(){
        $this->layout = $this->autoRender = false;
        $id = $this->request->data['id'];
        $this->Company->delete($id);
        return "success";
    }

    public function upload_single_document(){
        $this->layout = $this->autoRender = false;
        $user_id = $this->UserAuth->getUserId();
        $owner_id = $this->Company->getOwnerId($user_id);
        $document_name = $this->request->data['CompanyDocument']['document_name'];
        $company_legal_document = unserialize(COMPANY_LEGAL_DOCUMENT);

            if(isset($this->request->data['CompanyDocument'][$document_name]['name']) && ($this->request->data['CompanyDocument'][$document_name]['name']!=''))
            {
                
                $company_id = $this->request->data['CompanyDocument']['company_id'];
                $fileName = $this->upload_documents($this->request->data, $document_name,$owner_id);
                $this->request->data['CompanyDocument'][$fileName] = $fileName;
                $exp_date_value = isset($this->request->data['CompanyDocument']['expiry_date'])?$this->request->data['CompanyDocument']['expiry_date']:'';

                if(array_key_exists($document_name, $company_legal_document)){ 
                    $this->CompanyDocument->updateAll(array('CompanyDocument.'.$document_name =>"'".$fileName. "'"), 
                    array('CompanyDocument.company_id'=>$company_id));
                    $document_history = array('id'=>'', 'company_id'=>$company_id, 'document_type'=>$document_name, 
                    'document_name'=>$fileName, 'created_date'=>date("Y-m-d H:i:s"), 'created_by'=>$user_id);
                }else{
                    $this->CompanyDocument->updateAll(array('CompanyDocument.'.$document_name =>"'".$fileName. "'", 'CompanyDocument.'.$document_name.'_expiry'=>"'".$exp_date_value. "'"), 
                    array('CompanyDocument.company_id'=>$company_id));
                    $document_history = array('id'=>'', 'company_id'=>$company_id, 'document_type'=>$document_name, 
                    'document_name'=>$fileName, 'document_expiry_date'=>$exp_date_value, 
                    'created_date'=>date("Y-m-d H:i:s"), 'created_by'=>$user_id);
                }
                
                $this->CompanyDocumentHistory->save($document_history); 
                echo "success";    
            }else{
                echo "Please select file";
            }
        
    }

    public function get_history_detail(){
        $history_id = $this->request->data['history_id'];
        $company_type = unserialize(COMPANY_TYPE);
        if(isset($history_id))
        {
            $result = $this->CompanyHistory->findById($history_id);
            $this->set(compact("result", "company_type"));
        }
    }

    public function get_company_documents($id = NULL)
    {
        if($this->request->isAjax()){
            if(isset($id))
            {
                $user_id = $this->UserAuth->getUserId();
                $owner_id = $this->Company->getOwnerId($user_id);    
                $license = unserialize(COMPANY_LICENSE_PERMIT);
                $legel_docs = unserialize(COMPANY_LEGAL_DOCUMENT);

                $license = array_keys($license);
                $legel_docs = array_keys($legel_docs);
                
                $all_doc_type = $license+$legel_docs;
                $documents = $this->CompanyDocument->find("first", array('fields'=>$all_doc_type, 
                    "conditions" => array("CompanyDocument.company_id" => $id)));
                $this->set("documents", $documents);
                $this->set("owner_id", $owner_id);
            
            }
        }
   
    }


}
