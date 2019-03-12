<section id="call-to-action">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h1>
					<p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
					<a href="contact.html" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Me</a>
				</div>
			</div>
			
		</div>
	</div>
</section>

<footer id="footer">
                <div class="container">
                    <div class="col-md-8">
                        <p class="copyright"><a href="<?php echo BASEURL; ?>"><?php echo SITE_NAME; ?></a> &copy; <span><?php echo date('Y'); ?> All Rights Are Reserved</span></p>
                    </div>
                    
                    <div class="col-md-4">
                        <!-- Social Media -->
                        <ul class="social">
                            <li>
                                <a href="http://wwww.fb.com/themefisher" class="Facebook">
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.twitter.com/themefisher" class="Twitter">
                                    <i class="ion-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="Linkedin">
                                    <i class="ion-social-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.fb.com/themefisher" class="Google Plus">
                                    <i class="ion-social-googleplus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
	</footer>  

	<script type="text/javascript" src="http://www.smoothmaps.com/application/frontend/layout/advance/assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/formValidation.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/bootstrap.js"></script>	
	<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/validations.js"></script> 
<script>
	$(document).ready(function(){
		$('#paypal').click(function(){
			$('.cd-credit-card').hide();
			$('.half-width').removeClass('form-group');
		});
		$('#card').click(function(){
			$('.cd-credit-card').show();
			$('.half-width').addClass('form-group');
		});
	});

</script>		

	

