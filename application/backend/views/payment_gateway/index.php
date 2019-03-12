<div class="warper container-fluid">
<div class="page-header"><h1>   <?php echo ucfirst($master_title); ?></small></h1></div>
<div class="panel panel-default">
	<div class="panel-heading">   <?php echo ucfirst($master_title); ?>
	<a href="<?php echo BASEURL ?>/payment_gateway/add_payment_gateway" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-plus"></i> Add New Payment Gateway</a>	
	</div>
	<div class="panel-body">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
			<thead>
				<tr>
					<th>Sr. No.</th>
					<th>Payment Gateway Name</th>
					<th>Created</th>
					<th>Modified</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php //echo "<pre>";print_r($brandsdata);echo "</pre>";die;
				foreach ($payment_gatewaydata as $key => $val) {?>
					<tr class="">
						<td><?php echo ++$i; ?></td>
						<td><b><?php echo $val['name']; ?></b></td>
						<td><?php echo date('m/d/Y h:i:s A',$val['created']); ?></td>
						<td><?php echo date('m/d/Y h:i:s A',$val['modified']); ?></td>
						 <td>                                                                     
							<span class="label label-sm label-<?php echo ($val['status'] == 1) ? 'success' : 'default'; ?>   ">
							<?php echo ($val['status'] == 1) ? 'Active' : 'Inactive'; ?>
							</span>
						</td> 
						<td class="text-center">
						
							<?php if($val['status']==1) { ?>
								<a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the payment gateway')" href='<?php echo BASEURL; ?>/payment_gateway/changeStatus/0/<?php echo $val['id']; ?>'><i class="fa fa-minus-square-o fa-2x" style="color:#000;"></i></a>
								<?php } else if($val['status']==0 ) { ?>
								<a title="Activate" onclick="return confirm('Are you sure you want to activate the payment gateway')" href='<?php echo BASEURL; ?>/payment_gateway/changeStatus/1/<?php echo $val['id']; ?>'><i class="fa fa-plus-square-o fa-2x" style="color:#000;"></i></a>
							<?php } ?>
						<a title="Delete" onclick="return confirm('Are you sire you want to delete the payment gateway')" href='<?php echo BASEURL; ?>/payment_gateway/deletepayment_gateway/<?php echo $val['id']; ?>'><i class="fa fa-trash-o fa-2x" style="color:#DB4D4D;"></i></a>
						
							<a title="View details" href="<?php echo BASEURL; ?>/payment_gateway/add_payment_gateway/<?php echo $val['id']; ?>"><i class="fa fa-edit fa-2x" style="color:#000;"></i></a>
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
