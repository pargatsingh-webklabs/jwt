<?php include('includes/login/head.php'); ?>
<?php 
		foreach ($this->_ci_view_paths as $key => $val) {
			$view_path = $key;
		}
	?>

	<?php //include('includes/mainlayout/banner.php'); ?>
	<!-- BEGIN CONTENT -->
	<?php  if (isset($master_body) && $master_body != "") { ?>
		<?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
	<?php } ?>
	<!-- END CONTENT -->
<?php include('includes/login/footer.php'); ?>


