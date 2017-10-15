       <!-- Page Content -->
    <div class="container wrapper">      
        <!-- Page Heading/Breadcrumbs -->
        <div  class="row">
        <div class="col-lg-12 gride-itm">
            <ol class="breadcrumb">
                <li class="active">Change Password</li>
            </ol>
        </div>
    </div>

        <!-- /.row -->
        <!-- Content Row -->
         <section class="form-cnt">
         	<?php echo $this->Form->create('UserActivity'); ?>
            
                        <div class="controls col-md-8 col-md-offset-2">
                            <div class="row">
                                <div class="col-md-12">
                                   <h4>Change Password:</h4>    
                                </div>
                            </div>
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('password',array('required'=>false,'class'=>"form-control",  'placeholder'=>"New Password","label"=>false)); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <?php echo $this->Form->input('cpassword',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Confirm Password","label"=>false)); ?>
                                    </div>
                                </div>
                            </div>

                            
                            <hr>
                            <div class="row">
                            <div class="col-md-2">
                            		<?php echo $this->Form->button('Submit',array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
                                </div>

                                
                            </div>
                        </div>

                    <?php  echo $this->Form->end(); ?>
  
         </section>
        <!-- /.row -->
       
      </div>
    





