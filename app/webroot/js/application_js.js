
$(document).ready(function(){
    $('.activeDeactive').click(function(){ 
        $con = confirm('Are you sure want to delete.');
        if($con==false){return false;}
    });
});    
//=======for click on ? ===========
var modalWhat = document.getElementById('myModal');

$('.myBtnWhat').click(function(){
    var process_type = $(this).attr('process_type');
    var company_name = $(this).attr('company_name');
    var application_id = $(this).attr('application_id');
    var process_stage = $(this).attr('process_stage');

    $('#process_type_show').text(process_type);
    $('#cmpname_show').text(company_name);
    $('#what_went_wrong').attr('process_type',process_type);
    $('#what_went_wrong').attr('company_name',company_name);
    $('#what_went_wrong').attr('application_id',application_id);
    $('#what_went_wrong').attr('process_stage',process_stage);
    $('#what_popup_application_id').attr('value',application_id);
    $('#what_popup_process_stage').attr('value',process_stage);
    modalWhat.style.display = "block";
});

$('.close').click(function(){
    modalWhat.style.display = "none";
});

//=========for checkbox===============
var modalCheckbox = document.getElementById('myModalCheckbox');

$('.myBtnCheckbox').click(function(){

    var process_type = $(this).attr('process_type');
    var company_name = $(this).attr('company_name');
    var application_id = $(this).attr('application_id');
    var process_stage = $(this).attr('process_stage');
    modalCheckbox.style.display = "block";
    
    $('#process_type_show_chk').text(process_type);
    $('#cmpname_show_chk').text(company_name);
    $('.submit_process').attr('process_type',process_type);
    $('.submit_process').attr('company_name',company_name);
    $('.submit_process').attr('application_id',application_id);
    $('.submit_process').attr('process_stage',process_stage);
    $('#popup_application_id').attr('value',application_id);
    $('#popup_process_stage').attr('value',process_stage);
   
});

$(document).ready(function(){

    $('#what_went_wrong').click(function(){
        var process_type = $(this).attr('process_type');
        var application_id = $(this).attr('application_id');
        var process_stage = $(this).attr('process_stage');
        var comment = $('#comment_here').val();
        if(comment=='')
        {
            alert('Please type your comment');
            $('#comment_here').focus();
            return false;
        }
        
         $("#jsonFormFeedback").ajaxForm({
            success: function(response){
               
              // alert('Your feeback successfully submitted.');
               $('#process_stage_'+application_id).text(process_stage);
               $('#main_'+application_id+"_"+process_stage).removeClass('process-button-cyan');
               $('#main_'+application_id+"_"+process_stage).addClass('process-button-red');
               $('#chkbox_'+application_id+"_"+process_stage).attr('disabled','disabled');
               $('#what_'+application_id+"_"+process_stage).hide();

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
