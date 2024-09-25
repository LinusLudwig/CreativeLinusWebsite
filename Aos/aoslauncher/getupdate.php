<?php
	$attachment_location = $_SERVER["DOCUMENT_ROOT"] . "/aoslauncher/game/gametestdatalol.txt"; 
	if (file_exists($attachment_location)) { 
		header($_SERVER["SERVER_PROTOCOL"] . " 200 OK"); header("Cache-Control: public"); 
            	// needed for internet explorer
            	header("Content-Type: application/zip"); header("Content-Transfer-Encoding: Binary"); header("Content-Length:".filesize($attachment_location)); header("Content-Disposition: 
            	attachment; filename=gametestdatalol.txt"); readfile($attachment_location); die();
        } else {
            	die("Error: File not found." . $attachment_location);
        } 
?>
