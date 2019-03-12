<div class="container">
    <div class="row">
        <div class="col-sm-12">
		
           <div style="background:#fff; padding-bottom:10px; border-radius:8px;margin-top:2%;" class="col-xs-12 col-sm-12 col-md-12 ">
               
                <div class="panel-body">
                   
          
                       <div class="col-sm-12" id="logo_st">
                           <div align="center"><a href='<?php echo BASEURL ;?>'><img src="<?php echo FRONT_END_LAYOUT;?>/assets/img/logo-white.png" /></div></a>
                       </div>

                   <div class="col-md-12">
                    <p class="text-center"><b><h4 class="text-center" style="text-shadow:0px 0px 30px #000">Please select your plan to enjoy our services , which are given below.</h4></b></p>
                   </div>
                        <!--  <div class="col-sm-12">
                          <a href='<?php echo BASEURL;?>/users/login' class="btn btn-success btn-block" style="background:#000; border:#000; color:#fff ; width:100%" ><b>Sign in</b></a>
                          </div> -->
                    
                    
                    
             
                </div>
				<section class="content">
				
        <div id="package">
  <div class="row">


<?php foreach($paid_plan as $key=>$val){  ?>
<div class=" col-md-6 col-sm-6 col-xs-12">
<div class="pricing-table">
                <div class="panel panel-primary" style="border: none;">
                        <div class="controle-header panel-heading panel-heading-landing">
                            <h1 class="panel-title panel-title-landing">
                                  <?php echo $val['name']; ?>
                            </h1>
                        </div>
                        <div class="controle-panel-heading panel-heading panel-heading-landing-box">
                            <h5 style="font-size:18px;"><i class="fa fa-dollar" style="color:lime"></i> <?php echo $val['price']; ?></h5>
                        </div>
                        <div class="panel-body panel-body-landing">
                            <div class="row" id="pack">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <i class="fa fa-check" style="color:lime"></i>  <?php echo $val['validity']; ?>
                        </div>              
                        </div>
                        </div>
                        <div class="panel-footer panel-footer-landing">
                            <a href="<?php echo BASEURL; ?>/users/upgrade_plan/?p_id=<?php echo base64_encode($val['id']); ?>" class="btn btn-price btn-success btn-lg">UPGRADE</a>
                        </div>
                    </div>
                </div>
</div>
<?php } ?>



</div>

</div> <!-- /.row (main row) -->
        </section>
                
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