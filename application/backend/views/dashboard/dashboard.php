<section>
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <div class="info-box bg-orange ">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div> 
                        <div class="content">
                            <div class="text">TOTAL USERS</div>
                            <div class="number count-to" data-from="0" data-to="<?php  echo count($total_users); ?>" data-speed="1000" data-fresh-interval="20"><a style='color:#eef;' href="<?php echo BASEURL;?>/users"><?php  echo count($total_users); ?></a></div>
                        </div>
                    </div>
                </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green ">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">ACTIVE USERS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $active_users; ?>" data-speed="1000" data-fresh-interval="20"><a style='color:#eef;' href="<?php echo BASEURL;?>/users/index/1"><?php echo $active_users; ?></a></div>
                        </div>
                    </div>
                </div>				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="info-box bg-pink ">
						<div class="icon">
							<i class="material-icons">person</i>
						</div>
						<div class="content">
							<div class="text">INACTIVE USERS</div>
							<div class="number count-to" data-from="0" data-to="<?php echo $inactive_users; ?>" data-speed="15" data-fresh-interval="20"><a style='color:#eef;' href="<?php echo BASEURL;?>/users/index/0"><?php echo $inactive_users; ?></a></div>
						</div>
					</div>
				</div>            
			</div>
        </div>
    </section>
