   <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="<?php echo base_url();?>">Home</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url('users/forgetpassword');?>">Recover-Password</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Recover password</h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END BREADCRUMB AREA
    =================================-->

    <!--================================
            START DASHBOARD AREA
    =================================-->
    <section class="pass_recover_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form id="forgetPasswordForm" method="post" action="<?php echo base_url('users/forgetpassword');?>">
                        <div class="cardify recover_pass">
                            <div class="login--header">
                                <p>Please enter the email address for your account. A verification code will be sent to you.
                                    Once you have received the verification code, you will be able to choose a new password
                                    for your account.</p>
                            </div>
                            <!-- end .login_header -->

                            <div class="login--form">
                                <div class="form-group">
                                    <label for="email_ad">Email Address</label>
                                    <input id="email_ad" name="email" type="text" class="text_field" placeholder="Enter your email address">
                                </div>

                                <button class="btn btn--md btn--round register_btn" type="submit">Recover Now</button>
                                <p id="validating"></p>
                            </div>
                            <!-- end .login--form -->
                        </div>
                        <!-- end .cardify -->
                    </form>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
    <!--================================
            END DASHBOARD AREA
    =================================-->
<script>
	$(document).ready(function() {
$('form[id="forgetPasswordForm"]').validate({
  rules: {
    
    email: {
      required: true,
      email: true
     
    }
  },
  messages: {
   email: 'Enter a valid email',
   
  },
  submitHandler: function(form) {
     $("#validating").html('<i class="fa fa-circle-o-notch fa-spin fa-fw" style="font-size:30px" aria-hidden="true"></i> Please wait...');
var $form= $('form[id="forgetPasswordForm"]');
              // Use Ajax to submit form data
                $.post($form.attr('action'),$form.serialize(), function (result) {
                    if (result.result == 'error') {
                        $("#validating").html('<span style="color: red;">'+result.message+'</span>');				
                    } else if (result.result == 'success') {
                           $("#validating").html('<span style="color: green;">'+result.message+'</span>');
							$form.each(function(){
								this.reset();
							});
							
						}
                }, 'json');
                return false;
  }
});
});
</script>
