
        <div class="container-fluid">
            <div class="block-header">
                <h2><?php echo ucfirst($master_title); ?></h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              <?php echo ucfirst($master_title); ?>
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
<div class="body">
							<form id="example_video" action="<?php echo BASEURL ?>/example/add" method="post" enctype="multipart/form-data">
							<!--<div class="input_fields_wrap">
    <button class="add_field_button">Add More Fields</button>
   <div><div class="row clearfix">
                                	<div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Heading" name="heading" />
                                        </div>
                                    </div>
                                    
                                </div>
									<div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" placeholder="image" name="img"/>
                                        </div>
                                    </div>
                                    
                                </div>
							   	
                            </div>  <div class="row clearfix">
									<div class="col-sm-12">
                                    <div class="form-group">
                                       <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Description" name="description"></textarea>
                                       
                                        </div>
                                    </div>
                                    
                                </div>	
									
							
                            </div></div>
							
								</div>-->
<div class="row clearfix">
	<div class="col-sm-12">
		<div class="form-group">
			<div class="form-line">
				<input type="hidden" name="id" value="<?php echo $getfeatures['id']; ?>"/>
				<input type="text" class="form-control" placeholder="Enter the Title" name="title"/>
			</div>
		</div>
	</div>
</div>
										<div class="row clearfix">
	
											
	<div class="col-sm-12">
		<div class="form-group">
			<div class="form-line">
				<textarea rows="4" class="form-control no-resize" placeholder="Enter the url of video" name='link'></textarea>
			</div>
		</div>
	</div>
								</div>
		<button type="submit" class="btn bg-red waves-effect">Submit</button>	
								<a href="<?php echo BASEURL ?>/example_video/" class="btn bg-grey waves-effect">Cancel</a>
							</form>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
<!-- <script> 
	 $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><div class="row clearfix"><div class="col-sm-6"><div class="form-group"><div class="form-line"><input type="text" class="form-control" placeholder="Heading"/></div></div></div><div class="col-sm-6"><div class="form-group"><div class="form-line"><input type="file" class="form-control" placeholder="image" /></div></div></div></div><div class="row clearfix"><div class="col-sm-12"><div class="form-group"><div class="form-line"><textarea rows="4" class="form-control no-resize" placeholder="Description"></textarea></div></div></div></div><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>-->
   