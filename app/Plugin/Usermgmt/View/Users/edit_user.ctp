<?php

?>
<?php echo $this->Html->script(array('/usermgmt/js/jquery-1.7.2.min','/usermgmt/js/ajaxValidation')); ?>
<?php echo $this->element('ajax_validation', array("formId" => "editUserForm", "submitButtonId" => "editUserSubmitBtn")); ?>
<div class="umtop">
<div class="container">
   <div class="row">
    <div class="col-md-12">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid loginBox">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Edit User'); ?></span>
				<?php $page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1; ?>			
				<span class="umstyle2" style="float:right"><?php echo "<a href='".$this->Html->url(array('action'=>'index', 'page'=>$page))."'>Back</a>"; ?></span>				
				<div style="clear:both"></div>
			</div>
			<div class="head-border"></div>
			<div class="um_box_mid_content_mid" id="register">
				<?php echo $this->Form->create('User', array('type' => 'file', 'id'=>'editUserForm')); ?>
				<?php echo $this->Form->input("id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
				<?php echo $this->Form->input("UserDetail.id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
		<?php   if (count($userGroups) >2) { ?>
					<div>
						<div class="umstyle3 required"><?php echo $this->Form->label(__('Role'));?></div>
						<div class="umstyle4" ><?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'multiple' => true, 'label' => false,'div' => false,'class'=>"form-control input-sm" ))?></div>
						<div style="clear:both"></div>
					</div>
		<?php   }   ?>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('First Name'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("first_name" ,array('label' => false,'div' => false,'class'=>"form-control input-sm" ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('Last Name'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"form-control input-sm" ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('Email'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control input-sm" ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('Gender'));?></div>
					<div class="umstyle4"><?php echo $this->Form->input("UserDetail.gender" , array('label' => false, 'div' => false, 'type' => 'select', 'class'=>"form-control input-sm", 'options'=>$gender))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3 required"><?php echo $this->Form->label(__('Marital Status'));?></div>
					<div class="umstyle4"><?php echo $this->Form->input("UserDetail.marital_status" , array('label' => false, 'div' => false, 'type' => 'select', 'class'=>"form-control input-sm", 'options'=>$marital))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"><?php echo $this->Form->label(__('Birthday'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("UserDetail.bday" ,array('label' => false,'div' => false, 'class' => 'form-control datebox', 'dateFormat' => 'DMY', 'minYear' => date('Y') - 100, 'maxYear' => date('Y') - 13))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"><?php echo $this->Form->label(__('Cellphone'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("UserDetail.cellphone" ,array('label' => false,'div' => false,'class'=>"form-control input-sm" ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"><?php echo $this->Form->label(__('Location'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("UserDetail.location" ,array('label' => false,'div' => false,'class'=>"form-control input-sm" ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"><?php echo $this->Form->label(__('Photo'));?></div>
					<div class="umstyle4"><?php echo $this->Form->input("UserDetail.photo", array('label' => false, 'type' => 'file', 'class'=>"form-control input-sm user-photo"))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"><?php echo $this->Form->label(__('Web Page'));?></div>
					<div class="umstyle4" ><?php echo $this->Form->input("UserDetail.web_page" ,array('label' => false,'div' => false,'type' => 'text','class'=>"form-control input-sm" ))?></div>
					<div style="clear:both"></div>
				</div>
				<div>
					<div class="umstyle3"></div>
					<div class="umstyle4"><?php echo $this->Form->Submit(__('Update Profile'), array('id'=>'editUserSubmitBtn', 'class'=>'btn orange-btn'));?></div>
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