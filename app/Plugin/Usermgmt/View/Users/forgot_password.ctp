<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME . " | " . $this->fetch('title'); ?></title>
<?php 
echo $this->Html->css(array('frontend/customestyle','frontend/bootstrap.min','frontend/font-awesome.min','frontend/styles'), array('media' => "all"));
?>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600' rel='stylesheet' type='text/css'>

</head>

<body>


<div class="container">
	
    <div class="loginboxouter">
    <div class="loginhead">
    	<h4>Forgot Password</h4>
    </div>
    
   <?php echo $this->Form->create('User', array('action' => 'forgotPassword')); ?>
	  <div class="form-group">
	    <label for="exampleInputEmail1"><?php echo __('Enter Registered Email Id');?></label>
	    <?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control" ))?>
	   </div>
	  
	   <?php echo $this->Form->Submit(__('Send Email'), array("class"=>"btn btn_login"));?> 
	  
	  <p>
	  	<?php echo $this->Html->link(__("Signup",true),"/register") ?> | 
	  	<?php echo $this->Html->link(__("Login",true),"/login") ?>
	  </p>
   <?php echo $this->Form->end(); ?>
    </div>
    
</div>

</body>
</html>
