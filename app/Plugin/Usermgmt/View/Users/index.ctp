<?php
?>
<?php if(!$this->request->isAjax) { ?>
<?php echo $this->Html->script(array('/usermgmt/js/jquery-1.7.2.min','/usermgmt/js/um.autocomplete')); ?>
<div class="umtop">
 <div class="container">
   <div class="row">
    <div class="col-md-12">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid radius-all">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('All Users'); ?></span>
				<span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Add User",true), array('plugin'=>'usermgmt', 'controller'=>'users', 'action'=>'addUser')) ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="head-border"></div>
			<div class="um_box_mid_content_mid" id="index">
				<div id="updateUserIndex">
<?php } ?>
					<?php echo $this->Search->searchForm('User', array('legend' => 'Search', "updateDivId" => "updateUserIndex")); ?>
					<?php echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateUserIndex")); ?>
					<div class="tableContainer">
						<table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
							<thead>
								<tr>
									<th><?php echo __('SL');?></th>
									<th><?php echo $this->Paginator->sort('User.id', __('User Id')); ?></th>
									<th><?php echo $this->Paginator->sort('User.first_name', __('Name')); ?></th>
									<th><?php echo $this->Paginator->sort('User.email', __('Email')); ?></th>
									<!-- <th><?php echo __('Roles(s)');?></th> -->
									<th><?php echo $this->Paginator->sort('User.email_verified', __('Email Verified')); ?></th>
									<th><?php echo $this->Paginator->sort('User.active', __('Status')); ?></th>
									<th><?php echo $this->Paginator->sort('User.created', __('Created')); ?></th>
									<th>Companies</th>
									<th>Sub Users</th>
									<th>Applications</th>
									<th style="width:185px;"><?php echo __('Action');?></th>
								</tr>
							</thead>
							<tbody>
					<?php       if (!empty($users)) {
									$page = $this->request->params['paging']['User']['page'];
									$limit = $this->request->params['paging']['User']['limit'];
									$i=($page-1) * $limit;
									foreach ($users as $row) {
										$i++;
										echo "<tr id='rowId".$row['User']['id']."'>";
										echo "<td>".$i."</td>";
										echo "<td>".$row['User']['id']."</td>";
										echo "<td>".h($row['User']['first_name'])." ".h($row['User']['last_name'])."</td>";
										echo "<td>".h($row['User']['email'])."</td>";
										//echo "<td>".h($row['UserGroup']['name'])."</td>";
										echo "<td id='emailVerified".$row['User']['id']."'>";
										if ($row['User']['email_verified']==1) {
											echo "Yes";
										} else {
											echo "No";
										}
										echo"</td>";
										echo "<td id='activeInactive".$row['User']['id']."'>";
										if ($row['User']['active']==1) {
											echo "Active";
										} else {
											echo "Inactive";
										}
										echo"</td>";
										echo "<td>".date(DATE_FORMAT_FOR_VIEW_PHP, strtotime($row['User']['created']))."</td>";

										echo "<td><a target='_blank' href='".$this->Html->url('/companies/all/'.$row['User']['id'])."'><img src='".SITE_URL."usermgmt/img/view.png' border='0' alt='View' title='Click to view company list'></a></td>";
											
										echo "<td><a target='_blank' href='".$this->Html->url('/subUser/'.$row['User']['id'])."'><img src='".SITE_URL."usermgmt/img/view.png' border='0' alt='View' title='Click to view sub user list'></a></td>";
										
										echo "<td><a target='_blank' href='".$this->Html->url('/applications/lists/'.$row['User']['id'])."'><img src='".SITE_URL."usermgmt/img/view.png' border='0' alt='View' title='click to view application list'></a></td>";



										echo "<td class='action'>";
											echo "<a href='".$this->Html->url('/viewUser/'.$row['User']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/view.png' border='0' alt='View' title='View'></a>";
											echo "<a href='".$this->Html->url('/editUser/'.$row['User']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a>";
											echo "<a href='".$this->Html->url('/changeUserPassword/'.$row['User']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/password.png' border='0' alt='Change Password' title='Change Password'></a>";
                                            if($this->UserAuth->isAdmin()){
                                                if ($row['User']['id']!=1 && $row['User']['username']!='Admin') {
                                                    echo "<div style='display:inline' id='makeActiveInactiveId".$row['User']['id']."'>";
                                                    if ($row['User']['active']==0) {
                                                        echo $this->Js->link($this->Html->image(SITE_URL.'img/Delete-icon.png', array("alt" => __('Make Active'), "title" => __('Click to activate'))), array('action' => 'makeActiveInactive', $row['User']['id'], 1), array('update' => '#makeActiveInactiveId'.$row['User']['id'], 'escape' => false, 'confirm' => __('Are you sure you want to activate this user?')));
                                                    } else {
                                                        echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/approve.png', array("alt" => __('Make Inactive'), "title"  => __('Click to Delete'))), array('action' => 'makeActiveInactive', $row['User']['id'], 0), array('update' => '#makeActiveInactiveId'.$row['User']['id'], 'escape' => false, 'confirm' => __('Are you sure you deactivate this user?')));
                                                    }
                                                    echo "</div>";
                                                }
                                            }
                                            if ($row['User']['id']!=1 && $row['User']['username']!='Admin') {
												if ($row['User']['email_verified']==0) {
													echo "<div style='display:inline' id='doEmailVerifyId".$row['User']['id']."'>";
													echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/email-verify.png', array("alt" => __('Verify Email'), "title" => __('Verify Email'))), array('action' => 'verifyEmail', $row['User']['id']), array('update' => '#doEmailVerifyId'.$row['User']['id'], 'escape' => false, 'confirm' => __('Are you sure you want to verify email of this user?')));
													echo "</div>";
												}
											}
											
										echo "</td>";
										echo "</tr>";
									}
								} else {
									echo "<tr><td colspan=10><br/><br/>No Data</td></tr>";
								} ?>
							</tbody>
						</table>
					</div>
					<?php if(!empty($users)) { echo $this->element('pagination', array("totolText" => "Number of Users")); } ?>
<?php if(!$this->request->isAjax) { ?>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	<div class="um_box_down"></div>
</div>
<?php } ?>