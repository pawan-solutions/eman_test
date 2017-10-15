<?php
class ReportsController  extends AppController {

    var $uses = array("Application", "PassportTracking");
    var $component = array("Common");
    public $paginate = array(); 

    public function progress()
    {
        $this->layout='user_layout_new';
        $owner_id = $this->Common->getOwnerId();

        //$db = ConnectionManager::getDataSource("default");
        //$dashboard_data = "CALL app_progress_report2($owner_id)";
        //$results = $db->query($dashboard_data);
        $next_typing = $this->Application->getNextTyping($owner_id);
        $next_followup = $this->Application->getFollowUpAppsId($owner_id);
        $this->set(compact("next_typing","next_followup"));
         
    }

    public function passport_reports()
    {
        $this->layout='user_layout_new';
        $owner_id = $this->Common->getOwnerId();
        $result = $this->Application->get_passport_tracking($owner_id);
        $passport_released_gro = $result['passport_released_gro'];
        $passport_received_gro = $result['passport_received_gro'];
        $passport_released_hr = $result['passport_released_hr'];
        $passport_received_hr = $result['passport_received_hr'];
              
        $zajel_pending = $passport_released_gro;
        $this->set(compact("passport_released_gro", "passport_received_gro", 
                "passport_released_hr","passport_received_hr", "zajel_pending"));
    }

    public function hr_dashboard()
    {
          $this->layout='user_layout_new';
          $owner_id = $this->Common->getOwnerId();
          $app_result = $this->Application->new_app_release_passport_to_be_hr($owner_id);
          //pr($app_result);die;
          $error_report = $this->Application->get_app_issue_report($owner_id);
           //pr($error_report);die;
          $this->set(compact("app_result", "error_report"));
    }
}