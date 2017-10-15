<?php if(!$this->UserAuth->isAdmin()){ ?>
    <style>
        #dashboard{background-color: #3d4094;border-bottom: 4px solid #2e2c80;}
        .menu > ul > li:hover > a, .menu > ul > .current-item > a, .sub-menu li a:hover, .sub-menu .current-item a{background-color: #2e2c80;}
        .sub-menu li a:hover, .sub-menu .current-item a{background-color: #4846a0;}
        .sub-menu{background-color: #2e2c80;}
		.menu a {color: #fff;}
    </style>
<?php } ?>
<?php
    $urlPlugin = $this->params['plugin'];
    $urlAction = $this->params['action'];
	$urlController = $this->params['controller'];
	$dashboardActive = '';
	$userActive = '';
	$roleActive = '';
	$permissionActive = '';
	$settingActive = '';
	$catActive = '';
	$contactsActive = '';
    $profileActive = '';
    $cms = null;
    $reviewsActive = '';
    $userAddressesActive = '';
    $subActive = '';
    $ccompanyActive = '';
	if($urlController == 'users' && $urlAction == 'dashboard'){
		$dashboardActive = 'current-item';
	}else if((in_array($urlController, array( 'users', 'user_groups', 'user_group_permissions'))) && (in_array($urlAction, array( 'index',  'addUser', 'online', 'addGroup', 'permissions')))){
		$userActive = 'current-item';
	}else if(in_array($urlController, array( 'users')) && (in_array($urlAction, array( 'myprofile',  'editProfile', 'changePassword')))){
		$profileActive = 'current-item';
    }elseif(in_array($urlController, array( 'contacts',  'storageContacts')) ||(($urlController == 'users' && $urlAction == 'facilities'))){
        $contactsActive = 'current-item';
    }
	else if(in_array($urlController, array("contents"))) {
        $cms = 'current-item';
    }else if(in_array($urlController, array("userAddresses"))) {
        $userAddressesActive = 'current-item';
    }else if(in_array($urlController, array("companies"))) {
        $ccompanyActive = 'current-item';
    }else if(in_array($urlController, array("subscriptions"))) {
        $subActive = 'current-item';
    }else if(in_array($urlController, array("reviews", "parameters"))) {
    	$reviewsActive = 'current-item';
	}
	$storemoreAdminUserIds = unserialize(EMANDOOBI_ADMIN_GROUP_ID);
?>
<div id="dashboard">
	<div class="menu-wrap">
		<nav class="menu">
			<ul class="clearfix">
				<li class="<?php echo $dashboardActive; ?>"><?php echo $this->Html->link(__("Dashboard",true),"/dashboard") ?><a><span class="arrow">&#9660;</span></a>  
                
				</li>
				<?php   if ($this->UserAuth->isAdmin() || in_array($this->UserAuth->getGroupId(),$storemoreAdminUserIds)) { ?>
				<li class="<?php echo $userActive; ?>">
					<a href="javascript:void(0)">User <span class="arrow">&#9660;</span></a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link(__("All Roles",true),"/allGroups") ?></li>
						<li><?php echo $this->Html->link(__("All Users",true),"/allUsers") ?></li>
						<li class="<?php echo $permissionActive; ?>"><?php echo $this->Html->link(__("Permissions",true),"/permissions") ?></li>
					</ul>
				</li>

				<?php   if ($this->UserAuth->isAdmin() || in_array($this->UserAuth->getGroupId(),$storemoreAdminUserIds)) { /*?>
                    <li class="<?php echo $ccompanyActive; ?>">
                        <a href="#">Companies <span class="arrow">&#9660;</span></a>
                        <ul class="sub-menu">
                            <li><?php echo $this->Html->link(__("All Company",true),"/companies/all") ?></li>
                           
                        </ul>
                    </li>
                <?php */ } ?>

                <?php   if ($this->UserAuth->isAdmin() || in_array($this->UserAuth->getGroupId(),$storemoreAdminUserIds)) { ?>
                    <li class="<?php echo $subActive; ?>">
                        <a href="#">Subscriptions <span class="arrow">&#9660;</span></a>
                        <ul class="sub-menu">
                            <li><?php echo $this->Html->link(__("All Plans",true),"/subscriptions/all") ?></li>
                            <li><?php echo $this->Html->link(__("Selected Plans",true),"/subscriptions/selected_plan") ?></li>
							<li><?php echo $this->Html->link(__("Invoices",true),"/invoices/all") ?></li>                           
                        </ul>
                    </li>
                <?php } ?>

                <?php } ?>
                				
				<li class="<?php echo $profileActive; ?>">
					<a href="#">Profile <span class="arrow">&#9660;</span></a>
					<ul class="sub-menu">
						<li><?php echo $this->Html->link(__("Profile",true),"/myprofile") ?></li>
						<li><?php echo $this->Html->link(__("Edit Profile",true),"/editProfile") ?></li>
						<li><?php echo $this->Html->link(__("Change Password",true),"/changePassword") ?></li>
					</ul>
				</li>
				<li><?php echo $this->Html->link(__("Sign Out",true),"/logout") ?></li>
			</ul>
		</nav>
	</div>
	<div style="clear:both"></div>
</div>