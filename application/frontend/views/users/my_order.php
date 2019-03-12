<div class="address">
 <div class="container"> 
 <div class="">
     <div class="col-sm-12 track">
     <div style="margin:auto;" class="track">
		 <form name="order"  id="form_track_order" action="<?php echo BASEURL ?>/users/myorder" method="post">
			 <h3 style="text-align:center">Track your order </h3>   
			 <p>To track order please enter your details below</p>
			 
			 
			 <div class="col-sm-12 track">
				 
			 <div class="form-group track">
			  
			  <input type="text"  name="email" placeholder="EMAIL *" class="form-control">
			 </div>
		   </div>
			 
			 <div class="col-sm-12 track">
			 <div class="form-group track">
			 
			  <input type="text" name="order_id" placeholder="ORDER ID  *" class="form-control">
			 </div>
		   </div>
			 <button class="btn btn-danger" type="submit">Track Order </button>
			 
			 </div>
			 
		 </form><div id="validating" ></div>
     </div>
     </div>
  </div>
</div>
