<?php
	$db_user = "aot";
	$db_pass = "WQaUXnwtDMjsYQehS5RtYt2uATvWqdJ3zzvPVVrqs6BWGDxamPjqaxgzajnU5scr";
	$db_name = "aotaccounts";

	$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    //This query grabs the top 10 scores, sorting by score and timestamp.
	$query = $db->query("SELECT * FROM Scores ORDER by score DESC, ts ASC LIMIT 10");
	header('Content-Type: application/json; charset=utf-8');
	/*while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$name[] = json_encode(array($row['name']=>$row['score']));
		//$score[] = $row['score'];
	}
	echo json_encode(array('playsers'=>$name));*/
	
	
	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$name[] = $row;
	}
	echo json_encode(array('players'=>$name));
	
	/*
	$arr = array();
	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		array_push($arr, $row);
	}
	echo json_encode($arr);*/
	
    //$result = mysql_query($query) or die('Query failed: ' . mysql_error());
 
    //We find our number of rows
    //$result_length = mysql_num_rows($result); 
    
    //And now iterate through our results
    //for($i = 0; $i < $result_length; $i++)
    //{
         //$row = mysql_fetch_array($result);
         //echo $row['name'] . "\t" . $row['score'] . "\n"; // And output them
    //}
?>
