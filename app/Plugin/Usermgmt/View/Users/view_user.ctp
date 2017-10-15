<div class="umtop">
<div class="container">
   <div class="row">
    <div class="col-md-12">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid radius-all col-md-8">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('User Detail'); ?></span>
				<?php $page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1; ?>
				<span class="umstyle2" style="float:right"><?php echo "<a href='".$this->Html->url(array('action'=>'index', 'page'=>$page))."'>Back</a>"; ?></span>
				<span class="umstyle2" style="float:right; margin-right:10px;"><?php echo "<a href='".$this->Html->url(array('action'=>'editUser/'.$userId, 'page'=>$page))."'>Edit</a>"; ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="head-border"></div>
			<div class="um_box_mid_content_mid" id="index">
				<?php   if (!empty($user)) { ?>
				<div class="row">
				<div class="col-sm-4 profile-pic">					
					<img class="img-thumbnail img-rounded" alt="<?php echo h($user['User']['first_name'].' '.$user['User']['last_name']); ?>" src="<?php echo $this->Image->resize(IMG_DIR, $user['UserDetail']['photo'], 200, null, true) ?>">
				</div>
				<div class="col-sm-8 profile-pic-border">
					<table cellspacing="0" cellpadding="0" width="100%" border="0" class="">
						<tbody>
							<tr>
								<td><strong><?php echo __('Role(s)');?></strong></td>
								<td><?php echo h($user['UserGroup']['name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('First Name');?></strong></td>
								<td><?php echo h($user['User']['first_name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Last Name');?></strong></td>
								<td><?php echo h($user['User']['last_name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Email');?></strong></td>
								<td><?php echo h($user['User']['email'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Gender');?></strong></td>
								<td><?php echo h(ucwords($user['UserDetail']['gender']))?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Marital Status');?></strong></td>
								<td><?php echo h(ucwords($user['UserDetail']['marital_status']))?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Birthday');?></strong></td>
								<td><?php if(!empty($user['UserDetail']['bday'])) { echo date('d-M-Y',strtotime($user['UserDetail']['bday'])); }?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Cellphone');?></strong></td>
								<td><?php echo h($user['UserDetail']['cellphone'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Location');?></strong></td>
								<td><?php echo h($user['UserDetail']['location'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Web Page');?></strong></td>
								<td><?php echo h($user['UserDetail']['web_page'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Status');?></strong></td>
								<td><?php
										if ($user['User']['active']) {
											echo 'Active';
										} else {
											echo 'Inactive';
										}
									?>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo __('By Admin');?></strong></td>
								<td><?php
										if ($user['User']['by_admin']) {
											echo 'Yes';
										} else {
											echo 'No';
										}
									?>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo __('Email Verified');?></strong></td>
								<td><?php
										if ($user['User']['email_verified']) {
											echo 'Yes';
										} else {
											echo 'No';
										}
									?>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo __('Joined');?></strong></td>
								<td><?php echo date(DATE_FORMAT_FOR_VIEW_PHP,strtotime($user['User']['created']))?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Last Login');?></strong></td>
								<td><?php if(!empty($user['User']['last_login'])) { echo date(DATE_FORMAT_FOR_VIEW_PHP,strtotime($user['User']['last_login'])); }?></td>
							</tr>
					</tbody>
				</table>
				</div>
				</div>
				<div style="clear:both"></div>
				<?php   } ?>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	<div class="um_box_down"></div>
</div>