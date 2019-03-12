
   <div class="container-fluid">
	<div class="block-header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="panel-heading"><!--<?php echo ucfirst($master_title); ?>
	<a href="<?php echo BASEURL ?>/cms" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-hand-o-left"></i> Go back </a>	-->					
					</div>
				<div class="panel-body">

  <form name="blog_form" action="<?php echo BASEURL; ?>/blogs/add_blogs/<?php echo $blogsdata['id']; ?>" enctype="multipart/form-data" id='form_blog' method='post'>
	  
	  								<div class="form-group">
                                        <div class="form-line">
											 <label>Blog Title</label>
                                            <input name="blog_title"  id="blog_title" class="form-control" value="<?php echo $blogsdata['blog_title'];?>" type="text">
                                        </div>
                                    </div>
		
	  
	  
	 								 <div class="form-group">
                                        <div class="form-line">
											 <label>Blog Content</label>
                                            <textarea id="ckeditor" rows="4" class="form-control no-resize" value="" name="blog_content"  id="blog_content"><?php echo $blogsdata['blog_content'];?> </textarea>
											
                                        </div>
                                    </div>
	  
	 <div class="form-group">
                                        <div class="form-line">
											  <label>Blog Added By</label>
                                            <input name="blog_added_by"  id="blog_added_by" name="blog_title"  id="blog_title" class="form-control" value="<?php echo $blogsdata['added_by'];?>" type="text">
                                        </div>
                                    </div>
		
					<div class="form-group">
                                        <div class="form-line">
						 <label>Blog Image</label>
						 <input name="blog_image"  id="blog_image" type="file" />
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
									
									 <button type="submit" class="btn bg-red waves-effect">SEND</button>
                         									
								<a href="<?php echo BASEURL; ?>/blogs"  class="btn bg-grey waves-effect" > Cancel</a>     
									
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
