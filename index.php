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
<div class="well well-form">
	<form class="form-horizontal" method="post" action="signup.php">	
		<fieldset>
			<legend>Sign Up</legend>
			<?php if(isset($is_valid) && $is_valid==false){
				echo '<div class="alert alert-error fade in">';
				echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
				foreach($errors as $e){
					echo $e.'<br/>';
				}
				echo '</div>';
			}?>
			<div class="control-group">
				<label class="control-label">First Name</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="firstname" value="<?php echo isset($firstname) ? $firstname : null;?>"/>
				</div>
			</div>
	
			<div class="control-group">
				<label class="control-label">Last Name</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="lastname" value="<?php echo isset($lastname) ? $lastname : null;?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="email1" value="<?php echo isset($email1) ? $email1 : null;?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Retype Email</label>
				<div class="controls">
					<input type="text" class="input input-large map_addr" name="email2" value="<?php echo isset($email2) ? $email2 : null;?>"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Password</label>
				<div class="controls">
					<input type="password" class="input input-large map_addr" name="password" value="<?php echo isset($password) ? $password : null;?>"/>
				</div>
			</div>
			
			<div class="form-actions">
				<button type="submit" class="btn btn-info" name="signup">Continue <i class="icon-white icon-chevron-right"></i></button>
			</div>
		</fieldset>
	</form>
</div>
</body>
</html>