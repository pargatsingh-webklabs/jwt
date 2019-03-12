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
                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
										<th>No</th>
										<th>Name</th>
										<th>Address</th>
										<th>City</th>
										<th>State</th>
										<th>Zip</th>
										<th>Account</th>
										<th>Joining Date</th>                                                   
<!--
										<th>Actions</th>
-->
									</tr>
                                </thead>
                                <tbody>
									<?php if(count($listLetters)>0):?>
									<?php
									$countryArray = $this->config->item('countryArray');
									foreach($listLetters as $Letters):?>
						<tr>
							<td><?php echo ++$Sr;?></td>
						<td>
							<a href="javascript:void(0);"><b><?php echo $Letters['To_name']; ?></b></a>
						</td>
						<td><?php echo $Letters["To_addressline1"];?></td>
						<td><?php echo $Letters["To_city"];?></td>
						<td><?php echo $countryArray[$Letters["To_state"]];?></td>
						<td><?php echo $Letters["To_zip"];?></td>
						<td><?php echo getUserNameById($Letters["user_id"]);?></td>
						<td><?php echo date("m/d/Y",$Letters["created"]);?></td>    
<!--
						<td>

						<a title="Delete" onclick="return confirm('Are you sure you want to delete the Postcard?')" href='<?php echo BASEURL ; ?>/postcard/cancelPostcard/<?php echo $Letters["id"];?>'><i class="material-icons" style="color:#DB4D4D;">delete</i></a>

						</td>
-->
					</tr>
				 <?php endforeach;?>
				<?php else:?>
				<tr>
				<td colspan="8">
					<section  class="error-page">
						<div class="error-box">
							<div class="error-body text-center">                                            
								<h3 class="text-uppercase">You have no Postcards Added. </h3>

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
