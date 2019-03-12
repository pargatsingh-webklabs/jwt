<div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
        <div class=" pull-right" style="margin-top:-50px">
            <!--<button id="" class="btn green">
                Add New <i class="fa fa-plus"></i>
            </button> -->
			<a href="<?php echo BASEURL ?>/users" class="btn green">Go back to users list</a>
	<div class="clearfix"></div>
        </div>
        <form method='post'  action='<?php echo BASEURL; ?>/users/get_view_form_replacement/<?php echo $recored_id ; ?>/<?php echo $ID ; ?>' id="update_replacement_form" name="update_replacement_form"  >
        
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class=" box light-grey">
            <div class="portlet-body">
<!--  --------------------------------------------BROKER'S DETAILS STARTS--------------------------------------------- -->	<div class="row">
		<div class="col-md-12">
		  <h3 class="text-center"><strong style="color:#005488;">Broker's Details</strong></h3>
		  <hr/>
		</div>
		
 <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Brokerage Name</strong></label>
                <input type="text" name="brokerage_name" id="brokerage_name" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['brokerage_name'] ;   ?>"   />
			</div>
		</div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Brokerage Address</strong></label>
                <input type="text" name="brokerage_address" id="brokerage_address" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['brokerage_address'] ;   ?>"   />
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Brokers Name</strong></label>
                <input type="text" name="broker_name" id="broker_name" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['broker_name'] ;   ?>"   />
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Brokers Email</strong></label>
                <input type="text" name="broker_email" id="broker_email" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['broker_email'] ;   ?>"   />
			</div>
		  </div>		
			 </div>
			 <div class="row">
			  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Brokers Phone</strong></label>
                <input type="text" name="broker_phone" id="broker_phone" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['broker_phone'] ;   ?>"   />
			</div>
		  </div>
		  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
             <label><strong>Brokers License Number</strong></label>
                <input type="text" name="broker_license_number" id="broker_license_number" class="form-control " value="<?php  if(!empty($request_form_data)) echo $request_form_data['broker_license_number'] ;   ?>"  />
			</div>
		  </div>

			 </div>
<!--  --------------------------------------------BROKER'S DETAILS ENDS--------------------------------------------- -->

             <div class="row">
		<div class="col-md-12">
	
		  <h3 class="text-center"><strong style="color:#005488;">Escrow Officer's Details</strong></h3>
		  <hr/>
		</div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Escrow Company Address</strong></label>
                <input type="text" name="escrow_company_address" id="escrow_company_address" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['escrow_company_address'] ;   ?>"   />
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Escrow City</strong></label>
                <input type="text" name="escrow_city" id="escrow_city" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['escrow_city'] ;   ?>"   />
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Escrow State</strong></label>
                <input type="text" name="escrow_state" id="escrow_state" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['escrow_state'] ;   ?>"   />
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Escrow Zipcode</strong></label>
                <input type="text" name="escrow_zipcode" id="escrow_zipcode" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['escrow_zipcode'] ;   ?>"   />
			</div>
		  </div>		  
         
      
			 </div>
			 <div class="row">
			  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Full Name of Escrow Officer</strong></label>
                <input type="text" name="escrow_officer" id="escrow_officer" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['escrow_officer'] ;   ?>"   />
			</div>
		  </div>
		  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
             <label><strong>Escrow File Number</strong></label>
                <input type="text" name="escrow_file_number" id="escrow_file_number" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['escrow_file_number'] ;   ?>"  />
			</div>
		  </div>
		  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Escrow Office Phone Number</strong></label>
                <input type="text" name="escrow_officer_phone" id="escrow_officer_phone" class="form-control usphonenumber" value="<?php  if(!empty($request_form_data)) echo $request_form_data['escrow_officer_phone'] ;   ?>"  />
			</div>
		  </div>
		  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Escrow Officer Email</strong></label>
                <input type="email" name="escrow_officer_email" id="escrow_officer_email" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['escrow_officer_email'] ;   ?>" />
			</div>
		  </div>
			 </div>

 
 
              <div class="row">
		<div class="col-md-12">

		  <h3 class="text-center"><strong style="color:#005488;">Form Details</strong></h3>
		  <hr/>
		</div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Closing to be replaced Address</strong></label>
                <textarea name="replaced_address" id="replaced_address" class="form-control"><?php  if(!empty($request_form_data)) echo $request_form_data['replaced_address'] ;?></textarea>
			</div>
		  </div>
		  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Escrow number</strong></label>
                <input type="text" name="escrow_number" id="escrow_number" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['escrow_number']   ?>" />
			</div>
		  </div>
		  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Property Address</strong></label>
                <input type="text" name="property_address" id="property_address" class="form-control"  value="<?php  if(!empty($request_form_data)) echo $request_form_data['property_address'] ;   ?>"  />
			</div>
		  </div>
		  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>City</strong></label>
                <input type="text" name="city" id="city" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['city'] ;   ?>"  />
			</div>
		  </div>
		  
      
			 </div>
        <div class="row">
<div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>State</strong></label>
                <input type="text" name="state" id="state" class="form-control" value="<?php  if(!empty($request_form_data)) echo $request_form_data['state'] ;   ?>"  />
			</div>
		  </div>
		  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Zipcode</strong></label>
                <input type="text" name="zipcode" id="zipcode" class="form-control"  value="<?php  if(!empty($request_form_data)) echo $request_form_data['zipcode'] ;   ?>"  />
			</div>
		  </div>		  
		  
		  <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Sales Price</strong></label>
                <input type="text" name="sales_price" id="sales_price" class="form-control money" 
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['sales_price']   ?>"/>
			</div>
		  </div>		
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Is this a short sale? Y / N</strong></label>
              <input type="text" name="optradio" id="optradio" class="form-control" 
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['short_sale']   ?>"/>
			</div>
		  </div>
          		  
		</div>
         <div class="row">
		 <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Close Date</strong></label>
              <input type="text" name="close_date" id="close_date" class="form-control" 
                value="<?php  if(!empty($request_form_data)) echo date('m/d/Y',$request_form_data['close_date'])   ?>"/>
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>When does due dilligence expire ?</strong></label>
              <input type="text" name="dilligence_expire" id="dilligence_expire" class="form-control" 
                value="<?php  if(!empty($request_form_data)) echo date('m/d/Y',$request_form_data['dilligence_expire'])   ?>"/>
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Has the  Apprasial contingency been sastified ? Y / N</strong></label>
              <input type="text" name="contingency_sastified" id="contingency_sastified" class="form-control" 
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['contingency_sastified']   ?>"/>
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Amount requested</strong></label>
              <input type="text" name="amount_requested" id="amount_requested" class="form-control money" 
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['amount_requested']   ?>"/>
			</div>
		  </div>
          		  
		</div>
         <div class="row">
<div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Fees</strong></label>
              <input type="text" name="display_fees" id="display_fees" class="form-control money" 
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['amount_requested']   ?>"/>
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Total for repayment</strong></label>
              <input type="text" name="total_repayment" id="total_repayment" class="form-control money" 
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['total_repayment']   ?>"/>
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Which side do you represent ? Buyer or Seller ?</strong></label>
              <input type="text" name="represent_as" id="represent_as" class="form-control" 
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['represent_as']   ?>"/>
			</div>
		  </div>		 
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Sellers Name</strong></label>
              <input type="text" name="sellers_name" id="sellers_name" class="form-control" 
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['sellers_name']   ?>"/>
			</div>
		  </div>
          
		  
		</div> 
		<div class="row">
		<div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Buyers Name</strong></label>
              <input type="text" name="buyers_name" id="buyers_name" class="form-control"
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['buyers_name']   ?>"/>
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Total Amount Requested</strong></label>
              <input type="text" name="total_amount_requested" id="total_amount_requested money" class="form-control" 
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['amount_requested']   ?>"/>
			</div>
		  </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
		    <div class="form-group">
			 <label><strong>Closing Company Name</strong></label>
              <input type="text" name="closing_company_name" id="closing_company_name" class="form-control" 
                value="<?php  if(!empty($request_form_data)) echo $request_form_data['closing_company_name']   ?>"/>
			</div>
		  </div>		  
		</div>
		<div id="loader" class="text-center" ></div>
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group pull-right" >
				
			<button type="submit" class="btn green"><i class="fa fa-send"></i> Confirm Details</button>
           <a href="<?php echo BASEURL; ?>/cms" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>	    
		</div>
	</div>
            </div>
        </div>
        </form>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
