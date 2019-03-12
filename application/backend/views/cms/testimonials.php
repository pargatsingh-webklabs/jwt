
<div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
		<div class='col-lg-4 pull-right' >
        <div class=" pull-right" style="margin-top:-40px;box-shadow:5px 5px 10px black;" >
		<a href="<?php echo BASEURL; ?>/cms/add_testimonial" >
            <button id="" class="btn green" type='submit' >
				<i class="fa fa-plus"></i>&nbsp; 
                 Add new testimonial

            </button>
		</a>	
		</div>
        </div>
        <form action='<?php echo BASEURL; ?>/users/bulkaction'  method='post'>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Testimonial Description</th>
                            <th>Testimonial Image</th>
							<th>Status</th>						
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($testimonials as $key => $val) {
                            ?>
                            <tr >

                                <td width="150">
                                   <b> <a href="<?php echo BASEURL ; ?>/users/view_profile/<?php echo $val['id'];  ?>"><?php echo $val['testimonial_title']; ?></a></b>
                                </td>
                                <td>
                                    <?php echo $val['testimonial_description']; ?>
                                </td>

						         <td class="ani_image">
								 <img src="<?php echo $val['testimonial_image'] ?>" class="img-circle img-responsive"/>   
                                                                      
                                </td>
								<td>      
                                    <span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   ">
                                        <?php echo ($val['status']==1)?'Active':'Inactive'; ?>
                                    </span>
                                </td>



                                <td width="100">
                                  <a title="View details" href="<?php echo BASEURL; ?>/cms/edit_testimonial/<?php echo $val['id']; ?>"><i class="fa fa-edit fa-2x" style="color:#000;"></i></a>
                                  <?php if($val['status']==1) { ?>
                                  <a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php echo BASEURL; ?>/cms/changeStatus/0/<?php echo $val['id']; ?>'><i class="fa fa-minus-square fa-2x" style="color:#000;"></i></a>
                                  <?php } else if($val['status']==0 ) { ?>
                                  <a title="Activate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php echo BASEURL; ?>/cms/changeStatus/1/<?php echo $val['id']; ?>'><i class="fa fa-plus-square fa-2x" style="color:#000;"></i></a>
                                  <?php } ?>
                                  <a title="Delete" onclick="return confirm('Are you sire you want to delete the user')" href='<?php echo BASEURL; ?>/cms/delete_testimonial/<?php echo $val['id']; ?>'><i class="fa fa-times fa-2x" style="color:#DB4D4D;"></i></a></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
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
		$(".ani_image").fadeOut(1000);
        $(".ani_image").fadeIn(4000);
    });
</script>
</body>
<!-- END BODY -->