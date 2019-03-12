
<!DOCTYPE html>
<html lang="en">
<?php  include('includes/indexlayout/head.php'); ?>
<?php 
	foreach ($this->_ci_view_paths as $key => $val) {
		$view_path = $key;
	}
?>
<?php  include('includes/mainlayout/navigation.php');  ?>
<div class="content">
	<?php //include('includes/mainlayout/banner.php'); ?>
	<!-- BEGIN CONTENT -->
	<?php if (isset($master_body) && $master_body != "") { ?>
		<?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
	<?php } ?>
	<!-- END CONTENT -->
</div>
<?php include('includes/mainlayout/footer.php'); die; ?>		
<body class="skin-default-dark logo-center fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
<div class="">
	<a href="<?php echo BASEURL;?>/users/login" style="position:fixed;right:6%;top:2%;" class="btn waves-effect waves-light btn-rounded btn-outline-dark">Sign In</a>
	<a href="<?php echo BASEURL;?>/users/register" style="position:fixed;right:14%;top:2%;" class="btn waves-effect waves-light btn-rounded btn-outline-dark">Sign Up</a>
	<img src="<?php echo BASEURL;?>/Screenshot_address.png"/>
	</div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2018 <?php echo SITE_NAME;?>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/popper.min.js"></script>
    <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo FRONT_END_LAYOUT; ?>/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo FRONT_END_LAYOUT; ?>/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/js/sticky-kit.min.js"></script>
    <script src="../assets/js/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/custom.min.js"></script>
</body>

</html>
