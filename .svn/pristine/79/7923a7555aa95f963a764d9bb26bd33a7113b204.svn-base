 <?php 
 	$lattitude	= (isset($_REQUEST['lat'])&& $_REQUEST['lat']!='')?$_REQUEST['lat']:'';
	$longitude	= (isset($_REQUEST['lng'])&& $_REQUEST['lng']!='')?$_REQUEST['lng']:'';
        $location =  $_REQUEST['location'];
        $destination =  $_REQUEST['destination'];
 ?>
<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
  <script type="text/javascript"  src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head> 
<body>
  <div id="map" style="width: 750px; height: 500px;"></div>
  <script type="text/javascript">
  $(document).ready(function(){
	var distName		= "<?php echo $destination ; ?>, <?php echo $location ; ?>, Jharkhand";
       
        //alert(distName);
        
	var blockName		= "";
        var tehasilName         = '';
	var map				=null;
	var marker			=null;
	var latlng			=null;
	getLocation(distName, "map",8);
               
		if('<?php echo $lattitude; ?>'!='')
		{
			initializeMap('<?php echo $lattitude; ?>','<?php echo $longitude; ?>');
		}
	});  	
   	function getLocation(location,mapCId,zoomLevel) {
    var map, geocoder, marker, infowindow;
    var options = {
      zoom: zoomLevel,
      center: new google.maps.LatLng(23.3455625563, 85.3087660766),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };	
    map = new google.maps.Map($('#'+mapCId)[0], options);
       if(!geocoder) {
          geocoder = new google.maps.Geocoder();
        }
        
        var geocoderRequest = {
          address: location
        }
		marker = new google.maps.Marker({				  
                  map: map,
                draggable: true
                 });
        geocoder.geocode(geocoderRequest, function(results, status) {
        
            if (status == google.maps.GeocoderStatus.OK) {
            
                map.setCenter(results[0].geometry.location);        		
                if (!marker) {
                  	marker = new google.maps.Marker({				  
                  	map: map,
                	draggable: true
                 });				 
               }			  
        marker.setPosition(results[0].geometry.location);        
        }      
     });    
		google.maps.event.addListener(marker,'dragend',function () {
			top.$('#txtLocation').val(marker.position.lat().toFixed(10)+', '+marker.position.lng().toFixed(10));
                        top.$('#txtLocationHidden').val(marker.position.lat().toFixed(10)+', '+marker.position.lng().toFixed(10));
		});
    };
	
	function initializeMap(latitude,longitude)
		{
			
			latlng = new google.maps.LatLng(latitude, longitude);
        var mapOptions = {
             center: new google.maps.LatLng(latitude, longitude),
             zoom: 14,
             mapTypeId: google.maps.MapTypeId.ROADMAP,
             panControl: true,
             panControlOptions: {
                 position: google.maps.ControlPosition.TOP_RIGHT
             },
             zoomControl: true,
             zoomControlOptions: {
                 style: google.maps.ZoomControlStyle.LARGE,
                 position: google.maps.ControlPosition.TOP_left
             }
         },
		
         map = new google.maps.Map(document.getElementById('mapContent'), mapOptions),
           marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 draggable: false
             });
           var infowindow = new google.maps.InfoWindow();
                     var geocoder = new google.maps.Geocoder();
                     geocoder.geocode({
                         "latLng":latlng
                     }, function (results, status) {
                         //console.log(results, status);
                         if (status == google.maps.GeocoderStatus.OK) {
                             //console.log(results[0]);
                             var lat = results[0].geometry.location.lat(),
                                 lng = results[0].geometry.location.lng(),
                                 placeName = results[0].formatted_address,
                                 latlng = new google.maps.LatLng(lat, lng);

                             moveMarker(placeName, latlng);
							 
                         }
                     });
        
        
         function moveMarker(placeName, latlng) {
			  var content	= '<table border="0" cellspacing="0" cellpadding="0"><tr><td><strong>Location :'+placeName+'</strong></td></tr></table>'; 
                         
             marker.setPosition(latlng);;
             infowindow.setContent(content);
             infowindow.open(map, marker);
         }
	};
  </script>
</body>
</html>