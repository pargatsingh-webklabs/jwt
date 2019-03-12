<style>
#TransactionsSpan {	text-align: center;}
#TransactionsSpan u {
	margin-left: 2%;
	color: #f6f6f9;
	font-weight: bold;
	background-color: #337ab7;
	border-radius: 8px;
	padding: 3px 6px;
	text-decoration: none;
}
#TransactionsSpan b { margin-left: 4px;}
</style>
<div class="container-fluid">
            <div class="block-header">
                <h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2>
                  	<?php $MSSG=array();if($this->session->flashdata('success')){
							 $MSSG["card"] = "success";$MSSG["MSSG"] =  $this->session->flashdata('success');
						 }
						 if($this->session->flashdata('error')){
							$MSSG["card"] = "danger";$MSSG["MSSG"] =  $this->session->flashdata('error');
						 }
						 if(!empty($MSSG)){
						 ?>	
						<div class="alert alert-<?php echo @$MSSG["card"];?> alert-rounded"> <i class="ti-user"></i> <?php echo @$MSSG["MSSG"];?><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
						</div>
					<?php }?>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-transform: uppercase;float:left;">
                                 <?php echo ucfirst($master_title); ?>
                                <!--<small>Basic example without any additional modification classes</small>-->
                            </h2>
                            <div id="TransactionsSpan">
<!--
								<p>
								<b>Total Transactions: </b>
								<u>$<?php echo $Charges24;?></u><b>Last 24 Hours</b>
								<u>$<?php echo $Charges7days;?></u><b>Last 7 Days</b>
								<u>$<?php echo $Charges30days;?></u><b>Last 30 Days</b></p>
								<p>
-->
								<b>Total Transactions: </b>
								<u><?php echo $Count24;?></u><b>Last 24 Hours</b>
								<u><?php echo $Count7days;?></u><b>Last 7 Days</b>
								<u><?php echo $Count30days;?></u><b>Last 30 Days</b></p>
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
										<th>Line</th>
										<th>Recipient</th>
										<th>Mail Date</th>
										<!--<th>Mail Date</th>-->
										<th>Delivery Date</th>
										<th>Type</th>
										<th>Pages</th> 
										<th>Charge</th> 
										<th>Mode</th> 
										<th>Account</th> 
										<th>View Package</th> 
										<th>Status </th>
									</tr>
                                </thead>
                                <tbody>
									<?php if(count($listBilling)>0):?>
										<?php
										$billingStatus = $this->config->item('billingStatus');
										$billingStatusLabel = $this->config->item('billingStatusLabel');
										foreach($listBilling as $Billing):?>
						<tr>
						 <td><?php echo ++$Sr;?></td>                                                
						<td><?php  echo getRecipientName($Billing["letter_id"],$Billing["mail_type"]);?></td>
						<td><?php echo date("n/d/Y",strtotime($Billing["send_date"]));?></td>
						<!--<td><?php echo date("F d, Y",strtotime($Billing["send_date"]));?></td>-->
						<td><?php echo date("n/d/Y",strtotime($Billing["expected_delivery_date"]));?></td>
						<td><?php echo ucfirst($Billing["mail_type"]);?></td>
						<td><?php echo $Billing["pages"];?></td>
						<td>$<?php echo $Billing["charges"];?></td>
						<td><?php echo $chh = (@$Billing["charges"]=='0.00')?"Test":"Live";?></td>
						<td><?php echo getUserNameById($Billing["user_id"]);?></td>
						<td><a href="<?php echo $Billing["url"];?>" target="_blank">
						<i alt="user" class="fa fa-eye fa-2x"></i>
						</a></td>
						<td><span class="label label-<?php echo $billingStatusLabel[$Billing["status"]];?>"><?php echo $billingStatus[$Billing["status"]];?></span>
<!--
						<span class="label label-inverse">UnPaid</span>
-->
						</td>

	
					</tr>
				      <?php endforeach;?>
						<?php else:?>
						<tr>
						<td colspan="9">
							<section  class="error-page">
								<div class="error-box">
									<div class="error-body text-center">
										<h3 class="text-uppercase">You have no Billing Added.. </h3>
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
		</table>
                                   
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->

