<?php 
$userGroup = $this->Session->read('UserAuth.UserGroup.Name');
$urlController = $this->params['controller'];
$notification_count = $this->Custom->unread_notification_count($userGroup);
?>

<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="top-most">      
        <!-- Page Heading/Breadcrumbs -->
        <div class="container">
    
        </div>
    </div>
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
              <a class="navbar-brand" href="<?php echo SITE_URL?>"><img src="<?php echo SITE_URL.'img/logo.png'; ?>" class="logo-main" alt="Logo" /></a>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li > <a href="<?php echo SITE_URL.'companies';?>"><i class="fa fa-home"></i> <span>Companies</span></a> </li>
                    <li > <a href="#"><i class="fa fa-calendar"></i> <span>Calendar</span></a> </li>
                    <li > <a href="<?php echo SITE_URL.'applications/everything';?>"><i class="fa fa-file"></i> <span>Everything</span></a> </li>
                    <li > <a href="<?php echo SITE_URL.'reports/progress';?>">
                    <i class="fa fa-file"></i> <span>Progress</span></a> </li>
                    <li class="inactive"> <a href="<?php echo SITE_URL.'UserActivity/me';?>"><i class="fa fa-user"></i> <span>Me</span></a> </li>
                    <li> <a href="<?php echo SITE_URL.'UserActivity/everyone';?>"><i class="fa fa-users"></i> <span>Everyone</span></a> </li>
                     
                </ul>

            </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
            <div  class="sdqw">
               <ul class="login-top">
               <li>
                    <a href="<?php echo SITE_URL.'UserActivity/notifications'; ?>">
                    <i class="fa fa-bell"></i>
                    <span class="badge"><?php echo $notification_count;?></span></a>
                </li>
                <li><a href="#">New</a></li>

                 <!-- <li><a href="#">New Features</a> </li>-->
                 
                 <li><a href="#">Account</a> </li>
                 <li><a href="<?php echo SITE_URL.'subscriptions/upgrade';?>">Upgrades</a> </li> 
                 <li><a href="<?php echo SITE_URL.'logout'; ?>">Sign out</a> </li>                  
               </ul> 
            </div>
            <div class="serch-top">
                   <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Jump to a company, person lable, or search ..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                </div>
            </div>
          </div>    
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>




<!-- 

<header>
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-2">
                <div class="logo">
                    <a href="<?php echo SITE_URL?>companies"><img src="<?php echo SITE_URL.'img/logo.png'; ?>" alt="logo"/></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <ul class="navigation2">
                    <li><a href="<?php echo SITE_URL.'companies';?>" class="<?php echo ($urlController=='companies')?'active': ''; ?>">Companies</a></li>
                    <li><a href="#">Calendar</a></li>
                    <li><a href="<?php echo SITE_URL.'applications/everything';?>" class="<?php echo ($urlController=='applications')?'active': ''; ?>">Everything</a></li>
                    <li><a href="#">Progress</a></li>
                    <li><a href="#">Me</a></li>
                    <li><a href="<?php echo SITE_URL.'everyone';?>" class="<?php echo ($urlController=='users')?'active': ''; ?>">Everyone</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4">
            <ul class="rightNav">
            <li><a href="#"><i class="fa fa-bell"></i> <span class="badge">0</span></a></li>
            <li><a href="#">New Features</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Upgrades</a></li>
            <li><a href="<?php echo SITE_URL.'logout'; ?>">Sign out</a></li>
            </ul>
<div class="input-group stylish-input-group">
    <input type="text" class="form-control"  placeholder="Search" >
    <span class="input-group-addon">
        <button type="submit">
            <span class="fa fa-search"></span>
        </button>  
    </span>
</div>
            </div>
        </div>
    </div>
</header> -->