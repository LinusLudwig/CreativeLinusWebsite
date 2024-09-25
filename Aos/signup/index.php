<?php
	require_once '../config.php';

	try {
		$pdo = new PDO("mysql:host=$host;dbname=" . $db_name . ';charset=utf8', $db_user, $db_pass);

		if(isset($_POST['create'])){
			$name = $_POST['name'];
			$email    = $_POST['email'];
			$password = sha1($_POST['password']);
			$reppassword = sha1($_POST['reppassword']);

			if($reppassword == $password) {
				$query = $pdo->prepare("SELECT username FROM users WHERE username = '" . $name . "' OR email='".$email."'");
				$query->bindParam(':name', $username);
				$query->execute();
				
				if($query->rowCount() > 0){
					echo "The username or email is already being used!";
				} else {
					$query4 = $pdo->prepare("INSERT INTO users (username, email, password) VALUES(?,?,?)");
					$result = $query4->execute([$name, $email, $password]);
					if($result){
						header('Location: success.php');
						exit;
					}else{
						echo 'There was an error while creating the account.';
					}
				}
			} else {
				echo "please check password";
			}
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
    <link rel="icon" type="image/png" href="../images/newfavicon.png">
    <title>Sign Up | Attack on Score</title>
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
            font-family: aot; src: url(../include/Fondamento-Regular.ttf);
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
    </style>

   <?php include("../include/header.php"); ?>
   
    <!-- sign up -->
    <form action="index.php" method="post">
		<div class="container card text-center" style="padding-top: 50px; padding-bottom: 50px;">
			<h1>Create an Account</h1>
			<p>Please fill out the form to create an account.</p>

			<div class="row mb-3">
				<div class="col-md4 col-sm-3">
					<label for="name" style="width: 90%"><b>Username</b></label>
				</div>
				<div class="col-md4 col-sm-9 mb-3" style="padding-right: 5%;">
					<input class="form-control" type="text" name="name" required>
				</div>
			
				<div class="col-md4 col-sm-3">
					<label for="email"><b>Email</b></label>
				</div>
				<div class="col-md4 col-sm-9 mb-3" style="padding-right: 5%;">
					<input class="form-control" type="text" name="email" required>
				</div>
				
				<div class="col-md4 col-sm-3">
					<label for="password"><b>Password</b></label>
				</div>
				<div class="col-md4 col-sm-9 mb-3" style="padding-right: 5%;">
					<input class="form-control" type="password" name="password" required>
				</div>
				
				<div class="col-md4 col-sm-3">
					<label for="reppassword"><b>Repeat Password</b></label>
				</div>
				<div class="col-md4 col-sm-9 mb-3" style="padding-right: 5%;">
					<input class="form-control" type="password" name="reppassword" required>
				</div>
			</div>
			<div>
				<input class="btn btn-lg" style="width:40%" type="submit" name="create" value="Create Account">
			</div>
			
		</div>
	</form>
	
    <!-- benefits -->
	<div class="container card text-center" style="padding-top: 50px; padding-bottom: 50px;">
		<div class="row mb-3">
			<div class="col-md6 col-sm-6 mb-3">
				<h1>Why create an account?</h1>
				<p>With an account you get the benefit of...</p>
				<ul>
					<li>uploading your game stats to Attack on Score</li>
					<li>viewing your game stats online</li>
					<li>comparing your skill with other players</li>
				</ul>
				<p></p>
				<p>In the future you will be able to...</p>
				<ul>
					<li>save your game settings online</li>
					<li>play on multiplayer servers</li>
				</ul>
			</div>
			<div class="col-md5 col-sm-3">
				<img src="https://attackonscore.com/images/levi.png" style="display: block; margin-left: auto; margin-right: auto;" alt="">
			</div>
		</div>
	</div>
    
	<!-- footer -->
	<?php include("../include/footer.php"); ?>
	
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