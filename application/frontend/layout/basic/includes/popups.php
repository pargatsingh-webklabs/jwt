<div class=" modal fade " id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="myModalLabel" style="text-transform:none">Sign In to your account </h2>
            </div>                
            <div class="modal-body login-modal"> 

  <!--<p>Stack Overflow is a question and answer site for professional and enthusiast programmers. It's 100% free, no registration required</p>-->
                <br/>
                <div class="clearfix"></div>
                <div id='social-icons-conatainer'> 
                    <form id="loginForm" method="post" action="<?php echo BASEURL; ?>/users/login" >
                        <div class='modal-body-left'> 
                            <div class="form-group">
                                <input type="email" id="email" name="email" placeholder="Enter your email" value="" class="form-control login-field">
                                <i class="fa fa-user login-field-icon"></i>
                            </div>

                            <div class="form-group">
                                <input type="password" id="login-pass" name='password' placeholder="Password" value="" class="form-control login-field">
                                <i class="fa fa-lock login-field-icon"></i>
                            </div>
                            <div class="form-group">
                                <p id='validating' style="color:red" class="text-center"></p>
                            </div>
                            <button type="submit" class="btn1 custom_overwrite_button_class btn-warning modal-login-btn">Sign In</button>
                    </form>                
                    <!--<a href="#" class="login-link text-center" >Lost your password?</a>-->
                    <button id='lost_password_loginpopup' data-toggle="modal" class="link_button forget-link" data-target="#forget-password-modal">  Forgot password?</button>
                </div>

                <div class='modal-body-right'>
                    <div class="modal-social-icons">
                        <a href='#' class="btn btn-default facebook"> <i class="fa fa-facebook modal-icons"></i> Sign In with Facebook </a>
                       <!--  <a href='#' class="btn btn-default twitter"> <i class="fa fa-twitter modal-icons"></i> Sign In with Twitter </a>-->
                        <a href='#' class="btn btn-default google"> <i class="fa fa-google-plus modal-icons"></i> Sign In with Google </a>
                                        <!-- <a href='#' class="btn btn-default linkedin"> <i class="fa fa-linkedin modal-icons"></i> Sign In with Linkedin </a>-->
                    </div> 
                </div>	
                <div id='center-line'> OR </div>
            </div>																												
            <div class="clearfix"></div>

            <div class="form-group modal-register-btn">
                <button id='new_user' data-toggle="modal" class="custom_overwrite_button_class link_button btn btn-default btn-warning" data-target="#register-modal"> New User Please Register</button>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="modal-footer login_modal_footer">
        </div>
    </div>
</div>
</div>

<div class=" modal fade " id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header login_modal_header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="myModalLabel" style="text-transform:none">Sign Up for an account </h2>
            </div>                
            <div class="modal-body login-modal">
                <form id="registerForm" method="post" action="<?php echo BASEURL; ?>/users/register">

                    <div class="clearfix"></div>
                    <div id='social-icons-conatainer'> 
                        <div class="form-group">
                            <div class="modal-social-icons modal-social-icons1">
                                <a href='#' class="btn btn-default facebook"> <i class="fa fa-facebook modal-icons"></i> Sign Up with Facebook </a>
                                <!--<a href='#' class="btn btn-default twitter"> <i class="fa fa-twitter modal-icons"></i> Sign In with Twitter </a>-->
                                <a href='#' class="btn btn-default google"> <i class="fa fa-google-plus modal-icons"></i> Sign Up with Google </a>
                                               <!-- <a href='#' class="btn btn-default linkedin"> <i class="fa fa-linkedin modal-icons"></i> Sign In with Linkedin </a>--><div id='center-line2' class='center-line1'> OR </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" id="nick_name" name="nick_name" placeholder="Enter your Nickname" value="" class="form-control login-field">
                            <i class="fa fa-user login-field-icon"></i>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" placeholder="Enter your email" value="" class="form-control login-field">
                            <i class="fa fa-envelope login-field-icon"></i>

                        </div>

                        <div class="form-group">
                            <input type="text" id="fname" name="fname" placeholder="Enter your first name" value="" class="form-control login-field">
                            <i class="fa fa-user login-field-icon"></i>
                        </div>
                        <div class="form-group">
                            <input type="text" id="lname" name="lname" placeholder="Enter your last name" value="" class="form-control login-field">
                            <i class="fa fa-user login-field-icon"></i>
                        </div>

                        <div class="form-group">
                            <input type="password" id="password" name='password' placeholder="Enter your password" value="" class="form-control login-field">
                            <i class="fa fa-lock login-field-icon"></i>
                        </div>

                        <div class="form-group">
                            <input type="password" id="confirmpassword" name='confirmpassword' placeholder="Confirm your password" value="" class="form-control login-field">
                            <i class="fa fa-lock login-field-icon"></i>
                        </div>




                        <div class="row">
                            <div class='col-sm-8 col-md-8 form-group'>			    			
                                <!-- <div class="radio ">
                                     <div class="row">
                                    <div class="col-sm-3">Gender</div>
                                    <div class="col-sm-4"><input type="radio" name="gender" value="male" checked="checked" style="margin-left: 10px;">Male</div>
                                    <div class="col-sm-4"><input type="radio" name="gender" value="female" style="margin-left: 10px;">Female</div>
                                    </div>
                                </div> -->       
                            </div>         
                            <div class="clearfix"></div>
                        </div>     
                        <div class="row">
                           <div class="col-sm-12">
                            <div style="width:15px; float:left; margin-left:0px;" >
                                <input type="checkbox" name='news_letter' value="1" />
                             </div>
                           <div class="chk-text">Send Rozi news </div>
                           </div> 
                          </div>

                        <div class="row" style="margin-bottom:2%;">
                           <div class="col-sm-12">
                            <div style="width:15px; float:left;margin-left:0px; margin-bottom:12%">
                                <input type="checkbox"  name='terms_and_cond' value="1" />
                                </div>
                            <div class="chk-text" style="margin-bottom:20px;	">
                             I agree to Rozi's Terms of Service and Privacy Policy.
                           </div>
                          </div> 
                        </div>    	    	
                        <p id='registervalidating' style="color:red" class="text-center"></p>


                        <button type="submit" class="btn custom_overwrite_button_class btn-warning modal-login-btn">Sign Up</button>
                        <div class="form-group last">
                            <div align="center">
                                Already a Rozi member? <a href="<?php echo BASEURL; ?>/users/login"> Sign In</a>
                            </div>
                        </div>

                </form>  


            </div>																												
            <div class="clearfix"></div>


        </div>
    </div>
</div>


</div>

<div class=" modal fade " id="forget-password-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="forgetPasswordForm" method="post" action="<?php echo BASEURL; ?>/users/forgetpassword">
                <div class="modal-header login_modal_header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h2 class="modal-title" id="myModalLabel" style="text-transform:none"><i class="fa fa-lock fa-2x"></i>  Forgot Password?</h2>
                </div>
                <div class="modal-body login-modal">

                    <p>You can reset your password here.</p>
                    <p id='forgotvalidating' class="text-center"></p>
                              <!--<p>Stack Overflow is a question and answer site for professional and enthusiast programmers. It's 100% free, no registration required</p>-->
                    <br/>


                    <div class="clearfix"></div>
                    <div id='social-icons-conatainer'>
                        <!--	<div class='modal-body-left'>-->
                        <fieldset>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>

                                    <input id="email" name="email" placeholder="Enter your registered email" class="form-control" type="email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="btn custom_overwrite_button_class btn-lg btn-warning btn-block" value="Send My Password" type="submit">
                            </div>
                        </fieldset>
                        </form>


                    </div>																												


                </div>
                <div class="clearfix"></div>
                <div class="modal-footer login_modal_footer">
                </div>
        </div>
    </div>
</div>
<script>
    $('#lost_password_loginpopup').click(function () {
        $('#login-modal').modal('hide');

    });
    $('#new_user').click(function () {
        $('#login-modal').modal('hide');
    });
</script>
