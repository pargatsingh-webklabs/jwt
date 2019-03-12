	
    <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
   
    <script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/formValidation.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/bootstrap.js"></script>	
    <script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/validations.js"></script>

	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/jquery.nicescroll.min.js"></script>
<script>
  $(document).ready(function() {
  
	//var nice = $("html").niceScroll();  // The document page (body)
	    
    $(".panel-body").niceScroll({cursorcolor:"#000",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true}); // First scrollable DIV
 var d = $('.panel-body');
d.animate({ scrollTop: d.prop('scrollBottom') }, 0);
  
  });
</script>
    
    
	<!-- Morris.js charts -->
    <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo FRONT_END_LAYOUT; ?>/assets/plugins/fastclick/fastclick.min.js'></script>
       <script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/jquery.prettyPhoto.js"></script>


        <script>
       
            $(document).ready(function(){
                $("[rel^='lightbox']").prettyPhoto();
            });
        </script>
	
	
