<?php 
// Set the image 
$img = imagecreatetruecolor(100,100); 
imagesavealpha($img, true); 

// Fill the image with transparent color 
$color = imagecolorallocatealpha($img,0x00,0x00,0x00,127); 
imagefill($img, 0, 0, $color); 

// Save the image to file.png 
imagepng($img, "img/marker.png"); 

// Destroy image 
imagedestroy($img); 
?>