<?php
	require 'config.php';
	
	// get category list from database
	$cat = $sql->query("SELECT * FROM category");
	
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
<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script src="/js/markerwithlabel.js"></script>
<script src="/js/map.js"></script>
<style>.headerinfo{margin-bottom:5px;}</style>
</head>
<body>
<?php include 'header.inc'?>
	<div class="container-fluid">
		<div class="row-fluid">		
			<div class="span2">
				<div class="alert alert-info headerinfo">
					<h4>Browse From:</h4>
				</div>
				<ul class="nav nav-tabs nav-stacked">
					<li><a href="">Luzon</a></li>
					<li><a href="">Visayas</a></li>
					<li><a href="">Mindanao</a></li>
					<li><a href="">Luzon</a></li>
					<li><a href="">Visayas</a></li>
					<li><a href="">Mindanao</a></li>
					<li><a href="">Luzon</a></li>
					<li><a href="">Visayas</a></li>
					<li><a href="">Mindanao</a></li>
					<li><a href="">Luzon</a></li>
					<li><a href="">Visayas</a></li>
					<li><a href="">Mindanao</a></li>
					<li><a href="">Luzon</a></li>
					<li><a href="">Visayas</a></li>
					<li><a href="">Mindanao</a></li>
					<li><a href="">Luzon</a></li>
					<li><a href="">Visayas</a></li>
					<li><a href="">Mindanao</a></li>
				</ul>
			</div><!--/span2-->
			<div class="span6">
				<div class="row-fluid">						
					<div class="span2">
						<img src="http://placehold.it/100x100"/>
					</div>
					<div class="span10">
						<h5>jashdjashdjhsa</h5>
						<p>Lorem ipsum dolor sit amit........Lorem ipsum dolor sit amit........Lorem ipsum dolor sit amit........</p>
					</div>
				</div>
				<hr/>
				<div class="row-fluid">						
					<div class="span2">
						<img src="http://placehold.it/100x100"/>
					</div>
					<div class="span10">
						<h5>jashdjashdjhsa</h5>
						<p>Lorem ipsum dolor sit amit........Lorem ipsum dolor sit amit........Lorem ipsum dolor sit amit........</p>
					</div>
				</div>
				<hr/>
				<div class="row-fluid">						
					<div class="span2">
						<img src="http://placehold.it/100x100"/>
					</div>
					<div class="span10">
						<h5>jashdjashdjhsa</h5>
						<p>Lorem ipsum dolor sit amit........Lorem ipsum dolor sit amit........Lorem ipsum dolor sit amit........</p>
					</div>
				</div>
				<hr/>
				<div class="row-fluid">						
					<div class="span2">
						<img src="http://placehold.it/100x100"/>
					</div>
					<div class="span10">
						<h5>jashdjashdjhsa</h5>
						<p>Lorem ipsum dolor sit amit........Lorem ipsum dolor sit amit........Lorem ipsum dolor sit amit........</p>
					</div>
				</div>
				<hr/>
				<div class="row-fluid">						
					<div class="span2">
						<img src="http://placehold.it/100x100"/>
					</div>
					<div class="span10">
						<h5>jashdjashdjhsa</h5>
						<p>Lorem ipsum dolor sit amit........Lorem ipsum dolor sit amit........Lorem ipsum dolor sit amit........</p>
					</div>
				</div>
				<hr/>
				<div class="row-fluid">
					<a class="btn btn-success pull-right" href="#">Load More Results</a>
				</div>
			</div><!--/span6-->			
			<div class="span4">
				<div class="alert alert-info headerinfo">
					<h4>Places You May Interest</h4>
				</div>
				<ul class="thumbnails">
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="http://placehold.it/90x90"/></a>
							<div class="caption">
								<h5>Ads Title</h5>
							</div>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="http://placehold.it/90x90"/></a>
							<div class="caption">
								<h5>Ads Title</h5>
							</div>
						</div>
					</li>
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="http://placehold.it/90x90"/></a>
							<div class="caption">
								<h5>Ads Title</h5>
							</div>
						</div>
					</li>	
					<li class="span3">
						<div class="thumbnail">
							<a href=""><img src="http://placehold.it/90x90"/></a>
							<div class="caption">
								<h5>Ads Title</h5>
							</div>
						</div>
					</li>
				</ul>
				<div class="alert alert-info headerinfo">
					<h4>Object Nearest You</h4>
				</div>
				<div id="map_canvas" style="margin:0;height:300px;">
					<!-- GOOGLE MAPS -->
				</div>
			</div><!--/span4-->
		</div>
	</div><!--/container-fluid-->
</body>
</html>