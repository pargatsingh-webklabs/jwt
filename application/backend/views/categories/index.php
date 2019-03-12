
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
                            <h2>
								CATEGORY LIST
                            </h2>
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
                                        <th>Color Code</th>
                                        <th width="15%">Postion</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php $srno=1;
									  foreach($categoriesdata as $key => $category){ ?>	
                                    <tr>									

                                        <td><?php echo $srno++ ; ?></td>
                                        <td><a href="<?php echo BASEURL ?>/location/loc_cat" ><b style="color: #8bc34a !important;"><?php echo $category['name'] ; ?></b></a></td>
										                                        <td><b style="color: #8bc34a !important;"><?php echo $category['color_code'] ; ?></b></td>
                                        <td>
											<div class="input-group" style="margin-bottom: -10px !important;">
												<div class="form-line">
													<input class="form-control position" but_num="<?php echo $category['id'] ?>" placeholder="Position" type="text" name="position" value="<?php echo $category['position'] ?>" >
												</div>
												<span class="input-group-addon">
												  <button  title="Enter position to update." disabled="disabled" style="border-radius: 100% !important;height: 35px !important;width: 35px !important;margin-top: -7px !important;" type="button" rec_id="<?php echo $category['id'] ?>" class=" submit_position btn bg-light-green btn-circle waves-effect waves-circle waves-float removeDisable<?php echo $category['id'] ?>"><i class="material-icons" style="font-size:21px;">send</i></button>										
												</span>
											</div>	
										</td>
										
										
										
                                        <td><?php echo date('m/d/Y', $category['created']) ; ?></td>
                                        <td>

<a href="<?php echo BASEURL ?>/categories/manage/<?php echo $category['id'] ?>"><i class="material-icons" style="color:#8bc34a !important;">mode_edit</i></a>											
<a title="Delete" onclick="return confirm('Are you sure you want to delete this category and its locations ')" href="<?php echo BASEURL ?>/categories/deletecategory/<?php echo $category['id'] ?>"><i class="material-icons" style="color:#DB4D4D;">delete</i></a>		
		
										</td>
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

