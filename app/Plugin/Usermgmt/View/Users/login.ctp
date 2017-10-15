<div class="container">
	
    <div class="loginboxouter">
    <div class="loginhead">
    	<img src="<?php echo SITE_URL.'img/logo.png'; ?>" alt="Emandoobi"/>
    </div>
    <div class="form-group"><?php echo $this->Session->flash(); ?></div>
   <?php echo $this->Form->create('User', array('url'=>array('plugin'=>'usermgmt', 'controller'=>'users', 'action' => 'login', isset($connect) ? $connect : '', isset($from) ? $from : '', isset($admin) ? $admin : ''))); ?>

	  <div class="form-group">
	    <label for="exampleInputEmail1"><?php echo __('Email Id');?></label>
	    <?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control" ))?>
	   </div>

	   <div class="form-group">
	    <label for="exampleInputEmail1"><?php echo __('Password');?></label>
	    <?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control" ))?>
	   </div>
	  
	  <?php echo $this->Form->Submit(__('Sign In'), array("class"=>"btn btn_login"));?>
	  
	  
	  <p><?php echo $this->Html->link(__("Forgot Password?",true),"/forgotPassword",array("class"=>"")) ?></p>
   <?php echo $this->Form->end(); ?>
    </div>
    
</div>
