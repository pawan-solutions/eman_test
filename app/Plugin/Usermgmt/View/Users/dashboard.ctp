<?php if (isset($isUser)) { ?>
    <?php echo $this->element('user_dashboard'); ?>
       
<?php } else { ?>
    <div class="umtop">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->element('dashboard'); ?>
                    <div class="um_box_up"></div>
                    <div class="um_box_mid radius-all">
                        <div class="um_box_mid_content_top">
                            <span class="umstyle1"><?php echo __('Dashboard'); ?></span>
                            <span class="umstyle2" style="float:right"><?php //echo $this->Html->link(__("Home", true), "/") ?></span>
                            <div style="clear:both"></div>
                        </div>
                        <div class="head-border"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="um_box_down"></div>
    </div>
<?php } ?>


