<style>   
.file-upload label.dashboard-control-label {
	font-size: 12px;
	letter-spacing: 0px;
	font-weight: 700;
	font-family: Lato,"Helvetica Neue",Helvetica,Arial,sans-serif;
	text-transform: uppercase;
}
.file-upload.portrait {
	height: 370px;
	padding-top: 100px;
}
	.file-upload {
	position: relative;
	border: 1px solid #d5d5d5;
}
	.file-upload .file-container {
	cursor: pointer;
	position: relative;
	text-overflow: ellipsis;
	overflow: hidden;
}
	.file-upload .file-container input[type="file"] {
	cursor: pointer;
	padding-left: 200%;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	margin: 0;
	width: 100%;
	opacity: 0;
}
	
	.file-upload input[type="text"] {
	margin: 8px 0;
	text-align: center;
}
	.file-upload div {
	width: 250px;
	margin-right: auto;
	margin-left: auto;
	height: 38px;
	text-align: center;
	line-height: 27px;
	margin-top: 15px;
}
	.file-upload .dashboard-control-label {
	margin: 5px 4px 0;
	max-width: 100%;
	font-weight: normal;
	font-size: 12px;
}
	.file-upload span {
	font-size: 12px;
	position: absolute;
	bottom: 0px;
	right: 5px;
}
#selected_back {
    position: relative;
    text-transform: uppercase;
    padding-left: 2px;
}	


	.btn-blue-inverse {
	color: #176992;
	background-color: transparent;
	border-color: #176992;
}
	.form-control.input-sm.ng-pristine.ng-untouched.ng-empty.ng-invalid.ng-invalid-required {
	display: block;
	width: 100%;
	/* height: 35px !important; */
	padding: 5px 10px;
	font-size: 12px;
	font-weight: 300;
	color: #555;
	background-color: #fff;
	border: 1px solid #ccc;
	border-radius: 2px;
	-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	-webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	-moz-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	box-shadow: none !important;
	line-height: 27px !important;
	min-height: 35px !important;
	margin-bottom:  !important;
}
.file-container.btn.btn-blue-inverse.btn-sm:hover {
	color: #fff;
	background-color: #176992;
	border-color: #176992;
}
.StripeElement {
	width: 477px !important;
  background-color: white;
  height: 40px;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}


.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
.file-upload div {
    width: 201px;
    height: 29px;
    text-align: center;
    line-height: 18px;
    margin-top: 15px;
    font-weight: 600;
}
.file-upload.portrait {
    height: 277px;
    padding-top: 79px;
  
}
.border_clr.CHANGE_ENVIRONMENT {
    border: 2px solid #4cbd83;
}
.border_clr.CHANGE_ENVIRONMENT:hover{
 border: 2px solid #4cbd83;
}

.dropbtn {
    width: 26%;
    text-align: center;
    border-radius: 3px;
    background-color: #fff;
    padding: 8px 10px 8px 10px;
    width: 173px;
    white-space: nowrap;
    overflow: hidden;
    text-transform: uppercase;
    font-size: 12px;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
	display: none;
	position: absolute;
	background-color: #f1f1f1;
	min-width: 160px;
	box-shadow: none;
	z-index: 1;
	width: 26%;
	text-align: center;
	border-radius: 3px;
	background-color: #fff;
	width: 173px;
	white-space: nowrap;
	overflow: hidden;
	text-transform: uppercase;
	font-size: 12px;
	margin-top: .5px;
	padding: 8px 10px 8px 10px;
}

.dropdown-content a {
	color: black;
	text-decoration: none;
	display: block;
	background: #fff !important;
	margin-left: -18px;
}
.dropdown .caret {
	margin-left: 8px;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

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
                        <h4 class="text-themecolor">Create Letter</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Create Letter</li>
                            </ol>
                           <!-- <button type="button" class="btn btn-info btn-rounded d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>-->
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
						<div class="card">
							<div class="col-4">
								<?php 	$userdata=$this->session->userdata("userdata");
											if($userdata["lob_api_mode"]==="live"){
												$dropdwn_text = "live";
												$dropdwn_element_text = "test";
												$dropdwn_element_id = "test";
												$dropdwn_color = "green-col";
												$dropdwn_element_color = "yellow-col";
												}else{
												$dropdwn_text = "test";
												$dropdwn_element_text = "live";
												$dropdwn_element_id = "live";
												$dropdwn_color = "yellow-col";
												$dropdwn_element_color = "green-col";
												}
												?>
										<div class="dropdown">
										  <button class="dropbtn <?php echo @$dropdwn_color;?>"><?php echo @$dropdwn_text;?> Environment
											<span class="caret"></span><i class="fas fa-caret-down"></i></button>
										  <div class="dropdown-content <?php echo @$dropdwn_element_color;?> ">
											<a id="<?php echo @$dropdwn_element_id;?>" class="CHANGE_ENVIRONMENT" href="javascript:void();"><?php echo @$dropdwn_element_text;?> Environment </a>
										  </div>
										</div>		
						
<!--
							<select class="form-control btn-default border_clr CHANGE_ENVIRONMENT">
								<option <?php echo $Lob_test;?> value="test">TEST ENVIRONMENT</option>
								<option  <?php echo $Lob_live;?> value="live">LIVE ENVIRONMENT</option>
							</select>
-->
						</div>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-12">
							<?php if(@$this->session->flashdata('To_selectContact')) $To_selectContact = $this->session->flashdata('To_selectContact');if(@$this->session->flashdata('From_selectContact')) $From_selectContact = $this->session->flashdata('From_selectContact'); $MSSG=array();if($this->session->flashdata('success')){
								 $MSSG["card"] = "success";$MSSG["MSSG"] =  $this->session->flashdata('success');
							 }
							 if(@$this->session->flashdata('color')) {
								$color = $this->session->flashdata('color');
								if($color=='true') $color = 'checked';
								if($color=='false')$blackwhite = 'checked';
						   	}else{
								$blackwhite = 'checked';
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
                            <div class="contact-page-aside" id="create_postcard">
                             <!--  <div class="col-sm-12 list-page-header p-t-20">
                                        <div class="d-flex text-center">
                                          <div class="alert alert-info fade in alert-dismissible show m-auto">
                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true" style="font-size:20px">×</span>
                                              </button>    You are in <STRONG>TEST</STRONG> mode, your postcard will not actually be sent.
                                            </div>
                                        </div>
                                </div>-->
<form class="form-horizontal form-material" id="form-letters" method="post" enctype="multipart/form-data" action="<?php echo BASEURL ; ?>/letters/save">
                            <div class="row p-15 m-0">

								

                                 <div class="col-sm-12">
                                     <div class="form-group ">
                                        <label class="control-label">Description</label>
                                         <input id="firstName" class="form-control" name="description"  value='<?php echo @$this->session->flashdata('description');?>' placeholder="" type="text">
                                       </div> 
                                    </div>  
                               <div class="col-sm-6">
                                   <div class="row">                                    
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label class="control-label">TO *</label>
                                      <select class="select2 form-control changeAdress" name="To_selectContact" required id="To">
                                         <option value="">Select Recipient Contact(s)</option>
                                         <?php if(!empty($listAddress) && count($listAddress)>1){?>
                                         <option hasGroup="true" value="all">All</option>
                                          <?php }
											foreach($listGroups as $listGroupKey =>$listGroupVal):
											?>
												<option <?php echo $selected;?> hasGroup="true" value="<?php echo $listGroupVal["id"];?>"><?php echo $listGroupVal["group_name"];?></option>
										  <?php endforeach;?>
                                         <?php
											foreach($listAddress as $cnty_id1 =>$cnty_val1):
												//~ $selected = ($cnty_id1==@$addressbook["state"])? "selected":"";
										  ?>
											<option <?php echo $selected;?> hasGroup="false"  value="<?php echo $cnty_val1["id"];?>"><?php echo $cnty_val1["name"];?></option>
										  <?php endforeach;?>
                                        </select>
                                   </div>                                     
                                 </div>
                  <div style="display:none;">
					  <div id="To_group_id"></div>
					              <div class="col-sm-6">
                                   <div class="form-group "> 
                                      <input  class="form-control" name="To_name" placeholder="Name" type="text">
                                   </div>
                                    </div>    
                                  <div class="col-sm-6">
                                         <div class="form-group">                                    
                                      <input  class="form-control" name="To_comapany" placeholder="Company" type="text">
                                   </div> 
                                 </div>    
                                  <div class="col-sm-12">  
                                   
                                   <div class="form-group">                                    
                                      <input  class="form-control" name="To_addressline1" placeholder="Address Line 1" type="text">
                                   </div>
                                      </div>    
                                  <div class="col-sm-12">
                                   <div class="form-group">                                    
                                      <input  class="form-control" name="To_addressline2" placeholder="Address Line 2" type="text">
                                   </div>
                                      </div>    
                                  <div class="col-sm-4">
                                    <div class="form-group 4">                                    
                                      <input  class="form-control" name="To_city" placeholder="City" type="text">
                                   </div>
                                      </div>    
                                  <div class="col-sm-4">
                                    <div class="form-group">                                    
                                       <select class="form-control" name="To_state">
                                         <option>Pick a State</option>
                                          <?php
											$countryArray = $this->config->item('countryArray');
											foreach($countryArray as $cnty_ids =>$cnty_vals):
												$selected = ($cnty_ids==@$addressbook["state"])? "selected":"";
										  ?>
											<option <?php echo $selected;?> value="<?php echo $cnty_ids;?>"><?php echo $cnty_vals;?></option>
										  <?php endforeach;?>
                                        </select>
                                   </div>
                                      </div>    
                                  <div class="col-sm-4">
                                    <div class="form-group">                                    
                                      <input  class="form-control" name="To_zip" placeholder="Zip Code" type="text">
                                   </div>
                                      </div>    
                                  <div class="col-sm-12">
                                   <div class="form-group ">
									   <input  class="form-control" name="To_country" placeholder="Country" type="text">                            
<!--
                                       <select class="form-control" name="To_country">
                                         <option>County</option>
                                        </select>
-->
                                   </div> 
                                      </div>    
                   </div>    
                                
                                   
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">                                      
                                         
                                  <div class="col-sm-12">
                                    <div class="form-group ">
                                      <label class="control-label">FROM *</label>
                                      <select class="select2 form-control changeAdress" name="From_selectContact" required id="From">
                                         <option value="">Select Sender Contact</option>
                                         <?php
											//~ $countryArray = $this->config->item('countryArray');
											foreach($listAddress as $cnty_idd =>$cnty_vald):
												//~ $selected = ($cnty_idd==@$addressbook["state"])? "selected":"";
										  ?>
											<option <?php echo $selected;?> value="<?php echo $cnty_vald["id"];?>"><?php echo $cnty_vald["name"];?></option>
										  <?php endforeach;?>
                                        </select>
                                   </div>
                                      </div>
                <div style="display:none;"> 
                                 <div class="col-sm-6">
                                   <div class="form-group "> 
                                      <input  class="form-control" name="From_name" placeholder="Name" type="text">
                                   </div>
                                    </div>    
                                  <div class="col-sm-6">
                                         <div class="form-group ">                                    
                                      <input  class="form-control" name="From_comapany" placeholder="Company" type="text">
                                   </div> 
                                 </div>    
                                  <div class="col-sm-12">  
                                   
                                   <div class="form-group">                                    
                                      <input  class="form-control" name="From_addressline1" placeholder="Address Line 1" type="text">
                                   </div>
                                      </div>    
                                  <div class="col-sm-12">
                                   <div class="form-group">                                    
                                      <input  class="form-control" name="From_addressline2" placeholder="Address Line 2" type="text">
                                   </div>
                                      </div>    
                                  <div class="col-sm-4">
                                    <div class="form-group 4">                                    
                                      <input  class="form-control" name="From_city" placeholder="City" type="text">
                                   </div>
                                      </div>    
                                  <div class="col-sm-4">
                                    <div class="form-group">                                    
                                       <select class="form-control" name="From_state">
                                         <option>Pick a State</option>
                                         <?php
                                         $countryArray = $this->config->item('countryArray');
											foreach($countryArray as $cnty_id =>$cnty_val):
												$selected = ($cnty_id==@$addressbook["state"])? "selected":"";
										  ?>
											<option <?php echo $selected;?> value="<?php echo $cnty_id;?>"><?php echo $cnty_val;?></option>
										  <?php endforeach;?>
                                        </select>
                                   </div>
                                      </div>    
                                  <div class="col-sm-4">
                                    <div class="form-group">                                    
                                      <input  class="form-control" name="From_zip" placeholder="Zip Code" type="text">
                                   </div>
                                      </div>    
                                  <div class="col-sm-12">
                                   <div class="form-group ">
									   <input  class="form-control" name="From_country" placeholder="Country" type="text"> 
<!--
                                       <select class="form-control" name="From_country">
                                         <option>County</option>
                                        </select>
-->
                                   </div> 
                                      </div>                                      
              </div>                                      
                                    
                                </div></div>
                                  <div class="col-sm-4 m-auto">
                                  
									  <div class="form-group file-centered">
              <label class="control-label dashboard-control-label" for="file">
                File<span class="required-asterisk">*</span>
              </label>
              <div class="file-upload portrait text-center">
                <div class="file-container btn btn-blue-inverse btn-sm">
                  <span id="selected_back">CHOOSE FILE </span>
                  <input name="file" id="letter-file" placeholder="or paste a direct URL" class="control-label" required="required" type="file">
                </div>
                 
               
                <!--
                <div>
                  <input name="direct_url" class="form-control input-sm ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"  placeholder="or paste a direct URL" required="required" type="text">
                </div>
                --><div>
                  <label class="dashboard-control-label dashboard-picker">
                    <input <?php echo $blackwhite;?> class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="color" value="false" type="radio"> Black &amp; White
                  </label>
                  <label class="dashboard-control-label dashboard-picker">
                    <input <?php echo $color;?> class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" name="color" value="true" type="radio"> Color
                  </label>
                  
                <!--
                  <label class="dashboard-control-label dashboard-picker">
                    <input checked name="double_sided" value="true" class="ng-pristine ng-untouched ng-valid ng-not-empty" type="checkbox"> Double-Sided
                  </label>
                  -->
                  <!--<label class="dashboard-control-label dashboard-picker">
                    <input name="address_placement" value="insert_blank_page" class="ng-pristine ng-untouched ng-valid ng-empty" type="checkbox"> Insert blank page first
                  </label>-->
                </div><!---->
                <span>
                  Your file must adhere to <a href="https://s3-us-west-2.amazonaws.com/lob-assets/letters-template.pdf" target="_blank">our template</a>.
                </span>
              </div>
            </div>
									  
									  
									  
									  
									  <!--arsh-->
								<!--	  <div class="form-group">                                    
                                     <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">File *</h4>
<!--
                                            <label for="input-file-now">* Try some test files?</label>
-->

<!--  <input type="file" name="file" required id="input-file-now" class="dropify" />
<!--
                                            <div class="dropify-wrapper"><div class="dropify-message"><span class="fas fa-cloud-upload-alt"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input id="input-file-now" class="dropify" name="file" type="file"><button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="fas fa-cloud-upload-alt"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
-->

                                       <!-- </div>
                                    </div>
                                   </div>-->
                                       </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-12">
										<?php $SavedCards = getSavedCardsOfUser();
										$userdata=$this->session->userdata("userdata");
										if($userdata["lob_api_mode"]==="live"){
											if(count($SavedCards)>0){
												echo '<button type="submit" class="btn btn-info btn-rounded waves-effect waves-light mb-3" style="float:right; margin: -9px -1px 0 0;"><i class="fa fa-save"></i> Add to Live Queue</button>';
											}else{
												echo '<button type="button" class="SaveCardFirst btn btn-info btn-rounded waves-effect waves-light mb-3" style="float:right; margin: -9px -1px 0 0;"><i class="fa fa-save"></i> Add to Live Queue </button>';
											}
										}else{
											echo '<button type="submit" class="btn btn-info btn-rounded waves-effect waves-light mb-3" style="float:right; margin: -9px -1px 0 0;"><i class="fa fa-save"></i> Add to Test Queue</button>';
										} 
										?>
											
											
                                 
                                </div> </div>
                           
                            </div> 
                                
                           </div> </form>                       
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
       <div id="demo-foo-row-toggler"></div>
<script>

	$(document).ready(function(){
jQuery(function ($) {
    var $inputs = $('input[name=file]');
    $inputs.on('input', function () {
		//~ alert(baseName($(this).val()));
		// Set the required property of the other input to false if this input is not empty.
		  $("#selected_back").html(baseName($(this).val()));
        //~ $inputs.not(this).val('');
        //~ $inputs.not(this).prop('required', !$(this).val().length);
    });
});
 $(".changeAdress").on("change",function(e){
	e.preventDefault();
	//~ alert($(this).val());
	//~ alert(this .id);
	var id = $(this).val();
	//if(id==""){
		//if(confirm("Are sure you want to leave this page?")){
			//window.location.href="<?php echo BASEURL ; ?>/addressbook/create_new";
		//}else{
			//return false;
		//}
	//~ }
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
<!--
<script src="<?php echo FRONT_END_LAYOUT; ?>/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
-->
<script src="https://js.stripe.com/v3/"></script>
    <script>
    $(document).ready(function() {
        // Basic
        
        $(document).on("submit","#form-letters",function(e){
			 //~ e.preventDefault();
			$(".preloader .loader__label").html("We are sending your letters now.<br/> Please wait while we process your order. ");
			$(".preloader .loader__label").css({'font-size':'1.675em','letter-spacing':'0.1em','text-align':'center'});
			$(".preloader").css('display','block');
		});
        $('.SaveCardFirst').on("click",function(){
			$("#SaveCardFirstModal").modal('show');

		});
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
					<h6 class="modal-title">In order to Add a Letter to the Live Queue, please put a payment method on file:</h6>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
					<form action="<?php echo BASEURL ; ?>/users/saveUserCard" method="post" id="payment-form">
					<input name="redirect_url" type="hidden" value="letters/create_letters"/>
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
