
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
			<div class="panel panel-default">
				<div class="header">
					<i class="material-icons">person</i>
					<h2 style="margin: 5px 20px; text-transform: uppercase; font-size: 14px; font-weight: normal;"> Edit Your Profile</h2>
				</div>
				<div class="panel-body">
					<form  class="fv-form fv-form-bootstrap" id='edit_profile' name='form_admin_edit_profile' method="post" action='
						<?php echo BASEURL; ?>/profile/update_profile'  role="form">
						<div class="row clearfix">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label>First Name</label>
										<input type="hidden" value="
											<?php echo $admin_info['id'] ?>" id="userimage" name="id"/>
											<input  class="form-control" name="first_name" value="<?php echo $admin_info['first_name'] ?>" type="text"  name="template_name">
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="form-line">
												<label>Last Name</label>
												<input  class="form-control"  name="last_name" value="<?php echo $admin_info['last_name'] ?>" type="text"  name="template_name">
												</div>
											</div>
										</div>
									</div>
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group">
												<div class="form-line">
													<label>Display Name</label>
													<input  class="form-control" name="display_name" value="<?php echo $admin_info['display_name'] ?>" type="text"  name="template_name">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label>email</label>
														<input  class="form-control"  name="email"  value="<?php echo $userdata['email'] ?>" type="text"  name="template_name">
														</div>
													</div>
												</div>
										<?php if($admin_info['superadmin'] == 1){ ?>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="form-line">
														<label>Authenticate Passsword</label>
														<input  class="form-control"   value="<?php //echo $admin_info['email'] ?>" type="password"  name="verify_password">
														</div>
													</div>
												</div>
										<?php } ?>
											</div>
											<div class="row clearfix">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="form-line">
															<label>about_myself</label>
															<textarea id="ckeditor" rows="4" class="form-control no-resize" name="about_myself">
																<?php echo $admin_info['about_myself'] ?>
															</textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row clearfix">
														</div>
														<div class="form-line">
															<div class="row">
																<div class="col-md-12 col-sm-12 col-xs-12 ">
																	<div class="col-md-6 col-sm-6 col-xs-6 ">
																		<div id="loader" class="pull-right " ></div>
																	</div>
																	<div class="col-md-6 col-sm-6 col-xs-6 ">
																		<div class="pull-right ">
																			<button type="submit" class="btn bg-red waves-effect">Save Changes</button>
																			<button type="submit" href="
																				<?php echo BASEURL; ?>/template"  class="btn bg-grey waves-effect" > Cancel
																			</button>
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
									<!-- TinyMCE -->
<script src="<?php echo THEME_URL?>assets/plugins/tinymce/tinymce.js"></script>
<script src="<?php echo THEME_URL?>assets/js/pages/forms/editors.js"></script>
 <script src="<?php echo THEME_URL?>assets/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo THEME_URL?>assets/js/plugins/ckeditor/adapters/jquery.js"></script>
  <!-- TinyMCE -->
    <script src="<?php echo THEME_URL?>assets/plugins/tinymce/tinymce.js"></script>
									<script>
	$(document).ready(function () {
		$('#upload_pics').change(function () {
			var fr = new FileReader;
			fr.onload = function () {
				var img = new Image;
				img.onload = function () {
					if(this.width>=200 && this.height>=200)
					{
						var formcontent = $("#upload_post_pic");
						var formcontentFiles = new FormData(formcontent[0]);
						$.ajax({
							url: formcontent.attr('action'), // Url to which the request is send
							type: formcontent.attr('method'), // Type of request to be send, called as method
							data: formcontentFiles, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
							contentType: false, // The content type used when sending data to the server.
							cache: false, // To unable request pages to be cached
							processData: false, // To send DOMDocument or non processed data file it is set to false
							beforeSend: function () {
								$("#loader_upload").show();
								//$("#loader_upload").html("
										<img src='" + FRONT_LAYOUT_URL + "/assets/img/loading.gif' />");
							},
							success: function (data)   // A function to be called if request succeeds
							{
								data = eval("(" + data + ")");
								$("#loader_upload").hide();
								var error = data.error;
								if(error == undefined){
									$('#userimage').val(data.image);
									$("#show_image").html($("
										<img    src='" + data.image + "' class='avatar img-responsive img' style='width:300px !important' alt='' />").fadeIn(2000));						
									$("#sidebar_image").html($("
										<img    src='" + data.image + "' class='avatar img-circle img-responsive img '  alt='' style='' />").fadeIn(2000));						
									$('#error_upload').hide();
									} else{
									$('#error_upload').html("
										<b style='font-size:14px; color:#cc0000'>"+data.error+"</b>");
									var text  = $('#error_upload').html();
									if(text!=""){
										$('#upload_button').attr('disabled',true);
										$('#upload_button').html("");
									} 
								}
							}
						});
					}
					else{ 
						$("#loader_upload").html('
										<b style="color:#DB4D4D;">Please select a image of minimum dimension 200 X 200 </b>'); 
						$("#loader_upload").fadeOut(1000).css("color","lime").css("font-size","16px").css("text-shadow","0px 0px 50px black");
						$("#loader_upload").fadeIn();
					return false;}
				}
				img.src = fr.result;
			};
			fr.readAsDataURL(this.files[0]);
		});
	});
	
									</script>				
