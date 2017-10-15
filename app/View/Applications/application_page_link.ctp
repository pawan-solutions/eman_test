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

    <div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">
            <?php echo $p_title; ?> <!-- <small>  post new application</small>  -->
            </h3>
        </div>
        <div class="div_right col-lg-7">
            <div style="float:right;">
            <?php 
            if($this->request->params['action']=="everything"){?>
            <a href="javascript:void(0)" class="btn btn-default btn-sm btn-primary" id="passport_tracking">Passport Tracking</a>
            <?php } ?>

            <a href="<?php echo SITE_URL."applications/everything";?>" class="btn btn-default btn-sm btn-primary"><span id="pending_counter"><?php echo $processCount['pending'];?></span> Application</a>

            
            <a href="<?php echo SITE_URL."applications/completed";?>" class="btn btn-default btn-sm btn-primary"><span id="completed_counter"><?php echo $processCount['closed'];?></span> Completed Application</a>

            <a href="#" class="btn btn-default btn-sm btn-primary">History</a>
            <a href="<?php echo SITE_URL.'applications/new_residency';?>" id="list" class="btn btn-default btn-sm btn-primary"><i class='glyphicon glyphicon-plus'></i>Post new application</a>
            </div>

        </div>
        </div>
    </div>