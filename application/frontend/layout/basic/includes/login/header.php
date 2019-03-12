<?php  $userdata = $this->session->userdata('userdata');  ?>
<body>
<header>
<div class="bs-example bs-navbar-top-example" data-example-id="navbar-fixed-to-top">
    <nav class="navbar navbar-default navbar-fixed-top">
      <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
      <div class="container">
      <div class="col-sm-5 col-xs-12 col-inner">
        <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo 	BASEURL ?>"><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/new/img/ecommission-logo.png"  /></a>
        </div>
      </div>
     <div class="col-sm-7 col-xs-12 col-inner pull-right">
     <div class="row">
     <ul class="top-nav ">
	 <?php if(empty($userdata)){  ?>
	        <li><a href="<?php echo base_url(); ?>users/register"><i class="fa fa-lock"></i> Join</a></li>
            <li><a href="<?php echo base_url(); ?>users/login"><i class="fa fa-unlock-alt"></i> Login</a></li>
	 <?php }else{ ?>
	        <li><a href="#"><?php  echo $userdata['display_name']  ?></a></li>
            <li><a href="<?php echo base_url(); ?>users/logout"><i class="fa fa-unlock-alt"></i> Logout</a></li>
	 <?php } ?>

      
      
     </ul>
     </div>
     
      <div class=" row">
       
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?php echo BASEURL ; ?>/#process">How it Works</a></li>
            <li><a href="<?php echo BASEURL ; ?>">How We Help</a></li>
            <li><a href="<?php echo BASEURL ; ?>">Alliances</a></li>
            <li><a href="<?php echo BASEURL ; ?>/#videos">Who We Are</a></li>
          </ul>
        </div>
      </div>
     
     </div>
        <!-- /.navbar-collapse -->
      </div>
    </nav>
  </div>
</header>