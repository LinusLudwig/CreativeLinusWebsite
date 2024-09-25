<?php
	require_once 'config.php';

	session_start();

	try {
    $pdo = new PDO("mysql:host=$host;dbname=" . $db_name . ';charset=utf8', $db_user, $db_pass);
	$name = $_GET['name'];
	$error = "";
	
	$query = $pdo->query("SELECT  uo.*, (SELECT  COUNT(*) FROM Scores ui WHERE   (ui.score, -ui.ts) >= (uo.score, -uo.ts)) AS rank FROM    Scores uo WHERE   name = '$name';");
	$query->execute();

	$count = $query->rowCount();
	if($count > 0)
	{
		$data = $query->fetch(PDO::FETCH_ASSOC);
	} else {
		$error = "false";
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
    <title>player info | Attack on Score</title>
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
		
		html, body {
		  margin: 0px;
		  padding: 0px;
		  min-height: 100%;
		  height: 100%;
		}

		#wrapper {
		  min-height: 100%;
		  height: auto !important;
		  margin-bottom: -128px; /* the bottom margin is the negative value of the footer's total height */
		}

		#wrapper:after {
		  content: "";
		  display: block;
		  height: 50px; /* the footer's total height */
		}

		#content {
		  height: 100%;
		}

		#footer {
		  height: 50px; /* the footer's total height */
		}

		#footer-content {
		  background-color: #f3e5f5;
		  border: 1px solid #ab47bc;
		  height: 32px; /* height + top/bottom paddding + top/bottom border must add up to footer height */
		  padding: 8px;
		}		
    </style>

	
	<div id="wrapper">
	
	<?php include("include/header.php"); ?>
    
	<!-- Player info -->
	<div class="container card text-center" style="padding-top: 50px; padding-bottom: 50px; margin-bottom: 50px;">
		<form action="index.php" method="post">
					<?php  
						if(isset($name))  
						{  
							if($error == "false")  
							{  
								echo '<h1>You searched for <u>' . $name . '</u></h1>';   
								echo '<label class="info"> User does not exist or hasnt set a score yet</label> <br>';
							} else {
								?>
							<div class="row mb-3">
				              <div class="col-md6 col-sm-6">
					              <?php echo "<h1>" . $name . "</h1>";?>
				              </div>
				              <div class="col-md6 col-sm-6" style="padding-right: 5%;">
					              <?php echo "<h1>#" . $data["rank"] . "</h1>";?>
				              </div>
				             <div class="col-md6 col-sm-6">
					              <?php echo "<a>Titan Kills with ODM:</a>";?>
				              </div>
				              <div class="col-md6 col-sm-6" style="padding-right: 5%;">
					              <?php echo "<a>" . $data["score"] . " uploaded on " . $data['ts'] . "</a>";?>
				              </div>
				              <div">
				              <?php
				                  $badges = $data['badges'];
							        $badges = explode(', ', $badges);
							        echo "<td style='width: 30%;'>";
							        foreach ($badges as $badge) {
								         if ($badge != "") {
									         echo "<a href='https://attackonscore.com/images/badges/" . $badge . "'>";
									         echo "<img src='https://attackonscore.com/images/badges/". $badge ."' style='width: 15%; max-width: 128px; max-height: 128px; cursor:pointer;' alt='" . $badge . "'>";
									         echo "</a>";
								          }
							        }
							        ?>
				              </div>
                           <input class="btn btn-lg" type="button" value="back" onclick="window.location.href='http://attackonscore.com'" style="width=100%; height=100%;">				
			             </div>
								
					<?php
							}
						}  
					?>  
	      </form>
	</div>
	  
	</div>
	
	<!-- footer -->
	<?php include("include/footer.php"); ?>
	
	<!-- Login -->
    <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <form action="search.php" method="post">
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



<?php
	require_once 'config.php';

	try {	
		$name = $_GET['name'];
		$error = "";

		$db = new PDO("mysql:host=$host;dbname=" . $db_name . ';charset=utf8', $db_user, $db_pass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $db->query("SELECT  uo.*, (SELECT  COUNT(*) FROM Scores ui WHERE   (ui.score, -ui.ts) >= (uo.score, -uo.ts)) AS rank FROM    Scores uo WHERE   name = '$name';");
		$query->execute();

		$count2 = $query->rowCount();
		if($count2 > 0)
		{
			$data = $query->fetch(PDO::FETCH_ASSOC);
		} else {
			$error = "false";
		}
	} catch (PDOException $e) {
		echo "Could not connect to database. " . $e->getMessage();
	}
?>