<?php
	define('db_host','dev.com');
	define('db_user','root');
	define('db_pass','');
	define('db_name','gps');
	// init mysqli connection
	if($_SERVER['REMOTE_ADDR']=='127.0.0.1')
	$sql = new mysqli(db_host,db_user,db_pass,db_name);
	else
	$sql = new mysqli("localhost","tarteyco_gps","gps2012","tarteyco_gps");
?>