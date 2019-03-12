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
										<th>Actions</th>
									</tr>
                                </thead>
                                <tbody>
						<?php $i = 1; foreach($list_reasons as $key => $val) {?>
					<tr class="">
						<td><?php echo $i; ?></td>
						<td><?php echo $val['name']; ?></td>
						<td><?php echo $val['description']; ?></td>
						<td class="">
							<a title="edit"  href='<?php echo BASEURL; ?>/map/edit_cancel_reason/<?php echo $val['id']; ?>'><i class="fa fa-pencil-square-o" style="color:#8BC34A;"></i></a>&nbsp;
							<a title="Delete" onclick="return confirm('Are you sure you want to delete.')" href='<?php echo BASEURL; ?>/map/delete_cancel_reason/<?php echo $val['id']; ?>'><i class="fa fa-trash" style="color:#8BC34A;"></i></a>
						</td>	
						
					</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
                                   
                        </div>
                    </div>
                </div>
            </div>


  
