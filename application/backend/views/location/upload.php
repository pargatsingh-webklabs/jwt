<div class="container-fluid">
            <div class="block-header">
                <h2><?php echo $master_title; ?></h2>
            </div>

	        <!-- #END# Color Pickers -->
            <!-- File Upload | Drag & Drop OR With Click & Choose -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
						Locations File Upload Section 
							
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
						
					<div class="body">
                     <form action="<?php echo BASEURL ?>/location/file" id="form_upload" method="post" enctype="multipart/form-data" >
                         
						 <div class="row clearfix">						           	
							 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
										<label>Click to upload</label>
                                        <div class="form-group form-float">
                                             <input type="file" name="upload_file" id="upload_file" />
                                        </div>
                                    </div>
          

                                								 
							</div>	 

						 </div>
						 
<div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<!--	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
			<label>Catagery</label>
			<div class="form-group">
				<div class="form-line focused">
					<input class="form-control category_feild" placeholder="Enter a new category" name="category"  />
				</div>
			</div>
		</div>	
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
            <div class="form-group" style="margin-top:25px">
               <label>OR</label>
			</div>		
		</div>	 	-->   
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
			<label>Select from existing catagery</label>
			  <select class="form-control show-tick category_feild" name="existing_category">
						
				  <option value="" >Select your category</option>
					<?php foreach($categoriesdata as $key=>$val){?>
				  		<option value="<?php echo $val['id'] ?>" ><?php echo $val['name'] ?></option>
					<?php } ?>
				</select>

		</div>	   

		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-right">
				<button  style="margin-top:14px;font-size:19px" type="submit" class="btn bg-light-green btn-block btn-lg waves-effect" style="font-size: 17px;">
		<i class="material-icons " style="font-size: 22px;">cloud_upload</i> Upload </button>
		</div>
  </div>
</div>
<div class="row clearfix">
	<div class="text-center" id="loading">
		
	</div>
</div>					 
						 <input type="hidden" name="testing_" value="testing" />
                            </form>
                        </div>	
						
						
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
	</div>

