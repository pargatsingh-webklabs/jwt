<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
	<?php include("includes/faq/head.php"); ?>
	
		
		<?php
			foreach ($this->_ci_view_paths as $key => $val) {
				$view_path = $key;
			}
		?>
		<body class="skin-blue sidebar-mini sidebar-collapse">
		<?php include('includes/faq/navigation.php'); ?>
		
		
				<?php ///include("includes/faq/sidebar.php"); ?>
				<!-- BEGIN CONTENT -->
				<?php if (isset($master_body) && $master_body != "") { ?>
					<?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
				<?php } ?>
		
		
		<!-- END CONTENT -->
		<?php include("includes/faq/footer.php"); ?>
	</body></html>	