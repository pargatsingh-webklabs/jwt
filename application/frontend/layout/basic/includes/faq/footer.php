<style>
.footer-parlex 	.footer-links ul li a
	{
	font-family:"Reem Kufi",sans-serif !important;
	color:#fff!important;
	}		
</style>
<div class="footer-parlex">
    <div class="parlex9-back">
      
        <div class="container">
          <div class="col-sm-4 col-xs">
          
              <p class="copyright-area">©<?php echo date('Y'); ?> Smooth Maps. All Right Reserved.</p></div>
			  <div class="col-sm-8 footer-links col-xs">
			<ul>
			<li><a href="<?php echo BASEURL ?>">HOME</a></li>
			<li><a href="<?php echo BASEURL ?>/examples">EXAMPLES</a></li>
			<li><a href="<?php echo BASEURL ?>/pricing">PRICING</a></li>
			<li><a href="<?php echo BASEURL ?>/faq">FAQ</a></li>	
			<li><a href="<?php echo BASEURL ?>/blogs">BLOG</a></li>
			<li><a href="<?php echo BASEURL ?>/contact_us">CONTACT US</a></li>
			</ul>
		</div>
          </div>
      </div>
    </div>    <!--///////////////////////////////////////////////////////
       // End Footer section 
       //////////////////////////////////////////////////////////-->
      

  <script type="text/javascript" src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/jquery.js"></script>
  
  <script type="text/javascript" src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/normal.js"></script>
  <script type="text/javascript" src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/jquery-1.10.2.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
 <script type="text/javascript" src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/carousels.js"></script>
<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/slider-modernizr.js"></script>
  <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/classie.js"></script>
  <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/portfolio-effects.js"></script>
  <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/toucheffects.js"></script>
  <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/modernizr.js"></script>
  <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/animation.js"></script>
 
 <script>
  $(document).ready(function() {
  /*//Set the carousel options
  $('#quote-carousel').carousel({

    pause: true,
    interval: 4000,
  });*/
});

</script>
<script> 
jQuery.noConflict();
jQuery(function() {
    jQuery('#a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                jQuery('html,body').animate({
                    scrollTop: target.offset().top
                }, 500);
                return false;
            }
        }
    });
});

  $(document).ready(function() {
        $(".show_fa_box").click(function() {
			var id = this.id;
			//alert("#faq-sub-categories-show_"+id);
			
            $("#faq-sub-categories-show_"+id).slideToggle( "slow", function() {
        });
    });
 });
 
 $(document).ready(function() {
    $(".tabings").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});

function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
   </script>