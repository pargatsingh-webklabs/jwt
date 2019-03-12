<div class="container-fluid">
            <div class="block-header">
                <h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
							<h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2>
	<!--<a href="<?php echo BASEURL ?>/lens_package/add_lens_package" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-plus"></i> Add New Lens Package</a>-->
	</div>
	<div class="panel-body">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
			<thead>
				<tr>
					<th>Sr. No.</th>
					<!--<th>Package For</th>-->
					<th>FAQ</th>
					<th>Created</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php //echo "<pre>";print_r($brandsdata);echo "</pre>";die;
					foreach ($faqdata as $key => $val) {?>
					<tr class="">
						<td><?php echo ++$i; ?></td>
						<td><?php echo $val['question']; ?></td>
						<td><?php echo date('m/d/Y h:i:s A',$val['created']); ?></td>
						<td>                                                                     
							<span class="label label-sm label-<?php echo ($val['status'] == 1) ? 'success' : 'default'; ?>   ">
							<?php echo ($val['status'] == 1) ? 'Active' : 'Inactive'; ?>
							</span>
						</td> 
						<td class="text-center">
						<a title="Delete" onclick="return confirm('Are you sure you want to delete the FAQ')" href='<?php echo BASEURL; ?>/faq/delete_faq/<?php echo $val['id']; ?>'><i class="material-icons" style="color:#DB4D4D;">delete</i></a>
						
							<a title="View details" href="<?php echo BASEURL; ?>/faq/edit/<?php echo $val['id']; ?>"><i class="material-icons" style="color:#DB4D4D;">mode_edit</i></a>
						</td>
						
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<div id="loader_msg" class="text-center" ></div>
	</div>
</div>
</div>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo THEME_URL; ?>assets/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo THEME_URL; ?>assets/js/plugins/datatables/DT_bootstrap.js"></script>
<script src="<?php echo THEME_URL; ?>assets/js/plugins/datatables/jquery.dataTables-conf.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
