
<div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">
            All company <!-- <small>  post new application</small>  -->
            </h3>
        </div>
        <div class="div_right col-lg-7">
            <div style="float:right;">
            <a href="<?php echo SITE_URL.'companies/add';?>" id="list" class="btn btn-default btn-sm btn-primary"><i class='glyphicon glyphicon-plus'></i>Add new Company</a>
            </div>

        </div>
        </div>
    </div>


    <!-- Page Content -->
      <!-- Page Content -->
    <div class="container wrapper">      
        <!-- Page Heading/Breadcrumbs -->
        <div  class="row">
        
    </div>

<!-- <div id="flashMessage" class="message">Company has been updated successfully</div>
 <div class="alert alert-success fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Success!</strong> Your message has been sent successfully.
</div>  -->

        <?php echo $this->Session->flash(); ?>
        <div id="products"  class="row list-group">    
        
        <?php 
        foreach ($companies as $company) {
            $cmpTypeId = $company['Company']['company_type'];
            $company_type = unserialize(COMPANY_TYPE);
            $cmpType = $company_type[$cmpTypeId];
            $id = $company['Company']['id'];
        ?>
            <div class="col-md-3 item" id="company_<?php echo $id;?>">
             <div class="data-tab">
              <div class="data-tabin">
                <h4><a href="<?php echo SITE_URL.'companies/view/'.$id ;?>"><?php echo ucfirst($company['Company']['company_name'])?></a> <span class="fa fa-star active"></span></h4>
                <p>Dubai</p>
                <p><?php echo $cmpType?></p>
               </div>
               
               <ul class="pro pro-justified">
                 <li>
                   <a href="#">
                   <img class="img-circle" src="<?php echo SITE_URL.'img/noprofile.jpg'; ?>" />
                 </a>
                 </li>
                 <li>
                   <a href="#">
                   <img class="img-circle" src="<?php echo SITE_URL.'img/noprofile.jpg'; ?>" />
                 </a>
                 </li>
                 <li>
                   <a href="#">
                   <img class="img-circle" src="<?php echo SITE_URL.'img/noprofile.jpg'; ?>" />
                 </a>
                 </li>
                 <li>
                   <a href="#">
                   <img class="img-circle" src="<?php echo SITE_URL.'img/noprofile.jpg'; ?>" />
                 </a>
                 </li>
                 <li>
                   <a href="#">
                   <img class="img-circle" src="<?php echo SITE_URL.'img/noprofile.jpg'; ?>" />
                 </a>
                 </li>
               </ul>
               </div>    
            </div>
        <?php }?>
        </div>
    </div>

 