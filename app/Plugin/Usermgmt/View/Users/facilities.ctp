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
				<span class="umstyle1"><?php echo __('All facilities'); ?></span>
				<span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="head-border"></div>
			<div class="um_box_mid_content_mid" id="index">
				<div id="updateGroupIndex">
<?php } ?>
					<?php //echo $this->Search->searchForm('User', array('legend' => 'Search', "updateDivId" => "updateGroupIndex")); ?>
					<?php //echo $this->element('paginator', array("useAjax" => true, "updateDivId" => "updateGroupIndex")); ?>
					<div class="tableContainer">
						<table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
							<thead>
								<tr>
									<th><?php echo __('Id');?></th>
									<th><?php echo __('First Name');?></th>
									<th><?php echo __('Last Name');?></th>
									<th><?php echo __('email');?></th>
									<th><?php echo __('Phone');?></th>
									<th><?php echo __('Created');?></th>
									<th><?php echo __('Action');?></th>
								</tr>
							</thead>
							<tbody>
						<?php   if(!empty($Facility)) {
									$page = $this->request->params['paging']['Facility']['page'];
									$limit = $this->request->params['paging']['Facility']['limit'];
									$i=($page-1) * $limit;
									foreach ($Facility as $row) {
										echo "<tr>";
										echo "<td>".$row['Facility']['id']."</td>";
										echo "<td>".h($row['Facility']['first_name'])."</td>";
										echo "<td>".h($row['Facility']['last_name'])."</td>";
										echo "<td>".h($row['Facility']['email'])."</td>";
										echo "<td>".h($row['Facility']['phone'])."</td>";
										echo "<td>".date(DATE_FORMAT_FOR_VIEW_PHP, strtotime($row['Facility']['created']))."</td>";
										echo "<td>";
                                            echo "<a href='".$this->Html->url('/facilities/view/'.$row['Facility']['id'].'/page:'.$page)."'><img src='".SITE_URL."usermgmt/img/view.png' border='0' alt='View' title='View' style='margin-right:5px;'></a>";
                                            echo $this->Form->postLink($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'delete_facility', $row['Facility']['id']), array('escape' => false, 'confirm' => __('Are you sure you want to delete this facility?')));
										echo "</td>";
										echo "</tr>";
									}
								} else {
									echo "<tr><td colspan=6><br/><br/>No Data</td></tr>";
								} ?>
							</tbody>
						</table>
					</div>
					<?php if(!empty($Facility)) { echo $this->element('pagination', array("totolText" => "Number of Roles")); } ?>
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
