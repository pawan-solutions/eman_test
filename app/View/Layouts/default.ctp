<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta charset="UTF-8">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!-- for Facebook -->          
<meta property="og:title" content="Emandoobi" />
<meta property="og:type" content="article" />
<meta property="og:image" content="" />
<meta property="og:url" content="" />
<meta property="og:description" content="Its visa process tracking system, where it will simplify the visa process within the specific selected option hence it will guide the user, HR, GR, Management and employee. Whereby they will know the status of the visa and what is required from each of them on each step" />
<!-- for Facebook ends--> 
        <link rel="shortcut icon" href="<?php echo SITE_URL; ?>img/favicon.png" />
        <title><?php echo SITE_NAME . " | " . $this->fetch('title'); ?></title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array('common', 'menu', 'bootstrap.min', 'style'), array('media' => "all"));
        echo $this->Html->script(array("jquery-1.10.2", "jquery-ui", "Review.star-rating.min", 'Review.common', 'common', "fn_callback", "functions", "bootstrap.min"));
        echo $this->Html->css(array( "Usermgmt.umstyle"), array('media' => "all"));
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
    <body>
        <?php //echo $this->element("login_register"); ?>
        <div id="window_progress" class="ajax-loader" style="align:center">Working ...</div>
           <?php
           //added by pawan to show login signup button
            if($this->UserAuth->isLogged () && $this->UserAuth->getGroupId () == DEFAULT_GROUP_ID) { 
                 echo $this->element('user_header');
            } else {
                 echo $this->element('header');
            }
             ?>
      <div> 	
    
       
        <section id="content" class="<?php
        if ($this->request->params['action'] == "marketing") {
            echo 'greyBg';
        }
        ?>"><?php echo $this->fetch('content'); ?></section>
<?php if ($this->request->params['action'] == "search") { ?>
            <style>
                html{overflow-y:hidden;}
                @media screen and (max-width: 767px) {
                    html{overflow-y: inherit !important;}
                }
            </style>
            <?php
        } else if (
            $this->request->params['controller'] == "storage_spaces" && $this->request->params['action'] == "view" ||
            $this->request->params['controller'] == "contents" && $this->request->params['action'] == "getContentByUrl" ||
            $this->request->params['controller'] == "users" && $this->request->params['action'] == "register" ||
            $this->request->params['controller'] == "users" && $this->request->params['action'] == "forgotPassword" ||
            $this->request->params['controller'] == "pages" && $this->request->params['action'] == "display" ||
            (!$this->UserAuth->isAdmin()) ||
            $this->request->params['controller'] == "users" 
            && $this->request->params['action'] == "login" 
            && (!isset($this->request->params['pass'][2]) || $this->request->params['pass'][2] != ADMIN_LOGIN_STRING)
        ) {
            //echo $this->element('footer');
        } else {
            //echo $this->element('admin_footer');
        }
        ?>
    </body>
</html>
