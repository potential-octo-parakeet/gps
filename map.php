<?php
	session_start();
	$geo = "http://api.ipinfodb.com/v3/ip-city/?key=bc866c34b4048322ad585dc8fb8d2c08f5b4a9c24e3e3e91592948654ef7fa3b&ip=".$_SERVER['REMOTE_ADDR']."&format=json";
	$geo = file_get_contents($geo);
	$geo = json_decode($geo);	
	
	
	if($geo->statusCode=='OK'){
		$lat = $geo->latitude;
		$lng = $geo->longitude;
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>GOOGLE MAP API</title>
<meta name="description" content="">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/css/custom.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script>
window.onload = initialize;
var map, markers = [], infowindow, bounds;
function initialize(){
	var myOptions = {
		zoom: 8,
		center: new google.maps.LatLng(<?php echo $lat?>,<?php echo $lng?>),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
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
	map = new google.maps.Map(document.getElementById('map_canvas'),myOptions);	
}

function setLocation(lat,lng,title,text,icon){	
	var marker = new google.maps.Marker({
		icon: icon,
		position: new google.maps.LatLng(lat,lng),
		map: map,
		title: title,
	});
	
	infowindow = new google.maps.InfoWindow({
		content: text,
        size: new google.maps.Size(10,10)
    });
	
	google.maps.event.addListener(marker,'click',function(){
		if(infowindow) infowindow.close();
		infowindow = new google.maps.InfoWindow({content:text});
		infowindow.open(map,marker);
	});
	map.setCenter(new google.maps.LatLng(lat,lng));
}

function getLoc(){
	$.getJSON('locator.php',function(data){
		$.each(data,function(c,a){
			setLocation(a.lat,a.lng,a.title,a.text,a.icon);
		});		
	});
}
$(document).ready(function(){
	$('form.navbar-search').submit(function(){
		$.getJSON('search.php',{q:this.q.value},function(r){
			$.each(r,function(a,b){
				setLocation(b.lat,b.lng,b.title,b.text,b.icon);
			});
		});
		return false;
	});
});
</script>
</head>
<body>
<?php include 'header.inc'?>
<div id="map_canvas"></div>

<form action="" method="post" class="well form-horizontal" style="margin:60px auto;width:500px;">
	<fieldset>
		<legend>Your address information.</legend>		
		<div class="control-group">
			<label class="control-label">Address Line 1</label>
			<div class="controls">
				<input type="text" name="address" class="input input-xlarge map_addr"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Address Line 2</label>
			<div class="controls">
				<input type="text" name="address" class="input input-xlarge map_addr"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Town / City</label>
			<div class="controls">
				<input type="text" name="address" class="input input-large map_addr"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">State / Province</label>
			<div class="controls">
				<input type="text" name="address" class="input input-large map_addr"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Postal / Zip</label>
			<div class="controls">
				<input type="text" name="address" class="input input-small map_addr"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Country</label>
			<div class="controls">
				<input type="text" name="address" class="input input-large map_addr"/>
			</div>
		</div>
		<div class="control-group">
			<div class="controls"><button class="btn" onclick="showMap();return false;">Show on map</button></div>
		</div>		
		<div class="form-actions">
			<button class="btn btn-primary" style="letter-spacing:2px;">Continue &raquo;</button>
		</div>
	</fieldset>
</form>
</body>
</html>