<?php
	define('db_host','localhost');
	define('db_user','root');
	define('db_pass','');
	define('db_name','gps');
	// init mysqli connection
	$sql = new mysqli(db_host,db_user,db_pass,db_name);
?>