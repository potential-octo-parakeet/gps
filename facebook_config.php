<?php
	require 'facebook.php';
	if($_SERVER['REMOTE_ADDR']!=='127.0.0.1'){
		$facebook = new Facebook(array(
			'appId'  => '131583156981549',
			'secret' => '8ed7c802e0768255b48f9ed6878c2102',
			//'cookie'=>true
		));
	}
	else{
		$facebook = new Facebook(array(
			'appId'  => '407725032616899',
			'secret' => '26935057761d0eb3ab2e0597e2bda874',
			//'cookie'=>true
		));
	}
?>