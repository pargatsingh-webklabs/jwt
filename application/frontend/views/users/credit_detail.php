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
				
 <form name="form_credit_detail" id="form_credit_detail" method="post" action="<?php echo BASEURL; ?>/users/thank_you">
     <input type="hidden" name="package_id" value="<?php echo $package_id ; ?>" />
	 <input type="hidden" name="user_id" value="<?php echo $user_id ; ?>" />
	 <input type="hidden" name="price" value="<?php echo $price ; ?>" />

	   <section class="content">
        <div id="package">			
			<div class="row">
     <div class="col-md-8 col-sm-8 col-xs-12">   
       <div class="col-md-6 col-sm-6 col-xs-12">
     <div class="form-group">
      <label>Card Number.</label>
      <input type="text" name="" class="form-control" />
     </div>
     </div>
       <div class="col-md-6 col-sm-6 col-xs-12">
     <div class="form-group">
      <label>Card Type</label>
      <select class="form-control">
      <option>-Select-</option>
      <option>Visa</option>
      <option>Discover</option>
      <option>Master Card</option>
      <option>American Express</option>
      <option>Credit Card</option>
      <option>PayPal</option>
      </select>
       </div>
     </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="row" style="margin:0px">
	  <label>Expiration Date.</label>
	  </div>
	  <div class="row">
	  <div class="col-md-6 col-sm-6 col-xs-6">
	  <select class="form-control">
	  <option>-Select Mounth-</option>
      <option>Visa</option>
      </select></div>
	   <div class="col-md-6 col-sm-6 col-xs-6">
	  <select class="form-control">
      <option>-Select Year-</option>
      <option>Visa</option>
       </select>
	   </div>
	   </div>

     </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
     <div class="form-group">
      <label>Security Code.</label>
      <input type="password" name="" class="form-control" />
     </div>
     </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="form-group">
      <label>Address</label>
	  <textarea name="" class="form-control"></textarea>
     </div>
     </div>
     
      <div class="col-md-6 col-sm-6 col-xs-12">
     <div class="form-group">
      <label>City</label>
      <input type="text" name="" class="form-control" />
     </div>
     </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
     <div class="form-group">
      <label>Zip Postal Code</label>
      <input type="text" name="" class="form-control" />
     </div>
     </div>
      
      <div class="col-md-6 col-sm-6 col-xs-12">
     <div class="form-group">
      <label>State</label>
      <input type="text" name="" class="form-control" />
     </div>
     </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
     <div class="form-group">
      <label>Country</label>
      <input type="text" name="" class="form-control" />
     </div>
     </div>
     <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="form-group ">
     <button type="submit" class="btn btn-default pull-right" style="background:#000; color:#fff" > Submit</button>
     </div>
     </div>
     
     
     </div>
     <div class="col-md-4 col-sm-4 col-xs-12" style="padding-top:27px">
   
     <div class="col-md-2 col-sm-4 col-xs-4"><img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/visa-card.png" class="img-resposive" /></div>
     <div class="col-md-2 col-sm-4 col-xs-4"><img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/master-card.png" class="img-resposive" /></div>
     <div class="col-md-2 col-sm-4 col-xs-4"><img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/mastro-card.png" class="img-resposive" /></div>
     <div class="col-md-2 col-sm-4 col-xs-4"><img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/amrcan-card.png" class="img-resposive" /></div>
     <div class="col-md-2 col-sm-4 col-xs-4"><img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/discover-card.png" class="img-resposive" /></div>
     <div class="col-md-2 col-sm-4 col-xs-4"><img src="<?php echo FRONT_END_LAYOUT ?>/assets/img/paypal.png" class="img-resposive" /></div>
   
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