<?php

	$userdata = $this->session->userdata('userdata');?>
<!DOCTYPE html>
<html lang="en">
	<?php include('includes/mainlayout/head.php'); ?>
	<body class="theme-light-green">
		<?php  include("includes/mainlayout/header.php");
	 include('includes/mainlayout/left_sidebar.php'); ?>	
		<section class="content">
			<?php  //include("includes/mainlayout/header.php"); 
				foreach ($this->_ci_view_paths as $key => $val) {
					$view_path = $key;
				}
				if (isset($master_body) && $master_body != "") { 
					include($view_path . $this->router->class . "/" . $master_body . ".php"); 
				} 
			//include('includes/mainlayout/footer.php'); ?>
			<!-- END FOOTER -->
			<!-- END BODY -->
		</section>
		<?php //include('includes/mainlayout/right_sidebar.php'); ?>	
	</body>
	<?php include('includes/mainlayout/script3.php'); ?>
</html>
<?php
	/*$userid = $userdata['id'] ;
	$res = get_previlege($userid);
	foreach($res as $key => $val){ 
	  $urls[] = $val['name'];
	}
	$controller = $this->router->fetch_class(); // for controller
	$method = $this->router->fetch_method(); // for method
	$test = $controller.'/'.$method;
	if ($test!='dashboard/index'){
		if (in_array($test, $urls)){ 
			echo "hello";
		}else{
			 redirect(BASEURL.'/accessed_denied'); 
		}
	}
*/
?>
