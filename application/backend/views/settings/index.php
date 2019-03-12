
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
					<h2 style="margin: 5px 20px; text-transform: uppercase; font-size: 14px; font-weight: normal;"> Update Settings</h2>
				<div class="row clearfix">
					<button id="add_new" class="btn bg-red waves-effect pull-right">Add New</button>
				</div>
				</div>
				<div class="header">
					<h2 style="margin: 5px 20px; text-transform: uppercase; font-size: 14px; font-weight: normal;float:left;">setting keys: </h2>
					<div class="row ">
						<div class="col-sm-6">
							<div class="form-group">
								(<label>stripe_sk_key</label> , <label>stripe_pk_key</label>)
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<form  class="fv-form fv-form-bootstrap" id='save_settings' name='form_save_settings' method="post" action='<?php echo BASEURL; ?>/settings/save_settings'  role="form">
<!--
						<div class="row clearfix">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label>Setting Label</label>
										<input  class="form-control" required name="key[0]" value="<?php echo $admin_info['key'] ?>" type="text">
										</div>
									</div>
								</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
									<label>Setting Value</label> 
									<input  class="form-control" name="value[0]" value="<?php echo $admin_info['value'] ?>" type="text">
									</div>
								</div>
							</div>
						</div>
-->

					<div class="clearfix" id="addNewRow"></div>
					
									<div class="form-line">
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12 ">
												<div class="col-md-6 col-sm-6 col-xs-6 ">
													<div id="loader" class="pull-right " ></div>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-6 ">
													<div class="pull-right ">
														<button onclick="return confirm('Are you sure you want to update Settings?')" type="submit" class="btn bg-red waves-effect">Update</button>
														<button type="submit" href="
															<?php echo BASEURL; ?>/settings"  class="btn bg-grey waves-effect" > Cancel
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
<script>
var row =0;
$(document).ready(function () {
	
	$("#add_new").on("click",function(e){
		e.preventDefault();
		row = addRow(row,"","");
		row++;
	});
	$(document).on("click",".removeRow",function(e){
		e.preventDefault();
		rem_id = $(this).attr("rem_id");
		$("#"+rem_id).remove();
	});
});
function addRow(row,label,value){
	var $html="";
	$html='<div class="row" id="'+row+'"><div class="col-sm-6"><div class="form-group"><div class="form-line"><label>Setting Label</label><input required class="form-control" name="key['+row+']" value="'+label+'" type="text"></div></div></div><div class="col-sm-6"><div class="form-group"><div class="form-line"><label>Setting Value</label><a href="javascript:void(0);" rem_id="'+row+'" style="float: right;border-radius: 5px;" class="removeRow  bg-red"><i class="material-icons">delete</i></a><input  class="form-control" name="value['+row+']"  value="'+value+'" type="text"></div></div></div></div>';
	$("#addNewRow").append($html);
	return row;
}
function listsettings(){
	$.ajax({
	 url: "<?php echo BASEURL; ?>/settings/listsettings",
	 async:false,
	 dataType:'json',
	 success: function(result){
		$.each(result,function(index,data){
			addRow(index,data.key,data.value);
			row = index+1;
		});
     }});
}
listsettings();
</script>				
