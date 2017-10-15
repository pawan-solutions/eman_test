<div class="container">
<div class="signupbox">
	<div class="heading1">Ready for a brand new eMandoobi account? You’re in the right place! Just look down.
</div>
<div class="signupformbox">
<h3>Sign up now for free below</h3>
<!-- <p>Just last week, 8,050 companies got started with Basecamp 3!</p> -->

<?php echo $this->Form->create('User', array('action' => 'register', 'id'=>'registerForm')); ?>
<div class="form-group">
    <label for="exampleInputEmail1">Your full name</label>
    <?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"form-control", 'placeholder'=>"John Doe" ))?>
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Your email address</label>
    <?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control" , "placeholder"=>"John@gmail.com"))?>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control", "placeholder"=>"Enter 6+ character"))?>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control", "placeholder"=>"Enter same character"))?>
  </div>

  
  <button type="submit" class="btn btn_login">Sign up</button>
<?php echo $this->Form->end(); ?>
</div>
</div>

</div>

