<?php
	require_once 'config.php';

	try {
    $pdo = new PDO("mysql:host=$host;dbname=" . $db_name . ';charset=utf8', $db_user, $db_pass);

    $sql = 'SELECT name, score, badges FROM Scores ORDER BY score DESC, ts ASC LIMIT 10';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
	
   if(isset($_GET['code'])){
	//header("Location: https://api.epicgames.dev/epic/oauth/v1/token?grant_type=authorization_code&deployment_id=xyza7891aTH5qQewL8HZKeeSHf9oJJDA&scope=basic_profile friends_list presence&code=" . $_GET['code']);
	echo 'POST /epic/oauth/v1/token HTTP/1.1 Host: api.epicgames.dev Content-Type: application/x-www-form-urlencoded Authorization: Basic Zm9vOmJhcg== grant_type=authorization_code& deployment_id=foo& scope=basic_profile& code=cfd1de1a8d224203b0445fe977838d81& redirect_uri=https://www.example.com';
	}

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
    
	<!-- about -->
	<div class="text-center p-5 card container" style="text-align: right;">
		<a href="https://www.epicgames.com/id/authorize?client_id=xyza7891aTH5qQewL8HZKeeSHf9oJJDA&response_type=code&scope=basic_profile&redirect_uri=https://attackonscore.com/indextest.php/&state=rfGWJux2WL86Zxr6nKApCAnDo8KexEUE">Login</a>
		<?php echo "<p>Code: " . $_GET['code'] . "</code>"; ?>
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