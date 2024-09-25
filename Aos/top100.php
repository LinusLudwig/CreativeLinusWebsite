<?php
	require_once 'config.php';

	try {
    $pdo = new PDO("mysql:host=$host;dbname=" . $db_name . ';charset=utf8', $db_user, $db_pass);

    $sql = 'SELECT name, score, badges FROM Scores ORDER BY score DESC, ts ASC LIMIT 100';
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
    <title>Top 100 | Attack on Score</title>
</head>
<body>
	<style>
        body {
            background-color: #95887f;
            font-family: aot, sans-serif;
			font-size: 200%;
			font-size-adjust: 0.4;
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
            font-size: 25;
            background-color: #012271; 
            color: white;
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
            background-color: #1c711c;
            color: gray;
        }
		.scroll-top {
		  filter: drop-shadow(1px 3px 5px rgba(0,0,0,0.55));
		  height: 150px;
		  width: 150px;
		  position: fixed;
		  top: 70px;
		  right: 10px;
		  cursor: pointer;
		  transform: scale(0.9);
		  transition: 0.3s ease-in-out transform;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		}
    </style>

    <?php include("include/header.php"); ?>
	
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
	
	<!-- best player -->
	<div class="container card text-center">
		<div class="mb-3" style="padding-top: 30px">
		<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/9eaxTxjj4VY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/ABJsOagJalM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
	
    <!-- top 100 players -->
    <div class="container card text-center">
        <h1 style="margin-bottom: 40px; margin-top:40px">Top 100 players</h1>
        <table class="table-curved" style="font-size: 30;">
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
    
	<div class="scroll-top d-none d-sm-none d-md-none d-lg-block">
	  <img class="navbar-brand" src="http://attackonscore.com/images/erenhanging.png" style="width: 100%; max-width: 500px;" alt="Attack on Score" onclick="window.location.href='http://attackonscore.com/top100.php'">
	</div>
	
	<!-- footer -->
	<?php include("include/footer.php"); ?>

	<!-- Login -->
    <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <form action="top100.php" method="post">
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
	
    <!-- Bootsrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
