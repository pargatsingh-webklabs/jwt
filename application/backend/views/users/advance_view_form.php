<div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        <div class=" pull-right" style="margin-top:-50px">
            <!--<button id="" class="btn green">
                Add New <i class="fa fa-plus"></i>
            </button> -->
						<a href="<?php echo BASEURL ?>/users" class="btn green">Go back to users list</a>
	<div class="clearfix"></div>
        </div>
        <form action='<?php echo BASEURL; ?>/users/bulkaction'  method='post'>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">

            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>

							<th>Sr no.</th>
							<th>View Form </th>
							<th>Escrow File Number</th>			
							<th>Property Address</th>
							<th>Sales Price</th>
							<th>Agent Name</th>
							<th>Broker Name</th>
							<th>Status</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php  $srno=1;
                        foreach ($advance_forms as $key => $val) {
                            ?>
                            <tr class="">
			                    <td><?php echo $srno++ ; ?></td>
								<td><a href="<?php echo BASEURL; ?>/users/get_advance_data/<?php echo $val['id']; ?>/<?php echo $ID ; ?>"><i class="fa fa-eye fa-2x" style="color:#32CD32;"></i></a></td>		<!--<td><a href="<?php echo BASEURL; ?>/users/get_view_form_advance/<?php echo $val['id']; ?>/<?php echo $ID ; ?>"><i class="fa fa-eye fa-2x" style="color:#32CD32;"></i></a></td>-->
                                <td><?php echo $val['escrow_file_number']; ?></td>
                                <td><?php echo $val['property_address']; ?></td>
                                <td><?php echo $val['sales_price']; ?></td>
								<td><?php echo $val['sellers_name']; ?></td>								
								<td><?php echo $val['buyers_name']; ?></td>									
								<td>      
                                     <form action="" id="statusChange" method="post" >
									   <select name="status" id="status" onchange="changestatus(<?php echo $val['id'];?>,<?php echo $ID ; ?>)" class="label label-sm label-<?php if($val['status']==1){echo "success";}else if($val['status']==0){echo "default";}else if($val['status']==2){echo "Reimburse";}else if($val['status']==3){echo "Pending";} else if($val['status']==4){echo "Paid";}else {echo "Repaid";}?> " style="box-shadow:1px 1px 5px black;">
									   <option value="0"<?php if($val['status']==0){echo 'selected="selected"';}?>>Denied</option>
									   <option value="1"<?php if($val['status']==1){echo 'selected="selected"';}?>>Approved</option>
									   <option value="2"<?php if($val['status']==2){echo 'selected="selected"';}?> style="padding-left:60px;"> Advances ready to reimburse </option>
									   <option value="3"<?php if($val['status']==3){echo 'selected="selected"';}?>>Pending</option>
									   <option value="4"<?php if($val['status']==4){echo 'selected="selected"';}?>>Advance Paid Out</option>
									   <option value="5"<?php if($val['status']==5){echo 'selected="selected"';}?>>Advance Repaid</option>
									   
										</select>
										</form>
                                </td>
								
                                <td><!--
                                  <?php if($val['status']==1) { ?>
                                  <a title="Deactivate" onclick="return confirm('Are you sure you want to deny the form')" href='<?php echo BASEURL; ?>/users/change_Status/0/<?php echo $val['id']; ?>/<?php echo $ID ; ?>'><i class="fa fa-minus-square fa-2x" style="color:#000;"></i></a>
                                  <?php } else if($val['status']==0 ) { ?>
                                  <a title="Activate" onclick="return confirm('Are you sure you want to apporve this form')" href='<?php echo BASEURL; ?>/users/change_Status/1/<?php echo $val['id']; ?>/<?php echo $ID ; ?>'><i class="fa fa-plus-square fa-2x" style="color:#000;"></i></a>
                                  <?php }else if($val['status']==2 ) { ?>
                                  <a title="Activate" onclick="return confirm('Are you sure you want to apporve this form')" href='<?php echo BASEURL; ?>/users/change_Status/1/<?php echo $val['id']; ?>/<?php echo $ID ; ?>'><i class="fa fa-plus-square fa-2x" style="color:#000;"></i></a>
                                  <?php }  ?>-->
                                <a title='Delete the form' onclick="return confirm('Are you sire you want to delete this form')" href='<?php echo BASEURL; ?>/users/delete_adv_form/<?php echo $val['id']; ?>/<?php echo $ID ; ?>'><i class="fa fa-trash-o fa-2x"  style="color:#DB4D4D;"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </form>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<script type="text/javascript">
function changestatus(id,uId){
	if(confirm('Are you sure? you want to change status?'))
	{
	  var status1 = document.getElementById('status').value;
	  window.location = '<?php echo BASEURL.'/users/change_AdvanceStatus/';?>'+id+'/'+status1+'/'+uId;
	 //$("#statusChange").submit();
	}	
}
</script>