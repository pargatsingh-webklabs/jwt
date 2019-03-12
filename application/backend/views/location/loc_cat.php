
<div class="container-fluid" >
            <div class="block-header">
                <h2><?php echo $master_title; ?></h2>
            </div>

	        <!-- #END# Color Pickers -->
            <!-- File Upload | Drag & Drop OR With Click & Choose -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="card">
                        <div class="header">
<a href="<?php echo BASEURL ?>/categories" type="button" class="btn bg-light-green waves-effect" style="margin-top: -5px; margin-right: 10px; font-size: 16px;">  <i class="material-icons">arrow_back</i>  GO BACK </a>
                            <span style="font-size: 19px;">
								CATEGORY LOCATION LIST
                            </span>
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
                                        <th>Sr.No.</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Created</th>
                                       <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
								<?php $srno=1;
									  foreach($loc_cat as $key => $location){ ?>	
                                    <tr>									

                                        <td><?php echo $srno++ ; ?></td>
                                        <td ><?php echo get_category_name($location['category_id']) ; ?></td>
                                       
										
										<td><?php echo get_location_data(array('id'=>$location['location_id'],'feild'=>'address')) ; ?></td>

										
										
										
                                        <td><?php echo date('m/d/Y', $location['created']) ; ?></td>
                                       <!-- <td>

<a href="<?php echo BASEURL ?>/location/manually/<?php echo $location['id'] ?>"><i class="material-icons" style="color:#8bc34a !important;">mode_edit</i></a>											
<a title="Delete" onclick="return confirm('Are you sure you want to delete this category location ')" href="<?php echo BASEURL ?>/location/deleteLocationCat/<?php echo $location['id'] ?>"><i class="material-icons" style="color:#DB4D4D;">delete</i></a>		
		
										</td>-->
                                    </tr>
                                 <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
	</div>

