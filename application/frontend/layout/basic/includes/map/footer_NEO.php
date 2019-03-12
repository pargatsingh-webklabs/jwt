<style>
.arrow_down {
    font-size: 17px;
    font-weight: bold;
    left: 116px;
    top: 28px;
	display:none;
	margin-left: 5px;
}
.arrow_up {
    font-size: 17px;
    font-weight: bold;
    left: 116px;
    margin-left: 5px;
    top: 19px;
}
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
        <button type="button" class="close border-close" data-dismiss="modal">&times;
        </button>
        <h4 class="modal-title">Add Map Data Set Layer
        </h4>
      </div>
      <div class="modal-body">
		 	  
        <div class="col-sm-12 col-md">
          <div class="pull-left col-sm-2 col-md">
            <button id="form_data_sets_submit" type="button" class="btn btn-default done-btn">Done</button>
          </div>
              <div class="col-sm-5 col-md">
				  <div  class="pull-right"  style="color:#fc4a1a " id="loading_data">
               
					  </div>
              </div>
			
			
          <div class="pull-right col-sm-4 col-md">
            <div class="form-group">
              <div class="col-sm-5 col-md">
                <label for="sel1" style="line-height:30px; font-size:16px; font-weight:700; margin-bottom:0px; color:#000; padding-left:30px;">Category:
                </label>
              </div>
              <div class="col-sm-7 col-md">
                <select class="selectpicker filter_data_change form-control" id="category_combo" name="category">
                  <option value ="">Select your category
                  </option>
                  <?php foreach($categories as $key => $category){ ?>
                  <option value="<?php echo $category['id'];  ?>">
                    <?php echo $category['name']; ?>
                  </option>				 
                  <?php } ?>	
                </select>
              </div>
            </div>
			 
          </div>
		  
        </div>
		<div class="col-sm-12 col-md" style="margin-top:15px;">
			<div class="col-sm-6 col-md">
			 <div class="form-group">
             <label for="sel1" style="line-height:30px; float:left; margin-right:10px; font-size:16px; font-weight:700; margin-bottom:0px; color:#000; padding-left:0px;">Per Page:
                </label>
                <select id="per_page" class="filter_data_change form-control" name="category" style="width:50%; float:left">
                  <option value ="5">5</option>  
					<option value ="10">10</option>  
					<option value ="30">30</option>  
					<option value ="50">50</option>  
					<option value ="100">100</option>  
                </select>
              </div>
            </div>
            
			  <div class="pull-right col-sm-4 col-md">
			<div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" id="search_input" name="search" class="form-control input-lg" placeholder="Search here..." />
                    <span class="input-group-btn">
                        <button id="search_data" class="btn btn-info btn-lg filter_data_click"  type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div> 
				  
          
          </div>	
			  </div>
        <!---data table------>
			  <div id="loader" class="text-center"></div>	  
        <div class="col-md-12 table-responsive col-md" style="margin-top:20px;">	
            <table class="table table-striped table-hover" id="layer" >
          <thead class="">
              <tr bgcolor="#000">
                <th>
                  <input type="checkbox" id="checkAll" value="">
                </th>
				  <th><a class="filter_sort" sort_by="ASC" id="name" href="">Name</a><i class=" arrow_up fa fa-angle-up custom" id="up_name" ></i><i class="arrow_down fa fa-angle-down custom" id="down_name"></i></th>
                <th><a class="filter_sort" sort_by="ASC" id="color_code" href="">Color Code</a><i class=" arrow_up fa fa-angle-up custom" id="up_address"></i><i class="arrow_down fa fa-angle-down custom" id="down_address" ></i></th>
               
              </tr>
            </thead>
				<tbody class="text-left" id="filtered_location">
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

   <div id="share-map-model" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content"style="float: left;width: 100%; margin-top:60px">
       <div class="modal-header" style="background:#000;text-align:center;">
        <button type="button" class="close border-close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: rgb(255, 255, 255); font-size: 16px; font-weight: 500; text-align: left;">Share</h4>
      </div>
      <div class="modal-body" style="float: left;width: 100%;">
	  <div class="col-sm-12">
      <div style="margin-bottom:15px;"> <input type="text"  id="foo" class="share_input form-control" value="" ></div>
     <div class="social col-sm-8 col-md">
		<span id="share_link" class='st_facebook_large'	st_url="<?php echo MAP_SHARE_LINK.$id ; ?>" displayText='Facebook'></span>
		<span class=' st_twitter_large' 	st_url="<?php echo MAP_SHARE_LINK.$id ; ?>" displayText='Tweet'></span>
		<span class=' st_linkedin_large' 	st_url="<?php echo MAP_SHARE_LINK.$id ; ?>"  displayText='LinkedIn'></span>
		<span class=' st_whatsapp_large' st_url="<?php echo MAP_SHARE_LINK.$id ; ?>" displayText='WhatsApp'></span>
		<span class=' st_googleplus_large' st_url="<?php echo MAP_SHARE_LINK.$id ; ?>"  displayText='Google +'></span>
	</div>
							
			<div class="pull-right col-sm-4 col-md">
			<button style="float: right;"  type="submit" data-clipboard-action="copy" data-clipboard-target="#foo" class=" copy_btn ex-btn-two hvr-sweep-to-right float-r-m">Copy Link</button>
</div>			

	  </div>     
    </div>

  </div>
</div>
</div>		   
	  
  <!------map icon click popup html----->
  <!------model layer html---->
<div id="map-icon-p" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background:#000; text-align:center; color:#fff">
        <button type="button" class="close border-close" data-dismiss="modal">&times;
        </button>
        <h3 class="modal-title">Information
        </h3>
      </div>
      <div class="modal-body" style="float:left; width:100%; padding:0px">
		 	  
        <div class="col-sm-12 col-md">
          <table class="table table-striped">
    <tbody>
      <tr>
        <td>Name</td>
        <td>Doe</td>
        
      </tr>
      <tr>
        <td>Address</td>
        <td>Moe</td>
       
      </tr>
      <tr>
        <td>City</td>
        <td>Dooley</td>
      
      </tr>
	   <tr>
        <td>State</td>
        <td>Dooley</td>
      
      </tr>
    </tbody>
  </table>
        </div>	  			
      </div>			
      
    </div>
  </div>
  <div class="clear-fix"></div>
</div>
  
  
  <!------map icon click popup html end----->
	  
	  
	  
    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo FRONT_END_LAYOUT;?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT;?>/assets/dist/js/clipboard.min.js"></script>
	 <script>
    var clipboard = new Clipboard('.copy_btn');
		 
    </script>
<script type="text/javascript" id="st_insights_js" src="http://w.sharethis.com/button/buttons.js?publisher=0e5bff82-49bf-4394-af17-0b89ab67835f"></script>
<script type="text/javascript">stLight.options({publisher: "0e5bff82-49bf-4394-af17-0b89ab67835f", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo FRONT_END_LAYOUT;?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo FRONT_END_LAYOUT;?>/assets/dist/js/app.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/formValidation.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/bootstrap.js"></script>	
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/js/validations.js"></script>


	  <script>  
		function click_trigger_btn(){
            var l = document.getElementById('hidden_button');
			l.click();
		}		
		  
var theme_arr = [];		  
		 
var pale_dawn = [{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"},{"visibility":"off"}]},
{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"},{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"off"},{"color":"#e4d7c6"}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20},{"visibility":"off"}]}, {"featureType": "road.arterial","elementType": "labels","stylers": [{"visibility": "off"}]},{"featureType": "road.highway","elementType": "labels","stylers":[{"visibility": "off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"},{"visibility":"off"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"},{"lightness":33}]}];  

		  //administrative,road.highway(labels ,geometry),road,road.local,poi.park
		  		  
var unsaturated_browns = [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"elementType":"geometry","stylers":[{"hue":"#ff4400"},{"saturation":-68},{"lightness":-4},{"gamma":0.72}]},{"featureType":"road","stylers":[{"lightness":20},{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"hue":"#0077ff"},{"gamma":3.1}]},{"featureType":"water","stylers":[{"hue":"#00ccff"},{"gamma":0.44},{"saturation":-33}]},{"featureType":"poi.park","stylers":[{"hue":"#44ff00"},{"saturation":-23},{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"hue":"#007fff"},{"gamma":0.77},{"saturation":65},{"lightness":99}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"gamma":0.11},{"weight":5.6},{"saturation":99},{"hue":"#0091ff"},{"lightness":-86}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"lightness":-48},{"hue":"#ff5e00"},{"gamma":1.2},{"saturation":-23}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"saturation":-64},{"hue":"#ff9100"},{"lightness":16},{"gamma":0.47},{"weight":2.7}]},{"featureType":"road.local","elementType":"labels","stylers":[{"color":"#fbfaf7"},{"visibility":"off"}]}, {"featureType": "road.arterial","elementType": "labels","stylers": [{"visibility": "off"}]},{"featureType": "road.highway","elementType": "labels","stylers":[{"visibility": "off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"},{"visibility":"off"}]}];
		  
		  

var dropoff = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#5d7e9e"},{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#e6f3d6"},{"visibility":"off"}]},{"featureType":"road","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#f4f4f4"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#787878"},{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#eaf6f8"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#eaf6f8"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"off"},{"color":"#f4a8a8"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]}];	
		  
	  
		  
		  
var bright_and_bubbly =  [{"featureType":"water","stylers":[{"color":"#19a0d8"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"color":"#ffffff"},{"weight":6}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"off"},{"color":"#e85113"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"},{"color":"#efe9e4"},{"lightness":-40}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"visibility":"off"},{"color":"#efe9e4"},{"lightness":-20}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"lightness":100}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"lightness":20},{"color":"#efe9e4"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"visibility":"off"},{"hue":"#11ff00"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"lightness":100}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"},{"hue":"#4cff00"},{"saturation":58}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"},{"color":"#f0e4d3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"off"},{"color":"#efe9e4"},{"lightness":-25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"visibility":"off"},{"color":"#efe9e4"},{"lightness":-10}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"off"},{"lightness":-100}]}] ;		  

		  
	//administrative,road.highway(labels ,geometry),road,road.local,poi.park
	  
var	greyscale = [{"featureType":"all","elementType":"all","stylers":[{"saturation":-100},{"gamma":0.5}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"off"}]}, {"featureType": "road.arterial","elementType": "labels","stylers": [{"visibility": "off"}]},{"featureType": "road.highway","elementType": "labels","stylers":[{"visibility": "off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"}]}];	

		  
		  
		  
var shift_worker = [{"stylers":[{"saturation":-100},{"gamma":1},{"visibility":"off"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"gamma":1},{"visibility":"off"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"saturation":50},{"gamma":0},{"hue":"#50a5d1"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#333333"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"weight":0.5},{"color":"#333333"}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"gamma":1},{"saturation":50}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"off"}]}, {"featureType": "road.arterial","elementType": "labels","stylers": [{"visibility": "off"}]},{"featureType": "road.highway","elementType": "labels","stylers":[{"visibility": "off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"off"}]}];






	$(document).ready(function(){
		
		$(".share_map_model").click(function(){
			var id = this.id;
		$("#share-map-model .share_input").val(MAP_SHARE_LINK+id);
		$("#share-map-model").modal('show');
		});
		    $("#success_msg").fadeOut(6000);
		    var theme , selected_theme , template;
		    selected_theme =  $("#saved_THEME").html();
		    selected_theme = eval("(" + selected_theme + ")");
		    template = $('#selected_theme_name').val();
		
		    $('.template').click(function(){
			    template = $(this).attr('template');
			   if(template=="shift_worker"){
				  var styledMap = {map: map, name: 'minimial'}; 
				  var MapType = new google.maps.StyledMapType(shift_worker,styledMap); 
				  map.mapTypes.set('minimal', MapType); 
				  map.setMapTypeId('minimal');	
				  theme = shift_worker;
				  selected_theme = shift_worker;
			   }else if(template=="greyscale"){
				  var styledMap = {map: map, name: 'minimial'}; 
				  var MapType = new google.maps.StyledMapType(greyscale,styledMap); 
				  map.mapTypes.set('minimal', MapType); 
				  map.setMapTypeId('minimal');
				  theme = greyscale;				   
				  selected_theme = greyscale;				   
			   }else if(template=="bright_and_bubbly"){
				  var styledMap = {map: map, name: 'minimial'}; 
				  var MapType = new google.maps.StyledMapType(bright_and_bubbly,styledMap); 
				  map.mapTypes.set('minimal', MapType); 
				  map.setMapTypeId('minimal');
				  theme = bright_and_bubbly;				   
				  selected_theme = bright_and_bubbly;				   
			   }else if(template=="dropoff"){
				  var styledMap = {map: map, name: 'minimial'}; 
				  var MapType = new google.maps.StyledMapType(dropoff,styledMap); 
				  map.mapTypes.set('minimal', MapType); 
				  map.setMapTypeId('minimal');
				  theme = dropoff;				   
				  selected_theme = dropoff;				   
			   }else if(template=="unsaturated_browns"){
				  var styledMap = {map: map, name: 'minimial'}; 
				  var MapType = new google.maps.StyledMapType(unsaturated_browns,styledMap); 
				  map.mapTypes.set('minimal', MapType); 
				  map.setMapTypeId('minimal');
				  theme = unsaturated_browns;				   
				  selected_theme = unsaturated_browns;				   
			   }else if(template=="pale_dawn"){
				  var styledMap = {map: map, name: 'minimial'}; 
				  var MapType = new google.maps.StyledMapType(pale_dawn,styledMap); 
				  map.mapTypes.set('minimal', MapType); 
				  map.setMapTypeId('minimal');
				  theme = pale_dawn;				   
				  selected_theme = pale_dawn;				   
			   }
				

				theme = JSON.stringify(theme); 
                $('#selected_theme').html(theme);
				$('#selected_theme_name').val(template);
                $(".map_styling").removeAttr('checked');				
			});
		
	
		var styled_theme="";
		
		$(document).on("change",".map_styling",function(){
			var style = $(this).attr('prop');
			if($(this).prop('checked') == true){
				//alert(template);
			   if(template=="unsaturated_browns"){
				   //alert(style);
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   //console.log(selected_theme);
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}					
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"color":"#c5c6c6"},{"visibility":"on"}];
							}						
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road'){
								selected_theme[i].stylers = [{"lightness":20},{"visibility":"on"}];
							}						
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.arterial'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }

				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='poi.park'){
								selected_theme[i].stylers = [{"hue":"#44ff00"},{"saturation":-23},{"visibility":"on"},{"visibility":"on"}];
							}						
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }
			   if(template=="pale_dawn"){
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'){
								selected_theme[i].stylers = [{"visibility":"on"},{"lightness":33}];
							}					
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"color":"#c5c6c6"},{"visibility":"on"}];
							}						
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road'){
								selected_theme[i].stylers = [{"lightness":20},{"visibility":"on"}];
							}						
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"color":"#e4d7c6"},{"visibility":"on"}];
							}						
						}				   
				   }

				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='poi.park'  && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"color":"#c5dac6"},{"visibility":"on"}];
							}						
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }
				
			   if(template=="dropoff"){
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'){
								selected_theme[i].stylers = [{"color":"#5d7e9e"},{"visibility":"on"}];
							}					
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"simplified"},{"color":"#f4a8a8"}];
							}						
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road'){
								selected_theme[i].stylers = [{"saturation":-100},{"lightness":45},{"visibility":"simplified"}];
							}						
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='labels.text.fill'){
								selected_theme[i].stylers = [{"color":"#787878"},{"visibility":"on"}];
							}						
						}				   
				   }

				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='poi.park'  && selected_theme[i].elementType=='geometry.fill'){
								selected_theme[i].stylers = [{"color":"#e6f3d6"},{"visibility":"on"}];
							}						
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }	
				

				
			   if(template=="bright_and_bubbly"){
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'   && selected_theme[i].elementType=='labels.text.stroke'){
								selected_theme[i].stylers = [{"color":"#ffffff"},{"weight":6},{"visibility":"on"}];
							}
							if(selected_theme[i].featureType=='administrative'   && selected_theme[i].elementType=='labels.text.fill'){
								selected_theme[i].stylers = [{"color":"#e85113"},{"visibility":"on"}];
							}								
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels.icon'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry.stroke'){
								selected_theme[i].stylers = [{"visibility":"on"},{"color":"#efe9e4"},{"lightness":-40}];
							}
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry.fill'){
								selected_theme[i].stylers = [{"visibility":"on"},{"color":"#efe9e4"},{"lightness":-25}];
							}								
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road' && selected_theme[i].elementType=='labels.text.stroke'){
								selected_theme[i].stylers = [{"visibility":"on"},{"lightness":100}];
							}	

							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='geometry.stroke'){
								selected_theme[i].stylers = [{"visibility":"on"},{"color":"#efe9e4"},{"lightness":-20}];
							}
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='geometry.fill'){
								selected_theme[i].stylers = [{"visibility":"on"},{"color":"#efe9e4"},{"lightness":-10}];
							}							
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road' && selected_theme[i].elementType=='labels.text.fill'){
								
								selected_theme[i].stylers = [{"color":"#0d0d0d"},{"visibility":"on"}];
							}								
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='labels.icon'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}
						
						}				   
				   }	
				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.text.fill'){
								selected_theme[i].stylers = [{"hue":"#11ff00"},{"visibility":"on"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.text.stroke'){
								selected_theme[i].stylers = [{"lightness":100},{"visibility":"on"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.icon'){
								selected_theme[i].stylers = [{"hue":"#4cff00"},{"saturation":58},{"visibility":"on"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"on"},{"color":"#f0e4d3"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"simplified"}];
							}							
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }				
				
			   if(template=="greyscale"){
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}					
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }

				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='poi.park'){
								selected_theme[i].stylers = [{"color":"#ecffe6"},{"visibility":"on"}];
							}	
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.text.fill'){
								selected_theme[i].stylers = [{"hue":"#11ff00"},{"visibility":"on"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.text.stroke'){
								selected_theme[i].stylers = [{"lightness":100},{"visibility":"on"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.icon'){
								selected_theme[i].stylers = [{"hue":"#4cff00"},{"saturation":58},{"visibility":"on"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"on"},{"color":"#ecffe6"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"simplified"}];
							}								
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }			
								
			   if(template=="shift_worker"){
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}					
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"on"}];
							}						
						}				   
				   }

				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){

							if(selected_theme[i].featureType=='poi' ){
								selected_theme[i].stylers = [{"saturation":-100},{"gamma":1},{"visibility":"on"}];
							}								
							
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }			
									
				
			}else{
			   if(template=="unsaturated_browns"){
			        if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}					
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway'  && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }					   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.arterial'  && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }	
				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='poi.park'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }
				   
				   styled_theme = selected_theme;
			   }
			   if(template=="pale_dawn"){
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'){
								selected_theme[i].stylers = [{"visibility":"off"},{"lightness":33}];
							}					
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"color":"#c5c6c6"},{"visibility":"off"}];
							}						
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road'){
								selected_theme[i].stylers = [{"lightness":20},{"visibility":"off"}];
							}						
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.arterial'){
								selected_theme[i].stylers = [{"color":"#e4d7c6"},{"visibility":"off"}];
							}						
						}				   
				   }

				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='poi.park'  && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"color":"#c5dac6"},{"visibility":"off"}];
							}						
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }
				
			   if(template=="dropoff"){
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'){
								selected_theme[i].stylers = [{"color":"#5d7e9e"},{"visibility":"off"}];
							}					
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"off"},{"color":"#f4a8a8"}];
							}						
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road'){
								selected_theme[i].stylers = [{"saturation":-100},{"lightness":45},{"visibility":"off"}];
							}						
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='labels.text.fill'){
								selected_theme[i].stylers = [{"color":"#787878"},{"visibility":"off"}];
							}						
						}				   
				   }

				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='poi.park'  && selected_theme[i].elementType=='geometry.fill'){
								selected_theme[i].stylers = [{"color":"#e6f3d6"},{"visibility":"off"}];
							}						
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }				

				   if(template=="bright_and_bubbly"){
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'   && selected_theme[i].elementType=='labels.text.stroke'){
								selected_theme[i].stylers = [{"color":"#ffffff"},{"weight":6},{"visibility":"off"}];
							}
							if(selected_theme[i].featureType=='administrative'   && selected_theme[i].elementType=='labels.text.fill'){
								selected_theme[i].stylers = [{"color":"#e85113"},{"visibility":"off"}];
							}								
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels.icon'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry.stroke'){
								selected_theme[i].stylers = [{"visibility":"off"},{"color":"#efe9e4"},{"lightness":-40}];
							}
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry.fill'){
								selected_theme[i].stylers = [{"visibility":"off"},{"color":"#efe9e4"},{"lightness":-25}];
							}								
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road' && selected_theme[i].elementType=='labels.text.stroke'){
								selected_theme[i].stylers = [{"visibility":"off"},{"lightness":100}];
							}	

							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='geometry.stroke'){
								selected_theme[i].stylers = [{"visibility":"off"},{"color":"#efe9e4"},{"lightness":-20}];
							}
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='geometry.fill'){
								selected_theme[i].stylers = [{"visibility":"off"},{"color":"#efe9e4"},{"lightness":-10}];
							}							
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road' && selected_theme[i].elementType=='labels.text.fill'){
								
								selected_theme[i].stylers = [{"color":"#0d0d0d"},{"visibility":"off"}];
							}								
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='labels.icon'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}
						
						}				   
				   }	
				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.text.fill'){
								selected_theme[i].stylers = [{"hue":"#11ff00"},{"visibility":"off"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.text.stroke'){
								selected_theme[i].stylers = [{"lightness":100},{"visibility":"off"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.icon'){
								selected_theme[i].stylers = [{"hue":"#4cff00"},{"saturation":58},{"visibility":"off"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"off"},{"color":"#f0e4d3"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}							
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }				
							
			   if(template=="greyscale"){
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}					
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }

				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='poi.park'){
								selected_theme[i].stylers = [{"color":"#ecffe6"},{"visibility":"off"}];
							}	
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.text.fill'){
								selected_theme[i].stylers = [{"hue":"#11ff00"},{"visibility":"off"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.text.stroke'){
								selected_theme[i].stylers = [{"lightness":100},{"visibility":"off"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels.icon'){
								selected_theme[i].stylers = [{"hue":"#4cff00"},{"saturation":58},{"visibility":"off"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"off"},{"color":"#ecffe6"}];
							}
							if(selected_theme[i].featureType=='poi'  && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}								
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }				

			   if(template=="shift_worker"){
                    if(styled_theme){
					 selected_theme = styled_theme;
					}
				   if(style=="administrative"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='administrative'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}					
						}				   
				   }
				   if(style=="road.highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }
				   if(style=="highway"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.highway' && selected_theme[i].elementType=='geometry'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }				   
				   if(style=="road"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }	
				   	if(style=="road.local"){
						for (var i=0; i<selected_theme.length; i++){
							if(selected_theme[i].featureType=='road.arterial' && selected_theme[i].elementType=='labels'){
								selected_theme[i].stylers = [{"visibility":"off"}];
							}						
						}				   
				   }

				   	if(style=="poi.park"){
						for (var i=0; i<selected_theme.length; i++){

							if(selected_theme[i].featureType=='poi' ){
								selected_theme[i].stylers = [{"saturation":-100},{"gamma":1},{"visibility":"off"}];
							}								
							
						}				   
				   }					   
				   styled_theme = selected_theme;
			   }					
	
			} 
			
		//console.log(selected_theme);
			  var styledMap = {map: map, name: 'minimial'}; 
			  var MapType = new google.maps.StyledMapType(selected_theme,styledMap); 
			  map.mapTypes.set('minimal', MapType); 
			  map.setMapTypeId('minimal');			
			  selected_theme = JSON.stringify(selected_theme); 
              $('#selected_theme').html(selected_theme);
			  $('#selected_theme_name').val(template);			
		
		});



	/*	
		$(document).on('click','#save_map',function(){
            $('#saving_map').html('').show();				
			$('#saving_map').html('<span style="font-size:15px;" ><i class="fa fa-spinner fa-spin" style="font-size:17px;" ></i> Saving your map , please wait ...</span>');				
				//console.log(map.getGeoJson());
			var cur_lat_lon = $('#cur_lat_lon').val();
			var zoom = $('#cur_zoom').val();
			var theme = $('#selected_theme').html();
			var theme_name = $('#selected_theme_name').val();
			var id = $(this).attr('map_id');
			//var map_json = map.getGeoJson();
			//var json = JSON.stringify(map_json); 
			var json = $('#map_shapes_json').html();
			var pre_json = "";
		    $.post( BASEURL+'/map/map_json', { id : id }, function( data ) {
			  data = eval("("+data+")");
			  if(data.result=='success'){
				 pre_json = data.map_json;
				 if(pre_json){
					  var comma='';
					  if(json){
						comma = ",";
					  }
				  json = pre_json+comma+json;
				 }
			  }else if(data.result=='error'){
				 console.log('******* There was some error generating map json ********* ');
			  }

				//alert(json);
			  $.post( BASEURL+'/map/update_map_json', { map_json: json , id : id , cur_lat_lon : cur_lat_lon , zoom : zoom , theme : theme , theme_name : theme_name }, function( data ) {
				   data = eval("("+data+")");
				  if(data.result=='success'){
					// window.location.href=BASEURL+"/account/dashboard";
					  $('#saving_map').html('<span style="font-size:15px;color:limegreen" ><i class="fa fa-check-square" style="font-size:17px;"></i></i> Map saved saved successfully.</span>').fadeOut(4000);

				  }else if(data.result=='error'){
					 console.log('******* There was some saving map json ********* ');
				  }
			   });				
					   
			 });
    	
		});
		*/
		
		
$(document).on('click','#save_map',function(){
            $('#saving_map').html('').show();				
			$('#saving_map').html('<span style="font-size:15px;" ><i class="fa fa-spinner fa-spin" style="font-size:17px;" ></i> Saving your map , please wait ...</span>');				
			var cur_lat_lon = $('#cur_lat_lon').val();
			var zoom = $('#cur_zoom').val();
			var theme = $('#selected_theme').html();
			var theme_name = $('#selected_theme_name').val();

			var id = $(this).attr('map_id');
			var json = $('#map_shapes_json').html();
	
			var highways = $('#highways').prop("checked");
			var highway_labels = $('#highway_labels').prop("checked");
			var roads = $('#roads').prop("checked");
			var road_labels = $('#road_labels').prop("checked");
			var administrative = $('#administrative').prop("checked");
			var poi = $('#poi').prop("checked");
			var labels = $('#labels').prop("checked");
	

			  $.post( BASEURL+'/map/update_map_json', { map_json: json , id : id , cur_lat_lon : cur_lat_lon , zoom : zoom , theme : theme , theme_name : theme_name , highways : highways, highway_labels : highway_labels, roads : roads, road_labels : road_labels, administrative : administrative, poi : poi, labels : labels}, function( data ) {
				   data = eval("("+data+")");
				  if(data.result=='success'){
					  $('#saving_map').html('<span style="font-size:15px;color:limegreen" ><i class="fa fa-check-square" style="font-size:17px;"></i></i> Map saved saved successfully.</span>').fadeOut(4000);
				  }else if(data.result=='error'){
					 console.log('******* There was some saving map json ********* ');
				  }
			   });				
					   
			 });
    		
			
		 $('#cate_filter').on('click',function(){
				var map_id = $('#save_map').attr('map_id');				
				if(map_id){
				   $.post( BASEURL+'/map/map_data_sets', { id : map_id }, function( data ) {
					   data = eval("("+data+")");
					  if(data.result=='success'){
						   var map_json = JSON.parse(data.map_json);
						    console.log(map_json);
                            map.data.addGeoJson(map_json);
					  }else if(data.result=='error'){
						// console.log('******* There was some error fetching map data ********* ');
					  }
				   });				
				}
			});
	

			$('#save_map_').click(function(){

			});
		/*    
			$('#hidden_button').click(function(){
				var map_id = $('#save_map').attr('map_id');				
				if(map_id){
				   $.post( BASEURL+'/map/map_json', { id : map_id }, function( data ) {
					   data = eval("("+data+")");
					  if(data.result=='success'){
						   var map_json = JSON.parse(data.map_json);
						    console.log(map_json);
                            map.data.addGeoJson(map_json);
					  }else if(data.result=='error'){
						// console.log('******* There was some error fetching map data ********* ');
					  }
				   });				
				}
			});
*/
	  var json_string = "";
		  $('#form_data_sets_submit').click(function(){
			  var i =0;
			  var marker=[];
				 $('input:checkbox[name=chklocation]:checked').map(function(){
					 	 var id = $(this).attr("map_id");
						 $.post(BASEURL+"/map/map_sub_data",{cate_id:id},function(rdata){
							 
							rdata=eval("("+rdata+")");
							 for(var k=0;k<rdata.length;k++){
									var icon = BASEURL+'/assets/markers/'+rdata[k].color_code+'.png';
									var latLng = new google.maps.LatLng(rdata[k].latitude,rdata[k].longitude); 
										marker[i] = new google.maps.Marker({
										position: latLng,
										map: map,
										icon:icon,
										title: rdata[k].store_type,
										desc:rdata[k].description
									}); 
										  
									  google.maps.event.addListener(marker[i], 'dblclick', function(e) {
											var latlng=this.getPosition(); 
											var geocoder = new google.maps.Geocoder;
											var contentString = this.desc;
											var infowindow = new google.maps.InfoWindow({
												 content: contentString,
												 position: latlng
											});
											infowindow.open(map, marker[i]);		   
										});
									 i++;
									 json_string  = '"type":"DATA_SET_MARKER","id":"DATA_SET_MARKER'+k+'","geometry":['+rdata[k].latitude+','+rdata[k].longitude+'],"icon":"'+icon+'","description":"'+rdata[k].description+'"';
				
				  $('#shapes_input').append('<textarea id="DATA_SET_MARKER'+k+'" type="text" class="form-control all_json" >'+json_string+'</textarea>');								 
								 }
				
							 
							 
							 
			  //json_string = json_string.substring(1, json_string.length);
			//  console.log(json_string);
							// alert('test');
			 //$('#map_shapes_json').html(json_string);
			 // $('#save_map').trigger('click');
			  $('#myLayer').modal('hide');	
					 });
				 
					  });

					
				 });	
		
		
		/*  var json_string = "";
		  $('#form_data_sets_submit').click(function(){
			  var i =0;
			  var marker=[];
			 $('input:checkbox[name=chklocation]:checked').map(function(){
				 var size =  $('input:checkbox[name=chklocation]:checked').size();
				 var icon = BASEURL+'/assets/markers/'+$(this).attr("icon")+'.png';
				 var latLng = new google.maps.LatLng($(this).attr("latitude"),$(this).attr("longitude")); 
				 // Creating a marker and putting it on the map
				 marker[i] = new google.maps.Marker({
					position: latLng,
					map: map,
					icon:icon,
					title: $(this).attr("title")
				 }); 
				 var desc=$(this).attr('description');
	   google.maps.event.addListener(marker[i], 'dblclick', function() {

			var latlng=this.getPosition();  
			var geocoder = new google.maps.Geocoder;
				var contentString = desc;
				var infowindow = new google.maps.InfoWindow({
				 content: contentString,
			  	 position: latlng
			});
			    infowindow.open(map, marker[i]);		   
		});
				 i++;
		  				 

json_string  += ',{"type":"DATA_SET_MARKER","id":null,"geometry":['+$(this).attr("latitude")+','+$(this).attr("longitude")+'],"icon":"'+icon+'","description":"'+$(this).attr('description')+'"}';
			 });
			  json_string = json_string.substr(1,json_string.lenght);
			  $('#map_shapes_json').html(json_string);
			  $('#save_map').trigger('click');
			  $('#myLayer').modal('hide');
		  });	
  /*        	$('#category_combo').change(function(){
				var category_id = $(this).val();				
				if(category_id){		
				   $('#loading_data').html('<i class="fa fa-spinner fa-2x  fa-spin " ></i> <span style="font-size:16px;">Loading details ...</span>');
				   $.post( BASEURL+'/map/map_data_sets', { category_id : category_id }, function( data ){
					   var ischecked= $('#layer #checkAll').is(':checked');
                    if(ischecked){
					  $('#layer #checkAll').attr('checked', false);
					}
                     $('#filtered_location').html('');
					  $('#loading_data').html('');
					  data = eval("("+data+")");
					  if(data.result=='success'){
						   var locations = data.locations;
						   console.log(locations);
						   var location_html = '';
						   var i;
						   for (i = 0; i < locations.length; ++i) {
							 location_html +='<tr><td><input name="chklocation[]" type="checkbox" value="'+locations[i].id+'"></td><td>'+locations[i].category+'</td><td>'+locations[i].address+'</td><td>'+locations[i].city+'</td><td>'+locations[i].state+'</td><td>'+locations[i].country+'</td></tr>';
						   }
						  
						   $('#filtered_location').prepend(location_html);
					  }else if(data.result=='error'){
						// console.log('******* There was some error fetching map data ********* ');
					  }
				   });				
				}
			});	*/
		
		$("#map_data_set_1").click(function(){
				$("#myLayer").modal('show');	
			get_filtered_data(1);
		});
			
		$(".filter_data_click").on('click',function(e){
			e.preventDefault();
			
			
			get_filtered_data(1);
		});
		$(".filter_data_change").on('change',function(e){
			e.preventDefault();
			
			
			get_filtered_data(1);
		});
		$(".filter_sort").on('click',function(e){
		e.preventDefault();
			
			var sort_id = this.id;
			get_filtered_data(1,sort_id);
		});
			
		$("#layer #checkAll").click(function (){
			if ($("#layer #checkAll").is(':checked')) {
				$("#layer input[type=checkbox]").each(function () {
					$(this).prop("checked", true);
				});

			} else {
				$("#layer input[type=checkbox]").each(function () {
					$(this).prop("checked", false);
				});
			}
		});
		
			$('#transaction').DataTable();
			//$('#layer').DataTable();
			$('#user_pack_detail').DataTable();
		});
	  </script>	
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/dist/js/imageuploadify.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT;?>/assets/dist/js/jquery.mCustomScrollbar.concat.min.js"></script>
  
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
	 
<script>
		(function($){
			$(window).load(function(){
				
				$("#content-1").mCustomScrollbar({
					autoHideScrollbar:true,
				});
				
			});
		$(document).ready(function(){
		$('.navbar.navbar-inverse.sidebar').hover(function(){
		},function(){
			
		$("#service").removeClass('in');	
			
		});	
			
		});
		})(jQuery);
</script>
	
	<script>
		(function($){
			$(window).load(function(){
				
				$("#content-1").mCustomScrollbar({
					autoHideScrollbar:true,
				});
				
			});
		$(document).ready(function(){
		$('.navbar.navbar-inverse.sidebar').hover(function(){
		},function(){
			
		$("#choose-color").removeClass('in');	
			
		});	
			
		});
		})(jQuery);
</script>	
<script>
		(function($){
			$(window).load(function(){
				
				$("#content-1").mCustomScrollbar({
					autoHideScrollbar:true,
				});
				
			});
		$(document).ready(function(){
		$('.navbar.navbar-inverse.sidebar').hover(function(){
		},function(){
			
		$("#markers-color").removeClass('in');	
			
		});	
			
		});
		})(jQuery);
</script>										
  <script>
	 $(document).ready(function() {
		  $('.map_icon_color').click(function(){
		      var color_marker = $(this).attr('color');
			  $('#marker_color').html(color_marker);
		  });
	  });
</script>		
<script>
$('#markers-color .color-side i').on('click', function(){
    $('.color-side i.current').removeClass('current');
    $(this).addClass('current');
});
</script>
	 <script type="text/javascript">
            $(document).ready(function() {
                $('input[type="file"]').imageuploadify();
				
				
            });
		
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
		
		function get_filtered_data(page_number,sort_id){
		
			if(sort_id !== undefined )
			{
				var sort = sort_id;
				var sort_by = $("#"+sort_id).attr("sort_by");
				if(sort_by == "ASC")
				{
					$("#"+sort_id).attr("sort_by",'DESC');
					$(".arrow_up ").hide();
					$(".arrow_down ").show();
				}
				else
				{
					
					$(".arrow_up ").show();
					$(".arrow_down ").hide();
					$("#"+sort_id).attr("sort_by",'ASC');
				}	
				
			}
			
			var cate_name = $("#category_combo").val();
			var search=$("#search_input").val();
			var current_page=page_number;
			var per_page=$("#per_page").val();
			$("#loader").html('<i class="fa fa-spin fa-spinner" style="font-size:30px;color:red"></i>');
			$.post( BASEURL+'/map/map_data_sets',{sort:sort,sort_by:sort_by,category_name:cate_name,search:search,curr_page:page_number,per_page:per_page},function(result){				 
			$("#loader").html("");
					$("#filtered_location").html(result);
			});
		}
	</script>
	

	
	