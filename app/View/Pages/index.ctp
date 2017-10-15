<div class="container">
<div class="row">
	<div class="col-xs-12 col-sm-7">
	<?php echo $this->Session->flash(); ?>
    	<div class="landingImg">
        	<img src="<?php echo SITE_URL.'img/landingimage.png'; ?>" />
        </div>
        <div class="headingMain">It’s time to switch to eMandoobi.<!-- Welcome To <span>Visa Processing</span> --></div>
        <div class="content">
        <p>
        	a slick, professional theme built to provide your work with a speed and to be more organised. Get away from paying fines and delay your employee’s visa. Be on top of if Now with eManddobi Platform. <strong>It’s a game changer.</strong>
        </p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-5">
      <?php echo $this->Form->create('User', 
        array(
            'id'=>'UserLoginForm', 
            'class'=>'fcorn-login-2',
            'url' => SITE_URL.'login'
            )
        ); ?>
   				<span id="login_error"></span>
				<span class="fa fa-envelope icon">
				<?php echo $this->Form->input("email" ,array('label' => false,'div' => false,
				"placeholder"=>"Enter email-id"))?>
				</span>
				<span class="fa fa-key icon">
				<?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,"placeholder"=>"Enter password" ))?>
				</span>
				
				<span class="forget-pass">
						<?php echo $this->Html->link(__("Forgot Password?",true),"/forgotPassword") ?>
				</span>
				<label class="login-btn"><input type="button" value="Login" id="submit_button"></label>
				<?php echo $this->Html->link(__("Register",true),"/register", array('class'=>"signup-btn")) ?>
				
		<?php echo $this->Form->end();?>
    </div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#submit_button').click(function(){
		var UserEmail = $('#UserEmail').val();
		var UserPassword = $('#UserPassword').val();
		$error= 0;
		if(UserEmail=='')
		{
			jQuery('#UserEmail').addClass("fieldRequired");
			$error = 1;
		}else{
			jQuery('#UserEmail').removeClass("fieldRequired");
		}
		if(UserPassword=='')
		{
			jQuery('#UserPassword').addClass("fieldRequired");
			$error = 1;
		}else{
			jQuery('#UserPassword').removeClass("fieldRequired");
		}

		if($error==0)
		{
			var formData = $("#UserLoginForm").serialize();
		
		$.ajax({
				type: "POST",
				url: "<?php echo SITE_URL ?>"+"login",
				//datatype: 'json',
				data: formData,
				success: function(data, textStatus, jqXHR) {
					var data = JSON.parse(data); 
					if(data.error==1)
                    {
                    	$('#login_error').text(data.data.User.email);
                    }else{
                    	$("#UserLoginForm").submit();
                    }
				}
			});
		}
		
	});


	$('#UserPassword, #UserEmail').keypress(function (e) {
	 var key = e.which;
	 if(key == 13)  // the enter key code
	  {
	    $('#submit_button').trigger('click');  
	  }
	}); 

});

</script>

