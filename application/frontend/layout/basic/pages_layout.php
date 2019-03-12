<html xmlns="http://www.w3.org/1999/xhtml">
	<?php include("includes/pages/head.php"); ?>
	<body class="theme">
		<?php include('includes/pages/navigation.php'); ?>
		<?php
			foreach ($this->_ci_view_paths as $key => $val) {
				$view_path = $key;
			}
		?>
		<div id="message"></div>
		<div class="address">
						
								<!-- BEGIN CONTENT -->
				<?php if (isset($master_body) && $master_body != "") { ?>
					<?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
				<?php } ?>
			
		</div>
		<!-- END CONTENT -->
		<?php include("includes/pages/footer.php"); ?>
	</body></html>	
