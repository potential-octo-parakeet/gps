<?php
	require 'session.inc';
	require 'config.php';
	require 'validation.class';
	include 'countries.php';

	$ID = $_SESSION['ID'];
	
	$sql->query("UPDATE human SET last_page='".$_SERVER['PHP_SELF']."' WHERE id='$ID'") or die($sql->error);
	
	if(isset($_POST['continue'])){
		$address1 = validate::cleanstr($_POST['address1']);
		$address2 = validate::cleanstr($_POST['address2']);
		$city     = validate::cleanstr($_POST['city']);
		$state 	  = validate::cleanstr($_POST['state']);
		$postal   = validate::cleanstr($_POST['postal']);
		$country  = ucwords(strtolower(validate::cleanstr($_POST['country'])));
		$lat      = $_POST['lat'];
		$lng      = $_POST['lng'];
		$zoom     = $_POST['zoom'];
		$is_valid = true;
		$errors   = array();
		
		if(strlen($address1)<3){
			$is_valid = false;
			array_push($errors,'Error: Street, invalid form of characters.');
		}
		if(strlen($city)<2){
			$is_valid = false;
			array_push($errors,'Error: City, invalid form of characters.');
		}	
		if(strlen($state)<1){
			$is_valid = false;
			array_push($errors,'Error: State, invalid form of characters.');
		}	
		if(!preg_match('/^([0-9]{4,9})$/',$postal)){
			$is_valid = false;
			array_push($errors,'Error: Postal, invalid form of characters.');
		}		
		if(!in_array($country,$countries)){
			$is_valid = false;
			array_push($errors,'Error: Country not on the list.');
		}
		
		if($is_valid){
			$address1= $sql->real_escape_string($address1);
			$address2= $sql->real_escape_string($address2);
			$city    = $sql->real_escape_string($city);
			$state   = $sql->real_escape_string($state);
			$postal  = $sql->real_escape_string($postal);
			$country = $sql->real_escape_string($country);
			$sql->query("INSERT INTO address(human_id,address1,address2,city,state,postal,country,lat,lng,zoom) VALUES('$ID','$address1','$address2','$city','$state','$postal','$country','$lat','$lng','$zoom');");
			header("location:welcome.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>GPS Tracker Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<link href="/css/custom.css" rel="stylesheet"/>
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap-combined.min.css" rel="stylesheet"/>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
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
			
<div class="well well-form">	
	<form class="form-horizontal" method="post" action="">	
		<input type="hidden" id="lat" name="lat" value=""/>
		<input type="hidden" id="lng" name="lng" value=""/>
		<input type="hidden" id="zoom" name="zoom" value=""/>	
		<fieldset id="addinfo">
			<legend>Please provide your complete address</legend>
			<?php if(isset($is_valid) && $is_valid==false){
				echo '<div class="alert alert-error fade in">';
				echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
				foreach($errors as $e){
					echo $e.'<br/>';
				}
				echo '</div>';
			}?>
			<div class="control-group">
				<label class="control-label">Street / Barangay</label>
				<div class="controls">
					<input type="text" class="input input-large" name="address1" value="<?php echo isset($address1) ? $address1 : null;?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Apartment / House #</label>
				<div class="controls">
					<input type="text" class="input input-large" name="address2" value="<?php echo isset($address2) ? $address2 : null;?>"/>
				</div>
			</div>			
			<div class="control-group">
				<label class="control-label">City / Town</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="city" value="<?php echo isset($city) ? $city : null;?>"/>
				</div>
			</div>		
			
			<div class="control-group">
				<label class="control-label">State / Province</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="state" value="<?php echo isset($state) ? $state : null;?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Zip / Postal</label>
				<div class="controls">
					<input type="text" class="input input-large" name="postal" value="<?php echo isset($postal) ? $postal : null;?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Country</label>
				<div class="controls">
					<input type="text" id="country" class="map_addr" name="country" value="<?php echo isset($country) ? $country : null;?>" autocomplete="off"/>
				</div>
			</div>	
			
			<div class="form-actions">
				<button type="button" class="btn btn-info" onclick="showMap();$('#addinfo').hide();$('#mapinfo').show();">Review & Continue <i class="icon-white icon-map-marker"></i></button>
			</div>			
		</fieldset>
		<fieldset id="mapinfo" class="hide">
			<legend>Does your location accurate? If not, move the marker to the right location.</legend>
			<div class="control-group">
				<div id="map_canvas"></div>
			</div>
			<button type="button" class="btn btn-info" onclick="$('#mapinfo').hide();$('#addinfo').show();">Edit <i class="icon-white icon-edit"></i></button> &nbsp; <button type="submit" id="continue" class="btn btn-success" name="continue">Save and Continue <i class="icon-white icon-chevron-right"></i></button>
		</fieldset>
	</form>	
</div>

</body>
</html>