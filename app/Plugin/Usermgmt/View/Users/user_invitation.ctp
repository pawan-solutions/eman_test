<div class="container">
	
    <div class="loginboxouter">
    <div class="loginhead">
    	<h4>Join Emandoobi</h4>
    </div>
    <div class="form-group"><?php echo $this->Session->flash(); ?></div>
   <?php echo $this->Form->create('User', array('action' => 'userInvitation')); ?>
   		<div class="form-group">
	    <label for="exampleInputEmail1"><?php echo __('Name');?></label>
	    <?php echo $this->Form->input("first_name1" ,array("type"=>"text",'label' => false,'div' => false,'class'=>"form-control" ,"readonly"=>true, "value"=>$user['User']['first_name']))?>
	   </div>

	   <div class="form-group">
	    <label for="exampleInputEmail1"><?php echo __('Email address');?></label>
	    <?php echo $this->Form->input("email1" ,array("type"=>"text",'label' => false,'div' => false,'class'=>"form-control" ,"readonly"=>true, "value"=>$user['User']['email']))?>
	   </div>

	  <div class="form-group">
	    <label for="exampleInputEmail1"><?php echo __('Create a password');?></label>
	    <?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control" ))?>
	   </div>

	   <div class="form-group">
	    <label for="exampleInputEmail1"><?php echo __('Confirm password');?></label>
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
					<?php echo $this->Form->Submit(__('Submit'), array("class"=>"btn btn_login"));?>

	 <?php echo $this->Form->end(); ?>
    </div>
    
</div>
