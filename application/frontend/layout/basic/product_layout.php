

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php include('includes/product_layout/head.php'); ?>
	<?php
		foreach ($this->_ci_view_paths as $key => $val) {
			$view_path = $key;
		}
	?>
	<body class="theme">
		
			<?php include('includes/product_layout/navigation.php'); ?>
			
				<?php include('includes/product_layout/banner.php'); ?>
				
				<!-- BEGIN CONTENT -->
				<?php  if (isset($master_body) && $master_body != "") { ?>
					<?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
				<?php } ?>
				<!-- END CONTENT -->
		
		<?php include('includes/product_layout/footer.php'); ?>		
	</body>
</html>
