
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
                        <h4 class="text-themecolor">Create New Contact</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Create New Contact</li>
                            </ol>                           
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->                
               <!-- Row -->
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
                   
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">                              
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Contact Details</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                             <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" method="post" id="addressbookForm" action="<?php echo BASEURL ; ?>/addressbook/save">
                                         <input type="hidden" name="id" value="<?php echo @$addressbook["id"];?>"/>
                                           <div class='row'>
                                            <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12">Name<span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="text" name="name" value="<?php echo @$addressbook["name"];?>" required class="form-control form-control-line" >
                                                </div>
                                            </div>                                              
                                        </div> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12">Company</label>
                                                <div class="col-md-12">
                                                    <input type="text"  name="comapany" value="<?php echo @$addressbook["comapany"];?>" class="form-control form-control-line" >
                                                </div>
                                            </div>
                                             </div> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12">Address Line 1 <span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="text" required name="addressline1" value="<?php echo @$addressbook["addressline1"];?>" class="form-control form-control-line">
                                                </div>
                                            </div>
                                             </div> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12">Address Line 2 <span style="color:#a8a8a8">(optional)</span> </label>
                                                <div class="col-md-12">
                                                    <input type="text" name="addressline2" value="<?php echo @$addressbook["addressline2"];?>" class="form-control form-control-line">
                                                </div>
                                            </div> 
                                            </div>
                                            <div class="col-sm-4">
                                             <div class="form-group">
                                                <label for="example-email" class="col-md-12">City<span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="text" required name="city" value="<?php echo @$addressbook["city"];?>" class="form-control form-control-line" required>
                                                </div>
                                            </div>
                                            </div> 
                                            <div class="col-sm-4">
                                             <div class="form-group">
                                                <label for="example-email"class="col-md-12">State <span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                     <select name="state" required class="form-control form-control-line">
                                                        <option value=""> -- Select State -- </option>
                                                     
										<?php
											$countryArray = $this->config->item('countryArray');
											foreach($countryArray as $cnty_id =>$cnty_val):
												$selected = ($cnty_id==@$addressbook["state"])? "selected":"";
										  ?>
											<option <?php echo $selected;?> value="<?php echo $cnty_id;?>"><?php echo $cnty_val;?></option>
										  <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>  
                                            <div class="col-sm-4">
                                             <div class="form-group">
                                                <label for="example-email" required class="col-md-12">Zip<span class="text-danger">*</span></label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo @$addressbook["zip"];?>" class="form-control form-control-line" name="zip" id="" required>
                                                </div>
                                            </div>
                                            </div> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-md-12">Phone <span style="color:#a8a8a8">(optional)</span></label>
                                                <div class="col-md-12">
                                                    <input type="text" name="phone_no" value="<?php echo @$addressbook["phone_no"];?>" class="form-control form-control-line" >
                                                </div>
                                            </div>
                                             </div> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email <span style="color:#a8a8a8">(optional)</span></label>
                                                <div class="col-md-12">
                                                    <input type="email" name="email" value="<?php echo @$addressbook["email"];?>" class="form-control form-control-line" id="example-email" >
                                                </div>
                                            </div>
                                             </div> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button id="Submit" class="btn btn-success"><i class="far fa-save" style=""></i> SAVE</button>
                                                </div>
                                            </div>
                                               </div> 
                                                
                                                </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
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
       
