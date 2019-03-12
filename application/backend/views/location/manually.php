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
						ADD NEW LOCATIONS SECTION 
							
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
		<form name="manually_location_form" id="add_location_form" action="<?php echo BASEURL ?>/location/manually" method="post">
		<input name="id" type="hidden" value="<?php  echo $location['id']; ?>" />
		<div class="row clearfix">
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Store Number</label>				
						<input class="form-control" placeholder="Enter Store Number" name="store_number" type="text" value="<?php  echo $location['store_number']; ?>" />
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Store Type</label>					
						<input class="form-control" placeholder="Enter Store Type" name="store_type" type="text" value="<?php  echo $location['store_type']; ?>" />
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>City</label>				
						<input class="form-control" placeholder="Enter City" name="city" type="text" value="<?php  echo $location['city']; ?>" />
					</div>
				</div>
			</div>
	
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>State</label>					
						<input class="form-control" placeholder="Enter State" name="state" type="text" value="<?php  echo $location['state']; ?>" />
					</div>
				</div>
			</div>
		</div> 


		<div class="row clearfix">
			<div class="col-sm-12">
				<div class="form-group">
					<div class="form-line">
						<label>Address</label>				
						<textarea class="form-control" placeholder="Enter Address" name="address" ><?php  echo $location['address']; ?></textarea>
					</div>
				</div>
			</div>
		</div>	
			
			
	<div class="row clearfix">

			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Zip Code</label>					
						<input class="form-control" placeholder="Enter Zip Code" name="zip_code" type="text" value="<?php  echo $location['zip_code']; ?>" />
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Phone Number</label>				
						<input class="form-control" placeholder="Enter Phone Number" name="phone_number" type="text" value="<?php  echo $location['phone_number']; ?>" />
					</div>
				</div>
			</div>
	
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Play Place</label>					
						<input class="form-control" placeholder="Enter Play Place" name="play_place" type="text" value="<?php  echo $location['play_place']; ?>" />
					</div>
				</div>
			</div>
					<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Drive Through</label>				
						<input class="form-control" placeholder="Enter Drive Through" name="drive_through" type="text" value="<?php  echo $location['drive_through']; ?>" />
					</div>
				</div>
			</div>
		</div> 
				<div class="row clearfix">

			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Arch Card</label>					
						<input class="form-control" placeholder="Enter Arch Card" name="arch_card" type="text" value="<?php  echo $location['arch_card']; ?>" />
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Free Wifi</label>				
						<input class="form-control" placeholder="Enter Free Wifi" name="free_wifi" type="text" value="<?php  echo $location['free_wifi']; ?>" />
					</div>
				</div>
			</div>
	
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Latitude</label>					
						<input class="form-control" placeholder="Enter Latitude" name="latitude" type="text" value="<?php  echo $location['latitude']; ?>" />
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Longitude</label>				
						<input class="form-control" placeholder="Enter Longitude" name="longitude" type="text" value="<?php  echo $location['longitude']; ?>" />
					</div>
				</div>
			</div>					
		</div> 
				<div class="row clearfix">

			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Geo Accuracy</label>					
						<input class="form-control" placeholder="Enter Geo Accuracy" name="geo_accuracy" type="text" value="<?php  echo $location['geo_accuracy']; ?>" />
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Country</label>				
						<input class="form-control" placeholder="Enter Country" name="country" type="text" value="<?php  echo $location['country']; ?>" />
					</div>
				</div>
			</div>
	
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>Country Code</label>					
						<input class="form-control" placeholder="Enter Country Code" name="country_code" type="text" value="<?php  echo $location['country_code']; ?>" />
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<div class="form-line">
						<label>County</label>				
						<input class="form-control" placeholder="Enter County" name="county" type="text" value="<?php  echo $location['county']; ?>" />
					</div>
				</div>
			</div>					
		</div> 

		<div class="row clearfix">
<div class="col-sm-6">
	<div class="pull-right" id="loading"></div>
</div>				
			<div class="col-sm-4 pull-right">				
					 <button type="submit" class="btn bg-light-green waves-effect btn-lg"  style="font-size:19px" ><i class="material-icons">send</i> Submit</button>
					<button type="button" href="" class="btn bg-black waves-effect waves-light btn-lg" style="font-size:19px"><i class="material-icons">close</i> Cancel</button>  						    </div>
		</div>

							</form>   
						</div>	
						
						
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
	</div>

