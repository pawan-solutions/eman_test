<?php echo $this->Html->script(array("new/jquery.form")); ?>
    <style type="text/css">
    .group-span-filestyle .btn{
        padding: 6px 100px 6px 10px;
    }
    </style> 
    <div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Edit company</h3>
        </div>
        </div>
    </div>  
       <!-- Page Content -->
    <div class="container wrapper">      
        <!-- Page Heading/Breadcrumbs -->
        

        <!-- /.row -->
        <!-- Content Row -->
         <section class="form-cnt">
            <?php echo $this->Form->create('Company', array('type'=>'file', 'id'=>'contact-form')); ?>
            
                        <div class="messages"></div>

                        <div class="controls col-md-8 col-md-offset-2">
                            <div class="row">
                                <div class="col-md-12">
                                   <h4>Company Details:</h4>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                    
                                        <?php echo $this->Form->input('company_type',array('required'=>false,'class'=>"form-control",'type'=>"select",'options'=>$company_type,"label"=>false,'title'=>"Select Company Type")); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('company_name',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Company Name as per Trade License","label"=>false, 'title'=>"Company Name as per Trade License")); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> 
                                        <?php echo $this->Form->input('company_email',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Company Email","label"=>false,'title'=>"Company Email")); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('company_phone',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Company Telephone Number","label"=>false,'title'=>"Company Telephone Number")); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('representative_name',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Name of Company Representative","label"=>false,'title'=>"Name of Company Representative")); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo $this->Form->input('representative_mobile',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Mobile Number of Company Representative","label"=>false,'title'=>"Mobile Number of Company Representative")); ?>
                                    </div>
                                </div>
                            </div>

                                 <div class="col-md-14">
                                    <div class="form-group">
                                       <?php echo $this->Form->input('remark',array('required'=>false,'class'=>"form-control",  'placeholder'=>"Remark","label"=>false,'type'=>'textarea', 'rows'=>3,'title'=>"Remark")); ?>
                                    </div>
                                </div>


                            
                             <div class="row">
                                <div class="col-md-12">
                                   <h4>Upload license and permit:</h4>    
                                </div>
                            </div>
                            <?php 
                            echo $this->Form->input('CompanyDocument.id' ,array('type'=>'hidden')); 
                            $document_arr = $this->request->data['CompanyDocument'];
                            foreach ($company_license_permit as $doc_name => $doc_text) {
                                if($this->request->data['CompanyDocument'][$doc_name]==''){
                                $doc_class =  "custom-file-control";   
                                }else{
                                $doc_class =  "custom-file-control-green";    
                                }
                                ?>

                            <div class="row">
                                <div class="col-md-5" title="Upload <?php echo $doc_text;?>">
                                    <?php echo $this->Form->input('CompanyDocument.'.$doc_name ,array('required'=>false,'type'=>'file',"label"=>false, "accept"=>".pdf, image/*", 'class'=>"filestyle", 'data-placeholder'=>$doc_text)); ?>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group"> 
                                        <div class="input text">
                                            <?php echo $this->Form->input('CompanyDocument.'.$doc_name.'_expiry',array('required'=>false,'class'=>"form-control datepicker-show",  'placeholder'=>"Expiry date of ".$doc_text, "label"=>false, 'title'=>"Expiry date of ".$doc_text)); ?>

                                        </div>                                    
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <?php if($document_arr[$doc_name] !=''){?>

                                      <div class="animated-thumbnails">
                                          <a href="<?php echo SITE_URL?>img/company_files/<?php echo $owner_id.'/'.$document_arr[$doc_name]?> " title="Click to view document">
                                          <img src="<?php echo SITE_URL?>img/docs_enable.png" height="35" width="40">
                                          </a>
                                      </div>


                                    <?php }else{ ?>
                                        <img src="<?php echo SITE_URL?>img/docs_disable.png" height="35" width="40" title="No document">
                                    <?php    }?>
                                </div>
                                <div class="col-md-1">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target=".uploadDocsModal" title="Upload documents" onclick="docs_ups('Upload <?php echo $doc_text;?>', '<?php echo $doc_name; ?>')">
                                    <img src="<?php echo SITE_URL?>img/view_docs.png" height="30">
                                    </a>
                                </div>
                            </div>

                               
                            <?php } ?>

                            <div class="row">
                                <div class="col-md-12">
                                   <h4>Legal Documents:</h4>    
                                </div>
                            </div>

                            
                            <?php 
                            foreach ($company_legal_document as $doc_name => $doc_text) {
                                if($this->request->data['CompanyDocument'][$doc_name]==''){
                                $doc_class =  "custom-file-control";   
                                }else{
                                $doc_class =  "custom-file-control-green";    
                                }?>
                               
                               <div class="row">
                                    <div class="col-md-6 form-group" title="Upload <?php echo $doc_text;?>">
                                        <?php echo $this->Form->input('CompanyDocument.'.$doc_name ,array('required'=>false,'type'=>'file',"label"=>false, "accept"=>".pdf, image/*", 'class'=>"filestyle form-control", 'data-placeholder'=>$doc_text)); ?>
                                    </div>

                                    <div class="col-md-1">
                                        <?php if($document_arr[$doc_name] !=''){?>
                                        <div class="animated-thumbnails">
                                        <a href="<?php echo SITE_URL?>img/company_files/<?php echo $owner_id.'/'.$document_arr[$doc_name]?> " title="Click to view document" >
                                        <img src="<?php echo SITE_URL?>img/docs_enable.png" height="35" width="40">
                                        </a>
                                        </div>
                                        <?php }else{ ?>
                                            <img src="<?php echo SITE_URL?>img/docs_disable.png" height="35" width="40" title="No document">
                                        <?php }?>
                                    </div>

                                    <div class="col-md-1">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target=".uploadDocsModal" title="Upload documents" onclick="docs_ups('Upload <?php echo $doc_text;?>', '<?php echo $doc_name; ?>')">
                                        <img src="<?php echo SITE_URL?>img/view_docs.png" height="30">
                                        </a>
                                    </div>
                                </div>
                                
                                
                            <?php } ?>
                            

                           
                            <div class="row">
                            <div class="col-md-12">
                                    <?php echo $this->Form->button('Submit',array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
                                    
                                </div>
                                
                            </div>
                        </div>

                    <?php  echo $this->Form->end(); ?>
  
         </section>
        <!-- /.row -->
       
      </div>


    
<script type="text/javascript">
$(document).ready(function(){
    $( ".datepicker-show" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
    });

    $( "#CompanyImmigrationExpiry" ).datepicker({
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

function docs_ups(docs_txt, docs_name)
{
    $("#popup_document_title").text(docs_txt);

    if((docs_name=="moa" || docs_name=="amoa" || docs_name=="poa" || docs_name=="ejari_deed" || 
        docs_name=="other" || docs_name=="other1")){
        $('#popup_expiry_date').hide();
    }else{
        $('#popup_expiry_date').show();
    }

    $('#put_document_name').val(docs_name);
    $('#CompanyDocumentDocsFile').attr("name", "data[CompanyDocument]["+docs_name+"]");
}    


    
</script>


<!-- <div  class="modal fade viewDocsModal" role="dialog">
  <div class="modal-dialog">

     Modal content
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Documents</h4>
      </div>

      <div class="modal-body"><div class="ekko-lightbox-container" style="height: 100px;"><div class="ekko-lightbox-item fade"></div><div class="ekko-lightbox-item fade in show"><img src="https://unsplash.it/1200/768.jpg?image=250" class="img-fluid" style="width: 100%;"></div></div></div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> -->


<div  class="modal fade uploadDocsModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="popup_document_title"></h4>
      </div>
      <div class="modal-body">

      <?php echo $this->Form->create('CompanyDocument', array('url'=>array('controller'=>'companies','action'=>'upload_single_document') ,'method' => 'post', 'id'=>'jsonForm', "type" => "file", "class"=>"well form-horizontal"));  
           echo $this->Form->input('CompanyDocument.company_id' ,array('type'=>'hidden', 'value'=>$company_id));  
           echo $this->Form->input('CompanyDocument.document_name' ,array('type'=>'hidden', 'value'=>'', 'id'=>'put_document_name'));   
      ?>

            <fieldset>
                    <div class="form-group">
                        <div class="col-md-4">Select Document</div>
                        <div class="col-md-6">
                            <?php echo $this->Form->input('docs_file', array('required'=>false,'type'=>'file',"label"=>false, "accept"=>".pdf, image/*", 'class'=>"form-control")); ?>
                      </div>
                  </div>

                  <div class="clear"></div>
                  <div class="form-group" id="popup_expiry_date">
                    <div class="col-md-4">Expiry date</div>
                    <div class="col-md-6">
                        <?php echo $this->Form->input('expiry_date',array('required'=>false,'class'=>"form-control datepicker-show",  "label"=>false, "placeholder"=>"mm-dd-yyyy")); ?>
                    </div>
                  </div>

            </fieldset>
            <?php echo $this->Form->end(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="companyDocsUpload">Upload</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
    $('#companyDocsUpload').click(function(){
        $("#jsonForm").ajaxForm({
            success: function(response){ 
              //$('#display_button'+$barcode_item_det_id).html(response);
              alert('Image uploaded successfully.');
              window.location.href="<?php echo SITE_URL.'companies/edit/'.$company_id; ?>";
            }
        }).submit(); 
    });


$(function() {
  setGallery();
});

function setGallery(){
    $('.animated-thumbnails').lightGallery({
        thumbnail:true,
        animateThumb: true,
        showThumbByDefault: true,
        toggleThumb: true,
        fullScreen: true
    });
}
   
</script>