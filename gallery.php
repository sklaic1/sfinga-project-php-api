<?php 
$json = file_get_contents('img/gallery.json');
$json_data = json_decode($json,true);
	
print '
	<h2>Galerija slika</h2>
	<div class="gallery">';
foreach($json_data as $key => $value) { 
	print '
		<figure><img src="'.$json_data[$key]["img"].'" alt="" title="">
		<figcaption>'.$json_data[$key]["desc"].'</figcaption></figure>';
}
print '
	</div>';
?>
