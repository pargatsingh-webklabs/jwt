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
                        <h4 class="text-themecolor">Uploads</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Uploads</li>
                            </ol>
<!--
                            <a href="<?php echo BASEURL ; ?>/letters/create_letters" class="btn btn-info btn-rounded d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
-->
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
					<div class="col-lg-12 col-md-12">
                        <div class="card">
							<form method="post" action="<?php echo BASEURL ; ?>/upload/save" enctype="multipart/form-data">
                            <div class="card-body">
                                <h4 class="card-title">Upload File</h4><br/>
                                <div class="col-sm-12">
									<div class="form-group">
										<label for="group_name">Group Name</label>
										<input name="group_name" id="group_name" placeholder="Add a name to this group of contacts (optional)" class="form-control form-control-line" type="text"/>
									</div>
								  </div>
							<div class="col-sm-12">
								<div class="form-group">
                                <label for="input-file-now">Import Csv File </label>
                                <input type="file" required name="importfile" id="input-file-now" class="dropify">

 <button type="submit" name="uploadfile" class="form-control btn waves-effect waves-light btn-outline-success"><i class="fas fa-upload"></i> &nbsp;Upload File</button>
								</div>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
				</div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- list Post Card -->
                            <div class="contact-page-aside" id="list_letter">                             
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
                                            <h3 class="text-uppercase">You have no Letters Added. </h3>
                                            <p class="text-muted m-t-30 m-b-30">Send 4x6, 6x9. or 6x11 letters.</p>
                                            <a href="<?php echo BASEURL ; ?>/letters/create_letters" class="btn btn-info btn-rounded waves-effect waves-light m-b-40"><i class="fa fa-plus-circle"></i> Create New Letters</a> </div>

                                    </div>
                                </section>  
-->
                             <!---- NO List postcard -->   
                                <!---- List postcard -->   
                               <div class="right-aside ">
                                    <div class="right-page-header">
                                        <div class="d-flex">
                                            <div class="align-self-center">
                                                <h4 class="card-title m-t-10">Last Uploads</h4></div>
                                            <div class="ml-auto">

<!--
                                                <input type="text" id="demo-input-search2" placeholder="search contacts" class="form-control">
-->

                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                           <thead>
                                                <tr>
                                                    <th>Line</th>
                                                    <th>File Name</th>
                                                    <th>Date</th>                                                   
                                                    <th>Group</th>                                                   
                                                    <th>Contacts Imported</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php if(count($listFiles)>0):?>
												<?php
												foreach($listFiles as $Files):?>
                                                <tr>
                                                    <td><?php echo ++$Sr;?></td>
                                                    <td>
                                                        <a href="<?php echo BASEURL ; ?>/upload/downloadFile/<?php echo $Files["id"];?>"><i class="fas fa-download"></i>  <?php echo $Files["file_name"];?></a>
                                                    </td>
                                                                                  
                                                    <td><?php echo date("F d, Y h:i:s A",$Files["created"]);?></td>
                                                    <td><?php echo ($Files["group_name"])?$Files["group_name"]:'<span style="margin-left: 25px;">-</span>';?></td>
                                                    <td class='text-center'><?php echo $Files["imported_records"];?></td>
<!--
													<td><a onclick = "return confirm('Are you sure you want cancel this File?');" href="<?php echo BASEURL ; ?>/letters/cancelletter/<?php echo $Files["id"];?>" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Cancel Letter"><i class="ti-close" aria-hidden="true"></i></a></td>
-->


                                                    <td>
                                                        <a onclick = "return confirm('Are you sure you wish to delete all of the imported contacts?');" href="<?php echo BASEURL ; ?>/upload/deleteLetter/<?php echo $Files["id"];?>" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
                                                    </td>


                                                </tr>
                                                 <?php endforeach;?>
											<?php else:?>
											<tr>
											<td colspan="9">
												<section  class="error-page">
													<div class="error-box">
														<div class="error-body text-center">
															<h3 class="">You have no any file uploaded. </h3>
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
        <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
       <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
