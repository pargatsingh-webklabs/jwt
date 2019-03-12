  <div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
		
 <form name="form_commission_advances" id="form_commission_advances"  method='post' action='<?php echo BASEURL; ?>/cms/commission_advances'>   
  <div class=" box light-grey">       
   <div class="portlet-body">
	<div class="panel-body">
	<div class="row">
	 
	  <div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label><h5 ><b>Commission Advances Heading Text</b></h5></label>
		   <input type="text" name="heading" class="form-control" value="<?php echo $advances_data['advances_heading']; ?>" />
	  </div>
	 </div>
	
	<div class="col-md-12 col-sm-12 col-xs-12">
	<label><h5 ><b>First Commission Advances Icon</b> </h5></label>

		 <div class="form-group">
		 <div class="row">
		    <div class="col-md-6 col-sm-6 col-xs-6">
			 <label >Icon Name</label>
			   <input type="text" name="firsticon_name" class="form-control" value="<?php echo $advances_data['firsticon_name']; ?>" />
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
		  <label>Icon Link</label>
		   <input  type="text" name="firsticon_link" class="form-control" value=" <?php echo $advances_data['firsticon_link']; ?>" />
			</div></div>
	
	  </div>
	
	</div>	

	
		<div class="col-md-12 col-sm-12 col-xs-12">
	<label><h5 ><b>Second Commission Advances Icon</b></h5></label>

		 <div class="form-group">
		 <div class="row">
		    <div class="col-md-6 col-sm-6 col-xs-6">
			 <label>Icon Name</label>
			   <input type="text" name="secondicon_name" class="form-control" value="<?php echo $advances_data['secondicon_name']; ?>" />
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
			<label>Icon Link</label>
		   <input  type="text" name="secondicon_link" class="form-control" value="<?php echo $advances_data['secondicon_link']; ?>" /> 
			</div></div>

	  </div>
	
	</div>
	
   <div class="col-md-12 col-sm-12 col-xs-12">
	<label><h5><b>Third Commission Advances Icon</b></h5></label>

		 <div class="form-group">
		 <div class="row">
		    <div class="col-md-6 col-sm-6 col-xs-6">
			 <label>Icon Name</label>
			   <input type="text" name="thirdicon_name" class="form-control" value="<?php echo $advances_data['thirdicon_name']; ?>" />
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
			<label>Icon Link</label>
		   <input  type="text" name="thirdicon_link" class="form-control"  value="<?php echo $advances_data['thirdicon_link']; ?>" />
			</div></div>
			
	  </div>
	
	</div>
	
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >
			<div id="loader" class="text-center" ></div>	
			<input type="hidden" name="id" value="<?php echo $advances_data['id']; ?>">
			<button type="submit" class="btn green" ><i class="fa fa-send"></i> Send</button>
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
