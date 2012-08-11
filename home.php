<?php
	session_start();
	// if session already started, then go to home
	if(!isset($_SESSION['id']))
	header("location:login.php");
	// require config and include class
	require 'config.php';
	require 'facebook_config.php';
	include 'class.php';
	// instantiate gps
	$gps = new gps();
	// get human details
	$human = $sql->query("SELECT h.*,CONCAT_WS(0x20,h.firstname,h.lastname) AS name FROM human h WHERE h.id='".$_SESSION['id']."'")->fetch_object();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>GPS Tracker Home</title>
<link rel="stylesheet" href="http://www.1bohol.com/css/bootstrap.min.css"/>
</head>
<body>
<?php include 'header.inc'?>
<h1>Welcome <?php echo $human->name?>!</h1>

<a href="/logout.php">Logout</a>
</body>
</html>