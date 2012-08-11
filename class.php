<?php
class gps{
	public function get_geo_info($address){
		$geo = "http://maps.googleapis.com/maps/api/geocode/json?sensor=true&address=".urlencode($address);
		$geo = file_get_contents($geo);
		$geo = json_decode($geo);
		$res = new stdClass();
		// set address, lat, lng
		$res->add = $address;
		$res->lat = $geo->results[0]->geometry->location->lat;
		$res->lng = $geo->results[0]->geometry->location->lng;
		// return result
		return $res;
	}
}
?>