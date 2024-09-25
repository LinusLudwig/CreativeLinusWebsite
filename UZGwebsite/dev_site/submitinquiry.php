<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['form_token']) && ctype_xdigit($_POST['form_token'])) {
        if ($_POST['form_token'] === $_SESSION['form_token']) {
            unset($_SESSION['form_token']);

            // basedata
            $anrede = htmlentities(filter_var($_POST['anrede'], FILTER_SANITIZE_STRING));
            $name = htmlentities(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
            $email = htmlentities(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            $telefon = htmlentities(filter_var($_POST['telefon'], FILTER_SANITIZE_STRING));
            $strasse = htmlentities(filter_var($_POST['strasse'], FILTER_SANITIZE_STRING));
            $plzOld = htmlentities(filter_var($_POST['plzOld'], FILTER_SANITIZE_STRING));
            $zimmerOld = htmlentities(filter_var($_POST['zimmerOld'], FILTER_SANITIZE_STRING));
            $flaecheOld = htmlentities(filter_var($_POST['flaecheOld'], FILTER_SANITIZE_STRING));
            $tragwegOld = htmlentities(filter_var($_POST['tragwegOld'], FILTER_SANITIZE_STRING));
            $parkingOld = htmlentities(filter_var($_POST['parkingOld'], FILTER_SANITIZE_STRING));
            $parkingOldAlternative = htmlentities(filter_var($_POST['parkingOldAlternative'], FILTER_SANITIZE_STRING));
            $OldType = htmlentities(filter_var($_POST['OldType'], FILTER_SANITIZE_STRING));
            $etageOld = htmlentities(filter_var($_POST['etageOld'], FILTER_SANITIZE_STRING));
            $liftOld = htmlentities(filter_var($_POST['liftOld'], FILTER_SANITIZE_STRING));
            $strasseNeu = htmlentities(filter_var($_POST['strasseNeu'], FILTER_SANITIZE_STRING));
            $plzNeu = htmlentities(filter_var($_POST['plzNeu'], FILTER_SANITIZE_STRING));
            $zimmerNeu = htmlentities(filter_var($_POST['zimmerNeu'], FILTER_SANITIZE_STRING));
            $flaecheNeu = htmlentities(filter_var($_POST['flaecheNeu'], FILTER_SANITIZE_STRING));
            $tragwegNeu = htmlentities(filter_var($_POST['tragwegNeu'], FILTER_SANITIZE_STRING));
            $parkingNeu = htmlentities(filter_var($_POST['parkingNeu'], FILTER_SANITIZE_STRING));
            $parkingNeuAlternative = htmlentities(filter_var($_POST['parkingNeuAlternative'], FILTER_SANITIZE_STRING));
            $NeuType = htmlentities(filter_var($_POST['NeuType'], FILTER_SANITIZE_STRING));
            $etageNeu = htmlentities(filter_var($_POST['etageNeu'], FILTER_SANITIZE_STRING));
            $liftNeu = htmlentities(filter_var($_POST['liftNeu'], FILTER_SANITIZE_STRING));
            $date = htmlentities(filter_var($_POST['date'], FILTER_SANITIZE_STRING));
            $datetime = htmlentities(filter_var($_POST['datetime'], FILTER_SANITIZE_STRING));

            // extra services
            $needPakaging = htmlentities(filter_var($_POST['needPakaging'], FILTER_SANITIZE_STRING));
            $zerbrechlich = htmlentities(filter_var($_POST['zerbrechlich'], FILTER_SANITIZE_STRING));
            $anderes = htmlentities(filter_var($_POST['anderes'], FILTER_SANITIZE_STRING));
            $specialtrans = filter_var($_POST['specialtrans'], FILTER_SANITIZE_STRING);
            $montage = htmlentities(filter_var($_POST['montage'], FILTER_SANITIZE_STRING));
            $whatToTransport = htmlentities(filter_var($_POST['whatToTransport'], FILTER_SANITIZE_STRING));

            // List
            $data = $_POST['jsonArray'];

            // Email Data
            $to = 'test@uzg-transporte.creativelinus.de';
            $from = 'kontakt@creativelinus.de';
            $subject = "Umzugsanfrage von: " . $anrede ." " . $name;
            
            //Json -> csv
            $dataJson = json_decode($data, true);
            $csvString = implode(',', array_keys($dataJson[0])) . "\n";
            foreach ($dataJson as $row) {
                $csvString .= implode(',', $row) . "\n";
            }

            $messagecontent_html = "<html>
            <body>
            <h1>Umzugsanfrage</h1> 
            <b>Name:</b> $anrede $name <br> 
            <b>Email:</b> $email <br> 
            <b>Telefon:</b> $telefon <br>
            <b>Umzugsdatum:</b> $date<br>
            <b>Termin:</b> $datetime<br>
            
            <h2>Alte Wohnung</h2>
            <b>Adresse:</b> $strasse $plzOld<br>
            <b>Zimmer:</b> $zimmerOld<br>
            <b>Fläche:</b> $flaecheOld<br>
            <b>tragweg:</b> $tragwegOld<br>
            <b>Parken vor Haus / Wohnung Möglich?:</b> $parkingOld<br>
            <b>Alternative Parkmöglichkeit:</b> $parkingOldAlternative<br>
            <b>Hausart:</b> $OldType<br>
            <b>Etage:</b> $etageOld<br>
            <b>Aufzug:</b> $liftOld<br>
            
            <h2>Neue Wohnung</h2>
            <b>Adresse:</b> $strasseNeu $plzNeu<br>
            <b>Zimmer:</b> $zimmerNeu<br>
            <b>Fläche:</b> $flaecheNeu<br>
            <b>tragweg:</b> $tragwegNeu<br>
            <b>Parken vor Haus / Wohnung Möglich?:</b> $parkingNeu<br>
            <b>Alternative Parkmöglichkeit:</b> $parkingNeuAlternative<br>
            <b>Hausart:</b> $NeuType<br>
            <b>Etage:</b> $etageOld<br>
            <b>Aufzug:</b> $liftOld<br>

            <h2>Leistungen</h2>
            <b>Verpackung benötigt?:</b> $needPakaging<br>
            <b>Zerbrechliches Umzugsgut:</b> $zerbrechlich<br>
            <b>Anderes Umzugsgut:</b> $anderes<br>
            <b>Spezieller Transport:</b> $specialtrans<br>
            <b>Montage Möbel:</b> $montage<br>
            <b>Was soll transportiert Werden:</b> $whatToTransport<br>
            </body>
            </html>";
        
            //email
            $email = new PHPMailer();
            //$email->addReplyTo($email, $name);
            $email->SetFrom($from, 'UZG Webseite');
            $email->CharSet = 'UTF-8';
            $email->Subject = $subject;
            $email->Body = $messagecontent_html;
            $email->AddAddress($to);
            $email->AddStringAttachment($csvString, 'umzugsliste.csv');
            $email->IsHTML(true);
            $email->Send();
        } else {
            unsetTokenAndRedirect();
        }
    } else {
        unsetTokenAndRedirect();
    }
} else {
    unsetTokenAndRedirect();
}

function unsetTokenAndRedirect() {
    unset($_SESSION['form_token']);
    session_unset();
    header('Location: /anfrage.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "include/headerstuff.html" ?>
  <title>Anfrage Erfolg - UZG-Transporte</title>
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
		    <div class="col-auto px-3 fs-1 bold-text">Geschafft!</div>
		<div class="col align-self-center" style="height: 5px; background-color:#1F6C7C"></div>
	</div>
        
    <div class="on-scroll-hidden mx-max mb-5 row align-items-center">
        <h3><?php echo "Danke " . $anrede . " " . $name . ". ";?>Das senden der Nachricht war erfolgreich. Sie bekommen so schnell wie möglich eine Antwort.</h3>
    </div>
        
    <button type="button" class="on-scroll-hidden mx-max shadow-card mt-0 align-self-end btn text-medium bg-company rounded-5 px-5" onclick="index.php">Hauptseite</button>

    <?php include "include/footer.html" ?>
</body>
</html>