<?php
	if(isset($_POST['submit'])){
		session_start();
        $name = $_POST['name'];
        $password = sha1($_POST['password']);
				
        $query2 = $pdo->prepare("SELECT * FROM users WHERE username = '" . $name . "' AND BINARY password = '" . $password . "'");
        $result = $query2->execute();
				
        $count = $query2->rowCount();
        if($count > 0)
        {
            $query3 = $pdo->prepare("SELECT * FROM Scores WHERE name = '" . $name. "'");
            $result2 = $query3->execute();
					
            $count2 = $query3->rowCount();
            if($count2 > 0)
            {
                $data = $query3->fetch(PDO::FETCH_ASSOC);
                $_SESSION["score"] = $data["score"];
                $_SESSION["scoredate"] = $data["ts"];
            } else {
                $_SESSION["score"] = "You have no score set yet. <br>";
                $_SESSION["scoredate"] = "Start playing!";	
            }
            $_SESSION["username"] = $_POST["name"];
            header('Location: http://attackonscore.com/login/success.php');
            exit;
        } else {
            echo "Username or password incorrect.";
        }
    }
?>

<style>
	h1 {
		font-size: 200%;
	}
	
	h2 {
		font-size: 150%;
	}
	
	img {
		transform: translateZ(0);
		image-rendering: -webkit-optimize-contrast;
	}
</style>

<!--
<div style="background-color: red; color: white; text-align: center;">
<h1>Website will go down tomorrow do to lack of funding. Goodbye :)</h1>
</div>
-->

<!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #072468">
        <div class="container">
            <a href="http://attackonscore.com/">
                <img class="navbar-brand" src="http://attackonscore.com/images/newaoslogo.png" style="width: 100%; max-width: 300px;" alt="Attack on Score" onclick="window.location.href='http://attackonscore.com/'">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> 
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="http://attackonscore.com/top100.php" class="nav-link">Top 100</a>
                    </li>    
                    <li class="nav-item">
                        <a href="https://ko-fi.com/attackonscore" class="nav-link">Donate</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://attackonscore.com/download.php" class="nav-link">Download</a>
                    </li>    
                    <li class="nav-item">
                        <a data-bs-toggle="modal" data-bs-target="#login" type="button" class="nav-link">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	
