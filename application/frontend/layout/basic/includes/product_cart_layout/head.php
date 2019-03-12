<?php  
$stripe_data = $this->config->item('stripe_data'); 
$publisher_key=$stripe_data['stripe_publisher_key'];
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cart Page</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/style.css" />
<link rel="icon" href="<?php echo FRONT_END_LAYOUT; ?>/assets/img/fav-icon-new.png" type="image/png">


        <!-- New Format -->
<link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/theme.css" rel="stylesheet" type="text/css">
<link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/reset.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="<?php echo FRONT_END_LAYOUT; ?>/assets/css/jquery.bxslider.css" rel="stylesheet" type="text/css">
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
	var BASEURL = '<?php echo BASEURL; ?>';
	var FRONT_LAYOUT_URL = '<?php echo FRONT_END_LAYOUT; ?>';
	var stripe_data = '<?php echo $publisher_key; ?>';
</script>