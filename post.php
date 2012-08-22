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
</head>
<body>
<?php include 'header.inc'?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span8">
				<div class="well">
					<form class="form-horizontal" method="post" action="signup.php">	
						<fieldset>
							<legend><h3>Post an ad for free!</h3></legend>
							<?php if(isset($is_valid) && $is_valid==false){
								echo '<div class="alert alert-error fade in">';
								echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
								foreach($errors as $e){
									echo $e.'<br/>';
								}
								echo '</div>';
							}?>
							<div class="control-group">
								<label class="control-label">Ad Title</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" name="ad_title" placeholder="Required" value="<?php echo isset($firstname) ? $firstname : null;?>"/>
								</div>
							</div>
					
							<div class="control-group">
								<label class="control-label">Ad Sub-title</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" name="ad_subtitle" placeholder="Optional" value="<?php echo isset($lastname) ? $lastname : null;?>"/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Category</label>
								<div class="controls">
									<select name="category">
									<?php while($obj = $cat->fetch_object()){
										echo '<option value="'.$obj->id.'">'.$obj->category.'</option>';
									}?>
									</select>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Ad Description</label>
								<div class="controls">
									<textarea name="ad_description" class="input-xxlarge" style="height:300px;" placeholder="Please briefly write your description."></textarea>
								</div>
							</div>			
							
							<div class="control-group">
								<label class="control-label">Attachment:</label>
								<div class="controls">
									<input type="file" name="image">
								</div>
							</div>
							
							<div class="form-actions">
								<button type="submit" class="btn btn-info" name="signup">Continue & Preview Ad <i class="icon-white icon-chevron-right"></i></button>
							</div>
						</fieldset>
					</form>
				</div>
			</div><!--/span8-->
			<div class="span4">
				<div class="alert alert-info">
					<h4>Item You May Interest</h4>
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
				<div class="alert alert-info">
					<h4>Advertisers Nearest You</h4>
				</div>
				<div id="map_canvas" style="margin:0;height:300px;">
					<!-- GOOGLE MAPS -->
				</div>
			</div><!--/span4-->
		</div>
	</div><!--/container-fluid-->
</body>
</html>