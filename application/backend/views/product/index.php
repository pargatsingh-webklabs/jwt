<style>
.disabledTab{
    pointer-events: none;
    cursor:not-allowed;
}
.fileText{
    position: relative;
    top: -25px;
    left: 97px;
}
#productForm input {
	border-radius: 0px !important;
	border: 0;
	border-bottom: 1px solid #ccc;
	width: 100%;
}
#productForm li{border:0px;}
#productForm strong {
	float: left;
	width: 100%;
}
#productForm span {
	float: left;
	width: 100%;
}
#productPrice {
	border: 0px !important;
}
#submitProduct {
	background: #337ab7;
	color: #fff;
	padding: 7px 20px;
	margin-top: 15px;
	display: inline-block;
	border: 1px solid #337ab7;
	border-radius: 3px;
}
#submitProduct:hover {
	background: #fff;
	color: #337ab7;
	border: 1px solid #337ab7;
	border-radius: 3px;
	text-decoration: none;
}
.add-btn a {
	background: #337ab7;
	color: #fff;
	padding: 7px 20px;
	margin-top: 15px;
	display: inline-block;
	border: 1px solid #337ab7;
	border-radius: 3px;
}
.add-btn a:hover {
	background: #fff;
	color: #337ab7;
	border: 1px solid #337ab7;
	border-radius: 3px;
	text-decoration: none;
}
</style>

<!--hidden inputs-->
<input type="hidden" class="form-control " id="product_id" name="id" value="<?php echo $row['id'];?>" />
<input type="hidden" class="form-control " id="OEM_offer_id"  />
<input type="hidden" class="form-control " id="paradise_offer_id"  />
<!--hidden inputs-->
<div class="container-fluid">
            <div class="block-header">
                <h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="float:left; width:100%">
                        <div class="header">
                            <h2 style="text-transform: uppercase;">
                                 <?php echo ucfirst($master_title); ?>
                                <!--<small>Basic example without any additional modification classes</small>-->
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body " style="float:left; width:100%">
                            <div class="col-12 custom-tabs">
                                <ul class="nav nav-tabs responsive " role="tablist">
                                    <li class="nav-item active">
                                        <a class="nav-link active" data-toggle="tab" href="#Product_tab" role="tab">Product</a>
                                    </li>
                                    <li class="nav-item nav-item2">
                                        <a class="nav-link nav-link2 <?php echo (!empty($row)) ? '' :'disabledTab' ?> " data-toggle="tab" href="#oem_tab" role="tab">OEM</a>
                                    </li>
                                    <li class="nav-item nav-item3">
                                        <a class="nav-link nav-link3 <?php echo (!empty($row)) ? '' :'disabledTab' ?>" data-toggle="tab" href="#paradise_tab" role="tab">Paradise</a>
                                    </li>
                                </ul><!-- Tab panes -->
                                
                                <div class="tab-content responsive">
                                    <div class="tab-pane  active" id="Product_tab" role="tabpanel">                                  
                                         <div class="col-12" style="float:left; width:100%">
                                             <h2>OEM Product Info</h2> </div>
<!--
                                             <h2 class="add-btn hide_tab"><a href="#" data-toggle="modal" data-target="#product_add"><?php echo ($row['id']) ? 'Edit' :'Add' ?></a></h2>
-->
                                          <div class="col-12" style="float:left; width:100%">
<!--
											  <ul class="product_info_li">
                                              <li><strong>Product Name :</strong> <span id="productName"><?php echo ($row['name']) ? $row['name'] :'-' ?></span></li>
                                             <li><strong>Model Number :</strong> <span id="productModel"><?php echo ($row['model']) ? $row['model'] :'-' ?></span></li>                                  
                                              <li><strong>Price :</strong> <span id="productPrice"><?php echo ($row['price']) ? $row['price'] :'-' ?></span></li>
                                            </ul>   
-->
											  
										<form id="productForm">
										   <ul class="product_info_li">
											  <li><strong>Product Name* :</strong> <span  ><input id="productName" name="name" type="text" placeholder="Enter product name" value="<?php echo $row['name'];?>"></span></li>
											  <li><strong>Model Number* :</strong> <span ><input id="productModel" name="model" type="text" placeholder="Enter product model" value="<?php echo $row['model'];?>"></span></li>
											  <li><strong>Price* :</strong> <span ><input id="productPrice" name="price" type="text" placeholder="Enter product price" value="<?php echo $row['price'];?>"></span></li>
										   </ul>
										   <div class="text-center error_msg" style="color:red;"></div>
										   <h2 class="add-btn hide_tab"><a id="submitProduct" href="javascript:void(0);" >Save</a></h2>
										</form>

                                         </div>
                                        </div>
                                    <div class="tab-pane tab-pane2" id="oem_tab" role="tabpanel">
                                        <div class="col-12" style="float:left; width:100%">
                                          <h2>OEM Offers</h2> 
                                          <h2 class="add-btn"><a href="javascript:void();"  id="add_oem">Add</a></h2>
                                        </div>
                                          <div class="col-12" style="float:left; width:100%">
                                            <div class="table-responsive"> 
                                            <table id="" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                            <th>line</th>												
                                                            <th>Name</th>
                                                            <th>Link</th>
                                                            <th>Image</th>
                                                            <th>Action</th> 

                                                    </tr>
                                                </thead>
                                                <tbody id="appendRowOEM">
													<?php foreach($get_all_OEMOffers as $key=>$val){ ?>
														<tr class="row_<?php echo $val['id']; ?>">
															<td><?php echo $val['id']; ?></td>
															<td><?php echo $val['name']; ?></td>
															<td><a href="<?php echo $val['link']; ?>"><?php echo $val['link']; ?></a></td>
															<td style="width: 100px;" ><image style="width: 100%;" src="<?php echo FRONT_BASE_URL.'/uploads/product_offers/'.$val['image']; ?>"></td>
															<td><a class="editOEMOffer" id="<?php echo $val['id']; ?>" href="javascript:void(0)"><i class="material-icons">edit</i></a><a class="deleteOEMOffer" id="<?php echo $val['id']; ?>" href="javascript:void(0)"><i class="material-icons">delete</i></a></td>
														</tr>
													<?php } ?>
                                                </tbody>
                                                </table>
                                         </div>
                                        </div>
                                       <div class="col-12" style="float:left; width:100%">
<!--
                                         <button type="button" class="btn bg-red waves-effect" style="float:left;"> Save</button>
                                            <button type="button" class="btn bg-black waves-effect" style="float:right;"> Close</button>
-->
                                        </div>
                                    </div>
                                    <div class="tab-pane tab-pane3" id="paradise_tab" role="tabpanel">
                                       <div class="col-12" style="float:left; width:100%">
                                          <h2>Paradise Offers</h2> 
                                          <h2 class="add-btn"><a href="javascript:void();" id="add_paradise">Add</a></h2>
                                        </div>
                                          <div class="col-12" style="float:left; width:100%">
                                            <div class="table-responsive"> 
                                            <table id="" class="table table-striped">
                                                <thead>
                                                    <tr>
														<th>line</th>											
														<th>Name</th>
														<th>Price</th>  
														<th>Qty</th>  
														<th>Ship from</th>  
														<th>Image</th>  
														<th>Action</th> 
                                                    </tr>
                                                </thead>
                                                <tbody id="appendRowParadise">
													<?php foreach($get_all_ParadiseOffers as $key=>$val){ ?>
														<tr class="row_<?php echo $val['id']; ?>">
															<td><?php echo $val['id']; ?></td>
															<td><?php echo $val['name']; ?></td>
															<td><?php echo $val['price']; ?></td>
															<td><?php echo $val['quantity']; ?></td>
															<td><?php echo $val['ship_from']; ?></td>
															<td style="width: 100px;" ><image style="width: 100%;" src="<?php echo FRONT_BASE_URL.'/uploads/product_offers/'.$val['image']; ?>"></td>
															<td><a class="editParadiseOffer" id="<?php echo $val['id']; ?>" href="javascript:void(0)"><i class="material-icons">edit</i></a><a class="deleteParadiseOffer" id="<?php echo $val['id']; ?>" href="javascript:void(0)"><i class="material-icons">delete</i></a></td>
														</tr>
													<?php } ?>
                                                </tbody>
                                                </table>
                                         </div>
                                        </div>
                                        <div class="col-12" style="float:left; width:100%">
<!--
                                         <button type="button" class="btn bg-red waves-effect" style="float:left;"> Save</button>
                                            <button type="button" class="btn bg-black waves-effect" style="float:right;"> Close</button>
-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                               
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
 
<!--
<div class="modal" id="product_add">
  <div class="modal-dialog">
    <div class="modal-content">


      <div class="modal-header">
        <h4 class="modal-title">Add Product:</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

 
      <div class="modal-body">
       <form id="productForm">
           <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" />
           </div> 
           <div class="form-group">
            <label>Model Number</label>
            <input type="text" class="form-control" name="model" value="<?php echo $row['model'];?>" />
           </div>
           <div class="form-group">
            <label>Price</label>
            <div class="custom-file">
                <input type="text" class="form-control" name="price" value="<?php echo $row['price'];?>" />
              </div>
           </div>
           <div class="text-center error_msg" style="color:red;"></div>
           <div class="form-group" style="margin-bottom:0">            
            <button type="submit" id="submitProduct" class="btn bg-red waves-effect" style="padding: 10px 35px;">Submit</button>
           </div>
          </form>
      </div>

    </div>
  </div>
</div>
-->

    <!-- The Modal -->
<div class="modal" id="oem_add">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Offer:</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="OEMForm" enctype="multipart/form-data">
           <div class="form-group">
            <label>Name*</label>
            <input type="text" class="form-control name" name="name"> 
            </div>
           <div class="form-group">
            <label>Link*</label>
            <input type="text" class="form-control link" name="link">
            </div>
           <div class="form-group">
            <label>Image*</label>
                <input type="file" id="file" accept="image/*" class="custom-file-input file" name="file">
                <p class="fileText"></p>
           </div>
           <div class="text-center error_msg" style="color:red;"></div>
           <div class="form-group" style="margin-bottom:0">            
            <button type="submit" id="submitOEMOffer" class="btn bg-red waves-effect" style="padding: 10px 35px;">Submit</button>
           </div>
          </form>
      </div>

    </div>
  </div>
</div>
    
        <!-- The Modal -->
<div class="modal" id="paradise_add">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Paradise Offer:</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form id="ParadiseForm" enctype="multipart/form-data">
           <div class="form-group">
            <label>Name*</label>
            <input type="text" class="form-control name" name="name"/>
           </div> 
           <div class="form-group">
            <label>Description*</label>
            <input type="text" class="form-control description" name="description"/>
           </div>
           <div class="form-group">
            <label>Image*</label>
            <div class="custom-file">
                <input type="file" id="file" accept="image/*" class="custom-file-input file" name="file"/>
                 <p class="fileText"></p>
              </div>
           </div>
           <div class="form-group">
            <label>Price*</label>
            <input type="text" class="form-control price" name="price"/>
           </div>
           <div class="form-group">
            <label>Qty*</label>
            <input type="text" class="form-control quantity" name="quantity"/>
           </div>
           <div class="form-group">
            <label>Ship From*</label>
            <input type="text" class="form-control ship_from" name="ship_from"/>
           </div>
         <div class="text-center error_msg" style="color:red;"></div>
           <div class="form-group" style="margin-bottom:0">            
            <button type="submit" id="submitParadise" class="btn bg-red waves-effect" style="padding: 10px 35px;">Submit</button>
           </div>
          </form>
      </div>

    </div>
  </div>
</div>
    
    
<script>
	
$(document).ready(function(){
	$(".nav-link").click(function(){
		$('#productForm .error_msg').html('');
	});
	$("#add_oem").click(function(){

	   $('#OEMForm .error_msg').html('');
				
				$('#OEMForm')[0].reset();
				$('#OEM_offer_id').val('');
				
					$('#OEMForm .fileText').html('');
					$('#OEMForm .custom-file-input').css('color','inherit');
		$('#oem_add').modal('show');
	});
	$("#add_paradise").click(function(){

	   $('#ParadiseForm .error_msg').html('');
			$('#ParadiseForm')[0].reset();
				$('#paradise_offer_id').val('');
			
					$('#ParadiseForm .fileText').html('');
					$('#ParadiseForm .custom-file-input').css('color','inherit');
		$('#paradise_add').modal('show');
	});
	
	
	$("#submitProduct").click(function(e){
		e.preventDefault();
		$('#productForm .error_msg').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:36px"></i>');
		var product_id =  $('#product_id').val();
		if(checkEmpty("productForm") === false){
			$('#productForm .error_msg').html('Please fill all fields');
			return false;
		}
		var data = $('#productForm').serializeArray();
		data.push({name: 'id', value: product_id});
		$.post(BASEURL+"/product/add",{data:data},function(result){
			$('#product_add').modal('hide');
			$('#productForm .error_msg').html('');
			//~ $('#productForm')[0].reset();
			if(result.result == "success"){
				$('#product_id').val(result.product_id);
				$('.nav-item , .tab-pane').removeClass('active');
				$('.nav-item2 , .tab-pane2').addClass('active');
				$('.nav-link2, .nav-link3').removeClass('disabledTab');
				//~ $('.hide_tab').css('display','none');
				$('#productForm .error_msg').html(result.message);
				$('#productName').html(result.data.name);
				$('#productModel').html(result.data.model);
				$('#productPrice').html(result.data.price);
			}
		},'json');
		
	});
	
	var counter = 1;
	
	$("#submitOEMOffer").click(function(e){
		e.preventDefault();
		$('#OEMForm .error_msg').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:36px"></i>');
		var product_id =  $('#product_id').val();
		var OEM_offer_id =  $('#OEM_offer_id').val();
		var file =  $('#OEMForm #file').attr('value');
		
		if($('#OEMForm .name').val() ==''){
			$('#OEMForm .error_msg').html('Please fill name fields');
			return false;
		}
		if($('#OEMForm .link').val() ==''){
			$('#OEMForm .error_msg').html('Please fill link fields');
			return false;
		}
		if(OEM_offer_id ==''){
			if($('#OEMForm .file').val() ==''){
				$('#OEMForm .error_msg').html('Please select any file');
				return false;
			}
		}
		
		var formData = new FormData();
		formData.append('file', $('#OEMForm #file')[0].files[0]);
		var data = $('#OEMForm').serializeArray();
		data.push({name: 'product_id', value: product_id});
		data.push({name: 'image', value: file});
		if(OEM_offer_id !==''){
			data.push({name: 'id', value: OEM_offer_id});
		}
		formData.append('data', JSON.stringify(data));
		
		$.ajax({
			url : BASEURL+"/product/addOEMOffer",
			type: "POST",
			data : formData,
			processData: false,
			contentType: false,
			dataType: 'JSON',
			success:function(result){
				$('#OEMForm .error_msg').html('');
				$('#oem_add').modal('hide');
				$('#OEMForm')[0].reset();
				$('#OEM_offer_id').val('');
				if(result.result == "success"){
					$('#OEMForm .fileText').html('');
					$('#OEMForm .custom-file-input').css('color','inherit');
					var html = '<tr class="row_'+result.OEM_offer_id+'" ><td>'+counter+'</td><td>'+result.data.name+'</td><td><a href="'+result.data.link+'">'+result.data.link+'</a></td><td ><img  src="'+result.data.image+'" class="oem-img"/></td><td><a class="editOEMOffer" id="'+result.OEM_offer_id+'" href="javascript:void(0)"><i class="material-icons">edit</i></a><a class="deleteOEMOffer" id="'+result.OEM_offer_id+'" href="javascript:void(0)"><i class="material-icons">delete</i></a></td></tr>';
					if(result.type == "update"){
						$('#appendRowOEM .row_'+result.data.id).remove();
					}
					$('#appendRowOEM').append(html);
					counter++;
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				//if fails     
			}
		});		

	});
	
	$(document).on("click",".editOEMOffer",function(){
		$('#OEMForm')[0].reset();
		var id = this.id;
		$('#OEM_offer_id').val(id);
		$.post(BASEURL+"/product/get_row_OEMOffers",{id:id},function(result){
			if(result.result == "success"){
				$('#OEMForm .name').val(result.data.name);
				$('#OEMForm .link').val(result.data.link);
				$('#OEMForm .fileText').html(result.data.image);
				$('#OEMForm #file').attr('value',result.data.image);
				$('#OEMForm .custom-file-input').css('color','#fff');
				$('#oem_add').modal('show');
			}
		},'json');
	});

	$(document).on("click",".deleteOEMOffer",function(){
		var id = this.id;
		if(!confirm('Are you sure you wan to delete!'))return false;
		$.post(BASEURL+"/product/deleteOEMOffer",{id:id},function(result){
			if(result.result == "success"){
				$('#appendRowOEM .row_'+id).remove();
			}
		},'json');
	});
	
	
	//~ Paradise offers functions 
	var counter1 = 1;
	$("#submitParadise").click(function(e){
		e.preventDefault();
		$('#ParadiseForm .error_msg').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:36px"></i>');
		var product_id =  $('#product_id').val();
		var paradise_offer_id =  $('#paradise_offer_id').val();
		var file =  $('#ParadiseForm #file').attr('value');
		
		if($('#ParadiseForm .name').val() ==''){
			$('#ParadiseForm .error_msg').html('Please fill name fields');
			return false;
		}
		if($('#ParadiseForm .description').val() ==''){
			$('#ParadiseForm .error_msg').html('Please fill description fields');
			return false;
		}
		if($('#ParadiseForm .price').val() ==''){
			$('#ParadiseForm .error_msg').html('Please fill price fields');
			return false;
		}
		if($('#ParadiseForm .ship_from').val() ==''){
			$('#ParadiseForm .error_msg').html('Please fill ship_from fields');
			return false;
		}
		if($('#ParadiseForm .quantity').val() ==''){
			$('#ParadiseForm .error_msg').html('Please fill quantity fields');
			return false;
		}
		if(paradise_offer_id ==''){
			if($('#ParadiseForm .file').val() ==''){
				$('#ParadiseForm .error_msg').html('Please select any image');
				return false;
			}
		}
		
		var formData = new FormData();
		formData.append('file', $('#ParadiseForm #file')[0].files[0]);
		var data = $('#ParadiseForm').serializeArray();
		data.push({name: 'product_id', value: product_id});
		data.push({name: 'image', value: file});
		if(paradise_offer_id !==''){
			data.push({name: 'id', value: paradise_offer_id});
		}
		formData.append('data', JSON.stringify(data));
		
		$.ajax({
			url : BASEURL+"/product/addParadiseOffer",
			type: "POST",
			data : formData,
			processData: false,
			contentType: false,
			dataType: 'JSON',
			success:function(result){
				$('#ParadiseForm .error_msg').html('');
				$('#paradise_add').modal('hide');
				$('#ParadiseForm')[0].reset();
				$('#paradise_offer_id').val('');
				if(result.result == "success"){
					$('#ParadiseForm .fileText').html('');
					$('#ParadiseForm .custom-file-input').css('color','inherit');
					var html = '<tr class="row_'+result.paradise_offer_id+'" ><td>'+counter1+'</td><td>'+result.data.name+'</td><td>'+result.data.price+'</td><td>'+result.data.quantity+'</td><td>'+result.data.ship_from+'</td><td ><img  src="'+result.data.image+'" class="oem-img"/></td><td><a class="editParadiseOffer" id="'+result.paradise_offer_id+'" href="javascript:void(0)"><i class="material-icons">edit</i></a><a class="deleteParadiseOffer" id="'+result.paradise_offer_id+'" href="javascript:void(0)"><i class="material-icons">delete</i></a></td></tr>';
					if(result.type == "update"){
						$('#appendRowParadise .row_'+result.data.id).remove();
					}
					$('#appendRowParadise').append(html);
					counter1++;
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				//if fails     
			}
		});		

	});
	
	$(document).on("click",".editParadiseOffer",function(){
		$('#ParadiseForm')[0].reset();
		var id = this.id;
		$('#paradise_offer_id').val(id);
		$.post(BASEURL+"/product/get_row_ParadiseOffers",{id:id},function(result){
			if(result.result == "success"){
				$('#ParadiseForm .name').val(result.data.name);
				$('#ParadiseForm .price').val(result.data.price);
				$('#ParadiseForm .description').val(result.data.description);
				$('#ParadiseForm .quantity').val(result.data.quantity);
				$('#ParadiseForm .ship_from').val(result.data.ship_from);
				$('#ParadiseForm .fileText').html(result.data.image);
				$('#ParadiseForm #file').attr('value',result.data.image);
				$('#ParadiseForm .custom-file-input').css('color','#fff');
				$('#paradise_add').modal('show');
			}
		},'json');
	});

	$(document).on("click",".deleteParadiseOffer",function(){
		var id = this.id;
		if(!confirm('Are you sure you wan to delete!'))return false;
		$.post(BASEURL+"/product/deleteParadiseOffer",{id:id},function(result){
			if(result.result == "success"){
				$('#appendRowParadise .row_'+id).remove();
			}
		},'json');
	});
 
});

					


	function checkEmpty(formId){
		var allBlank = false;
		$('#'+formId+' input,'+formId+' select').each(function(index, el)
		{
			var input = $(this);
			if(input.val() == ''){
				allBlank = true;
			}
		});

		if(allBlank == true){
			return false;
		}
		return true;
	}
</script>
