<?php
$process_type = $app_detail['Application']['process_type'];
$app_id = $app_detail['Application']['id'];
if($process_type==1)
{
  $edit_page = "edit_new_residency";
}elseif($process_type==2)
{
  $edit_page = "edit_renew_residency";
}elseif($process_type==3)
{
  $edit_page = "edit_local_transfer";
}elseif($process_type==4)
{
  $edit_page = "edit_cancellation";
}
?>
    <div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Application detail</h3>
        </div>
        <div class="div_right col-lg-7">
            <div style="float:right;">
            <a href="<?php echo SITE_URL.'applications/'.$edit_page.'/'.$app_id;?>" id="list" class="btn btn-default btn-sm btn-primary"><i class='glyphicon glyphicon-edit'></i>Edit</a>
            </div>

        </div>
        </div>
    </div>

<div class="container wrapper">
<div class="form-cnt">


<form class="well form-horizontal" action=" " method="post" id="contact_form">
<fieldset>

<?php $appres = $app_detail['Application']; 
    $country_type_arr = unserialize(COUNTRY_TYPE);
    $marital_arr = unserialize(MARITAL_STATUS);
    $c_app_type = $all_app_type[$process_type];

    if(isset($appres['country_type']))
    {
        $country_type = $country_type_arr[$appres['country_type']];
    }else{ $country_type = "N/A";}

    if(isset($appres['marital_status']))
    {
        $marital = $marital_arr[$appres['marital_status']];
    }else{ $marital = "N/A";}
?>

<div class="form-group">
  <label class="col-md-3 control-label">Application Type</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $c_app_type?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Passport Barcode</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $app_detail['Application']['barcode']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Employee Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['employee_name']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Company Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo ucfirst($app_detail['Company']['company_name'])?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Employee Company ID Number</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo ucfirst($appres['employee_id_number'])?>" readonly="readonly">
    </div>
  </div>
</div>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label">Designation</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['designation']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Father Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['father_name']?>" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label">Mother Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['mother_name']?>" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label">UAE Telephone Number</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['phone_inside']?>" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label">Home Country Telephone Number</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['phone_outside']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">UAE Home Address</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['address_inside']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Home Country Address</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['address_outside']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Remark</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $app_detail['ApplicationDetail']['remark']?>" readonly="readonly">
    </div>
  </div>
</div>

</fieldset>
</form>


<div class="row">
      <div class="col-lg-12">
       <div class="top-serch">
       <div class="col-lg-12"><h3>Supporting Document</h3></div>  

    <table class="table">
      <thead>
        <tr>
              <th>Issue in</th>
              <th>Comment</th>
              <th>Supporting Document</th>
              <th>Issue Date</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      if(!empty($supporting_document))
      {
        foreach ($supporting_document as $single_docs) { 
          $supporting_document = json_decode($single_docs['ApplicationIssue']['supporting_document']);
          $comment = $single_docs['ApplicationIssue']['comment'];
          $cr_date = $single_docs['ApplicationIssue']['created_date'];
          if(!empty($supporting_document))
          {
            foreach ($supporting_document as $doc_type => $doc_name) {
          ?>
        <tr>
          <td><?php echo ucfirst($doc_type) ?></td>
          <td><?php echo $comment ?></td>

          <td><a href='<?php echo SITE_URL?>applications/download_docs/issue_support_document/<?php echo $doc_name."/employee";?>'><i class="fa fa-download"></i>Download</a></td>
          <td><?php  echo $cr_date; ?></td>
        </tr>
        <?php }}}
        }else{ ?>
        <tr>
          <td colspan="3"><p>Data Not Found</p></td>
        </tr>
        <?php  }  ?>
        
      </tbody>
    </table>          

                          
      </div>
      </div>
    </div>


<div class="row">
      <div class="col-lg-12">
       <div class="top-serch">
       <div class="col-lg-12"><h3>History</h3></div>  

    <table class="table">
      <thead>
        <tr>
              <th>Updated By</th>
              <th>Day</th>
              <th>Date </th>
              <th>Time</th>
              <th>Action</th>
              <!-- <th>Process Type</th> -->
        </tr>
      </thead>
      <tbody>
      <?php 
      //pr($process_actions);

      if(isset($visa_aaply_by))
        { 
          $date = $app_detail['Application']['created'];
          $date_exp = explode(" ",$date); 
          $day = date("l", strtotime($date_exp[0])); 
          $process_type = $app_detail['Application']['process_type'];
          $all_app_type[$process_type];

          $process_type_when_created = isset($converted_app_res['ConvertedApplication']['previous_process_type'])?$converted_app_res['ConvertedApplication']['previous_process_type']: $process_type;
          $curr_app_type = $all_app_type[$process_type_when_created];
        ?>
        <tr>
          <td><a target="_blank" href="<?php echo SITE_URL?>UserActivity/view_employee/<?php echo $visa_aaply_by['User']['id']?>"><?php echo ucfirst($visa_aaply_by['User']['first_name']. " ".$visa_aaply_by['User']['last_name']);?></a></td>
          <td><?php echo $day; ?></td>
          <td><?php echo date("d M Y", strtotime($date_exp[0])); ?></td>
          <td><?php echo $date_exp[1]?></td>
          <td>Addded New Visa Application</td>
          <!-- <td><?php echo $curr_app_type; ?></td> -->
        </tr>
        <?php }
        
        foreach ($process_actions as $p_action) { 
          $date1 = $p_action['ApplicationAction']['created_date'];
          $date_exp1 = explode(" ",$date1); 
          $day1 = date("l", strtotime($date_exp1[0])); 
          $ptype = $p_action['ApplicationAction']['process_stage'];
          if(isset($ptype) && $ptype!='')
          { 
            $process_type = $p_action['ApplicationAction']['process_type'];
            $company_type = $app_detail['Company']['company_type'];
            $visa_process = $this->Custom->getVisaProcesseByType($process_type,$company_type);
            $cur_p_type = $visa_process[$ptype];
          }else{
            $cur_p_type = $c_app_type;  
          }
          
          $created_by = $p_action['ApplicationAction']['created_by'];
          $action_uinfo = $this->Custom->user_info_by_id($created_by);

          $action_type = $p_action['ApplicationAction']['action_type'];
          if($action_type=="app_references")
          {
              $action_type_show = "Applied ".$cur_p_type;
          }elseif($action_type=="app_processes"){
              $action_type_show = "Completed <b>".$cur_p_type."</b>";
          }elseif($action_type=="app_history"){
              $action_type_show = "Application updated";
          }elseif($action_type=="application_converted"){
              $process_from = $p_action['ApplicationAction']['field1'];
              $process_to = $p_action['ApplicationAction']['field2'];
              $process_from_txt = $all_app_type[$process_from];
              $process_to_txt = $all_app_type[$process_to];
              $action_type_show = "Converted from <b>".$process_from_txt."</b> to <b>".$process_to_txt."</b>";
          
          }elseif($action_type=="passport_tracking"){
              $process_type = $p_action['ApplicationAction']['process_type'];
              $passport_type_arr = unserialize(PASSPORT_TRACK_TYPE);
              $action_type_show = ucwords(str_replace('_',' ', $passport_type_arr[$process_type]));
          }else{
              $comment = $p_action['ApplicationAction']['field2']; 
              $action_type_show = "Issue in ".$cur_p_type;
              if($comment!=''){ $action_type_show .= ' ('.$comment.')';}
              
          }


          ?>
        <tr>
          <td><a target="_blank" href="<?php echo SITE_URL?>UserActivity/view_employee/<?php echo $created_by?>"><?php echo ucfirst($action_uinfo['User']['first_name']. " ".$action_uinfo['User']['last_name']); ?></a></td>
          <td><?php echo $day1; ?></td>
          <td><?php echo date("d M Y", strtotime($date_exp1[0])); ?></td>
          <td><?php echo $date_exp1[1]?></td>
          <td><?php echo $action_type_show; ?></td>
          <!-- <td><?php echo $cur_p_type; ?></td> -->
        </tr>
        <?php } ?>
        
      </tbody>
    </table>          

                          
      </div>
      </div>
    </div>
        

        </section>
        </div>
        </div>