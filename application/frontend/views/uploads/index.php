   <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="<?php echo base_url();?>">Home</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url('uploads');?>">Uploads</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Upload Section</h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END BREADCRUMB AREA
    =================================-->

    <!--================================
            START SIGNUP AREA
    =================================-->
    <section class="section--padding2 bgcolor">
		<div class="container">
				<div class="row-fluid">
			<div class="" style="float: none;margin: 0 auto;margin-bottom: 30px;">
			<?php if($this->session->flashdata('success')){?>
					 <div class="alert alert-success alert-rounded"> <i class="ti-check"></i> <?php echo $this->session->flashdata('success');?><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					 </div>
			<?php }?>
		<?php	if($this->session->flashdata('error')){
			?>	
			<div class="alert alert-danger alert-rounded"> <i class="ti-user"></i> <?php echo $this->session->flashdata('error');?><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<?php }?>
			</div>
		</div> 
			<div class="row">
				<div class="col-md-12">
					 <div class="upload_modules module--upload">
                                <div class="modules__title">
                                    <h3>Upload Files</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
									 <form action="<?php echo base_url('uploads/save');?>" method="post" enctype="multipart/form-data" class="setting_form" id="userSettings2">
                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p>Import Csv File

                                                <span>(allowed extension *.csv )</span>

                                            </p>

                                            <div class="custom_upload">
                                                <label for="thumbnail">
                                                    <input type="file" id="thumbnail" name="importfile" accept=".csv" class="files">
                                                    <span class="btn btn--round btn--sm">Choose File</span>
                                                </label>
                                            </div>
                                            <!-- end /.custom_upload -->

                                            <div class="progress_wrapper">
                                                <button class="btn btn--md btn--round register_btn pull-right" type="submit">Submit</button>
                                            </div>
                                            <!-- end /.progress_wrapper -->

<!--
                                            <span class="lnr upload_cross lnr-cross"></span>
-->
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    <!-- end /.form-group -->
 </form>
                                </div>
                                <!-- end /.upload_modules -->
                            </div>
                            <!-- end /.upload_modules -->

				</div>
				<!-- end /.col-md-12 -->
			</div>
		</div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <div class="modules__content">
                            <div class="withdraw_module withdraw_history">
                                <div class="withdraw_table_header">
                                    <h3>Uploads History</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table withdraw__table">
                                        <thead>
                                            <tr>
                                               <th>Line</th>
                                                    <th>File Name</th>
                                                    <th>Date</th>                                                  
                                                    <th>Imported Rows</th>
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
													<a href="<?php echo BASEURL ; ?>/uploads/downloadFile/<?php echo $Files["id"];?>"><i class="fas fa-download"></i>  <?php echo $Files["file_name"];?></a>
												</td>
                                                                                  
                                                    <td><?php echo date("F d, Y h:i:s A",$Files["created"]);?></td>
                                                    <td class='text-center'><?php echo $Files["imported_records"];?></td>
                                                    <td>
                                                        <a onclick = "return confirm('Are you sure you wish to delete all  imported data?');" href="<?php echo BASEURL ; ?>/uploads/deleteLetter/<?php echo $Files["id"];?>" class="delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="material-icons" style="color:#DB4D4D;">delete</i></a>
                                                    </td>
                                            </tr>
                                            <?php endforeach;?>
											<?php else:?>
											  <tr>
                                                <td  colspan="5">
													<h3 class="">You have no any file uploaded. </h3>
												</td>
                                            </tr>
											<?php endif;?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
    <!--================================
            END SIGNUP AREA
    =================================-->
