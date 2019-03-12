<div class="container">
    <div class="row">
        <div class="col-sm-12">
		
           <div style="background:#fff; padding-bottom:10px; border-radius:8px;margin-top:2%;" class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="panel-body">
                   
          
                       <div class="col-sm-12" id="logo_st">
                           <div align="center"><a href='<?php echo BASEURL ;?>'><img src="<?php echo FRONT_END_LAYOUT;?>/assets/img/logo-white.png" /></div></a>
                       </div>

                        <!--  <div class="col-sm-12">
                          <a href='<?php echo BASEURL;?>/users/login' class="btn btn-success btn-block" style="background:#000; border:#000; color:#fff ; width:100%" ><b>Sign in</b></a>
                          </div> -->
                    
                    
                    
             
                </div>
				
			  <form name="form_upgrade_plan" method="post" id="form_upgrade_plan" action="<?php echo BASEURL; ?>/users/credit_detail">
     <input type="hidden" name="package_id" value="<?php echo $package_id ; ?>" />
	 <input type="hidden" name="user_id" value="<?php echo $user_id ; ?>" />
	   <section class="content">
        <div id="package">
		<div class="row">
		<div class=" col-md-12 col-sm-12 col-xs-12">		
		<div class="pricing-table">
                   <?php $plan = get_user_plan(array('id'=>$package_id));  ?>
                    <div class="panel panel-primary" style="border: none;">
                        <div class="controle-header panel-heading panel-heading-landing">
                            <h1 name="plan_name" class="panel-title panel-title-landing">
							 <?php echo $plan['name'] ;  ?>
                            </h1>
                        </div>
                         <div class="controle-panel-heading panel-heading panel-heading-landing-box">
                 <div class="col-md-6  text-center">                
				<h5 style="font-size:18px;">Price &nbsp;<i class="fa fa-dollar" style="color:lime"></i> <?php echo $plan['price']; ?>
				<input type="hidden" name="price" value="<?php echo $plan['price']; ?>" /></h5>
                </div>
				<div class="col-md-6 text-center">                
				<h5 style="font-size:18px;"><i class="fa fa-check" style="color:lime"></i> <?php echo $plan['validity']; ?> Days
				<input type="hidden" name="days" value="<?php echo $plan['validity']; ?>" /></h5>
                </div>
				<div class="clearfix"></div>
				</div>
                        <div class="panel-body panel-body-landing">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:justify">
                       <p name="plan_description"><?php echo $plan['plan_description'] ; ?></p>
                        </div>
                       </div>                            
                      </div>
                        <div class="panel-footer panel-footer-landing">
						 <p class=" text-center" id="Upgrading"></p>
                            <button class="btn btn-price btn-success btn-lg" name="confirm" type="submit">CONFIRM</button>
                        </div>
                    </div>
                </div>
            </div>
         </div>
      </div> <!-- /.row (main row) -->
        </section>
		</form>	
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
$("#logo_st").fadeOut('fast');	
$("#logo_st").fadeIn(4000);		
});
</script>