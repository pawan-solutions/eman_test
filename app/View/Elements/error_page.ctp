<section class="greyBg">
 <div class="container">
  <div class="row">
   <div class="col-sm-12">
    <div class="errorPage"> 
     <p class="errorBold"><i class="fa fa-exclamation-triangle" style="color: #d15b59;"></i> ERROR <strong>404</strong></p>
		<p class="sorry">We're sorry...</p>
		<p class="bottomTxt">We looked everywhere. And couldn't find that page. <br>You can always go back to...</p>
		<div class="link-button">
		  <span><a class="btn errorPageBtn" href="<?php echo SITE_URL;?>"><i class="fa fa-home"></i>Home</a></span>
		  <span> 
		  
		  <?php echo $this->Html->link ("<i class='fa fa-search' style='margin-right:3px;'></i> Search Storage Space ",
                    array(
                        "controller" => "storage_spaces",
                        "action" => "search",
                        "?" => array("location" => "")
                    ), array("class" => "btn errorPageBtn", 'escape' => false)
           );?>
		 </span>
		</div>	
	</div>
   </div>
  </div>
 </div> 
</section>
