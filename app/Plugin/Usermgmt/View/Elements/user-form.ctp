 <div id="hidden-login">
    <script type="text/javascript">
        document.documentElement.className += ' js-ready';
    </script>
    <div data-orbital-login class="ol-container" style ="height: 298px;">
        <?php echo $this->Html->script(array('/usermgmt/js/ajaxValidation')); ?>
        <?php echo $this->element('Usermgmt.form-login'); ?>
        <?php echo $this->element('Usermgmt.form-fb-register'); ?>
        <?php echo $this->element('Usermgmt.form-register'); ?>
        <?php echo $this->element('Usermgmt.form-lost-password'); ?>
    </div>
</div>
<script type="text/javascript" src="<?php echo SITE_URL;?>js/jquery/jquery.ui.touchpunch.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var olVars = {"isUserLoggedIn":"","passMismatchMsg":"The passwords do not match.","passEmptyMsg":"Please fill both fields with the same password.","imagesToPreload":[]};
/* ]]> */
</script>
<script type="text/javascript" src="<?php echo SITE_URL;?>js/orbital-login.js"></script>