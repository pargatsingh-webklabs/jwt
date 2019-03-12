<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
foreach ($this->_ci_view_paths as $key => $val) {
	$view_path = $key;
}
?>
<head>
<title>Oops Something not found</title>
</head>
<body>
<!-- BEGIN CONTENT -->
		<?php include($view_path  . "errors/" . $master_body . ".php"); ?>
<!-- END CONTENT -->
</body>
</html>

