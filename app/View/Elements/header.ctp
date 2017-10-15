<header role="banner" id="top" class="navbar navbar-static-top navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button data-target=".bs-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo SITE_URL;?>companies"><img alt="StoreMore" src="<?php echo SITE_URL.'img/logo.png'; ?>"></a>
    </div>
  <?php //include('schedule.ctp');?>  




     
    <nav class="collapse navbar-collapse bs-navbar-collapse">
     
      <ul class="nav navbar-nav navbar-right">
          <?php if($this->UserAuth->isLogged ()) { ?>
            <li>
                <?php echo $this->Html->link(__("My Account",true),"/dashboard");?> 
            </li> 
            <li>
                <?php echo $this->Html->link(__("Logout",true),"/logout");?>
             </li>
          <?php } else { ?>
             <li>
                <a href="javascript:void (0);" id="signinModal" data-toggle="modal" data-target="#signinModal">Login</a>
            </li>
            <li>
                <a href="javascript:void (0);" id="signupModal" data-toggle="modal" data-target="#signupModal">Sign Up</a>
             </li>
          <?php } ?>
            <li>

             <!--  <div class="calc-div">
                      <div class="calc-img">
                          <img src="<?php echo $this->webroot;?>img/calculator-top.png" width="30"/>
                      </div>
                      <div class="calc-link">
                        <?php 
                            echo $this->Html->link (
                                "Space Estimator",
                                array(
                                    "plugin" => false, 
                                    "controller" => "pages", 
                                    "action" => "space_calculator"
                                 ),
                                array("id" => "ycalc", "escape" => false, "style"=>"font-size:14px;color:#fff")
                                );
                          ?>
                    
                      </div>
                  </div> -->
              </li>  
             
            
      </ul>
    </nav>
  </div>
</header>
<!-- <div class="header-topSpace">&nbsp;</div> -->
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
 
