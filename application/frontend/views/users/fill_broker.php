
<div id="content-inner">
   <div class="container">

   <?php if(isset($msg) && !empty($msg)){  ?>
	   <div class="row" id="thanks_msg">
		<div class="col-xs-12 col-sm-12 col-md-12 ">
			 <div id="" class="alert alert-info alert-dismissible" role="alert">
					<h1 class="text-center" style="line-height:45px;"><i class="fa fa-check-square-o"></i>"<?php  echo $msg;  ?>"</h1>
					 <div class="clearfix"></div>
				 </div>
		</div>
	   </div>  
  <?php } ?>
 <h2 style="color:#212B7D;">Broker Form</h2> 
<form name="form_broker" id="form_broker" method="post" action="<?php echo BASEURL ;?>/users/broker" >
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div id="step2" class="hidd">
          <div class="form-group">
				<input type="text" name="brokerage_name" id="brokerage_name" class="form-control input-lg" placeholder="Brokerage Name" tabindex="4">
			</div>
             <div class="form-group">
				<textarea name="brokerage_address" id="brokerage_address" class="form-control input-lg" placeholder="Brokerage Address"></textarea>
			</div>
			  <div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="broker_name" id="broker_name" class="form-control input-lg" placeholder="Brokers Name" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="email" name="broker_email" id="broker_email" class="form-control input-lg" placeholder="Brokers email" tabindex="2">
					</div>
				</div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                   <div class="form-group">
				     <input type="text" name="broker_phone" id="broker_phone" class="form-control input-lg usphonenumber" placeholder="Brokers Phone" tabindex="4">
			       </div>
                 </div>
                 <div class="col-xs-12 col-sm-6 col-md-6">
                   <div class="form-group">
				     <input type="text" name="broker_license_number" id="broker_license_number" class="form-control input-lg" placeholder="Brokers License Number" tabindex="4">
			         </div>
                 </div>
			</div>
			
			
           
			
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3">
					<span class="button-checkbox">
                         <input type="checkbox" name="terms_and_cond" id="terms_and_cond" class="0" value="1" checked> I Agree
					</span>
				</div>
				<div class="col-xs-12 col-sm-9 col-md-9 ">
					<p style="text-align:left">By providing us your information, you authorize eCommission to access MLS information that you are entitled to receive directly, in order to make the sign up and application process faster and more convenient.</p>
				</div>
			</div>
			
			<div class="row">
				<!--<div class="col-xs-12 col-md-6" style="margin-bottom:15px;"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>-->
				<div class="col-xs-12 col-md-6 pull-right"><button type="submit" class="btn btn-success btn-block btn-lg">Submit</button></div>
                
			</div>
          </div>  </div>
</form>		  
</div>
</div>

<script>
$(document).ready(function(){
$("#thanks_msg").fadeOut(5000);	
});
</script>