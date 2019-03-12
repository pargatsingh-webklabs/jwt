<style>

	.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    border-top: 1px solid #ccc;
}
	.table > tbody > tr > td{vertical-align: middle;}

	.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, 		.table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border-bottom: 1px solid #ddd !important;
    border: 1px solid #ddd;
}
	.table.dataTable.no-footer {
    border-bottom: 1px solid #ccc !important;
}
table.dataTable tbody td {
    padding: 25px 10px;
}
	table.dataTable thead th, table.dataTable thead td {
    padding: 25px 18px;
    border-bottom: 0px solid #111;
    font-size: 18px;
}
table
	{color:#000000;}
	.btn-s{box-shadow:none; padding:6px}
</style>
<div class="content-wrapper" >
<div class="content">
	<div class="container s-table">
	<div class="row panel-header text-center">
            <h1 class="text-center pull-left" style="color: rgb(0, 0, 0);"><b><?php echo $master_title; ?></b></h1>
          
    </div>
		<hr>
	<div class="table-responsive">
	<table class="table table-striped table-hover" id="transaction" >
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Amount</th>
							<th>Paid By</th>
							<th>Type</th>
                            <th>Status</th>
                            <th>Next Billing</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        <?php
						$status = array(0=>'Inactive',1=>'Active',2=>'Set To Cancel');
                        foreach ($transaction_data as $key => $val) {
                            ?>
                            <tr class="">
                                <td>
                                   <?php echo $val['name']; ?>
                                </td>
                                <td>
                                    <?php echo '$ '.$val['amount']; ?>
                                </td>
								<td>
								 <?php echo $val['paid_by'];  ?>
						
                                </td>
								<td>
								 <?php echo $val['type'];  ?>
                                <td>
								    
                                    <span class="label btn-s label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
                                        <?php echo $status[$val['status']]; ?>
                                    </span>
                                </td>
								<td>
									<?php if($val['payment_type'] == 'single'){echo "-" ;}else{ 
									 echo date('d/m/Y',$val['expire_on']);  }?>
								</td>
								<td>
								<?php if($val['payment_type'] == 'single'){echo "-" ;}else{ 
									  if($val['status']==1)
								{ ?>
									<a onclick="return confirm('Are you sure you want to Cancel the  subscription')" href="<?php echo BASEURL; ?>/account/cancel_subscription/?id=<?php echo $val['id'];  ?>" style="color: blue;"> Unsubscribe</a>
								
								<?php
								}	
								if($val['status']==2){?>
								<a onclick="return confirm('Are you sure you want to renew subscription')" href="<?php echo BASEURL; ?>/account/renew_subscription/?id=<?php echo $val['id'];  ?>" style="color: blue;">Renew subscription</a>
								<?php 
								}	
								?>
								<?php	
								if($val['status']==0){?>
								<a onclick="return confirm('Are you sure you want to Buy subscription')" href="<?php echo BASEURL; ?>/pricing" style="color: blue;">Buy Again</a>
								<?php 
								}	
								?>	
								</td>
                            </tr>
                        <?php } }?>
                    </tbody>
                </table>
				</div>
	
		
	</div>
	</div>	
	</div>