<style>
#response p
	{
	color:red;
	}	

	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    border-top: 1px solid #ccc;
}
	.table > tbody > tr > td{vertical-align: middle;}

	.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, 		.table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border-bottom: 1px solid #ddd !important;
    border: 1px solid #ddd;
}
	.table.dataTable.no-footer {
    border-bottom: 1px solid #ccc !important;
}
table.dataTable tbody td {
    padding: 15px 10px;
}
	table.dataTable thead th, table.dataTable thead td {
    padding: 15px 18px;
    border-bottom: 0px solid #111;
    font-size: 14px;
}
table
	{color:#000000;}
</style>

<!-- Main content -->
<div class="content-wrapper	">
<div class="content">
	<div class="container s-table">
		<div class="row panel-header text-center" style="border-bottom: 1px solid #f2f2f2;margin-bottom: 15px;">
			<div class="col-sm-12 col-md">
			<h3 class="pull-left" style="color: rgb(0, 0, 0);"><?php echo $master_title; ?></h1>
			<h3 class="pull-right hidden-xs hidden-sm">My Plans</h3>		
			</div>
		
		</div>
	
<div class="col-sm-6">
	<div class="tab-pane fade in active" >
		<div class="row">
<!-- edit form column -->

		<form id='updateProfileForm' method="post" action='<?php echo BASEURL; ?>/users/updateUserInfo' class="form-horizontal mar-top-sm" role="form" style="color: rgb(0, 0, 0);">
	<div class="form-group">
			<label class="col-lg-3 control-label">First name:</label>
		<div class="col-lg-8">
			<input class="form-control" name='fname' id="fname" type="text" value="<?php echo $user_profile_data['fname'] ;?>">
			<input type="hidden" id="userimage" name="image"/>
		</div>
	</div>
	<div class="form-group">
			<label class="col-lg-3 control-label">Last name:</label>
		<div class="col-lg-8">
			<input class="form-control" name='lname' id="lastname" type="text" value="<?php echo $user_profile_data['lname'] ;?>">
		</div>
	</div>
	<div class="form-group">
			<label class="col-lg-3 control-label">Email:</label>
		<div class="col-lg-8">
			<input class="form-control"  name='email' id="email" type="text" value="<?php echo $user_profile_data['email'] ;?>" >
		</div>
	</div>

	<div class="form-group">
			<label class="col-md-3 control-label">Phone No:</label>
		<div class="col-md-8">
			<input  type="text" class="form-control usphonenumber" name="agent_phone" id="agent_phone" value="<?php echo $user_profile_data['agent_phone'] ;?>">
		</div>
	</div>
		<div class="form-group">
			<label class="col-md-3 control-label">My Company Name:</label>
		<div class="col-md-8">
			
			<input  type="text" class="form-control" name="my_company_name" id="my_company_name" value="<?php echo $user_profile_data['company_name'] ;?>">
		</div>
	</div>
		<div class="form-group">
			<label class="col-md-3 control-label">My Company Logo:</label>
		<div class="col-md-8 col-xs">
			<?php if(!empty($user_profile_data['company_logo'])){?>
			<img id="img_logo_company" src="<?php echo BASEURL;?><?php echo $user_profile_data['company_logo'] ;?>" style="width: 100%;">
			<?php }else { ?>
			<img id="img_logo_company" src="<?php echo FRONT_END_LAYOUT;?>/assets/images/no-image-found.gif" style="width: 100%;">
			<?php } ?>
			<div id="response"></div>
			<input  type="file" class="" name="file_upload" id="my_company_logo" value="">
			 <input type='hidden' name='file_upload' id='file_upload' value=''>
			<div id="loader" class="text-center"></div>
		</div>
	</div>		
			
	<div class="form-group">
			<label class="col-md-3 control-label"></label>
		<div class="col-md-8 col-xs">
			<input id="save_profile" class="btn hvr-sweep-to-right btn-file btn-padding" value="Save Your Changes" type="submit" >
			<a class="btn hvr-sweep-to-right btn-file pull-right btn-padding" href="<?php echo BASEURL; ?>/account/change_password">Change Password</a>
		</div>
	</div>
			
	</form>

</div>

	</div>

</div>
	<h3 class="text-center hidden-md hidden-lg" style="margin-top: 0px;">My Plans</h3>	
<div class="col-sm-6 col-xs">
	<div class="table-responsive">
	<table class="table table-striped table-hover" id="user_pack_detail" >
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Amount</th>
							<th>Balance</th>
							<th>Type</th>
                            <th>Next Billing</th>
                          
                           
                        </tr>
                    </thead>
                    <tbody class="text-left">
						<?php foreach($user_pack_detail as $key=>$val){?>
						<tr>
							
							<td><?php echo $val['name']; ?></td>
							<td>$ <?php echo $val['price']; ?></td>
							<td><?php echo $val['no_of_maps']; ?></td>
							<td><?php echo $val['type']; ?></td>
							<td><?php if($val['type'] == 'Single'){echo '-';}else{ echo date('d/m/Y',$val['expired_on']);} ?></td>
						
						</tr>	
						<?php } ?>
					</tbody>
    </table>
	</div>
		
</div>
	</div>
</div>
</div>
<!-- /.content -->