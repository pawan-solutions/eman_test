<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo SITE_NAME . " | " . $this->fetch('title'); ?></title>

    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array('new/bootstrap.min.css?ver=1.0', 'new/style.css?ver=3.3', 'new/font-awesome.min.css?ver=1.0', 'new/jquery-datepicker-ui'), array( 'media'=>"all" ));
        echo $this->Html->script(array("new/jquery", "new/bootstrap.min","new/jquery-datepicker-ui","bootstrap-filestyle"));
    ?>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" />
<script src="https://cdn.jsdelivr.net/g/lightgallery,lg-autoplay,lg-fullscreen,lg-hash,lg-pager,lg-share,lg-thumbnail,lg-video,lg-zoom"></script>

   
</head>

<body>
    <?php echo $this->element('header_menu'); ?>


<?php echo $this->fetch('content'); ?>



	<footer>
		<div class="container">
		<div class="row">
		<div class="col-lg-12">
			<p>Copyright &copy; Emandoobi 2016</p>
		</div>
		</div>
		</div>    
	</footer>

</body>

</html>
