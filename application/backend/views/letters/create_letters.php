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
<form class="form-horizontal form-material" method="post" enctype="multipart/form-data" action="<?php echo BASEURL ; ?>/letters/save">
                            <div class="row p-15 m-0">

								

                                 <div class="col-sm-12">
                                     <div class="form-group ">
                                        <label class="control-label">Description</label>
                                         <input id="firstName" class="form-control" name="description" placeholder="March Invoice" type="text">
                                       </div> 
                                    </div>  
                               <div class="col-sm-6">
                                   <div class="row">                                    
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label class="control-label">TO *</label>
                                      <select class="form-control changeAdress"  id="To">
                                         <option value="createAddress">+ Create New Address</option>
                                         <?php
											foreach($listAddress as $cnty_id1 =>$cnty_val1):
												//~ $selected = ($cnty_id1==@$addressbook["state"])? "selected":"";
										  ?>
											<option <?php echo $selected;?> value="<?php echo $cnty_val1["id"];?>"><?php echo $cnty_val1["name"];?></option>
										  <?php endforeach;?>
                                        </select>
                                   </div>                                     
                                 </div>    
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
                                <div class="col-sm-6">
                                    <div class="row">                                      
                                         
                                  <div class="col-sm-12">
                                    <div class="form-group ">
                                      <label class="control-label">FROM *</label>
                                      <select class="form-control changeAdress" id="From">
                                         <option value="createAddress">+ Create New Address</option>
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
                                    
                                </div></div>
                                  <div class="col-sm-6 m-auto">
                                   <div class="form-group">                                    
                                     <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Front *</h4>
                                            <label for="input-file-now">* Try some test files?</label>
                                            <input type="file" name="file"/>
<!--
                                            <div class="dropify-wrapper"><div class="dropify-message"><span class="fas fa-cloud-upload-alt"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input id="input-file-now" class="dropify" type="file"><button type="button" class="dropify-clear">Remove</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="fas fa-cloud-upload-alt"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
-->
                                        </div>
                                    </div>
                                   </div>
                                       </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-12">
                                  <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light mb-3" style="float:right; margin: -9px -1px 0 0;"><i class="fa fa-save"></i> Save</button>
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
       
<script>
	$(document).ready(function(){
 $(".changeAdress").on("change",function(e){
	e.preventDefault();
	//~ alert($(this).val());
	//~ alert(this .id);
	var id = $(this).val();
	if(id=="createAddress"){
		if(confirm("Are sure you want to leave this page?")){
			window.location.href="<?php echo BASEURL ; ?>/addressbook/create_new";
		}else{
			return false;
		}
	}
	var addressType =this .id;
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
	
});
});

</script>
