<?php echo $this->Html->script(array('/usermgmt/js/ajaxValidation')); ?>
<?php echo $this->element('ajax_validation', array("formId" => "editProfileForm", "submitButtonId" => "editProfileSubmitBtn")); ?>
<!-- Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Edit Profile</h3>
            </div>
            <div class="modal-body">
                <div class="um_box_mid_content">
                    <div class="um_box_mid_content_mid" id="register">
                        <?php echo $this->Form->create('User', array('url' => array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editProfile'), 'type' => 'file', 'id' => 'editProfileForm', 'class' => 'form-horizontal')); ?>
                        <?php echo $this->Form->input("id", array('type' => 'hidden', 'label' => false, 'div' => false)) ?>
                        <?php echo $this->Form->input("UserDetail.id", array('type' => 'hidden', 'label' => false, 'div' => false)) ?>
                        <div class="form-group">
                            <div class="col-sm-4 required"><?php echo $this->Form->label(__('First Name')); ?></div>
                            <div class="col-sm-8" ><?php echo $this->Form->input("first_name", array('label' => false, 'div' => false, 'class' => "form-control input-sm")) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 required"><?php echo $this->Form->label(__('Last Name')); ?></div>
                            <div class="col-sm-8" ><?php echo $this->Form->input("last_name", array('label' => false, 'div' => false, 'class' => "form-control input-sm")) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 required"><?php echo $this->Form->label(__('Email')); ?></div>
                            <div class="col-sm-8" ><?php echo $this->Form->input("email", array('label' => false, 'div' => false, 'class' => "form-control input-sm", "readOnly")) ?>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 required"><?php echo $this->Form->label(__('Gender')); ?></div>
                            <div class="col-sm-4"><?php echo $this->Form->input("UserDetail.gender", array('label' => false, 'div' => false, 'type' => 'select', 'class' => "form-control input-sm", 'options' => $this->Custom->getGenders())) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><?php echo $this->Form->label(__('Birthday')); ?></div>
                            <div class="col-sm-8" >
                                <?php 
                                echo $this->Form->input("UserDetail.bday", 
                                    array(
                                        'label' => false, 
                                        'class' => 'form-control datebox', 
                                        'div' => false, 
                                        'dateFormat' => 'DMY', 
                                        'minYear' => date('Y') - 100, 
                                        'maxYear' => date('Y') - 13,
                                        "empty" => "",
                                        "default" => ""
                                       )
                                    ) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><?php echo $this->Form->label(__('Cellphone')); ?></div>
                            <div class="col-sm-8" ><?php echo $this->Form->input("UserDetail.cellphone", array('label' => false, 'div' => false, 'class' => "form-control input-sm", 'maxLength'=>'10')) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><?php echo $this->Form->label(__('Location')); ?></div>
                            <div class="col-sm-8" ><?php echo $this->Form->input("UserDetail.location", array('label' => false, 'div' => false, 'class' => "form-control input-sm")) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><?php echo $this->Form->label(__('Photo')); ?></div>
                            <div class="col-sm-8"><?php echo $this->Form->input("UserDetail.photo", array('label' => false, 'type' => 'file', 'class' => "form-control input-sm user-photo")) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><?php echo $this->Form->label(__('Web Page')); ?></div>
                            <div class="col-sm-8" ><?php echo $this->Form->input("UserDetail.web_page", array('label' => false, 'div' => false, 'type' => 'text', 'class' => "form-control input-sm")) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8"><?php echo $this->Form->Submit(__('Update Profile'), array('id' => 'editProfileSubmitBtn', 'class' => 'btn orange-btn')); ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
