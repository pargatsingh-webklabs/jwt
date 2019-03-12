 <div class="container-fluid">
	<div class="block-header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="panel-heading"><!--<?php echo ucfirst($master_title); ?>
	<a href="<?php echo BASEURL ?>/cms" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-hand-o-left"></i> Go back </a>	-->					
					</div>
				<div class="panel-body">

<form method='POST' id="form_update_template_edit" name="form_update_template_edit" action='<?php echo BASEURL.'/template/edit_template/'. $template_data['id']; ?>'   >
						
	  <div class="row clearfix">
		<div class="col-sm-12">
				<div class="form-group">
                                        <div class="form-line">
											<label>Name</label>
                                            <input  class="form-control" value="<?php  if(!empty($template_data)) echo $template_data['template_name'] ;   ?>" type="text"  name="template_name">
                                        </div>
                                    </div>
		
		</div>
	</div>
	  
	
	
	 <div class="row clearfix">
		<div class="col-sm-12">
				<div class="form-group">
                                        <div class="form-line">
										<label>Subject</label>
                                            <input id="blog_title" class="form-control" value="<?php  if(!empty($template_data)) echo $template_data['subject'] ;   ?>" type="text" name="subject">
                                        </div>
                                    </div>
		
		</div>
	</div>
	
	 <div class="row clearfix">
		<div class="col-sm-12">
			
	 								 <div class="form-group">
                                        <div class="form-line">
											<label for="comment">Message</label>
                                            <textarea id="ckeditor" rows="4" class="form-control no-resize"name="description"><?php  if(!empty($template_data)) echo $template_data['description'] ; ?></textarea>
											
                                        </div>
                                    </div>
		
		</div>
	</div>
			
			<div class="form-line">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="col-md-6 col-sm-6 col-xs-6 ">
							<div id="loader" class="pull-right " >
							</div>	
							</div>	
								<div class="col-md-6 col-sm-6 col-xs-6 ">
								<div class="pull-right ">
									
									 <button type="submit" class="btn bg-red waves-effect">Confirm Details</button>
                         									
								<button type="submit" href="<?php echo BASEURL; ?>/template"  class="btn bg-grey waves-effect" > Cancel</button>     
									
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