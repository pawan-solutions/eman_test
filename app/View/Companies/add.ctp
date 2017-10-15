<style type="text/css">
    .group-span-filestyle .btn{
        padding: 6px 100px 6px 10px;
    }
    </style>
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
                                        <?php echo $this->Form->input('company_name',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Company Name as per Trade License","label"=>false)); ?>
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
                                        <?php echo $this->Form->input('company_phone',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Company Telephone Number","label"=>false)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('representative_name',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Name of Company Representative","label"=>false)); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('representative_mobile',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Mobile Number of Company Representative","label"=>false)); ?>
                                    </div>
                                </div>
                            </div>

                                 <div class="col-md-14">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('remark',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Remark","label"=>false,'type'=>'textarea', 'rows'=>3)); ?>
                                    </div>
                                </div>


                             <div class="row">
                                <div class="col-md-12">
                                   <h4>Upload license and permit:</h4>    
                                </div>
                            </div>



           

                            <?php 
                            foreach ($company_license_permit as $doc_name => $doc_text) {?>
                               <div class="row">
                                <div class="col-md-6" title="Upload <?php echo $doc_text;?>">
                                    <?php echo $this->Form->input('CompanyDocument.'.$doc_name ,array('required'=>false,'type'=>'file',"label"=>false, "accept"=>".pdf, image/*", 'class'=>"filestyle", 'data-placeholder'=>$doc_text)); ?>
                                    <!-- <div class="form-group"> 
                                        <label class="custom-file">
                                            <?php echo $this->Form->input('CompanyDocument.'.$doc_name ,array('required'=>false,'type'=>'file',"label"=>false, "accept"=>".pdf, image/*", 'class'=>"custom-file-input",'onchange'=>"loadFile(this.id)")); ?>
                                          
                                          <span class="custom-file-control">Upload <?php echo $doc_text?></span>
                                        </label>
                                    </div> -->
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <?php echo $this->Form->input('CompanyDocument.'.$doc_name.'_expiry',array('required'=>false,'class'=>"form-control datepicker-show",  'placeholder'=>"Expiry date of ".$doc_text, "label"=>false)); ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="row">
                                <div class="col-md-12">
                                   <h4>Legal Documents:</h4>    
                                </div>
                            </div>
                            <div class="row">
                            <?php 
                            foreach ($company_legal_document as $doc_name => $doc_text) {?>
                               
                                <div class="col-md-6 form-group">

                                    <?php echo $this->Form->input('CompanyDocument.'.$doc_name ,array('required'=>false,'type'=>'file',"label"=>false,  'class'=>"filestyle", 'data-placeholder'=>$doc_text)); ?>

                                    <!-- <div class="form-group"> 
                                        <label class="custom-file">
                                            <?php echo $this->Form->input('CompanyDocument.'.$doc_name ,array('required'=>false,'type'=>'file',"label"=>false, "accept"=>".pdf, image/*", 'class'=>"custom-file-input",'onchange'=>"loadFile(this.id)")); ?>
                                          <span class="custom-file-control">Upload <?php echo $doc_text?></span>
                                        </label>
                                    </div> -->
                                </div>

                                
                            <?php } ?>
                            </div>
                           
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
    $( ".datepicker-show" ).datepicker({
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

    $('.input001').filestyle({
                //'placeholder' : 'Placeholder test'
            });
</script>





