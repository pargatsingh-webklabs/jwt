alert("test123"); 
var drawingManager;
      var all_overlays = [];
      var selectedShape;
      var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
      var selectedColor;
      var colorButtons = {};
      var total_shapes;
		var infowindow=[];
			var info=1;

      function clearSelection() {
        if (selectedShape) {
          //selectedShape.setEditable(false);
          selectedShape = null;
        }
      }

      function setSelection(shape) {
        clearSelection();
        selectedShape = shape;
       // shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
      }

      function deleteSelectedShape() {
        if (selectedShape) {
          selectedShape.setMap(null);
        }
      }

      function deleteAllShape() {
		
        for (var i=0; i < all_overlays.length; i++)
        {
          all_overlays[i].overlay.setMap(null);
        }
        all_overlays = [];
      }

      function selectColor(color) {
        selectedColor = color;
        for (var i = 0; i < colors.length; ++i) {
          var currColor = colors[i];
          colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }

        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.
        var polylineOptions = drawingManager.get('polylineOptions');
        polylineOptions.strokeColor = color;
        drawingManager.set('polylineOptions', polylineOptions);

        var rectangleOptions = drawingManager.get('rectangleOptions');
        rectangleOptions.fillColor = color;
        drawingManager.set('rectangleOptions', rectangleOptions);

        var circleOptions = drawingManager.get('circleOptions');
        circleOptions.fillColor = color;
        drawingManager.set('circleOptions', circleOptions);

        var polygonOptions = drawingManager.get('polygonOptions');
        polygonOptions.fillColor = color;
        drawingManager.set('polygonOptions', polygonOptions);
      }

      function setSelectedShapeColor(color) {
        if (selectedShape) {
          if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
            selectedShape.set('strokeColor', color);
          } else {
            selectedShape.set('fillColor', color);
          }
        }
      }

      function makeColorButton(color) {
        var button = document.createElement('span');
        button.className = 'color-button';
        button.style.backgroundColor = color;
        google.maps.event.addDomListener(button, 'click', function() {
          selectColor(color);
          setSelectedShapeColor(color);
        });

        return button;
      }

       function buildColorPalette() {
         var colorPalette = document.getElementById('color-palette');
         for (var i = 0; i < colors.length; ++i) {
           var currColor = colors[i];
           var colorButton = makeColorButton(currColor);
           colorPalette.appendChild(colorButton);
           colorButtons[currColor] = colorButton;
         }
         selectColor(colors[0]);
       }
		function getMiles(i) {
			 return i*0.000621371192;
		}


	  var newShape;
	  var shape;
	  var shapes  = [];
      function initialize() {
		  alert("test");
//***************************************************************************************************  
         var byId  = function(s){return document.getElementById(s)};
	  
		 var latLng;
		  var lat='',lng='',theme='',sa_zoom;
		  lat = document.getElementById("saved_LAT").value.trim();
		  lng = document.getElementById("saved_LNG").value.trim();
		  theme = document.getElementById("saved_THEME").innerHTML.trim();
		  console.log({lat:lat,lng:lng});
		  theme = eval("(" + theme + ")");
		  console.log(theme);
		  var style = theme;
		  var latlng = new google.maps.LatLng(lat, lng);
//-------------------------------------------------------------------------------------------------- 
		  
	  
		  
        map = new google.maps.Map(document.getElementById('map'), {	
          zoom: 10,
         // center: new google.maps.LatLng(22.344, 114.048),
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: true,
          zoomControl: true
        });
		  
		  
	//-------------------------------------------------
		var speedTest = {};
		speedTest.pics = null;
		speedTest.map = map;
		speedTest.markerClusterer = null;
		speedTest.markers = [];
		speedTest.infoWindow = null;
	//-------------------------------------------------
		var rdata=$("#saved_locations").html();
		console.log(rdata);
		if(rdata!=""){
			rdata=eval("("+rdata+")");
			var keys = [];
			for(var key in rdata){
				var colorcode_folder = key;
				speedTest.infoWindow = new google.maps.InfoWindow();							 
				speedTest.markers = [];
				var data =	rdata[key];
				for(var k=0;k<data.length;k++){
					var icon = BASEURL+'/assets/markers/'+data[k].color_code+'.png';								 
					var titleText = "Location Info";
					if (titleText === '') {
					   titleText = 'No title';
					}
					var latLngg = new google.maps.LatLng(data[k].latitude,data[k].longitude);
					var marker = new google.maps.Marker({
								'position': latLngg,
								'icon': icon,
								'desc':"<p><b>Store Type :</b> "+data[k].store_name+"</p><br/><p><b>Address :</b> "+data[k].address+"</p><br/><p><b>City :</b> "+data[k].city+"</p><br/><p><b>State :</b> "+data[k].state+"</p><br/><p><b>Zip Code :</b>"+data[k].zip_code+"</p><br/><p><b>Phone Number :</b> "+data[k].phone_number+"</p><br/><p><b>Country :</b> "+data[k].country+"</p><br/>"
					});
					speedTest.markers.push(marker);	

					google.maps.event.addListener(marker, 'click', function(e) {
						var latlng=this.getPosition();
						var contentString = this.desc;									
						var geocoder = new google.maps.Geocoder;
						var infowindow = new google.maps.InfoWindow({
							content: contentString,
							position: latlng
						});
						infowindow.open(map, marker);	
					});

				}
				window.setTimeout(speedTest.time, 0);
				var floder_cluster = BASEURL+'/assets/markers/'+colorcode_folder+'/m';
				//var floder_cluster = BASEURL+'/assets/markers/m';	
				//console.log(speedTest.markers);
				var start = new Date();
				speedTest.markerClusterer = new MarkerClusterer(speedTest.map, speedTest.markers, {imagePath:floder_cluster});
				var end = new Date();
				var time_taken = end - start;
				console.log("Time taken to load "+colorcode_folder+" category markers is : "+time_taken+"ms"); 
			} 
		}
		  
//******************************************************************************************************		  
  var styledMapOptions = {map: map, name: 'minimial'}; 
  var sMapType = new google.maps.StyledMapType(style,styledMapOptions); 
  map.mapTypes.set('minimal', sMapType); 
  map.setMapTypeId('minimal');  	
	
  sa_zoom = parseInt(document.getElementById("saved_ZOOM").value.trim());
  map.setZoom(sa_zoom);
  //map.setCenter(new google.maps.LatLng(lat,lng));
  // map.setCenter(new google.maps.LatLng(40.803, -74.097));
  latLng = map.getCenter().toUrlValue();		  
  document.getElementById("cur_lat_lon").value = latLng;	

	
google.maps.event.addListener(map, 'zoom_changed', function() {
    var zoom_level = map.getZoom();
    document.getElementById("cur_zoom").value = zoom_level;	
    latLng = map.getCenter().toUrlValue();
    document.getElementById("cur_lat_lon").value = latLng;	
});	
    var zoom_level = map.getZoom();
    document.getElementById("cur_zoom").value = zoom_level;		
	
//  map.data.loadGeoJson('https://storage.googleapis.com/maps-devrel/google.json');

  google.maps.event.addListenerOnce(map.data,'addfeature',function(){
    var btn=document.createElement('input');
    btn.type='button';
	btn.id='save_button';  
    btn.value='click here to test the geoJson-export in the right map';
    google.maps.event.addDomListener(btn,'click',function(){		
      console.log(map.getGeoJson());		
    });
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(btn);
  
  });
		  
	
	var searchBox,searchInput;
    searchInput = document.getElementById('searchInput');
    $(searchInput.form).on({
      submit: function() {
        return false;
      }
    });
    searchBox = new google.maps.places.SearchBox(searchInput);
	var markers , marker_location , marker_icon;
    google.maps.event.addListener(searchBox, 'places_changed', function() {
      /* When a place is selected, center on it */
      var location;
      location = searchBox.getPlaces()[0];

		console.log(location);
      if (location != null) {
        if (location.geometry.viewport != null) {
          map.fitBounds(location.geometry.viewport);
          map.panToBounds(location.geometry.viewport);
        } else {
          map.setCenter(location.geometry.location);
        }
		 
      /*  markers.push(new google.maps.Marker({
          position: location.geometry.location,
          map: map,
          title: location.name,
          clickable: false
        }));
	*/	 
		marker_location = location.geometry.location;
		marker_icon = BASEURL+'/assets/markers/'+document.getElementById('marker_color').innerHTML.trim()+'.png';
		markers = new google.maps.Marker({
			position: location.geometry.location,
			map: map,
			icon: marker_icon,
			title: "Searched location marker",
            animation: google.maps.Animation.DROP			
		});

		google.maps.event.addListener(markers, 'mouseover', function() { 
			var geocoder = new google.maps.Geocoder;
			geocoder.geocode({'location':marker_location }, function(results, status) {
			var contentString = results[1].formatted_address;
			var infowindow = new google.maps.InfoWindow({
			 content: contentString,
			 position: marker_location
			});
			infowindow.open(map, markers);
			});		   
		});
		  
		var random_number = Math.floor(Math.random() * 500000000) + 1 ;	
		var json_data =  {type:'MARKER_SEARCH',id:'marker_search'+random_number,geometry:marker_location,icon:marker_icon};
		console.log(json_data);
		json_data =  JSON.stringify(json_data).slice(1, -1);
		console.log(json_data);
		$('#shapes_input').append('<textarea id="marker_search'+random_number+'"   type="text" class="form-control all_json" >'+json_data+'</textarea>');
		  
	  
		  
      }
    });
    
	
			  
		  
//-------------------------------------------------------------------------------------------------------		  
		  
		  
		  

        var polyOptions = {
          strokeWeight: 0,
          fillOpacity: 0.45,
          editable: true
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.
	
		var marker_color = byId('marker_color').value;  
        drawingManager = new google.maps.drawing.DrawingManager({
		  drawingControlOptions: {
			position: google.maps.ControlPosition.RIGHT_TOP,
			drawingModes: [
			  google.maps.drawing.OverlayType.MARKER,
			  google.maps.drawing.OverlayType.POLYGON,
			  google.maps.drawing.OverlayType.POLYLINE,
			  google.maps.drawing.OverlayType.CIRCLE,
			  google.maps.drawing.OverlayType.RECTANGLE
			]
		  },
		markerOptions:{
		icon: BASEURL+'/assets/markers/'+document.getElementById('marker_color').innerHTML.trim()+'.png',
            animation: google.maps.Animation.DROP			
		},	
          polylineOptions: {
            editable: true
          },
          rectangleOptions: polyOptions,
          circleOptions: polyOptions,
          polygonOptions: polyOptions,
          map: map
        });

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
			if(event.type=="marker"){	
				event.overlay.setIcon(BASEURL+'/assets/markers/'+document.getElementById('marker_color').innerHTML.trim()+'.png');
			}

			all_overlays.push(event);
			drawingManager.setDrawingMode(null);
			shape   = event.overlay;
			shape.type  = event.type;
			
			google.maps.event.addListener(shape, 'click', function() {
			  setSelection(this);
			});
			setSelection(shape);
			
	google.maps.event.addListener(shape, 'mouseover', function() {

		  if(shape.type=="marker"){
			var latlng=this.getPosition();  
			var geocoder = new google.maps.Geocoder;
			geocoder.geocode({'location':latlng }, function(results, status) {
				var contentString = results[1].formatted_address;
				var infowindow = new google.maps.InfoWindow({
				 content: contentString,
			  	 position: latlng
			});
				
			   	infowindow.open(map, shape);
			google.maps.event.addListener(shape, 'mouseout', function() {
				infowindow.set(null);
				infowindow.close();
			});
			
			});
		  }	
	/*	  if(shape.type=="circle"){
            var circle = shape;
			var radius = circle.getRadius();
			var latlng=circle.getCenter();  
			   radius = Math.round(getMiles(radius));
			   var mile = (radius<=1) ? "mile" : "miles";
			   radius = "<h4><b>Circle covered :  </b>"+radius+"  "+mile+"</h4>";
				var contentString = radius;
				var infowindow = new google.maps.InfoWindow({
				 content: contentString,
			  	 position: latlng
			});
			   infowindow.open(map, shape);
	  
			  
		  }		*/			
		
		});
			

		  var i=1;	
		  if(shape.type=="circle"){
            var circle = shape;
			var radius = circle.getRadius();
			var latlng=circle.getCenter();  
			   radius = Math.round(getMiles(radius)*10)/10;
			   var mile = (radius<=1) ? "mile" : "miles";
			   radius = "<h4><b>Radius :  </b>"+radius+"  "+mile+"</h4>";
				var contentString = radius;
				var infowindow = new google.maps.InfoWindow({
				 content: contentString,
			  	 position: latlng
			});
			
				   // infowindow.open(map, shape);
					shape.addListener('mouseover', function() {
						infowindow.open(map, shape);
					});	
					shape.addListener('mouseout', function() {
						infowindow.close(map,this);
						
					});				  
			 
		  }  			
			google.maps.event.addListener(shape, 'radius_changed', function() {
				var contentString="";
				var circle = shape;
				var radius = circle.getRadius();
				var latlng=circle.getCenter();  
				   radius = Math.round(getMiles(radius)*10)/10;
				   var mile = (radius<=1) ? "mile" : "miles";
				   radius = "<h4><b>Radius :  </b>"+radius+"  "+mile+"</h4>";
					contentString = radius;
					var infowindow = new google.maps.InfoWindow({
					 content: contentString,
					 position: latlng
				});
				shape.addListener('mouseover', function() {
					infowindow.open(map, shape);
				});
				shape.addListener('mouseout', function() {
					infowindow.close(map,this);
					
				});				
				
			});	
			
			google.maps.event.addListener(shape, 'bounds_changed', function() {
				var contentString="";
				var circle = shape;
				var radius = circle.getRadius();
				var latlng=circle.getCenter();  
				   radius = Math.round(getMiles(radius)*10)/10;
				   var mile = (radius<=1) ? "mile" : "miles";
				   radius = "<h4><b>Radius :  </b>"+radius+"  "+mile+"</h4>";
					contentString = radius;
					var infowindow = new google.maps.InfoWindow({
					 content: contentString,
					 position: latlng
				});
				shape.addListener('mouseover', function() {
					infowindow.open(map, shape);
				});
				shape.addListener('mouseout', function() {
					infowindow.set(null);
					infowindow.close();
					
				});				
				
			});	
			
			

			shapes.push(shape);
			
         /* -------------------------------*/
        });
		  

		  
		  

        // Clear the current selection when the drawing mode is changed, or when the
        // map is clicked.
        google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
        google.maps.event.addListener(map, 'click', clearSelection);
        google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
       // google.maps.event.addDomListener(document.getElementById('delete-all-button'), 'click', deleteAllShape);
        google.maps.event.addDomListener(document.getElementById('delete-all-button'), 'click', deleteAllShape);

        buildColorPalette();

//*********************************************************************		  
		google.maps.event.addListener(map, "click", function (e) {
			 latLng = map.getCenter().toUrlValue();		  
			  document.getElementById("cur_lat_lon").value = latLng;	
		});
		click_trigger_btn();		  
//----------------------------------------------------------------------		  

	google.maps.event.addDomListener(byId('save_map'),'click',function(){
		console.log(shapes);
        var data=IO.IN(shapes,false);
		console.log(data);

	   var json="";
	   var jsonString="";
		
		$('.all_json').each(function(){	
			//alert('test');
			json = $(this).text();
			//alert(json);
            jsonString +=  ",{"+json+"}";			
		});
		jsonString = jsonString.substr(1,jsonString.lenght);
	   // var json_data =  JSON.stringify(data).slice(1, -1);
//alert(jsonString);
	    byId('map_shapes_json').innerHTML=jsonString;
    });
	var map_ShapeJson = document.getElementById("map_shapes_json").innerHTML.trim();

		if(map_ShapeJson!=''){
			map_ShapeJson = "["+map_ShapeJson+"]";			
          IO.OUT(JSON.parse(map_ShapeJson),map);
		}
	/*	  
	google.maps.event.addListener(map_ShapeJson, 'radius_changed', function() {
		alert('test//');
	 // console.log(circle.getRadius());
	});
  */
		  
		  

		  
		  
		  
}



function closeAllInfoWindows() {
  for (var i=0;i<infoWindows.length;i++) {
	  console.log(infoWindows[i]);
     infoWindows[i].close();
  }
}
function clear_load_clusters() {
  for (var i=0;i<markerClusterer_arr.length;i++) {
	  console.log(markerClusterer_arr[i]);
      markerClusterer_arr[i].clearMarkers();
  }	
}


function fixMyPageOnce() {	  
	$("#loading_page").html('');
	//$("#loading_page").removeClass('loading_center_logo');	
}

function show_info(obj){
		var ltln=obj.latLng.lat();

        var contentString = '<b>Rectangle moved.</b><br>' +
            'New north-east corner: ' + ne.lat() + ', ' + ne.lng() + '<br>' +
            'New south-west corner: ' + sw.lat() + ', ' + sw.lng();

        // Set the info window's content and position.
        infoWindow.setContent(contentString);
        infoWindow.setPosition(ne);

        infoWindow.open(map);

} 

var IO={
  //returns array with storable google.maps.Overlay-definitions
  IN:function(arr,//array with google.maps.Overlays
              encoded//boolean indicating whether pathes should be stored encoded
              ){
      var shapes     = [],
          goo=map,
          shape,tmp;
	  
	      if(total_shapes){
			total_shapes = total_shapes+1;	  
		  }else{
		    var total_shapes = 1;
		  }

      var id_shape = total_shapes;

      for(var i = 0; i < arr.length; i++)
      {   
        shape=arr[i];
        tmp={type:this.t_(shape.type)};        
        switch(tmp.type){
           case 'CIRCLE':
              tmp.id='circle'+id_shape+i;
              tmp.radius=shape.getRadius();
              tmp.color=shape.fillColor;
              tmp.geometry=this.p_(shape.getCenter());
				var json_data =  JSON.stringify(tmp).slice(1, -1);

			  $('#shapes_input').append('<textarea id="circle'+id_shape+i+'"  type="text" class="form-control all_json" >'+json_data+'</textarea>');
            break;
           case 'MARKER': 
			  tmp.id='marker'+id_shape+i;	
              tmp.geometry=this.p_(shape.getPosition());
              tmp.color=shape.fillColor;
			  tmp.icon=shape.icon;
				var json_data =  JSON.stringify(tmp).slice(1, -1);
			
			  $('#shapes_input').append('<textarea id="marker'+id_shape+i+'"   type="text" class="form-control all_json" >'+json_data+'</textarea>');
            break; 
           case 'marker': 

			  tmp.id='marker'+id_shape+i;	
              tmp.geometry=this.p_(shape.getPosition());
              tmp.color=shape.fillColor;
			  tmp.icon=shape.icon;
				var json_data =  JSON.stringify(tmp).slice(1, -1);
			
			  $('#shapes_input').append('<textarea id="marker'+id_shape+i+'"   type="text" class="form-control all_json" >'+json_data+'</textarea>');
            break;				
           case 'RECTANGLE':
			  tmp.id='rectangle'+id_shape+i;					
              tmp.geometry=this.b_(shape.getBounds());
              tmp.color=shape.fillColor;
				var json_data =  JSON.stringify(tmp).slice(1, -1);
			  $('#shapes_input').append('<textarea id="rectangle'+id_shape+i+'"   type="text" class="form-control all_json" >'+json_data+'</textarea>');
             break;   
           case 'POLYLINE':
			  tmp.id='polyline'+id_shape+i;					
              tmp.geometry=this.l_(shape.getPath(),encoded);
              tmp.color=shape.fillColor;
				var json_data =  JSON.stringify(tmp).slice(1, -1);
			  $('#shapes_input').append('<textarea id="polyline'+id_shape+i+'"   type="text" class="form-control all_json" > '+json_data+'</textarea>');
             break;   
           case 'POLYGON': 
			  tmp.id='polygon'+id_shape+i;					
              tmp.geometry=this.m_(shape.getPaths(),encoded);
              tmp.color=shape.fillColor;
				var json_data =  JSON.stringify(tmp).slice(1, -1);
			  $('#shapes_input').append('<textarea id="polygon'+id_shape+i+'" type="text" class="form-control all_json" >'+json_data+'</textarea>');
             break;   
       }
       shapes[tmp.id]=tmp;
    }

    return shapes;
  },
  //returns array with google.maps.Overlays
  OUT:function(arr,//array containg the stored shape-definitions
               map//map where to draw the shapes
               ){
      var shapes     = [],
          goo=google.maps,
          map=map||null,
          shape;
	  var tmp =[];
	  var infowindow_new=[];
	  total_shapes = arr.length;
      for(var i = 0; i < arr.length; i++)
      {   
        shape=arr[i];       
        
         switch(shape.type){
           case 'CIRCLE':
				var readdata =  {type:shape.type,radius:Number(shape.radius),fillColor:shape.color,clickable: true ,strokeWeight:0,center:this.pp_.apply(this,shape.geometry)};				
                tmp[i]=new goo.Circle(readdata);
				var jsondata = {type:shape.type,id:shape.id,radius:Number(shape.radius),color:shape.color,geometry:shape.geometry};
                var json_data =  JSON.stringify(jsondata).slice(1, -1);					
			    $('#shapes_input').append('<textarea id="'+shape.id+'" type="text" class="form-control all_json" >'+json_data+'</textarea>');				
            break;
           case 'MARKER': 

				var readdata =  {type:shape.type,icon:shape.icon,position:this.pp_.apply(this,shape.geometry)};				
              tmp[i]=new goo.Marker(readdata);
				var jsondata =  {type:shape.type,id:shape.id,geometry:shape.geometry,icon:shape.icon};	
                var json_data =  JSON.stringify(jsondata).slice(1, -1);				
			    $('#shapes_input').append('<textarea id="'+shape.id+'" type="text" class="form-control all_json" >'+json_data+'</textarea>');					
            break;  
				case 'marker': 
				var readdata =  {type:shape.type,icon:shape.icon,position:this.pp_.apply(this,shape.geometry)};				
              tmp[i]=new goo.Marker(readdata);
				var jsondata =  {type:shape.type,id:shape.id,geometry:shape.geometry,icon:shape.icon};	
                var json_data =  JSON.stringify(jsondata).slice(1, -1);				
			    $('#shapes_input').append('<textarea id="'+shape.id+'" type="text" class="form-control all_json" >'+json_data+'</textarea>');						
            break;  
		/*		case 'DATA_SET_MARKER': 
           var readdata = {type:shape.type,icon:shape.icon,description:shape.description,position:this.pp_.apply(this,shape.geometry)};					
				 var jsondata =  {type:shape.type,id:shape.id,geometry:shape.geometry,icon:shape.icon,description:shape.description};	
                var json_data =  JSON.stringify(jsondata).slice(1, -1);				
			    $('#shapes_input').append('<textarea id="'+shape.id+'" type="text" class="form-control all_json" >'+json_data+'</textarea>');			
              tmp[i]=new goo.Marker(readdata);				
					
            break; */
				 
           case 'RECTANGLE': 
				var readdata =  {type:shape.type,bounds:this.bb_.apply(this,shape.geometry),fillColor:shape.color,clickable: true ,strokeWeight:0,};							
              tmp[i]=new goo.Rectangle(readdata);
				var jsondata =  {type:shape.type,id:shape.id,geometry:shape.geometry,icon:shape.icon,color:shape.color};	
                var json_data =  JSON.stringify(jsondata).slice(1, -1);			
			    $('#shapes_input').append('<textarea id="'+shape.id+'" type="text" class="form-control all_json" >'+json_data+'</textarea>');					
             break;   
           case 'POLYLINE': 
				var readdata = {type:shape.type,path:this.ll_(shape.geometry),fillColor:shape.color,strokeWeight:1};					    tmp[i]=new goo.Polyline(readdata);				

				var jsondata =  {type:shape.type,id:shape.id,geometry:shape.geometry,icon:shape.icon,color:shape.color};	
                var json_data =  JSON.stringify(jsondata).slice(1, -1);					
			    $('#shapes_input').append('<textarea id="'+shape.id+'" type="text" class="form-control all_json" >'+json_data+'</textarea>');					
             break;   
           case 'POLYGON': 
				var jsondata = {type:shape.type,paths:this.mm_(shape.geometry),fillColor:shape.color,clickable: true ,strokeWeight:0,};					
              tmp[i]=new goo.Polygon(jsondata);

				var jsondata =  {type:shape.type,id:shape.id,geometry:shape.geometry,icon:shape.icon,color:shape.color};	
                var json_data =  JSON.stringify(jsondata).slice(1, -1);					
			    $('#shapes_input').append('<textarea id="'+shape.id+'"  type="text" class="form-control all_json" >'+json_data+'</textarea>');					
              
             break;   
       }
       tmp[i].setValues({map:map,id:shape.id});
	   google.maps.event.addListener(tmp[i], 'click', function(e){
					closeAllInfoWindows();
	   

		  if(this.type=="CIRCLE"){
            var circle = this;
			var radius = circle.getRadius();
			var latlng=circle.getCenter();  
		 	  radius = Math.round(getMiles(radius)*10)/10;
	  			var mile = (radius<=1) ? "mile" : "miles";
			   radius = "<h4><b>Radius :  </b>"+radius+"  "+mile+"</h4>";
				var contentString = radius;
				var infowindow = new google.maps.InfoWindow({
				 content: contentString,
			  	 position: latlng
			});
			    infoWindows.push(infowindow); 				
			    infowindow.open(map, tmp[i]);
		
			
		  }	
		   
		   
		   
		   
		   
		   
		   
		});
		  
	   google.maps.event.addListener(tmp[i], 'click', function(e){

	   
		  if(this.type=="DATA_SET_MARKER"){
			var latlng=this.getPosition();  
				var contentString = this.description;
				var infowindow = new google.maps.InfoWindow({
				 content: contentString,
			  	 position: latlng
			});
			    infowindow.open(map, tmp[i]);
		
			
		  }

		   
			  if(this.type=="MARKER"){
			var latlng=this.getPosition();  
			var geocoder = new google.maps.Geocoder;
			geocoder.geocode({'location':latlng }, function(results, status) {
				var contentString = results[1].formatted_address;
				var infowindow = new google.maps.InfoWindow({
				 content: contentString,
			  	 position: latlng
			});
			    infowindow.open(map, tmp[i]);
			});		
		  }		   
		   
		   
		   
		   
		   
		});		  
		  
		  
		  
	    google.maps.event.addListener(tmp[i], 'rightclick', function() {
			var new_shape=this;
			//console.log(this);
			if(this.type=="DATA_SET_MARKER"){
			  //alert(this.id);
				//$('#'+this.id).remove();
			}
			$('#'+this.id).remove();
			setSelection(this);
			deleteSelectedShape();
		});	


		  
		  
       shapes.push(tmp[i]);
    }
    return shapes;
  },
  l_:function(path,e){
    path=(path.getArray)?path.getArray():path;
    if(e){
      return google.maps.geometry.encoding.encodePath(path);
    }else{
      var r=[];
      for(var i=0;i<path.length;++i){
        r.push(this.p_(path[i]));
      }
      return r;
    }
  },
  ll_:function(path){
    if(typeof path==='string'){
      return google.maps.geometry.encoding.decodePath(path);
    }
    else{
      var r=[];
      for(var i=0;i<path.length;++i){
        r.push(this.pp_.apply(this,path[i]));
      }
      return r;
    }
  },

  m_:function(paths,e){
    var r=[];
    paths=(paths.getArray)?paths.getArray():paths;
    for(var i=0;i<paths.length;++i){
        r.push(this.l_(paths[i],e));
      }
     return r;
  },
  mm_:function(paths){
    var r=[];
    for(var i=0;i<paths.length;++i){
        r.push(this.ll_.call(this,paths[i]));
        
      }
     return r;
  },
  p_:function(latLng){
    return([latLng.lat(),latLng.lng()]);
  },
  pp_:function(lat,lng){
    return new google.maps.LatLng(lat,lng);
  },
  b_:function(bounds){
    return([this.p_(bounds.getSouthWest()),
            this.p_(bounds.getNorthEast())]);
  },
  bb_:function(sw,ne){
    return new google.maps.LatLngBounds(this.pp_.apply(this,sw),
                                        this.pp_.apply(this,ne));
  },
  t_:function(s){
    var t=['CIRCLE','MARKER','RECTANGLE','POLYLINE','POLYGON'];
    for(var i=0;i<t.length;++i){
       if(s===google.maps.drawing.OverlayType[t[i]]){
         return t[i];
       }
    }
  }
  
}



      google.maps.event.addDomListener(window, 'load', initialize);
