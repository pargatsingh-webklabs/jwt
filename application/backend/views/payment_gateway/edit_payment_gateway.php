
  <div class="warper container-fluid">
	<div class="page-header"><h1>Change Payment Gateway </h1></div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Change Payment Gateway
	<a href="<?php echo BASEURL ?>/payment_gateway" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-hand-o-left"></i> Go back </a>						
					</div>
				<div class="panel-body">

  <form role="form" action="<?php echo BASEURL; ?>/payment_gateway/add_payment_gateway/<?php echo $payment_gatewaydata['id']; ?>" id='form_payment_gateway_validation' method='post'>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			 <label>New Payment Gateway</label>
			 <input name="payment_gateway"  id="about_us"  class="form-control" value="<?php echo $payment_gatewaydata['name'];?>"/>
							</div>
						</div>
					</div>
				<!--	<div class="form-group">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			 <label>Description</label>
			 <textarea name="body" id="online_training"  class="form-control"><?php echo trim($payment_gatewaydata['page_text']);?></textarea>
							</div>
						</div>
					</div>-->	

					<div class="form-group">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="col-md-6 col-sm-6 col-xs-6 ">
							<div id="loader" class="pull-right " >
							</div>	
							</div>	
								<div class="col-md-6 col-sm-6 col-xs-6 ">
								<div class="pull-right ">
									
									<input class="btn btn-purple" value="Send" type="submit" />
									<span></span>
									
								<a href="<?php echo BASEURL; ?>/payment_gateway"  class="btn btn-danger" ><i class="fa fa-close"></i> Cancel</a>	  
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
