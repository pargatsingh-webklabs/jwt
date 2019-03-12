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
                        <h4 class="text-themecolor">Post card</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Post Cards</li>
                            </ol>
                            <a href="<?php echo BASEURL ; ?>/postcard/create_post" class="btn btn-info btn-rounded d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                        <div class="card">
                            <!-- list Post Card -->
                            <div class="contact-page-aside" id="list_postcard">                             
                               <!---- NO List postcard -->                            
                                 <!---- NO List postcard -->                            
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
<!--
                                <section  class="error-page">
                                    <div class="error-box">
                                        <div class="error-body text-center">                                            
                                            <h3 class="text-uppercase">You have no Postcards Added. </h3>
                                            <p class="text-muted m-t-30 m-b-30">Send 4x6, 6x9. or 6x11 postcards.</p>
                                            <a href="<?php echo BASEURL ; ?>/postcard/create_post" class="btn btn-info btn-rounded waves-effect waves-light m-b-40"><i class="fa fa-plus-circle"></i> Create New Postcards</a> </div>

                                    </div>
                                </section>  
-->
                             <!---- NO List postcard -->   
                                <!---- List postcard -->   
                               <div class="right-aside ">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">Post Cards</h4></div>
                                            <div class="ml-auto">
                                                <input type="text" id="demo-input-search2" placeholder="search contacts" class="form-control"> </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Zip</th>
                                                    <th>Joining Date</th>                                                   
                                                    <th>Action</th>
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
                                                        <a href="#"><img src="<?php echo FRONT_END_LAYOUT; ?>/assets/images/3.jpg" alt="user" class="img-circle" /> <?php echo $Letters["To_name"];?></a>
                                                    </td>
                                                    <td><?php echo $Letters["To_addressline1"];?></td>
                                                    <td><?php echo $Letters["To_city"];?></td>
                                                    <td><?php echo $countryArray[$Letters["To_state"]];?></td>
                                                    <td><?php echo $Letters["To_zip"];?></td>
                                                    <td><?php echo date("m/d/Y",$Letters["created"]);?></td>                                                    
                                                    <td>
                                                        <a onclick = "return confirm('Are you sure you want to cancel the Postcard?');" href="<?php echo BASEURL ; ?>/postcard/cancelPostcard/<?php echo $Letters["id"];?>" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
											<?php else:?>
											<tr>
											<td colspan="8">
											    <section  class="error-page">
													<div class="error-box">
														<div class="error-body text-center">                                            
															<h3 class="text-uppercase">You have no Postcards Added. </h3>
															<a href="<?php echo BASEURL ; ?>/postcard/create_post" class="btn btn-info btn-rounded waves-effect waves-light m-b-40"><i class="fa fa-plus-circle"></i> Create New Postcards</a> </div>

													</div>
												</section>
												</td>
                                            </tr>
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
                
                
                
                
             </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
       
