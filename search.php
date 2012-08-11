<?php
	$q 	 = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';
	$geo = "http://maps.googleapis.com/maps/api/geocode/json?sensor=true&address=".urlencode($q);
	$geo = file_get_contents($geo);
	$geo = json_decode($geo);
	$res = array();
	
	if($geo->status=='OK'){
		array_push($res,
			array(
				'lat'=>$geo->results[0]->geometry->location->lat,
				'lng'=>$geo->results[0]->geometry->location->lng,
				'location_type'=>$geo->results[0]->geometry->location_type,
				'formatted_address'=>$geo->results[0]->formatted_address,
				'title'=>'Mar Cejas',
				'text'=>'Mar Cejas<br>09052772871<br>'.$geo->results[0]->formatted_address,
				'icon'=>'https://graph.facebook.com/mvcejas/picture',
			)
		);
	}

	echo json_encode($res);
	
?>