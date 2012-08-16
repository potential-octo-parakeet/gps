<?php
	$filteremail= '/^([a-zA-Z 0-9\-\_\.]{2,255})+\@+([a-zA-Z 0-9\-\_\.]{2,255})+\.+([a-zA-Z]{2,5})$/';
	$emails = array('mvcejas@gmail.com','mv.cejas@gmail.com','mv_cejas@gmail.com','mv-cejas@gmail.com','mvcejas@g.mail.com','mv@gmail.com','m@gmail.com','m@@gmail.com','mvcejas@@gmail.com','mvcejas@gma1l.com','mvcejas@gmail.co','mvcejas@gmail.c0m');
	foreach($emails as $email){
		var_dump(array($email=>preg_match($filteremail,$email)));
	}
	
	echo preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/','$1-$2-$3','1234567890');
?>