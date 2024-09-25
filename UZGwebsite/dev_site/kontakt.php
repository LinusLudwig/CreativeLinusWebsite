<?php
// Output messages
$responses = [];
// Check if the form was submitted
if (isset($_POST['email'], $_POST['telefon'], $_POST['name'], $_POST['nachricht'], $_POST['anrede'], $_POST['plz'])) {
	// Validate email adress
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$responses[] = 'Die angegebene E-Mail ist nicht gültig.';
	}
	// check form fields are not empty
	if (empty($_POST['email']) || empty($_POST['telefon']) || empty($_POST['name']) || empty($_POST['nachricht']) || empty($_POST['anrede']) || empty($_POST['plz'])) {
		$responses[] = 'Alle Felder müssen ausgefüllt werden.';
	} 
	// If there are no errors
	if (!$responses) {
		// Where to send the mail
		$to      = 'info@uzg-transporte.de';
		// mail from email address
		$from = 'webseitenkontakt@uzg-transporte.de';
		// Mail subject
		$subject = "Nachricht vom Webseitenkontaktformular von " . $_POST['anrede'] ." " .$_POST['name'];
		
		// Mail message
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['nachricht'];
        $plz = $_POST['plz'];
        $anrede = $_POST['anrede'];
        $telefon = $_POST['telefon'];
		
		$messagecontent_html = "<html>
                                <body>
                                    <h1>Nachricht vom Webseitenkontaktformular</h1> 
                                    <u>Name:</u> $anrede $name <br> 
                                    <u>PLZ / Stadt:</u> $plz <br> 
                                    <u>Email:</u> $email <br> 
                                    <u>Telefon:</u> $telefon <br> 
                                    <u>Nachricht:</u><br>
                                    $message
                                </body>
                            </html>";
		
		// Mail headers
		$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $_POST['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . "Content-type: text/html; charset=utf-8";
		// Try to send the mail
		if (mail($to, $subject, $messagecontent_html, $headers)) {
			// Success
			$responses[] = 'Nachricht gesendet!';		
            header('Location: index.php');
            exit();
		} else {
			// Fail
			$responses[] = 'Die Nachricht konnte nicht gesendet werden!';
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "include/headerstuff.html" ?>
  <title>Kontakt - UZG-Transporte</title>
</head>
<body>
	<?php include "include/header.html" ?>

    <style>
        label, input, textarea {
            font-size: 150% !important;
        }
    </style>    

    <div class="on-scroll-hidden row mb-3">
	    <div class="col align-self-center" style="height: 5px; background-color:#1F6C7C"></div>
		    <div class="col-auto px-3 fs-1 bold-text">Kontakt</div>
		<div class="col align-self-center" style="height: 5px; background-color:#1F6C7C"></div>
	</div>
        
    <div class="on-scroll-hidden mx-max mb-5 row align-items-center">
        <div class="col-sm-6">
            <div class="row my-3">
                <div class="col align-self-center bold-text">
                    Adresse:
                </div>
                <div class="col">
                    UZG-Transporte<br>
                    Inh. Jörg Carstens<br>
                    Lüdjenbüttel 21<br>
                    25704 Elpersbüttel
                </div>
            </div>
            <div class="row my-3">
                <div class="col bold-text">
                    E-Mail:
                </div>
                <div class="col">
                    <a href="mailto:info@uzg-transporte.de">info@uzg-transporte.de</a>
                </div>
            </div>
            <div class="row my-3">
                <div class="col bold-text">
                    Telefon:
                </div>
                <div class="col">
                    <a href="tel:048329793570">04832 - 979 357 0</a>
                </div>
            </div>
            <div class="row my-3">
                <div class="col bold-text">
                    Fax:
                </div>
                <div class="col">
                    04832 - 979 357 1
                </div>
            </div>
            <div class="row my-3">
                <div class="col bold-text">
                    Mobil:
                </div>
                <div class="col">
                    <a href="tel:01749684891">0174 - 968 489 1</a>
                </div>
            </div>
            <div class="row my-3">
                <div class="col bold-text">
                    Internet:
                </div>
                <div class="col">
                    uzg-transporte.de
                </div>
            </div>
        </div>

        <div class="col d-flex justify-content-center align-items-center" style="max-height:300px;">
            <img src="/resource/backgroundimage2.webp" alt="Background Image" class="rounded-5 shadow-card object-fit-contain img-fluid" style="max-height: inherit">
        </div>
    </div>
    
    <div class="on-scroll-hidden card rounded-4 p-3 mb-5 mx-max border-5" style="border-color: #1f6c7c9f;">
        <div class="card-body">
            <h1 class="mb-4 text-center mt-3">Nehmen Sie direkt mit uns Kontakt auf</h1>
            <?php 
            if(isset($responses)) {
                echo "<div class='text-center '> <strong>";
                foreach ($responses as $response) {
                    echo $response . "<br>";
                }
                echo "</strong></div>";
            }
            ?>
            <form method="post" action="">
                <div class="form-group row my-3">
                    <div class="col-sm-3">
                        <label for="anrede" class="col-form-label"><strong>Anrede:</strong></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control rounded-4 text-center" id="anrede" name="anrede" placeholder="Herr / Frau / Divers" style="border: none; background-color: #f2f2f2;">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <div class="col-sm-3">
                        <label for="name" class="col-form-label"><strong>Name:</strong></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control rounded-4 text-center" id="name" name="name" placeholder="Max Mustermann" style="border: none; background-color: #f2f2f2;">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <div class="col-sm-3">
                        <label for="email" class="col-form-label"><strong>E-Mail:</strong></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="email" class="form-control rounded-4 text-center" id="email" name="email" placeholder="beispiel@email.de" style="border: none; background-color: #f2f2f2;">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <div class="col-sm-3">
                        <label for="plz" class="col-form-label"><strong>PLZ / Ort:</strong></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control rounded-4 text-center" id="plz" name="plz" placeholder="12345 Musterhausen" style="border: none; background-color: #f2f2f2;">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <div class="col-sm-3">
                        <label for="telefon" class="col-form-label"><strong>Telefon:</strong></label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control rounded-4 text-center" id="telefon" name="telefon" placeholder="0176 12345678" style="border: none; background-color: #f2f2f2;">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <div class="col-sm-3">
                        <label for="nachricht" class="col-form-label"><strong>Nachricht:</strong></label>
                    </div>
                    <div class="col-sm-9">
                        <textarea class="form-control rounded-4 text-left" id="nachricht" name="nachricht" placeholder="Beispiel Nachricht" style="border: none; background-color: #f2f2f2; height: 200px;"></textarea>
                    </div>
                </div>
                <div class="align-items-center">
                    <button type="submit" class="shadow-card mt-2 btn text-medium bg-company rounded-5 px-5 d-block mx-auto">Absenden</button>
                </div>
            </form>
        </div>
    </div>
        
    <?php include "include/backbutton.html" ?>

    <?php include "include/footer.html" ?>
</body>
</html>