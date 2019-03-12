     

	<header class="main-header">

        <!-- Logo -->
        <a href="<?php echo BASEURL;?>" class="logo hidden-xs" style="background:#000">
         
         
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation" style="background:#000;">
		<a href="<?php echo BASEURL;?>" class="logo1"  style="">
          <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/white_logo_transparent_background.png" style="width:190px;"/>
         
        </a>
			 	
          <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
		  
		 <!--  <a href="index.html" class="nav-home-tab hidden-xs">
                  <i class="fa fa-home"></i> Home
                </a>
		  <a href="map.html" class="nav-home-tab hidden-xs">
                  <i class="fa fa-street-view"></i> Maps
                </a>
						  <a href="#" class="nav-home-tab hidden-xs">
                  <i class="fa fa-server"></i> Data
                </a>
		  -->
			  
		 
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
			  
            <ul class="nav navbar-nav"> 
              <!-- Messages: style can be found in dropdown.less-->
			  <li class="dropdown messages-menu hidden-xs">
                <!-- Menu toggle button -->
               
              </li><!-- /.messages-menu -->
              <li class="dropdown messages-menu hidden-xs">
                <!-- Menu toggle button -->
                
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                       
                      </li><!-- end message -->
                    </ul><!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li><!-- /.messages-menu -->
			  

              <!-- Notifications Menu -->
              
              
              <!-- Notifications Menu -->
              <!-- User Account Menu -->
			   <li class="dropdown user user-menu hidden-xs">
			  <a style="color:#fff;font-size: 16px;">
				<?php 
				  $user_data = $this->session->userdata('userdata');
				  echo "Welcome ".$user_data['fname'].' '.$user_data['lname'];
				  ?>
				</a>
			  </li>
              <li class="dropdown user user-menu hidden-xs">
			  <a href="<?php echo BASEURL; ?>/users/logout" style="color:#fff;font-size: 16px;">Logout</a>
               
               <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                  <span class="">
				Logout	  
				<?php
					 /*$userdata = $this->session->userdata('userdata');
					 echo $userdata['fname'];
					 echo "&nbsp";
					 echo $userdata['lname'];*/
					 	
				?>
				</span>
                </a>
                <ul class="dropdown-menu ">
                 
                   <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo BASEURL; ?>/account/change_password" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="pull-right">
                       <a href="<?php echo BASEURL; ?>/users/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul> -->
              </li>
              
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>