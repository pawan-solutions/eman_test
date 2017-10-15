<?php
if($funcName=="makeActiveInactive") {
	$updateText="";
	if($result==1) {
		echo $this->Js->link($this->Html->image(SITE_URL.'img/Delete-icon.png', array("alt" => __('Make Active'), "title" => __('Click to Undelete'))), array('action' => 'makeActiveInactive', $userId, 1), array('update' => '#makeActiveInactiveId'.$userId, 'escape' => false, 'confirm' => __('Are you sure you want to undelete this user?')));
		$updateText=__('Inctive', true);
	} else if($result==0) {
		echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/approve.png', array("alt" => __('Make Inactive'), "title" => __('Click to Delete'))), array('action' => 'makeActiveInactive', $userId, 0), array('update' => '#makeActiveInactiveId'.$userId, 'escape' => false, 'confirm' => __('Are you sure you want to delete this user?')));
		$updateText=__('Active', true);
	}
?><script language="JavaScript">
	if('<?php echo $updateText ?>') {
		$('#activeInactive<?php echo $userId ?>').html('<?php echo $updateText ?>');
	}
	//alert('<?php echo $updateMsg ?>');
</script><?php
} else if($funcName=="deleteUser") {
	if($result==1) { ?>
		<script language="JavaScript">
			$('#rowId<?php echo $userId ?>').remove();
		</script>
<?php } else {
		echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/delete.png', array("alt" => __('Delete'), "title" => __('Delete'))), array('action' => 'deleteUser', $userId), array('update' => '#doDeleteId'.$userId, 'escape' => false, 'confirm' => __('Are you sure you want to delete this user?')));
	}
?><script language="JavaScript">
	alert('<?php echo $updateMsg ?>');
</script><?php
} else if($funcName=="verifyEmail") {
	$updateText="";
	if($result==1) {
		$updateText=__('Yes', true);
?>      <script language="JavaScript">
			$('#doEmailVerifyId<?php echo $userId ?>').remove();
		</script>
<?php } else {
		echo $this->Js->link($this->Html->image(SITE_URL.'usermgmt/img/email-verify.png', array("alt" => __('Verify Email'), "title" => __('Verify Email'))), array('action' => 'verifyEmail', $userId), array('update' => '#doEmailVerifyId'.$userId, 'escape' => false, 'confirm' => __('Are you sure you want to verify email of this user?')));
		$updateText=__('No', true);
	}
?><script language="JavaScript">
	if('<?php echo $updateText ?>') {
		$('#emailVerified<?php echo $userId ?>').html('<?php echo $updateText ?>');
	}
	alert('<?php echo $updateMsg ?>');
</script><?php
}
echo $this->Js->writeBuffer();