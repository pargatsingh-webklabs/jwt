<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>404 | Smoothmaps.com</title>
	
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo THEME_URL?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo THEME_URL?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo THEME_URL?>assets/css/style.css" rel="stylesheet">

</head>

<body class="four-zero-four">
		<?php
			foreach ($this->_ci_view_paths as $key => $val) {
				$view_path = $key;
			}

		?>
		<!-- END LOGO -->
		<!-- BEGIN LOGIN -->
		<?php if (isset($master_body) && $master_body != "") { ?>
			<?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
		<?php } ?>
		    <!-- Jquery Core Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/jquery/jquery.min.js"></script>
		


    <!-- Bootstrap Core Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/node-waves/waves.js"></script>	
	
</body>
	
</html>

