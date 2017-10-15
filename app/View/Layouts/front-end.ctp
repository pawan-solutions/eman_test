<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta charset="UTF-8">
	<meta name="description" content="" />
    <meta name="keywords" content="" />
    
	 <link rel="shortcut icon" href="<?php echo SITE_URL; ?>img/favicon.png" />
    <title><?php echo SITE_NAME ." | ". $this->fetch('title'); ?></title>
    <?php
        echo $this->Html->meta('icon');
    	echo $this->Html->css(array('common.css?ver=1.0.1', 'menu.css?ver=1.0.1', 'bootstrap.min', 'style.css?ver=1.0.5', 'Review.star-rating.min', 'Review.rpstyle', 'jquery-ui'), array( 'media'=>"all" ));
        echo $this->Html->script(array("jquery-1.10.2", "jquery-ui", "Review.star-rating.min", 'common.js?ver=1.0.4',
                                       "fn_callback", "functions.js?ver=1.0.4", "bootstrap.min"));
        echo $this->fetch('meta');
        echo $this->fetch('css');
	echo $this->fetch('script');
    ?>
	<script>
		var JS_BASE_URL = '<?php echo SITE_URL; ?>';
        $( document ).ajaxStop(function() {
            $("#window_progress").hide();
        });
	</script>
    <?php //echo $this->element("gaq"); ?>
    <?php echo $this->Html->meta('favicon');?>
</head>
<body>
    
    <?php echo $this->element ("login_register");?>
	<div id="window_progress" class="ajax-loader" style="align:center">Working ...</div>
	<div class="container">

		<div class="row">

			<?php
            if($this->UserAuth->isLogged () && $this->UserAuth->getGroupId () == DEFAULT_GROUP_ID) { 
                 echo $this->element('user_header');
            } else {
                 echo $this->element('header');
            }
             ?>
		</div>
	</div>
	<?php //echo $this->request->params['controller']; 
    /*  -- Commented by mangesh to remove box shadow on 24May2015
		if(!(($this->request->params['controller'] == "pages" && $this->request->params['action'] == "index")|| ($this->request->params['controller'] == "storage_spaces" && $this->request->params['action'] == "search"))){ ?>
		<div class="box-shadow">&nbsp;</div>
	<?php } */?>
	<section id="content" class="<?php if($this->request->params['action'] == "marketing"){ echo 'greyBg'; } ?>"><?php echo $this->fetch('content'); ?></section>
    <div class="toggle-footer-btn" id='hideshow1' style="cursor:pointer"></div>
    
	<div id='footer_hide'><?php echo $this->element('footer');?></div>
    <script type="text/javascript">
    $(document).ready(function(){
    // $('#hideshow1').click(function(event) { 
    //      $('#footer_hide').toggle(1500);
    // });
    $('.toggle-footer-btn').click(function() {
        $(this).html($(this).html() == '+' ? '-' : '+');
        $('#footer_hide').slideToggle(400);
        return false;
    });
});
</script>
</body>
</html>
