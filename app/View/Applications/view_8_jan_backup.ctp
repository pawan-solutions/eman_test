<?php //pr($appRes);?>
<div class="container wrapper">
<section class="form-cnt">

<div class="col-lg-14 gride-itm">
    <ol class="breadcrumb">
        <li><span class="fa fa-th-list"></span></li>
        <li class="active">Application details</li>
    </ol>
</div>

<form class="well form-horizontal" action=" " method="post" id="contact_form">
<fieldset>

<?php $appres = $app_detail['Application']; 
    $country_type_arr = unserialize(COUNTRY_TYPE);
    $marital_arr = unserialize(MARITAL_STATUS);
    if(isset($appres['country_type']))
    {
        $country_type = $country_type_arr[$appres['country_type']];
    }else{ $country_type = "N/A";}

    if(isset($appres['marital_status']))
    {
        $marital = $marital_arr[$appres['marital_status']];
    }else{ $marital = "N/A";}
?>

<div class="form-group">
  <label class="col-md-3 control-label">Employee Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['employee_name']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Company Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo ucfirst($app_detail['Company']['company_name'])?>" readonly="readonly">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label">Designation</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['designation']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Father Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['father_name']?>" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label">Mother Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['mother_name']?>" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label">UAE Telephone Number</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['phone_inside']?>" readonly="readonly">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 control-label">Home Country Telephone Number</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['phone_outside']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">UAE Home Address</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['address_inside']?>" readonly="readonly">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Home Country Address</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-building"></i></span>
  <input class="form-control" type="text" value="<?php echo $appres['address_outside']?>" readonly="readonly">
    </div>
  </div>
</div>

</fieldset>
</form>
        <div class="row">
            <div class="col-lg-12">
             <div class="top-serch">
                <div class="col-lg-12"><h4>Employee Documents</h4></div> 

                <?php 
                unset($app_detail['ApplicationDetail']['id']);
                unset($app_detail['ApplicationDetail']['application_id']);
                unset($app_detail['ApplicationDetail']['remark']);
                unset($app_detail['ApplicationDetail']['created']);
                unset($app_detail['ApplicationDetail']['modified']);
                unset($app_detail['ApplicationDetail']['created_by']);
                unset($app_detail['ApplicationDetail']['modified_by']);
                foreach($app_detail['ApplicationDetail'] as $doc_name=>$emp_docs)
                {
                ?>             
                <div class="col-md-3 col-sm3 col-xs-12 text-center"> 
                 <a href="#"><img src="<?php echo SITE_URL; ?>img/passport.jpg" alt=""></a>
                 <h4><?php 
                 $docs = str_replace("_"," ",$doc_name);
                 echo ucwords(str_replace("emp","Employee",$docs))?></h4>
                </div>
                <?php }?>
                                 
            </div>
          </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
             <div class="top-serch">
                <div class="col-lg-12"><h4>Visa Documents</h4></div> 

                <div class="col-md-3 col-sm3 col-xs-12 text-center"> 
                 <a href="#"><img src="<?php echo SITE_URL; ?>img/passport.jpg" alt=""></a>
                 <h4>Entry Permit</h4>
                </div>
                <div class="col-md-3 col-sm3 col-xs-12 text-center"> 
                 <a href="#"><img src="<?php echo SITE_URL; ?>img/passport.jpg" alt=""></a>
                 <h4>Outpass</h4>
                </div>
                <div class="col-md-3 col-sm3 col-xs-12 text-center"> 
                 <a href="#"><img src="<?php echo SITE_URL; ?>img/passport.jpg" alt=""></a>
                 <h4>Emirates ID</h4>
                </div>
                <div class="col-md-3 col-sm3 col-xs-12 text-center"> 
                 <a href="#"><img src="<?php echo SITE_URL; ?>img/passport.jpg" alt=""></a>
                 <h4>Medical Test</h4>
                </div>                  
            </div>
          </div>
        </div>




<div class="row">
      <div class="col-lg-12">
       <div class="top-serch">
          <div class="col-lg-12"><h3>Documents</h3></div>       
        <ul class="list-inline">
          <li class="list-inline-item">
           <img id="myImg" src="<?php echo SITE_URL; ?>img/passport.jpg" height="180" alt="Trolltunga, Norway">
           <h4>Passport 1</h4>
          </li>
          <li class="list-inline-item">
            <img id="myImg" src="<?php echo SITE_URL; ?>img/passport.jpg" height="180" alt="Trolltunga, Norway">
            <h4>Passport 2</h4>
          </li>
          <li class="list-inline-item">
            <img id="myImg" src="<?php echo SITE_URL; ?>img/passport.jpg" height="180" alt="Trolltunga, Norway">
            <h4>Passport 3</h4></li>
          <li class="list-inline-item">
            <img id="myImg" src="<?php echo SITE_URL; ?>img/passport.jpg" height="180" alt="Trolltunga, Norway">
            <h4>Passport 4</h4></li>
          
          <li class="list-inline-item">
            <img id="myImg" src="<?php echo SITE_URL; ?>img/passport.jpg" height="180" alt="Trolltunga, Norway">
            <h4>Passport 5</h4></li>
          <li class="list-inline-item">
            <img id="myImg" src="<?php echo SITE_URL; ?>img/passport.jpg" height="180" alt="Trolltunga, Norway">
            <h4>Passport 5 test matching test</h4></li>
          <li class="list-inline-item">
            <img id="myImg" src="<?php echo SITE_URL; ?>img/passport.jpg" height="180" alt="Trolltunga, Norway">
            <h4>Passport 5</h4></li>
          <li class="list-inline-item"
            <img id="myImg" src="<?php echo SITE_URL; ?>img/passport.jpg" height="180" alt="Trolltunga, Norway">
            <h4>Passport 5</h4></li>
          <li class="list-inline-item">
            <img id="myImg" src="<?php echo SITE_URL; ?>img/passport.jpg" height="180" alt="Trolltunga, Norway">
            <h4>Passport 5</h4></li>
          
        </ul>         
      </div>
      </div>
    </div>


<div class="row">
      <div class="col-lg-12">
       <div class="top-serch">
       <div class="col-lg-12"><h3>History</h3></div>            
         
<div class="container app-his">
  <ul>
    <li>
       Name 
    </li>
    <li>
       25-12-2016 
    </li>
        <li>
       Alone 
    </li>
        <li>
       Visa 
    </li>   
  </ul>
  <ul>
    <li>
       Name 
    </li>
    <li>
       25-12-2016 
    </li>
        <li>
       Alone 
    </li>
        <li>
       Visa 
    </li>   
  </ul>
  <ul>
    <li>
       Name 
    </li>
    <li>
       25-12-2016 
    </li>
        <li>
       Alone 
    </li>
        <li>
       Visa 
    </li>   
  </ul>
  <ul>
    <li>
       Name 
    </li>
    <li>
       25-12-2016 
    </li>
        <li>
       Alone 
    </li>
        <li>
       Visa 
    </li>   
  </ul>
  <ul>
    <li>
       Name 
    </li>
    <li>
       25-12-2016 
    </li>
        <li>
       Alone 
    </li>
        <li>
       Visa 
    </li>   
  </ul>
</div>
                          
      </div>
      </div>
    </div>





<div class="row">
      <div class="col-lg-12">
       <div class="top-serch">
       <div class="col-lg-12"><h3>History</h3></div>            
         
<div class="container app-his">
  <ul>
    <li>
       Name 
    </li>
    <li>
       25-12-2016 
    </li>
        <li>
       Alone 
    </li>
        <li>
       Visa 
    </li>   
  </ul>
  <ul>
    <li>
       Name 
    </li>
    <li>
       25-12-2016 
    </li>
        <li>
       Alone 
    </li>
        <li>
       Visa 
    </li>   
  </ul>
  <ul>
    <li>
       Name 
    </li>
    <li>
       25-12-2016 
    </li>
        <li>
       Alone 
    </li>
        <li>
       Visa 
    </li>   
  </ul>
  <ul>
    <li>
       Name 
    </li>
    <li>
       25-12-2016 
    </li>
        <li>
       Alone 
    </li>
        <li>
       Visa 
    </li>   
  </ul>
  <ul>
    <li>
       Name 
    </li>
    <li>
       25-12-2016 
    </li>
        <li>
       Alone 
    </li>
        <li>
       Visa 
    </li>   
  </ul>
</div>
                          
      </div>
      </div>
    </div>


















        </section>
        </div>