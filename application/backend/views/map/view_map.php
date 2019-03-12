<div class="container-fluid">
            <div class="block-header">
                <h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
							<h2 style="text-transform: uppercase;">    <?php echo ucfirst($master_title); ?></h2>

                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
										<th>Sr. No.</th>
										<th>Name</th>
										<th>Description</th>
										<th>Image</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
                                </thead>
                                <tbody>
						<?php $i = 1; foreach ($map_data as $key => $val) {?>
					<tr class="">
						<td><?php echo $i; ?></td>
						<td><?php echo $val['name']; ?></td>
						<td><?php echo $val['description']; ?></td>
						<td>
						<?php if(!empty($val['image'])){ ?>	
						<img src="<?php echo BASEURL.$val['image']; ?>" style="width: 30%;"/>
						<?php }else { ?>	
						<img src="<?php echo BASEURL;?>/assets/img/no-image.png" style="width: 30%;"/>
						<?php } ?>	
						</td>
						<td>
						 	<span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >	
								<?php echo ($val['status'] == 1) ? 'Enable' : 'Disable' ;?>
							</span>
						</td>
						<td class="text-center">
							<a href="#"><i class="fa fa-eye" style="color:green;"></i></a>
							<?php if($val['status']==1) { ?>
								<a class="open_map_modal" id="<?php echo $val['id']; ?>" title="Disable" onclick="return confirm('Are you sure you want to disable the map')" href='javascript:void(0);'><i class="fa fa-times" style="color: #777;"></i></a>
								<?php } else if($val['status']==0 ) { ?>
								<a title="Enable" onclick="return confirm('Are you sure you want to enable the map')" href='<?php echo BASEURL; ?>/map/enable_map/1/<?php echo $val['id']; ?>'><i class="fa fa-check" aria-hidden="true" style="color: #2b982b;"></i></a>
							<?php } ?>
						</td>	
						
					</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
                                   
                        </div>
                    </div>
                </div>
            </div>

	
	

  <!-- Modal -->
  <div class="modal fade" id="Map_Modal" role="dialog">
    <div class="modal-dialog" style="z-index: 999999; top: 40px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Choose Any Reason</h4>
        </div>
        <div class="modal-body text-center"style="min-height:300px;">
			<form method="post" action="<?php echo BASEURL; ?>/map/disable_map" >	
					<input class="id_model" type="hidden" name="id" val="" />
				 <select name="reason">
					  <option>Select Reason</option>
					 <?php foreach($list_reasons as $key=>$val){ ?>
					 <option><?php echo  $val['name']; ?></option>	 
					 <?php }?>
				 </select>
				<input type="submit" value="submit" />
			</form>	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
