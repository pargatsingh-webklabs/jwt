
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/popper.min.js"></script>
<script>                        
  $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
			if( $('[data-toggle="tooltip"]').length)
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
</script>
</body>


</html>
