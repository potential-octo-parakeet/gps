<?php
	require 'session.inc';
	require 'config.php';
	require 'validation.class';
	include 'countries.php';
	// init $ID 
	$ID = $_SESSION['ID'];
	
	$address = $sql->query("SELECT * FROM address WHERE human_id='$ID'")->fetch_object();
	$lat     = $address->lat;
	$lng     = $address->lng;
	$zoom    = $address->zoom;
	$address = $address->city.'+'.$address->state.'+'.$address->postal.'+'.$address->country;
	$address = preg_replace('/\s+/','+',$address);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>GPS Tracker Home</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/css/custom.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap.min.js"></script>
<script src="/js/bootstrap-typeahead.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script src="/js/markerwithlabel.js"></script>
<script src="/js/map.js"></script>
<script>
$(document).ready(function(){
	getUsersLocation();
	
	$('#country').typeahead({
		source : function(typeahead,query){
			return $.get('countries.php',{json:true},function(data){
				console.log(data);
				return typeahead.process(data);
			});
		},
		property: 'long_name',
		onselect: function(obj){
			$('#country_sn').val(obj.short_name);
			console.log(obj);
		},
	});
});
</script>
</head>
<body>
<?php include 'header.inc'?>
<a href="logout.php">Logout</a>
<?php 
	echo '<img src="http://maps.googleapis.com/maps/api/staticmap?sensor=false&maptype=hybrid&center='.$lat.','.$lng.'&zoom='.$zoom.'&size=400x400&markers=color:red|'.$address.'"/>';
?>
</body>
</html>