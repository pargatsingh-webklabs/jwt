<div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
		<div class='col-lg-4 pull-right'>
        <div class=" pull-right" style="margin-top:-40px;box-shadow:5px 5px 10px black;">
		<a href="<?php echo BASEURL; ?>/package/add_package">
            <button id="" class="btn green" type='submit'>
<i class="fa fa-plus"></i>&nbsp; 
			Add new packages 
            </button>
		</a>	
		</div>
        </div>
        <form action='<?php echo BASEURL; ?>/users/bulkaction' name="form_package_list" id="form_package_list" method='post'>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Plan Description</th>
                            <th>Price</th>
                            <th>Validity</th>
							<th>Status</th>						
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($packages as $key => $val) {
                            ?>
                            <tr class="">
                                <td>
                                    <a href="<?php echo BASEURL ; ?>/users/view_profile/<?php echo $val['id'];  ?>"><?php echo $val['name']; ?></a>
                                </td>
                                <td>
                                    <?php echo $val['plan_description']; ?>
                                </td>
                                <td>
                                    <?php echo $val['price']; ?>                                    
                                </td>
						         <td>
								          <?php echo $val['validity']; ?>    
                                                                      
                                </td>
								<td>      
                                    <span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   ">
                                        <?php echo ($val['status']==1)?'Active':'Inactive'; ?>
                                    </span>
                                </td>



                                <td width="100">
                                  <a title="View details" href="<?php echo BASEURL; ?>/package/edit_package/<?php echo $val['id']; ?>"><i class="fa fa-edit fa-2x"  style="color:#000;"></i></i></a>
                                  <?php if($val['status']==1) { ?>
                                  <a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php echo BASEURL; ?>/package/changeStatus_package/0/<?php echo $val['id']; ?>'><i class="fa fa-minus-square fa-2x" style="color:#000;"></i></a>
                                  <?php } else if($val['status']==0 ) { ?>
                                  <a title="Activate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php echo BASEURL; ?>/package/changeStatus_package/1/<?php echo $val['id']; ?>'><i class="fa fa-plus-square fa-2x"style="color:#000;" ></i></a>
                                  <?php } ?>
                                  <a title="Delete" onclick="return confirm('Are you sire you want to delete the user')" href='<?php echo BASEURL; ?>/package/delete_package/<?php echo $val['id']; ?>'><i class="fa fa-times-circle fa-2x " style="color:#DB4D4D;"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
							<div id="loader" class="text-center" >

							</div>	
            </div>
        </div>
        </form>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo THEME_URL; ?>assets/scripts/core/app.js"></script>
<script src="<?php echo THEME_URL; ?>assets/scripts/custom/table-managed.js"></script>
<script>
    jQuery(document).ready(function () {
        App.init();
        TableManaged.init();
    });
</script>


</body>
<!-- END BODY -->