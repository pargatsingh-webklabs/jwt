<div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
  <?php  if(!empty($advance_forms)){ ?>
        <div class=" pull-right" style="margin-top:-50px">
           <a href="<?php echo BASEURL ?>" class="btn green">Go to Dashboard</a>
	     <div class="clearfix"></div>
        </div>
  <?php } ?>		
        <form action='<?php echo BASEURL; ?>/users/bulkaction'  method='post'>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">

            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>

							<th>Sr no.</th>
							<th>Escrow File Number</th>			
							<th>Property Address</th>
							<th>Sales Price</th>
							<th>Agent Name</th>
							<th>Broker Name</th>
							<th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php  $srno=1;
					 if(!empty($advance_forms)){
                        foreach ($advance_forms as $key => $val) {
                            ?>
                            <tr class="">
			                    <td><?php echo $srno++ ; ?></td>
                                <td><?php echo $val['escrow_file_number']; ?></td>
                                <td><?php echo $val['property_address']; ?></td>
                                <td><?php echo $val['sales_price']; ?></td>
								<td><?php echo $val['sellers_name']; ?></td>								
								<td><?php echo $val['buyers_name']; ?></td>									
								<td>      
                                    <span class="label label-sm label-<?php if($val['status']==1){echo "success";}else if($val['status']==0){echo "default";}else if($val['status']==2){echo "Reimburse";}else{echo "Pending";}?> " style="box-shadow:1px 1px 5px black;">
                                        <?php  //echo ($val['status']==1)?'Form Activated':'Form Denied';
                                         if($val['status']==1){
											 echo "Approved";
										 }else if($val['status']==0){
											 echo "Denied";
										 }else if($val['status']==2){
											 echo "Advances ready to reimburse";
										 }else{
											 echo "Pending";
										 }

										?>
                                    </span>
                                </td>
								
                            </tr>
                        <?php }}else{ ?>
						
						<td class="text-center" colspan="7"><h3>There is no data !
						</h3></td>
						<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </form>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
