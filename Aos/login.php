<?php 
	require_once('config.php');

	$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //These are our variables
	$name = $_GET['name'];
	$password = $_GET['password'];
    $hash = $_GET['hash']; 

    //This is the polite version of our name
    $politestring = sanitize($name);

    $secretKey= "8LbpuWzmSQjV2XevtuFc4hCthLAXkpyJbdZ5VnBy5tz5Xt8snt39AFZfRg9e2fxhQZ5j84h4Kd56SnEQSLYrSNRxHuGxqVySemtj3DW9385s6uaK55UqTkfqYEQQ";
	
	$expected_hash = md5($name . $password . $secretKey); 
	header('Content-Type: application/json; charset=utf-8');
	$result = array();
    if($expected_hash == $hash) {
		$query = $db->prepare("SELECT * FROM users WHERE username = '" . $name . "' AND BINARY password = '" . $password . "'");
		$query->execute();
		
		$count = $query->rowCount();
		if($count > 0)
		{
			//$query2 = $db->prepare("SELECT * FROM Scores WHERE name = '" . $name. "'");
			$query2 = $db->query("SELECT  uo.*, (SELECT  COUNT(*) FROM Scores ui WHERE   (ui.score, -ui.ts) >= (uo.score, -uo.ts)) AS rank FROM    Scores uo WHERE   name = '$name';");
			$result2 = $query2->execute();
					
			$count2 = $query2->rowCount();
			if($count2 > 0)
			{
				$query = $db->query("SELECT  uo.*, (SELECT  COUNT(*) FROM Scores ui WHERE   (ui.score, -ui.ts) >= (uo.score, -uo.ts)) AS rank FROM    Scores uo WHERE   name = '$politestring';");
				$data = $query2->fetch(PDO::FETCH_ASSOC);
				$result['success'] = "success";
				$result["score"] = $data["score"];
				$result["scoredate"] = $data["ts"];
				$result["rank"] = $data["rank"];
			} else {
				$result['success'] = "noscore";
				$result["score"] = "/";
				$result["scoredate"] = "/";
				$result["rank"] = "/";
			}
		} else {
			$result['success'] = "failed";
			$result["score"] = "/";
			$result["scoredate"] = "/";
			$result["rank"] = "/";
			$result["error"] = "wrong password or user does not exist";
		}
		
    } else {
		$result['success'] = "failed";
		$result["score"] = "/";
		$result["scoredate"] = "/";
		$result["rank"] = "/";
		$result["error"] = "wrong hash";
	}
	echo json_encode($result);

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
