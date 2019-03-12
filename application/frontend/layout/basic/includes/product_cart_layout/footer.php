<!--News letter-->
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
          <li><a href="mail to:Info@clearvuoptical"><i class="fa fa-envelope" aria-hidden="true"></i>Info@clearvuoptical</a></li>
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
<script type="text/javascript">
	$("#rec").click(function() {
		$("#tab1").toggle();
	});
</script> 
<script type="text/javascript">
	/*$(document).ready(function(){
		$("#rec").click(function(event) {
			event.preventDefault();
			$("#tab1").toggle();
		});
		
		$('#btn_guest').click(function(){
			alert('test');
		});
		
		
		
	});*/
</script> 
<script type="text/javascript">
	$(document).ready(function(){
		$("#notifications").fadeOut(6000);
	});
</script> 
<script>
	$(function() {
		$('a[href*="#"]:not([href="#"])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 1000);
					return false;
				}
			}
		});
	});
</script> 
<script type="text/javascript" src="https://js.stripe.com/v2/"></script> 
<script type="text/javascript">
	var hashTagActive = "";
    $(".scroll").click(function (event) {
        if(hashTagActive != this.hash) { //this will prevent if the user click several times the same link to freeze the scroll.
            event.preventDefault();
            //calculate destination place
            var dest = 0;
            if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
                dest = $(document).height() - $(window).height();
				} else {
                dest = $(this.hash).offset().top;
			}
            //go to destination
            $('html,body').animate({
                scrollTop: dest
			}, 2000, 'swing');
            hashTagActive = this.hash;
		}
	});
</script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/formValidation.js"></script> 
<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/bootstrap.js"></script> 
<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/validations.js"></script> 
<script type="text/javascript">
	    // [stripe_secret_key] => sk_test_mdHnMptuzNXW8T9MctJwZUkO
        // [stripe_publisher_key] => pk_test_dHrg4pmsIlYnxewjnEfkgCX1
</script> 
<script>
	$(document).ready(function(){
		$('.browse_div').hide();
		$('.checkbrowse').on('change',function() {
			var div = $(this).attr('upload_div');
            if( $(this).is(':checked') && div=='browse' ) {
				$('.browse_div').fadeIn();
				} else {
				$('.browse_div').fadeOut();
			}
		});
		
		//$('.cart-page').hide();
		$('.checkbrowse').on('change',function() {
			var div = $(this).attr('upload_div2');
            if( $(this).is(':checked') && div=='enter_now' ) {
				$('.cart-page').fadeIn();
				} else {
				$('.cart-page').fadeOut();
				}
		});
	
		
		//$('.lens_color_div').hide();
		$('.show_lens_color').on('change',function() {
			var lens_color = $(this).attr('lens_color');
			if(lens_color=='show' ) {
				$('.lens_color_div').fadeIn();
				} else {
				$('.lens_color_div').fadeOut();
			}
		});
		
		
		$('.one_pd').on('change',function() {
				$('.option').fadeOut();
				$('#option'+$(this).val()).fadeIn();
		});
	});
</script> 
<script type="text/javascript">
	$(document).ready(function(){
		$("#login_access").click(function(event) {
			event.preventDefault();
			$('#myModal_login').modal();
		});
		$("#btn_user").click(function(event) {
			event.preventDefault();
			$('#myModal_login').modal();
		});
		
		
		$("#regular_user").click(function(event) {
			event.preventDefault();
			$('#myModal_login').modal();
			});
		
		
		
		$("#existing_shipping_address").click(function(event) {
			event.preventDefault();
			$('#myModal_shipping').modal();
			//$('#myModal').modal();
		});
		$('#billing_address').hide();	
		$('#billing_checkbox').change(function () {
			if (!this.checked) 
			//  ^
			$('#billing_address').fadeIn('slow');
			else 
            $('#billing_address').fadeOut('slow');
		}); 
		$('.shipping_method').change(function () {
			var id = $(this).attr('id');
			var shipping_price = $(this).attr('method_price');
			var shipping_method = $(this).val();
			var subtotal = $('#subtotal').text();
			var estimated_total = $('#estimated_total').text();
			$.post(BASEURL+"/cart/estimated_total",{'id':id,'shipping_method':shipping_method,'shipping_price':shipping_price,'estimated_total':estimated_total,'subtotal':subtotal}, function (result) {
			    $("#method_name").html(result.method_name);
                $("#method_price").html(result.method_price);
                $("#method_description").html(result.method_description);
		        if(shipping_price==0){
					shipping_price = 'FREE';
					}else{
				    shipping_price = '$'+shipping_price;
				}
                $("#shipping_cost").html(shipping_price);
                $("#estimated_total").html('$'+result.estimated_total);
			}, 'json');
			//$('#shipping_cost').html(shipping_price);
		});
		$('#coupon').change(function(){
			var coupon_code = $("#coupon").val();
			$.post(BASEURL+"/discounts",{'coupon_code':coupon_code}, function (result) {
				if (result.result == 'error') {
					$("#validating").html("");
					$('#message').append('<div id="notifications"><div class="row"><div id="notification_error" class="animated flipInY"><i aria-hidden="true" class="fa fa-warning error_msg_icon"></i> '+result.message+'<div id="notification_error_close" class="close"><i class="fa fa-times" aria-hidden="true" style="margin-top: 7px;"></i></div></div></div></div>  ');
					$('#message').fadeOut(7000);
					} else if (result.result == 'success') {
					$("#validating").html("");
					$("#subtotal").html('$'+result.subtotal);
					$("#estimated_total").html('$'+result.estimated_total);				
					$('#message').append('<div id="notifications"><div class="row"><div id="notification_success" class="animated flipInY"><i class="fa fa-check-square-o success_msg_icon" aria-hidden="true"></i> '+result.message+'<div id="notification_success_close" class="close"><i class="fa fa-times" aria-hidden="true" style="margin-top: 7px;"></i></div></div></div>');
					$('#message').fadeOut(7000);
					
					
				}		
			}, 'json');	 
		});	
		/* 		$('.shipping_description').on('change',function() {
			if( $(this).is(':checked')) {
			$('#PayPal_div').fadeIn();
			$('#Stripe_div').fadeOut();
			}
			});
		*/
		$('#PayPal_div').hide();
		$('#Stripe_div').hide();
		$('#radio_PayPal').on('change',function() {
			if( $(this).is(':checked')) {
				$('#Stripe_div').hide();			
				$('#PayPal_div').fadeIn(1000);
			}
		});
		$('#radio_Stripe').on('change',function() {
			if( $(this).is(':checked')) {
				$('#PayPal_div').hide();
				$('#Stripe_div').fadeIn(1000);
			} 
		});	
		
		});
		
		$(document).ready(function(){
			$("#btn_popup_guest").click(function(){

				$('#guest_Modal_login').modal('show');
				
				});
			});
				
				
		
$(document).ready(function(){	
	var divradio6 = document.getElementById("prescription_enter_now");
      divradio6.style.display ="none";
	  //$('#radio6').click(){
		//  divradio6.style.display ="block";
		  
	
	
	});		
			

			/*$(document).ready(function(){
				$("#guest_submit_btn").click(function(){
        $.ajax({url: "<?php echo BASEURL ?>/cart/guest_data", success: function(result){
            $("#div1").html(result);
        }});
    });
});*/

/* $("#guest_form_shipping_login").submit(function(event) {
      var firstname = $('#guest_firstname').val();
	  var lastname = $('#guest_lastname').val();
	  var email = $('#guest_email').val();
	    $.post(BASEURL+"/cart/guest_data",{'fname': firstname, 'lname': lastname, 'email': email, 'type': 'guest'}, function (result) {
alert('test');
	
		}, 'json');	

}); */
		
		//$(document).ready(function(){
		/*$(function () {
        $("#guest_form_shipping_login").dialog({
            modal: true,
            autoOpen: false,
            title: "jQuery Dialog",
            width: 300,
            height: 150
        });
        $("#btn_guest").click(function () {
            $('#guest_form_shipping_login').dialog('open');
        });
    })*/
	//});	
		
		
		
	
</script>

<!-- New js code --> 
<!--js--> 
<!--<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>  --> 
<script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/jquery.bxslider.js"></script> 
<script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/function.js"></script> 
<script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/bootstrap.js"></script> 
