<div class="container-fluid">
			<div class="block-header">
                <h2><?php echo ucfirst($master_title); ?></h2>
            </div>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               <?php echo ucfirst($master_title); ?>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
										<th>Sr. No.</th>
										<th>Slide Image</th>
										<th>Header</th>
										<th>Short description</th>
										<th>Created</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                               <tbody>
                                  <?php
									foreach ($home_bannersdata as $key => $val) 
									{?>
										<tr class="">
						<td><?php echo ++$i; ?></td>
						<td><img src="<?php echo FRONT_BASE_URL.$val['image']; ?>" width="85px" height="85px"/></td>
						<td><?php echo $val['main_text']; ?></td>
						<td><?php echo $val['caption_text']; ?></td>
						<td><?php echo date('m/d/Y h:i:s A',$val['created']); ?></td>
						<td class="text-center">
						<a title="Delete" onclick="return confirm('Are you sure you want to delete the slide image')" href='<?php echo BASEURL; ?>/home_banners/delete/<?php echo $val['id']; ?>'><i class="material-icons" style="color:#DB4D4D;">delete</i></a>
						</td>
						
					</tr>
									<?php }?>
                                </tbody>
                       
                            </table>
                        </div>
                    </div>
                </div>
            </div>




</div>