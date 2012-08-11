<?php
	
	header('content-type: application/json');
	$json = array();
	
	array_push($json,array('name'=>'Mar Cejas','address'=>'Sta. Cruz, Calape, Bohol','phone'=>'639052772871','lat'=>9.953166999999999,'lng'=>123.8830));
	
	echo json_encode($json);
?>