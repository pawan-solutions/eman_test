<div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Edit application</h3>
        </div>
        </div>
    </div>
       <!-- Page Content -->
    <div class="container wrapper">      
        <!-- Page Heading/Breadcrumbs -->
        
         <section class="form-cnt">
             <?php echo $this->Form->create('Application', array('class'=>"contact-form",'type'=>'file')); ?>    
                        <div class="controls col-md-8 col-md-offset-2">
                    
                        <div class="row">
                          <div class="col-md-12">
                                   <h4>Employee Details:</h4>    
                          </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <?php echo $this->Form->input('company_id',array('required'=>false,'class'=>"form-control",'type'=>"select",'options'=>$companies,"label"=>false,'empty'=>'Select an organisation')); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('employee_name',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Employee full name as passport","label"=>false)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('employee_id_number',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Employee Company ID Number","label"=>false)); ?>
                                    </div>
                                </div>

                                                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('phone_inside',array('required'=>false,'class'=>"form-control",  'placeholder'=>"UAE Telephone Number","label"=>false)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('address_inside',array('required'=>false,'class'=>"form-control",  'placeholder'=>"UAE Home Address","label"=>false)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('ApplicationDetail.remark',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Remark","label"=>false,'type'=>'textarea', 'rows'=>3)); ?>
                                    </div>
                                </div>

                                
                            </div>
              
 
                    <div class="row">
                        <div class="col-md-12"> <h4>Upload Documents:</h4> </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emp_photo',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); 
                                    
                                    if($this->request->data['ApplicationDetail']['emp_photo']!='')
                                    {
                                    $class =  "custom-file-control-green";   
                                    }else{
                                    $class =  "custom-file-control";      
                                    }?>
                                    <span class="<?php echo $class?>">Upload Photo</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emp_passport1',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); 

                                    if($this->request->data['ApplicationDetail']['emp_passport1']!='')
                                    {
                                    $class =  "custom-file-control-green";   
                                    }else{
                                    $class =  "custom-file-control";      
                                    }?>
                                    <span class="<?php echo $class?>">Upload Passport copy 1</span>

                                    
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('visa_form',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); 

                                    if($this->request->data['ApplicationDetail']['visa_form']!='')
                                    {
                                    $class =  "custom-file-control-green";   
                                    }else{
                                    $class =  "custom-file-control";      
                                    }?>
                                    <span class="<?php echo $class?>">Upload Visa Application Form</span>

                                    
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emp_passport2',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); 

                                    if($this->request->data['ApplicationDetail']['emp_passport2']!='')
                                    {
                                    $class =  "custom-file-control-green";   
                                    }else{
                                    $class =  "custom-file-control";      
                                    }?>
                                    <span class="<?php echo $class?>">Upload Passport copy 2</span>
                                    
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('other_approval',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); 

                                    if($this->request->data['ApplicationDetail']['other_approval']!='')
                                    {
                                    $class =  "custom-file-control-green";   
                                    }else{
                                    $class =  "custom-file-control";      
                                    }?>
                                    <span class="<?php echo $class?>">Upload Other approval</span>
                                    
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emp_passport3',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); 

                                    if($this->request->data['ApplicationDetail']['emp_passport3']!='')
                                    {
                                    $class =  "custom-file-control-green";   
                                    }else{
                                    $class =  "custom-file-control";      
                                    }?>
                                    <span class="<?php echo $class?>">Upload Passport copy 3</span>
                                    
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('other',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); 

                                    if($this->request->data['ApplicationDetail']['other']!='')
                                    {
                                    $class =  "custom-file-control-green";   
                                    }else{
                                    $class =  "custom-file-control";      
                                    }?>
                                    <span class="<?php echo $class?>">Other</span>
                                    
                                </label>
                            </div>
                        </div>
                    </div>      


                    <div class="row">
                        <div class="col-md-2">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary ">
                        </div>
                    </div>

                        </div>
                        </div>
                    <?php echo $this->Form->end(); ?>   
              </div>
                
     </section>
        <!-- /.row -->
        <hr>
    </div>

    <!-- Page Content -->
<script type="text/javascript">
    $(document).ready(function(){
    $( "#expiration_date" ).datepicker({
        dateFormat: 'dd-mm-yy',
    });
  });

  function loadFile(thisId)
    {
        $('#'+thisId).parent().next().removeClass('custom-file-control');
        $('#'+thisId).parent().next().addClass('custom-file-control-green');
    }  

</script>

