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
<script src="/js/bootstrap-typeahead.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script src="/js/markerwithlabel.js"></script>
<script src="/js/map.js"></script>
<script>
$(document).ready(function(){
	$('#country').typeahead({
		source : function(typeahead,query){
			return $.get('countries.php',function(data){
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
<div id="map_canvas"></div>
<div class="well" style="width:380px;position:absolute;top:50px;z-index:4;">
	<form class="form-horizontal" method="post" action="">	
		<input type="text" id="country_sn" name="country_sn" value=""/>
		<input type="text" id="lat" name="lat" value=""/>
		<input type="text" id="lng" name="lng" value=""/>
		
		<fieldset>
			<legend>Address Information</legend>
			<div class="control-group">
				<label class="control-label">Address 1</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="address"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Address 2</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="address"/>
				</div>
			</div>			
			<div class="control-group">
				<label class="control-label">City / Town</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="address"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">State / Province</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="address"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Zip / Postal</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="address"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Country</label>
				<div class="controls">
					<input type="text" id="country" class="map_addr" name="country" value="" autocomplete="off"/>
				</div>
			</div>	
			
			<div class="form-actions">
				<button type="button" class="btn btn-info" onclick="javascript:showMap();"><i class="icon-white icon-map-marker"></i> Show Map</button>&nbsp; <button type="submit" class="btn btn-info">Continue <i class="icon-white icon-chevron-right"></i></button>
			</div>
		</fieldset>
	</form>
</div>
</body>
</html>