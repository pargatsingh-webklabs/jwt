  <div class="table-responsive"><table id="billing-table1" class="table table-bordered text-center table-striped m-t-30 table-hover no-wrap contact-list"><thead>
	<tr>
		<th>Line</th>
		<th>Recipient</th>
		<th>Mail Date</th>
		<th>Delivery Date</th>
		<th>Type</th>
		<th>Pages</th> 
		<th>Charge</th> 
		<th>View Package</th> 
		<th>Send Status </th>
		<th>Payment Status </th>
		
<!--
		<th>Action</th>
-->
	</tr>
</thead>
<tbody>
		<?php if(count($listBilling)>0):?>
		<?php
		$Sr = (($current_page-1)*$item_per_page+1);
		$billingStatus = $this->config->item('billingStatus');
		$billingStatusLabel = $this->config->item('billingStatusLabel');
		foreach($listBilling as $Billing):
			$sent_status = '-';
			if($Billing["sent_status"]==2) $sent_status = 'Test OK';
			if($Billing["sent_status"]==1) $sent_status = 'Sent';
		?>
	<tr>
		<td><?php echo $Sr++;?></td>                                                
		<td><?php  echo getRecipientName($Billing["letter_id"],$Billing["mail_type"]);?></td>
		<td><?php echo date("n/j/Y",strtotime($Billing["send_date"]));?></td>
		<td><?php echo date("n/j/Y",strtotime($Billing["expected_delivery_date"]));?></td>
		<td><?php echo ucfirst($Billing["mail_type"]);?></td>
		<td><?php echo $Billing["pages"];?></td>
		<td>$<?php echo $Billing["charges"];?></td>
		<td><a href="<?php echo $Billing["url"];?>" target="_blank"><i alt="user" class="fa fa-eye fa-2x"></i></a></td>
		<td><span class="label label-success"><?php echo $sent_status;?></td>
		<td style="text-align: center !important;"><span class="label label-<?php echo $billingStatusLabel[$Billing["status"]];?>"><?php echo $billingStatus[$Billing["status"]];?></span>
<!--
		<span class="label label-inverse">UnPaid</span>
-->
<!--
		</td>
			<td class="text-center"><?php if($Billing["status"]==2){echo "-";}else{?>
				<a title="Cancel Billing" onclick="return confirm('Are you sure you want to cancel the <?php echo ucfirst($Billing["mail_type"]);?>?')" href='<?php echo BASEURL ; ?>/billing/cancelBilling/<?php echo $Billing["id"];?>'><i class="ti-trash"> Cancel</i></a>
				<?php }?>
		</td>
-->
	
	</tr>
	<?php endforeach;?>
	<?php else:?>
	<tr>
	<td colspan="9">
		<section  class="error-page">
			<div class="error-box">
				<div class="error-body text-center">
					<h3 class="">Send your first <a href="<?php echo BASEURL ; ?>/postcard/create_post"><u>postcard</u></a> or <a href="<?php echo BASEURL ; ?>/letters/create_letters"><u>letter</u></a> today! </h3>
<!--
					<a href="<?php echo BASEURL ; ?>/letters/create_letters" class="btn btn-info btn-rounded waves-effect waves-light m-b-40"><i class="fa fa-plus-circle"></i> Create New Billing</a>
-->
				</div>
			</div>
		</section>
	</td>
	</tr>
	<?php endif;?>
 </tbody>
  </table></div>
</div>
                                    <!-- .Data Table-->
<div class="row">
<div class="col-sm-12 col-md-5">
      <div class="dataTables_info" id="addressBookTable_info" role="status" aria-live="polite">Showing <?php echo  (($current_page-1)*$item_per_page+1)." to ".(($current_page-1)*$item_per_page+count($listBilling))." of ".$total_records;?> entries</div>
</div>
<div class="col-sm-12 col-md-7 text-right">
	 <div class="dataTables_paginate paging_simple_numbers" id="addressBookTable_paginate">
<?php echo paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url);?>
	</div>
</div>
</div>
