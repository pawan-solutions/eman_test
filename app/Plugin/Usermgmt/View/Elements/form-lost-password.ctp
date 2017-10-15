<?php echo $this->element(
    'Usermgmt.ajax_validation', 
    array(
        "formId" => "UserLostPawwForm", 
        "submitButtonId" => "LostSubmitBtn"
        )
    ); ?>

<div class="modal fade" id="lostPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Retrieve password</h4>
      </div>
       <?php echo $this->Form->create('User', 
        array(
            'id'=>'UserLostPawwForm', 
            'class'=>'form-horizontal',
            'url' => SITE_URL.'login'
            )
        ); ?>
      <div class="modal-body">
        <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                   <?php 
                   echo $this->Form->input("email",
                       array(
                           'label' => false,
                           'div' => false,
                           'class'=>"form-control", 
                           "placeholder"=>"E-mail"
                           )
                       );
                   ?>
              </div>
              <p class="description">
                        Please enter your e-mail address. You will receive a link to create a new password via email.
                </p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="LostSubmitBtn" class="btn btn-primary">
              Get New Password
          </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      <?php echo $this->Form->end ();?>
        
        <div class="ol-form-nav" style="padding: 0px 10px 5px;">
            <div style="float:right">
                 <a data-form="login" href="#">Sign in &raquo;</a>
            </div>
            <div style="clear:both"></div>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->