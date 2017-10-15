<?php 
    if($this->request->params['action']=="hr_dashboard")
    {
        $p_title= "HR Dashboard";
        $hrd_active = "active";
        $prg_active = $pass_r_active = '';
    }elseif($this->request->params['action']=="progress"){
        $p_title= "Application progress report";
        $prg_active = "active";
        $hrd_active = $pass_r_active = '';
    }elseif($this->request->params['action']=="passport_reports"){
        $p_title= "Passport Movement Log";
        $pass_r_active = "active";
        $prg_active = $hrd_active = '';
    }

?>

   <div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">
            <?php echo $p_title; ?>
            </h3>
        </div>
        <div class="div_right col-lg-7">
            <div style="float:right;">
            <a href="<?php echo SITE_URL."reports/progress";?>" class="btn btn-default btn-sm btn-primary <?php echo $prg_active; ?>">Application in process</a>

            <a href="<?php echo SITE_URL."reports/hr_dashboard";?>" class="btn btn-default btn-sm btn-primary <?php echo $hrd_active; ?>">HR Dashboard</a>

            <a href="<?php echo SITE_URL.'reports/passport_reports';?>" id="list" class="btn btn-default btn-sm btn-primary <?php echo $pass_r_active; ?>">Passport Movement Log</a>
            </div>

        </div>
        </div>
    </div>
