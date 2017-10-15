<div class="container">
	
    <div class="loginboxouter">
    <div class="loginhead">
    	<h4>Reset Password</h4>
    </div>
    <div class="form-group"><?php echo $this->Session->flash(); ?></div>
   <?php echo $this->Form->create('User', array('action' => 'activatePassword')); ?>

	  <div class="form-group">
	    <label for="exampleInputEmail1"><?php echo __('Password');?></label>
	    <?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control" ))?>
	   </div>

	   <div class="form-group">
	    <label for="exampleInputEmail1"><?php echo __('Confirm Password');?></label>
	    <?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control" ))?>
	   </div>
	  
	   <?php   if (!isset($ident)) {
						$ident='';
					}
					if (!isset($activate)) {
						$activate='';
					}   ?>
					<?php echo $this->Form->hidden('ident',array('value'=>$ident))?>
					<?php echo $this->Form->hidden('activate',array('value'=>$activate))?>
					<?php echo $this->Form->Submit(__('Reset'), array("class"=>"btn btn_login"));?>

	 <?php echo $this->Form->end(); ?>
    </div>
    
</div>
