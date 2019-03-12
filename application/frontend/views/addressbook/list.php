
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Address Book</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Address Book</li>
                            </ol>
                            <a href="<?php echo BASEURL ; ?>/addressbook/create_new" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <div class="row">
                    <div class="col-12">
					<?php if($this->session->flashdata('success')){?>
							 <div class="alert alert-success alert-rounded"> <i class="ti-user"></i> <?php echo $this->session->flashdata('success');?><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                             </div>
					<?php }?>	
					<?php if($this->session->flashdata('error')){?>
							 <div class="alert alert-danger alert-rounded"> <i class="ti-user"></i> <?php echo $this->session->flashdata('error');?><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                             </div>
						<?php }?>	
					</div>
				</div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- .left-right-aside-column-->
                            <div class="contact-page-aside" id="address_book">                               
                                <div class="right-aside ">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">Contacts</h4></div>
                                            <div class="ml-auto">
<!--
                                                <input type="text" id="demo-input-search2" placeholder="search contacts" class="form-control">
-->
					<div class="btn-group">
						<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-upload"></i> &nbsp;&nbsp;Import
						</button>
						<div class="dropdown-menu" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -204px, 0px); top: 0px; left: 0px; will-change: transform;">
							<a class="dropdown-item" href="<?php echo BASEURL ; ?>/upload"><i class="fas fa-upload"></i> Import CSV</a>
							<a class="dropdown-item" href="<?php echo BASEURL ; ?>/upload/downloadFile"><i class="fas fa-download"></i> Download Sample CSV</a>
						</div>
					</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="addressBookTable" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Zip</th>
                                                    <th>Create Date</th>                                                   
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php
												$countryArray = $this->config->item('countryArray');
												foreach($default as $defaultaddressbook):?>
												 <tr>
                                                    <td><?php echo ++$Sr;?></td>
                                                    <td>
                                                        <a href="<?php echo BASEURL ; ?>/addressbook/create_new/<?php echo $defaultaddressbook["id"];?>">
<!--
                                                        <img src="<?php //echo FRONT_END_LAYOUT; ?>/assets/images/3.jpg" alt="user" class="img-circle" />
-->
                                                        <?php echo $defaultaddressbook["name"];?></a>
                                                    </td>
                                                    <td><?php echo $defaultaddressbook["addressline1"];?></td>
                                                    <td><?php echo $defaultaddressbook["city"];?></td>
                                                    <td><?php echo $countryArray[$defaultaddressbook["state"]];?></td>
                                                    <td><?php echo $defaultaddressbook["zip"];?></td>
                                                    <td><?php echo date("n/d/Y",$defaultaddressbook["created"]);?></td>                                                    
                                                    <td>
													
                                                            <?php echo '(Default)'; ?>
                                                    </td>
                                                </tr>
												<?php endforeach;?>
												
												
												
												
												<?php if(count($listAddress)>0):?>
												<?php
												$countryArray = $this->config->item('countryArray');
												foreach($listAddress as $addressbook):?>
												 <tr>
                                                    <td><?php echo ++$Sr;?></td>
                                                    <td>
                                                        <a href="<?php echo BASEURL ; ?>/addressbook/create_new/<?php echo $addressbook["id"];?>">
<!--
                                                        <img src="<?php //echo FRONT_END_LAYOUT; ?>/assets/images/3.jpg" alt="user" class="img-circle" />
-->
                                                        <?php echo $addressbook["name"];?></a>
                                                    </td>
                                                    <td><?php echo $addressbook["addressline1"];?></td>
                                                    <td><?php echo $addressbook["city"];?></td>
                                                    <td><?php echo $countryArray[$addressbook["state"]];?></td>
                                                    <td><?php echo $addressbook["zip"];?></td>
                                                    <td><?php echo date("n/d/Y",$addressbook["created"]);?></td>                                                    
                                                    <td>
												
                                                        <a  href="<?php echo BASEURL ; ?>/addressbook/create_new/<?php echo $addressbook["id"];?>" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil" aria-hidden="true"></i></a>
                                                        <a onclick = "return confirm('Are you sure you wish to delete this contact?');" href="<?php echo BASEURL ; ?>/addressbook/deleteAddress/<?php echo $addressbook["id"];?>" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
                                                      
                                                    </td>
                                                </tr>
												<?php endforeach;?>
												<?php else:?>
												   <!---- NO List  -->                            
                                      <tr>
											<td colspan="8">	<section  class="error-page">
													<div class="error-box">
														<div class="error-body text-center">                                            
															<h3 class="">Add your first contact by clicking here! </h3>
															
														   <a href="<?php echo BASEURL ; ?>/addressbook/create_new" class="btn btn-info btn-rounded waves-effect waves-light m-b-40"><i class="fa fa-plus-circle"></i> Create New </a> </div>

													</div>
												</section></td>
												</tr>
											 <!---- NO List  -->
												<?php endif;?>
                                               
                                            </tbody>
                                           
                                        </table>
                                    </div>
                                    <!-- .left-aside-column-->
                                </div>
                                <!-- /.left-right-aside-column-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
             
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
     
