<?php echo $this->Html->script(array('/usermgmt/js/ajaxValidation')); ?>
<?php echo $this->element('ajax_validation', array("formId" => "UserChangePasswordForm", "submitButtonId" => "changePasswordSubmitBtn")); ?>
<!-- Modal -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Change Password</h3>
            </div>
            <div class="modal-body">
                <div class="um_box_mid_content">
                    <div class="um_box_mid_content_mid" id="register">                    
                        <?php echo $this->Form->create('User', array('action' => 'changePassword')); ?>
                        <div class="form-group">
                            <div class="col-sm-4"><?php echo __('Old Password'); ?></div>
                            <div class="col-sm-8"><?php echo $this->Form->input("oldpassword", array("type" => "password", 'label' => false, 'div' => false, 'class' => "form-control input-sm")) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><?php echo __('New Password'); ?></div>
                            <div class="col-sm-8"><?php echo $this->Form->input("password", array("type" => "password", 'label' => false, 'div' => false, 'class' => "form-control input-sm")) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"><?php echo __('Confirm Password'); ?></div>
                            <div class="col-sm-8"><?php echo $this->Form->input("cpassword", array("type" => "password", 'label' => false, 'div' => false, 'class' => "form-control input-sm")) ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8"><?php echo $this->Form->Submit(__('Change Password'), array('id' => 'changePasswordSubmitBtn', 'class' => 'btn orange-btn')); ?></div>
                            <div style="clear:both"></div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>