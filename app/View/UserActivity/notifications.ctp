<div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Notifications</h3>
        </div>
        <div class="div_right col-lg-7">
            <div style="float:right;">
            <a href="<?php echo SITE_URL.'UserActivity/notifications/read';?>" id="list" class="btn btn-default btn-sm btn-primary"><i class='glyphicon glyphicon-edit'></i> Mark as read all</a>
            </div>
        </div>
        </div>

        </div>
    </div>
<div class="container wrapper">

<div class="row">
      <div class="col-lg-12">
       <div class="top-serch">
    <table class="table">
      <thead>
        <tr>
              <th>Notification Type</th>
              <th>View Detail</th>
              <th>Created Date Time</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      if(!empty($notifications))
      {
        $notification_type = unserialize(NOTIFICATION_TYPE);
        foreach ($notifications as $key=>$notification) { 
            $application_id = $notification['Notification']['application_id'];
            $type=$notification['Notification']['type'];
            if($type==1){  //Visa Application request
              $process_type = $notification['Notification']['process_type'];
              $c_type = $this->Custom->get_process_text($process_type);
            }elseif($type==4){ //visa completion
              $process_type = $notification['Notification']['process_type'];
              $process_stage = $notification['Notification']['process_stage'];
              $name = isset($appInfo[$application_id])?$appInfo[$application_id]:'';
              $c_type = $this->Custom->get_visa_completed_text($process_type,$process_stage,$name);
            }else{
              $c_type = $notification_type[$type];
            }
            
         ?>
        <tr>
          
          <td><?php echo $c_type; ?></td>
          <td>
            <a href="<?php echo SITE_URL.'applications/everything/'.$application_id;?>" target="_blank">
            <img src="<?php echo SITE_URL.'img/view.png'; ?>"></a>
          </td>
          <td><?php echo date("d-m-Y H:i:s", strtotime($notification['Notification']['created_date']));?></td>
        </tr>
        <?php }
        }else{ ?>
        <tr><td colspan="4" align="center">Record not found</td></tr>
        <?php }?>
        
      </tbody>
    </table>          

                          
      </div>
      </div>
    </div>
        
        </div>