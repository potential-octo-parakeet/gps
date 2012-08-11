<?php
	/*
	session_start();
	// if session already started, then go to home
	if(!isset($_SESSION['id']))
	header("location:login.php");
	// require config and include class
	require 'config.php';
	require 'facebook_config.php';
	include 'class.php';
	// instantiate gps
	$gps = new gps();
	// get human details
	$human = $sql->query("SELECT h.*,CONCAT_WS(0x20,h.firstname,h.lastname) AS name FROM human h WHERE h.id='".$_SESSION['id']."'")->fetch_object();
	*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>GPS Tracker Home</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/css/custom.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script>
var lat,lng;
var address;
var bounds;
var infowindow;
var geo;
var map;
var markers=[];
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
	marker 	= new google.maps.Marker({animation: google.maps.Animation.BOUNCE,draggable:true,});    
	window.setTimeout(getUsersLocation, 2000);
	google.maps.event.addListener(map, 'click', function(event) {
		marker.setPosition(event.latLng);
		map.panTo(event.latLng);
		console.log(event.latLng.Xa+'\t'+event.latLng.Ya);
		console.log(map.getZoom());
	});
}
function getUsersLocation(){
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
			map.panTo(pos);
			marker.setPosition(pos);
			marker.setMap(map);			
		},function(){		
			marker.setPosition(new google.maps.LatLng(14.597466, 121.0092));
			marker.setMap(map);
		});
	}else{
		marker.setPosition(new google.maps.LatLng(14.597466, 121.0092));
		marker.setMap(map);
	}
}
function showMap(){
	var addr = [];
	$('.map_addr').each(function(a,b){
		addr.push(b.value);
	});
	address = addr.join(' ');
	geo.geocode({'address': address},function(results,status){	
		if(status == google.maps.GeocoderStatus.OK){			
			map.setCenter(results[0].geometry.location);
			marker.setPosition(results[0].geometry.location);
			console.log(results[0].geometry.location.Xa+'\t'+results[0].geometry.location.Ya);
		}else{
			alert("Geocode was not successful for the following reason: " + status + ' addr: '+ addr);
		}
	});
}
google.maps.event.addDomListener(window, 'load', init);
</script>
</head>
<body>
<?php include 'header.inc'?>
<div id="map_canvas"></div>

</body>
</html>

<?php
	$ipa = '166.221.240.10';//$_SERVER['REMOTE_ADDR'];
	$api = "http://api.ipinfodb.com/v3/ip-city/?key=bc866c34b4048322ad585dc8fb8d2c08f5b4a9c24e3e3e91592948654ef7fa3b&ip=".$ipa."&format=json";
	$api = file_get_contents($api);
	$api = json_decode($api);	
?>