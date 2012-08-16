<?php
	session_start();
	// if session already started, then go to home
	if(isset($_SESSION['ID'])) header("location:home.php");
	// require config and include class
	require 'facebook_config.php';	
	require 'config.php';

	// init fb details
	$fb_id     = $facebook->getUser();//Get fb id
	$fb        = $facebook->api('/me');	
	$firstname = $fb['first_name'];	
	$lastname  = $fb['last_name'];
	$middlename= isset($fb['middle_name']) ? $fb['middle_name'] : '';
	$email 	   = $fb['email'];
	// if found user
	if($fb_id){
		try{
			// checking human...
			$human_record = $sql->query("SELECT id FROM human WHERE fb_id='".$fb_id."'")->num_rows;
			if($human_record==0){
				// insert human info
				$sql->query("INSERT INTO human(fb_id,firstname,lastname,middlename,email,password,reg_date) VALUES('$fb_id','$firstname','$lastname','$middlename','$email',MD5(NOW()),NOW())");
			}
			// get id and set session, ready...
			$_SESSION['ID'] = $sql->query("SELECT id FROM human WHERE email='".$email."' LIMIT 1")->fetch_object()->id;
			// redirect human to address
			header('location:address.php');
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
		}catch(FacebookApiException $e){
			exit("Error: An error has occured while gathering information from Facebook.");
		}
	}
?>