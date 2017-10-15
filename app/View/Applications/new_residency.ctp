 <div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Post new application</h3>
        </div>
        </div>
    </div>

<div class="container wrapper">      
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
                                        <?php echo $this->Form->input('country_type',array('required'=>false,'class'=>"form-control",'type'=>"select",'options'=>$country_type,"label"=>false)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('designation',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Designation/ Position","label"=>false)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6" id="expire_box" style="display:none;">
                                    <div class="form-group"> 
                                        <?php echo $this->Form->input('expiry_date',array('required'=>false,'class'=>"form-control","label"=>false,'placeholder'=>"Expiry of cancellation/ visit visa",'id'=>'expiration_date')); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                <?php echo $this->Form->input('marital_status',array('required'=>false,'class'=>"form-control",'type'=>"select",'options'=>$marital_status,"label"=>false)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('mother_name',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Mother Name","label"=>false)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('father_name',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Father Name","label"=>false)); ?>
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
                                       <?php echo $this->Form->input('phone_outside',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Home Country Telephone Number","label"=>false)); ?>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('address_outside',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Home Country Address","label"=>false)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('ApplicationDetail.remark',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Remark","label"=>false,'type'=>'textarea', 'rows'=>3)); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('gender',array('required'=>false,'class'=>"form-control",'type'=>"select",'options'=>$gender_list,"label"=>false)); ?>
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
                        <!-- <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emp_photo',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control"><span class="glyphicon glyphicon-upload"></span> Upload Photo</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emp_passport1',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Upload Passport copy 1</span>
                                </label>
                            </div>
                        </div> -->

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">Upload Photo</label>
                                    <?php echo $this->Form->input('emp_photo',array('required'=>false,'type'=>'file',"label"=>false,  'onchange'=>"loadFile(this.id)", 'class'=>"form-control")); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">Upload Passport copy 1</label>
                                    <?php echo $this->Form->input('emp_passport1',array('required'=>false,'type'=>'file',"label"=>false,  'onchange'=>"loadFile(this.id)", 'class'=>"form-control")); ?>
                            </div>
                        </div>

                       

                       <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">Upload Visa Application Form</label>
                                    <?php echo $this->Form->input('visa_form',array('required'=>false,'type'=>'file',"label"=>false,  'onchange'=>"loadFile(this.id)", 'class'=>"form-control")); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">Upload Passport copy 2</label>
                                    <?php echo $this->Form->input('emp_passport2',array('required'=>false,'type'=>'file',"label"=>false,  'onchange'=>"loadFile(this.id)", 'class'=>"form-control")); ?>
                            </div>
                        </div>

                        
                        <!-- <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('visa_form',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Upload Visa Application Form</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emp_passport2',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Upload Passport copy 2</span>
                                </label>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('education_certificate',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Upload Education Certificate</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emp_passport3',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Upload Passport copy 3</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('health_insurence',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Health Insurance Copy</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emirates_id',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Emirates Id Copy Front</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('other_approval',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Upload Other approval</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('emirates_id_back',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Emirates Id Copy Back</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('other',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Other</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6" style="display:none" id="visit_visa_copy">
                            <div class="form-group"> 
                                <label class="custom-file">
                                    <?php echo $this->Form->input('visit_visa_copy',array('required'=>false,'type'=>'file',"label"=>false, "accept"=>"image/*", 'onchange'=>"loadFile(this.id)", 'class'=>"custom-file-input")); ?>
                                    <span class="custom-file-control">Upload Cancellation/ Visit Visa Copy</span>
                                </label>
                            </div>
                        </div>
                    </div>    


                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary ">
                            <a href="" class="btn btn-info">Cancel</a>
                            
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
        var c_type = $('#ApplicationCountryType').val();
         if(c_type==1)
            {
                $('#expire_box').show();
            }
        $('#ApplicationCountryType').change(function(){
            $type = $(this).val();
            if($type==1)
            {
                $('#expire_box').show('slow');
                $('#visit_visa_copy').show('slow');
            }else{
                $('#expire_box').hide('slow');
                $('#visit_visa_copy').hide('slow');
            }
        });

    });

    $(document).ready(function(){
    $( "#expiration_date" ).datepicker({
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

   $('#salary_detail_section').hide();
   $('#ApplicationCompanyId').change(function(){
       $company_name =  $("#ApplicationCompanyId option:selected").text();
       if($company_name .search("under labour")>0){
            $('#salary_detail_section').show();
       }else{
            $('#salary_detail_section').hide();
       }
   });
  </script>

  