<?php echo $this->element(
    'Usermgmt.ajax_validation', 
    array(
        "formId" => "UserLoginForm", 
        "submitButtonId" => "loginSubmitBtn"
        )
    ); ?>

<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
	  
      <?php echo $this->element('Usermgmt.provider'); ?>
       <?php echo $this->Form->create('User', 
        array(
            'id'=>'UserLoginForm', 
            'class'=>'form-horizontal',
            'url' => SITE_URL.'login'
            )
        ); ?>
		
	<div class="or-border"><div class="or">or</div></div>
      <div class="modal-body">
        <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-8">
                   <?php 
                   echo $this->Form->input("email",
                       array(
                           'label' => false,
                           'div' => false,
                           'class'=>"form-control", 
                           "placeholder"=>"Enter Your Registered Email Id"
                           )
                       );
                   ?>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
              <div class="col-sm-8">
                  <?php 
                  echo $this->Form->input("password",
                      array(
                          "type"=>"password",
                          'label' => false,
                          'div' => false,
                          'class'=>"form-control", 
                          "placeholder"=>"Enter Your Password"
                          )
                      );
                  ?>
              </div>
            </div>
            <div class="form-group">
			 <label class="col-sm-3 hideClass">&nbsp</label>
              <div class="col-sm-8">
                <div class="checkbox homeLogin">
                  <label>
                      <?php 
                      echo $this->Form->input("remember",
                          array(
                              "type"=>"checkbox",
                              'label' => "Remember me", 
                              'div' => false,
                              "class"=>"")
                          );
                          ?>
                  </label>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="loginSubmitBtn" class="btn orange-btn">Login</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      <?php echo $this->Form->end ();?>
        
        <div class="ol-form-nav bottomLink">
            <div style="float:left">
				<?php echo $this->Html->link ("Lost your password?", ("/forgotPassword"));?>
            </div>
            <div style="float:right">
                <a class="toggleModal"  data-target="signupModal" href="javascript:void(0);">Register &raquo;</a>
            </div>
            <div style="clear:both"></div>
        </div>
        
        
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->