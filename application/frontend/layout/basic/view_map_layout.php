<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php include("includes/view_map_layout/head.php"); ?>
	
		
		<?php
			foreach ($this->_ci_view_paths as $key => $val) {
				$view_path = $key;
			}
		?>
		<body class="skin-blue sidebar-mini sidebar-collapse">
        <?php $count = get_stripe_plan();
		  $userdata = $this->session->userdata('userdata');
			if ($count == 0){
			?>
			
			<div class="fix-header" id="home">
				<div class="container">
				  <div class="w-nav" data-collapse="medium" data-animation="default" data-duration="400">
				   <div class="col-sm-12">
					 <h2>Purchase A Plan<a href="<?php echo BASEURL; ?>/pricing" type="button" class="btn btn-default hvr-sweep-to-right upgrade">Upgrade Now</a></h2>
					 
				   </div>
				  </div>
				</div>
			  </div>
			<?php }
			?>

<div class="wrapper">			
		<?php include('includes/view_map_layout/navigation.php'); ?>		
		
		<?php //include("includes/account/sidebar.php"); ?>
		<!-- BEGIN CONTENT -->
		<?php if (isset($master_body) && $master_body != "") { ?>
			<?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
		<?php } ?>
		
		
		<!-- END CONTENT -->
		<?php include("includes/view_map_layout/footer.php"); ?>
	</div>
	</body></html>	