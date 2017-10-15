<div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Post new application</h3>
        </div>
        </div>
    </div>
       <!-- Page Content -->
    <div class="container wrapper">      
        <!-- Page Heading/Breadcrumbs -->
        
         <section class="form-cnt">
        <div class="row">
           
            <div class="col-lg-12">

            
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="service-one">
      
    <div class="row"> 
        <?php echo $this->element('left_menu');?>

      <div class="controls col-md-8"> 
            <?php echo $this->Form->create('Application', array('class'=>"contact-form",'type'=>'file')); ?>    
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
                                       <?php echo $this->Form->input('designation',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Designation/ Position","label"=>false)); ?>
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('ApplicationDetail.remark',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Remark","label"=>false,'type'=>'textarea', 'rows'=>3)); ?>
                                    </div>
                                </div>
                            </div>

                    <div id="salary_detail_section">
                    <div class="row">
                        <div class="col-md-12"> <h4>Salary Detail:</h4> </div>
                    </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <?php echo $this->Form->input('basic_salary',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Basic Salary","label"=>false)); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                   <?php echo $this->Form->input('housing_allowance',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Housing Allowance (By Company/ Cash)","label"=>false)); ?>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <?php echo $this->Form->input('transportation_allowance',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Transportation (By Company/ Cash) ","label"=>false)); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                   <?php echo $this->Form->input('other_allowance',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Other","label"=>false)); ?>
                                </div>
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
                                    <?php echo $this->Form->input('emp_photo',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"form-control")); ?>
                                    <span class="custom-file-control">Upload Photo</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emp_passport1',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"form-control")); ?>
                                    <span class="custom-file-control">Upload Passport copy 1</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('residency_copy',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"form-control")); ?>
                                    <span class="custom-file-control">Upload Residence Visa Copy</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emp_passport2',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"form-control")); ?>
                                    <span class="custom-file-control">Upload Passport copy 2</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('education_certificate',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"form-control")); ?>
                                    <span class="custom-file-control">Educational Certificate (For higher position)</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('labour_card',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Labour Card Copy</span>
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

                    <?php echo $this->Form->end(); ?>   
              </div>
          </div>
              </div>

            </div>
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


   $('#salary_detail_section').hide();
   $('#ApplicationLabourCard').parent().parent().hide();
   $('#ApplicationCompanyId').change(function(){
       $company_name =  $("#ApplicationCompanyId option:selected").text();
       if($company_name .search("under labour")>0){
            $('#salary_detail_section').show();
            $('#ApplicationLabourCard').parent().parent().show();
       }else{
            $('#salary_detail_section').hide();
            $('#ApplicationLabourCard').parent().parent().hide();
       }
   }); 
</script>
