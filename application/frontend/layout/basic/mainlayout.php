<!DOCTYPE html>
<html lang="en">
	<?php
	$last_url = explode('/',$_SERVER['REQUEST_URI']);
	$count_last_url = count($last_url)-1;

	 include('includes/mainlayout/head.php'); ?>
	<?php 
		foreach ($this->_ci_view_paths as $key => $val) {
			$view_path = $key;
		}
	?>
		<body class="home1 mutlti-vendor">

			<?php 	 include('includes/mainlayout/navigation.php');  ?>
			<div class="content">
				<?php //include('includes/mainlayout/banner.php'); ?>
				<!-- BEGIN CONTENT -->
				<?php if (isset($master_body) && $master_body != "") { ?>
					<?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
				<?php } ?>
				<!-- END CONTENT -->
			</div>

		<?php  include('includes/mainlayout/footer.php');   ?>		
		</body>

</html>

