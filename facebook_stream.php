<?php
	require 'facebook_config.php';
	
	$ipa = $_SERVER['REMOTE_ADDR']=='127.0.0.1' ? '222.127.168.52' : $_SERVER['REMOTE_ADDR'];
	$api = "http://api.ipinfodb.com/v3/ip-city/?key=bc866c34b4048322ad585dc8fb8d2c08f5b4a9c24e3e3e91592948654ef7fa3b&ip=".$ipa."&format=json";
	$api = file_get_contents($api);
	$api = json_decode($api);
	$lat = $api->latitude;
	$lng = $api->longitude;
	$loc = $api->countryName;
	$filename= 'img/'.time().'.png';
	$imageuri= 'http://'.$_SERVER['HTTP_HOST'].'/'.$filename;
	// copy image to local directory
	copy("http://maps.googleapis.com/maps/api/staticmap?sensor=false&maptype=hybrid&center=$lat,$lng&zoom=4&size=400x400&markers=color:red|".$api->regionName."+".$loc,$filename);
	
	// init fb details
	$fb        = $facebook->api('/me');
	$fb_id     = $facebook->getUser();//Get fb id
	
	// if found user
	if($fb_id){
		try{
			// create post details...
			$post = array(
				'access_token' => $facebook->getAccessToken(),   
				'name' => 'Human',
				'message' =>  'We\'re working hard to publicly open a free human tracker online!',
				'caption' => "GPS Tracker Online",
				'link' => 'http://1bohol.com',
				'description' => $fb['name'].' is located in the '.$loc, 
				'picture' => $imageuri,
				'actions' => 
					array(
						array(
							'name' => $fb['name'].' is using GPS Online Tracker',
							'link' => 'http://1bohol.com'
						)
					),
			);
			// tell the world you are using gps...
			$facebook->api("/$fb_id/feed","POST",$post);
			exit("Posted | <a href='logout.php'>Logout</a>");
		}catch(FacebookApiException $e){
			exit("Error: An error has occured while gathering information from Facebook.");
		}
	}	
?>