<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta charset="UTF-8">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
         <!-- for Facebook -->          
<meta property="og:title" content="StoreMore" />
<meta property="og:type" content="article" />
<meta property="og:image" content="http://www.storemore.in/img/mascot.png" />
<meta property="og:url" content="http://storemore.in" />
<meta property="og:description" content="No wasting time looking for warehouses. No dealing with transporters and labour. No security deposits and lock-in periods. We’re here to make storage easy for you. Look for multiple options on a single platform. Book the space you like. And then store your goods for as long – or as short a time – as you need. Use the online inventory to get your goods back whenever you need them. All from the comfort of your home—or, office" />
<!-- for Facebook ends--> 
        
        <link rel="shortcut icon" href="<?php echo SITE_URL; ?>img/favicon.png" />
        <title><?php echo SITE_NAME . " | " . $this->fetch('title'); ?></title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array('common', 'menu', 'bootstrap.min', 'style.css?ver=1.0.5', 'Review.star-rating.min', 'Review.rpstyle', 'jquery-ui'), array('media' => "all"));
        echo $this->Html->script(array("jquery-1.10.2", "jquery-ui", "Review.star-rating.min", 'Review.common', 'common.js?ver=1.0.4',"fn_callback", "functions.js?ver=1.0.4", "bootstrap.min"));
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
    </head>
    <body>
        <?php echo $this->element("login_register"); ?>
        <div id="window_progress" class="ajax-loader" style="align:center">Working ...</div>
      <div>
          
       <?php
       if($this->UserAuth->isLogged () && $this->UserAuth->getGroupId () == DEFAULT_GROUP_ID) { 
            echo $this->element('user_header');
       } else {
            echo $this->element('header');
       }
        ?>      

        <?php 
        $url = $this->request->params['controller'] ."/".$this->request->params['action'];
        // Shadow Box will not show on these pages
        /*
              -- Commented by mangesh to remove box shadow on 24May2015
        if (!(in_array($url, array("pages/index", "storage_spaces/search")))) { ?>
            <div class="box-shadow">&nbsp;</div>
        <?php } */?>
        <section id="content" class="<?php
        if ($this->request->params['action'] == "marketing") {
            echo 'greyBg';
        }
        ?>"><?php echo $this->fetch('content'); ?></section>
        <?php 
        if ($this->request->params['action'] == "search") {?>
		<div class="fixedFooter"> 
            <?php echo $this->element('admin_footer');   ?>
		</div>	
       <?php } else {
            echo $this->element('footer');
        }
       ?>
    </body>
</html>
