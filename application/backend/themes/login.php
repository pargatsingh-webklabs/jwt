
<html lang="en">
	<!-- BEGIN HEAD -->
	<?php include('includes/loginhead.php');?>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<body  class="login-page">
		<!-- BEGIN LOGO -->
		<div class="logo " >
			<a href="<?php echo THEME_URL; ?>">
				<img src="<?php echo THEME_URL; ?>assets/img/logo-white.png" alt=""/>
			</a>
		</div>
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
		<!-- END LOGIN -->
		<!-- BEGIN COPYRIGHT -->
		<!--<div class="text-center">
			<?php echo date('Y'); ?> &copy; <?php echo $this->config->item('sitename'); ?>
		</div>-->
		<!-- END COPYRIGHT -->
		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
		<?php include('includes/login_scripts.php'); ?>
		<!-- END JAVASCRIPTS -->
	</body>
	<!-- END BODY -->
</html>