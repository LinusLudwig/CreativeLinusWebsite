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
			color: white;
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
    
    <!-- top 10 players -->
    <div class="container card text-left" style="padding:100px">
        <h1>Privacy Policy for attackonscore.com</h1>

		<p>At attackonscore.com, accessible from https://attackonscore.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by attackonscore.com and how we use it.</p>

		<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

		<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in attackonscore.com. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the <a href="https://www.privacypolicygenerator.info">Free Privacy Policy Generator</a>.</p>

		<h2>Consent</h2>

		<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>

		<h2>Information we collect</h2>

		<p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
		<p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>
		<p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>

		<h2>How we use your information</h2>

		<p>We use the information we collect in various ways, including to:</p>

		<ul>
		<li>Provide, operate, and maintain our website</li>
		<li>Improve, personalize, and expand our website</li>
		<li>Understand and analyze how you use our website</li>
		<li>Develop new products, services, features, and functionality</li>
		<li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
		<li>Send you emails</li>
		<li>Find and prevent fraud</li>
		</ul>

		<h2>Log Files</h2>

		<p>attackonscore.com follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>


		<h2>Google DoubleClick DART Cookie</h2>

		<p>Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – <a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>


		<h2>Advertising Partners Privacy Policies</h2>

		<P>You may consult this list to find the Privacy Policy for each of the advertising partners of attackonscore.com.</p>

		<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on attackonscore.com, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

		<p>Note that attackonscore.com has no access to or control over these cookies that are used by third-party advertisers.</p>

		<h2>Third Party Privacy Policies</h2>

		<p>attackonscore.com's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>

		<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.</p>

		<h2>CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>

		<p>Under the CCPA, among other rights, California consumers have the right to:</p>
		<p>Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>
		<p>Request that a business delete any personal data about the consumer that a business has collected.</p>
		<p>Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>
		<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

		<h2>GDPR Data Protection Rights</h2>

		<p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
		<p>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>
		<p>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>
		<p>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
		<p>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>
		<p>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>
		<p>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>
		<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

		<h2>Children's Information</h2>

		<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

		<p>attackonscore.com does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>
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
