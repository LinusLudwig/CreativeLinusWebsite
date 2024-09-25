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
    <meta charset="UTF8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- own style -->
    <link href="style.css" rel="stylesheet">
    <!-- Bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/newfavicon.png">
    <title>Attack on Score</title>
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
            background-color: #144b14;
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
            background-color: #1c711c;
            color: gray;
        }
    </style>

    <?php include("include/header.php"); ?>
    
    <!-- carousel news -->
    <div id="Carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#Carousel" data-bs-slide-to="0"></li>
            <li data-bs-target="#Carousel" data-bs-slide-to="1"></li>
			<li data-bs-target="#Carousel" data-bs-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner text-center"  style="font-size:200%;">
            <div class="carousel-item" id="slider" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="overlay-image" style="background-image: url(images/slide1.png); filter: brightness(85%)"></div>
                <div class="container" style="position: absolute; bottom: 0; left: 0; right: 0; padding-bottom: 50px;">
                    <h1>Build 5v5 is out.</h1>
                    <p>Download it here:</p>
                    <a href="https://slavkaskola.itch.io/aot-vr-slavka" class="btn btn-md">Download</a>
                </div>
            </div>

            <div class="carousel-item" id="slider" data-bs-ride="carousel" data-bs-interval="7000">
                <div class="overlay-image" style="background-image: url(images/slide2.jpeg)"></div>
                <div class="container" style="position: absolute; bottom: 0; left: 0; right: 0; padding-bottom: 50px;">
                    <h1>Online leaderboard added to the game.</h1>
                    <p>Create an account now:</p>
                    <a href="signup" class="btn btn-md">Sign up</a>
                </div>
            </div>
            
			<div class="carousel-item active" id="slider" data-bs-ride="carousel" data-bs-interval="7000">
                <div class="overlay-image" style="background-image: url(images/slide3.jpeg)"></div>
                <div class="container" style="position: absolute; bottom: 0; left: 0; right: 0; padding-bottom: 50px;">
                    <h1>Build for Oculus Quest now on Sidequest</h1>
                    <p>Download the Quest APK here:</p>
                    <a href="https://sidequestvr.com/app/6399/attack-on-titan-vr-by-slavka-quest-port" class="btn btn-md">Download</a>
                </div>
            </div>
			
            <a href="#Carousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a href="#Carousel" class="carousel-control-next" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>

    <!-- about -->
    <div class="container card text-center" style="color:white;">
        <h1 style="margin-bottom: 40px; margin-top:40px">What is Attack on Score?</h1>
		<p>Attack on Score is a free fan game that is based on the Attack on Titan manga by Hajime Isayama. Like many other fan games you are able to fly around and kill titans like in the manga. However there are a ton of more features already implemented for example shift into titans, flipping, riding horses, advanced weather system, online scoreboard, multiplayer, titan bosses and many more planned for the future.</p>
		<p>The game is completly free and always will be. If you still want to suport the game consider donating.</p>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
