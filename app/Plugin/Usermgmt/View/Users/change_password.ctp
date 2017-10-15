<?php

?>
<div class="umtop greyBg">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid loginBox">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Change Password'); ?></span>
				<span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="head-border"></div>
			<div class="um_box_mid_content_mid" id="changepass">
				<?php echo $this->Form->create('User', array('action' => 'changePassword')); ?>
				<?php if(!$this->Session->check('UserAuth.FacebookChangePass') && !$this->Session->check('UserAuth.TwitterChangePass') && !$this->Session->check('UserAuth.GmailChangePass') && !$this->Session->check('UserAuth.LinkedinChangePass') && !$this->Session->check('UserAuth.FoursquareChangePass') && !$this->Session->check('UserAuth.YahooChangePass')){ ?>
				<div>
					<div class="umstyle3"><?php echo __('Old Password');?></div>
					<div class="umstyle4"><?php echo $this->Form->input("oldpassword" ,array("type"=>"password",'label' =>  false,'div' => false,'class'=>"form-control input-sm" ))?></div>
					<div style="clear:both"></div>
				</div>
				<?php } ?>
				<?php if($this->Session->check('UserAuth.TwitterChangePass') || $this->Session->check('UserAuth.LinkedinChangePass')){ ?>
				<div>
					<div class="umstyle3"><?php echo __('Email');?></div>
					<div class="umstyle4"><?php echo $this->Form->input("email" ,array('label' => false,'div'=> false,'class'=>"form-control input-sm" ))?></div>
				<?php if(($this->Session->check('UserAuth.TwitterChangePass') || $this->Session->check('UserAuth.LinkedinChangePass')) && isset($this->validationErrors['User']['email']) && $this->validationErrors['User']['email'][0]=='This email is already registered') { ?>
					<div class="umstyle9"><?php echo __('If this email is yours please verify');?> <?php echo $this->Form->Submit(__('Verify'), array('div'=>false, 'name'=>'verify'));?></div>
				<?php if($this->Session->check('UserAuth.EmailVerifyCode')) {?>
					<div class="umstyle10"><?php echo __('Verification Code');?></div>
					<div class="umstyle11"><?php echo $this->Form->input("emailVerifyCode" ,array('label' => false,'div'=> false,'class'=>"form-control input-sm", 'style'=>'width:50px;'))?></div>
				<?php } }?>
					<div style="clear:both"></div>
				</div>
				<?php } ?>
				<div>
					<div class="umstyle3"><?php echo __('New Password');?></div>
					<div class="umstyle4"><?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control input-sm" ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"><?php echo __('Confirm Password');?></div>
					<div class="umstyle4"><?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control input-sm" ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"></div>
					<div class="umstyle4"><?php echo $this->Form->Submit(__('Change'), array('name'=>'submit', 'class'=>'btn orange-btn'));?></div>
					<div style="clear:both"></div>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>