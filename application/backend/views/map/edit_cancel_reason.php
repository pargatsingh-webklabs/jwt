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
					<form id="edit_map" action="<?php echo BASEURL; ?>/map/edit_cancel_reason" method="post">
						<div class="row clearfix">
							<div class="col-md-6">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control " value="<?php echo $reasons_data['name']; ?>" placeholder="Name" name="edit_reason" />							<input type="hidden" name="id" value="<?php echo $reasons_data['id']; ?>" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="form-line">
									<input type="text" class="form-control " value="<?php echo $reasons_data['description']; ?>" placeholder="Description" name="description" />	
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



