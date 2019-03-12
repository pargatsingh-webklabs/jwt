<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php include("includes/pricing/head.php"); ?>
	<body class="theme">
		<?php include('includes/pricing/navigation.php'); ?>
		<?php
			foreach ($this->_ci_view_paths as $key => $val) {
				$view_path = $key;
			}
		?>
		<div class="">
						
								<!-- BEGIN CONTENT -->
				<?php if (isset($master_body) && $master_body != "") { ?>
					<?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
				<?php } ?>
			
		</div>
		<!-- END CONTENT -->
		<?php //include("includes/pricing/footer.php"); ?>
	</body></html>	
