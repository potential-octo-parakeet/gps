<?php
    session_start();
	// if session already started, then go to home
	if(isset($_SESSION['ID']))
	header("location:home.php");
    
	// require config
	require 'facebook_config.php';
    require 'config.php';      
   
	$loginUrl = $facebook->getLoginUrl(array('scope' => 'publish_actions,email','redirect_uri'=>'http://'.$_SERVER['HTTP_HOST'].'/home.php'));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8" />
<meta name="description" content="Login to GPS Tracker Online."/>
<title>Account Login</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/css/custom.css"/>
</head>
<body>
<?php include 'header.inc' ?>
<div style="width:300px;margin:80px auto;">
	<a href="<?php echo $loginUrl?>"><img src="http://i.imgur.com/qmxaw.png" alt="Login with Facebook" />
</div>
</body>
</html>