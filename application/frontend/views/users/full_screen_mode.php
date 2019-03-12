<style>

    #search input{ top: 61px !important; 	left: 60px !important;}
	#options{ left:60px !important; bottom:80px !important;}
	.color-button {
    width: 40px !important;
    height: 40px !important;
	}
.change-bg i:hover {
    color:#fff!important;
}
.color-side{color:#8AD5DD !important;}
#choose-color li:hover {
    color:#fff!important;
	background: #000;
}
#color-palette{padding-bottom:43px !important}
.color-side i{font-size:30px; padding:10px 0px}

#choose-color{
max-height: 100px !important;
float: left;
width: 100%;
border-bottom: 1px solid #2e2e2e; 
}
#choose-color li{float:left; width:100%;border-bottom: 1px solid #2e2e2e;}
.map-side-img{display:inline-flex !important;}
.map-side-img:hover{padding:0px !important}
.map-side-img{padding:0px !important}
.map-side-img img{height:100% !important; width:100 !important%; margin:10px !important;}
#markers-color i{text-align:center; line-height:35px;}
#markers-color .color-side i.current{font-size:36px; font-weight:bold}
.bg-n li a:hover { background:transparent !important; opacity: .5;}
.bg-n li{border-bottom:0px solid !important}
.bg-n{background-color: #B1B1B1; float:left; width:100%}
</style>
<div class="content-wrapper" style=" height:100%;">
   <!--nav sidebar -->
   <aside>

				  <ul class="collapse" id="choose-color">
                     <li>
                        <div class="col-xs-4 color-side change-bg" id="delete-button">
                        </div>
                        <div class="col-xs-4 color-side change-bg" id="delete-all-button">
                        </div>
                        <div class="col-xs-4 color-side change-bg" data-toggle="collapse" data-target="#color-style" class="collapsed">
                        </div>
                     </li>
					  <ul class="collapse" id="color-style">
                     <li style="padding:5px 0px">
					 <div id="color-palette" style="width:100%"></div>
					 </li>
					 </ul>
					 </ul>

				   <li>
                     <a href="javascript:void(0);" id="save_map"  map_id="<?php echo $map_id; ?>" ></a>
                  </li>
				
		   
       
<!--********************************************** MAP REQUIRED HIDDEN FEILD *********************************************************-->
				<button type="button" id="hidden_button" style="display:none" ></button>
				<input type="hidden" id="cur_lat_lon"  />
				<input type="hidden" id="cur_zoom"  />
				<input type="hidden" id="saved_LAT" value="<?php echo $locationData['latitude'] ?>" />
				<input type="hidden" id="saved_LNG" value="<?php echo $locationData['longitude'] ?>" />
				<input type="hidden" id="saved_ZOOM" value="<?php echo $locationData['zoom'] ?>" />
				<div id="saved_THEME" style="display:none;"><?php echo $locationData['theme'] ?></div>
				<textarea name="theme" id="selected_theme" style="display:none;"><?php echo $locationData['theme'] ?></textarea>
				<div id="map_shapes_json" style="display:none;"><?php echo $locationData['map_json'] ?></div>
				<div id="map_data_set" style="display:none;"></div>
				<div id="map_data_set_string" style="display:none;"><?php echo $map_data_set; ?></div>
				<div id="saved_locations" style="display:none;"><?php echo $saved_locations; ?></div>
				<input type="hidden" id="selected_theme_name"  value="<?php echo $locationData['theme_name'] ?>"  />
				<input type="hidden" id="" value="AAA"  />

				<input class='slected_dataSet' type='hidden' />
				<div id="dataSetVal"></div>	

   </aside>
<!-- *************---------------------------------------- Map code ------------------------------------------**************  -->	
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:500,400" />
    <link rel="stylesheet" type="text/css" href="<?php
echo FRONT_END_LAYOUT; ?>/assets/css/radius_map_style.css"  />
	<style>
		.gmnoprint{top: 65px !important;}
		.gm-style span , .gmnoprint{display:none;}
		.gm-style a{display:none;}
      #color-palette {
        clear: both;
		  
      }	
      .color-button {
        width: 14px;
        height: 14px;
        font-size: 0;
        margin: 2px;
        float: left;
        cursor: pointer;
      }
		
	</style>

    <div id="map"></div>
	
    <?php  	
	$image = ($company['company_logo'])?$company['company_logo']:NO_IMAGE_FOUND; ?>	
<div class="company-logo-style"> <img src="<?php echo BASEURL.$image; ?>" style="width:80%; z-index: 999999;" /><br /><span class="comapany-name"><?php echo $company['company_name']; ?>
 
 </span></div>
	
	
    <form id="search">
        <input type="hidden" id="searchInput" name="searchInput" placeholder="Search for a place&hellip;" />
    </form>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHhYlEyElKtLO3FBx0bdMvGlSPbsvCAuo&amp;libraries=places,drawing"></script>
    <script type="text/javascript" src="<?php
echo FRONT_END_LAYOUT; ?>/assets/js/radius_map_pmode_app.js"></script>
	<script type="text/javascript" src="<?php echo FRONT_END_LAYOUT; ?>/assets/js/markerclusterer.js"></script>	
<!-- *************----------------------------------------------------------------------------------------------************* -->	

   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="clearfix"></div>