<div class="container-fluid">
            <div class="block-header">
                <h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
							<h2 style="text-transform: uppercase;"> <?php echo ucfirst($master_title); ?></h2>
	<!--<a href="<?php echo BASEURL ?>/blogs/add_blogs" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-plus"></i> Add New Blog</a>-->
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
                            <table class="table">
                                <thead>
                                    <tr>
											<th>Sr. No.</th>
											<th>Blog Title</th>
											<th>Blog content</th>
											<th>Blog Added By</th>
											<th>Blog Image</th>
											<th>Status</th>
											<th>Actions</th>
									</tr>
                                </thead>
                                <tbody><?php //echo "<pre>";print_r($brandsdata);echo "</pre>";die;
				foreach ($blogsdata as $key => $val) {?>
					<tr class="">
						<td><?php echo ++$i; ?></td>
						<td><?php echo $val['blog_title']; ?></td>
						<td><?php echo $val['blog_content']; ?></td>
						<td><?php echo $val['added_by']; ?></td>
						<td><img src="<?php echo FRONT_BASE_URL.$val['blog_image']; ?>" width="85px" height="85px"/></td>
						
						 <td>                                                                     
							<span class="label label-sm label-<?php echo ($val['status'] == 1) ? 'success' : 'default'; ?>   ">
							<?php echo ($val['status'] == 1) ? 'Active' : 'Inactive'; ?>
							</span>
						</td> 
						<td class="text-center">
						
							<?php if($val['status']==1) { ?>
								<a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the blogs')" href='<?php echo BASEURL; ?>/blogs/changeStatus/0/<?php echo $val['id']; ?>'><i class="material-icons" style="color: #2b982b;">visibility</i></a>
								<?php } else if($val['status']==0 ) { ?>
								<a title="Activate" onclick="return confirm('Are you sure you want to activate the blogs')" href='<?php echo BASEURL; ?>/blogs/changeStatus/1/<?php echo $val['id']; ?>'><i class="material-icons" style="color: #777;">visibility_off</i></a>
							<?php } ?>
						<a title="Delete" onclick="return confirm('Are you sire you want to delete the blogs')" href='<?php echo BASEURL; ?>/blogs/deleteblogs/<?php echo $val['id']; ?>'><i class="material-icons" style="color:#DB4D4D;">delete</i></a>
						
							<a title="View details" href="<?php echo BASEURL; ?>/blogs/add_blogs/<?php echo $val['id']; ?>">
							<i class="material-icons" style="color:#DB4D4D;">mode_edit</i></a>
						</td>
						
					</tr>
				<?php } ?>
			</tbody>
		</table>
                                   
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
	<script src="<?php echo THEME_URL; ?>assets/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo THEME_URL; ?>assets/js/plugins/datatables/DT_bootstrap.js"></script>
<script src="<?php echo THEME_URL; ?>assets/js/plugins/datatables/jquery.dataTables-conf.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
