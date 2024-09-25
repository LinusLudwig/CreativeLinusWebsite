<?php
	$Gameversion = "0.0.4";
	$Launcherversion = "0.0.1";
	$slavka = "5";

	if(isset($_GET['platform']))
	{
		$platformArray = explode ("-", $_GET['platform']);
		if($platformArray[0] == "game")
		{
			$attachment_location = $_SERVER["DOCUMENT_ROOT"] . "/aoslauncher/" . $platformArray[0] . "/" . $platformArray[1] . "/aosmulti" . $Gameversion . ".zip"; 
			if (file_exists($attachment_location)) { 
				header($_SERVER["SERVER_PROTOCOL"] . " 200 OK"); 
				header("Cache-Control: public"); 
				// needed for internet explorer
				header("Content-Type: application/zip"); 
				header("Content-Transfer-Encoding: Binary"); 
				header("Content-Length:".filesize($attachment_location)); 
				header("Content-Disposition: attachment; filename=aosmulti.zip"); 
				readfile($attachment_location); 
				die();
			} else {
				die("Error: File not found." . $attachment_location);
			} 
		}
		//download for launcher
		if($platformArray[0] == "launcher") {
			$attachment_location = $_SERVER["DOCUMENT_ROOT"] . "/aoslauncher/" . $platformArray[0] . "/" . $platformArray[1] . "/aoslauncher" . $Launcherversion . ".zip"; 
			if (file_exists($attachment_location)) { 
				header($_SERVER["SERVER_PROTOCOL"] . " 200 OK"); 
				header("Cache-Control: public"); 
				// needed for internet explorer
				header("Content-Type: application/zip"); 
				header("Content-Transfer-Encoding: Binary"); 
				header("Content-Length:".filesize($attachment_location)); 
				header("Content-Disposition: attachment; filename=aotlauncher.zip"); 
				readfile($attachment_location); 
				die();
			} else {
				die("Error: File not found." . $attachment_location);
			}
		}
		//download for slavkasingleplayer
		if($platformArray[0] == "slavka") {
			$attachment_location = $_SERVER["DOCUMENT_ROOT"] . "/aoslauncher/" . $platformArray[0] . "/" . $platformArray[1] . "/slavkasingleplayer.zip"; 
			if (file_exists($attachment_location)) { 
				header($_SERVER["SERVER_PROTOCOL"] . " 200 OK"); 
				header("Cache-Control: public"); 
				// needed for internet explorer
				header("Content-Type: application/zip"); 
				header("Content-Transfer-Encoding: Binary"); 
				header("Content-Length:".filesize($attachment_location)); 
				header("Content-Disposition: attachment; filename=slavkasingleplayer.zip"); 
				readfile($attachment_location); 
				die();
			} else {
				die("Error: File not found." . $attachment_location);
			}
		}
		//download for aos update
		if($platformArray[0] == "update") {
			if(isset($_GET['file']))
			{
				if(isset($_GET['hash']))
				{
					
				} else {
					die("Error: please spesify hash to compare for");
				}
			} else {
				die("Error: please spesify file to check hash for");
			}
		}
		
	}else{
		header('Content-Type: application/json; charset=utf-8');
	
		$version = array("GameVersion"=>$Gameversion, "LauncherVersion"=>$Launcherversion, "Slavka"=>$slavka);
		
		echo json_encode($version);
	}
?>
