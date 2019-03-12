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
                                <a href="<?php echo base_url('products');?>"><?php echo ucfirst($master_title); ?></a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title"><?php echo ucfirst($master_title); ?></h1>
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
                    <div class="">
                        <div class="modules__content">
                            <div class="withdraw_module withdraw_history">
                                <div class="withdraw_table_header">
                                    <h3>Products Listing</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table withdraw__table">
                                        <thead>
                                           <tr>
											<th>Name</th>
											<th>Price</th>
											<th>Model</th>
											<th>Created</th>
<!--
											<th>Status</th>
-->
											<th >Actions</th>
									</tr>
                                        </thead>

                                        <tbody>
											<?php if(count($list)>0):?>
											<?php 
										foreach ($list as $key => $val) {
									?>
									<tr>
						<td><a href="javascript:void(0);<?php //echo BASEURL ; ?>/products/?id=<?php echo $val['id'];  ?>"><b><?php echo $val['name']; ?></b></a></td>
						<td><?php echo $val['price']; ?></td>
						<td><?php echo $val['model']; ?></td>
						<td><?php echo date("n/j/Y",$val['created']); ?></td>
<!--
						<td>      
							<span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
								<?php echo ($val['status']==1)?'Active':'Inactive'; ?>
							</span>
						</td>
-->
						<td>
							<?php //if($val['status']==1) { ?>
<!--
								<a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php // echo BASEURL; ?>/users/changeStatus/0/<?php //echo $val['id']; ?>'><i class="material-icons" style="color: #2b982b;">visibility</i></a>
								<?php //} else if($val['status']==0 ) { ?>
								<a title="Activate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php //echo BASEURL; ?>/users/changeStatus/1/<?php //echo $val['id']; ?>'><i class="material-icons" style="color: #777;">visibility_off</i></a>
-->
							<?php// } ?>
<!--
						<a href="<?php echo FRONT_BASE_URL.'product/'.$val['id']; ?>" target="_blank" class="text-danger"><i class="material-icons" style="color:#DB4D4D;">person</i></a>		
-->
						<a title="Delete" onclick="return confirm('Are you sUre you want to delete ')" href='<?php echo BASEURL; ?>/products/delete/?id=<?php echo $val['id']; ?>'><i class="material-icons" style="color:#DB4D4D;">delete</i></a>
						</td>
					</tr>
				<?php } ?>
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
