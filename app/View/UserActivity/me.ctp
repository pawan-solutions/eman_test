
<div class="container wrapper">
    <section class="form-cnt profile-page">
        
        <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div id="sidebar">
                   
                    <div class="user">
                        <div class="text-center">
                            <img src="<?php echo SITE_URL.'img/noprofile2.jpg'; ?>" class="img-circle">
                        </div>
                        <div class="user-head">
                            <h2><?php echo ucwords($userinfo['User']['first_name']." ".$userinfo['User']['last_name'])?></h2>
                            <div class="hr-center"></div>
                            <h5><?php echo ucwords($role)?></h5>
                            <div class="hr-center"></div>
                            <h6><a href="#">Change Password</a></h6>
                            <!-- <h6><a href="<?php echo SITE_URL.'UserActivity/change_password';?>">Change Password</a></h6>
                             -->
                            <div class="hr-center"></div>
                            <h6><a href="<?php echo SITE_URL.'edit_employee/'.$userinfo['User']['id'];?>">Update Profile</a></h6>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
           <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div id="content">
                  
                    <!-- start:main content -->
                    <div class="main-content">
                        <ul class="timeline">
                            <!-- start:profile -->
                           
                            <li id="personal-info">
                                <div class="timeline-panel">
                                    <h2>Personal Info</h2>
                                    <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Full Name :</td>
                                            <td><?php echo ucwords($userinfo['User']['first_name']." ".$userinfo['User']['last_name'])?></td>
                                        </tr>
                                        <tr>
                                            <td>Email :</td>
                                            <td><?php echo $userinfo['User']['email'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number :</td>
                                            <td><?php echo !empty($userinfo['User']['phone'])?$userinfo['User']['phone']:'---';?></td>
                                        </tr>
                                        <tr>
                                            <td>Role :</td>
                                            <td><?php echo ucwords($role)?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </li>
                            <!-- end:profile -->

                            <li id="personal-info">
                                <div class="timeline-panel">
                                    <h2>History</h2>
                                    <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">Not yet</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                </div>
                            </li>


                           
                        </ul>
                    </div>
                    <!-- end:main content -->
                </div>
            </div>
        </div>
    </section>
    <hr>
</div>
 