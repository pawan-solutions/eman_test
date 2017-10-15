<?php
    class ApplicationIssue extends AppModel{
       
    	function save_issue($user_id,$owner_id,$application_id,$process_type,$process_stage,$issues=null,$comment=null)
    	{
    		$created_date = date('Y-m-d H:i:s');
            $process_array['ApplicationIssue'] = array('id'=>'',
                        'user_id'=>$owner_id,
                        'application_id'=>$application_id,
                        'process_type'=>$process_type,
                        'process_stage'=>$process_stage,
                        'issues'=>$issues,
                        'comment'=>$comment,
                        'created_by'=>$user_id,
                        'created_date'=>$created_date);
            $this->save($process_array);
            return $this->getLastInsertID();
    	}
    }