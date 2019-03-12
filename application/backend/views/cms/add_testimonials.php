  <div class="page-content">
    <div class ="col-md-12">
        <h3 class="page-title"> 
            <?php echo ucfirst($master_title); ?>
        </h3>
		<div class='col-lg-4 pull-right'>
        <div class=" pull-right" style="margin-top:-40px;box-shadow:5px 5px 10px black;">
		<a href="<?php echo BASEURL; ?>/cms/testimonials">
            <button id="" class="btn green" type='submit'>
<i class="fa fa-arrow-left"></i>&nbsp;               
			   View testimonials
            </button>
		</a>	
		</div>
        </div>
  <div class=" box light-grey">       
   <div class="portlet-body">
       <div id="edit-profile">
       <hr>
	<div class="row">
      <!-- left column -->
	  <?php echo form_open_multipart('cms/update_profile_image', array("id" => "upload_post_pic", 'class' => 'upload_family_pic')); ?>
      <div class="col-md-3">
        <div class="text-center" >
		<div id="show_image">
          <img src="<?php echo $admin_info['image'] ;?>" class="avatar img-responsive img-circle" alt="avatar">
		  </div>
		  	<p id="loader" class="text-center"></p>  
          <h6>Upload a different photo...</h6>
          
              <span class="btn btn-file">
        Browse <input name="userfile" id="upload_pics" type="file">
    </span>
        </div>
      </div>
	  </form>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">

       
      <form id='form_new_testimonial' name='form_new_testimonial' method="post" action='<?php echo BASEURL; ?>/cms/add_testimonial' class="form-horizontal" role="form"/>

	 <div class="col-md-12 col-sm-12 col-xs-12">
	  <div class="row">   	 
	  <div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Testimonial Title</label>
		   <input type="hidden" id="userimage" name="image"/> 
		   <input type="text" name="testimonial_title" class="form-control"  />
	  </div>
	 </div>	


	<div class="col-md-12 col-sm-12 col-xs-12">
		 <div class="form-group">
		   <label>Testimonial Description</label>
		    <textarea name="testimonial_description" class="form-control" ></textarea>
	  </div>
	 </div>

</div>
</div>


</div>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
			<p id="updateprofilevalidating" class="text-center"></p>  
              <input class="btn  green" value="Save Changes" type="submit">
              <span></span>
            <a href="<?php echo BASEURL; ?>/cms/testimonials" class="btn btn-primary"><i class="fa fa-close"></i> Cancel</a>
            </div>
          </div>
        </form>
      </div>
   </div>
            </div> <!-- /.row (main row) -->

       </div>
   
   </form>
   </div>
  </div>
<script>
    $(document).ready(function () {
		
		
		$('#upload_pics').change(function (e) {
        e.preventDefault();  
        var formcontent = $("#upload_post_pic");
        var formcontentFiles = new FormData(formcontent[0]);
        $.ajax({
            url: formcontent.attr('action'), // Url to which the request is send
            type: formcontent.attr('method'), // Type of request to be send, called as method
            data: formcontentFiles, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            beforeSend: function () {
            $("#loader").show();
                $("#loader").html("<img src='" + THEME_URL + "/assets/img/loader.gif' />");
            },
            success: function (data)   // A function to be called if request succeeds
            {
                data = eval("(" + data + ")");
				$("#loader").hide();
				//$("#show_image").val("<img   src='" + data.image + "' />");
				$('#userimage').val(data.image);
                $("#show_image").html($("<img   src='" + data.image + "' class='avatar img-responsive img-circle' alt='avatar' />").fadeIn('slow'));                
                $("#show_image").fadeOut(1000);
                $("#show_image").fadeIn(4000);
			}
        });
    });
	
		
});
</script>