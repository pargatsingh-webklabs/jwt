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
                                <a href="<?php echo base_url('users/register');?>">Signup</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Sign up</h1>
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
            START SIGNUP AREA
    =================================-->
    <section class="signup_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <form id="registerForm" method="post" action="<?php echo base_url('users/register');?>">
                        <div class="cardify signup_form">
                            <div class="login--header">
                                <h3>Create Your Account</h3>
                                <p>Please fill the following fields with appropriate information to register a new MartPlace
                                    account.
                                </p>
                            </div>
                            <!-- end .login_header -->

                            <div class="login--form">

                                <div class="form-group">
                                    <label for="urname">First Name</label>
                                    <input id="urname" name="fname" type="text" class="text_field" placeholder="Enter your Name">
                                </div>

                                <div class="form-group">
                                    <label for="user_name">Last Name</label>
                                    <input id="user_name" name="lname" type="text" class="text_field" placeholder="Enter your username...">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email_ad">Email Address</label>
                                    <input id="email_ad" name="email" type="text" class="text_field" placeholder="Enter your email address">
                                </div>


                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" class="text_field" placeholder="Enter your password...">
                                </div>

                                <div class="form-group">
                                    <label for="con_pass">Confirm Password</label>
                                    <input id="con_pass" name="confirm_password" type="password" class="text_field" placeholder="Confirm password">
                                </div>

                                <button class="btn btn--md btn--round register_btn" type="submit">Register Now</button>

                                <div class="login_assist">
                                    <p id="validating"></p>
                                    <p>Already have an account?
                                        <a href="<?php echo base_url('users/login');?>">Login</a>
                                    </p>
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
            END SIGNUP AREA
    =================================-->
<script>
	$(document).ready(function() {
$('form[id="registerForm"]').validate({
  rules: {
    fname:'required',
    lname:'required',
    email: {
      required: true,
      email: true,
      remote: {
                type: 'post',
                url: '<?php echo base_url('users/checkemailvalidity');?>',
                data: {
                    'email': $('input[name="email"]').value
                },
                
			}
    },
    password: {
      required: true,
      minlength: 5,
    },
    confirm_password: {
      required: true,
      minlength: 5,
        equalTo : "#password"
    }
  },
  messages: {
	  fname:'First name is required',
	  lname:'Last name is required',
   email: {
	   email:'Enter a valid email',
	   remote:'The email is already in use!'
	},
    password: {
      minlength: 'Password must be at least 5 characters long'
    },
     confirm_password : {
                   minlength : 'Confirm Password must be at least 5 characters long',
                  equalTo:'confirm password must be equal password'
                }
  },
  submitHandler: function(form) {
    //~ form.submit(false);
     $("#validating").html('<i class="fa fa-circle-o-notch fa-spin fa-fw" style="font-size:30px" aria-hidden="true"></i> Please wait...');
     //~ return false;	
                // Prevent form submission
                //~ form.preventDefault();
var $form= $('form[id="registerForm"]');
              // Use Ajax to submit form data
                $.post($form.attr('action'),$form.serialize(), function (result) {
					//~ alert(result);
                    if (result.result == 'error') {
                        $("#validating").html('<span style="color: red;">'+result.message+'</span>');
                        //~ $(".validating_new").html('Login Now');						
                    } else if (result.status == '0') {
                        $("#validating").html("Your account is currently disabled by the administrator");
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
