<header class="navbar navbar-static-top navbar-default navbar-fixed-top" id="top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo SITE_URL;?>companies">
          <img alt="StoreMore" src="<?php echo SITE_URL.'img/logo.png'; ?>">
      </a>
    </div>
    <?php //include('schedule.ctp');?> 
    
    <nav class="collapse navbar-collapse bs-navbar-collapse">      
      <ul class="nav navbar-nav navbar-right">
               <li>                 
				<a id="drop3" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="true">
                Hello <?php echo $userName; ?>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu my-accountTab" role="menu" aria-labelledby="drop3">             
                <div class="col-sm-5 leftTabs">                
                    <ul>
                        <li>
                            <?php 
                                echo $this->Html->link(__("Sign Out",true),"/logout", 
                                        array("class" => "sign_out btn")
                                    );
                            ?>
                        </li>
                        <li>
                            <a class="js-form-directions-modal" href="" data-toggle="modal" data-target="#myModalContact">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
                    <div class="col-sm-7 rightTabs">
                        <ul>
                            
                            <li><?php echo $this->html->link('My Profile', array('plugin'=>'usermgmt', 'controller'=>'users', 'action'=>'dashboard')); ?></li>
                            
                        </ul>
                    </div>            
              </ul>
            </li>
             <li>
                  
                 
           
            </li>
      </ul>
    </nav>
  </div>
</header>
<!-- <div class="header-topSpace">&nbsp;</div> -->
<style>
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
   background-color: #3d4094 !important;
   color: #fff !important;
}
.navbar-nav > li:first-child a {
    background-image: none;
    border-radius: 2px;
    margin-right: 0;
    padding-left: 30px;
    padding-right: 20px;
}
 </style>
 
  <script>	
		$(window).scroll(function() {
          var scroll = $(window).scrollTop();
			if (scroll >= 20) {
				$(".navbar").addClass("Navsml");
			}
			else if (scroll >= 00) {
				$(".navbar").removeClass("Navsml");
			}
		$(document).ready(function(){		
			   console.log('resize called');
			   var width = $(window).width();
			   if(width >= 100 && width <= 767){			
				   $('.navbar').removeClass('Navsml');					   			 
			   }
			}).resize();	
	});
 </script>