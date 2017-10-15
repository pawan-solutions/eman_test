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
    	<img src="<?php echo SITE_URL.'img/logo.png'; ?>" alt="Emandoobi"/>
    </div>
    <h4 align="center">Sign In For Admin Or Operator</h4>
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

</body>
</html>
