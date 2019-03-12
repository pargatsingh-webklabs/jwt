<style>
.error{
  color: red !important;
}
.sendmail{
  margin-left: 235px;
  color: red;
}
</style>  

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
                        <h4 class="text-themecolor">Contact Us</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Contact Us</li>
                            </ol>
                           <!-- <button type="button" class="btn btn-info btn-rounded d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>-->
                        </div>
                    </div>
                </div>
                <?php  if(@$msg){  ?>
                 <div class="row ">
                    <div class="col-md-10 align-self-center">
                        <h4 class="text-themecolor" style="color:green;"><?php  echo $msg;  ?></h4>
                    </div>
                </div>
                <?php  } ?>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">						   
                        <div class="card">
                            <div class="contact-page-aside" id="create_postcard">
                            
           <div class=" col-sm-12 col-md-10 offset-sm-1 offset-md-1">
			   <div id="sendmailresponse" class="text-center col-md-12" style="color: #0d780d">
					<?php $MSSG=array();if($this->session->flashdata('success')){
						 $MSSG["MSSG"] =  $this->session->flashdata('success');
					 }
					 if($this->session->flashdata('error')){
						$MSSG["MSSG"] =  $this->session->flashdata('error');
					 }
					 if(!empty($MSSG)){
					 echo @$MSSG["MSSG"];
					 }?>
			   </div>
			    <div class="row p-15 m-0">
					<div class="col-12 text-center mt-3">
					 <H2>Have a question?  Need help with a file format?</H2>
						<p>Please use the form below and we will respond to you shortly. </p>
					</div>
				 </div>
            </div>
           <div class=" col-sm-10 col-md-6 offset-sm-1 offset-md-3">
                           
                                <form enctype="multipart/form-data" action="<?php echo base_url().'/contactus/insert_contactus'  ?>" id="contact_form" name="contactusform" method="post" class="form">
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-4 col-form-label">Regarding *</label>
                                        <div class="col-4">
                                            <div class="custom-control custom-radio">
												<input id="customRadio1" checked="" name="inquiry" value="General Inquiry" class="custom-control-input" type="radio">
												<label class="custom-control-label" for="customRadio1">General Inquiry </label>
											</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="custom-control custom-radio">
												<input id="customRadio2" checked="" name="inquiry" value="Technical Support" class="custom-control-input"  type="radio">
												<label class="custom-control-label" for="customRadio2">Technical Support </label>
											</div>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="name-input" class="col-4 col-form-label">Name *</label>
                                        <div class="col-8">
                                            <input class="form-control blankerror" name="name" id="name" value="" type="text" placeholder="Larry Lobster">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email-input" class="col-4 col-form-label">Email *</label>
                                        <div class="col-8">
                                            <input class="form-control blankerror" name="email" id="email" value="" type="email" placeholder="your@email.com">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="comments-input" class="col-4 col-form-label">Comments *</label>
                                        <div class="col-8">
                                            <textarea class="form-control blankerror" name="comments" id="comments" value=""  placeholder="Message Here"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="attachment-input" class="col-4 col-form-label">Attachment</label>
                                        <div class="col-8">
                                            <input class="form-control" name="attachment" id="attachment" type="file" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
										
										 <div class="col-md-6">
											<p class="error" id="error_fields" style="display:none;">Fields Are Required</p>
										 </div>
										
                                        <label for="comments-input" class="col-4 col-form-label"></label>
                                        <div class="col-8">
                                             <button type="submit" name="submit_c" id="submit_c" class="btn btn-success float-right"><i class="far fa-save" style=""></i> Submit</button>
                                        </div>
                                      
                                    </div>                                  
                                    
                                </form>                                
                               <div id="sendingmail" class="sendmail"></div> 
                               
                           </div>
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
            <script src="https://sendtail.com/application/frontend/layout/basic/assets/js/bootstrap.min.js"></script>	
    <script src="https://sendtail.com/application/frontend/layout/basic/assets/js/formValidation.js"></script>
    <script type="text/javascript" src="https://sendtail.com/application/frontend/layout/basic/assets/js/bootstrap.js"></script>    
<script>
	$(document).ready(function(){
		
		
		 $('#contact_form')
            .formValidation({
				//~ framework: 'bootstrap',
				//~ excluded: [':disabled'],
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Name can\'t be empty'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email can\'t be empty'
                            }
                        }
                    },
                    comments: {
                        validators: {
                            notEmpty: {
                                message: 'Comments can\'t be empty'
                            }
                        }
                    }
                }
            })
 
            .on('success.form.fv', function (e) {
				//~ return true;
				
				$("#submit_c").trigger('click');
                //~ $("#validating").html('<i class="fa fa-circle-o-notch fa-spin fa-3x" aria-hidden="true" style="color:#02bdd5"></i>');
                //~ e.preventDefault();
                //~ var $form = $(e.target);
                //~ var bv = $form.data('formValidation');
				//~ $("#sendingmail").html("Sending mail.....");
				//~ $("#sendmailresponse").html('');
                //~ // Use Ajax to submit form data
                //~ $.post($form.attr('action'), $form.serialize(), function (result) {
					//~ // console.log(result);
					//~ if (result.success) {
						 //~ $("#sendingmail").html('');
						 //~ $("#sendmailresponse").css({'color': '#0d780d','font-size': '17px'});
						 //~ $("#sendmailresponse").html(result.message);
                        //~ // window.location.reload();
                        //~ // window.location.href = BASEURL + '/contactus';  
                    //~ }else{
						//~ $("#sendmailresponse").css({'color': '#f25947','font-size': '17px'});
						 //~ $("#sendmailresponse").html(result.message);
					//~ }
                //~ },'json');
            });
		
		 //~ $("#submit_c").click(function(){
		 //~ var name =  $("#name").val();
		 //~ var email =  $("#email").val();
		 //~ var comments =  $("#comments").val();
		 //~ if(name=='' || email=='' || comments==''){
			  //~ $(".blankerror").addClass("error");
			  //~ $("#error_fields").css("display", "block");
			  //~ return false;
		 //~ }
		 
			//~ }); 
		
		
jQuery(function ($) {
    var $inputs = $('input[name=front_file_name],input[name=url_front_file_name]');
    $inputs.on('input', function () {
        // Set the required property of the other input to false if this input is not empty.
         $("#selected_front").html(baseName($(this).val()));
        //~ $inputs.not(this).prop('required', !$(this).val().length);
    });
    var $inputs2 = $('input[name=back_file_name],input[name=url_back_file_name]');
    $inputs2.on('input', function () {
        // Set the required property of the other input to false if this input is not empty.
         $("#selected_back").html(baseName($(this).val()));
         //~ $inputs2.not(this).val('');
        //~ $inputs2.not(this).prop('required', !$(this).val().length);
    });
});
 $("#download_link_back_template").on("click",function(e){
	var download_link_back_template = $(".custom-radio input[name=size]:checked").attr("download_link");
	window.open(download_link_back_template,"_blank");
});
 $(".changeAdress").on("change",function(e){
	e.preventDefault();
	//~ alert($(this).val());
	//~ alert(this .id);
	var id = $(this).val();
	if(id==""){submit_c
		if(confirm("Are sure you want to leave this page?")){
			window.location.href="<?php echo BASEURL ; ?>/addressbook/create_new";
		}else{
			return false;
		}
	}
	var hasGroup = $('option:selected', this).attr('hasGroup');
	if(hasGroup=='true'){
		$("#To_group_id").html('<input  class="form-control" name="To_group_id" value="'+id+'" type="text"/>');
	}else{
		var addressType =this .id;
		$("#"+addressType+"_group_id").html('');
		$.post("<?php echo BASEURL ; ?>/addressbook/getaddress",{"id":id},function(result){
			//~ console.log(result);
			$("input[name='"+addressType+"_name']").val(result.name);
			$("input[name='"+addressType+"_comapany']").val(result.comapany);
			$("input[name='"+addressType+"_addressline1']").val(result.addressline1);
			$("input[name='"+addressType+"_addressline2']").val(result.addressline2);
			$("input[name='"+addressType+"_city']").val(result.city);
			$("select[name='"+addressType+"_state']").val(result.state);
			$("input[name='"+addressType+"_zip']").val(result.zip);
			$("input[name='"+addressType+"_country']").val(result.country);
		},'json');
	}
});
});

</script>
<script src="https://js.stripe.com/v3/"></script>
<!--
 <script src="<?php echo FRONT_END_LAYOUT; ?>/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
-->
    <script>
    $(document).ready(function() {
		 $(document).on("submit","#form-postcards",function(e){
			$(".preloader .loader__label").html("We are sending your postcards now.<br>Please wait while we process your order. ");
			$(".preloader .loader__label").css({'font-size':'1.675em','letter-spacing':'0.1em','text-align':'center'});
			$(".preloader").css('display','block');
		});
        $('.SaveCardFirst').on("click",function(){
			$("#SaveCardFirstModal").modal('show');

		});
        // Basic
        //~ $('.dropify').dropify();

        //~ // Translated
        //~ $('.dropify-fr').dropify({
            //~ messages: {
                //~ default: 'Glissez-déposez un fichier ici ou cliquez',
                //~ replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                //~ remove: 'Supprimer',
                //~ error: 'Désolé, le fichier trop volumineux'
            //~ }
        //~ });

        //~ // Used events
        //~ var drEvent = $('#input-file-events').dropify();

        //~ drEvent.on('dropify.beforeClear', function(event, element) {
            //~ return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        //~ });

        //~ drEvent.on('dropify.afterClear', function(event, element) {
            //~ alert('File deleted');
        //~ });

        //~ drEvent.on('dropify.errors', function(event, element) {
            //~ console.log('Has Errors');
        //~ });

        //~ var drDestroy = $('#input-file-to-destroy').dropify();
        //~ drDestroy = drDestroy.data('dropify')
        //~ $('#toggleDropify').on('click', function(e) {
            //~ e.preventDefault();
            //~ if (drDestroy.isDropified()) {
                //~ drDestroy.destroy();
            //~ } else {
                //~ drDestroy.init();
            //~ }
        //~ })
    });
    </script>

  <div id="SaveCardFirstModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">In order to Add a Postcard to the Live Queue, please put a payment method on file:</h6>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
					<form action="<?php echo BASEURL ; ?>/users/saveUserCard" method="post" id="payment-form">
					<input name="redirect_url" type="hidden" value="postcard/create_post"/>
				<div class="modal-body" id="responseSaveCardFirstModal">
						<div class="form-row">
							<label for="card-element">
							Enter Card Details
							</label>
						</div>
						<div class="form-row">
							<div id="card-element">
							  <!-- A Stripe Element will be inserted here. -->
							</div>
						</div>
						<div class="form-row">
						<!-- Used to display form errors. -->
						<div id="card-errors" role="alert"></div>
					  </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

					<button type="submit" class="SaveCardBtn btn btn-success waves-effect waves-light">Save Card</button>

				</div>
				</form>
			</div>
		</div>
	</div>
	

<script>	
	
	
	
var stripe = Stripe('<?php echo getConfigSettingVariable("stripe_pk_key");?>');
//~ var stripe = Stripe('pk_test_59ARytqgQjfjhsjdRrJMAoyC');
var elements = stripe.elements();
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
$(".SaveCardBtn").attr("disabled","disabled");
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
      
$(".SaveCardBtn").attr("disabled",false);
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
</script>
