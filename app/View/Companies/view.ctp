    <div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Company detail</h3>
        </div>
        <div class="div_right col-lg-7">
            <div style="float:right;">
            <a href="<?php echo SITE_URL.'companies/edit/'.$company_id;?>" id="list" class="btn btn-default btn-sm btn-primary"><i class='glyphicon glyphicon-edit'></i>Edit</a>
            </div>

        </div>
        </div>
    </div>

<div class="container wrapper">
<div class="form-cnt">


<form class="well form-horizontal" method="post" id="contact_form">
<fieldset>

<div class="form-group">
  <label class="col-md-3 control-label">Company Name as per Trade License</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo ucfirst($result['Company']['company_name'])?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Company Type</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $company_type[$result['Company']['company_type']]?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Company Email</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $result['Company']['company_email']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Company Telephone Number</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $result['Company']['company_phone']?>" readonly="readonly">
    </div>
  </div>
</div>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label">Name of Company Representative</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $result['Company']['representative_name']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Mobile Number of Company Representative</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $result['Company']['representative_mobile']?>" readonly="readonly">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-3 control-label">Remark</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $result['Company']['remark']?>" readonly="readonly">
    </div>
  </div>
</div>

</fieldset>
</form>

<div class="row">
      <div class="col-lg-12">
       <div class="top-serch">
       
       <table class="table">
          <tr><td><h3>Total Application <strong>: <?php echo $application_count; ?></strong></h3></td> 
          <td><h3>Total Employee <strong>: <?php echo $user_count; ?></strong></h3></td></tr>
       </table>
      </div>
      </div>
    </div>

<div class="row">
      <div class="col-lg-12">
       <div class="top-serch">
       <div class="col-lg-12"><h3>Company detail history</h3></div>  

    <table class="table">
      <thead>
        <tr>
              <th>Updated By</th>
              <th>Updated Date Time</th>
              <th>Action</th>
              <th>View Updated Detail</th>
        </tr>
      </thead>
      <tbody>
      <?php 
     
        if(!empty($histories)){
        foreach ($histories as $history) { 
          $history_id = $history['CompanyHistory']['id'];
          ?>
        <tr>
          <td><?php $created_by = $history['CompanyHistory']['created_by'];
            $created_by_info1 = $this->Custom->user_info_by_id($created_by);
            if(!empty($created_by_info1)){ ?>
            <a target="_blank" href="<?php echo SITE_URL?>UserActivity/view_employee/<?php echo $created_by?>">
            <?php echo ucfirst($created_by_info1['User']['first_name'])." ".$created_by_info1['User']['last_name']; }
           ?></a></td>
          <td><?php echo date("d M Y H:i:s",strtotime($history['CompanyHistory']['created'])); ?></td>
          <td><?php echo "Company detail updated" ?></td>
          <td>
          <a href="javascript:void(0)" class="view_detail" history_id="<?php echo $history_id?>">View Detail</a>
          
          </td>
        </tr>
        <?php }}else{ ?>
        <tr><td colspan="4">Data not found</td></tr>
        <?php } ?>
        
      </tbody>
    </table>          
      </div>
      </div>
    </div>





<?php if(!empty($document_histories))
{?>
    <div class="row">
      <div class="col-lg-12">
       <div class="top-serch">
       <div class="col-lg-12"><h3>Company document history</h3></div>  

    <table class="table">
      <thead>
        <tr>
              <th>Document Type</th>
              <th>Document View</th>
              <th>Document Expiry Date</th>
              <th>Updated Date Time</th>
              <th>Updated By</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        foreach ($document_histories as $history) {  ?>
        <?php $doc_name = $history['CompanyDocumentHistory']['document_name']; ?>
        <tr>
          <td><?php $type = $history['CompanyDocumentHistory']['document_type']; 
          echo $docs_types[$type];
          ?></td>
          <td>
              <div class="animated-thumbnails">
              <a href="<?php echo SITE_URL?>img/company_files/<?php echo $owner_id.'/'.$doc_name?> " title="Click to view document" target="_blank">
              <img src="<?php echo SITE_URL?>img/docs_enable.png" height="28" width="35" >
              </a>
              </div>
          </td>
          <td><?php echo ($history['CompanyDocumentHistory']['document_expiry_date']!='')?$history['CompanyDocumentHistory']['document_expiry_date']:'----'; ?></td>
          <td><?php echo date("d M Y H:i:s", strtotime($history['CompanyDocumentHistory']['created_date'])); ?></td>
          <td><?php $created_by = $history['CompanyDocumentHistory']['created_by'];
            $created_by_info = $this->Custom->user_info_by_id($created_by); ?>
            <a target="_blank" href="<?php echo SITE_URL?>UserActivity/view_employee/<?php echo $created_by?>">
            <?php echo ucfirst($created_by_info['User']['first_name'])." ".$created_by_info['User']['last_name'];
           ?></a></td>
        </tr>
        <?php } ?>
        
      </tbody>
    </table>          
      </div>
      </div>
    </div>
<?php } ?>

  </section>
</div>
</div>

<a data-toggle="modal" data-target=".historyPopupModal" id="click_for_popup" style="display:none;">View detail</a> 
<!--  Popup for view company detail history -->
<div  class="modal fade historyPopupModal" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Company history</h4>
      </div>
      <div class="modal-body" id="show_history_detail"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

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
        fullScreen: true
    });
}
   
</script>


<script type="text/javascript">
  $('.view_detail').click(function(){
      var history_id = $(this).attr("history_id");
      var values = "history_id="+history_id;
          $.ajax({
              url: "<?php echo SITE_URL?>companies/get_history_detail",
              type: "post",
              data: values,
              success: function(res){
                  $('#show_history_detail').html(res);
                  $('#click_for_popup').trigger('click');
              }
          });

  });
</script>
