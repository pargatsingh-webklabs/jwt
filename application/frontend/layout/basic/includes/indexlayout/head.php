<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo FRONT_END_LAYOUT; ?>/assets/images/favicon.png">
    <title><?php echo SITE_TITLE;?></title>
    <!-- Footable CSS -->
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/node_modules/footable/css/footable.core.css" rel="stylesheet">
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- Page CSS -->
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/contact-app-page.css" rel="stylesheet">
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/footable-page.css" rel="stylesheet">
    <!-- dropify CSS -->
    <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/dropify.min.css">    
    <!-- Date picker plugins css -->
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->   
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/style.min.css" rel="stylesheet">
    <!---- Data tables -->
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Error CSS -->    
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/pages/error-pages.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/custom_style.css" rel="stylesheet">
       <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/jquery-3.2.1.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
    
    
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo FRONT_END_LAYOUT; ?>/assets/images/favicon.png">
    <title><?php echo SITE_NAME;?></title>
    <!-- Footable CSS -->
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/css/footable.core.css" rel="stylesheet">
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- Page CSS -->
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/pages/contact-app-page.css" rel="stylesheet">
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/pages/footable-page.css" rel="stylesheet">
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/pages/pricing-page.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/style.min.css" rel="stylesheet">
    <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/jquery-3.2.1.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default-dark logo-center fixed-layout">
     <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"><?php echo SITE_NAME;?></p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo BASEURL ; ?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/logo-icon.png" alt="homepage" class="light-logo" style="width: 100%;" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
<!--
                         <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span>
-->
<h3 class="light-logo"><?php //echo SITE_NAME;?></h3>
                          </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
<!--
                        <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter">
                            </form>
                        </li>
-->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
<!--
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                           <a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                           <a href="javascript:void(0)">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
-->
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
<!--
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>

                                </ul>
                            </div>
                        </li>-->
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                     
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a href="<?php echo BASEURL;?>/contactus" style="margin-right: 15px; " class="btn waves-effect waves-light btn-rounded btn-outline-dark">Contact Us</a>
                             <a href="<?php echo BASEURL;?>/pricing" style="margin-right: 15px;" class="btn waves-effect waves-light btn-rounded btn-outline-dark">Pricing</a>
							<?php $username = $this->session->userdata('userdata');
								if(isset($username["id"])){
							?>
<a href="<?php echo BASEURL;?>/addressbook" style="margin-right: 22px;" class="btn waves-effect waves-light btn-rounded btn-outline-dark">Go To Dashboard</a>
							<?php }else{?>
							<a href="<?php echo BASEURL;?>/users/login" style="margin-right: 15px;" class="btn waves-effect waves-light btn-rounded btn-outline-dark">Sign In</a>
	<a href="<?php echo BASEURL;?>/users/register" style="margin-right: 23px;" class="btn waves-effect waves-light btn-rounded btn-outline-dark">Sign Up</a>
	<?php } ?>
<!--
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="hidden-md-down"></span><?php //$username = $this->session->userdata('userdata');echo @$username["fname"];?> <i class="fa fa-angle-down"></i></span> </a>
-->
           
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
<!--
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
-->

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
       
