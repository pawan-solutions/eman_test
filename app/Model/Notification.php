<?php
    class Notification extends AppModel{

        public function save_data($application_id,$owner_id,$type,$process_type=null,$process_stage=null)
        {	$created_date = date('Y-m-d H:i:s');
        	$user_id = (isset($_SESSION['UserAuth']['User']['id'])) ? $_SESSION['UserAuth']['User']['id'] : null;
            $array['Notification'] = array('owner_id'=>$owner_id, 'application_id'=>$application_id, 'type'=>$type,'process_type'=>$process_type, 'process_stage'=>$process_stage, 'created_date'=>$created_date, 'created_by'=>$user_id);
            $this->save($array);
        }
       
    }