

	<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/js/formValidation.js"></script>
	<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/js/bootstrap.js"></script>	
    <script type="text/javascript" src="<?php echo THEME_URL; ?>assets/js/validations.js"></script>	


    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/node-waves/waves.js"></script>


    <!-- Custom Js -->
    <script src="<?php echo THEME_URL?>assets/js/admin.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo THEME_URL?>assets/js/demo.js"></script>


    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-countto/jquery.countTo.js"></script>
    <!-- Morris Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/morrisjs/morris.js"></script>
    <!-- ChartJs -->
    <script src="<?php echo THEME_URL?>assets/plugins/chartjs/Chart.bundle.js"></script>
    <!-- Flot Charts Plugin Js -->
<!--
    <script src="<?php echo THEME_URL?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/flot-charts/jquery.flot.time.js"></script>
-->
    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>
<!--
    <script src="<?php echo THEME_URL?>assets/js/pages/index.js"></script>
-->
    <script src="<?php echo THEME_URL?>assets/js/pages/ui/notifications.js"></script>
<?php if($_GET['msg']==1 && $_GET['msg']!=""){ 
      $msg = "Action completed successfully";  
     ?>
<script> var msg ="<?php echo $msg; ?>"; alert(msg); showNotification("bg-black", msg, placementFrom, placementAlign, animateEnter, animateExit);</script>
<?php } ?>
<?php if($_GET['msg']==0 && $_GET['msg']!=""){ 
      $msg = "There was some error completing your requested action , please try again !";  

     ?>
<script> var msg ="<?php echo $msg; ?>"; showNotification("alert-danger", msg, placementFrom, placementAlign, animateEnter, animateExit);</script>
<?php } ?>



<?php if($this->session->flashdata('successmsg')){ 
      $msg = $this->session->flashdata('successmsg') ;  
     ?>
<script> var msg ="<?php echo $msg; ?>"; showNotification(colorName_success, msg, placementFrom, placementAlign, animateEnter, animateExit);</script>
<?php } ?>
<?php if($_GET['msg']==0){ 
      $msg = $this->session->flashdata('errormsg') ; 

     ?>
<script> var msg ="<?php echo $msg; ?>"; showNotification(colorName_error, msg, placementFrom, placementAlign, animateEnter, animateExit);</script>
<?php } ?>

<!-- TinyMCE -->
    <script src="<?php echo THEME_URL?>assets/plugins/tinymce/tinymce.js"></script>
    <script src="<?php echo THEME_URL?>assets/js/pages/forms/editors.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script>
	$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>

<!-- Select Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
 <script src="<?php echo THEME_URL?>assets/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo THEME_URL?>assets/js/plugins/ckeditor/adapters/jquery.js"></script>
  <!-- TinyMCE -->
    <script src="<?php echo THEME_URL?>assets/plugins/tinymce/tinymce.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo THEME_URL?>assets/js/admin.js"></script>
    <script src="<?php echo THEME_URL?>assets/js/pages/forms/editors.js"></script>

<script src="<?php echo THEME_URL; ?>/assets/js/app/custom.js" type="text/javascript"></script>
 <script>
	CKEDITOR.replace( 'message' , {enterMode: CKEDITOR.ENTER_BR});
</script>
	<script>
	CKEDITOR.replace( 'answer' , {enterMode: CKEDITOR.ENTER_BR});
</script>
<script>
	CKEDITOR.replace( 'page_text' , {enterMode: CKEDITOR.ENTER_BR});
</script>
	
<script>
	CKEDITOR.replace( 'about_myself' , {enterMode: CKEDITOR.ENTER_BR});
</script>
