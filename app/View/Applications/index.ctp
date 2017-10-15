<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME . " | " . $this->fetch('title'); ?></title>

<?php 
echo $this->Html->css(array('frontend/customestyle','frontend/bootstrap.min','frontend/font-awesome.min','frontend/styles'), array('media' => "all"));
echo $this->Html->script(array("jquery-1.10.2", "formAjaxValidation"));
?>


<style>
    *{
        margin: 0 auto;
        padding: 0 auto;
    }

.cmp-box{
   width: 225px;
   height:273px;
    background-color: white;
    border: 1px solid black;
    float: right;
    margin-top: 16px;
    margin-left: 16px;
   
}
.cmp-box .a{
    padding-top: 15px;
    color: #000000;
}
.cmp-box .b{
    color: ;
}
.cmp-box-img{
    width: 270px;
    height: 50px;
    margin-top: 100px;

}
.cmp-box-img .jpg{
    width: 40px;
    height: 40px;
    border: 1px solid red;
    border-radius: 100%;
    float: left;
    margin: 2px;
}
.cmp-add{
    width: 100px;
    height: 100px;
    background-color: white;
    border: 1px solid black;
    margin-top: 16px;
    margin-right: 50px;
}
.cmp-add-plus{
    margin: 25px;

}
.cmp-add-txt{
    font-size: 15.1px;
    text-decoration: underline;
}  



</style>

</head>

<body>
<?php echo $this->element('header_menu'); ?>


<div class="container">
<div class="row" style="padding-top:50px; padding-bottom:50px;">
        <div class="col-sm-2">

                <div class="cmp-add">
                		<a href="<?php echo SITE_URL.'companies/add';?>">
                        <img src="<?php echo SITE_URL.'img/add.png'; ?>" class="cmp-add-plus">
                         <p class="cmp-add-txt">New Company</p>
                         </a>
                </div>

        </div>

        <?php 
        foreach ($companies as $company) {
        	$cmpTypeId = $company['Company']['company_type'];
        	$company_type = unserialize(COMPANY_TYPE);
        	$cmpType = $company_type[$cmpTypeId];
        ?>
        <div class="col-sm-3 cmp-box">
            <h4 class="a"><?php echo $company['Company']['company_name']?></h4>
            <p class="b">Dubai</p>
            <p class="b"><?php echo $cmpType?></p>
            <div class="col-sm-3 cmp-box-img">
                <img src="<?php echo SITE_URL.'img/noprofile.jpg'; ?>" class="jpg">
                <img src="<?php echo SITE_URL.'img/noprofile.jpg'; ?>" class="jpg">
                <img src="<?php echo SITE_URL.'img/noprofile.jpg'; ?>" class="jpg">
                <img src="<?php echo SITE_URL.'img/noprofile.jpg'; ?>" class="jpg">
            </div>
        </div>
        <?php }?>



        </div>  
</div>



</body>
</html>
