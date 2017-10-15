<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta charset="UTF-8">
<meta name="description" content="" />
<meta name="keywords" content="" />
        <!-- for Facebook -->          
<meta property="og:title" content="Emandoobi" />
<meta property="og:type" content="article" />
<meta property="og:image" content="http://www.emandoobi.com/img/mascot.png" />
<meta property="og:url" content="http://emandoobi.com" />
<meta property="og:description" content="Its visa process tracking system, where it will simplify the visa process within the specific selected option hence it will guide the user, HR, GR, Management and employee. Whereby they will know the status of the visa and what is required from each of them on each step" />


<title><?php echo SITE_NAME . " | " . $this->fetch('title'); ?></title>
   

<?php 
echo $this->Html->css(array('frontend/customestyle','frontend/bootstrap.min','frontend/font-awesome.min','frontend/styles'), array('media' => "all"));

echo $this->Html->script(array("jquery-1.10.2", "formAjaxValidation"));

    ?>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600' rel='stylesheet' type='text/css'>

<style type="text/css">
    .fieldRequired{
        border: 2px solid #f58733 !important;
        box-shadow: 0 0 5px #f58733 !important;
    }
    #login_error{
        color: #f58733 !important;
    }
</style>

</head>

<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-5">
                <div class="logo">
                    <?php 
                    
                    if(!empty($_SESSION['UserAuth']['User']))
                    {
                        if($_SESSION['UserAuth']['User']['user_group_id']==1)
                        {
                            $redirect = 'dashboard';
                        }else{
                            $redirect = 'companies';
                        }
                    }else{
                        $redirect = '';
                    }

                    ?>
                    <a href="<?php echo SITE_URL.$redirect;?>">
                    <img src="<?php echo SITE_URL.'img/logo.png'; ?>" alt="Emandoobi"/>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-7">
                <ul class="navigation">
                    <li><a href="<?php echo SITE_URL;?>">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Supports</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<?php echo $this->fetch('content'); ?>

</body>
</html>