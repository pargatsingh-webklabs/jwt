<div class="col-sm-8 view">
	<h3 style="border-bottom:1px solid #ccc;"><?php echo (isset($master_title) && !empty($master_title))?$master_title:'Account Information'; ?></h3>   
	<div class=" col-sm-12 infor col">

	</div>
		<form name="form_account_information" id="form_account_information" method="post" action="<?php echo BASEURL ?>/account/account_info">
			<div class="row">
				<div class="col-sm-6  ">
					<div class="form-group">
						<label>Prefix</label>
						<select class="form-control" name="honorifics">
						   <?php foreach($honorifics as $key=>$val){ ?>
							<option value="<?php echo $key ?>" <?php echo ($key==$user_info['honorifics'])?'selected':''; ?>><?php echo $val; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-sm-6 group ">
					<div class="form-group">
						<label> * First Name</label>
						<input type="text" name="fname" class="form-control" value="<?php echo $user_info['fname'] ?>" />
					</div>
				</div>
			</div>
			<div class="row">		
				<div class="col-sm-6 group ">
					<div class="form-group">
						<label> * Last Name</label>
						<input type="text" name="lname" class="form-control" value="<?php echo $user_info['lname'] ?>" />
					</div>
				</div>
				<div class="col-sm-6 group ">
					<div class="form-group">
						<label> * Email Address</label>
						<input type="text" name="email" class="form-control" value="<?php echo $user_info['email'] ?>"/>
					</div>
				</div>
			</div>
		<div class="col-sm-12 save col">
			<a href="" class="btn btn-danger">Go back </a>
			<button type="submit" class="btn btn-danger" style="color:#fff; background:#000;"><span id="validating"  class="pull-left"></span>&nbsp;  Save </button>
		</div>
		</form>		
</div>