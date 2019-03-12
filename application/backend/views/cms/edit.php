<div class="page-content">
    <div class="row" style="max-height: 40px;">
        <div class="col-md-12">
            <h3 class="page-title">
                           <?php echo ucfirst($master_title); ?>
            </h3>
        </div>
    </div>
    <!-- BEGIN PAGE CONTENT-->
    <div class="row profile">
        <div class="col-md-12">
            <!--BEGIN TABS-->
            <div class="col-md-9">
                <form role="form" action="<?php echo BASEURL; ?>/cms/manage_cms_pages/<?php echo $cmsdata['id']; ?>" id='form_validation' method='post'>
                    <input type='hidden' name='id' value="<?php echo $cmsdata['id'] ?>">
                    <div class="form-group">
                        <label class="control-label">Title:</label>
                        <input class="form-control" name='subject' value="<?php echo $cmsdata['subject'];?>" />
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <label class="control-label">Body:</label>
                        <textarea style="min-height: 170px"rows="6" name="body" class="ckeditor form-control"><?php echo trim($cmsdata['body']);?></textarea>       
                    </div>
					
                    </div>
                    <div class="clearfix"></div>
                    <div class="selector"></div>
                    <div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >
			<div id="loader" class="text-center" ></div>	
			<button type="submit" class="btn green"><i class="fa fa-send"></i> Send</button>
			<a href="<?php echo BASEURL; ?>/cms"  class="btn bg-grey waves-effect" > Cancel</a>	  	  
		</div>
	</div>
                    </div>
                </form>



            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
