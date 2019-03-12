 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script>if (!window.jQuery) { document.write('<script src="js/jquery-2.1.3.min.js"><\/script>'); }
</script>
<!--bootstrap-->
<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/bootstrap.min.js"></script>
<!--sidebar menu-->
<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/classie.js"></script>
<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/main3.js"></script>
<!--swiper-->
<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/idangerous.swiper.min.js"></script>
<!--flexslider-->
<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/jquery.flexslider-min.js"></script>
<!--parallax-->
<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/parallax.js"></script>
<!--custom-->
<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/main.js"></script>

<script>
$(document).ready(function(){

$('.collapse').collapse();
$('.panel-heading h4 a input[type=checkbox]').on('click', function(e){
    e.stopPropagation();
})
$('#collapseOne').on('show.bs.collapse', function(e){
    if( ! $('.panel-heading h4 a input[type=checkbox]').is(':checked') )
    {
    return false;
	}
  });
  $('.tab-3').tooltip(options)
  
});
</script>

