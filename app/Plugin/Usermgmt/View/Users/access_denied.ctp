<?php

?>
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
				<span class="umstyle1"><?php echo __('Access Denied'); ?></span>
				<span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home",true),"/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="head-border"></div>
			<div class="um_box_mid_content_mid">
				Sorry, You don't have permission to view that page. go to <span  class="umstyle6"><?php echo $this->Html->link(__("Dashboard",true),"/dashboard") ?></span><br/><br/>
				<br/><br/>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	<div class="um_box_down"></div>
</div>