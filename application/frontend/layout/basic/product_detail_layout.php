<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include('includes/product_detail_layout/head.php'); ?>
<?php
		foreach ($this->_ci_view_paths as $key => $val) {
			$view_path = $key;
		}
	?>
<?php include('includes/product_detail_layout/navigation.php'); ?>
<style>
br{display:none}
</style>
<div id="message"></div>
<body class="theme"><div class=""> 
  <!--<div id="top-bar">
                <nav class="navbar navbar-default hidden-xs">
                <div class="container" >
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse"  style="padding: 0px; text-align:center;">
                <ul class="nav navbar-nav new-arrivals">
                <li><a href="#">New Arrivals</a></li>
                <li><a href="#">Popular</a></li>
                <?php //foreach($all_categories as $key => $val){ ?>
                    <li><a href="#"><?php //echo ucfirst($val['name']); ?></a></li>
                <?php //} ?>
                <li><a href="#contact">Brands</a></li>
                </ul>
            </div>
            </div>
                </nav>
            </div>-->
  <div class="container"> 
    <!-- BEGIN CONTENT -->
    <?php if (isset($master_body) && $master_body != "") { ?>
    <?php include($view_path . $this->router->class . "/" . $master_body . ".php"); ?>
    <?php } ?>
    <!-- END CONTENT --> 
  </div>
</div>
<?php include('includes/product_detail_layout/footer.php'); ?>
</body>
</html>