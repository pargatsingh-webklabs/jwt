
<input type="hidden" value="<?php echo $userdata['id'] ?>" name="id">
<!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" style=" height: 124px !important ;">
                <div class="image">
                    <img src="<?php echo THEME_URL?>/assets/images/user.png" width="80" height="80" alt="User" />
					<span><b>Welcome , <?php echo $userdata['first_name']." ".$userdata['last_name'];?></b></span>
                </div>
                <div class="info-container">
                        <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo BASEURL ?>/profile"><i class="material-icons">person</i>Profile</a></li>
                            <li><a href="<?php echo BASEURL ?>/users/changePassword" class=""><i class="material-icons">person</i>Change Password</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo BASEURL ?>/dashboard/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
					<li>
                        <a href="<?php echo BASEURL ?>/profile">
                            <i class="material-icons">person</i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASEURL ?>/users">
                            <i class="material-icons">group</i>
                            <span>Manage Users</span>
                        </a>
			
                    </li>
                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">photo_library</i>
                            <span>Products</span>
                        </a>
						   <ul class="ml-menu">
							<li>
                                <a href="<?php echo BASEURL ?>/product/list_">List Products</a>
                            </li>
                            <li>
                                <a href="<?php echo BASEURL ?>/product">Add Products</a>
                            </li>
                        </ul>

                    </li>
					<li>
                        <a href="<?php echo BASEURL ?>/upload">
                            <i class="material-icons">cloud_upload</i>
                            <span>Uploads</span>
                        </a>
                    </li>
					<li>
                        <a href="<?php echo BASEURL ?>/settings">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo BASEURL ?>/template" class="">
                            <i class="material-icons">assignment</i>
                            <span>Email Templates</span>
                        </a>
						 <ul class="ml-menu">
                            <li>
                                <a href="<?php echo BASEURL ?>/template/add">Add New Template</a>
                            </li>
                            <li>
                                <a href="<?php echo BASEURL ?>/template">List Templates</a>
                            </li>

                        </ul>

                    </li>
  
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y'); ?> <a href="javascript:void(0);"><?php echo SITENAME;?></a>.
                </div>
                
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
