<div class="news-letter">
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <div class="sucribe">
          <h2>Subscribe to <span class="our_newsletter">Our Newsletter</span></h2>
        </div>
      </div>
      <div class="col-sm-5">
        <form class="mail-box">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Email Address">
            <button class="form-control-feedback" aria-hidden="true">
            <a href="<?php echo BASEURL; ?>/newslatter"><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/check.png" class="img-responsive" alt="Check"/> </a>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Footer-->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="footer-logo"> <img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/footer-logo.png" class="img-responsive" alt="footer logo"/> </div>
        <ul>
          <li>
            <address>
            <i class="fa fa-map-marker" aria-hidden="true"></i>3100 West Cary Street Richmond, VA 23221
            </address>
          </li>
          <li><a href="tel:8043554383"><i class="fa fa-phone" aria-hidden="true"></i>804.355.4383</a></li>
          <li><a href="mailto:Info@clearvuoptical"><i class="fa fa-envelope" aria-hidden="true"></i>Info@clearvuoptical</a></li>
        </ul>
      </div>
      <div class="col-sm-2">
        <h5>Information </h5>
        <ul>
          <li><a href="<?php echo BASEURL; ?>/pages/help">Help</a></li>
          <li><a href="<?php echo BASEURL; ?>/users/myorder">Orders status</a></li>
          <li><a href="<?php echo BASEURL; ?>/pages/free_shipping">Free shipping</a></li>
          <li><a href="<?php echo BASEURL; ?>/pages/returns_exchanges">Free return and exchange</a></li>
          <li><a href="<?php echo BASEURL; ?>/pages/international">international</a></li>
          <li><a href="<?php echo BASEURL; ?>/pages/about">about</a></li>
          <li><a href="<?php echo BASEURL; ?>/pages/meet_the_maker">meet the maker</a></li>
          <li><a href="<?php echo BASEURL; ?>/pages/contact">contact</a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <div class="our-social">
          <h5>our social</h5>
          <ul>
            <li><a href="#" title="Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i>pinterest</a></li>
            <li><a href="#" title="Vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i>vimeo</a></li>
            <li><a href="#" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i>instagram</a></li>
            <li><a href="#" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i>facebook</a></li>
            <li><a href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i>twitter</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <h5>opening time</h5>
        <p><i class="fa fa-clock-o" aria-hidden="true"></i> Monday - Friday: 08:30 am - 09:30 pm</br>
          Sat - Sun: 09:00 am - 10:00 pm</p>
        <div class="payment-option">
          <h5>Payment option</h5>
          <ul>
            <li><a href="#"><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/mastercard.png" class="img-responsive" alt="Mastercard"/></a></li>
            <li><a href="#"><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/visa.png" class="img-responsive" alt="Visa"/></a></li>
            <li><a href="#"><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/amricanexpress.png" class="img-responsive" alt="Amrican express"/></a></li>
            <li><a href="#"><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/discover.png" class="img-responsive" alt="Discover"/></a></li>
          </ul>
          </ </div>
      </div>
    </div>
  </div>
</footer>
<div class="footer-strip">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="terms-privacy">
          <ul>
            <li><a href="#">Terms of Use </a></li>
            <li><a href="#" class="border-none">Privacy policy</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6">
        <p>&copy; 2016 Need Supply Co.—All Rights Reserved</p>
      </div>
    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

<script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/jquery.zoom.js"></script> 
<script>
		$(document).ready(function(){
			$('#ex1').zoom();
			$('#ex2').zoom({ on:'grab' });
			$('#ex3').zoom({ on:'click' });			 
			$('#ex4').zoom({ on:'toggle' });
		});
	</script> 
<script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/lightslider.js"></script> 
<script>
    	 $(document).ready(function() {
			$("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});
    </script> 
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> 
<script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/jquery.selectBoxIt.min.js"></script> 
<script>
            $(function() {

              var selectBox = $("select").selectBoxIt();

            });
          </script> 
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/bootstrap.js"></script> 
<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/validations.js"></script> 
<script>
    $(document).ready(function() {
		$('.frame_image').click(function(){
		 var imagesrc = $(this).attr('src');
		 $('.show_frame_img').html("").hide();
		 $('.show_frame_img').append('<img src="'+imagesrc+'" width="100%" height="320" />').fadeIn();
		});				  
	
 	$('#add_wishlist').click(function(){
	  $.ajax({
		 type: "POST",
		 url: BASEURL+"/product/check_addwishlist"
	   }).done(function( data ) {
	        data=eval("("+data+")");
			if(data.message=='no_session'){
				$('#modal_login').modal();
			}
			if (result.result == 'error') {
				$("#validating").html("");
				$('#modal_login').modal('hide');
				$('#message').append('<div id="notifications"><div class="row"><div id="notification_error" class="animated flipInY"><i aria-hidden="true" class="fa fa-warning error_msg_icon"></i> '+result.message+'<div id="notification_error_close" class="close notification_close"><i class="fa fa-times" aria-hidden="true" style="margin-top: 7px;"></i></div></div></div></div>  ');
				$('#message').fadeOut(7000);
				} else if (result.result == 'success') {
				$("#validating").html("");
				$('#modal_login').modal('hide');
				$('#add_wishlist').hide();				
				$('#message').append('<div id="notifications"><div class="row"><div id="notification_success" class="animated flipInY"><i class="fa fa-check-square-o success_msg_icon" aria-hidden="true"></i> '+result.message+'<div id="notification_success_close" class="close notification_close"><i class="fa fa-times" aria-hidden="true" style="margin-top: 7px;"></i></div></div></div>');
				$('#message').fadeOut(7000);
			}			
	   });
	}); 
	
	
	
	
	
	});
	</script> 
    
    <!-- New js code --> 
<!--js--> 
<!--<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>  --> 
<script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/jquery.bxslider.js"></script> 
<script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/function.js"></script> 
<script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/bootstrap.js"></script> 
