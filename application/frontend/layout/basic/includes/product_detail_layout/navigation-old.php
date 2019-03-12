<?php $userdata = $this->session->userdata('userdata'); ?>
<nav class="navbar navbar-default navbar-fixed-top"> 
	<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false"> 
		<span class="sr-only">Toggle navigation</span>ClearVu Optical Co. <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
	</button> <a class="navbar-brand" href="#"> </a> 
	</div> 
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
	<div class="container">
		<div class="row blog">
			<div class="col-sm-4" style="margin-top:5px;">
				<ul class="nav navbar-nav">
					<li class=""><a href="<?php echo BASEURL;?>/product/?gender=male">MEN <div class="iconss"><i class="fa fa-sort-desc" aria-hidden="true">
                    </i></div>
</a>
                    <ul class="drop">
                    <li><a href="#"> Sun Glasses</a></li>
                    <li><a href="#"> Eye Glasses</a></li>
                    </ul>
                    
                    
                    </li>
					<li><a href="<?php echo BASEURL;?>/product/?gender=female">WOMEN <div class="iconss"> <i class="fa fa-sort-desc" aria-hidden="true"></i></div>
</a>
                    <ul class="drop">
                    <li><a href="#"> Sun Glasses</a></li>
                    <li><a href="#"> Eye Glasses</a></li>
                    </ul>
                    </li>
                    
					<li class="renew"><a href="<?php echo BASEURL;?>/pages/renew_lenses">RENEW LENSES</a></li>
				</ul> 
			</div>
			<div class="col-sm-4 co">
					<h5><a href="<?php echo BASEURL ; ?>" style="color:#000;">ClearVu Optical Co.</a></h5>
			</div>
			<div class="col-sm-4 cart">
				<ul><li class="dropdown">
					<a id="drop2" href="<?php echo BASEURL ?>/cart/cart_detail" class="dropdown-toggle">    <?php $cart_data = $this->cart->contents();
          $count = 0;
          $count= count($cart_data); ?>	
	CART(<?php echo $count; ?>)
						</a> <ul class="dropdown-menu" aria-labelledby="drop2">
						<li><a href="#">Action</a></li> <li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul> </li>

						<li class="dropdown">
							<a  href="<?php echo (!empty($userdata))?BASEURL.'/account/dashboard':BASEURL.'/users/login'; ?>" > ACCOUNT
							</a> 
						   <!-- <ul class="dropdown-menu" aria-labelledby="drop2">
								<li><a href="<?php echo BASEURL ?>/users/login">Sign In</a></li>
								<li><a href="<?php echo BASEURL ?>/users/register">Create a new account</a></li>
							</ul>-->
						</li>
                        </ul>
							<span class="">
								<div id="search">
									<form name="filters" id="filters" action="<?php echo BASEURL.'/product/'; ?>" class="search-form" method="GET">
											<div class="form-group has-feedback" style="margin-bottom:0px;">
												<label for="search" class="sr-only">Search</label>
												<input type="text" class="form-control" name="search" id="search" placeholder="search">
												<span class="glyphicon glyphicon-search form-control-feedback"></span>
											</div>
										</form></div>
							</span>
							
							
		</div>
	</div>
	<div>
	</div>
</div>
</div> 
</nav>
