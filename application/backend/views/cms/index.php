<div class="container-fluid">
            <div class="block-header">
                <h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
							<h2 style="text-transform: uppercase;">    <?php echo ucfirst($master_title); ?></h2>
<!--	<a href="<?php echo BASEURL ?>/cms/manage_cms_pages" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-plus"></i> Add Content</a>	-->
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
											<th>Content type</th>
											<th>Link Title</th>
											<th>Page Title</th>
											<th>Page Content</th>
											<!--<th>Status</th>-->
											<th>Actions</th>
									</tr>
                                </thead>
                                <tbody>
													<?php foreach ($cmsdata as $key => $val) {?>
					<tr class="">
						<td><?php echo ++$i; ?></td>
						<td>Front End Content</td>
						<td><?php echo $val['link_title']; ?></td>
						<td><?php echo $val['page_name']; ?></td>
						<td><?php echo substr($val['page_text'], 0, 50); ?></td>
						<!--  <td>                                                                     
							<span class="label label-sm label-<?php echo ($val['status'] == 1) ? 'success' : 'default'; ?>   ">
							<?php echo ($val['status'] == 1) ? 'Active' : 'Inactive'; ?>
							</span>
						</td> -->
						<td class="text-center">
							<a title="View details" href="<?php echo BASEURL; ?>/cms/manage_cms_pages/<?php echo $val['id']; ?>"><i class="material-icons" style="color:#777;">mode_edit</i></a>
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
