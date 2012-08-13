<?php
	$ipa = $_SERVER['REMOTE_ADDR']=='127.0.0.1' ? '222.127.168.52' : $_SERVER['REMOTE_ADDR'];
	$api = "http://api.ipinfodb.com/v3/ip-city/?key=bc866c34b4048322ad585dc8fb8d2c08f5b4a9c24e3e3e91592948654ef7fa3b&ip=".$ipa."&format=json";
	$api = file_get_contents($api);
	
	header("content-type: application/json");
	echo $api;
?>