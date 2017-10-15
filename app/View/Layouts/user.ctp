<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta charset="UTF-8">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="noindex">
        <link rel="shortcut icon" href="<?php echo SITE_URL; ?>img/favicon.png" />
        <title><?php echo SITE_NAME . " | " . $this->fetch('title'); ?></title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array('common.css?ver=1.0.2', 'menu.css?ver=1.0.1', 'bootstrap.min', 'style.css?ver=1.0.5', 'Review.star-rating.min', 'Review.rpstyle', 'jquery-ui', 'my_account.css?ver=1.0.1'), array('media' => "all"));
        echo $this->Html->script(array("jquery-1.10.2", "jquery-ui", "Review.star-rating.min", 'Review.common', 'common.js?ver=1.0.4', "fn_callback", "functions.js?ver=1.0.4", "bootstrap.min", "my_account_menu"));
        echo $this->Html->css(array("Review.rpstyle", "Usermgmt.umstyle"), array('media' => "all"));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <script>
            var JS_BASE_URL = '<?php echo SITE_URL; ?>';
            $(window).bind('popstate', function () {
                $.ajax({url: location.pathname, success: function (data) {

                    }});
            });
            $.ajaxSetup({cache: false});
            $( document ).ajaxStop(function() {
                $("#window_progress").hide();
            });
        </script>
        <?php //echo $this->element("gaq"); ?>
        <?php echo $this->Html->meta('favicon'); ?>
        <style type="text/css">
                    #datetimepicker12 .disabled {
                      display: block !important;
                    }
                   </style>
                   <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
                <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
      <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js">
      </script>
    </head>
    <body class="greyBg">
        <div id="window_progress" class="ajax-loader" style="align:center">Working ...</div>
        <?php echo $this->element('user_header'); ?>
        
        <?php echo $this->element('search_storage'); ?>
        <div class="container">
            <div class="myAccountBottomMargin">
				<?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
				<div class="clear"></div>
             </div>
			 <div class="clear"></div>
        </div>
        <?php echo $this->element('footer'); ?>
    </body>
</html>
