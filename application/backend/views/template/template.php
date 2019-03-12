<div class="container-fluid">
            <div class="block-header">
                <h2  style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2>
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
											<th class="text-center">Sr no</th>
												<th class="text-center">Template name</th>
												<th class="text-center">Subject</th>
												<th class="text-center">Message</th>
												<th class="text-center">Action</th>
									</tr>
                                </thead>
                                <tbody>
													<?php $srno=1; 
					foreach($template_data as $key => $val){ ?>
					<tr role="row" class="even text-center">
						<td class="sorting_1"><?php echo $srno++ ; ?></td>
						<td><?php echo $val['template_name']; ?></td>
						<td><?php echo $val['subject']; ?></td>
						<td><?php echo $val['description']; ?></td>
						<td> 
						<a title="Delete" onclick="return confirm('Are you sure you want to delete the  template')" href='<?php echo BASEURL; ?>/template/delete/<?php echo $val['id']; ?>'><i class="material-icons" style="color:#DB4D4D;">delete</i></a>
								<a  href='<?php echo BASEURL; ?>/template/edit_template/<?php echo $val['id']; ?>'><i class="material-icons" style="color:#F44336;">mode_edit</i></a>
							<?php } ?>
						</td>
					</tr>
			
			</tbody>
		</table>
                                   
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo THEME_URL; ?>assets/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo THEME_URL; ?>assets/js/plugins/datatables/DT_bootstrap.js"></script>
<script src="<?php echo THEME_URL; ?>assets/js/plugins/datatables/jquery.dataTables-conf.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
