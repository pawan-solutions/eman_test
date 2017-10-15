    <div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Invite or add team/ people</h3>
        </div>
        </div>
    </div>

       <!-- Page Content -->
    <div class="container wrapper">      
       
         <section class="form-cnt">
          <?php echo $this->Form->create('User', array('type'=>'file')); ?>
            
                        <div class="messages"></div>

                        <div class="controls col-md-8 col-md-offset-2">
                            <div class="row">
                                <div class="col-md-12">
                                   <h4>User Details:</h4>    
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <?php echo $this->Form->input('first_name',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Employee Name","label"=>false)); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'class'=>"form-control" , "placeholder"=>"Email address"))?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('User.phone',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Mobile number",'maxlength'=>15,"label"=>false)); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('user_group_id',array('required'=>false,'class'=>"form-control",'type'=>"select",'options'=>$roles,"label"=>false,'empty'=>'Select Role')); ?>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="checkbox" id="checkAll">Check all
                                        <?php 
                                        echo $this->Form->input('company_id', array(
                                        'label' => 'Select Companies',
                                        'type' => 'select',
                                        'class'=>"form-control",
                                        'multiple' => 'checkbox',
                                        'options' => $companies
                                      ));
                                    ?>
                                    </div>
                                </div>
                            </div>
                             
                            
                            <hr>
                            <div class="row">
                            <div class="col-md-2">
                                <?php echo $this->Form->button('Submit',array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
                                </div>

                                
                            </div>
                            <hr>
                            
                        </div>

                    <?php  echo $this->Form->end(); ?>
  
         </section>
        <!-- /.row -->
       
      </div>

    
<script type="text/javascript">
    $(function () {
    $("#checkAll").click(function () { 
        if ($("#checkAll").is(':checked')) {
            $("input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});

</script>























