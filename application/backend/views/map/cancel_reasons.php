<div class="container-fluid">
	<div class="block-header">
		<h2>
			<?php echo ucfirst($master_title); ?>
		</h2>
	</div>
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						<?php echo ucfirst($master_title); ?>
					</h2>
				</div>
				<div class="body">
					<form id="cancel_map" action="<?php echo BASEURL; ?>/map/add_reason" method="post">
						<div class="row clearfix">
							<div class="col-md-6">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control " placeholder="Name" name="reason" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="form-line">
									<input type="text" class="form-control " placeholder="Description" name="description" />	
									</div>
								</div>
							</div>
						</div>	
							<button type="submit" class="btn bg-red waves-effect">Submit</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



