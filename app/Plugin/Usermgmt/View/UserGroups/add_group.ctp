<?php

?>
<?php echo $this->Html->script(array('/usermgmt/js/jquery-1.7.2.min','/usermgmt/js/ajaxValidation')); ?>
<?php echo $this->element('ajax_validation', array("formId" => "addGroupForm", "submitButtonId" => "addGroupSubmitBtn")); ?>
<div class="umtop">
 <div class="container">
   <div class="row">
    <div class="col-md-12">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid radius-all loginBox">		
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Add Role'); ?></span>
				<?php $page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1; ?>
				<span class="umstyle2" style="float:right"><?php echo "<a href='".$this->Html->url(array('action'=>'index', 'page'=>$page))."'>Back</a>"; ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="head-border"></div>
			<div class="">
			<div class="um_box_mid_content_mid" id="addgroup">
				<?php echo $this->Form->create('UserGroup', array('action' => 'addGroup', 'id'=>'addGroupForm')); ?>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('role Name'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("name" ,array('label' => false,'div' => false,'class'=>"form-control input-sm" ))?>
					<div class="umstyle7">for ex. Business User</div>
					</div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('Alias Role Name'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("alias_name" ,array('label' => false,'div' => false,'class'=>"form-control input-sm" ))?>
					<div class="umstyle7">for ex. Business_User (Must not contain space)</div>
					</div>
					<div style="clear:both"></div>
				</div>

				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('Role For'));?></div>
					<div class="umstyle4" >
					<?php 
					$role_for = unserialize(ROLE_FOR);
					echo $this->Form->input("role_for" ,array('type' => 'select',  'label' => false,'div' => false,'class'=>"form-control input-sm" ,'options'=>$role_for ))?>


					<?php //echo $this->Form->input("alias_name" ,array('label' => false,'div' => false,'class'=>"form-control input-sm" ))?>
					
					</div>
					<div style="clear:both"></div>
				</div>

				<div>
				<?php   if (!isset($this->request->data['UserGroup']['allowRegistration'])) {
							$this->request->data['UserGroup']['allowRegistration']=true;
						}   ?>
					<div class="umstyle3 umstyle3-mobile"><?php echo $this->Form->label(__('Allow Registration'));?></div>
					<div class="umstyle4 umstyle4-mobile"><?php echo $this->Form->input("allowRegistration" ,array("type"=>"checkbox",'label' => false, 'div' => false))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"></div>
					<div class="umstyle4"><?php echo $this->Form->Submit(__('Add Role'), array('id'=>'addGroupSubmitBtn', 'class'=>'btn orange-btn'));?></div>
					<div style="clear:both"></div>
				</div>
				<div>Note: If you add a new role then you should give permissions to this newly created Role.</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
	</div>
	</div>
	<div class="um_box_down"></div>
</div>