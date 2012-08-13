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
			mapTypeIds: [google.maps.MapTypeId.HYBRID,google.maps.MapTypeId.ROADMAP],
		},
	};	
	map 	= new google.maps.Map(document.getElementById('map_canvas'),myOptions);
	
	marker = new MarkerWithLabel({
       draggable: true,
       labelContent: "zoom in and <br/>drag or click to your current location",
       labelAnchor: new google.maps.Point(90, 72),
       labelClass: "labels",
     });
	
	google.maps.event.addListener(map,'click',function(event){		
		marker.setPosition(event.latLng);
		log(event.latLng.Xa,event.latLng.Ya);
	});
	google.maps.event.addListener(marker,'drag',function(event){		
		marker.setPosition(event.latLng);
		log(event.latLng.Xa,event.latLng.Ya);
	});
	google.maps.event.addListener(map,'zoom_changed',function(e){		
		document.getElementById('zoom').value=map.getZoom();
	});
}
function getUsersLocation(){
	$.get('ipinfo.php',function(r){
		if(r.statusCode=='OK'){
			var pos = new google.maps.LatLng(r.latitude,r.longitude);
			document.getElementById('country').value=r.countryName;
			marker.setPosition(pos);
			map.panTo(pos);
			marker.setMap(map);
			log(r.latitude,r.longitude);			
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
		init();
		if(status == google.maps.GeocoderStatus.OK){			
			map.panTo(res[0].geometry.location);
			marker.setPosition(res[0].geometry.location);
			marker.setMap(map);
			log(res[0].geometry.location.Xa,res[0].geometry.location.Ya);
		}else{
			alert("Geocode was not successful for the following reason: " + status + ' addr: '+ address);
		}
	});
	return false;
}
function log(lat,lng){
	document.getElementById('lat').value=lat;
	document.getElementById('lng').value=lng;
	document.getElementById('zoom').value=map.getZoom();
}
google.maps.event.addDomListener(window, 'load', init);