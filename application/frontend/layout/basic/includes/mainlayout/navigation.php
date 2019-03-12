    <!-- ================================
    START MENU AREA
================================= -->
    <!-- start menu-area -->
    <div class="menu-area">
        <!-- start .top-menu-area -->
        <div class="top-menu-area">
            <!-- start .container -->
            <div class="container">
                <!-- start .row -->
                <div class="row">
                    <!-- start .col-md-3 -->
                    <div class="col-lg-3 col-md-3 col-6 v_middle">
                        <div class="logo">
                            <a href="<?php echo base_url();?>">
                                <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/logo.png" alt="logo image" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <!-- end /.col-md-3 -->

                    <!-- start .col-md-5 -->
                    <div class="col-lg-8 offset-lg-1 col-md-9 col-6 v_middle">
                        <!-- start .author-area -->
                        <div class="author-area">
<!--
                            <a href="signup.html" class="author-area__seller-btn inline">Become a Seller</a>
-->

                          
                            <!--start .author-author__info-->
                            <?php $userdata = $this->session->userdata('userdata');//debug($userdata);die;
                            if(@$userdata):?>
                            <div class="author-author__info inline has_dropdown">
                                <div class="author__avatar">
                                    <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/usr_avatar.png" alt="user avatar">
                                    <?php //echo $userdata["image"];?>

                                </div>
                                <div class="autor__info">
                                    <p class="name">
                                       <?php echo $userdata["fname"]." ".$userdata["lname"];?>
                                    </p>
<!--
                                    <p class="ammount">$20.45</p>
-->
                                </div>

                                <div class="dropdown dropdown--author">
                                    <ul>
<!--
                                        <li>
                                            <a href="author.html">
                                                <span class="lnr lnr-user"></span>Profile</a>
                                        </li>
-->
                                        <li>
                                            <a href="<?php echo base_url('users/dashboard');?>">
                                                <span class="lnr lnr-home"></span> Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('users/settings');?>">
                                                <span class="lnr lnr-cog"></span> Setting</a>
                                        </li>
<!--
                                        <li>
                                            <a href="cart.html">
                                                <span class="lnr lnr-cart"></span>Purchases</a>
                                        </li>
                                        <li>
                                            <a href="favourites.html">
                                                <span class="lnr lnr-heart"></span> Favourite</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-add-credit.html">
                                                <span class="lnr lnr-dice"></span>Add Credits</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-statement.html">
                                                <span class="lnr lnr-chart-bars"></span>Sale Statement</a>
                                        </li>
-->
                                        <li>
                                            <a href="<?php echo base_url('uploads');?>">
                                                <span class="lnr lnr-upload"></span>Upload Item</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('products');?>">
                                                <span class="lnr lnr-book"></span>Manage Item</a>
                                        </li>
<!--
                                        <li>
                                            <a href="dashboard-withdrawal.html">
                                                <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                                        </li>
-->
                                        <li>
                                            <a href="<?php echo base_url('users/logout');?>">
                                                <span class="lnr lnr-exit"></span>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end /.author-author__info-->
                            <?php else: ?>
                             <div class="author-author__info inline has_dropdown">
                                <div class="autor__info">
                                    <p class="name">
										<a href="<?php echo base_url('users/login');?>" class="author-area__seller-btn inline">Sign In</a>
                                    </p>
                                </div>
                             </div>
                            <?php endif;?>
                        </div>
                        <!-- end .author-area -->
						<?php  if(@$userdata):?>
                        <!-- author area restructured for mobile -->
                        <div class="mobile_content ">
                            <span class="lnr lnr-user menu_icon"></span>

                            <!-- offcanvas menu -->
                            <div class="offcanvas-menu closed">
                                <span class="lnr lnr-cross close_menu"></span>
                                <div class="author-author__info">
                                    <div class="author__avatar v_middle">
                                        <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/usr_avatar.png" alt="user avatar">
                                    </div>
                                    <div class="autor__info v_middle">
                                        <p class="name">
                                            <?php echo $userdata["fname"]." ".$userdata["lname"];?>
                                        </p>
<!--
                                        <p class="ammount">$20.45</p>
-->
                                    </div>
                                </div>
                                <!--end /.author-author__info-->

<!--
                                <div class="author__notification_area">
                                    <ul>
                                        <li>
                                            <a href="notification.html">
                                                <div class="icon_wrap">
                                                    <span class="lnr lnr-alarm"></span>
                                                    <span class="notification_count noti">25</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="message.html">
                                                <div class="icon_wrap">
                                                    <span class="lnr lnr-envelope"></span>
                                                    <span class="notification_count msg">6</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="cart.html">
                                                <div class="icon_wrap">
                                                    <span class="lnr lnr-cart"></span>
                                                    <span class="notification_count purch">2</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
	
-->
                                <!--start .author__notification_area -->

                                <div class="dropdown dropdown--author">
                                    <ul>
<!--
                                        <li>
                                            <a href="author.html">
                                                <span class="lnr lnr-user"></span>Profile</a>
                                        </li>
-->
                                        <li>
                                            <a href="<?php echo base_url('users/dashboard');?>">
                                                <span class="lnr lnr-home"></span> Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('users/settings');?>">
                                                <span class="lnr lnr-cog"></span> Setting</a>
                                        </li>
<!--
                                        <li>
                                            <a href="cart.html">
                                                <span class="lnr lnr-cart"></span>Purchases</a>
                                        </li>
                                        <li>
                                            <a href="favourites.html">
                                                <span class="lnr lnr-heart"></span> Favourite</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-add-credit.html">
                                                <span class="lnr lnr-dice"></span>Add Credits</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-statement.html">
                                                <span class="lnr lnr-chart-bars"></span>Sale Statement</a>
                                        </li>
-->
                                        <li>
                                            <a href="dashboard-upload.html">
                                                <span class="lnr lnr-upload"></span>Upload Item</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-manage-item.html">
                                                <span class="lnr lnr-book"></span>Manage Item</a>
                                        </li>
<!--
                                        <li>
                                            <a href="dashboard-withdrawal.html">
                                                <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                                        </li>
-->
                                        <li>
                                            <a href="<?php echo base_url('users/logout');?>">
                                                <span class="lnr lnr-exit"></span>Logout</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="text-center">
                                    <a href="signup.html" class="author-area__seller-btn inline">Become a Seller</a>
                                </div>
                            </div>
                        </div>
                        <!-- end /.mobile_content -->
                        <?php endif;?>
                    </div>
                    <!-- end /.col-md-5 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end  -->
<?php  if(false):?>
        <!-- start .mainmenu_area -->
        <div class="mainmenu">
            <!-- start .container -->
            <div class="container">
                <!-- start .row-->
                <div class="row">
                    <!-- start .col-md-12 -->
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <!-- start mainmenu__search -->
                            <div class="mainmenu__search">
                                <form action="#">
                                    <div class="searc-wrap">
                                        <input type="text" placeholder="Search product">
                                        <button type="submit" class="search-wrap__btn">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- start mainmenu__search -->
                        </div>

                        <nav class="navbar navbar-expand-md navbar-light mainmenu__menu">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="has_dropdown">
                                        <a href="index.html">HOME</a>
                                        <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li>
                                                    <a href="index.html">Home Multi Vendor</a>
                                                </li>
                                                <li>
                                                    <a href="index-single.html">Home Two Single User</a>
                                                </li>
                                                <li>
                                                    <a href="index3.html">Home Three Product</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has_dropdown">
                                        <a href="all-products-list.html">all product</a>
                                        <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li>
                                                    <a href="all-products.html">Recent Items</a>
                                                </li>
                                                <li>
                                                    <a href="all-products.html">Popular Items</a>
                                                </li>
                                                <li>
                                                    <a href="index3.html">Free Templates</a>
                                                </li>
                                                <li>
                                                    <a href="#">Follow Feed</a>
                                                </li>
                                                <li>
                                                    <a href="#">Top Authors</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has_dropdown">
                                        <a href="#">categories</a>
                                        <div class="dropdown dropdown--menu">
                                            <ul>
                                                <li>
                                                    <a href="category-grid.html">Popular Items</a>
                                                </li>
                                                <li>
                                                    <a href="category-grid.html">Admin Templates</a>
                                                </li>
                                                <li>
                                                    <a href="category-grid.html">Blog / Magazine / News</a>
                                                </li>
                                                <li>
                                                    <a href="category-grid.html">Creative</a>
                                                </li>
                                                <li>
                                                    <a href="category-grid.html">Corporate Business</a>
                                                </li>
                                                <li>
                                                    <a href="category-grid.html">Resume Portfolio</a>
                                                </li>
                                                <li>
                                                    <a href="category-grid.html">eCommerce</a>
                                                </li>
                                                <li>
                                                    <a href="category-grid.html">Entertainment</a>
                                                </li>
                                                <li>
                                                    <a href="category-grid.html">Landing Pages</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="has_megamenu">
                                        <a href="#">Elements</a>
                                        <div class="dropdown_megamenu contained">
                                            <div class="megamnu_module">
                                                <div class="menu_items">
                                                    <div class="menu_column">
                                                        <ul>
                                                            <li>
                                                                <a href="accordion.html">Accordion</a>
                                                            </li>
                                                            <li>
                                                                <a href="alert.html">Alert</a>
                                                            </li>
                                                            <li>
                                                                <a href="brands.html">Brands</a>
                                                            </li>
                                                            <li>
                                                                <a href="buttons.html">Buttons</a>
                                                            </li>
                                                            <li>
                                                                <a href="cards.html">Cards</a>
                                                            </li>
                                                            <li>
                                                                <a href="charts.html">Charts</a>
                                                            </li>
                                                            <li>
                                                                <a href="content-block.html">Content Block</a>
                                                            </li>
                                                            <li>
                                                                <a href="dropdowns.html">Drpdowns</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li>
                                                                <a href="features.html">Features</a>
                                                            </li>
                                                            <li>
                                                                <a href="footer.html">Footer</a>
                                                            </li>
                                                            <li>
                                                                <a href="info-box.html">Info Box</a>
                                                            </li>
                                                            <li>
                                                                <a href="menu.html">Menu</a>
                                                            </li>
                                                            <li>
                                                                <a href="modal.html">Modal</a>
                                                            </li>
                                                            <li>
                                                                <a href="pagination.html">Pagination</a>
                                                            </li>
                                                            <li>
                                                                <a href="peoples.html">Peoples</a>
                                                            </li>
                                                            <li>
                                                                <a href="products.html">Products</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li>
                                                                <a href="progressbar.html">Progressbar</a>
                                                            </li>
                                                            <li>
                                                                <a href="social.html">Social</a>
                                                            </li>
                                                            <li>
                                                                <a href="tab.html">Tabs</a>
                                                            </li>
                                                            <li>
                                                                <a href="table.html">Table</a>
                                                            </li>
                                                            <li>
                                                                <a href="testimonials.html">Testimonials</a>
                                                            </li>
                                                            <li>
                                                                <a href="timeline.html">Timeline</a>
                                                            </li>
                                                            <li>
                                                                <a href="typography.html">Typography</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has_megamenu">
                                        <a href="#">Pages</a>
                                        <div class="dropdown_megamenu">
                                            <div class="megamnu_module">
                                                <div class="menu_items">
                                                    <div class="menu_column">
                                                        <ul>
                                                            <li class="title">Product</li>
                                                            <li>
                                                                <a href="all-products.html">Products Grid</a>
                                                            </li>
                                                            <li>
                                                                <a href="all-products-list.html">Products List</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-grid.html">Category Grid</a>
                                                            </li>
                                                            <li>
                                                                <a href="category-list.html">Category List</a>
                                                            </li>
                                                            <li>
                                                                <a href="search-product.html">Search Product</a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product.html">Single Product V1</a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-v2.html">Single Product V2</a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-v3.html">Single Product V3</a>
                                                            </li>
                                                            <li>
                                                                <a href="cart.html">Shopping Cart</a>
                                                            </li>
                                                            <li>
                                                                <a href="checkout.html">Checkout</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li class="title">Author</li>
                                                            <li>
                                                                <a href="author.html">Author Profile</a>
                                                            </li>
                                                            <li>
                                                                <a href="author-items.html">Author Items</a>
                                                            </li>
                                                            <li>
                                                                <a href="author-reviews.html">Customer Reviews</a>
                                                            </li>
                                                            <li>
                                                                <a href="author-followers.html">Followers</a>
                                                            </li>
                                                            <li>
                                                                <a href="author-following.html">Following</a>
                                                            </li>
                                                            <li>
                                                                <a href="notification.html">Notifications</a>
                                                            </li>
                                                            <li>
                                                                <a href="message.html">Message Inbox</a>
                                                            </li>
                                                            <li>
                                                                <a href="message-compose.html">Message Compose</a>
                                                            </li>
                                                            <li>
                                                                <a href="favourites.html">Favorites Items</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li class="title">Dashboard</li>
                                                            <li>
                                                                <a href="dashboard.html">Dashboard</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-setting.html">Account Settings</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-purchase.html">Author Purchases</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-add-credit.html">Add Credits</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-statement.html">Statements</a>
                                                            </li>
                                                            <li>
                                                                <a href="invoice.html">Invoice</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-upload.html">Upload Item</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-manage-item.html">Edit Items</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-withdrawal.html">Withdrawals</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard-manage-item.html">Manage Items</a>
                                                            </li>
                                                            <li>
                                                                <a href="add-payment-method.html">Add Payment Method</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li class="title">Customers</li>
                                                            <li>
                                                                <a href="support-forum.html">Support Forum</a>
                                                            </li>
                                                            <li>
                                                                <a href="support-forum-detail.html">Forum Details</a>
                                                            </li>
                                                            <li>
                                                                <a href="login.html">Login</a>
                                                            </li>
                                                            <li>
                                                                <a href="signup.html">Register</a>
                                                            </li>
                                                            <li>
                                                                <a href="recover-pass.html">Recovery Password</a>
                                                            </li>
                                                            <li>
                                                                <a href="customer-dashboard.html">Customer Dashboard</a>
                                                            </li>
                                                            <li>
                                                                <a href="customer-downloads.html">Customer Downloads</a>
                                                            </li>
                                                            <li>
                                                                <a href="customer-info.html">Customer Info</a>
                                                            </li>
                                                        </ul>

                                                        <ul>
                                                            <li class="title">Blog</li>
                                                            <li>
                                                                <a href="blog1.html">Blog V-1</a>
                                                            </li>
                                                            <li>
                                                                <a href="blog2.html">Blog V-2</a>
                                                            </li>
                                                            <li>
                                                                <a href="single-blog.html">Single Blog</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="menu_column">
                                                        <ul>
                                                            <li class="title">Other</li>
                                                            <li>
                                                                <a href="how-it-works.html">How It Works</a>
                                                            </li>
                                                            <li>
                                                                <a href="about.html">About Us</a>
                                                            </li>
                                                            <li>
                                                                <a href="pricing.html">Pricing Plan</a>
                                                            </li>
                                                            <li>
                                                                <a href="testimonial.html">Testimonials</a>
                                                            </li>
                                                            <li>
                                                                <a href="faq.html">FAQs</a>
                                                            </li>
                                                            <li>
                                                                <a href="affiliate.html">Affiliates</a>
                                                            </li>
                                                            <li>
                                                                <a href="term-condition.html">Terms &amp; Conditions</a>
                                                            </li>
                                                            <li>
                                                                <a href="event.html">Event</a>
                                                            </li>
                                                            <li>
                                                                <a href="event-detail.html">Event Detail</a>
                                                            </li>
                                                            <li class="has_badge">
                                                                <a href="badges.html">Badges</a>
                                                                <span class="badge">New</span>
                                                            </li>
                                                            <li>
                                                                <a href="404.html">404 Error page</a>
                                                            </li>
                                                            <li>
                                                                <a href="carieer.html">Job Posts</a>
                                                            </li>
                                                            <li>
                                                                <a href="job-detail.html">Job Details</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="contact.html">contact</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>

                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row-->
            </div>
            <!-- start .container -->
        </div>
        <!-- end /.mainmenu-->
        <?php endif;?>
    </div>
    <!-- end /.menu-area -->
    <!--================================
    END MENU AREA
=================================-->
