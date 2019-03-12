
<style>
	 .material-icons {
  float: left;
}
 </style>
<div class="container-fluid">
	<div class="block-header">
		<h2 style="text-transform: uppercase;">
			<?php echo ucfirst($master_title); ?>
		</h2>
	</div>
	<!--<div class="col-md-6"><div class="card">
	<!-- left column -->
	<!--<form action="
	<?php echo BASEURL ?>/profile/update_profile_image" id="upload_post_pic" class="upload_family_pic" method="post" enctype="multipart/form-data"><div id="show_image">
	<!--<img src="<?php echo $admin_info['image'] ;?>" class="avatar img-responsive " alt="avatar">-->
	<!--<i class="material-icons">insert_photo</i><span class="icon-name">UPLOAD YOUR PICTURE</span><img src="
	<?php //echo (!empty($admin_info['image']))?BASEURL.$admin_info['image']:THEME_URL.'assets/images/avtar/no-photo.jpg' ; ?>" style="width:300px !important; "></div><input type="file" name="userfile" ></form></div></div>-->
	<div class="col-md-12">
		<div class="card">
			<?php $MSSG=array();if($this->session->flashdata('success')){
						 $MSSG["card"] = "success";$MSSG["MSSG"] =  $this->session->flashdata('success');
					 }
					 if($this->session->flashdata('error')){
						$MSSG["card"] = "danger";$MSSG["MSSG"] =  $this->session->flashdata('error');
					 }
					 if(!empty($MSSG)){
					 ?>	
					<div class="alert alert-<?php echo @$MSSG["card"];?> alert-rounded"> <i class="ti-user"></i> <?php echo @$MSSG["MSSG"];?><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>
					<?php }?>
			<div class="panel panel-default">
				<div class="header">
					<i class="material-icons">person</i>
					<h2 style="margin: 5px 20px; text-transform: uppercase; font-size: 14px; font-weight: normal;"> Change Password</h2>
				</div>
				<div class="panel-body">
					<form  class="fv-form fv-form-bootstrap" id='updatePassword' method="post" action='
						<?php echo BASEURL; ?>/users/changePassword' role="form">
						
						<div class="row clearfix">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label>Password</label>
											<input type="text" autocomplete="off" class="form-control" required name="new_password" id="new_password"/>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="form-line">
												<label>Confirm Password</label>
												<input type="text" autocomplete="off" class="form-control" required id="confirm_password"/>
												</div>
											</div>
										</div>
						</div>
						<div class="row clearfix">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
									<button id="formbutton" type="button" class="btn btn-success waves-effect waves-light">Save Password</button>
									</div>
								</div>
							</div>
						</div>
						</form>
												</div>
											</div>
										</div>
									</div>
	
<script>
	$(document).ready(function(){
$("#formbutton").on("click",function(e){
		e.preventDefault();
		if($("#new_password").val().trim()==""){
			alert("Password can't be empty.");
			return false;
		}
		if($("#new_password").val().trim()!==$("#confirm_password").val().trim()){
			alert("Password and Confirm Password must be same.");
			return false;
		}
		$("#updatePassword").submit();
		
});
});
</script>
