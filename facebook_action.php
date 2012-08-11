<?php
	session_start();
	// if session already started, then go to home
	if(isset($_SESSION['id']))
	header("location:home.php");
	// require config and include class
	require 'facebook_config.php';	
	require 'config.php';
	include 'class.php';
	// instantiate gps
	$gps = new gps();
	// init details
	$fb_id     = $facebook->getUser();//Get fb id
	$fb        = $facebook->api('/me');	
	$firstname = $fb['first_name'];	
	$lastname  = $fb['last_name'];
	$middlename= isset($fb['middle_name']) ? $fb['middle_name'] : '';
	$email 	   = $fb['email'];
	$password  = md5(time());
	// if found user
	if($fb_id):
		try{
			// checking human...
			$human_record = $sql->query("SELECT id FROM human WHERE fb_id='".$fb_id."'")->num_rows;
			if($human_record==0){
				// insert human info
				$sql->query("INSERT INTO human(fb_id,firstname,lastname,middlename,email,password) VALUES('".$fb_id."','".$firstname."','".$lastname."','".$middlename."','".$email."','".$password."')");
			}
			// get id and set session, ready...
			$_SESSION['id'] = $sql->query("SELECT id FROM human WHERE email='".$email."' LIMIT 1")->fetch_object()->id;
			// check for human record, if new then, check address from fb...
			if($human_record==0){
				// if location set, then...
				if(isset($fb['location']['name'])){
					// get geo information
					$loc = $gps->get_geo_info($fb['location']['name']);	
					// add human address
					$sql->query("INSERT INTO address(human_id,address,lat,lng) VALUES('".$_SESSION['id']."','".$loc->add."','".$loc->lat."','".$loc->lng."')");
				}
				// if hometown set, then...
				if(isset($fb['hometown']['name'])){
					// get geo information
					$loc = $gps->get_geo_info($fb['hometown']['name']);	
					// add human address
					$sql->query("INSERT INTO address(human_id,address,lat,lng) VALUES('".$_SESSION['id']."','".$loc->add."','".$loc->lat."','".$loc->lng."')");
				}
				if(!isset($fb['location']['name']) || !isset($fb['location']['name']))
				header('location:address.php');
			}
			// create post details...
			/*
			$post = array(
				'access_token' => $facebook->getAccessToken(),   
				//'name' => 'Human',
				'message' =>  'This is where I am located. Go, come on and get me!',
				'caption' => "GPS Tracker",
				'link' => 'http://gps.1bohol.com',
				'description' => 'Verify user identity using GPS tracker online. Track you love one\'s step.', 
				'picture' => 'http://i.imgur.com/zvrbJ.png',
				'actions' => 
				array(
					array(
						'name' => $fb['name'].' is using GPS',
						'link' => 'http://gps.1bohol.com'
					)
				)
			);
			// tell the world you are using gps...
			$facebook->api("/$fb_id/feed","POST",$post);
			*/
			
			header("location:home.php");			
		}catch(FacebookApiException $e){
			exit("Error: An error has occured while gathering information from Facebook.");
		}
	endif;
?>