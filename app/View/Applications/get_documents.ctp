<h4 id="person_name_show">Employee Document </h4>

<div class="col-sm-16" >
	   
	<?php 
  $app_id = isset($employee_documents['ApplicationDetail']['application_id'])?$employee_documents['ApplicationDetail']['application_id']:'';
  unset($employee_documents['ApplicationDetail']['application_id']);
  $newarr = array_filter($employee_documents['ApplicationDetail']); 
	if(!empty($newarr)){
    ?>
  	<a href="<?php echo SITE_URL."applications/download_all/".$app_id; ?>">Download all</a>	
  	<table class="table">
      <thead>
        <tr>
              <th>File Type</th>
              <th>File View</th>
              <th>File Download</th>
        </tr>
      </thead>
      <tbody>
        
      

    <?php 	
  	foreach ($newarr as $key1=>$value) { 
  		$key = str_replace("emp","employee", $key1);?>

        <tr>
              <td><?php echo ucfirst(str_replace("_"," ",$key)). " : ";?></td>
              <td><div class="animated-thumbnails">
                  <a href="<?php echo SITE_URL?>img/applications/<?php echo $key1."/".$value;?>" title="Click to view document" >
                <img src="<?php echo SITE_URL?>img/docs_enable.png" height="25" width="35">
                </a>
                </div>
              </td>
              <td><a href="<?php echo SITE_URL?>applications/download_docs/<?php echo $key1."/".$value."/employee";?>"><i class="fa fa-download"></i></a> </td>
        </tr>
  	 <?php } }else{
  	    echo "<tr><td><p>Not found any document</p></td></tr>";
  	 }
  	?>
   
    </tbody>
    </table>
</div>


<h4 id="person_name_show">Visa Document</h4>
<div class="col-sm-16" >


	<?php 
  $process_status_array = $ref_num_arr = array();
	$process_status = (array)json_decode($visa_documents['Application']['process_status']);
  if(!empty($process_status))
  {
    foreach ($process_status as $k => $v) {
        $process_status_array[$k] = $v;
    }
    $process_status_array = array_filter($process_status_array);
  }

	$ref_number_status = json_decode($visa_documents['Application']['ref_number_status']);
  if(!empty($ref_number_status))
  {
    foreach ($ref_number_status as $k1 => $v1) {
        $ref_num_arr[$k1] = $v1;
    }
    $ref_num_array = array_filter($ref_num_arr);
  }

	$process_type = $visa_documents['Application']['process_type'];
  $country_type = $visa_documents['Application']['country_type'];
  $company_type = $visa_documents['Company']['company_type'];
  $visa_process = $this->Custom->getVisaProcesseByType($process_type,$company_type);
	
	?>

    <table class="table">
      <thead>
        <tr>
              <th>Process Type</th>
              <th>Docs View</th>
              <th>Docs Download</th>
              <th>Ref. Number</th>
        </tr>
      </thead>
      <tbody>
        
        <?php 
        //pr($ref_num_array);
        foreach ($visa_process as $key3 => $value3) { 
          if(isset($ref_num_array[$key3])){
            $ref_number = $ref_num_array[$key3]; 
            }else{ 
            $ref_number = "N/A"; }

           if($process_type==NEW_RESIDENCY && $key3==2)
            {
                $outpass_type = unserialize(OUTPASS_TYPE);
                $value3 = $outpass_type[$country_type];
                if($country_type==2) //outside
                { $ref_number = "Arrival date"; }
            }

            if(($process_type==NEW_RESIDENCY && $key3==3) || ($process_type==RENEW_RESIDENCY && $key3==1) || ($process_type==LOCAL_TRANSFER && $key3==2))
            { 
                if($ref_number == "N/A"){
                $ref_number = "Biometric";
                }else{ $ref_number = "Biometric (".$ref_number.")"; }
                
            }

            if(($process_type==NEW_RESIDENCY && $key3==6) || ($process_type==RENEW_RESIDENCY && $key3==4) || ($process_type==LOCAL_TRANSFER && $key3==6))
            { 
                if($ref_number == "N/A"){
                $ref_number = "With Zajel";
                }else{ $ref_number = "With Zajel (".$ref_number.")"; }
                
            }

          ?>
        <tr>
          <td><?php echo $value3; ?></td>
          <td> <?php
              if(isset($process_status_array[$key3])){ 
                $visa_doc = $process_status_array[$key3];  ?>
                <div class="animated-thumbnails">
                  <a class="iframe" href="<?php echo SITE_URL?>img/applications/supporting_document/<?php echo $visa_doc;?>" title="Click to view document" >
                <img src="<?php echo SITE_URL?>img/docs_enable.png" height="25" width="35">
                </a>
                </div>
                <?php }else{ echo "---";} ?>
          </td>
          <td>
              <?php 
              if(isset($process_status_array[$key3])){ 
                $visa_doc = $process_status_array[$key3];
                ?>
                <a href="<?php echo SITE_URL?>applications/download_docs/<?php echo $key3."/".$visa_doc."/visa";?>">
                <i class="fa fa-download"></i></a>
              <?php }else{ echo "---";} ?>
          </td>
          <td><?php echo $ref_number; ?></td>
          
        </tr>
        <?php }  ?>
      </tbody>
    </table>
</div>

<!--====================== POPUP START for document download====================-->
<!-- <div id="myModalDocs" class="modal"> -->
  <!-- Modal content -->
 <!--  <div class="modal-content">
    <span class="close">×</span>
    <div id="document_list">
    </div>
    
    
</div> -->
<!--====================== POPUP END====================-->
<script type="text/javascript">
  $(function() {
  setGallery();
});

function setGallery(){
    $('.animated-thumbnails').lightGallery({
        thumbnail:true,
        animateThumb: true,
        showThumbByDefault: true,
        toggleThumb: true,
        fullScreen: false
    });
}
   
</script>