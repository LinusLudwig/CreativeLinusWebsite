<?php
	require_once '../config.php';

	session_start();

	try {
    $pdo = new PDO("mysql:host=$host;dbname=" . $db_name . ';charset=utf8', $db_user, $db_pass);
	
	if(isset($_POST['changepassword'])){
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
			$queryprep = $pdo->prepare($query);
			$queryprep->bindParam('score', $score);
			$queryprep->execute();
			header('Location: http://attackonscore.de/login/success.php');
			echo "password changed";
        } else {
            echo "password incorrect.";
        }
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
    <link rel="icon" type="image/png" href="images/favicon.png">
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
            font-family: aot; src: url(../EnchantedLand.otf); 
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
	
    <?php include("../include/header.php"); ?>
	
	<div class="container card text-center" style="padding-top: 50px; padding-bottom: 50px;">
		<form action="index.php" method="post">
					<?php  
						if(isset($_SESSION["username"]))  
						{  
							echo '<h1>Login Success, Welcome - '.$_SESSION["username"].'</h1>';    
							echo '<label class="info"> Score: ' . $_SESSION["score"] . '</label> <br>';  
							echo '<label class="info"> Score date: ' . $_SESSION["scoredate"] . '</label>';
						}  
					?>  
					<br class="mb-3">
					<input class="btn btn-lg" type="button" value="log out" onclick="window.location.href='logout.php'">
		</form>
		<form action="success.php" method="post">
				<p>Change your password</p>
				<div class="mb-3">
					<label for="newpassword" class="col-form-label">new password</label>
					<input type="password" name="newpassword" class="form-controll" required>
				</div>
				<div class="mb-3">
					<label for="oldpassword" class="col-form-label">old password</label>
					<input type="password" name="oldpassword" class="form-controll" required>
				</div>
				<input class="btn btn-lg" type="submit" name="changepassword" value="change password">
		</form>
	</div>
	</div>
	
	<!-- footer -->
	<?php include("include/footer.php"); ?>
	
	<!-- Login -->
    <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <form action="success.php" method="post">
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
