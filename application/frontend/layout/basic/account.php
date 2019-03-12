<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php include("includes/account/head.php"); ?>
	
		
		<?php
			foreach ($this->_ci_view_paths as $key => $val) {
				$view_path = $key;
			}
		?>
		<body class="skin-blue sidebar-mini sidebar-collapse">
			<?php 	    
			$flashmsg=$this->session->flashdata('success_msg'); 	
            $success_msg=!empty($flashmsg)?$flashmsg:$successmsg;
            if(!empty($success_msg) || !empty($successmsg)){
            ?>
			<div class="" style="position: absolute; right: 0px; z-index: 2147483647; top: 60px; width: 30%; left: 490px;" id="success_msg">
            <div class="header-inner" style="background-color:#32CD32;height:50px;box-shadow:4px 4px 30px #000;">
		<!-- BEGIN LOGO -->
               <span style="color: white; font-weight: bold; font-size: 16px; padding-top: 15px; text-align: center; float: right; margin-right: 70px;">
                <i class="fa fa-check-square-o"></i>&nbsp; <?php echo $success_msg; ?>
                </span>
            </div> </div>
            <?php } 
			$flashmsg=$this->session->flashdata('error_msg'); 	
            $success_msg=!empty($flashmsg)?$flashmsg:$successmsg;
            if(!empty($success_msg) || !empty($successmsg)){
            ?>
			<div class="" style="position: absolute; right: 0px; z-index: 2147483647; top: 60px; width: 30%; left: 490px;" id="success_msg">
            <div class="header-inner" style="background-color:red;height:50px;box-shadow:4px 4px 30px #000;">
		<!-- BEGIN LOGO -->
               <span style="color: white; font-weight: bold; font-size: 16px; padding-top: 15px; text-align: center; float: right; margin-right: 70px;">
                <i class="fa fa-check-square-o"></i>&nbsp; <?php echo $success_msg; ?>
                </span>
            </div> </div>
            <?php } ?>	
						
	
			
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
		<?php include('includes/account/navigation.php'); ?>
		
		
				<?php include("includes/account/sidebar.php"); ?>
				<!-- BEGIN CONTENT -->
				<?php if (isset($master_body) && $master_body != "") { ?>
					<?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
				<?php } ?>
		
		
		<!-- END CONTENT -->
		<?php include("includes/account/footer.php"); ?>
	</div>
	</body></html>	