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
                            <li>
                                <a href="<?php echo base_url('users/dashboard');?>">Dashboard</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url('users/settings');?>">Settings</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title"> <?php echo $userdata["fname"]." ".$userdata["lname"];?> Settings</h1>
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
    <section class="dashboard-area">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="dashboard_menu">
                            <li>
                                <a href="<?php echo base_url('users/dashboard');?>">
                                    <span class="lnr lnr-home"></span>Dashboard</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url('users/settings');?>">
                                    <span class="lnr lnr-cog"></span>Setting</a>
                            </li>
<!--
                            <li>
                                <a href="dashboard-purchase.html">
                                    <span class="lnr lnr-cart"></span>Purchase</a>
                            </li>
                            <li>
                                <a href="dashboard-add-credit.html">
                                    <span class="lnr lnr-dice"></span>Add Credits</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.html">
                                    <span class="lnr lnr-chart-bars"></span>Statements</a>
                            </li>
-->
                            <li>
                                <a href="dashboard-upload.html">
                                    <span class="lnr lnr-upload"></span>Upload Items</a>
                            </li>
                            <li>
                                <a href="dashboard-manage-item.html">
                                    <span class="lnr lnr-briefcase"></span>Manage Items</a>
                            </li>
<!--
                            <li>
                                <a href="dashboard-withdrawal.html">
                                    <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                            </li>
-->
                        </ul>
                        <!-- end /.dashboard_menu -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->

        <div class="dashboard_contents">
            <div class="container">
				<div class="row-fluid">
			<div class="" style="float: none;margin: 0 auto;margin-bottom: 30px;">
			<?php if($this->session->flashdata('success')){?>
					 <div class="alert alert-success alert-rounded"> <i class="ti-check"></i> <?php echo $this->session->flashdata('success');?><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					 </div>
			<?php }?>	
			</div>
		</div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="dashboard__title">
                                <h3>Account Settings</h3>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="information_module">
                                <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4>Personal Information
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse2">
                                    <div class="information_wrapper form--fields">
										
                <form action="<?php echo base_url('users/settings');?>" method="post" enctype="multipart/form-data" class="setting_form" id="userSettings">
                                        <div class="form-group">
                                            <label for="acname">First Name
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="acname" name="fname" class="text_field" placeholder="First Name" value="<?php echo @$userInfo['fname'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="usrname">Last Name
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="usrname" name="lname" class="text_field" placeholder="Account name" value="<?php echo @$userInfo['lname'];?>">
<!--                                       <p>Your MartPlace URL: https://martplace.com/
                                                <span>aazztech</span>
                                            </p>
                                            -->
                                        </div>

                                        <div class="form-group">
                                            <label for="emailad">Email Address
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="emailad" name="email" class="text_field" placeholder="Email address" value="<?php echo @$userInfo['email'];?>">
                                        </div>

<!--
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="password"  name="password" id="password" class="text_field" placeholder="Email address">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="conpassword">Confirm Password
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="password" name="conpassword" id="conpassword" class="text_field" placeholder="re-enter password">
                                                </div>
                                            </div>
                                        </div>
-->

                                        <div class="form-group">
                                            <label for="website">Mobile</label>
                                            <input type="text" id="agent_mobile" name="agent_mobile" class="text_field" placeholder="Mobile" value="<?php echo @$userInfo['agent_mobile'];?>">
                                        </div>

<!--
                                        <div class="form-group">
                                            <label for="country">Country
                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select  id="country" class="text_field">
                                                    <option value="">Select one</option>
                                                    <option value="bangladesh">Bangladesh</option>
                                                    <option value="india">India</option>
                                                    <option value="uruguye">Uruguye</option>
                                                    <option value="australia">Australia</option>
                                                    <option value="neverland">Neverland</option>
                                                    <option value="atlantis">Atlantis</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="prohead">Profile Heading</label>
                                            <input type="text" id="prohead" class="text_field" placeholder="Ex: Webdesign & Development Service">
                                        </div>
-->

                                        <div class="form-group">
                                            <label for="authbio">Author Bio</label>
                                            <textarea name="about_me" id="authbio" class="text_field" placeholder="Short brief about yourself or your account..."><?php echo @$userInfo['about_me'];?></textarea>
                                        </div>
                                    

                                        <div class="form-group">
											 
                                              <button type="submit" class="btn btn--round btn--md">Save Change</button>
                                            
                                        </div>
                                        </form>
                                    </div>
                                    <!-- end /.information_wrapper -->
                                </div>
                                <!-- end /.information__set -->
                            </div>
                            <!-- end /.information_module -->

                         
                            <!-- end /.information_module -->
                        </div>
                        <!-- end /.col-md-6 -->

                        <div class="col-lg-6">
                            <div class="information_module">
                                <a class="toggle_title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4>Profile Image & Cover
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set profile_images toggle_module collapse" id="collapse3">
									  <form action="<?php echo base_url('users/upload_file');?>" method="post" enctype="multipart/form-data" class="setting_form" id="userSettings2">
                                    <div class="information_wrapper">
                                        <div class="profile_image_area">
                                            <?php if(trim($userInfo['image'])!=''):?>
					
                                            <img src="<?php echo base_url('uploads')."/".$userInfo['image']; ?>">
                                            <?php else:?>
                                          <img src="images/authplc.png" alt="Author profile area">
                                              <?php endif;?>
                                            <div class="img_info">
                                                <p class="bold">Profile Image</p>
                                                <p class="subtitle">JPEG, GIF or PNG 100x100 px</p>
                                            </div>

                                            <label for="cover_photo" class="upload_btn">
                                                <input type="file" name="userfile" required  id="cover_photo">
                                                <span class="btn btn--sm btn--round" aria-hidden="true">Upload Image</span>
                                            </label>
                                        </div>
                                         <div class="form-group">
												  <button type="submit" class="btn btn--round btn--md">Save Change</button>
											</div>
                                        </form>

<!--
                                        <div class="prof_img_upload">
                                            <p class="bold">Cover Image</p>
                                            <img src="images/cvrplc.jpg" alt="The great warrior of China">

                                            <div class="upload_title">
                                                <p>JPG, GIF or PNG 750x370 px</p>
                                                <label for="dp" class="upload_btn">
                                                    <input type="file" id="dp">
                                                    <span class="btn btn--sm btn--round" aria-hidden="true">Upload Image</span>
                                                </label>
                                            </div>
                                        </div>
-->
                                    </div>
                                </div>
                            </div>
                            <!-- end /.information_module -->
                            <div class="information_module">
                                <a class="toggle_title" href="#collapse8" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4>Reset Password
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set social_profile toggle_module collapse " id="collapse8">
                                    <div class="information_wrapper">
										 <form id="updateUserPassword" method="post" action="<?php echo base_url('users/updatepassword');?>">
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="password"  name="new_password" id="new_password" class="text_field" placeholder="enter password">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="conpassword">Confirm Password
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="password" name="conpassword" id="conpassword" class="text_field" placeholder="re-enter password">
                                                </div>
                                            </div>
                                        </div>
                                         <button class="btn btn--md btn--round register_btn" type="submit">Reset Now</button>
                                          <p id="validating"></p>
									</form>
                                       
                                    </div>
                                    
                                </div>

                               
                            </div>
	

<!--
                            <div class="information_module">
                                <a class="toggle_title" href="#collapse5" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                                    <h4>Social Profiles
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set social_profile toggle_module collapse " id="collapse5">
                                    <div class="information_wrapper">
                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-facebook"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" placeholder="ex: www.facebook.com/aazztech">
                                            </div>
                                        </div>
                                       

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-twitter"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" placeholder="ex: www.twitter.com/aazztech">
                                            </div>
                                        </div>
                                      

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-google-plus"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" placeholder="ex: www.google.com/aazztech">
                                            </div>
                                        </div>
                                        
                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-behance"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" placeholder="ex: www.behance.com/aazztech">
                                            </div>
                                        </div>
                                       

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-dribbble"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" placeholder="ex: www.dribbble.com/aazztech">
                                            </div>
                                        </div>
                                       
                                    </div>
                                    
                                </div>

                               
                            </div>
	
-->
                            <!-- end /.information_module -->

                        </div>
                        <!-- end /.col-md-6 -->

<!--
                        <div class="col-md-12">
                            <div class="dashboard_setting_btn">
                                <button type="submit" class="btn btn--round btn--md">Save Change</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="dashboard_setting_btn">
                                <div id="validating"></div>
                            </div>
                        </div>
-->
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->
<!--
                </form>
-->
                <!-- end /form -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    <!--================================
            END DASHBOARD AREA
    =================================-->

<script>
	$(document).ready(function() {
$('form[id="userSettings"]').validate({
  rules: {
    fname:'required',
    lname:'required',
    email: {
      required: true,
      email: true,
    },
    agent_mobile: {
      required: true,
      number: true
    },
    //~ password: {
      //~ required: true,
      //~ minlength: 5,
    //~ },
    //~ conpassword: {
      //~ required: true,
      //~ minlength: 5,
    //~ }
  },
  messages: {
   fname: 'First name is required',
   lname: 'Last name is required',
   email: 'Enter a valid email',
   agent_mobile: {
      number: 'Mobile no. must be numeric numbers'
   },
   //~ password: {
      //~ minlength: 'Password must be at least 5 characters long'
   //~ },
   //~ conpassword: {
      //~ minlength: 'Confirm Password must be at least 5 characters long'
   //~ }
  },
  submitHandler: function(form) {
    form.submit();
     //~ $("#validating").html('<i class="fa fa-circle-o-notch fa-spin fa-fw" style="font-size:30px" aria-hidden="true"></i> Saving ...');
    
//~ var $form= $('form[id="userSettings"]');
              //~ // Use Ajax to submit form data
                //~ $.post($form.attr('action'),$form.serialize(), function (result) {
					//~ if (result.result == 'error') {
                        //~ $("#validating").html(result.message);
                    //~ } else if (result.status == '0') {
                        //~ $("#validating").html("Your account is currently disabled by the administrator");
                    //~ } else if (result.result == 'success') {
                        //~ window.location.href = '<?php echo base_url();?>';
                    //~ }
                //~ }, 'json');
                //~ return false;
  }
});
$('form[id="updateUserPassword"]').validate({
  rules: {
   
    new_password: {
      required: true,
      minlength: 5,
    },
    conpassword: {
      required: true,
      minlength: 5,
       equalTo : "#new_password"
    }
  },
  messages: {
  
   password: {
      minlength: 'Password must be at least 5 characters long'
   },
   conpassword: {
      minlength: 'Confirm Password must be at least 5 characters long',
       equalTo:'confirm password must be equal password'
   }
  },
  submitHandler: function(form) {
    form.submit(); 
  }
});
});
</script>
