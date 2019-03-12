<style>
h5 {
  font-weight: normal;
	font-style: normal;
}
label {

	font-style: normal;
	}
.panel-heading {
  border-bottom: 1px solid transparent;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
  padding: 0px 10px;
}
</style> 
<div class="container-fluid">
	<div class="block-header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
	<div class="col-md-12">
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
                        <div class="body">
								<div class="panel-heading">
					<h2 style="text-transform: uppercase; font-size: 14px; font-weight: normal; font-style: normal;">
					<i class="glyphicon glyphicon-camera"></i> &nbsp;<?php echo $user_details['display_name']."'s  " ; ?>profile picture
					</h2></div>
				<div class="panel-body">
					<!-- left column -->
					<img src="https://sendtail.com/dev_sendtail/application/backend/themes//assets/images/user.png" class="avatar img-responsive " alt=""/>
				
			 </div>
<div class="panel panel-default">
				<div class="panel-heading"> <i class="pull-left fa fa-user"></i> 
					<h2 style="text-transform: uppercase; font-size: 14px; font-weight: normal; font-style: normal;">
						General Info
                    </h2>
						
					</div>
				<div class="panel-body">
				
					
					
					<div class="form-group">
						<div class="row clearfix">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label>First name</label>
								<h5 ><?php  echo $user_details['fname'];  ?></h5>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label>Last name</label>
								<h5><?php  echo $user_details['lname'];  ?></h5>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row clearfix">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label>Email address</label>
								<h5><?php  echo $user_details['email'];  ?></h5>
							</div>		
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label>Display name</label>
								<h5><?php  echo $user_details['display_name'];  ?></h5>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row clearfix">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<label>Date of registion (m/d/Y)</label>
								<h5><?php  echo date('m/d/Y', $user_details['created'])   ?></h5>
							</div>		
						</div>
					</div>
					<div class="form-group">
						<div class="row clearfix">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<a href="<?php echo BASEURL ?>/users" class="btn bg-red btn-block waves-effect pulling-right" style="margin-top:-5px;" type="button"><i class="fa fa-hand-o-left"></i> Go back </a>	
							</div>		
						</div>
					</div>
					</div>
					
				</div>
			
<!--

<div class="panel panel-default">
				<div class="panel-heading">
					<h2 style="text-transform: uppercase; font-size: 14px; font-weight: normal; font-style: normal;">
						Account Info
                              
                            </h2>
			
					</div>
				<div class="panel-body">
				
					
					
					<div class="form-group">
						<div class="row clearfix">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label>Package name</label>
								<h5 ><?php  echo $accountinfo['package_id'];  ?></h5>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label>Price</label>
								<h5><?php  echo $accountinfo['price'];  ?></h5>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row clearfix">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label>Purchase On</label>
								<h5><?php echo date('m/d/Y', $accountinfo['purchased_on']);?></h5>
							</div>		
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label>Expired On</label>
								<h5><?php echo date('m/d/Y', $accountinfo['expired_on']); ?></h5>
								
							</div>
							
						</div>
					</div>
				<div class="col-md-3" style="float:right;">
								<a href="<?php echo BASEURL ?>/users" class="btn bg-red btn-block waves-effect pulling-right" style="margin-top:-5px;" type="button"><i class="fa fa-hand-o-left"></i> Go back </a>	
									</div>		
		
				</div>

			
	
                        </div>
	
	
-->
<!--
                    </div>
                </div>
-->
            </div>
