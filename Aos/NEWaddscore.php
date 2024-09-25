<?php 
    require_once('config.php');

	$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //These are our variables
	$name = $_GET['name'];
	$password = $_GET['password'];
	$score = $_GET['score'];
    $hash = $_GET['hash'];

    //This is the polite version of our name
    $politestring = sanitize($name);

    $secretKey= "8LbpuWzmSQjV2XevtuFc4hCthLAXkpyJbdZ5VnBy5tz5Xt8snt39AFZfRg9e2fxhQZ5j84h4Kd56SnEQSLYrSNRxHuGxqVySemtj3DW9385s6uaK55UqTkfqYEQQ";
	$result = array();
	header('Content-Type: application/json; charset=utf-8');
	$expected_hash = md5($name . $password . $secretKey); 
    if($expected_hash == $hash) {
		$loginquery = $db->prepare("SELECT * FROM users WHERE username = '" . $name . "' AND BINARY password = '" . $password . "'");
		$loginquery->execute();
		
		$count = $loginquery->rowCount();
		if($count > 0)
		{
			if($score >= 1000)
			{
				setbadge("aos1kbadge.png", $db, $name);
			}
			
			if($score >= 10000)
			{
				setbadge("first10_10k.png", $db, $name);
			}
			
			if($score >= 50000)
			{
				setbadge("maidenless.png", $db, $name);
			}
			
			echo $badges;
			
			$query = "INSERT INTO Scores SET name = '$politestring',  score = '$score', badges = '$badges', ts = CURRENT_TIMESTAMP ON DUPLICATE KEY UPDATE ts = if('$score'>score,CURRENT_TIMESTAMP,ts), score = if ('$score'>score, '$score', score);";
			$queryprep = $db->prepare($query);
			$queryprep->bindParam('score', $score);
			$queryprep->execute();
			$result['success'] = "success";
		} else {
			$result['success'] = "wrong password";
		}
    }else{
		$result['success'] = "wrong hash";
	}
	
	echo json_encode($result);

function setbadge($newbadge, $db, $name)
{
	$querybadge = $db->query("SELECT  uo.*, (SELECT  COUNT(*) FROM Scores ui WHERE   (ui.score, -ui.ts) >= (uo.score, -uo.ts)) AS rank FROM    Scores uo WHERE   name = '$name';");
	$querybadge->execute();
			
	$countbadge = $querybadge->rowCount();
	if($countbadge > 0)
	{
		$data = $querybadge->fetch(PDO::FETCH_ASSOC);
		$badges = $data['badges'];
		
		if($badges == "")
		{
			$querysetbadge = "UPDATE Scores SET badges='" . $newbadge . "' WHERE name='" . $name . "'";
			$queryprepsetbadge = $db->prepare($querysetbadge);
			$queryprepsetbadge->execute();
		}else{
			if(!stristr($newbadge, $badges))
			{		
				$badges = $badges . ', ' . $newbadge;
				$querysetbadge = "UPDATE Scores SET badges='" . $badges . "' WHERE name='" . $name . "'";
				$queryprepsetbadge = $db->prepare($querysetbadge);
				$queryprepsetbadge->execute();
			}
		}
	}
}

/////////////////////////////////////////////////
// string sanitize functionality to avoid
// sql or html injection abuse and bad words
/////////////////////////////////////////////////
function no_naughty($string)
{
    $string = preg_replace('/shit/i', 'shoot', $string);
    $string = preg_replace('/fuck/i', 'fool', $string);
    $string = preg_replace('/asshole/i', 'animal', $string);
    $string = preg_replace('/bitches/i', 'dogs', $string);
    $string = preg_replace('/bitch/i', 'dog', $string);
    $string = preg_replace('/bastard/i', 'plastered', $string);
    $string = preg_replace('/nigger/i', 'newbie', $string);
    $string = preg_replace('/cunt/i', 'corn', $string);
    $string = preg_replace('/cock/i', 'rooster', $string);
    $string = preg_replace('/faggot/i', 'piglet', $string);

    $string = preg_replace('/suck/i', 'rock', $string);
    $string = preg_replace('/dick/i', 'deck', $string);
    $string = preg_replace('/crap/i', 'rap', $string);
    $string = preg_replace('/blows/i', 'shows', $string);

    // ie does not understand "&apos;" &#39; &rsquo;
    $string = preg_replace("/'/i", '&rsquo;', $string);
    $string = preg_replace('/%39/i', '&rsquo;', $string);
    $string = preg_replace('/&#039;/i', '&rsquo;', $string);
    $string = preg_replace('/&039;/i', '&rsquo;', $string);

    $string = preg_replace('/"/i', '&quot;', $string);
    $string = preg_replace('/%34/i', '&quot;', $string);
    $string = preg_replace('/&034;/i', '&quot;', $string);
    $string = preg_replace('/&#034;/i', '&quot;', $string);

    // these 3 letter words occur commonly in non-rude words...
    //$string = preg_replace('/fag', 'pig', $string);
    //$string = preg_replace('/ass', 'donkey', $string);
    //$string = preg_replace('/gay', 'happy', $string);
    return $string;
}

function my_utf8($string)
{
    return strtr($string,
      "/<>€µ¿¡¬ˆŸ‰«»Š ÀÃÕ‘¦­‹³²Œ¹÷ÿŽ¤Ððþý·’“”ÂÊÁËÈÍÎÏÌÓÔ•ÒÚÛÙž–¯˜™š¸›",
      "![]YuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy");
}

function safe_typing($string)
{
    return preg_replace("/[^a-zA-Z0-9 \!\@\%\^\&\*\.\*\?\+\[\]\(\)\{\}\^\$\:\;\,\-\_\=]/", "", $string);
}

function sanitize($string)
{
    // make sure it isn't waaaaaaaay too long
    $MAX_LENGTH = 250; // bytes per chat or text message - fixme?
    $string = substr($string, 0, $MAX_LENGTH);
    $string = no_naughty($string);
    // breaks apos and quot: // $string = htmlentities($string,ENT_QUOTES);
    // useless since the above gets rid of quotes...
    //$string = str_replace("'","&rsquo;",$string);
    //$string = str_replace("\"","&rdquo;",$string);
    //$string = str_replace('#','&pound;',$string); // special case
    $string = my_utf8($string);
    $string = safe_typing($string);
    return trim($string);
}


?>
