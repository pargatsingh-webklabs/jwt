  <div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
		<div class='col-lg-4 pull-right'>
        <div class=" pull-right" style="margin-top:-40px;box-shadow:5px 5px 10px black;">
		<a href="<?php echo BASEURL; ?>/package">
            <button id="" class="btn green" type='submit'>
<i class="fa fa-arrow-left"></i>&nbsp; 
			View List packages
            </button>
		</a>	
		</div>
        </div>
 <form name="form_new_package" id="form_new_package"  method='post' action='<?php echo BASEURL; ?>/package/add_package'>   
  <div class=" box light-grey">       
   <div class="portlet-body">
	<div class="panel-body">
	<div class="row">
	 
	  <div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Plan Name</label>
		   <input type="text" name="name" class="form-control" placeholder="Name of the plan" />
	  </div>
	 </div>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Plan Price</label>
		   <input type="text" name="price" class="form-control" placeholder="Total price"/>
	  </div>
	</div>
	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Plan Validity</label>
		   <input type="text" name="validity" class="form-control" placeholder="Days" />
	  </div>	
	</div>	
	<div class="col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group">
		   <label>Plan Type</label>
		   <input type="text" name="type" class="form-control" placeholder="Type of plan" />
	  </div>	
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Plan Description</label>
		    <textarea name="plan_description" class="form-control" placeholder="Description about the plan you are going to add"></textarea>
	  </div>
	 </div>	
	 
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group" >
			<div id="loader" class="text-center" ></div>	
			<button type="submit" class="btn green"><i class="fa fa-send"></i> Send</button>
            <a href="<?php echo BASEURL; ?>/package" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	</div>
	
	     </div>
	   </div>
      </div>
     </div>
    </form>
   </div>
  </div>
