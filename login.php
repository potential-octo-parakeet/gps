<?php
    session_start();
	// if session already started, then go to home
	if(isset($_SESSION['ID']))
	header("location:home.php");
    
	// require config
	require 'facebook_config.php';
    require 'config.php';      
   
	$loginUrl = $facebook->getLoginUrl(array('scope' => 'publish_actions,email','redirect_uri'=>'http://'.$_SERVER['HTTP_HOST'].'/facebook_action.php'));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8" />
<meta name="description" content="Login to GPS Tracker Online."/>
<title>Account Login</title>
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
<?php include 'header.inc' ?>
<div style="width:300px;margin:80px auto;">
	<a href="<?php echo $loginUrl?>"><img src="http://i.imgur.com/qmxaw.png" alt="Login with Facebook" />
</div>
</body>
</html>