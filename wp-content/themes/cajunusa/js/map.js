function initialize() {
	var myLatlng = new google.maps.LatLng(gcode.lat, gcode.lng);
	var mapOptions = {
		zoom: Number(gcode.zoom),
		center: myLatlng,
        panControl:true,
		zoomControl:false,
		mapTypeControl:false,
		scrollwheel : false,
		draggable: false,
		scaleControl:true,
		streetViewControl:false,
		fullscreenControl : false,
		clickable: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById(gcode.mapId), mapOptions);
	//var styles = [ { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "color": "#862633" } ] }, { "featureType": "administrative", "elementType": "labels.text.stroke", "stylers": [ { "hue": "#ff0023" } ] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [ { "color": "#f7e1bd" } ] }, { "featureType": "landscape.natural.landcover", "elementType": "all", "stylers": [ { "color": "#fafafa" } ] }, { "featureType": "landscape.natural.landcover", "elementType": "geometry.fill", "stylers": [ { "color": "#ff0000" }, { "visibility": "off" } ] }, { "featureType": "landscape.natural.terrain", "elementType": "geometry", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.attraction", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.business", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.government", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.medical", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.park", "elementType": "all", "stylers": [ { "visibility": "on" } ] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "color": "#c2da89" } ] }, { "featureType": "poi.school", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.sports_complex", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [ { "hue": "#ff9c00" } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#cf7f00" } ] }, { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [ { "color": "#cf7f00" } ] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [ { "visibility": "on" }, { "color": "#f5b654" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "hue": "#ff0023" } ] }, { "featureType": "transit", "elementType": "labels.icon", "stylers": [ { "lightness": "12" }, { "visibility": "on" }, { "hue": "#ff9c00" } ] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "color": "#6891b2" } ] }, { "featureType": "water", "elementType": "labels.text", "stylers": [ { "weight": "1.21" }, { "invert_lightness": true } ] } ];
	var styles = [
		
				  {
				    "featureType": "road",
				    "elementType": "geometry.fill",
				    "stylers": [
				      {
				        "color": "#ffffff"
				      }
				    ]
				  },
				  {
				    "featureType": "road",
				    "elementType": "geometry.stroke",
				    "stylers": [
				      {
				        "color": "#ffffff"
				      }
				    ]
				  }
	];
	
		var mapTitle=gcode.title;
		var mapAddress=gcode.address;
		var mapAddress = mapAddress.split(',');
		var mapAdd=gcode.add;
		var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});
		 var infowindow = new google.maps.InfoWindow();

			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				/*label: mapAddress[0],*/
				icon:gcode.marker
			});
			map.mapTypes.set('map_style', styledMap);
			map.setMapTypeId('map_style');

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.setContent('<div><strong><b>' + 'Crooked RiverRealty' + '</b></strong><br>' + gcode.address + '</div>');
              	infowindow.open(map, this);
			});
}
google.maps.event.addDomListener(window, 'load', initialize);