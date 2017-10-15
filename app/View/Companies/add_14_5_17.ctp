    <div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Add new company</h3>
        </div>
        </div>
    </div>  
       <!-- Page Content -->
    <div class="container wrapper">      
        <!-- Page Heading/Breadcrumbs -->
        

        <!-- /.row -->
        <!-- Content Row -->
         <section class="form-cnt">
         	<?php echo $this->Form->create('Company', array('type'=>'file', 'id'=>'contact-form')); ?>
            
                        <div class="messages"></div>

                        <div class="controls col-md-8 col-md-offset-2">
                            <div class="row">
                                <div class="col-md-12">
                                   <h4>Company Details:</h4>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                    	<?php echo $this->Form->input('company_type',array('required'=>false,'class'=>"form-control",'type'=>"select",'options'=>$company_type,"label"=>false)); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('company_name',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Company Name","label"=>false)); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <?php echo $this->Form->input('company_email',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Company Email","label"=>false)); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('company_phone',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Company Phone","label"=>false)); ?>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                             <div class="row">
                                <div class="col-md-12">
                                   <h4>Upload license and permit:</h4>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <label class="custom-file">
                                        	<?php echo $this->Form->input('trade_license',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>".pdf, image/*", 'class'=>"custom-file-input",'onchange'=>"loadFile(this.id)")); ?>
                                          
                                          <span class="custom-file-control">Upload Trade License</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <?php echo $this->Form->input('trade_license_expiry',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Expiry date of trade license","label"=>false)); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <label class="custom-file">
                                          <?php echo $this->Form->input('immigration_card',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>".pdf, image/*", 'class'=>"custom-file-input", 'onchange'=>"loadFile(this.id)")); ?>
                                          <span class="custom-file-control">Upload Immigration Card</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('immigration_expiry',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Expiry date of immigration card","label"=>false)); ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <label class="custom-file">
                                          <?php echo $this->Form->input('labour_card',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>".pdf, image/*", 'class'=>"custom-file-input", 'onchange'=>"loadFile(this.id)")); ?>
                                          <span class="custom-file-control">Upload Labour Card</span>
                                        </label>
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
    
<script type="text/javascript">
$(document).ready(function(){
    $( "#CompanyTradeLicenseExpiry" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
    });

    $( "#CompanyImmigrationExpiry" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
    });
  });

function loadFile(thisId)
    {
        $('#'+thisId).parent().next().removeClass('custom-file-control');
        $('#'+thisId).parent().next().addClass('custom-file-control-green');
    }
</script>





