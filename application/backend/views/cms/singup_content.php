  <div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
 <form name="form_singup_text" id="form_singup_text"  method='post' action='<?php echo BASEURL; ?>/cms/singup_content'>   
  <div class=" box light-grey">       
   <div class="portlet-body">
	<div class="panel-body">
	<div class="row">
	 
	  <div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Sign Up Heading Text</label>
		   <input type="text" name="singup_heading" class="form-control" value="<?php echo $singup_content['singup_heading']; ?>" />
	  </div>
	 </div>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Sign Up Heading Description</label>
		   <textarea  type="text" name="singup_description" class="form-control"> <?php echo $singup_content['singup_description']; ?></textarea>
	  </div>
	
	</div>	
	 
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >
			<div id="loader" class="text-center" ></div>	
			<input type="hidden" name="id" value="<?php echo $singup_content['id']; ?>">
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
