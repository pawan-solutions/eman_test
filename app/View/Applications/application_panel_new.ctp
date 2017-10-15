<?php 
$user_id = $_SESSION['UserAuth']['User']['id'];
$processCount = $this->Custom->app_process_count($user_id);
if($this->request->params['action']=="completed")
{
    $completedActive = 'class="active"';
    $pendingActive = '';
    $p_title= "Completed application";
}else{
    $pendingActive = 'class="active"';
    $completedActive = '';
    $p_title= "Application in process";
}
?>
<style type="text/css">
.pull-gride2{
    position: absolute;
    right: 183px;
    top: 10px;
}
</style>

            
       <div  class="row">
        <div class="col-lg-12 gride-itm">
            <ol class="breadcrumb">
                <li class="active"><?php echo $p_title; ?></li>
            </ol>
        
            <div  class="pull-gride2">
             <a href="<?php echo SITE_URL."applications/everything";?>" class="btn btn-default btn-sm btn-primary"><span id="pending_counter"><?php echo $processCount['pending'];?></span> Application</a>

                <a href="<?php echo SITE_URL."applications/completed";?>" class="btn btn-default btn-sm btn-primary"><span id="completed_counter"><?php echo $processCount['closed'];?></span> Completed Application</a>

                <a href="#" class="btn btn-default btn-sm btn-primary">History</a>
                <a href="<?php echo SITE_URL.'applications/new_residency';?>" id="list" class="btn btn-default btn-sm btn-primary"><i class='glyphicon glyphicon-plus'></i>Post new application</a>
                </div>


            
        </div>
    </div>


   

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


