<style>
   .navbar-fixed-top { top:-2px; }
     #map{height: 100% !important; position: absolute !important; overflow: hidden !important;top: 0px;right: 0px;bottom: 0px;left: 0px;}
	.gm-bundled-control{top:52px !important;}   
	#options{ left:60px !important; bottom:80px !important;}
</style>
<div class="content-wrapper" style=" height:100%;">
   <!--nav sidebar -->
   <aside>
      <nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation">
         <div id="content-1" class="nav-side-menu content">
           
            <div class="menu-list">
               <ul id="menu-content" class="menu-content collapse out">
                  <li  data-toggle="collapse" class="collapsed active">
                     <a href="#">Drop Marker<img src="<?php
echo FRONT_END_LAYOUT; ?>/assets/images/dropmaker.png"/></a>
                  </li>
                  <li  class="collapsed">
                     <a href="#"> Draw Radius<img src="<?php
echo FRONT_END_LAYOUT; ?>/assets/images/drawradius.png"/></a>
                  </li>
				   <li  class="collapsed">
                     <a href="#" data-toggle="modal" data-target="#myLayer">Map Data Sets<img src="<?php
echo FRONT_END_LAYOUT; ?>/assets/images/map._dataset.png"/></a>
                  </li>
				   <li  class="collapsed">
                     <a href="#">Add Locations<img src="<?php
echo FRONT_END_LAYOUT; ?>/assets/images/add_location.png"/></a>
                  </li>
                  <li data-toggle="collapse" 	 class="collapsed">
                     <a href="#">Markers <img src="<?php
echo FRONT_END_LAYOUT; ?>/assets/images/markers.png"/> </a>
                  </li>
                  <li data-toggle="collapse" data-target="#service" class="collapsed">
                     <a href="#">Map Themes <img src="<?php
echo FRONT_END_LAYOUT; ?>/assets/images/map_theme.png"/> <span class="arrow"></span></a>
                  </li>
                <ul class="sub-menu collapse" id="service">
                  <li data-toggle="collapse" data-target="#service2" class="collapsed">
				  <a href="#">Preset Templates <span class="arrow"></span></a></li>
				  <ul class="sub-menu sub-menu2 collapse" id="service2" style="padding-bottom:20px">
                     <li>
                        <div class="col-sm-4 map-side">
                           <img src="<?php
echo FRONT_END_LAYOUT ?>/assets/dist/img/100.png"/>
                        </div>
                        <div class="col-sm-4 map-side">
                           <img src="<?php
echo FRONT_END_LAYOUT ?>/assets/dist/img/100.png"/>
                        </div>
                        <div class="col-sm-4 map-side">
                           <img src="<?php
echo FRONT_END_LAYOUT ?>/assets/dist/img/100.png"/>
                        </div>
                     </li>
                     <li>
                        <div class="col-sm-4 map-side">
                           <img src="<?php
echo FRONT_END_LAYOUT ?>/assets/dist/img/100.png"/>
                        </div>
                        <div class="col-sm-4 map-side">
                           <img src="<?php
echo FRONT_END_LAYOUT ?>/assets/dist/img/100.png"/>
                        </div>
                        <div class="col-sm-4 map-side">
                           <img src="<?php
echo FRONT_END_LAYOUT ?>/assets/dist/img/100.png"/>
                        </div>
                     </li>
                     <li>
                        <div class="col-sm-4 map-side">
                           <img src="<?php
echo FRONT_END_LAYOUT ?>/assets/dist/img/100.png"/>
                        </div>
                        <div class="col-sm-4 map-side">
                           <img src="<?php
echo FRONT_END_LAYOUT ?>/assets/dist/img/100.png"/>
                        </div>
                        <div class="col-sm-4 map-side">
                           <img src="<?php
echo FRONT_END_LAYOUT ?>/assets/dist/img/100.png"/>
                        </div>
                     </li>
                     <div class="clearfix"></div>
                  </ul>
					<li data-toggle="collapse" data-target="#service3" class="collapsed">
                     <a href="#">Map Styling<span class="arrow"></span></a>
                  </li>
				   <ul class="sub-menu sub-menu2 collapse" id="service3">
                     <li class="swith-button">
                        <h5>Highways</h5>
                        <label class="switch">
                           <input type="checkbox" checked>
                           <div class="slider round"></div>
                        </label>
                     </li>
                     <li class="swith-button">
                        <h5>Highway Labels</h5>
                        <label class="switch">
                           <input type="checkbox" >
                           <div class="slider round"></div>
                        </label>
                     </li>
                     <li class="swith-button">
                        <h5>Roads</h5>
                        <label class="switch">
                           <input type="checkbox" checked>
                           <div class="slider round"></div>
                        </label>
                     </li>
                     <li class="swith-button">
                        <h5>Road Labels</h5>
                        <label class="switch">
                           <input type="checkbox" checked>
                           <div class="slider round"></div>
                        </label>
                     </li>
                     <li class="swith-button">
                        <h5>Administrative</h5>
                        <label class="switch">
                           <input type="checkbox" >
                           <div class="slider round"></div>
                        </label>
                     </li>
                     <li class="swith-button">
                        <h5>Administrative </h5>
                        <label class="switch">
                           <input type="checkbox" checked>
                           <div class="slider round"></div>
                        </label>
                     </li>
                     <li class="swith-button">
                        <h5>Points of Interest</h5>
                        <label class="switch">
                           <input type="checkbox" >
                           <div class="slider round"></div>
                        </label>
                     </li>
                     <li class="swith-button">
                        <h5>Points of Interest</h5> 
                        <label class="switch">
                           <input type="checkbox" >
                           <div class="slider round"></div>
                        </label>
                     </li>
                     <li class="swith-button">
                        <h5>Interest Labels</h5>
                        <label class="switch">
                           <input type="checkbox" >
                           <div class="slider round"></div>
                        </label>
                     </li>
                     <div class="clearfix"></div>
                  </ul>
                  </ul>
                  <li>
                     <a href="javascript:void(0);" id="save_map"  map_id="<?php echo $map_id; ?>" > Save Map <img src="<?php
echo FRONT_END_LAYOUT; ?>/assets/images/save.png"/></a>
                  </li>
                  <li>
                     <a href="#"  > Share Map<img src="<?php
echo FRONT_END_LAYOUT; ?>/assets/images/share_map.png"/></a>
                  </li>
                  <li>
                     <a href="#"> Presentation Mode <img src="<?php
echo FRONT_END_LAYOUT; ?>/assets/images/presentation.png"/></a>
                  </li>
                  <li>
                     <a href="#"> Export Map to PDF<img src="<?php
echo FRONT_END_LAYOUT; ?>/assets/images/export_pdf.png"/></a>
                  </li>
				  <li class="hidden-sm hidden-md hidden-lg">
              <a href="<?php echo BASEURL;?>/account">
				  <span>Saved Maps</span>	
                        </a> 
              </li>
			  <li class="hidden-sm hidden-md hidden-lg">
              <a href="<?php echo BASEURL;?>/users/logout">
				  <span>Logout</span>	
                        </a> 
              </li>
               </ul>

				<button type="button" id="hidden_button" style="display:none" ></button>
            </div>
         </div>
      </nav>
   </aside>
<!-- *************---------------------------------------- Map code ------------------------------------------**************  -->	
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:500,400" />
    <link rel="stylesheet" type="text/css" href="<?php
echo FRONT_END_LAYOUT; ?>/assets/css/radius_map_style.css" />
	<style>
		.gmnoprint{top: 65px !important;}
		.gm-style span{display:none;}
		.gm-style a{display:none;}
	</style>
	
    <div id="map"></div>
<div class="company-logo-style"> <img src="<?php echo BASEURL.$userdata['company_logo']; ?>" style="width:80%; z-index: 999999;" /><br /><span class="comapany-name"><?php
	
	echo $userdata['company_name']; ?>
	
	</span></div>
    <form id="search">
        <input type="text" id="searchInput" name="searchInput" placeholder="Search for a place&hellip;" />
    </form>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHhYlEyElKtLO3FBx0bdMvGlSPbsvCAuo&amp;libraries=places,drawing"></script>
    <script type="text/javascript" src="<?php
echo FRONT_END_LAYOUT; ?>/assets/js/radius_map_app.js"></script>
<!-- *************----------------------------------------------------------------------------------------------************* -->	

   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="clearfix"></div>