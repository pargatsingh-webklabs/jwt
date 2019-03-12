<div class="container-fluid">
	<div class="block-header">
		<h2><?php echo $master_title; ?></h2>
	</div>
	<div class="card  col-sm-12">
		<div class=" header">
			<p>Fill The Password Below To Upload The Locatoin:</p>
		</div>	
		<div class=" panel-body">
			<form id="pass_authentication"  method="post">
				<div class="form-group">
					<div class="form-line">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd" name="authenticate">
					</div>
				</div>
				<input value="submit" type="submit" class="btn bg-red waves-effect">
			</form>
		</div>
		
	</div>
	<div class="text-center" id="loader"></div>
</div>
