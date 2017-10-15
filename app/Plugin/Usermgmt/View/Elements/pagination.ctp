<?php
if(!isset($totolText)) {
	$totolText="Total Records";
}
?>
<div id="pgBox">
	<div id="pg">
		<div class="box-with-border" style="display: inline-block;"><?php echo $this->Paginator->counter(array('format' => $totolText.' %count%'));  ?></div>
		<div class="box-without-border" style="display: inline-block;"><?php echo $this->Paginator->first('First', null, null, array('class' => 'disabled')); ?></div>
		<div class="box-without-border" style="display: inline-block;"><?php echo $this->Paginator->prev('Previous', null, null, array('class' => 'disabled')); ?></div>
		<div class="box-without-border pages" style="display: inline-block; margin-left:5px"><?php echo $this->Paginator->numbers(array('separator'=>'')); ?></div>
		<div class="box-without-border" style="display: inline-block;"><?php echo $this->Paginator->next('Next', null, null,array('class' => 'disabled')); ?></div>
		<div class="box-without-border" style="display: inline-block;"><?php echo $this->Paginator->last('Last', null, null, array('class' => 'disabled')); ?></div>
		<div class="box-with-border" style="display: inline-block;"><?php echo $this->Paginator->counter(array('format' => 'Page %page% of %pages%'));  ?></div>
		<div style="display: inline-block;width:32px;"><?php echo $this->Html->image(SITE_URL.'usermgmt/img/loading.gif', array('id' => 'busy-indicator')); ?></div>
	</div>
</div>
<?php echo $this->Js->writeBuffer();  ?>