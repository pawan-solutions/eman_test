<?php
    class ApplicationProcess extends AppModel{
       
    	function save_data($user_id,$owner_id,$application_id,$process_type,$process_stage,$completion_date=null,$supporting_document=null)
    	{
    		$created_date = date('Y-m-d H:i:s');
    		$process_array['ApplicationProcess'] = array('id'=>'',
                        'user_id'=>$owner_id,
                        'application_id'=>$application_id,
                        'process_stage'=>$process_stage,
                        'process_type'=>$process_type,
                        "supporting_document"=>$supporting_document,
                        "completion_date"=>$completion_date,
                        'created_by'=>$user_id,
                        'created_date'=>$created_date);
            //pr($process_array);die;
    		return $this->save($process_array);
    	}
    }