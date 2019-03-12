
<head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="<?php echo FRONT_END_LAYOUT; ?>/assets/images/favicon.png">
       <title><?php echo SITE_NAME." | ".$master_title; ?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
       
        <link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <!-- Template CSS Files
        ================================================== -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Twitter Bootstrs CSS -->
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/bootstrap.min.css">
        <!-- Ionicons Fonts Css -->
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/ionicons.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/animate.css">
        <!-- Hero area slider css-->
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/slider.css">
        <!-- owl craousel css -->
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/owl.theme.css">
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/jquery.fancybox.css">
        <!-- template main css file -->
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/main.css">
        <!-- responsive css -->
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/responsive.css">
        
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/master.css" media="screen">
		<link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/reset.css" media="screen">
		<?php if($this->uri->segment(1) == 'payment' || $this->uri->segment(2) == 'payment'):?>
        <link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/payment_style.css">
		
		<?php endif;?>
		<script>
		var BASEURL = "<?php echo BASEURL; ?>";
		var FRONT_END_LAYOUT = "<?php echo FRONT_END_LAYOUT; ?>";
		
		</script>
    </head>
