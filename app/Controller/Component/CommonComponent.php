<?php
    class CommonComponent extends Component {
    
        public function getStorageImgFolderPath ($storageId) {
            if(strlen($storageId) == 1){
                $firstDir = $storageId;
                $secondDir = '0';
            } else{
                $firstDir  = substr($storageId, 0, 1);
                $secondDir = substr($storageId, 1, 1);
            }
            $fullpath = WWW_ROOT.IMAGES_URL.COMPANY_FILES.DS.$firstDir;
            
            if(!is_dir($fullpath)) {
                mkdir($fullpath, 0755, true);
            }
            
            $fullpath .= DS.$secondDir;
            if(!is_dir($fullpath)) {
                mkdir($fullpath, 0755, true);
            }

            $fullpath .= DS.$storageId;
            if(!is_dir($fullpath)) {
                mkdir($fullpath, 0755, true);
            }
            return $fullpath;
	}
        
        public function getStorageImgUrl ($storageId) {
          if(strlen($storageId) == 1){
                $firstDir = $storageId;
                $secondDir = '0';
            } else{
                $firstDir  = substr($storageId, 0, 1);
                $secondDir = substr($storageId, 1, 1);
            }
            return STORE_IMG."/".$firstDir."/".$secondDir."/".$storageId."/";
        }

        public function getCompanyFilePath () {
            $fullpath = WWW_ROOT.IMAGES_URL.COMPANY_FILES;
            
            if(!is_dir($fullpath)) {
                mkdir($fullpath, 0755, true);
            }
            return $fullpath;
        }

       //Download single file  
       public function file_download($filename){
            if (file_exists($filename)) {
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private", false);
            header("Content-Type: application/force-download");
            header("Content-Type: application/zip");
            header("Content-Type: application/pdf");
            header("Content-Type: application/octet-stream");
            header("Content-Type: image/png");
            header("Content-Type: image/gif");
            header("Content-Type: image/jpg");
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Type: application/vnd.ms-powerpoint");
            header("Content-type: application/x-msexcel");
            header("Content-type: application/msword");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=" . basename($filename) . ";");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . filesize($filename));
            readfile($filename) or die('Errors');
            exit(0);
            }
       }
        
       //Download multiple file into zip folder 
       function zipFilesAndDownload($file_names,$archive_file_name,$file_path)
        {
            $zip = new ZipArchive();
            //create the file and throw the error if unsuccessful
            if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
                exit("cannot open <$archive_file_name>\n");
            }
            //add each files of $file_name array to archive
            foreach($file_names as $files)
            {
                $fexp = explode("/", $files);
                $fexp1 = $fexp[1];
                $zip->addFile($file_path.$files,$fexp1);
            }
            $zip->close();
            //then send the headers to force download the zip file
            header("Content-type: application/zip"); 
            header("Content-Disposition: attachment; filename=$archive_file_name"); 
            header("Pragma: no-cache"); 
            header("Expires: 0"); 
            readfile("$archive_file_name");
            unlink($archive_file_name);
            exit;
        }

        public function getOwnerId(){
            $user_id = $_SESSION['UserAuth']['User']['id'];  //$this->UserAuth->getUserId();
            App::import ("Model", "User");
            $model = new User;
            $result = $model->findById($user_id, 'User.owner_id');
            if(!empty($result) and $result['User']['owner_id']>0)
            {
                return $result['User']['owner_id'];
            }else{
                return $user_id;
            }
        }

        public function next_to_be_steps($process_statuses)
        {
            if(isset($process_statuses))
            {
                $process_decoded = (array)json_decode($process_statuses);
                ksort($process_decoded);
                $next_stage = 0;
                $process_index = 1;
                
                foreach ($process_decoded as $process_key => $value1) {
                    if($process_index <$process_key)
                    {
                    $next_stage = $process_index;
                    break;
                    }
                    $process_index++;
                }
                if($next_stage<1)
                {
                  $next_stage = $process_key+1;
                }
            }
            return $next_stage;
        }

        public function allowed_company($userGroupId, $company_id, $page)
        {
            $condition_cmp_ids = array();
            if($userGroupId!=ADMIN && $userGroupId!=SUPER_USER)
            {
                $company_id_array = json_decode($company_id);
                if($page=="company")
                {
                $condition_cmp_ids = array('Company.id'=>$company_id_array);
                }elseif($page=="application"){
                $condition_cmp_ids = array('Application.company_id'=>$company_id_array); 
                }
            }
            return $condition_cmp_ids;
        }

        function get_employee_count_of_company($company_id, $owner_id){
            App::import ("Model", "User");
            $userModel = new User;
            $user_count = 0;
            $user_id_array = array();
            $results = $userModel->find('all', array('conditions'=>array('User.owner_id'=>$owner_id, 'User.company_id !='=>''), 'fields'=>array('User.company_id', 'User.id')));
            foreach ($results as $key => $result) {
                $company_id_array = json_decode($result['User']['company_id']);
                if(in_array($company_id, $company_id_array))
                {
                    $user_count++;
                    $user_id_array[] = $result['User']['id'];
                }
            }
            return array('user_count'=>$user_count, "user_ids"=>$user_id_array);
        }

        public function BarcodeGenerateAndSave($app_id){
            $barcode = $this->BarcodeGenerate($app_id);
            App::import ("Model", "Application");
            $model = new Application;
            $model->id = $app_id;
            $model->saveField("barcode",$barcode);
            return true;
        }

        public function BarcodeGenerate($app_id){
            if($app_id!='')
            {
                $digit = 6;
                $used_digit = strlen($app_id);
                if($used_digit<$digit)
                {   
                    $rest_digit = $digit-$used_digit;
                    $barcode = "E".str_repeat('0', $rest_digit) .$app_id;    
                }else{
                    $barcode = "E".$app_id;    
                }
                return $barcode;
            }
        }

       
        
    }
    
    