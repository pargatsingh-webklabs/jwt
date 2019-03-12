<?php $userdata = $this->session->userdata('userdata'); ?>

<!--top bar-->
<div class="top_bar">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="top_number"><i class="fa fa-phone"></i> <a href="tel:8043554383">804.355.4383</a></div>
      </div>
      <div class="col-sm-6">
        <ul class="top-menu">
          <li><a href="<?php echo BASEURL; ?>/pages/help">Help</a></li>
          <li><a href="<?php echo BASEURL; ?>/users/myorder">Track Order</a></li>
          <li><a  href="<?php echo (!empty($userdata) && $userdata['type']!="guest")?BASEURL.'/account/dashboard':BASEURL.'/users/login'; ?>" > My Account </a> 
            <!-- <ul class="dropdown-menu" aria-labelledby="drop2">
								<li><a href="<?php echo BASEURL ?>/users/login">Sign In</a></li>
								<li><a href="<?php echo BASEURL ?>/users/register">Create a new account</a></li>
							</ul>--> </li>
          <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
          <li><a href="<?php echo BASEURL ?>/cart/cart_detail">
            <?php $cart_data = $this->cart->contents();
          $count = 0;
          $count= count($cart_data); ?>
            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>(<?php echo $count; ?>) </a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!--Header-->
<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-xs-10">
        <div class="logo"><a href="<?php echo BASEURL ; ?>" title="Welcome to Clearvuoptical"><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/logo.png" class="img-responsive" alt="Clearvuoptical"/></a></div>
      </div>
      <div class="col-xs-2 mobie-menu">
        <nav class="navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
        </nav>
      </div>
      <div class="col-sm-6">
        <nav>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="#" class="active" title="Home">Home</a></li>
              <li><a href="<?php echo BASEURL;?>/product/?gender=male" class="dropdown-toggle" title="Mens" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mens <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?php echo BASEURL;?>/product/?gender=male&cate_gory=eye glasses"> Eye Glasses</a></li>
                  <li><a class="dropdown-item" href="<?php echo BASEURL;?>/product/?gender=male&cate_gory=sun  glasses"> Sun Glasses</a> </li>
                </ul>
              </li>
              <li><a href="<?php echo BASEURL;?>/product/?gender=female" title="Females" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Females <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?php echo BASEURL;?>/product/?gender=female&cate_gory=eye glasses"> Eye Glasses</a></li>
                  <li><a class="dropdown-item" href="<?php echo BASEURL;?>/product/?gender=female&cate_gory=sun glasses"> Sun Glasses</a></li>
                </ul>
              </li>
              <li><a href="<?php echo BASEURL;?>/pages/renew_lenses" title="Refill Lenses">Renew Lenses</a></li>
              <li><a href="<?php echo BASEURL; ?>/pages/contact" title="Contact us">Contact us</a></li>
            </ul>
             </div>
        </nav>
      </div>
      <div class="col-sm-3">
        <form class="search-input search-form" name="filters" id="filters" action="<?php echo BASEURL.'/product/'; ?>" method="GET">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="keywords or model...">
            <button class="form-control-feedback" aria-hidden="true"><i class="fa fa-search" aria-hidden="true"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
