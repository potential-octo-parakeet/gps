<?php
	
	if(in_array($_FILES['file']['type'],array('image/jpeg','image/jpg','image/png','image/gif'))){
		$filename = $_FILES['file']['tmp_name'];
		$handle = fopen($filename, "r");
		$data = fread($handle, filesize($filename));

		// $data is file data
		$pvars   = array('image' => base64_encode($data), 'key' => 'eff99b6f2d3c385a9ad265a3ad12a57104fe7bee7');
		$timeout = 30;
		$curl    = curl_init();

		curl_setopt($curl, CURLOPT_URL, 'http://api.imgur.com/2/upload.xml');
		curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);

		$json = curl_exec($curl);

		curl_close ($curl);
	}
?>