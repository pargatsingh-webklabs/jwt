<div class="warper container-fluid">
	<div class="page-header"><h1>Change password </h1></div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Change your password </div>
				<div class="panel-body">
					<?php if(isset($update) && !empty($update) && $update=='wrong_old_pass'){ ?>
						<div class="pull-right">Wrong old password</div>
						<?php } else if(isset($update) && !empty($update) && $update=='successful'){ ?>
						<div class="pull-right">Password Updated Successfully</div>
					<?php }?>
					<form method='post' action="<?php echo BASEURL; ?>/settings/changepassword" id='form_validation_password'>
						<div class="form-group">
							<label class="control-label">Current Password</label>
							<input type="password" name='old_password' id='old_password' class="form-control"/>
						</div>
						<div class="form-group">
							<label class="control-label">New Password</label>
							<input type="password" name='new_password' id='new_password' class="form-control"/>
						</div>
						<div class="form-group">
							<label class="control-label">Re-type New Password</label>
							<input type="password" name='confirm_new_password' id='confirm_new_password' class="form-control"/>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12 ">
						<div class="col-md-6 col-sm-6 col-xs-6 ">
							<div id="updateprofilevalidating" class="pull-right " >
							</div>	
							</div>	
						           <div class="col-md-6 col-sm-6 col-xs-6 ">							
									<div class="pull-right ">
										<p id="updateprofilevalidating" class="text-center"></p>  
										<input class="btn btn-purple" value="Save Changes" type="submit" />
										<span></span>
										<input class="btn btn-danger"  style= value="Cancel" type="reset" />
									</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>