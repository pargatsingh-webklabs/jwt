<style>
.w-nav-menu.nav-menu a
	{
	font-family:"Reem Kufi",sans-serif !important;
	}	
</style>
<div class="fix-header" id="">
    <div class="w-container">
      <div class="w-nav" data-collapse="medium" data-animation="default" data-duration="400"></div>
    </div>
  </div>


  <div class="fixed-header">
    <div class="new-menus col-xs">
      <div class="w-row">

       <!--///////////////////////////////////////////////////////
       // Logo section 
       //////////////////////////////////////////////////////////-->


        <div class="col-md-3 col-xs-4 logo">
          <a href="#" ><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/MM_smoothmaps-01.png" class="smooth-logo" /></a>
        </div>

        <!--///////////////////////////////////////////////////////
       // End Logo section 
       //////////////////////////////////////////////////////////-->

        <div class="col-md-9 col-xs nav-menu">

       <!--///////////////////////////////////////////////////////
       // Menu section 
       //////////////////////////////////////////////////////////-->


         <div class="w-nav navbar" data-collapse="medium" data-animation="default" data-duration="400" data-contain="1">
            <div class="w-container nav">
              <nav class="w-nav-menu nav-menu" role="navigation">

              
                 <a class="w-nav-link menu-li" href="<?php echo BASEURL ?>">HOME</a>
                <a class="w-nav-link menu-li" href="<?php echo BASEURL ?>/examples">EXAMPLES</a>
                <a class="w-nav-link menu-li" href="<?php echo BASEURL ?>/pricing">PRICING</a>
                <a class="w-nav-link menu-li"href="<?php echo BASEURL ?>/faq">FAQ</a>
                <a class="w-nav-link menu-li" href="<?php echo BASEURL ?>/blogs">BLOG</a>
				<a class="w-nav-link menu-li" href="<?php echo BASEURL ?>/contact_us">CONTACT US</a>  
                <a class="hvr-sweep-to-right w-nav-link menu-li border1" href="<?php echo BASEURL ?>/users/login">
				<?php 
					$logged_in = $this->session->userdata('userdata');
					echo($logged_in) ? 'MY ACCOUNT' : 'LOGIN <i class="fa fa-sign-in" aria-hidden="true" style="margin-left:5px;"></i>' ;
				?>	
				</a>
              </nav>
              <div class="w-nav-button">
                <div class="w-icon-nav-menu"></div>
              </div>
            </div>
          </div>


          <!--///////////////////////////////////////////////////////
       // End Menu section 
       //////////////////////////////////////////////////////////-->


        </div>
      </div>
    </div>
  </div>