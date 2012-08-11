<?php
	require 'facebook_config.php';	
	require 'config.php';
	include 'class.php';
	// instantiate gps
	$gps = new gps();
	// init details
	$fb        = $facebook->api('/edmalin.squarepnts');	
	var_dump($fb);
?>