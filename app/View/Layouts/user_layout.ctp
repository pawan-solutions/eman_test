<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME . " | " . $this->fetch('title'); ?></title>

<?php 
echo $this->Html->css(array('frontend/customestyle.css?ver=1.0','frontend/bootstrap.min','frontend/font-awesome.min','frontend/styles'), array('media' => "all"));
echo $this->Html->script(array("jquery-1.10.2", "formAjaxValidation"));
?>


</head>

<body>
<?php echo $this->element('header_menu'); ?>

<?php echo $this->fetch('content'); ?>
</body>
</html>