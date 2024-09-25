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
 
	<!-- search player -->
	<div class="text-center p-5 card container">
		<form action="index.php" method="post">
            <div class="d-md-flex justify-content-between align-items-center">
                <h3 class="mb-3 mb-md-0" style="width: 400px; padding-right: 50px; font-size:150%;">View player stats</h3>
                <div class="input-group">
                    <input type="text" class="btn form-control" style="background-color:white; color:black; font-size:100%;" type="text" name="name" placeholder="Enter Player Name" required/>
                    <button class="btn btn-lg" type="submit" name="create" value="Search Player">Search Player</button>
                </div>
            </div>
		</form>
	</div>

    <!-- top 10 players -->
    <div class="container card text-center" style="margin-bottom: 50px">
        <h1 style="margin-bottom: 40px; margin-top:40px">Top 10 players</h1>
        <table class="table-curved">
            <thead>
                <th>rank</th>
                <th>username</th>
                <th>titan kills</th>
				<th>badges</th>
            </thead>
            <tbody>
				<?php $i=1; while ($row = $q->fetch()): ?>
                    <tr style="border: none;">
						<td onclick="window.location.href='search.php?name=<?php echo htmlspecialchars($row['name']) ?>'" style="cursor:pointer;"><?php echo htmlspecialchars($i) ?></td>
						<td onclick="window.location.href='search.php?name=<?php echo htmlspecialchars($row['name']) ?>'" style="cursor:pointer;"><?php echo htmlspecialchars($row['name']) ?></td>
						<td onclick="window.location.href='search.php?name=<?php echo htmlspecialchars($row['name']) ?>'" style="cursor:pointer;"><?php echo htmlspecialchars($row['score']); $i++;?></td>
						<?php 
							$badges = $row['badges'];
							$badges = explode(', ', $badges);
							echo "<td style='width: 30%;'>";
							foreach ($badges as $badge) {
								if ($badge != "") {
									echo "<a href='https://attackonscore.com/images/badges/" . $badge . "'>";
									echo "<img src='https://attackonscore.com/images/badges/". $badge ."' style='width: 15%; max-width: 128px; max-height: 128px; cursor:pointer;' alt='" . $badge . "'>";
									echo "</a>";
								}
							}
							echo "</td>";
						?>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
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
