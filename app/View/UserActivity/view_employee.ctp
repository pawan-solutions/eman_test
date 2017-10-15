
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
                                            <td><?php echo ucwords($userinfo['User']['email'])?></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number :</td>
                                            <td><?php echo !empty($userinfo['User']['phone'])?$userinfo['User']['phone']:'---';?></td>
                                        </tr>
                                        <tr>
                                            <td>Role :</td>
                                            <td><?php echo ucwords($role)?></td>
                                        </tr>
                                        <tr>
                                            <td>Companies :</td>
                                            <td><?php foreach ($companies as $key => $company) {
                                                echo "<p>".ucfirst($company)."</p>";
                                            }?></td>
                                        </tr>

                                        
                                    </tbody>
                                </table>
                                </div>
                            </li>

                            <!-- end:profile -->

                            <li id="personal-info">
                                <div class="timeline-panel">
                                    <h2>History</h2>
                                    <table class="table">
                                      <thead>
                                        <tr>
                                              <th>Action </th>
                                              
                                              <th>Action Date</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      <?php $action_message = $process_txt = '';
                                     
                                        foreach ($user_action_history as $history) { 
                                            $from_table = $history['result']['from_table'];
                                            $name = $history['result']['name'];
                                            $refid = $history['result']['id'];
                                            if($from_table=="applications")
                                            {
                                                $process_type = $history['result']['process_type'];
                                                $refurl = SITE_URL.'applications/view/'.$refid;
                                                $process_txt = $this->Custom->get_process_text($process_type);
                                                $action_message = $process_txt." for <a href='".$refurl."' target='_blank'><b>".$name."</b></a>";
                                            }elseif($from_table=="process" || $from_table=="issue" || $from_table=="reference")
                                            {
                                                $process_type = $history['result']['process_type'];
                                                $process_stage = $history['result']['process_stage'];
                                                $action_message = $this->Custom->get_visa_completed_text($process_type,$process_stage,$name, $from_table);
                                                
                                            }elseif($from_table=="companies")
                                            {
                                                $refurl = SITE_URL.'companies/edit/'.$refid;
                                                $action_message = "Added new company <a href='".$refurl."' target='_blank'><b>".$name."</b></a>";
                                            }elseif($from_table=="users")
                                            {
                                                $refurl = SITE_URL.'UserActivity/view_employee/'.$refid;
                                                $action_message = "Added new user <a href='".$refurl."' target='_blank'><b>".$name."</b></a>";
                                            }elseif($from_table=="passport_tracking")
                                            {
                                                $refurl = SITE_URL.'UserActivity/view_employee/'.$refid;
                                                $process_type = $history['result']['process_type'];
                                                $passport_type_arr = unserialize(PASSPORT_TRACK_TYPE);
                                                $passport_action = str_replace('_',' ', $passport_type_arr[$process_type]);
                                                $passport_action = ucwords(str_replace(' gro','', $passport_action));
                                                $action_message = $passport_action ." of <a href='".$refurl."' target='_blank'><b>".$name."</b></a>";
                                                
                                            }


                                            
                                            
                                          ?>
                                        <tr>
                                          <td><?php echo $action_message; ?></td>
                                          
                                          <td><?php echo date("d-m-Y h:i:s", strtotime($history['result']['created'])); ?></td>
                                        </tr>
                                        <?php } ?>
                                        
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
 