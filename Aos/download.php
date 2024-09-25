<?php
	require_once 'config.php';

	try {
    $pdo = new PDO("mysql:host=$host;dbname=" . $db_name . ';charset=utf8', $db_user, $db_pass);

    $sql = 'SELECT name, score, badges FROM Scores ORDER BY score DESC, ts ASC LIMIT 10';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
	
	if(isset($_POST['create'])){
				$name = $_POST['name'];
				header("Location: search.php?name=" . $name);
    }

	} catch (PDOException $e) {
		die("Could not connect to the database $dbname :" . $e->getMessage());
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Adsense -->
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2536797697370331"
     crossorigin="anonymous"></script>
    <meta charset="UTF8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- own style -->
    <link href="style.css" rel="stylesheet">
    <!-- Bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/newfavicon.png">
    <title>Download Attack on Score</title>
	<meta name="description" content="Attack on Score is a free fan game that is based on the Attack on Titan manga by Hajime Isayama. All rights recerved to Kodansha, we do not own any copyright to the characters of the manga.">

</head>
<body>
	<style>
        body {
            background-color: #95887f;
            font-family: aot, sans-serif;
			font-size: 200%;
			font-size-adjust: 0.4;
        }
        
        .navbar li {
            padding-left: 10px;
        }
        
        @font-face { 
            font-family: aot; src: url(include/Fondamento-Regular.ttf);
        }
        
        .container {
            max-width: 80%
        }
        
        .carousel-item {
            height: 32rem;
            background: black;
            color: white;
            position: relative;
        }
        
        .overlay-image {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            background-position: center;
            background-size: cover;
            filter: blur(6px);
            -webkit-filter: blur(6px);
        }
        
        .btn {
            background-color: #012271; 
            color: white;
			font-size: 50%;
        }
        
        .btn:hover {
            background-color: #0238BB; 
            color: gray;
        }
        
        .card {
            padding: 10px; 
            background-color: #796e66; 
            border-style: none;
            margin-bottom: 50px;
            margin-top: 50px;
        }
		
        .table-curved {
            width: 100%;
        }
        
        .table-curved td {
            padding-top: 20px;
            padding-bottom: 20px;
            border-style: none;
            color: white;
            background-color: #012271;
            border-bottom: 10px solid #796e66;
        }
        
        .table-curved tr:first-child td:first-child { 
            border-top-left-radius: 5px; 
            border-bottom-left-radius: 10px; 
        }

        .table-curved tr:first-child td:last-child { 
            border-top-right-radius: 5px; 
            border-bottom-right-radius: 10px; 
        }

        .table-curved tr:last-child td:first-child { 
            border-top-left-radius: 10px; 
            border-bottom-left-radius: 10px; 
        }

        .table-curved tr:last-child td:last-child { 
            border-top-right-radius: 10px; 
            border-bottom-right-radius: 10px; 
        }
        
        .table-curved tr:hover td{
            background-color: #334e8d;
            color: gray;
        }
    </style>

    <?php include("include/header.php"); ?>
    
    <!-- download -->
	<div class="container card text-center" style="padding-top: 50px; padding-bottom: 50px;">
	   <h1>Download the game for your system</h1>
		<div class="row mb-3">
			<div class="col-md6 col-sm-6 mb-3">
				<h1>for Quest 2</h1>
				<div style="display: inline-block;position:relative;">
				   <a style="font-family: sans-serif; font-weight: bold; position:relative;z-index:1; top:125px;" href="https://sidequestvr.com/app/6399/attack-on-titan-vr-by-slavka-quest-port" class="btn btn-md">Download from Sidequest</a>
				   <img src="https://img.itch.zone/aW1nLzU0ODQ1ODcucG5n/360x286%23c/9lGhJt.png" height=130 width=165 style="object-fit: cover; position:absolute;top:0px;left:0px;z-index:2" /> 
				</div> 
			</div>
			<div class="col-md6 col-sm-6 mb-3">
				<h1>for PC</h1>
				     <iframe frameborder="0" src="https://itch.io/embed/964011?linkback=true&amp;border_width=0&amp;bg_color=796e66&amp;fg_color=ffffff&amp;link_color=072468&amp;border_color=796e66" width="165" height="165"><a href="https://slavkaskola.itch.io/aot-vr-slavka%22%3EAttack On Titan VR-slavka by Slavkaskola, jakemeller</a></iframe>
			</div>
		</div>
		<p>If you want to get the newest features and bug fixes join the <a href="https://discord.gg/UPcgZ6DNBk">Discord</a> for test-builds</p>
	</div>
    
	<!-- footer -->
	<?php include("include/footer.php"); ?>
    <!-- Bootsrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- Login -->
    <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <form action="index.php" method="post">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
                <button  ype="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-center">
                  <p>Login to your Attack on Score account</p>
                  <p>You don't have an account? <a href="signup">Create one</a></p>
                      <div class="mb-3">
                          <label for="username" class="col-form-label">username</label>
                          <input type="text" name="name" class="form-controll" required>
                      </div>
                      <div class="mb-3">
                          <label for="password" class="col-form-label">password</label>
                          <input type="password" name="password" class="form-controll" required>
                      </div>
              </div>
              <div class="modal-footer">
                  <input class="btn btn-lg" type="submit" name="submit" value="Login">
              </div>
            </form>
        </div>
      </div>
    </div>
</body>
</html>
