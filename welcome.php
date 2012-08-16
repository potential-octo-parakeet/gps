<?php
	require 'session.inc';
	require 'config.php';
	require 'facebook_config.php';	
	require 'validation.class';	
	include 'countries.php';

	// init $ID 
	$ID = $_SESSION['ID'];

	$address = $sql->query("SELECT * FROM address WHERE human_id='$ID'")->fetch_object();
	$lat     = $address->lat;
	$lng     = $address->lng;
	$zoom    = $address->zoom;
	$address = $address->city.'+'.$address->state.'+'.$address->postal.'+'.$address->country;
	$address = preg_replace('/\s+/','+',$address);	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>GPS Tracker Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<link href="/css/custom.css" rel="stylesheet"/>
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap-combined.min.css" rel="stylesheet"/>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include 'header.inc'?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3">
				<ul class="nav nav-tabs nav-stacked">
					<div class="alert alert-info"><h3>Navigation Tools</h3></div>
					<li class="active"><a href="#"><i class="icon-home"></i> Account Home</a></li>
					<li><a href="#"><i class="icon-picture"></i> Change Picture</a></li>
					<li><a href="#"><i class="icon-lock"></i> Change Password</a></li>
					<li><a href="#"><i class="icon-cog"></i> Account Settings</a></li>
				</ul>
			</div><!--/span3-->
			<div class="span9">
				<div class="hero-unit">
					<h1>Hello, world!</h1>
					<p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
					<p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
				</div>		 
			</div><!--/span9-->
		</div><!--/row-fluid-->
		<hr>
		<footer>
		<p>&copy; Company 2012</p>
		</footer>
	</div><!--/.fluid-container-->
</body>
</html>