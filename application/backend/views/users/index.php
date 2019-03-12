<div class="container-fluid">
            <div class="block-header">
                <h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-transform: uppercase;">
                                 <?php echo ucfirst($master_title); ?>
                                <!--<small>Basic example without any additional modification classes</small>-->
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Email</th>
											<th>Sign Up</th>
											<th>Printed</th>
											<th>Paid</th>
											<th>Unpaid</th>
											<th>Status</th>
											<th >Actions</th>
									</tr>
                                </thead>
                                <tbody>
									<?php 
										foreach ($user_data as $key => $val) {
									?>
                                    <tr>
                                       <td>
							<a href="<?php echo BASEURL ; ?>/users/view_profile/<?php echo $val['id'];  ?>"><b><?php echo $val['fname']; ?></b></a>
						</td>
						<td>
							<?php echo $val['lname']; ?>
						</td>
						<td><?php echo $val['email']; ?></td>
						<td><?php echo date("n/j/Y",$val['created']); ?></td>
						<td>$<?php echo getTotalChargesOfUser($val['id'],"total"); ?></td>
						<td>$<?php echo getTotalChargesOfUser($val['id'],"Paid"); ?></td>
						<td>$<?php echo getTotalChargesOfUser($val['id'],"Unpaid"); ?></td>
						<td>      
							<span class="label label-sm label-<?php echo ($val['status']==1)?'success':'default'; ?>   " style="box-shadow:1px 1px 5px black;" >
								<?php echo ($val['status']==1)?'Active':'Inactive'; ?>
							</span>
						</td>
						<td>
							<?php if($val['status']==1) { ?>
								<a title="Deactivate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php echo BASEURL; ?>/users/changeStatus/0/<?php echo $val['id']; ?>'><i class="material-icons" style="color: #2b982b;">visibility</i></a>
								<?php } else if($val['status']==0 ) { ?>
								<a title="Activate" onclick="return confirm('Are you sure you want to deactivate the user')" href='<?php echo BASEURL; ?>/users/changeStatus/1/<?php echo $val['id']; ?>'><i class="material-icons" style="color: #777;">visibility_off</i></a>
							<?php } ?>
<!--
						<a href="javascript:void(0);" uname="<?php echo $val['fname'];?>" u_eml="<?php echo base64_encode($val['email']);?>" u_psw="<?php echo base64_encode($val['password']);?>" class="text-danger loginAsUser"><i class="material-icons" style="color:#DB4D4D;">person</i></a>		
--> 
						<a href="<?php echo FRONT_BASE_URL.'users/loginAsUser/'.$val['id']; ?>" target="_blank" class="text-danger"><i class="material-icons" style="color:#DB4D4D;">person</i></a>		
						<a title="Delete" onclick="return confirm('Are you sire you want to delete the user')" href='<?php echo BASEURL; ?>/users/deleteUser/<?php echo $val['id']; ?>'><i class="material-icons" style="color:#DB4D4D;">delete</i></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
                                   
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
<script>
$(document).ready(function(){
	
	$(".loginAsUser").on("click",function(e){
		e.preventDefault();
		var name = $(this).attr("uname");
		if(!confirm("Are you sure.you want to login with "+name+"?"))return false;
		var email = $(this).attr("u_eml");
		var password = $(this).attr("u_psw");
		var login_url = "<?php echo FRONT_BASE_URL; ?>";
		$.post(login_url+"users/login",{"email":email,"password":password,"loginWithAdmin":"1"},function(result){
			if (result.result == 'error') {
				alert(result.message);
				$("#validating").html('<div class="card p-1 text-white bg-danger" style="padding: 0rem !important;margin-top:30px"> <div  class="card-content"> <div class="card-body" style="padding-bottom: 60px;"> <div class="float-left"> <p class="white mb-0"><strong>'+result.message+'</strong></p> </div> </div> </div> </div>');
				$(".validating_new").html('Sign in');						
			} else if (result.result == 'success') {
				window.open(login_url + 'addressbook', '_blank');
			}
		},'json');
	});
});

</script>
