<script type="text/javascript">

$(document).ready(function(){
    $(".next").click(function(){
        var app_id = $(this).attr("app_id");
        if ($(".divs"+app_id+" section:visible").next().length != 0)
            $(".divs"+app_id+" section:visible").next().show().prev().hide();
        else {
            $(".divs"+app_id+" section:visible").hide();
            $(".divs"+app_id+" section:first").show();
        }
        return false;
    });

    $(".prev").click(function(){
        var app_id = $(this).attr("app_id");
        if ($(".divs"+app_id+" section:visible").prev().length != 0)
            $(".divs"+app_id+" section:visible").prev().show().next().hide();
        else {
            $(".divs"+app_id+" section:visible").hide();
            $(".divs"+app_id+" section:last").show();
        }
        return false;
    });
});

</script>

<?php 
echo $this->Html->script(array("new/jquery.form"));
echo $this->Html->css(array('new/application.css?ver=1.0'), array('media' => "all"));?>

<?php include('application_page_link.ctp');?>
<div class="container wrapper">      

    <section class="form-cnt">

        <?php include('application_search_box.ctp');?>

        <div class="row">
<?php
if(count($applications)>0)
{
foreach ($applications as $key => $value) { 
$all_apps_type = unserialize(APPLICATION_TYPE);
$process_type = $value['Application']['process_type'];
$country_type = $value['Application']['country_type'];
$employee_name = ucfirst($value['Application']['employee_name']);
$app_id = $value['Application']['id'];
$company_name = $value['Company']['company_name'];
$company_type = $value['Company']['company_type'];
    ?>

    <div class="app-process" id="application_<?php echo $app_id; ?>">
        <div class="process-name">
        <p><div><strong><a href="<?php echo SITE_URL.'applications/view/'.$app_id;?>"><?php echo $employee_name;?></a></strong></div>
        <div><?php echo $all_apps_type[$process_type]?></div>
        <div><?php echo ucfirst($value['Company']['company_name']);?></div>
        </p>
        </div>

        <div class="process-type">
         <span class="divs<?php echo $app_id?>">
            <?php 
            $visa_process = $this->Custom->getVisaProcesseByType($process_type,$company_type);
            if($process_type==NEW_RESIDENCY)
            {
                if($company_type==LABOUR_TYPE){
                    $new_residency_process = unserialize(NEW_RESIDENCY_LABOUR);
                }else{
                    $new_residency_process = unserialize(NEW_RESIDENCY_PROCESS);
                }
                 
                $contry_type_arr = unserialize(COUNTRY_TYPE); 
                $entry_permit_type = $contry_type_arr[$country_type];
                $visa_process[1] = "Entry Permit ".$entry_permit_type;
                
                $outpass_type = unserialize(OUTPASS_TYPE);
                $visa_process[2] = $outpass_type[$country_type];
            }

            $visa_process_new = $threeRow = array(); $counter = 1;
            foreach ($visa_process as $key => $single_visa) {
                $threeRow[] = $single_visa;
                if($counter%3==0)
                {
                $visa_process_new[] = $threeRow;
                $threeRow = array();
                }
                $counter++;
            }
            if(!empty($threeRow)){
            $visa_process_new[] = $threeRow; 
            }



            $process_count_db = 0;
            $process_counter = 1;
            foreach ($visa_process_new as $key1 => $visa_process1) {
                if($key1==0)
                {
                echo "<section style='position: absolute;'>";
                }else{
                echo '<section style="display:none; position: absolute;">';
                }
     
                foreach($visa_process1 as $key=>$process){
                    $process_statuses = $value['Application']['process_status'];
                    $process_issues = $value['Application']['process_issue'];
                    $chckbox_icon = "checkbox_uncheck.png";
                    $main_div_class = "process-button-cyan"; 
                    $chekbox_class = "myBtnWhat";
                    $process_statuses_array2 = $process_statuses_array3  = array();
                    $what_tag = true;
                    $a = '';


                    if(isset($process_statuses) && !empty($process_statuses))
                    {
                        $process_statuses_array2 = json_decode($process_statuses);
                        if(!empty($process_statuses_array2))
                        {
                            foreach ($process_statuses_array2 as $key2 => $value2) {
                             $process_statuses_array3[$key2] = $value2;
                            } 
                            $process_count_db = count($process_statuses_array3);
                            if(array_key_exists($process_counter, $process_statuses_array3))
                            {
                                if($process_statuses_array3[$process_counter]=='')
                                    {
                                    $main_div_class = "process-button-grey";    
                                    }else{
                                    $main_div_class = "process-button-green";
                                }
                                $chckbox_icon = "checkbox_checked.png";
                                $what_tag = false;
                                $chekbox_class = false;
                            }
                        }

                    }
                    
                    if(isset($process_issues) && !empty($process_issues))
                    {
                        $process_issues_array = json_decode($process_issues);
                        if(in_array($key, $process_issues_array))
                        {
                           $main_div_class = "process-button-red"; 
                           $what_tag = false;
                           $chekbox_class = false;
                       }
                    }
                   
                    ?>
                    <div class="<?php echo $main_div_class;?>" id="main_<?php echo $value['Application']['id']."_".$process_counter;?>">
                        <?php if($what_tag==true){?>
                        <span class="img-question myBtnWhat" 
                        id="what_<?php echo $value['Application']['id']."_".$process_counter;?>"
                        process_type="<?php echo $process;?>"
                        company_name="<?php echo $value['Company']['company_name']?>"
                        application_id="<?php echo $value['Application']['id']?>"
                        process_stage="<?php echo $process_counter; ?>"
                        person_name="<?php echo $employee_name; ?>"
                        type="what"
                        >?</span>
                        <?php } ?>

                        <span text-align="right" class="<?php echo $chekbox_class;?> process-chkbox-class"
                        process_type="<?php echo $process;?>"
                        company_name="<?php echo $value['Company']['company_name']?>"
                        application_id="<?php echo $value['Application']['id']?>"
                        process_stage="<?php echo $process_counter; ?>"
                        person_name="<?php echo $employee_name; ?>"
                        type="checkbox"
                        id="checkbox_<?php echo $value['Application']['id']."_".$process_counter;?>">
                        <img src="<?php echo SITE_URL.'img/'.$chckbox_icon; ?>" height="14"> </span>
                        <div class="button-txt"><?php echo $process.$a;?></div>
                    </div>
                <?php 
                $process_counter++;
                }
            echo "</section>";
            }
            ?>
            </span>
            <div class="process-button1">
                <span class="prev" app_id="<?php echo $app_id?>"><img src="<?php echo SITE_URL.'img/arrow_left.png'; ?>" alt="arrow left"/></span>
                
                <span id="process_stage_<?php echo $app_id?>">
                    <?php $process_status = isset($value['Application']['process_status'])?$value['Application']['process_status']:0;
                    if(isset($value['Application']['process_status'])){
                        echo $process_count_db;//count(json_decode($process_status));
                    }else{ echo "0"; }?></span>/<span id="last_step_<?php echo $app_id;?>"><?php echo count($visa_process)?></span>
                
                <span class="next" app_id="<?php echo $app_id?>"><img src="<?php echo SITE_URL.'img/arrow_right.png'; ?>" alt="arrow right"/></span>
                <span style="padding-left:16px;padding-right:12px;cursor:pointer;" class="myBtnCheckbox" app_id="<?php echo $app_id; ?>"><img src="<?php echo SITE_URL.'img/view_docs.png'; ?>" alt="View Docs" height="25"/></span>
                <?php if($userGroupId==SUPER_USER){?>
                <span><a href="javascript:void(0)" class="activeDeactive" app_id="<?php echo $app_id; ?>"><img src="<?php echo SITE_URL.'img/Delete-icon.png'; ?>" alt="Delete" height="18"/></a></span>
                <?php } ?>
            </div> 
            
                
        </div>
        
        


    </div>
<?php }
    }else{ ?>
    <div class="app-process" align="center">&nbsp;<h4>Record not found</h4></div>
<?php }?>

</div>

</section>
    
<hr>
</div>

<!--====================== POPUP START====================-->
<!--====================== POPUP START====================-->
<!-- The Modal for (? and checkbox)-->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
    <h4 id="person_name_show"></h4>
    <strong id="cmpname_show"></strong>
    <p id="process_type_show"></p>
    <div class="col-sm-16">
        <?php echo $this->Form->create('ApplicationProcess', array('url'=>array('controller'=>'applications','action'=>'visa_process_feedback') ,'method' => 'post', "type" => "file",'id'=>"jsonFormFeedback"));  
         echo $this->Form->input('application_id',array('type'=>'hidden','id'=>'what_popup_application_id')); 
         echo $this->Form->input('process_stage',array('type'=>'hidden','id'=>'what_popup_process_stage')); 
         echo $this->Form->input('type',array('type'=>'hidden','id'=>'popup_type')); 
        ?>

        <!--====================== for what tag ====================-->
        <div id="what_tag_options">
            <div class="form-group">
                <div class="col-sm-16">
                <?php echo $this->Form->input('comment',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Leave comment...","label"=>false,'id'=>'comment_here')); 
                ?>
                </div>
            </div>
            
            <h4>What went wrong?</h4>
            <div class="form-group">
                <div class="col-sm-14">
                    <p>
                        <?php echo $this->Form->checkbox('aaa',array('value'=>"passport", 'name'=>'issues[]')); ?>Passport
                        <?php echo $this->Form->checkbox('aaa', array('value'=>"medical", 'name'=>'issues[]')); ?>Medical
                        <?php echo $this->Form->checkbox('aaa', array('value'=>"education", 'name'=>'issues[]')); ?>Education Certificate
                        <?php echo $this->Form->checkbox('issues[]', array('value'=>"has_residence", 'name'=>'issues[]')); ?>Has Residence
                        <?php echo $this->Form->checkbox('issues[]', array('value'=>"other", 'name'=>'issues[]')); ?>Other
                    </p>
                </div>
            </div>
        </div>
        <!--====================== end what tag ====================-->
        
        <!--====================== for checkbox ====================-->
        <div id="checkbox_options">
            <h5>Date of completion</h5>
            <div class="form-group">
                <div class="col-sm-16">
                <?php echo $this->Form->input('completion_date',array('required'=>false,'class'=>"form-control date_picker",  'placeholder'=>"Select date ....","label"=>false, 'value'=>date('d-m-Y'))); ?>
                </div>
            </div>
            
            <h5>Upload supporting document</h5>
            
            <div class="form-group">
                <div class="col-sm-14">
                    <label class="btn btn-file">
                    Upload file<?php echo $this->Form->input('supporting_file',array('required'=>false,"style"=>"display: none;",'type'=>'file',"label"=>false, "accept"=>".pdf, image/*")); ?>
                    </label>
                    
                </div>
            </div>
        </div>
        <!--====================== end checkbox ====================-->


        <div class="form-group">
            <div class="col-sm-16">
                <?php echo $this->Form->button('Submit',array('type'=>'button', 'class'=>'btn btn_login', 'id'=>'what_went_wrong',
                    'process_type'=>"",
                    'company_name'=>"",
                    'application_id'=>"",
                    'process_stage'=>"")); ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
        </div>
  </div>
</div>
<!--====================== POPUP END====================-->
<!--====================== POPUP END====================-->


<!--====================== POPUP START for document download====================-->
<div id="myModalCheckbox" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
    <div id="document_list">
    </div>
    </div>
    
</div>
<!--====================== POPUP END====================-->

<script>
$(document).ready(function(){
    $('.activeDeactive').click(function(){ 
        $con = confirm('Are you sure want to delete.');
        if($con==false)
            {return false;
            }else{
            var app_id = $(this).attr("app_id"); 
            var values = "application_id="+app_id;
            $.ajax({
                  url: "<?php echo SITE_URL?>applications/app_delete",
                  type: "post",
                  data: values,
                  success: function(res){
                    $("#application_"+app_id).hide("slow");
                  }
            }); 

            }
    });
});    
//=======for click on ? ===========
var modalWhat = document.getElementById('myModal');

$('.myBtnWhat').click(function(){
    $('#comment_here').val('');
    var process_type = $(this).attr('process_type');
    var company_name = $(this).attr('company_name');
    var application_id = $(this).attr('application_id');
    var process_stage = $(this).attr('process_stage');
    var person_name = $(this).attr('person_name');
    var type = $(this).attr('type');
    if(type=="what")
    {
        $('#what_tag_options').show();
        $('#checkbox_options').hide();
    }else{
        $('#what_tag_options').hide();
        $('#checkbox_options').show();
    }

    $('#process_type_show').text(process_type);
    $('#cmpname_show').text(company_name);
    $('#person_name_show').text(person_name);
    
    $('#what_went_wrong').attr('process_type',process_type);
    $('#what_went_wrong').attr('company_name',company_name);
    $('#what_went_wrong').attr('application_id',application_id);
    $('#what_went_wrong').attr('process_stage',process_stage);
    $('#what_popup_application_id').attr('value',application_id);
    $('#what_popup_process_stage').attr('value',process_stage);
    $('#popup_type').attr('value',type);
    
    modalWhat.style.display = "block";
});

$('.close').click(function(){
    modalWhat.style.display = "none";
});

//=========for checkbox===============
var modalCheckbox = document.getElementById('myModalCheckbox');

$('.myBtnCheckbox').click(function(){

    var app_id = $(this).attr('app_id');
    var values = "application_id="+app_id;
        
    $.ajax({
          url: "<?php echo SITE_URL?>applications/get_documents",
          type: "post",
          data: values,
          success: function(res){ 
            $('#document_list').html(res);
          }
      });
    modalCheckbox.style.display = "block";
});

$(document).ready(function(){
    $('#what_went_wrong').click(function(){
        var process_type = $(this).attr('process_type');
        var application_id = $(this).attr('application_id');
        var process_stage = $(this).attr('process_stage');
        var comment = $('#comment_here').val();
        var popup_type = $('#popup_type').val();

        var initial_step = $("#process_stage_"+application_id).html();
        var last_step = $("#last_step_"+application_id).html();
        if(popup_type=="checkbox")
        {
            var initial_step_next = parseInt(initial_step)+1; 
            if(initial_step_next==last_step)
            {
                var conf = confirm('If you want to completed the visa process, Click on ok.');
                if(conf==false){return false;
                }else{
                var pending_counter = parseInt($('#pending_counter').text())-1;    
                var completed_counter = parseInt($('#completed_counter').text())+1;  

                $('#pending_counter').text(pending_counter);
                $('#completed_counter').text(completed_counter);  
                $("#application_"+application_id).hide("slow");  
                }
                
            }
        }

        if(popup_type=="what" && comment=='')
        {
            alert('Please type your comment');
            $('#comment_here').focus();
            return false;
        }
        
         $("#jsonFormFeedback").ajaxForm({
            success: function(response){ alert(response);
               if(popup_type=="what")
               {
                   $('#process_stage_'+application_id).text(process_stage);
                   $('#main_'+application_id+"_"+process_stage).removeClass('process-button-cyan');
                   $('#main_'+application_id+"_"+process_stage).addClass('process-button-red');
                   $('#what_'+application_id+"_"+process_stage).hide();
                   $('#comment_here').val('');
               }else{
                   var supportingfile = $('#ApplicationProcessSupportingFile').val();
                       if(supportingfile=='')
                        {
                         var mainClass = 'process-button-grey';   
                        }else{
                         var mainClass = 'process-button-green';
                        }
                   $('#process_stage_'+application_id).text(process_stage);
                   $('#main_'+application_id+"_"+process_stage).removeClass('process-button-cyan');
                   $('#main_'+application_id+"_"+process_stage).addClass(mainClass);
                   $('#what_'+application_id+"_"+process_stage).hide();
                   $('#checkbox_'+application_id+"_"+process_stage).html('<img src="<?php echo SITE_URL; ?>img/checkbox_checked.png" height="14">');
               }
               $('#checkbox_'+application_id+"_"+process_stage).removeClass("myBtnWhat");
              
               modalWhat.style.display = "none";
            }
        }).submit();
    });

     $('.submit_process').click(function(){
        var process_type = $(this).attr('process_type');
        var application_id = $(this).attr('application_id');
        var process_stage = $(this).attr('process_stage');
        
        $("#jsonForm").ajaxForm({
            success: function(response){
              alert(response);
               $('#process_stage_'+application_id).text(process_stage);
               $('#main_'+application_id+"_"+process_stage).removeClass('process-button-cyan');
               $('#main_'+application_id+"_"+process_stage).addClass('process-button-green');
               $('#chkbox_'+application_id+"_"+process_stage).attr('checked','checked');
               $('#chkbox_'+application_id+"_"+process_stage).attr('disabled','disabled');
               modalCheckbox.style.display = "none";
            }
        }).submit();

    });
});


$('.close').click(function(){
    modalCheckbox.style.display = "none";
});

window.onclick = function(event) {
    if (event.target == modalCheckbox) {
        modalCheckbox.style.display = "none";
    }else
    if (event.target == modalWhat) {
        modalWhat.style.display = "none";
     }
}
</script>




  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".date_picker" ).datepicker({
        dateFormat: 'dd-mm-yy',
    });
  } );


// image uploading
 $('.itemImageUpload').bind('change', function(){
       // $barcode_item_det_id = $(this).attr('barcode_item_det_id');
       // $("#display_button"+$barcode_item_det_id).html('');
       // $("#display_button"+$barcode_item_det_id).html('Uploading...');
      
        $("#jsonForm").ajaxForm({
            //target: '#display_button'+$barcode_item_det_id,
            success: function(response){
              $('#display_button'+$barcode_item_det_id).html(response);
              alert('Image uploaded successfully. Please refresh the page to see the image.');
            }
        }).submit();
        
    });


  </script>

