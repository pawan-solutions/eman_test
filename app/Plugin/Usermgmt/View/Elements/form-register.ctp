<?php echo $this->element(
    'Usermgmt.ajax_validation', 
    array("formId" => "registerForm", "submitButtonId" => "registerSubmitBtn")); ?>
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <?php 
            echo $this->Form->create('User', array(
                'url' => SITE_URL.'register', 
                'id'=>'registerForm', 
                "class"=>"form-horizontal"
                )
            );
        ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
      </div>
        <?php echo $this->element('Usermgmt.provider'); ?>
        <div class="or-border"><div class="or">or</div></div>
      <div class="modal-body">
        <!--<div class="alert alert-danger">Password does not meet requirements</div>-->
        <div>
            <div class="form-group">
              <label for="inputFname" class="col-sm-3 control-label">First Name</label>
              <div class="col-sm-8">
                  <?php echo $this->Form->input(
                      "first_name",
                      array(
                          'label' => false,
                          'div' => false,
                          'class'=>"form-control",
                          "placeholder"=>"First Name",
                          "id" => "regFname"
                          )
                      )
                      ?>
              </div>
            </div>
            
            <div class="form-group">
              <label for="inputLname" class="col-sm-3 control-label">Last Name</label>
              <div class="col-sm-8">
                  <?php echo $this->Form->input(
                      "last_name",
                      array(
                          'label' => false,
                          'div' => false,
                          'class'=>"form-control",
                          "placeholder"=>"Last Name",
                          "id" => "regLname"
                          )
                      )
                      ?>
              </div>
            </div>
            
            <div class="form-group">
              <label for="inputEmail" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-8">
                  <?php echo $this->Form->input(
                      "email",
                      array(
                          'label' => false,
                          'div' => false,
                          'class'=>"form-control",
                          "placeholder"=>"Email",
                          "id" => "regEmail"
                          )
                      )
                    ?>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-8">
                  <?php echo $this->Form->input(
                      "password",
                      array(
                          'label' => false,
                          'div' => false,
                          'class'=>"form-control",
                          "placeholder"=>"Password",
                          "id" => "regPassword"
                          )
                      )
                    ?>
              </div>
            </div>
            <div class="form-group">
              <label for="inputCPassword" class="col-sm-3 control-label">Confirm Password</label>
              <div class="col-sm-8">
                  <?php echo $this->Form->input(
                      "cpassword",
                      array(
                          "type" => "password",
                          'label' => false,
                          'div' => false,
                          'class'=>"form-control",
                          "placeholder"=>"Confirm Password",
                          "id" => "regCpassword"
                          )
                      )
                    ?>
              </div>
            </div>
        </div>
      </div>
	
	<div class="modal-footer" style="padding: 15px;">
	<div class="row">
	  <div class="col-sm-5 col-xs-6 alreadyBtmSpace">	
            <a href="javascript:void(0);" class="toggleModal" data-target="signinModal">
                Already a member? Sign in &raquo;
            </a> 
	</div>
	  
	  <div class="col-sm-6 col-xs-6 registerBtmSpace">
        <button type="submit" id="registerSubmitBtn" class="btn orange-btn" >Register</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
</div> 
</div> 

      <?php echo $this->Form->end();?>	  
      <div style="clear:both"></div>
    </div><!-- /.modal-content -->

  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
