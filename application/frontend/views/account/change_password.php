<div class="content-wrapper	">
<div class="content">
	<div class="container s-table">
		<div class="row panel-header text-center">
			<h3 class="text-center"><?php echo $master_title; ?></h3>
		</div>
	<hr>
           <div class="col-sm-6 col-sm-offset-3">
<form name="changePasswordForm" id="changePasswordForm" method="post" action="<?php echo BASEURL ?>/users/updatepassword">	   
    
		   
    			
				<div class="col-sm-12">
					<div class="form-group">
                        <input type="password" name="old_password" id="fname" class="form-control " placeholder="Old Password" tabindex="1">
					</div>
				</div>
		
	
				<div class="col-sm-12">
					<div class="form-group">
						<input type="password" name="new_password" id="lname" class="form-control " placeholder="New Password" tabindex="2">
					</div>
				</div>
		

			
					<div class="col-sm-12">
					<div class="form-group">
						<input type="password" name="confirm_new_password" id="lname" class="form-control " placeholder="Confirm Password" tabindex="2">
					</div>
			
			</div>
			<div class="col-sm-12">
				<p class="text-center"  id="showupdatedpassword"></p>
			</div>
	       <div class="col-sm-12">
					
                        <input type="submit" value="Change Password" class="btn btn-default btn-file">
							
			<a class="btn btn-default btn-file pull-right" href="<?php echo BASEURL; ?>/account">Back To Account</a>	
         </div>
		 </form>
       </div>
	</div>
  </div>
  </div>
