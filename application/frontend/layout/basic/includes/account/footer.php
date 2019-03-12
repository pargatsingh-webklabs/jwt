<style>
.popover-title{background: #000;
color: #fff;
text-align: center;
font-weight:700;}
.popover{padding:0px}
</style> 

 <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        
        <!-- Default to the left -->
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Smooth Maps.</a>.</strong> All rights reserved.
      </footer>
   
      <div class='control-sidebar-bg'></div>


	  <!------model layer html---->
	  <div id="myLayer" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close border-close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Map Data Set Layer</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
		<div class="pull-left col-sm-5 col-md">
		 <button type="button" class="btn btn-default">Done</button>
		</div>
		<div class="pull-right col-sm-7 col-md">
		
		 <div class="form-group">
		 <div class="col-sm-3 col-md">
		  <label for="sel1" style="line-height:36px; font-size:16px; font-weight:400; margin-bottom:0px;">Category:</label>
		  </div>
		  <div class="col-sm-9 col-md">
			<select class="selectpicker" id="sel1">
		  <option>Mustard</option>
		  <option>Ketchup</option>
		  <option>Relish</option>
		</select>
		  </div>
		</div>
		
		</div>
		</div>
		<!---data table------>
		
		
		
		 <div class="col-md-12 table-responsive col-md" style="margin-top:20px;">
            
            
<table class="table table-striped table-hover" id="layer" >
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Amount</th>
							<th>Paid By</th>
							<th>Type</th>
                            <th>Status</th>
                            <th>Next Billing</th>
                           
                           
                        </tr>
                    </thead>
                    <tbody class="text-left">
                       <tr>
							<td>Tiger Nixon</td>
							<td>System Architect</td>
							<td>Edinburgh</td>
							<td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td>
                            
						</tr>
						<tr>
							<td>Tiger Nixon</td>
							<td>System Architect</td>
							<td>Edinburgh</td>
							<td>61</td>
							<td>2011/04/25</td>
							<td>$320,800</td>
							
						</tr>
                    </tbody>
                </table>

	
	</div>
	



    
    
    
   
		
		
		
		
		
		
		
		
		<!---End data table------>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>
<!----------share map popup---------->
  <!--<div id="share-map-popup" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content
    <div class="modal-content"style="float: left;width: 100%; margin-top:60px">
      <div class="modal-header">
        <button type="button" class="close border-close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Share</h4>
      </div>
      <div class="modal-body" style="float: left;width: 100%;">
	  <div class="col-sm-12">
      <div style="margin-bottom:15px;"> <input type="text" id="foo" class=" form-control" value="http://neo-crews.com/smooth_maps/admin" ></div>
     <div class="social col-sm-8 col-md">
		<span id="share_link" class=' st_facebook_large'	st_url="#" displayText='Facebook'></span>
		<span class=' st_twitter_large' 	st_url="#" displayText='Tweet'></span>
		<span class=' st_linkedin_large' 	st_url=""  displayText='LinkedIn'></span>
		<span class=' st_whatsapp_large'  st_url="" displayText='WhatsApp'></span>
		<span class=' st_googleplus_large' st_url=""  displayText='Google +'></span>
	</div>
							
			<div class="pull-right col-sm-4 col-md">
			<button  type="submit" data-clipboard-action="copy" data-clipboard-target="#foo" class=" copy_btn ex-btn-two hvr-sweep-to-right float-r-m">Copy Link</button>
</div>			

	  </div>     
    </div>

  </div>
</div>
</div>-->

 


    <!-- REQUIRED JS SCRIPTS -->
	<script src="<?php echo FRONT_END_LAYOUT;?>/assets/dist/js/clipboard.min.js"></script>
	 <script>
    var clipboard = new Clipboard('.copy_btn');
		 
    </script>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo FRONT_END_LAYOUT;?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo FRONT_END_LAYOUT;?>/assets/dist/js/app.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/formValidation.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/bootstrap.js"></script>	
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/validations.js"></script>
	
	
	<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'top',
        trigger : 'hover'
    });
});
</script>
	 <script>
		 $(window).load(function(){
		 $(".share_map_model").click(function(){
			 var id = this.id;
			
		$('#share-map-popup_'+id).modal('show');
		
		//$('#share_link').attr('st_url',link);
			//alert(link);
		
		});	
		 
		 });
	 </script>
	  <script>	
		var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}

		$(document).ready(function(){
	
		$("#success_msg").fadeOut(6000);
			
		$('.edit_map_model').click(function(){	
		   var id = $(this).attr('id');	
		   $('#create-my-map').modal('show');			
           $.post( BASEURL+'/map/map_data', { id: id }, function( data ) {
			   data = eval("("+data+")");
			  if(data.result=='success'){
			     $('#name').val(data.name);
			     $('#description').html(data.description);
                 var map_id = Base64.encode(id);
				 $('#form_map').attr('action',BASEURL+'/map/?id='+map_id);
			  }else if(data.result=='error'){
                 console.log('******* There was some error fetching map data ********* ');
			  }
		   });			
		});			
	
				
			
			
		});	  
	  </script>	


<script>
$(document).ready(function(){

$('input[type="file"]').on('change', function (event, files, label) {
	$("#loader").html('<i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true" style="color:green;"></i>');
	$("#save_profile").attr("disabled",true);
	 
    var file_data = $(this).prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('userfile', file_data);
    $.ajax({
                url: BASEURL+'/users/upload_file', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
					 $("#loader").html("");
					var php_script_response=eval("("+php_script_response+")");
                    if(php_script_response.result=='success'){
						$("#save_profile").attr("disabled",false);
						$("#img_logo_company").hide('slow');
						$("#response").html("<img src='"+php_script_response.path+"' height='100px' width='100%' />");
						$("#file_upload").val(php_script_response.path);
					}else{
						$("#response").html(php_script_response.type);                                                                                  
					}
                }
     });
});

	
});	

</script>



	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/dist/js/imageuploadify.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/dist/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/dist/js/gmaps.js"></script>
 
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
	 

	
	 <script type="text/javascript">
		var map;
		$(document).ready(function(){
		  map = new GMaps({
			el: '#map',
			lat: -12.043333,
			lng: -77.028333,
			zoomControl : true,
			zoomControlOpt: {
				style : 'SMALL',
				position: 'TOP_LEFT'
			},
			panControl : false,
			streetViewControl : false,
			mapTypeControl: false,
			overviewMapControl: false,
			
		  });
		});
	  </script>											
										

	 <script type="text/javascript">
            $(document).ready(function() {
                $('input[type="file"]').imageuploadify();	
            });
      </script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

	<script>
	     function htmlbodyHeightUpdate(){
		var height3 = $( window ).height()
		var height1 = $('.nav').height()+50
		height2 = $('.main').height()
		if(height2 > height3){
			$('html').height(Math.max(height1,height3,height2)+10);
			$('body').height(Math.max(height1,height3,height2)+10);
		}
		else
		{
			$('html').height(Math.max(height1,height3,height2));
			$('body').height(Math.max(height1,height3,height2));
		}
		
	}
		
	$(document).ready(function () {
		
		htmlbodyHeightUpdate()
		$( window ).resize(function() {
			htmlbodyHeightUpdate()
		});
		$( window ).scroll(function() {
			height2 = $('.main').height()
  			htmlbodyHeightUpdate()
		});
		
	});
	
	/*function get_filtered_map(page_number){
			//var search=$("#search_input").val();
			var current_page=page_number;
			var per_page=$("#per_page").val();
			$("#loader").html('<i class="fa fa-spin fa-spinner" style="font-size:30px;color:red"></i>');
			$.post( BASEURL+'/account/get_all_maps',{curr_page:page_number,per_page:per_page},function(result){				 
			$("#loader").html("");
					$("#filtered_map_data").html(result);
			});
		}	*/
		
	</script>


		<script type="text/javascript" id="" src="http://w.sharethis.com/button/buttons.js?publisher=0e5bff82-49bf-4394-af17-0b89ab67835f"></script>
	<script type="text/javascript">stLight.options({publisher: "0e5bff82-49bf-4394-af17-0b89ab67835f", doNotHash: false, doNotCopy: false, hashAddressBar: false});
</script>