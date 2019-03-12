<style>
.bootstrap-select
	{
	
	width:35% !important;
	}
	
</style>
<div class="container-fluid" >
            <div class="block-header">
                <h2><?php echo $master_title; ?></h2>
            </div>

	        <!-- #END# Color Pickers -->
            <!-- File Upload | Drag & Drop OR With Click & Choose -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:1468px">
                    <div class="card">
                      <div class="header" style="float: left; width: 100%;">
                        	<div class="col-sm-4">
							
									<label for="sel1" style="line-height:30px; float:left; margin-right:10px; font-size:16px; font-weight:700; margin-bottom:0px; color:#000; padding-left:0px;">Per Page:
									</label>
									<select id="per_page" class="form-control change_data_filter" name="category" style="width:20%; float:left">
										<option value ="5">5</option>  
										<option value ="10">10</option>  
										<option value ="30">30</option>  
										<option value ="50">50</option>  
										<option value ="100">100</option>  
									</select>
								
							</div>	
							<div class="col-sm-2">	
								<div id="loader"></div>
						  </div>	
							<div class="col-sm-2">			
					<div class="input-group" style="margin-bottom: -10px !important;">
						<div class="form-line">
							<input class="form-control" id="search_input" value=""  placeholder="Search Here"  type="text" name="search" />
						</div>
						<span class="input-group-addon">
						  <button id="search_button" title="Submit your search" style="border-radius: 100% !important;height: 35px !important;width: 35px !important;margin-top: -7px !important;" type="submit" class=" click_data_filter btn bg-light-green btn-circle waves-effect waves-circle waves-float "><i class="material-icons" style="font-size:21px;">send</i></button>										
						</span>
					</div>				 	
				</div>	
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="body">
                            <table class="table table-striped table-bordered" width="100%" cellspacing="0" id="myTable">
                                <thead> 

                                    <tr>
                                        <th>Action</th>
                                        <th>Store Number</th>
                                        <th>Store Type</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zip Code</th>
                                        <th>Phone Number</th>
                                        <th>Play Place</th>
                                        <th>Drive Through</th>
                                        <th>Arch Card</th>
                                        <th>Free Wifi</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Geo Accuracy</th>
                                        <th>Country</th>
                                        <th>Country Code</th>
                                        <th>County</th>

                                    </tr>
                                </thead>
                                <tbody id="filtered_locations">
								
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
	</div>

