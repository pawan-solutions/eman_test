<?php if($this->request->params['action']=="completed" || $this->request->params['action']=="everything")
{?>
<div class="container">
    <div class="form-horizontal applicationForm">
    <!-- <h2>Applications in process:<br>
    <span><a href="<?php echo SITE_URL.'applications/new_residency';?>">Post New Application</a></span> -->
        <div class="search_section">
        <?php
            $process_type = $application_type;
            echo $this->Form->create('Application');?>
            <div class="col-sm-2"> 
            <?php echo $this->Form->input('process_type',array('required'=>false,'type'=>"select",'options'=>$process_type,"label"=>false,'empty'=>'Select application type','class'=>'form-control'));?>
            </div>
            <div class="col-sm-2"> 
            <?php echo $this->Form->input('employee_name', array('required'=>false,'label'=>false,'placeholder'=>"Name.....",'class'=>'form-control')); ?>
            </div>
            <div class="col-sm-2"> 
            <?php echo $this->Form->input('company_id',array('required'=>false,'type'=>"select",'options'=>$companies,"label"=>false,'class'=>'form-control')); ?>
            </div>

            <div class="col-sm-2"> 
            <?php echo $this->Form->input('created_from',array('required'=>false,"label"=>false,'class'=>'form-control date_picker', 'placeholder'=>'Created from...')); ?>
            </div>

            <div class="col-sm-2"> 
            <?php echo $this->Form->input('created_to',array('required'=>false,"label"=>false,'class'=>'form-control date_picker', 'placeholder'=>'Created to...')); ?>
            </div>

            <div class="col-sm-2"> 
            <?php echo $this->Form->input('Search',array('required'=>false,'type'=>"submit","label"=>false,'class'=>'btn btn-primary')); ?>
            </div>
            <?php echo $this->Form->end(); ?>   
                
          </div>
 </div>
</div>
<?php }?>


