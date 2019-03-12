
   <div class="container-fluid">
	<div class="block-header"><h2 style="text-transform: uppercase;"><?php echo ucfirst($master_title); ?></h2></div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="panel-heading"><!--<?php echo ucfirst($master_title); ?>
	<a href="<?php echo BASEURL ?>/cms" class="btn btn-purple btn-sm pull-right " style="margin-top:-5px;" type="button"><i class="fa fa-hand-o-left"></i> Go back </a>	-->					
					</div>
				<div class="panel-body">

  <form name="package_form" id="form_package" action="<?php echo BASEURL ?>/package/add<?php echo $packagedata['id']; ?>" enctype="multipart/form-data"  method='post'>
	  
<div class="row clearfix">
	<div class="col-sm-4">
		<div class="form-group">
			<div class="form-line">
                <label>Package Name</label>				
				<input class="form-control" placeholder="Name" type="text" name="name">
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<div class="form-line">
                <label>Package price</label>					
				<input class="form-control" placeholder="Type" type="text" name="price">
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<div class="form-line">
                <label>Package type</label>				
				<input class="form-control" placeholder="Price" type="text" name="type">
			</div>
		</div>
	</div>
</div> 
  
<div class="row clearfix">
	<div class="col-sm-8">
		<div class="form-group">
			<div class="form-line">
                <label>Package Feature</label>					
				<input class="form-control" placeholder="Feature" type="text" name="feature">
			</div>
		</div>
	</div>
	
<div class="col-md-4">
	
    <button class="add_field_button">Add More Fields</button>
 

	</div>
		<div class="input_fields_wrap"></div>
	
</div> 
  
  
	  
	 <div class="form-group">
		<div class="form-line">
			 <label>Package Description</label>
			<textarea id="ckeditor" rows="4" class="form-control no-resize"  name="description"  placeholder="Description"></textarea>

		</div>
	</div>
	  

			
					<div class="form-line">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="col-md-6 col-sm-6 col-xs-6 ">
							<div id="loader" class="pull-right " >
							</div>	
							</div>	
								<div class="col-md-6 col-sm-6 col-xs-6 ">
								<div class="pull-right ">
									
									 <button type="submit" class="btn bg-teal btn-block waves-effect">SEND</button>
                         									
								<a href="<?php echo BASEURL; ?>/package"   class="btn bg-red btn-block  waves-effect"> Cancel</a>     
									
								</div>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-8 rem"><div class="form-group"><div class="form-line"><input class="form-control" placeholder="Feature" type="text" name="feature[]"></div></div></div><div class="col-sm-4 rem"><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $('.rem').remove(); x--;
    })
});
</script>