<div class="umtop">
<div class="container">
   <div class="row">
    <div class="col-md-12">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('Usermgmt.dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid radius-all col-md-6">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Facility Detail'); ?></span>
				<?php $page= (isset($this->request->params['named']['page'])) ? $this->request->params['named']['page'] : 1; ?>
				<span class="umstyle2" style="float:right"><?php echo "<a href='".$this->Html->url(array('controller'=>'users', 'action'=>'facilities', 'page'=>$page))."'>Back</a>"; ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="head-border"></div>
			<div class="um_box_mid_content_mid scroll_div" id="index">
				<?php   if (!empty($result)) { ?>			                    
					<table cellspacing="0" cellpadding="0" width="100%" border="0" class="umtable" style="min-width: 400px;">
						<tbody>
							<tr>
								<td><strong><?php echo __('First Name');?></strong></td>
								<td><?php echo h($result['Facility']['first_name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Last Name');?></strong></td>
								<td><?php echo h($result['Facility']['last_name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Email');?></strong></td>
								<td><?php echo h($result['Facility']['email'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Phone');?></strong></td>
								<td><?php echo h(ucwords($result['Facility']['phone']))?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Created');?></strong></td>
								<td><?php echo date(DATE_FORMAT_FOR_VIEW_PHP, strtotime($result['Facility']['created']))?></td>
							</tr>

							<tr>
								<td><strong><?php echo __('Message');?></strong></td>
								<td><?php echo !empty($result['Facility']['message']) ? nl2br($result['Facility']['message']) : '-';
								    ?></td>
							</tr>
                            <tr>
								<td><strong><?php echo __('Image(s)');?></strong></td>
								<td><?php empty($result['FacilityImage']) ? "No Images" : '';?></td>
							</tr>
					</tbody>
				</table>
                <div style="text-align:center;">
                    <?php if(!empty($result['FacilityImage'])) { ?>
                        <?php foreach($result['FacilityImage'] as $image) { ?>
                            <a href="<?php echo SITE_URL.'img'.DS.FACILITY_IMAGE.DS.$image['image'];?>" target="_blank">
                                <img class="img-thumbnail img-rounded" alt="<?php echo h($image['image']); ?>" src="<?php echo $this->Image->resize(FACILITY_IMAGE, $image['image'], 150, 150, false, true) ?>">
                            </a>
                        <?php } ?>
                    <?php } ?>
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