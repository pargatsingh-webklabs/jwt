<div class="warper container-fluid">
	<div class="page-header"><h1>Change password </h1></div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Change your password </div>
				<div class="panel-body">

<form method='POST' id="form_update_template_edit" name="form_update_template_edit" action='<?php echo BASEURL.'/template/edit_template/'. $template_data['id']; ?>'   >
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
					 <label><strong>Name</strong></label>
	                  <input type="text" name="template_name" id="template_name" class="form-control"  value="<?php  if(!empty($template_data)) echo $template_data['template_name'] ;   ?>" / >
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
					 <label><strong>Subject</strong></label>
	                  <input type="text" name="subject" id="subject" class="form-control" value="<?php  if(!empty($template_data)) echo $template_data['subject'] ;   ?>"  / >
							</div>
						</div>
                     <br/>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
			          <label for="comment"><strong>Message:</strong></label>
					  <textarea class="form-control" rows="5" id="editor" name="description" ><?php  if(!empty($template_data)) echo $template_data['description'] ;   ?></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="col-md-6 col-sm-6 col-xs-6 ">
							<div id="loader" class="pull-right " >
							</div>	
							</div>	
							<div class="col-md-6 col-sm-6 col-xs-6 ">							
								<div class="pull-right ">
									<input class="btn btn-purple" value="Confirm Details" type="submit" />
									<span></span>
								<a href="<?php echo BASEURL; ?>/template"  class="btn btn-danger" ><i class="fa fa-close"></i> Cancel</a>	  
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