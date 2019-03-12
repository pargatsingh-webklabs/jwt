<script type="text/javascript">	
function selectuser_as_perplan(plan_id){
	window.location.href=BASEURL+'/send/?id='+plan_id;
}
</script>
<script>
$(document).ready(function(){
	//get_filtered_data(1);
	$(".open_map_modal").click(function(){
		var id = this.id;
	
	$("#Map_Modal .id_model").val(id);
	$("#Map_Modal").modal();
	
	});
	$(".change_data_filter").change(function(){
		
		get_filtered_data(1);
		
	});
	$(".click_data_filter").click(function(){
		get_filtered_data(1);
	});	
	
	
	
	$("#add_upload").click(function(){
		var rows = $(this).attr("rows");
		rows = parseInt(rows)+parseInt(1);
		$("#new_upload").prepend(' <div  id="row'+rows+'"  class="row clearfix" style="margin-bottom:20px;border:1px solid #8BC34A; height:90px;width:910px;margin-left:0px;border-radius:5px;"> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:13px;height: 90px;"> <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><label>Click to upload</label> <div class="form-group form-float"> <input type="file" name="upload_file[]" /> </div></div><button type="button" title="Remove this selection" data-color="light-green" style="padding-left: 0px ! important; padding-right: 0px ! important; padding-top: 0px ! important; margin-right: -15px; margin-top: -14px;" row="row'+rows+'"  class="delete_row pull-right btn bg-light-green waves-effect waves-circle waves-float "><i class="material-icons" style="font-size:27px;">cancel</i></button> <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6"><label >Click to select from existing catagery</label><button row="row'+rows+'" id="'+rows+'" type="button" data-color="light-green" class="btn bg-light-green waves-effect open_modal_cat"><i class="material-icons">business</i></button> <span id="existing_Subcategory_name'+rows+'"></span><input type="hidden" id="existing_category_name'+rows+'" /></div></div></div>');
	  $(this).attr("rows",rows);	
	  $(".place_sub_cat").attr("row",rows);	
	});
	
	

	
});	

 function get_filtered_data(page_number){
			var cate_name = $("#category_combo").val();
			var search=$("#search_input").val();
			var current_page=page_number;
			var per_page=$("#per_page").val();
			$("#loader").html('<div class="md-preloader pl-size-xs"><svg viewBox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" class="pl-light-green" stroke-width="5"/></svg></div> <label style="font-size: 15px;">Loading data ...</label> ');
			$.post( BASEURL+'/location/get_location_data',{category_name:cate_name,search:search,curr_page:page_number,per_page:per_page},function(result){				 
			$("#loader").html("");
					$("#filtered_locations").html(result);
			});
		}	
</script>

   <script src="<?php echo THEME_URL; ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

<script>
	$(function () {
	$(document).on('click','.open_modal_cat', function () {
		var sub_cate = $(this).next('span').html();
		var cate = $(this).next('span').next('input').val();

        var row = $(this).attr("id");
		$("#popup_clicked").val(row);
        var color = $(this).data('color');
        $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
		
		if(sub_cate!="" && cate!="" && sub_cate!=undefined && cate!=undefined){
           $('#previous_mdModal').modal('show');	
		   $("#Category_name").html(cate);
		   $("#Sub_Category_name").html(sub_cate);
		}else{
           $('#mdModal').modal('show');	
           $(".category_feild").val("Select your category");			
		   $("#sub_cat_heading").html("Sub categories");
		   $(".sub_cat_html").html("<h5><center>No sub categories available ! </center></h5>");				
		}	
		
    });
	$(".category_feild").change(function(){		
		 $("#category_feild_name").val("");
		var category_feild = $(this).val();	
		var category_feild_name = $(this).find(":selected").text();
        $("#category_feild_name").val(category_feild_name);
		if(category_feild!=0){
            $("#existing_category").val("");		
			$(".loading1").html('<div class="md-preloader pl-size-md"><svg viewBox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" class="pl-light-green" stroke-width="5"/></svg></div><h5>Loading sub categories please wait...</h5>');
			$.post( BASEURL+'/categories/getSub_categoriesByCat',{id:category_feild},function(result){
             $(".sub_cat_html").html("");				
			  $(".loading1").html("");
              console.log(result);
			  var data = eval("("+result+")");	
              console.log(result);	
				if(data.result=="success"){
					var record = data.record;
					var html = "";
					for (x in record) {
						html += '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><input idd="'+record[x].id+'" sub_cat_name="'+record[x].name+'" id="radio'+record[x].id+'" class="place_sub_cat radio-col-light-green" name="radio_sub_cat" type="radio"><label for="radio'+record[x].id+'"> '+record[x].name+' <i class="fa fa-map-marker" style="color:#'+record[x].color_code+';font-size:17px" title="Marker colour: #'+record[x].color_code+'"></i></label></div>';
					}
					$("#sub_cat_heading").html("Sub categories of category: "+data.cat);
					$("#sub_cat").html("Sub categories of category: "+data.cat);
					$(".sub_cat_html").append(html);
				}else if(data.result=="error"){
					$("#sub_cat_heading").html("Sub categories");
					$(".sub_cat_html").html("<h5><center>No sub categories available ! </center></h5>");					
        			
				}
			});		
		}else{
					$("#sub_cat_heading").html("Sub categories");
					$(".sub_cat_html").html("<center><span><i class='material-icons' style='color:#ff9f19;font-size:65px'>warning</i></span><h5 style='padding-top:5px'>Selection is not a catagery , please select a valid catagery. </h5></center>");			
		}
	});	
		
		
    $(document).on("click",".place_sub_cat",function(){
		alert("test");
		var id = $(this).attr("idd");
		var sub_cat_name = $(this).attr("sub_cat_name");
		var category_feild_name = $("#category_feild_name").val();
		var existing_category = $("#existing_category").val();
		if(existing_category){
 		 $("#existing_category").val(existing_category+','+id);
		}else{
		 $("#existing_category").val(id);
		}
	    
		var row = $("#popup_clicked").val();
	    $("#existing_Subcategory_name"+row).html(sub_cat_name);
	    $("#existing_category_name"+row).val(category_feild_name);
	});		

		
		
		
});	
</script>	

	<!--<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/js/bootstrap.min.js"></script>-->




	<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/js/formValidation.js"></script>
	<script type="text/javascript" src="<?php echo THEME_URL; ?>assets/js/bootstrap.js"></script>	
    <script type="text/javascript" src="<?php echo THEME_URL; ?>assets/js/validations.js"></script>	
<script>	
	
	

	
	
$(document).ready(function(){
	$("#pass_authentication").submit(function(e){
	
	e.preventDefault();
	$.post(BASEURL+'/location/file',$( "#pass_authentication" ).serialize(),function(result){
		$("#loader").html('<i class="fa fa-spinner fa-4x fa-spin" style="color:#8BC34A;"></i>');
		if(result.result == 'success')
		{
		$("#loader").html('');	
		window.location.reload();
		
		}else if(result.result == 'error')
		{
		$("#loader").html('<b style="color:red;">' +result.message+ '</b>');
		$("#loader").fadeOut(5000).css("color","red").css("font-size","16px").css("text-shadow","0px 0px 50px black");
		$("#loader").fadeIn();
		}
		
	},'json');
});
	
	
	
	
    $('.category_feild').on('change', function() {
        // Revalidate the fields
        $('#form_upload').formValidation('revalidateField', 'category');
        $('#form_upload').formValidation('revalidateField', 'existing_category')

    });
	
	$('.position').change(function(){
	   var position = $(this).val();
		$('.submit_position').attr('position',position);
	});
	
	$('.position').click(function(){
		$('.submit_position').attr('disabled','disabled');
	    var num = $(this).attr('but_num');
		$('.removeDisable'+num).removeAttr('disabled');
	});
	$('#search_button').click(function(){
       $('#loading').html('<div class="md-preloader pl-size-xs"><svg viewBox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" class="pl-light-green" stroke-width="5"/></svg></div> <label style="font-size: 15px;">Loading data ...</label> ');
	});	

	$('.submit_position').click(function(){

		if($(this).attr('position')){
		   var id = $(this).attr('rec_id');
		   var position = $(this).attr('position');
			$.post(BASEURL+'/categories/update_category', {id : id , position : position}, function(result){
				var data = eval("("+result+")");
				if(data.result=="success"){
				   var msg = 'Position for this category location has been updated to <b> position number : '+position+'</b>';					   showNotification(colorName_success, msg, placementFrom, placementAlign, animateEnter, animateExit);
				}else if(data.result=="error"){
				   var msg = 'There is some error updating your request , please try again!';
				   showNotification(colorName_error, msg , placementFrom, placementAlign, animateEnter, animateExit);	
				}else if(data.result=="row_found"){
				   var msg = 'Your requested <b>position number : '+position+' </b>  has been alerady assigned to other location , <b>Find a new position </b>';
				   showNotification(colorName_error, msg , placementFrom, placementAlign, animateEnter, animateExit);	
				}
			});
		}else{
		   var msg = 'You need to change position first in order to update Positions';
           showNotification(colorName_error, msg , placementFrom, placementAlign, animateEnter, animateExit);		
		}


	});
	
	$("#get_sub_cat_button").click(function(){
	   $("#mdModal").modal("hide");
	   var id = $("#existing_category").val();
		if(id){
		  showNotification('bg-black', "Sub-category selected successfully !" , placementFrom, placementAlign, animateEnter, animateExit);	
		}else{
		  showNotification('bg-red', "Plaese select your sub-category in order to submit !" , placementFrom, placementAlign, animateEnter, animateExit);
		}
	});	
	
	$("#submit_button_csv").click(function(){
	   var id = $("#existing_category").val();
		if(!id){
		  showNotification('bg-red', "Plaese select your sub-category in order to submit !" , placementFrom, placementAlign, animateEnter, animateExit);
			return false;
		}
	});	
	
	$(".position").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

});	
</script>

    <!-- Bootstrap Core Js -->
   <!-- <script src="<?php echo THEME_URL?>assets/plugins/bootstrap/js/bootstrap.js"></script>-->



    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/node-waves/waves.js"></script>
successmsg
    <script src="<?php echo THEME_URL?>assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo THEME_URL?>assets/js/admin.js"></script>
<script>
$(document).on("click",".delete_row",function(){
        var rows = $(this).attr("row");	
	    swal({
        title: "Are you sure you want delete this row ?",
        text: "You will not be able to recover this row !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function () {
        $("#"+rows).remove();			
        swal("Deleted!", "Row deleted successfully.", "success");
    });

});
</script>	
    <!-- Demo Js -->
    <script src="<?php echo THEME_URL?>assets/js/demo.js"></script>


    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-countto/jquery.countTo.js"></script>
    <!-- Morris Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/morrisjs/morris.js"></script>
    <!-- ChartJs -->
    <script src="<?php echo THEME_URL?>assets/plugins/chartjs/Chart.bundle.js"></script>
    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/flot-charts/jquery.flot.time.js"></script>
    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="<?php echo THEME_URL?>assets/js/pages/index.js"></script>
    <script src="<?php echo THEME_URL?>assets/js/pages/ui/notifications.js"></script>
<?php if($_GET['msg']==1 && $_GET['msg']!=""){ 
      $msg = "Action completed successfully";  
     ?>
<script> var msg ="<?php echo $msg; ?>"; alert(msg); showNotification("bg-black", msg, placementFrom, placementAlign, animateEnter, animateExit);</script>
<?php } ?>
<?php if($_GET['msg']==0 && $_GET['msg']!=""){ 
      $msg = "There was some error completing your requested action , please try again !";  

     ?>
<script> var msg ="<?php echo $msg; ?>"; showNotification("alert-danger", msg, placementFrom, placementAlign, animateEnter, animateExit);</script>
<?php } ?>



<?php if($this->session->flashdata('successmsg')){ 
      $msg = $this->session->flashdata('successmsg') ;  
     ?>
<script> var msg ="<?php echo $msg; ?>";

	showNotification(colorName_success, msg, placementFrom, placementAlign, animateEnter, animateExit);</script>
<?php } ?>
<?php if($_GET['msg']==0){ 
      $msg = $this->session->flashdata('errormsg') ; 

     ?>
<script> var msg ="<?php echo $msg; ?>"; 

	
	showNotification(colorName_error, msg, placementFrom, placementAlign, animateEnter, animateExit);</script>
<?php } ?>

<!-- TinyMCE -->
    <script src="<?php echo THEME_URL?>assets/plugins/tinymce/tinymce.js"></script>
    <script src="<?php echo THEME_URL?>assets/js/pages/forms/editors.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo THEME_URL?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script>
	$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>

<!-- Select Plugin Js -->
    <script src="<?php echo THEME_URL?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
 <script src="<?php echo THEME_URL?>assets/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo THEME_URL?>assets/js/plugins/ckeditor/adapters/jquery.js"></script>
  <!-- TinyMCE -->
    <script src="<?php echo THEME_URL?>assets/plugins/tinymce/tinymce.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo THEME_URL?>assets/js/admin.js"></script>
    <script src="<?php echo THEME_URL?>assets/js/pages/forms/editors.js"></script>

<script src="<?php echo THEME_URL; ?>/assets/js/app/custom.js" type="text/javascript"></script>
 <script>
	CKEDITOR.replace( 'message' , {enterMode: CKEDITOR.ENTER_BR});
</script>
	<script>
	CKEDITOR.replace( 'answer' , {enterMode: CKEDITOR.ENTER_BR});
</script>
<script>
	CKEDITOR.replace( 'page_text' , {enterMode: CKEDITOR.ENTER_BR});
</script>
	
<script>
	CKEDITOR.replace( 'about_myself' , {enterMode: CKEDITOR.ENTER_BR});
</script>