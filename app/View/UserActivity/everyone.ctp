<div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Recently active people</h3>
        </div>
        </div>
    </div>

<div class="container wrapper">
    <section class="form-cnt profile-page">

        <div class="row"></div>
        

        <div class="row">
           <div class="col-lg-2 col-sm-2 col-xs-12 text-xs-center ">
            <div class="add-profile">
              <a href="<?php echo SITE_URL.'add_employee';?>"><i class="fa fa-plus-circle fa-4" aria-hidden="true"></i>
              <p>Add People</p></a>
            </div>              
           </div>
           <div class="col-lg-10 col-sm-10 col-xs-12 profile-pic-circle text-center">
            <div class="row">

            <?php
            if(!empty($employees))
            { 
            foreach($employees as $employee):
             $uid = $employee['User']['id']; 
             $user_group_id = $employee['User']['user_group_id'];
             $group_res = $this->Custom->groupNameById($user_group_id);  
            ?>  
                <div class="col-md-3 col-sm-3 col-xs-12 text-xs-center">
                    <a class="profile-pic" href="<?php echo SITE_URL.'UserActivity/view_employee/'.$uid ;?>">
                      <img class="img-responsive img-circle" src="<?php echo SITE_URL.'img/noprofile2.jpg'; ?>" />
                      <div class="view-div"><p class="view-pro">View Profile(<?php echo $group_res['UserGroup']['name']?>)</p></div>
                      <p class="profile-title"><span><?php echo $employee['User']['first_name']?></span></p>
                    </a>  
                </div>
            <?php 
            endforeach;
            }else{
                echo "<h3>Record not found.</h3>";
            }
            ?> 

            </div>          
           </div>
        </div>
    </section>
    <hr>
</div>
