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
                                <a href="<?php echo base_url('login');?>">Login</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Login</h1>
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
            START LOGIN AREA
    =================================-->
    <section class="login_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form id="second_form" method="post" action="<?php echo base_url('users/login');?>">
                        <div class="cardify login">
                            <div class="login--header">
                                <h3>Welcome Back</h3>
                                <p>You can sign in with your username</p>
                            </div>
                            <!-- end .login_header -->

                            <div class="login--form">
                                <div class="form-group">
                                    <label for="user_name">Username</label>
                                    <input id="user_name" name="user_email" type="text" class="text_field" placeholder="Enter your username...">
                                </div>

                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input id="pass" name="psword" type="text" class="text_field" placeholder="Enter your password...">
                                </div>

                                <div class="form-group">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="ch2">
                                        <label for="ch2">
                                            <span class="shadow_checkbox"></span>
                                            <span class="label_text">Remember me</span>
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn--md btn--round" type="submit">Login Now</button>

                                <div class="validating_new"></div>
                                <div class="login_assist">
                                    <p class="recover">Lost your
                                        <a href="pass-recovery.html">username</a> or
                                        <a href="pass-recovery.html">password</a>?</p>
                                    <p class="signup">Don't have an
                                        <a href="signup.html">account</a>?</p>
                                </div>
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
            END LOGIN AREA
    =================================-->
<script>
	$(document).ready(function() {
$('form[id="second_form"]').validate({
  rules: {
    
    user_email: {
      required: true,
      email: true,
    },
    psword: {
      required: true,
      minlength: 8,
    }
  },
  messages: {
   user_email: 'Enter a valid email',
    psword: {
      minlength: 'Password must be at least 8 characters long'
    }
  },
  submitHandler: function(form) {
    //~ form.submit();
     $(".validating_new").html('<i class="fa fa-circle-o-notch fa-spin fa-fw" style="color:#fff !important;font-size:30px" aria-hidden="true"></i> Signing in...');
                // Prevent form submission
                form.preventDefault();

              

               

                // Use Ajax to submit form data
                $.post($form.attr('action'),$form.serialize(), function (result) {
                    if (result.result == 'error') {
                        $("#validating").html(result.message);
                        $(".validating_new").html('Sign in');						
                    } else if (result.status == '0') {
                        $("#validating").html("Your account is currently disabled by the administrator");
                    } else if (result.result == 'success') {
                        //window.location.reload();
                        window.location.href = BASEURL + '/account/dashboard';
                    }
                }, 'json');
  }
});
});
</script>
