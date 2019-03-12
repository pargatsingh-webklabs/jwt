
  <div class="container-fluid">
	<div class="block-header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="panel-heading"><!--<?php echo ucfirst($master_title); ?>
	<a href="<?php echo BASEURL ?>/cms" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-hand-o-left"></i> Go back </a>	-->					
					</div>
				<div class="panel-body">

  <form role="form" action="<?php echo BASEURL; ?>/cms/manage_cms_pages/<?php echo $cmsdata['id']; ?>" id='form_help_edit' method='post'>
     <h2 class="card-inside-title">Page Title</h2>	  
	  <div class="row clearfix">
		<div class="col-sm-12">
			<div class="form-group">
				<div class="form-line">
					<textarea name="page_name"  id="about_us" rows="4" class="form-control no-resize" placeholder="Please type what you want..."><?php echo $cmsdata['page_name'];?></textarea>
				</div>
			</div>
		</div>
	</div>
	  
	    <h2 class="card-inside-title">Page Text</h2>	  
	  <div class="row clearfix">
		<div class="col-sm-12">
			<div class="form-group">
				<div class="form-line">
					<textarea name="page_text" id="ckeditor" rows="4" class="form-control no-resize" placeholder="Please type what you want..."><?php echo trim($cmsdata['page_text']);?></textarea>
				</div>
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
									
								<div class="button-demo">
                                <button type="submit" class="btn bg-red waves-effect">SEND</button>
                         									
								<button type="submit" href="<?php echo BASEURL; ?>/cms"  class="btn bg-grey waves-effect" > Cancel</button>        
                            </div>
								
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
