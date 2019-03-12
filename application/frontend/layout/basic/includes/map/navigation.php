     

	<header class="main-header">

        <!-- Logo -->
       <!-- <a href="<?php echo BASEURL;?>" class="logo" style="background:#fff">
         
         
        </a>-->

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
		<a href="<?php echo BASEURL;?>" class="logo1">
          <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/smoothmaps-logo.png" style="width:190px;"/>
          <span id="marker_color" style="display:none">1e90ff</span>
        </a>
<i class="fa fa-bars toggle-btn hidden-md hidden-sm hidden-lg bars-font" data-toggle="collapse" data-target="#menu-content"></i>
        			
			
			
			
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
			  
            <ul class="nav navbar-nav"> 
				
			<li class="dropdown user user-menu hidden-xs">
              <a href="<?php echo BASEURL;?>/account">
				  <span>Saved Maps </span>	
                        </a> 
              </li>
			
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
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                 
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">
				Logout  
				<?php
					 //$userdata = $this->session->userdata('userdata');
					// echo $userdata['fname'];
					// echo "&nbsp";
					 //echo $userdata['lname'];	
					 	
				?>	
				</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- Menu Footer-->
                   <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo BASEURL; ?>/account/change_password" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="pull-right">
                       <a href="<?php echo BASEURL; ?>/users/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
			
			
<div class="navbar-custom-menu" style="margin-right: 379px;"> 
		<ul class="nav navbar-nav"> 
		<li class="dropdown user user-menu hidden-xs">
		  <a href="javascript:void(0)" id="saving_map">
			  	
		  </a> 
		  </li>
		</ul>
	  </div>	
		</nav>
      </header>