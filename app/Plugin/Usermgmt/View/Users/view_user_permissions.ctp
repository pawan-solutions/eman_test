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
				<span class="umstyle1"><?php echo __('Site Permissions for '); echo h($name);?></span>				
				<?php $page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1; ?>
				<span class="umstyle2" style="float:right"><?php echo "<a href='".$this->Html->url(array('action'=>'index', 'page'=>$page))."'>Back</a>"; ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="head-border"></div>
			<div class="um_box_mid_content_mid" id="index">
				<div id="updateOnlineIndex">
					<div class="tableContainer">
						<table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable colored">
							<thead>
								<tr>
									<th><?php echo __('SL');?></th>
									<th><?php echo __('Controller');?></th>
									<th><?php echo __('Action');?></th>
									<th><?php echo __('Role(s)');?></th>
									<th><?php echo __('Operation');?></th>
								</tr>
							</thead>
							<tbody>
					<?php       if (!empty($permissions)) {
									$i=0;
									foreach ($permissions as $row) {
										$i++;
										echo "<tr>";
										echo "<td>".$i."</td>";
										echo "<td>".$row['controller']."</td>";
										echo "<td>".$row['action']."</td>";
										echo "<td>".$row['group']."</td>";
										echo "<td class='action'>";
											echo "<a href='".$this->Html->url('/permissions/?c='.$row['index'])."'><img src='".SITE_URL."usermgmt/img/edit.png' border='0' alt='Change' title='Change'></a>";
										echo "</td>";
										echo "</tr>";
									}
								} else {
									echo "<tr><td colspan=4><br/><br/>No Data</td></tr>";
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
		</div>
		</div>
	<div class="um_box_down"></div>
</div>