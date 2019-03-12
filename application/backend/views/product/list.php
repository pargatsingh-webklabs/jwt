<div class="container-fluid">
            <div class="block-header">
                <h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-transform: uppercase;">
                                 <?php echo ucfirst($master_title); ?>
                                <!--<small>Basic example without any additional modification classes</small>-->
                            </h2>
							<div class="row clearfix">
								<a href="<?php echo BASEURL ; ?>/product"><button style="margin-left: 5px;margin-right: 5px;" id="" class="btn bg-red waves-effect pull-right">Add Product</button></a>
								<a href="<?php echo BASEURL ; ?>/upload"><button style="margin-left: 5px;margin-right: 5px;" id="" class="btn bg-red waves-effect pull-right">Import</button></a>
								<a href="<?php echo BASEURL ; ?>/upload/downloadFile"><button style="margin-left: 5px;margin-right: 5px;" id="" class="btn bg-red waves-effect pull-right">Download sample file</button></a>
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
                        <div class="body table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
											<th>Name</th>
											<th>Price</th>
											<th>Model</th>
											<th>Created</th>
<!--
											<th>Status</th>
-->
											<th >Actions</th>
									</tr>
                                </thead>
                                <tbody>
									<?php 
										foreach ($list as $key => $val) {
									?>
									<tr>
						<td><a href="<?php echo BASEURL ; ?>/product/?id=<?php echo $val['id'];  ?>"><b><?php echo $val['name']; ?></b></a></td>
						<td><?php echo $val['price']; ?></td>
						<td><?php echo $val['model']; ?></td>
						<td><?php echo date("n/j/Y",$val['created']); ?></td>
<!--
						<td>      
							<span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
								<?php echo ($val['status']==1)?'Active':'Inactive'; ?>
							</span>
						</td>
-->
						<td>
							<?php //if($val['status']==1) { ?>
<!--
								<a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php // echo BASEURL; ?>/users/changeStatus/0/<?php //echo $val['id']; ?>'><i class="material-icons" style="color: #2b982b;">visibility</i></a>
								<?php //} else if($val['status']==0 ) { ?>
								<a title="Activate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php //echo BASEURL; ?>/users/changeStatus/1/<?php //echo $val['id']; ?>'><i class="material-icons" style="color: #777;">visibility_off</i></a>
-->
							<?php// } ?>
<!--
						<a href="<?php echo FRONT_BASE_URL.'product/'.$val['id']; ?>" target="_blank" class="text-danger"><i class="material-icons" style="color:#DB4D4D;">person</i></a>		
-->
						<a title="Delete" onclick="return confirm('Are you sire you want to delete ')" href='<?php echo BASEURL; ?>/product/delete/?id=<?php echo $val['id']; ?>'><i class="material-icons" style="color:#DB4D4D;">delete</i></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
                                   
                        </div>
                    </div>
                </div>
            </div>
