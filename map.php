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
			$sql->query("INSERT INTO address(human_id,address1,address2,city,state,postal,country) VALUES('$ID','$address1','$address2','$city','$state','$postal','$country');");
			header("location:address-step-2.php");
		}
	}
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
<div id="map_canvas" style="height:1000px;margin:0;"></div>
<div class="well well-form" style="position:absolute;top:30px;right:5px;">
	<form class="form-horizontal" method="post" action="signup.php">	
		<fieldset>
			<legend>Sign Up</legend>
			<?php if(isset($is_valid) && $is_valid==false){
				echo '<div class="alert alert-error fade in">';
				echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
				foreach($errors as $e){
					echo $e.'<br/>';
				}
				echo '</div>';
			}?>
			<div class="control-group">
				<label class="control-label">First Name</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="firstname" value="<?php echo isset($firstname) ? $firstname : null;?>"/>
				</div>
			</div>
	
			<div class="control-group">
				<label class="control-label">Last Name</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="lastname" value="<?php echo isset($lastname) ? $lastname : null;?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="email1" value="<?php echo isset($email1) ? $email1 : null;?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Retype Email</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="email2" value="<?php echo isset($email2) ? $email2 : null;?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Password</label>
				<div class="controls">
					<input type="password" class="input input-large map_addr" name="password" value="<?php echo isset($password) ? $password : null;?>"/>
				</div>
			</div>
			
			<div class="form-actions">
				<button type="submit" class="btn btn-info" name="signup">Continue <i class="icon-white icon-chevron-right"></i></button>
			</div>
		</fieldset>
	</form>
</div>
</body>
</html>