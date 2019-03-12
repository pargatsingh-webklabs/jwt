 <header id="top-bar" class="navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    
                    <!-- logo -->
                    <div class="navbar-brand">
                        <a href="<?php echo BASEURL;?>" >
                            <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/logo.png" alt="">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
                <!-- main menu -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="<?php  echo ($this->uri->segment(1) == '')?'active':''; ?>">
                                <a href="<?php echo BASEURL;?>" >Home</a>
                            </li>
                             <li class="<?php  echo ($this->uri->segment(1) == 'about')?'active':''; ?>">
								<a href="<?php echo BASEURL;?>/about">About</a>
							</li>
                            <li class="<?php  echo ($this->uri->segment(1) == 'features')?'active':''; ?>">
								<a href="<?php echo BASEURL;?>/features">Features</a>
							</li>
							 <li class="<?php  echo ($this->uri->segment(1) == 'faq')?'active':''; ?>">
								<a href="<?php echo BASEURL;?>/faq">FAQ</a>
							</li>
							 <li class="<?php  echo ($this->uri->segment(1) == 'pricing')?'active':''; ?>">
								<a href="<?php echo BASEURL;?>/pricing">Pricing</a>
							</li>
<!--
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="<?php echo BASEURL;?>/blogs">Blog Full</a></li>
                                        <li><a href="<?php echo BASEURL;?>/blogs/blog_left">Blog Left sidebar</a></li>
                                        <li><a href="<?php echo BASEURL;?>/blogs/blog_right">Blog Right sidebar</a></li>
                                    </ul>
                                </div>
                            </li>
-->
                           <li class="<?php  echo ($this->uri->segment(1) == 'contact_us')?'active':''; ?>">
								<a href="<?php echo BASEURL;?>/contact_us">Contact</a>
							</li>
                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
            </div>
        </header>
