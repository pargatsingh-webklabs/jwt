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
                            <h2 style="text-transform: uppercase;">
                                 <?php echo ucfirst($master_title); ?>
                                <!--<small>Basic example without any additional modification classes</small>-->
                            </h2>
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
										<th>No</th>
										<th>Letter To</th>
										<th>Letter From</th>
										<th>Account</th>                                                   
										<th>Date</th>                                                   
										<th>Status</th>                                                   
<!--
										<th>Actions</th>
-->
									</tr>
                                </thead>
                                <tbody>
									<?php if(count($listLetters)>0):?>
										<?php
										foreach($listLetters as $Letters):?>
						<tr>
						<td><?php echo ++$Sr;?></td>
                        <td>
							<a href="#"><b><?php echo $Letters['To_name']; ?></b></a>
						</td> 
                        <td>
							<a href="#"><b><?php echo $Letters['From_name']; ?></b></a>
						</td> 
						<td><?php echo getUserNameById($Letters["user_id"]);?></td>
						<td><?php echo date("F d, Y h:i:s A e",$Letters["created"]);?></td>
						<td>      
							<span class="label label-sm label-<?php echo ($Letters['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
								<?php echo ($Letters['status']==1)?'Active':'Inactive'; ?>
							</span>
						</td>
				<!--		<td>
							<?php if($Letters['status']==1) { ?>
								<a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the letter?')" href='<?php echo BASEURL ; ?>/letters/cancelletter/<?php echo $Letters["id"];?>'><i class="material-icons" style="color: #2b982b;">visibility</i></a>
								<?php } else if($Letters['status']==0 ) { ?>
								<a title="Activate" onclick="return confirm('Are you sure you want to deactivate the letter?')" href='<?php echo BASEURL ; ?>/letters/cancelletter/<?php echo $Letters["id"];?>'><i class="material-icons" style="color: #777;">visibility_off</i></a>
							<?php } ?>-->
<!--
						<a title="Delete" onclick="return confirm('Are you sire you want to delete the user')" href='<?php echo BASEURL; ?>/users/deleteUser/<?php echo $Letters['id']; ?>'><i class="material-icons" style="color:#DB4D4D;">delete</i></a>
-->
						<!--</td>-->
					</tr>
				      <?php endforeach;?>
						<?php else:?>
						<tr>
						<td colspan="9">
							<section  class="error-page">
								<div class="error-box">
									<div class="error-body text-center">
										<h3 class="text-uppercase">You have no Letters Added. </h3>
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
