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
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('All Roles'); ?></span>
				<span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Add Role",true), array('plugin'=>'usermgmt', 'controller'=>'userGroups', 'action'=>'addGroup')) ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="head-border"></div>
			<div class="um_box_mid_content_mid" id="index">
				<div id="updateGroupIndex">
<?php } ?>
					<?php echo $this->Search->searchForm('User', array('legend' => 'Search', "updateDivId" => "updateGroupIndex")); ?>
					<?php echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateGroupIndex")); ?>
					<div class="tableContainer">
						<table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
							<thead>
								<tr>
									<th><?php echo __('Role Id');?></th>
									<th><?php echo __('Role For');?></th>
									<th><?php echo __('Name');?></th>
									<th><?php echo __('Alias Name');?></th>
									<th><?php echo __('Allow Registration');?></th>
									<th><?php echo __('Created');?></th>
									<th><?php echo __('Action');?></th>
								</tr>
							</thead>
							<tbody>
						<?php   if(!empty($userGroups)) {
									$page = $this->request->params['paging']['UserGroup']['page'];
									$limit = $this->request->params['paging']['UserGroup']['limit'];
									$i=($page-1) * $limit;
									$role_for = unserialize(ROLE_FOR);

									foreach ($userGroups as $row) {
										$role_for_txt = $role_for[$row['UserGroup']['role_for']];
										echo "<tr>";
										echo "<td>".$row['UserGroup']['id']."</td>";
										echo "<td>".h($role_for_txt)."</td>";
										echo "<td>".h($row['UserGroup']['name'])."</td>";
										echo "<td>".h($row['UserGroup']['alias_name'])."</td>";
										echo "<td>";
										if ($row['UserGroup']['allowRegistration']) {
											echo "Yes";
										} else {
											echo "No";
										}
										echo"</td>";
										echo "<td>".date(DATE_FORMAT_FOR_VIEW_PHP,strtotime($row['UserGroup']['created']))."</td>";
										echo "<td>";
											echo "<span class='icon'><a href='".$this->Html->url('/editGroup/'.$row['UserGroup']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Edit' title='Edit'></a></span>";
											if ($row['UserGroup']['id']!=1) {
												echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteGroup', $row['UserGroup']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this role? Delete it your own risk')));
											}
										echo "</td>";
										echo "</tr>";
									}
								} else {
									echo "<tr><td colspan=6><br/><br/>No Data</td></tr>";
								} ?>
							</tbody>
						</table>
					</div>
					<?php if(!empty($userGroups)) { echo $this->element('pagination', array("totolText" => "Number of Roles")); } ?>
<?php if(!$this->request->isAjax) { ?>
				</div>
			</div>
	</div>
	</div>
   </div>
  </div>
	<div class="um_box_down"></div>
</div>
<?php } ?>