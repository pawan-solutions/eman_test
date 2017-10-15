<style>
    .modal.in .modal-dialog{
        z-index: 9999;
    }
    label, .error{float:left;width:auto;}
	.tooltip.right .tooltip-inner {background-color:#3d4094;}
	.tooltip.right .tooltip-arrow {border-right-color: #3d4094;}
    form .error, form .error-message {
        color: #9e2424;
    }
</style>
<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
	})
</script>
<section id="footerSection">
    <footer>
    <div class="container">   
        <div class="row double">
            <div class="col-sm-8">
                <div class="sec12">
                    <h3>About Us</h3>
                    <hr>
                    <p>No wasting time looking for warehouses. No dealing with transporters and labour. No security deposits and lock-in periods. We’re here to make storage easy for you. Look for multiple options on a single platform. Book the space you like. And then store your goods for as long – or as short a time – as you need. Use the online inventory to get your goods back whenever you need them. All from the comfort of your home—or office.</p>
                </div>
                <div class="row">
                    <div class="col-sm-3 border-right">
                        <h3>Help</h3>
                        <ul class="alt">
                            <li><?php echo $this->Html->link ("Payments", "/content/payment-cancellation-refunds");?></li>   
                            <li><?php echo $this->Html->link ("Cancellation & Refund", "/content/payment-cancellation-refunds#cancellation");?></li>
							<li><?php echo $this->Html->link ("FAQs", "/content/faqs");?></li>
							<li><?php echo $this->Html->link ("Packing Tips", "/content/".PACKING);?></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 border-right">
                        <h3>Storage by Type</h3>
                        <ul class="alt">
							<li><?php echo $this->Html->link("Box Storage","/content/".BOX);?> </li>
							<li><?php echo $this->Html->link("Household Storage","/content/".HOUSEHOLD);?></li>
							<li><?php echo $this->Html->link("Car Storage","/content/".CAR);?></li>
							<li><?php echo $this->Html->link("Inventory Storage","/content/".INVENTORY);?></li>
                                                                                
                        </ul>
                    </div>
                    <div class="col-sm-3 sec4">
                        <h3>StoreMore</h3>
                        <ul class="alt">                           
							<li>
                                <a class="js-form-directions-modal" href="" data-toggle="modal" data-target="#myModalContact">
                                    Contact Us
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="myModalContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h3 class="modal-title" id="myModalLabel">Contact Us</h3>
                                        </div>
										<div class="modal-body">
                                        <?php echo $this->Form->create('Contact', array('action' => 'saveContact', 'id'=>'contactForm', 'div'=>'false', 'class'=>'form-horizontal', 'inputDefaults' => array('legend'=>false, 'label' => false,'div' => false,))); ?>
                                            <div id="flash_message" style="color:green; text-align: center;"></div>
                                            <div class="form-group js-required-field">
                                                <label class="col-sm-3 control-label">Type</label>
                                                <?php $contactTypes = unserialize(CONTACT_TYPES);?>
                                                <div class="col-sm-8" ><?php echo $this->Form->input("type" ,array('type'=>'select', 'div'=>'false', 'empty'=>'Please Select', 'options'=>$contactTypes, 'class'=>"form-control" ))?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="form-group js-required-field">
                                                <label class="col-sm-3 control-label">Name</label>
                                                <div class="col-sm-8" ><?php echo $this->Form->input("name" ,array('type'=>'text', 'div'=>'false', 'class'=>"form-control" ))?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="form-group js-required-field">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-8" ><?php echo $this->Form->input("email" ,array('type'=>'text', 'div'=>'false', 'class'=>"form-control" ))?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="form-group js-required-field">
                                                <label class="col-sm-3 control-label">Phone</label>
                                                <div class="col-sm-8" ><?php echo $this->Form->input("phone" ,array('type'=>'text', 'div'=>'false', 'class'=>"form-control" ))?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="form-group js-required-field">
                                                <label class="col-sm-3 control-label">Message</label>
                                                <div class="col-sm-8" ><?php echo $this->Form->input("message" ,array('type'=>'textarea', 'div'=>'false', 'class'=>"form-control"))?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <?php echo $this->Js->get("#contactForm")->event(
                                                                    'submit',
                                                                    $this->Js->request(
                                                                            array('plugin'=>'','controller'=>'contacts', 'action' => 'saveContact'),
                                                                            array(
                                                                                'data' => $this->Js->get("#contactForm")->serializeForm(array('isForm' => true, 'inline' => true)),
                                                                                'async' => true,
                                                                                'dataExpression'=>true,
                                                                                'method' => 'POST',
                                                                                "success" => "javascript:processFormModel(data)"
                                                                            )
                                                                            
                                                                    )
                                                            );?>
                                                <?php echo $this->Form->Submit('Submit' ,array('class'=>'btn orange-btn')); ?>
                                                <?php echo $this->Form->end();?>
                                            </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                             </li>
							 <li><?php echo $this->Html->link ("About Us", "/content/about-us");?></li>
							 <li><a href="https://hellostoremore.wordpress.com/2015/04/25/storemore-featured/" target="_blank">Blog</a><?php //echo $this->Html->link ("Blog", "/content/blog");?></li>
							 <li><a href="<?php echo SITE_URL.'storage_spaces/marketing'; ?>">Add Your Facility</a></li>	
						
                            <!--<li><?php //echo $this->Html->link ("Terms & Conditions", "/content/terms-conditions");?></li>   -->                        
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="sec12 col-xs-offset-2">
                    <h3>CALL US NOW</h3>
                    <hr>
                    <h2>95550 22330</h2>
                    <span class="mail"><a href="mailto:info@storemore.in">info@storemore.in</a></span>
                    <ul class="icons">                        
                        <li>
                            <a href="https://www.facebook.com/StoreMore" target="_blank" class="icon fa-facebook" data-toggle="tooltip" data-placement="right" title="Facebook">
                                <span class="label">Facebook</span>
                            </a>
                        </li>
						<li>
                            <a href="https://plus.google.com/118435042903319224675/posts" target="_blank" class="icon fa-gmail" data-toggle="tooltip" data-placement="right" title="Google Plus">
                                <span class="label">Google Plus</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://in.linkedin.com/company/storemore-storage-solutions-pvt-ltd-" target="_blank" class="icon fa-linkedin" data-toggle="tooltip" data-placement="right" title="Linkedin">
                                <span class="label">Linkedin</span>
                            </a>
                        </li>
						<li>
                            <a href="https://twitter.com/storemoredelhi" class="icon fa-twitter" target="_blank" data-toggle="tooltip" data-placement="right" title="Twitter">
                                <span class="label">Twitter</span>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                   
                   


                </div>
            </div>
            </div>	
        </div>
    </footer>
     <div class="clearfix"></div>
    <div class="text-center footerLast">
        <div class="container"> 
		  &copy; 2015 StoreMore Storage Solutions Pvt. Ltd., All Rights Reserved | <?php echo $this->Html->link ("Terms & Conditions", "/content/terms-conditions");?> | <?php echo $this->Html->link ("Privacy Policy", "/content/privacy-policy/", array("target" => "_blank"));?> | <?php echo $this->Html->link ("Disclaimer", "/content/disclaimer");?> 
		</div>
    </div>
</section>
<?php echo $this->element("share_code"); ?>
<?php echo $this->Js->writeBuffer();?>