var address;
var bounds;
var infowindow;
var geo;
var map;
var marker;
function init(){
	geo		= new google.maps.Geocoder();
	bounds 	= new google.maps.LatLngBounds();
	var myOptions = {
		zoom: 9,
		center: new google.maps.LatLng(14.597466, 121.0092),
		mapTypeId: google.maps.MapTypeId.HYBRID,
		panControl: false,
		streetViewControl: false,		
		mapTypeControlOptions: {
			position: google.maps.ControlPosition.TOP_RIGHT,
			mapTypeIds: [google.maps.MapTypeId.HYBRID,google.maps.MapTypeId.ROADMAP],
		},
		zoomControlOptions: {
			position: google.maps.ControlPosition.RIGHT_TOP,
		},
	};	
	map 	= new google.maps.Map(document.getElementById('map_canvas'),myOptions);
	
	marker = new MarkerWithLabel({
       draggable: true,
       labelContent: "drag or click to your current location",
       labelAnchor: new google.maps.Point(90, 52),
       labelClass: "labels", // the CSS class for the label
     });
	
	google.maps.event.addListener(map,'click',function(event){		
		marker.setPosition(event.latLng);
		//map.panTo(event.latLng);
		log(event.latLng.Xa,event.latLng.Ya);

		console.log(event);
	});
	google.maps.event.addListener(marker,'drag',function(event){		
		marker.setPosition(event.latLng);
		log(event.latLng.Xa,event.latLng.Ya);
	});
	window.setTimeout(getUsersLocation,1000);
}
function getUsersLocation(){
	$.get('ipinfo.php',function(r){
		if(r.statusCode=='OK'){
			var pos = new google.maps.LatLng(r.latitude,r.longitude);
			marker.setPosition(pos);
			map.panTo(pos);
			marker.setMap(map);
			log(r.latitude,r.longitude);			
			document.getElementById('country').value=r.countryName;		
			document.getElementById('country_sn').value=r.countryCode;
		}
	},'json');
	
}
function showMap(){
	var addr = [];
	$('.map_addr').each(function(a,b){
		addr.push(b.value);
	});
	address = addr.join(' ');
	geo.geocode({'address': address},function(res,status){	
		if(status == google.maps.GeocoderStatus.OK){			
			map.setCenter(res[0].geometry.location);
			marker.setPosition(res[0].geometry.location);
			log(res[0].geometry.location.Xa,res[0].geometry.location.Ya,res[0].address_components[5].long_name);
		}else{
			alert("Geocode was not successful for the following reason: " + status + ' addr: '+ addr);
		}
	});
}
function log(lat,lng){
	document.getElementById('lat').value=lat;
	document.getElementById('lng').value=lng;
}
google.maps.event.addDomListener(window, 'load', init);