<?php
?>
<?php if(!$this->request->isAjax) { ?>
<?php echo $this->Html->script(array('/usermgmt/js/jquery-1.7.2.min','/usermgmt/js/um.autocomplete')); ?>
<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Online Users'); ?></span>
				<span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid" id="index">
				<div id="updateOnlineIndex">
<?php } ?>
					<?php echo $this->Search->searchForm('User', array('legend' => 'Search', "updateDivId" => "updateOnlineIndex")); ?>
					<?php echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateOnlineIndex")); ?>
					<div class="tableContainer">
						<table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
							<thead>
								<tr>
									<th><?php echo __('SL');?></th>
									<th><?php echo __('Name');?></th>
									<th><?php echo __('Email');?></th>
									<th><?php echo __('Last URL');?></th>
									<th><?php echo __('Browser');?></th>
									<th><?php echo __('Ip Address');?></th>
									<th><?php echo __('Last Action');?></th>
									<th style="width:55px;"><?php echo __('Action');?></th>
								</tr>
							</thead>
							<tbody>
					<?php       if (!empty($users)) {
									$page = $this->request->params['paging']['UserActivity']['page'];
									$limit = $this->request->params['paging']['UserActivity']['limit'];
									$i=($page-1) * $limit;
									foreach ($users as $row) {
										$i++;
										echo "<tr>";
										echo "<td>".$i."</td>";
										echo "<td>";
										echo ($row['UserActivity']['user_id'] ==null) ? 'Guest' : (h($row['User']['first_name'])." ".h($row['User']['last_name']));
										echo "</td>";
										echo "<td>".h($row['User']['email'])."</td>";
										echo "<td>".h($row['UserActivity']['last_url'])."</td>";
										echo "<td>".h($row['UserActivity']['user_browser'])."</td>";
										echo "<td>".h($row['UserActivity']['ip_address'])."</td>";
										echo "<td>".distanceOfTimeInWords(strtotime($row['UserActivity']['modified']))."</td>";
										echo "<td>";
										if (!empty($row['UserActivity']['user_id']) && $row['UserActivity']['user_id']!=1) {
											echo "<span class='icon'>".$this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/signout.jpg', array("alt" => __('Sign Out'), "title" => __('Sign Out'))), array('action' => 'logoutUser', $row['UserActivity']['user_id']), array('escape' => false, 'confirm' => __('Are you sure you want to sign out this user?')))."</span>";
											echo "<span class='icon'>".$this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/dis-approve.png', array("alt" => __('Make Inactive'), "title" => __('Make Inactive'))), array('action' => 'makeInactive', $row['UserActivity']['user_id']), array('escape' => false, 'confirm' => __('This user will signout and will not be able to login again')))."</span>";
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
					<?php if(!empty($users)) { echo $this->element('pagination', array("totolText" => "Number of Online Users")); } ?>
<?php if(!$this->request->isAjax) { ?>
				</div>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>
<?php } ?>