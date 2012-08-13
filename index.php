<?php
	session_start();
	require 'config.php';
	require 'validation.class';
	
	if(isset($_POST['signup'])){
		$firstname 	= validate::cleanstr($_POST['firstname']);
		$lastname 	= validate::cleanstr($_POST['lastname']);
		$email1		= validate::cleanstr($_POST['email1']);
		$email2		= validate::cleanstr($_POST['email2']);
		$password	= $_POST['password'];
		$is_valid	= true;
		$errors     = array();
		$filtername = '/^[a-zA-Z 0-9\.\ñ\Ñ]{2,}$/';
		$filteremail= '/^([a-zA-Z 0-9\-\_\.]{2,255})+\@+([a-zA-Z 0-9\-\_\.]{2,255})+\.+([a-zA-Z]{2,5})$/';
		
		if(!preg_match($filtername,$firstname)){
			$is_valid = false;
			array_push($errors,'Invalid first name.');
		}
		if(!preg_match($filtername,$lastname)){
			$is_valid = false;
			array_push($errors,'Invalid first name.');
		}
		if(!preg_match($filteremail,$email1) || $email1!==$email2){
			$is_valid = false;
			array_push($errors,'Invalid email or email did not match.');
		}
		if(strlen($password)<6){
			$is_valid = false;
			array_push($errors,'Password too short.');
		}
		
		if($is_valid){
			$firstname  = $sql->real_escape_string($firstname);
			$lastname	= $sql->real_escape_string($lastname);
			$email		= $sql->real_escape_string($email1);
			$sql->query("INSERT INTO human(firstname,lastname,email,password,reg_date) 
						VALUES('$firstname','$lastname','$email',MD5('$password'),NOW());") or die($sql->error);
			$_SESSION['ID'] = $sql->query("SELECT id FROM human WHERE email='$email' AND password=MD5('$password');")->fetch_object()->id;
			header("location:address.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>GPS Tracker Home</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/css/custom.css"/>
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