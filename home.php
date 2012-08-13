<?php
	session_start();
	// if session already started, then go to home
	if(!isset($_SESSION['ID']))
	header("location:login.php");
	// require config and include class
	require 'config.php';
	require 'facebook_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>GPS Tracker Home</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/css/custom.css"/>
</head>
<body>
<?php include 'header.inc'?>

<a href="/logout.php">Logout</a>
</body>
</html>