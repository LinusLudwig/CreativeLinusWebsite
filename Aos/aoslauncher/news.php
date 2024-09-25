<?php 

	header('Content-Type: application/json; charset=utf-8');
	
	$news[0] = array("content"=>"Attack on score version 0.0.1 is out!", "header"=>"Aos update", "image"=>"https://attackonscore.com/aoslauncher/images/ahego.jpg");
	
	echo json_encode($news);

?>