<?php


?>
<?php echo $this->Html->script(array('/usermgmt/js/jquery-1.7.2.min','/usermgmt/js/ajaxValidation')); ?>
<?php echo $this->element('ajax_validation', array("formId" => "changeUserPasswordForm", "submitButtonId" => "changeUserPasswordSubmitBtn")); ?>
<div class="umtop">
<div class="container">
   <div class="row">
    <div class="col-md-12">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid radius-all loginBox">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Change Password for '); echo h($name); ?></span>				
				<?php $page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1; ?>
				<span class="umstyle2" style="float:right"><?php echo "<a href='".$this->Html->url(array('action'=>'index', 'page'=>$page))."'>Back</a>"; ?></span>
				<div style="clear:both"></div>
			</div>
		    <div class="head-border"></div>
			<div class="um_box_mid_content_mid" id="login">
				<?php echo $this->Form->create('User', array('id'=>'changeUserPasswordForm')); ?>
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
					<div class="umstyle3 hideClass">&nbsp;</div>
					<div class="umstyle4"><?php echo $this->Form->Submit(__('Change'), array('id'=>'changeUserPasswordSubmitBtn', 'class'=>'btn orange-btn'));?></div>
					<div style="clear:both"></div>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	<div class="um_box_down"></div>
</div>