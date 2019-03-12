  <div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
 <form name="form_banner_text" id="form_banner_text"  method='post' action='<?php echo BASEURL; ?>/cms/slider_content'>   
  <div class=" box light-grey">       
   <div class="portlet-body">
	<div class="panel-body">
	<div class="row">
	 
	  <div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Banner Heading Text</label>
		   <input type="text" name="heading" class="form-control" value="<?php echo $slider_text[0]['slide_text']; ?>" />
	  </div>
	 </div>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Banner Heading Description</label>
		   <textarea  type="text" name="description" class="form-control"> <?php echo $slider_text[1]['slide_text']; ?></textarea>
	  </div>
	
	</div>	
	 
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >
			<div id="loader" class="text-center" ></div>	
			<button type="submit" class="btn green"><i class="fa fa-send"></i> Send</button>
           <a href="<?php echo BASEURL; ?>/cms" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	</div>
	
	     </div>
	   </div>
      </div>
     </div>
    </form>
   </div>
  </div>
