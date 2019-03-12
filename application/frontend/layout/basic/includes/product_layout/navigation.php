<?php $userdata = $this->session->userdata('userdata'); ?>
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
              <li><a href="<?php echo BASEURL;?>/pages/renew_lenses" title="Refill Lenses">Refill Lenses</a></li>
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

<!--Product Bar-->
<div id="product">
<div class="product-nav">
  <div class="container">
    <div class="hidden-xs">
      <ul>
        <li>
          <h4>Gender <i class="fa fa-angle-down" aria-hidden="true"></i></h4>
          <ul class="fillter-list">
            <li>
              <input type="checkbox" name="Genders[]" value="all" id="checkbox8" class="css-checkbox filters" />
              <label for="checkbox8" class="css-label filters">All Genders </label>
            </li>
            <li>
              <input type="checkbox" name="Genders[]" value="female" id="checkbox9" class="css-checkbox filters" />
              <label for="checkbox9" class="css-label">female</label>
            </li>
            <li>
              <input type="checkbox" name="Genders[]" value="male" id="checkbox10" class="css-checkbox filters" />
              <label for="checkbox10" class="css-label">male </label>
            </li>
          </ul>
        </li>
        <li>
          <h4>Frame shape <i class="fa fa-angle-down" aria-hidden="true"></i></h4>
          <ul class="fillter-list">
            <?php	foreach($shapes as $key => $val){ ?>
            <li>
              <input type="checkbox" name="shapes[]" id="shapes_<?php echo $val['id']; ?>" value="<?php echo $val['id']; ?>" class="css-checkbox filters" />
              <label for="shapes_<?php echo $val['id']; ?>" class="css-label"><?php echo $val['name']; ?> </label>
            </li>
            <?php } ?>
          </ul>
        </li>
        <li>
          <h4>Brand <i class="fa fa-angle-down" aria-hidden="true"></i></h4>
          <ul class="fillter-list">
            <?php	foreach($brands as $key => $val){ ?>
            <li>
              <input type="checkbox" name="brands[]" id="brand_<?php echo $val['id']; ?>" value="<?php echo $val['id']; ?>" class="css-checkbox filters" />
              <label for="brand_<?php echo $val['id']; ?>" class="css-label"><?php echo $val['name']; ?> </label>
            </li>
            <?php } ?>
          </ul>
        </li>
        <li>
        <h4>Price <i class="fa fa-angle-down" aria-hidden="true"></i></h4>
        <ul class="fillter-list">
          <input type="checkbox" name="Price" id="checkbox20" value="0-50" class="css-checkbox filters" />
          <label   for="checkbox20" class="css-label">$0 to $50</label>
          </li>
          </li>
          <li>
            <input type="checkbox" name="Price" id="checkbox21" value="50-100" class="css-checkbox filters" />
            <label   for="checkbox21" class="css-label">$50 to £$100</label>
          </li>
          </li>
          <li>
            <input type="checkbox" name="Price" id="checkbox22" value="100-200" class="css-checkbox filters" />
            <label  for="checkbox22" class="css-label">$100 to $200</label>
          </li>
          </li>
          <li>
            <input type="checkbox" name="Price" id="checkbox23" value="200-300" class="css-checkbox filters" />
            <label  for="checkbox23" class="css-label">$200 to $300</label>
          </li>
          <li>
            <input type="checkbox" name="Price" id="checkbox24" value="300-" class="css-checkbox filters" />
            <label   for="checkbox24" class="css-label">Above $300</label>
          </li>
        </ul>
        </li>
        <li>
          <h4>Colour <i class="fa fa-angle-down" aria-hidden="true"></i></h4>
          <ul class="fillter-list">
            <?php	foreach($colours as $key => $val){ ?>
            <li>
              <input type="checkbox" name="colour[]" id="colours_<?php echo $val['id']; ?>" value="<?php echo $val['id']; ?>" class="css-checkbox filters" />
              <label for="colours_<?php echo $val['id']; ?>" class="css-label"><?php echo $val['name']; ?> </label>
            </li>
            <?php } ?>
            <!--   <li>
					<ul class="color-fillter">
					<li> <button type="button" class="btn green" data-toggle="tooltip" data-placement="bottom" title="Green"></button></li>
					<li><button type="button" class="btn red" data-toggle="tooltip" data-placement="bottom" title="Red"></button></li>
					<li><button type="button" class="btn blue" data-toggle="tooltip" data-placement="bottom" title="Blue"></button></li>
					<li><button type="button" class="btn pink" data-toggle="tooltip" data-placement="bottom" title="Pink"></button></li>
					<li><button type="button" class="btn black" data-toggle="tooltip" data-placement="bottom" title="Black"></button></li>
					<li><button type="button" class="btn yellow" data-toggle="tooltip" data-placement="bottom" title="Yellow"></button></li>
					</ul>
					</li>
				-->
          </ul>
        </li>
        <!--<li>              //was commented
			<h4>Brand <i class="fa fa-angle-down" aria-hidden="true"></i></h4>
			<ul class="fillter-list">
			<?php	foreach($brands as $key => $val){ ?>
				<li>
				<input type="checkbox" name="brands[]" id="brands_<?php echo $val['id']; ?>" value="<?php echo $val['id']; ?>" class="css-checkbox filters" />
				<label for="brands_<?php echo $val['id']; ?>" class="css-label"><?php echo $val['name']; ?>   </label>
				</li>
			<?php } ?>
			</ul>
		</li>-->
      </ul>
    </div>
    <div class="hidden-md hidden-sm hidden-lg">
      <div class="col-sm-3 account col">
        <div class="row hidden-xs" style="margin:0px;">
          <h3  style="border-bottom:1px solid #ccc;">My Account </h3>
          <ul>
            <li>Account Dashboard</li>
            <li>Account Information</li>
            <li> Address Book</li>
            <li>My Orders</li>
            <li>My Product Reviews</li>
            <li>My Wishlists</li>
            <li>Merchandise Credit</li>
            <li>Gift Card</li>
            <li>Manage My Cards</li>
          </ul>
        </div>
        <div class="row hidden-sm hidden-md hidden-lg" style="margin:0px;">
          <div id="profile">
            <div class="col-xs-12 left-navbar">
              <h3  style="border-bottom:1px solid #ccc;">My Account </h3>
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div id="bs-example" class="navbar-collapse collapse"  style="padding: 0px;">
                <ul class="nav navbar-nav">
                  <li class="dropdown"> <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> POPULAR </a>
                    <ul class="dropdown-menu" aria-labelledby="drop2">
                      <li> <a href="#">Action</a> </li>
                      <li> <a href="#">Another action</a> </li>
                      <li> <a href="#">Something else here</a> </li>
                      <li role="separator" class="divider"></li>
                      <li> <a href="#">Separated link</a> </li>
                    </ul>
                  </li>
                  <li class="dropdown"> <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> GENDER </a>
                    <ul class="dropdown-menu" aria-labelledby="drop2">
                      <li> <a href="#">Action</a> </li>
                      <li> <a href="#">Another action</a> </li>
                      <li> <a href="#">Something else here</a> </li>
                      <li role="separator" class="divider"></li>
                      <li> <a href="#">Separated link</a> </li>
                    </ul>
                  </li>
                  <li class="dropdown"> <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> FRAME SHAPE </a>
                    <ul class="dropdown-menu" aria-labelledby="drop2">
                      <li> <a href="#">Action</a> </li>
                      <li> <a href="#">Another action</a> </li>
                      <li> <a href="#">Something else here</a> </li>
                      <li role="separator" class="divider"></li>
                      <li> <a href="#">Separated link</a> </li>
                    </ul>
                  </li>
                  <li class="dropdown"> <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> PRICE </a>
                    <ul class="dropdown-menu" aria-labelledby="drop2">
                      <li> <a href="#">Action</a> </li>
                      <li> <a href="#">Another action</a> </li>
                      <li> <a href="#">Something else here</a> </li>
                      <li role="separator" class="divider"></li>
                      <li> <a href="#">Separated link</a> </li>
                    </ul>
                  </li>
                  <li class="dropdown"> <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> COLOUR </a>
                    <ul class="dropdown-menu" aria-labelledby="drop2">
                      <li> <a href="#">Action</a> </li>
                      <li> <a href="#">Another action</a> </li>
                      <li> <a href="#">Something else here</a> </li>
                      <li role="separator" class="divider"></li>
                      <li> <a href="#">Separated link</a> </li>
                    </ul>
                  </li>
                  <li class="dropdown"> <a id="drop2" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> BRAND </a>
                    <ul class="dropdown-menu" aria-labelledby="drop2">
                      <li> <a href="#">Action</a> </li>
                      <li> <a href="#">Another action</a> </li>
                      <li> <a href="#">Something else here</a> </li>
                      <li role="separator" class="divider"></li>
                      <li> <a href="#">Separated link</a> </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ul>
      </ul>
    </div>
  </div>
</div>

