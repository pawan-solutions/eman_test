<?php
$class = ( isset( $_GET['form'] ) && $_GET['form'] == 'fb-register' ) ? '' : 'hidden';
$qa = array( 'loggedin', 'registered', 'loggedout', 'passwordreset', 'passwordchanged', 'activated', 'userupdated' );
?>

<form class="ol-fb-register-form ol-form <?php echo $class; ?>" method="post" action="" id="fb-register">
        <h4 class="ol-form-title">
                Register with Facebook
        </h4>

        <fieldset class="form-actions">

                <?php echo $this->element('Usermgmt.provider'); ?>

        </fieldset>

        <div class="ol-form-nav">
                <a class="ol-form-nav-link ol-login-link" data-type="switch-form" data-form="login" href="<?php echo SITE_URL;?>login">Already a member? Sign in &raquo;</a>
        </div>

</form>