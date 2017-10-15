<?php
    class Company extends AppModel{
        var $belongsTo = array("Usermgmt.User");
        var $hasOne = array("CompanyDocument");
          public $validate = array(
            // "company_name" => array(
            //     "rule" => "notEmpty",
            //     "message" => "Enter Company Name"
            // ),
           
            'company_name'=> array(
                'mustNotEmpty'=>array(
                    'rule' => 'notEmpty',
                    'message'=> 'Enter company name',
                    'last'=>true),
                'mustUnique'=>array(
                    'rule' =>'isUnique',
                    /* Please note if you want to change this message then also change this in change_password.ctp */
                    'message' =>'This company is already exist'
                    )
                ),
                
            "company_phone" => array(
                "rule1" => array(
                    "rule" => "notEmpty",
                    "message" => "Enter Phone Number",
                    "required" => false
                ),
                "rule2" => array(
                    "rule" => "numeric",
                    "message" => "Phone Number must be numeric"
                    //"message" => "Phone Number must be numeric (10 digits)"
                ),
                // "rule3" => array(
                //     "rule" => array('maxLength', 10),
                //     "message" => "Phone Number must be numeric (10 digits)"
                // ),
                // "rule4" => array(
                //     "rule" => array('minLength', 10),
                //     "message" => "Phone Number must be numeric (10 digits)"
                // )
            ),
            "company_type" => array(
                "rule" => "notEmpty",
                "message" => "Select Company Type"
            ),
        );
    

    public function companyLists($user_id, $userGroupId, $allowed_company_id)
    {
        if($userGroupId==SUPER_USER)
        {
            $companies = $this->find('all', array('conditions'=>array('Company.user_id'=>$user_id),
                'fields'=>array('Company.id','Company.company_name', 'Company.company_type'), 'order'=>'Company.company_name asc'));
        }else{
            $company_id_array = json_decode($allowed_company_id);
            $companies = $this->find('all', array('conditions'=>array('Company.user_id'=>$user_id, 'Company.id'=>$company_id_array),
                'fields'=>array('Company.id','Company.company_name', 'Company.company_type'), 'order'=>'Company.company_name asc'));
        }
        $list = array();
        $company_types = unserialize(COMPANY_TYPE);
        if(!empty($companies)){
            foreach ($companies as $key => $company) {
                $comp_id = $company['Company']['id'];
                $comp_name = $company['Company']['company_name'];
                $comp_type = $company['Company']['company_type'];
                $company_type = isset($company_types[$comp_type])?$company_types[$comp_type]:'';
        
                $list[$comp_id] = ucfirst($comp_name).' ('. strtolower($company_type) .')';
            }
        }
        return $list;
    }
    }