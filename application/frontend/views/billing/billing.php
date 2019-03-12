        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Billing </h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Billing</li>
                            </ol>
                            <!--<a href="<?php echo BASEURL ; ?>/letters/create_letters" class="btn btn-info btn-rounded d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>-->
                        </div>
                    </div>
                </div> 
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                         <!--- Alert Boxes -->
                         	<?php $MSSG=array();if($this->session->flashdata('success')){
								 $MSSG["card"] = "success";$MSSG["MSSG"] =  $this->session->flashdata('success');
							 }
							 if($this->session->flashdata('error')){
								$MSSG["card"] = "danger";$MSSG["MSSG"] =  $this->session->flashdata('error');
							 }
							 if(!empty($MSSG)){
							 ?>	
                            <div class="alert alert-<?php echo @$MSSG["card"];?> alert-rounded"> <i class="ti-user"></i> <?php echo @$MSSG["MSSG"];?><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <?php }?>	
                            
                        <div class="card">
                           <!-- list Post Card -->
                            <div class="contact-page-aside" id="list_letter">                             
                                <!---- List postcard -->   
                               <div class="right-aside ">
                                    <div class="right-page-header">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-8 pr-0">
<!--
													<input id="max"/> 
													<input id="min"/> 
-->
                                                    <label class="date-range-label">DATE:</label>
                                                  <div class="input-daterange input-group" id="date-range">
                                                <input type="text" class="form-control date-range" id="datepicker_from" name="start" placeholder="Start date"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-info b-0 text-white">TO</span>
                                                </div>
                                                <input type="text" class="form-control" id="datepicker_to" name="end" placeholder="End date" />
                                            </div>
                                                </div>
                                             
                                                <div class="col-md-4 pl-0">  <button type="button" id="search-billing1" class="btn btn-info go-btn  waves-effect waves-light ">GO</button>
                                                <span class="btn waves-effect waves-light btn-secondary">Total Charges Due: $<?php echo number_format(@$TotalOfBillingCharges,2);?></span>
                                                <?php if(@$TotalOfBillingCharges!='0.00'){?>
                                                 <button type="button" class="btn btn-info pay-btn  waves-effect waves-light " data-toggle="modal" data-target="#paynow_modal" >Pay Now</button></div></div>
                                                 <?php } ?>
                                            </div>
<!--
                                          <div class="ml-auto">
                                                <input type="text" id="demo-input-search2" placeholder="search contacts" class="form-control"> </div>
                                        </div>
-->
                                    </div>
                                    <div class=" m-t-40">
										<form id="billing-form">
										<div class="row">
											<div class="col-sm-12 col-md-6">
												<div class="dataTables_length" id="billing-table_length">
													<label>Show entries
														<select name="item_per_page" aria-controls="billing-table" class="form-control form-control-sm">
<!--
															<option value="5">5</option>
-->
															<option value="10">10</option>
															<option value="25">25</option>
															<option value="50">50</option>
															<option value="100">100</option>
														</select>
													</label>
												</div>
											</div>
											<div class="col-sm-12 col-md-6">
												 <div id="billing-table_filter" class="dataTables_filter">
													<label>Select Type
														<select name="mail_type" aria-controls="billing-table" class="form-control form-control-sm">
															<option value="">All</option>
															<option value="postcard">Postcard</option>
															<option value="letter">Letter</option>
														</select>
													</label>
												 </div>
											</div>
										</div>
										</form>
                                   <div id="billing-table1"></div>
                                    
                                </div>
                                <!-- /.left-right-aside-column-->  
                                
                            </div>
                             
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                
                
                
                
             </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
     <style>
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
#payment-form .StripeElement {
  background-color: white;
  height: 40px;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

#payment-form  .StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

#payment-form .StripeElement--invalid {
  border-color: #fa755a;
}

#payment-form .StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}


	.pagination{
		margin:0;
		padding:0;
		float: right;
	}
	
     </style>
      <script src="https://js.stripe.com/v3/"></script>

<!-- Payment modal content -->
			<div id="paynow_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Pay Current Balance Due</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<form action="<?php echo BASEURL;?>/billing/stripe_payment" method="post" id="payment-form2">
						<input type="hidden" name="amount" value="<?php echo @$TotalOfBillingCharges;?>"/> 
							<div class="modal-body"  id="savedCard">
						 <div class="row">
									<div class="col-md-7">
									   <div class="form-group">
										<label class="control-label">Use Saved Card</label>
										<?php foreach($listCards as $Card){?>
										<div class="custom-control custom-radio">
											<input checked id="customRadio1" name="customer_id" class="custom-control-input" value="<?php echo $Card["customer_id"];?>" type="radio">
											<label class="custom-control-label" for="customRadio1">**********<?php echo $Card["last4"];?></label>
										</div>
										<?php } ?>
									</div>
									</div>
									<div class="col-md-5">
									   <button type="button" id="useNewCard" class="btn btn-info btn-crd btn-rounded waves-effect waves-light m-b-40">Use New Card</button>
									</div>
									</div>
							 </div>
								<div class="modal-footer">
								<button class="btn btn-info waves-effect waves-light"> Pay Now</button>
								</div>
						</form>
						<form action="<?php echo BASEURL;?>/billing/stripe_payment" method="post" id="payment-form">
							<input type="hidden" name="amount" value="<?php echo number_format(@$TotalOfBillingCharges,2);?>"/> 
						<div class="modal-body">
<!-------------------gurvinder --------------------->

							   
				<div class="row" id="customStripe">
							  <div class="">
								<label for="card-element">
								  Credit or debit card
								</label>
								<div id="card-element" style="width: 450px;">
								  <!-- A Stripe Element will be inserted here. -->
								</div>

								<!-- Used to display form errors. -->
								<div id="card-errors" role="alert"></div>
							  </div>

							  </div>
						
					 </div>
			
					 
<!-------------------gurvinder --------------------->

					<div class="modal-footer" >
<!--
						<span class="btn waves-effect waves-light">Total Charges Due: $<?php //echo @$TotalOfBillingCharges;?></span>
						<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
-->

						<button  id="useSaveCard" type="button" class="btn btn-info waves-effect waves-light">Use Saved Card</button>
						<button class="btn btn-info waves-effect waves-light"> Pay Now</button>
						</div>
							</form>
					</div>
				</div>
			</div>
                                <!-- /.modal -->
                                
<script>
$(document).ready(function(){
		filterRecords(1);
		$('#billing-form select').change(function(){
			  filterRecords(1);
		});
		$('#search-billing1').click(function(){
			  filterRecords(1);
		});
$(document).on("click",".pagination a",function(e){
	   e.preventDefault();
	   var uri = $(this).attr("href");
	   var page = uri.match(/\?page\=(\d*)/)[1];
	   filterRecords(page)
	   return false;
	   });
});
function filterRecords(page){
	var billingform = $('#billing-form').serialize();
	var datepicker_from = $('#datepicker_from').val();
	var datepicker_to = $('#datepicker_to').val();
	if(datepicker_from. length==9 ){ datepicker_from = '0'+datepicker_from;	}
    if(datepicker_to. length==9 ){ datepicker_to = '0'+datepicker_to;}
	$.ajax({
	   type: "POST",
	   url: "<?php echo BASEURL;?>/billing/list_billing",
	   data:billingform+"&current_page="+page+"&date_from="+datepicker_from+"&date_to="+datepicker_to,
	   beforeSend:function(){
			$("#billing-table1").html("<h2 class='text-center'><i class='fas fa-spinner fa-spin'></i> Loading...</h2>")
		},
	   success: function(res){
		  $("#billing-table1").html(res);
		}
	   });
}
</script>
<script>
// Create a Stripe client.
//~ var stripe = Stripe('pk_test_mxNbl6dGKLesSLILs8uSCm25');
// Create a Stripe client.

//~ var stripe = Stripe('pk_test_59ARytqgQjfjhsjdRrJMAoyC');
var stripe = Stripe('<?php echo getConfigSettingVariable("stripe_pk_key");?>');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
//~ $("#customStripe").hide();

//~ $("#useNewCard").click(function(e){
	//~ $("#customStripe").hide();
	//~ $("#useSaveCard").show();
//~ });
$("#useNewCard").click(function(e){
	$("#payment-form2").hide();
	$("#payment-form").show();
});
$("#useSaveCard").click(function(e){
	$("#payment-form").hide();
	$("#payment-form2").show();
	//~ $("#useSaveCard").hide();
});
//~ alert($("#payment-form").length);
$("#payment-form").hide();
</script>
