<?php
	require_once '../config.php';
	
	echo "post";
	if(isset($_POST['create'])){
		echo "login";
		$name = $_SESSION["username"];
		$newpassword = sha1($_POST['newpassword']);
		$password = sha1($_POST['oldpassword']);
				
        $query2 = $pdo->prepare("SELECT * FROM users WHERE username = '" . $name . "' AND BINARY password = '" . $password . "'");
        $result = $query2->execute();
				
        $count = $query2->rowCount();
        if($count > 0)
        {
			echo "change password";
			$query = "UPDATE users SET password='" . $newpassword . "' WHERE username='" . $name . "'";
			$queryprep = $db->prepare($query);
			$queryprep->bindParam('score', $score);
			$queryprep->execute();   
        } else {
            echo "password incorrect.";
        }
	}
?>