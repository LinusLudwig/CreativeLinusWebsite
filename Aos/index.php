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
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Adsense -->
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2536797697370331"
     crossorigin="anonymous"></script>
	 
    <meta charset="UTF8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- own style -->
    <link href="style.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="images/newfavicon.png">
    <title>Attack on Score</title>
	<meta name="description" content="Attack on Score is a free fan game that is based on the Attack on Titan manga by Hajime Isayama. All rights recerved to Kodansha, we do not own any copyright to the characters of the manga.">
	<meta property="og:type" content="website">
	<meta property="og:image" content="https://attackonscore.com/images/newfavicon.png" />
	<meta property="twitter:image" content="https://attackonscore.com/images/newfavicon.png" />
	<meta property="og:description" content="Attack on Score is a free fan game that is based on the Attack on Titan manga by Hajime Isayama. All rights recerved to Kodansha, we do not own any copyright to the characters of the manga." />
	<meta property="og:url"content="https://attackonscore.com/" />
	<meta property="og:title" content="Attack on Score" />
    <!-- Bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

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
            max-width: 90%
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
		
		.overlay-video {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            background-position: center;
            background-size: cover;
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
            background-color: #796E66; 
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
		
		.intro-div {
			position: relative;
			width: 100%;
			height: 50vw;
			display: flex;
			justify-content: center;
			overflow: hidden;
			align-items: center;
			color: white;
		}
		
		.intro-div h1, .intro-div ol{
			text-align: center;
			font-size: 6vw;
			z-index: 1;
			list-style-type: none;
		}
		
		.intro-div p{
			text-align: center;
			font-size: 2vw;
			z-index: 1;
		}
		
		.intro-div li{
			text-align: center;
			font-size: 4vw;
			z-index: 1;
			filter: drop-shadow(10px 10px 10px black);
			-webkit-filter: (10px 10px 5px black);
		}
		
		.intro-video {
			position: absolute;
			left: 0;
			width: 100%;
		}
		.intro-video video{
			position: absolute;
			top: -25vw;
			left: 0;
			width: 100%;
			object-fit: cover;
		}
    </style>

    <?php include("include/header.php"); ?>
    
	<div class="intro-div">
		<ol>
            <li><p>Kill titans, ride horses, fly in the air, explore the world, ...</p></li>
            <li><h1>Play Attack on Score for free!</h1></li>
			<li><a style="margin-right: 50px" class="btn" href="https://sidequestvr.com/app/6399/attack-on-titan-vr-by-slavka-quest-port">Download for Quest 2</a><a style="margin-left: 50px" class="btn" href="https://slavkaskola.itch.io/aot-vr-slavka">Download for PCVR</a></li>
        </ol>
		
		<div class="intro-video">
			<video id="video" muted disablepictureinpicture="" autoplay="autoplay" loop="" preload="auto" playsinline="" style="filter: blur(10px); -webkit-filter: blur(10px)">
				<source src="https://attackonscore.com/images/trailer.mp4" type="video/mp4" />
			</video>
		</div>
	</div>

	<!-- about -->
	<div class="text-center p-5 card container" style="text-align: right;">
		<h1>About</h1>
		<hr>
		<div class="row mb-3" >
			<div class="col-lg-8 col-md-12">
				<h2 class="text-center">Description</h2>
				<p>Attack on Score is a free fan game that is based on the Attack on Titan manga by Hajime Isayama. Like many other fan games you are able to fly around and kill titans like in the manga. However there are a ton of more features already implemented for example shifting into titans, flipping, riding horses, advanced weather system, online scoreboard, multiplayer, titan bosses and many more planned for the future. </p>
				<p>The game is completly free and always will be. If you still want to suport the game consider donating.</p>
			</div>
			<div class="col-lg-4 col-md-12">
				<h2 class="text-center">Showcase</h2>
				<iframe style="width:100%; height:250px; max-width:400px;" src="https://www.youtube-nocookie.com/embed/tS-2a36pKJY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<iframe style="width:100%; height:250px; max-width:400px;" src="https://www.youtube-nocookie.com/embed/7OI8U3YQicI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<hr>
		</div>
		<div class="row justify-content-center">
			<a class="col-1" href="https://www.reddit.com/r/AttackOnTitanVR/"><i class="bi-reddit" style="font-size: 2rem; color: black;"></i></a>
			<a class="col-1" href="mailto:attackontitanvr@gmail.com"><i class="bi-envelope-fill" style="font-size: 2rem; color: black;"></i></a>
			<a class="col-1" href="https://discord.gg/bz7ZMgmudw"><i class="bi-discord" style="font-size: 2rem; color: black;"></i></a>
		</div>
	</div>
	
    <!-- carousel news -->
    <div class="text-center p-5 card container card">
		<h1>News</h1>
		<hr>
		<div id="Carousel" class="carousel slide" data-bs-ride="carousel">
			<ol class="carousel-indicators">
				<li data-bs-target="#Carousel" data-bs-slide-to="0"></li>
				<li data-bs-target="#Carousel" data-bs-slide-to="1"></li>
				<li data-bs-target="#Carousel" data-bs-slide-to="2"></li>
				<li data-bs-target="#Carousel" data-bs-slide-to="3"></li>
				<li data-bs-target="#Carousel" data-bs-slide-to="4" class="active"></li>
			</ol>
			<div class="carousel-inner text-center"  style="font-size:2vw;">
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
				
				<div class="carousel-item" id="slider" data-bs-ride="carousel" data-bs-interval="7000">
					<div class="overlay-image" style="background-image: url(images/slide3.jpeg)"></div>
					<div class="container" style="position: absolute; bottom: 0; left: 0; right: 0; padding-bottom: 50px;">
						<h1>Build for Oculus Quest now on Sidequest</h1>
						<p>Download the Quest APK here:</p>
						<a href="https://sidequestvr.com/app/6399/attack-on-titan-vr-by-slavka-quest-port" class="btn btn-md">Download</a>
					</div>
				</div>
				
				<div class="carousel-item" id="slider" data-bs-ride="carousel" data-bs-interval="7000">
					<div class="overlay-image" style="background-image: url(images/slide4.png); -webkit-filter: brightness(0.7); -moz-filter: brightness(0.7); -o-filter: brightness(0.7); -ms-filter: brightness(0.7); box-shadow: inset 0 0 100px black;"></div>
					<div class="container" style="position: absolute; bottom: 0; left: 0; right: 0; padding-bottom: 50px;">
						<h1>Build 6 teaser trailer</h1>
						<p>Watch the trailer on youtube:</p>
						<a href="https://www.youtube.com/watch?v=uH3ZAldWvUw" class="btn btn-md">watch</a>
					</div>
				</div>
				
				<div class="carousel-item active" id="slider" data-bs-ride="carousel" data-bs-interval="7000">
					<div class="overlay-image" style="background-image: url(images/slide5.webp); -webkit-filter: brightness(0.7); -moz-filter: brightness(0.7); -o-filter: brightness(0.7); -ms-filter: brightness(0.7); box-shadow: inset 0 0 100px black;"></div>
					<div class="container" style="position: absolute; bottom: 0; left: 0; right: 0; padding-bottom: 50px;">
						<h1>รєє ฬђคՇร ς๏๓เภﻮ</h1>
						<p>句ヨ己卞尺回と 卞廾ヨ冊</p>
						<a href="images/dsafjk.zip" class="btn btn-md">r̬̹͈͕͕̞ͦ͐͞ͅỉ̷̦̠̤s̝͎̭̱͔̠͎̳̅̑́ë̷̜̪</a>
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
		<!--<hr>
		<a href="/news.php">Read all news</a>-->
    </div>
 
	<!-- newest videos -->
    <div class="text-center p-5 card container">
		<div id="Vids" class="carousel slide" data-bs-ride="vids">
			<h1>Newest community videos</h1>
			<hr>
			<?php
				try {
					$pdoVIDS = new PDO("mysql:host=$host;dbname=" . "aotvids" . ';charset=utf8', $db_user, $db_pass);
					$sqlVIDS = 'SELECT id, text FROM videos ORDER BY id DESC LIMIT 5';
					$qVIDS = $pdoVIDS->query($sqlVIDS);
					$qVIDS->setFetchMode(PDO::FETCH_ASSOC);
					} catch (PDOException $e) {
						echo("Could not connect to the database aotvids :" . $e->getMessage());
				}
			?>
				
			<ol class="carousel-indicators">
				<?php
					$cards = "";
					$x = 0;
					while ($rowVIDS = $qVIDS->fetch()): 
						if ($x == 0) {
							?>
								<li data-bs-target="#Vids" data-bs-slide-to="0" class="active"></li>
							<?php
							$cards = '<div class="carousel-item active" id="slider" data-bs-ride="vids" data-bs-interval="5000"> 
											<div class="overlay-video">
												<iframe style="width:100%; height:100%;" src="https://www.youtube-nocookie.com/embed/' . $rowVIDS["text"] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										</div>';
						} else {
							?>
								<li data-bs-target="#Vids" data-bs-slide-to="<?php echo htmlspecialchars($x); ?>"></li>
							<?php 
							$cards .= ' <div class="carousel-item" id="slider" data-bs-ride="vids" data-bs-interval="5000"> 
											<div class="overlay-video">
												<iframe style="width:100%; height:100%;" src="https://www.youtube-nocookie.com/embed/' . $rowVIDS["text"] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										</div>';
						}
						$x++;
					endwhile; 
				?>
			</ol>
			<div class="carousel-inner text-center"  style="font-size:4vw;">	
				<?php
					echo $cards;
				?>
				
				<a href="#Vids" class="carousel-control-prev" role="button" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				</a>
				<a href="#Vids" class="carousel-control-next" role="button" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
				</a>
			</div>
		</div>
		<hr>
		<a href="https://attackonscore.com/videos.php" style="color: inherit; padding-top: 20px;">More videos</a>
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
		<hr>
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
