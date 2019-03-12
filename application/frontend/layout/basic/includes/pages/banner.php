<!-- banner -->
	<div class="banner">
		<div class="container">
			<div class="banner-main">
				<div class="banner-main1">
					<div class="logo wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
						<h1><a href="<?php echo BASEURL; ?>">Viscerous</a></h1>
					</div>
					<div class="header-right wow fadeInRight animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
						<div class="shy-menu">
							<a class="shy-menu-hamburger">
								<span class="layer top"></span>
								<span class="layer mid"></span>
								<span class="layer btm"></span>
							</a>
							<div class="shy-menu-panel">
								<nav class="menu menu--horatio">
									<ul class="menu__list">
										<li class="menu__item menu__item--current"><a href="<?php echo BASEURL; ?>" class="menu__link"><i class="glyphicon glyphicon-home" aria-hidden="true"></i>Home</a></li>
										<li class="menu__item"><a href="<?php echo BASEURL; ?>/pages/about" class="menu__link"><i class="glyphicon glyphicon-user"> </i>About</a></li> 
										<li class="menu__item"><a href="<?php echo BASEURL; ?>/pages/services" class="menu__link"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i>Services</a></li>
										<li class="menu__item"><a href="<?php echo BASEURL; ?>/pages/gallery" class="menu__link"><i class="glyphicon glyphicon-picture" aria-hidden="true"></i>Gallery</a></li> 
										<li class="menu__item"><a href="<?php echo BASEURL; ?>/pages/codes" class="menu__link"><i class="glyphicon glyphicon-list-alt"> </i>Short Codes</a></li> 
										<li class="menu__item"><a href="<?php echo BASEURL; ?>/pages/contact" class="menu__link"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Contact</a></li>
									</ul>
								</nav>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="menu open">
						  <a class="hamburger">
							<span class="layer top"></span>
							<span class="layer mid"></span>
							<span class="layer btm"></span>
						  </a>
						</div>
						<script>
							$(function() {
								
								initDropDowns($("div.shy-menu"));

							});

							function initDropDowns(allMenus) {

								allMenus.children(".shy-menu-hamburger").on("click", function() {
									
									var thisTrigger = jQuery(this),
										thisMenu = thisTrigger.parent(),
										thisPanel = thisTrigger.next();

									if (thisMenu.hasClass("is-open")) {

										thisMenu.removeClass("is-open");

									} else {			
										
										allMenus.removeClass("is-open");	
										thisMenu.addClass("is-open");
										thisPanel.on("click", function(e) {
											e.stopPropagation();
										});
									}
									
									return false;
								});
							}
						</script>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="flexslider-info">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<div class="banner-info">
										<h4>Cillum dolore</h4>
										<p>Voluptate velit esse cillum dolore eu fugiat nulla pariatur. cupidatat non proident</p>
									</div>
								</li>
								<li>
									<div class="banner-info">
										<h4>Proident esse</h4>
										<p> Excepteur sint occaecat cupidatat non proident esse cillum dolore eu fugiat nulla pariatur.</p>
									</div>
								</li>
								<li>
									<div class="banner-info">
										<h4>Voluptate velit</h4>
										<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore nulla pariatur.</p>
									</div>
								</li>
							</ul>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
<!-- banner -->