<?php
// token geeration
session_start();
$token = bin2hex(random_bytes(32));
$_SESSION['form_token'] = $token;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "include/headerstuff.html" ?>
  <title>Online Anfrage - UZG-Transporte</title>
  <link rel="stylesheet" href="style/onlineinquiry.css" type="text/css">
  <script defer src="/js_onlineinquiry.js"></script>
</head>
<body>
	<?php include "include/header.html" ?>

  	<div class="on-scroll-hidden row" id="top">
		<div class="col align-self-center" style="height: 5px; background-color:#1F6C7C"></div>
		<div class="col-auto px-3 fs-1" style="font-weight: 600;">Online Anfrage</div>
		<div class="col align-self-center" style="height: 5px; background-color:#1F6C7C"></div>
	</div>

	<div class="on-scroll-hidden mx-max text-center">
		<h4 class="hover-link">
			Auch als PDF verfügbar. <a href="https://www.uzg-transporte.de/Umzugsliste.pdf">Hier Klicken</a>
		</h4>

		<p>Um Ihnen ein passendes Angebot machen zu können füllen Sie bitte das nachstehende Formular aus. Gerne dürfen Sie auch das PDF ausdrucken und ausgefüllt an uns zurück schicken.</p>

		<div class="card rounded-4 p-1 mb-5 border-5" style="border-color: #1F6C7C;">
        	<div class="card-body">
				<div class="row m-0">
					<div class="col align-self-center" style="height: 5px; background-color:#1F6C7C"></div>
					<div class="col-auto px-3 fs-1" style="font-weight: 600;">Umzugsliste</div>
					<div class="col align-self-center" style="height: 5px; background-color:#1F6C7C"></div>
				</div>
            	<form data-multi-step method="post" id="form" action="submitinquiry.php" onsubmit="submit2(event)">
					<div class="Basisdaten p-1 border rounded-4 active" data-step>
						<h2>1. Basisdaten</h2>		
						<p><span style="color: red;">*</span> = Pflichfeld</p>
						<!-- Personendaten -->
						<div class="mt-2 card rounded-4">
							<h4 class="card-header mb-0 hover-link">
								<a data-bs-toggle="collapse" href="#collapsePersonendaten" role="button" aria-expanded="true" aria-controls="collapsePersonendaten">Personendaten</a>
							</h4>
	
							<div class="collapse show" id="collapsePersonendaten">
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="anrede" class="col-form-label"><strong>Anrede</strong><span style="color: red;">*</span>:</label>
									</div>
									<div class="col-sm-9">
										<input type="text" required class="form-control rounded-4 text-center" id="anrede" name="anrede" placeholder="Herr / Frau / Divers" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="name" class="col-form-label"><strong>Vorname / Nachname</strong><span style="color: red;">*</span>:</label>
									</div>
									<div class="col-sm-9">
										<input type="text" required class="form-control rounded-4 text-center" id="name" name="name" placeholder="Herr Max Mustermann" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="email" class="col-form-label"><strong>E-Mail</strong><span style="color: red;">*</span>:</label>
									</div>
									<div class="col-sm-9">
										<input type="email" required class="form-control rounded-4 text-center" id="email" name="email" placeholder="beispiel@email.de" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="telefon" class="col-form-label"><strong>Telefon</strong>:</label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control rounded-4 text-center" id="telefon" name="telefon" placeholder="0176 12345678" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
							</div>
						</div>

						<!-- Alter Umzugsort -->
						<div class="my-2 card rounded-4">
							<h4 class="card-header mb-0 hover-link">
								<a data-bs-toggle="collapse" href="#collapseAltOrt" role="button" aria-expanded="false" aria-controls="collapseAltOrt">Alter Umzugsort</a>
							</h4>
	
							<div class="collapse" id="collapseAltOrt">
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="strasse" class="col-form-label"><strong>Straße<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" required class="form-control rounded-4 text-center" id="strasse" name="strasse" placeholder="Musterstraße 123" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="plzOld" class="col-form-label"><strong>PLZ / Ort<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" required class="form-control rounded-4 text-center" id="plzOld" name="plzOld" placeholder="12345 Musterhausen" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="zimmerOld" class="col-form-label"><strong>Zimmer<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="number" required class="form-control rounded-4 text-center" id="zimmerOld" name="zimmerOld" placeholder="3" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="flaecheOld" class="col-form-label"><strong>Fläche<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" required class="rounded-start-4 form-control text-center" id="flaecheOld" name="flaecheOld" placeholder="30" style="border: none; background-color: #f2f2f2;">
											<span class="rounded-end-4 input-group-text px-5" style="border: none; background-color: #f2f2f2;">m²</span>
										</div>
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="tragwegOld" class="col-form-label"><strong>Tragweg<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" required class="rounded-start-4 form-control text-center" id="tragwegOld" name="tragwegOld" placeholder="10" style="border: none; background-color: #f2f2f2;">
											<span class="rounded-end-4 input-group-text px-5" style="border: none; background-color: #f2f2f2;">m</span>
										</div>
									</div>
								</div>
								<div class="form-group row my-3 align-items-center">
									<div class="col-sm-3">
										<label for="parkingOld" class="col-form-label"><strong>Parken vor Haus / Wohnung problemlos?:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="parkingOld" id="parkingOld" value="ja">
											<label class="form-check-label" for="parkingOldRadio1">Ja</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="parkingOld" id="parkingOld" value="nein">
											<label class="form-check-label" for="parkingOldRadio2">Nein</label>
										</div>
									</div>
								</div>
								<div class="form-group row my-3" id="OldNoPark">
									<div class="col-sm-3">
										<label for="parkinOldAlternative" class="col-form-label"><strong>Alternative Parkmöglichkeit:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control rounded-4 text-center" id="parkinOldAlternative" name="parkinOldAlternative" placeholder="Straße runter" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="OldType" class="col-form-label"><strong>Hausart:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="OldType" id="OldType" value="haus">
											<label class="form-check-label" for="OldTypeRadio1">Haus</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="OldType" id="OldType" value="wohnung">
											<label class="form-check-label" for="OldTypeRadio2">Wohnung</label>
										</div>
									</div>
								</div>
								<div id="oldApartment">
									<div class="form-group row my-3">
										<div class="col-sm-3">
											<label for="etageOld" class="col-form-label"><strong>Etage:</strong></label>
										</div>
										<div class="col-sm-9">
											<input type="number" class="form-control rounded-4 text-center" id="etageOld" name="etageOld" placeholder="2" style="border: none; background-color: #f2f2f2;">
										</div>
									</div>
									<div class="form-group row my-3">
										<div class="col-sm-3">
											<label for="liftOld" class="col-form-label"><strong>Aufzug:</strong></label>
										</div>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="liftOld" id="liftOld" value="ja">
												<label class="form-check-label" for="liftOldRadio1">Ja</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="liftOld" id="liftOld" value="nein">
												<label class="form-check-label" for="liftOldRadio2">Nein</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Neuer Umzugsort -->
						<div class="my-2 card rounded-4">
							<h4 class="card-header mb-0 hover-link">
								<a data-bs-toggle="collapse" href="#collapseNeuOrt" role="button" aria-expanded="false" aria-controls="collapseNeuOrt">Neuer Umzugsort</a>
							</h4>
	
							<div class="collapse" id="collapseNeuOrt">
							<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="strasse" class="col-form-label"><strong>Straße<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" required class="form-control rounded-4 text-center" id="strasse" name="strasse" placeholder="Musterstraße 123" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="plzNeu" class="col-form-label"><strong>PLZ / Ort<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" required class="form-control rounded-4 text-center" id="plzNeu" name="plzNeu" placeholder="12345 Musterhausen" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="zimmerNeu" class="col-form-label"><strong>Zimmer<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="number" required class="form-control rounded-4 text-center" id="zimmerNeu" name="zimmerNeu" placeholder="3" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="flaecheNeu" class="col-form-label"><strong>Fläche<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" required class="rounded-start-4 form-control text-center" id="flaecheNeu" name="flaecheNeu" placeholder="30" style="border: none; background-color: #f2f2f2;">
											<span class="rounded-end-4 input-group-text px-5" style="border: none; background-color: #f2f2f2;">m²</span>
										</div>
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="tragwegNeu" class="col-form-label"><strong>Tragweg<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" required class="rounded-start-4 form-control text-center" id="tragwegNeu" name="tragwegNeu" placeholder="10" style="border: none; background-color: #f2f2f2;">
											<span class="rounded-end-4 input-group-text px-5" style="border: none; background-color: #f2f2f2;">m</span>
										</div>
									</div>
								</div>
								<div class="form-group row my-3 align-items-center">
									<div class="col-sm-3">
										<label for="parkingNeu" class="col-form-label"><strong>Parken vor Haus / Wohnung problemlos?:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="parkingNeu" id="parkingNeu" value="ja">
											<label class="form-check-label" for="parkingNeuRadio1">Ja</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="parkingNeu" id="parkingNeu" value="nein">
											<label class="form-check-label" for="parkingNeuRadio2">Nein</label>
										</div>
									</div>
								</div>
								<div class="form-group row my-3" id="NeuNoPark">
									<div class="col-sm-3">
										<label for="parkinNeuAlternative" class="col-form-label"><strong>Alternative Parkmöglichkeit:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control rounded-4 text-center" id="parkinNeuAlternative" name="parkinNeuAlternative" placeholder="Straße runter" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="NeuType" class="col-form-label"><strong>Hausart:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="NeuType" id="NeuType" value="haus">
											<label class="form-check-label" for="NeuTypeRadio1">Haus</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="NeuType" id="NeuType" value="wohnung">
											<label class="form-check-label" for="NeuTypeRadio2">Wohnung</label>
										</div>
									</div>
								</div>
								<div id="neuApartment">
									<div class="form-group row my-3">
										<div class="col-sm-3">
											<label for="etageNeu" class="col-form-label"><strong>Etage:</strong></label>
										</div>
										<div class="col-sm-9">
											<input type="number" class="form-control rounded-4 text-center" id="etageNeu" name="etageNeu" placeholder="2" style="border: none; background-color: #f2f2f2;">
										</div>
									</div>
									<div class="form-group row my-3">
										<div class="col-sm-3">
											<label for="liftNeu" class="col-form-label"><strong>Aufzug:</strong></label>
										</div>
										<div class="col-sm-9">
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="liftNeu" id="liftNeu" value="ja">
												<label class="form-check-label" for="liftNeuRadio1">Ja</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="liftNeu" id="liftNeu" value="nein">
												<label class="form-check-label" for="liftNeuRadio2">Nein</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Termin -->
						<div class="mt-2 card rounded-4">
							<h4 class="card-header mb-0 hover-link">
								<a data-bs-toggle="collapse" href="#collapseTermin" role="button" aria-expanded="false" aria-controls="collapseTermin">Termin</a>
							</h4>
	
							<div class="collapse" id="collapseTermin">
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="date" class="col-form-label"><strong>Umzugsdatum<span style="color: red;">*</span>:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="date" required class="form-control rounded-4 text-center" id="date" name="date" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="datetime" class="col-form-label"><strong>Termin:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="datetime" id="DateRadio1" value="genau">
											<label class="form-check-label" for="DateRadio1">Genau</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="datetime" id="DateRadio2" value="fruesten">
											<label class="form-check-label" for="DateRadio2">Frühsten</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="datetime" id="DateRadio3" value="spaetestens">
											<label class="form-check-label" for="DateRadio3">Spätestens</label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Nav Button -->
						<div class="align-items-center">
							<button type="button" data-next class="shadow-card mt-2 btn text-medium bg-company rounded-5 px-5 d-block mx-auto">Weiter</button>
						</div>
					</div>

					<div class="Leistungen p-1 border rounded-4" data-step>
						<h2>2. Leistungen</h2>
						<div class="mt-2 card rounded-4">
							<div class="form-group row my-3 align-items-center">
								<div class="col-sm-3">
									<label for="needPakaging" class="col-form-label"><strong>Verpackung benötigt?:</strong></label>
								</div>
								<div class="col-sm-9">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="needPakaging" id="needPakagingRadio1" value="ja">
										<label class="form-check-label" for="needPakagingRadio1">Ja</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="needPakaging" id="needPakagingRadio2" value="nein">
										<label class="form-check-label" for="needPakagingRadio2">Nein</label>
									</div>
								</div>
							</div>
							<div class="form-group row my-3 align-items-center">
								<div class="col-sm-3">
									<label for="zerbrechlich" class="col-form-label"><strong>Zerbrechliches Umzugsgut:</strong></label>
								</div>
								<div class="col-sm-9">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="zerbrechlich[]" id="zerbrechlichCheck1" value="einpacken">
										<label class="form-check-label" for="zerbrechlichRadio1">Einpacken</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="zerbrechlich[]" id="zerbrechlichCheck2" value="auspacken">
										<label class="form-check-label" for="zerbrechlichCheck2">Auspacken</label>
									</div>
								</div>
							</div>
							<div class="form-group row my-3 align-items-center">
								<div class="col-sm-3">
									<label for="anderes" class="col-form-label"><strong>Anderes Umzugsgut:</strong></label>
								</div>
								<div class="col-sm-9">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="anderes[]" id="anderesCheck1" value="einpacken">
										<label class="form-check-label" for="anderesRadio1">Einpacken</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="anderes[]" id="anderesCheck2" value="auspacken">
										<label class="form-check-label" for="anderesCheck2">Auspacken</label>
									</div>
								</div>
							</div>			
							<div class="form-group row my-3 align-items-center">
								<div class="col-sm-3">
									<label for="specialtrans" class="col-form-label"><strong>Spezieller Transport:</strong></label>
								</div>
								<div class="col-sm-9">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="specialtrans[]" id="specialtransCheck1" value="zerbrechliches">
										<label class="form-check-label" for="specialtransCheck1">Zerbrechliches</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="specialtrans[]" id="specialtransCheck2" value="großePflanzen">
										<label class="form-check-label" for="specialtransCheck2">große Pflanzen</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="specialtrans[]" id="specialtransCheck3" value="Elektronik">
										<label class="form-check-label" for="specialtransCheck3">Elektronik</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="specialtrans[]" id="specialtransCheck4" value="spermuellEntsorgen">
										<label class="form-check-label" for="specialtransCheck4">Spermüll entsorgen</label>
									</div>
								</div>
							</div>
							<div class="form-group row my-3 align-items-center">
								<div class="col-sm-3">
									<label for="montage" class="col-form-label"><strong>Montage Möbel:</strong></label>
								</div>
								<div class="col-sm-9">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="montage[]" id="montageCheck1" value="abbauen">
										<label class="form-check-label" for="montageCheck1">Abbauen</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="montage[]" id="montageCheck2" value="aufbauen">
										<label class="form-check-label" for="montageCheck2">Aufbauen</label>
									</div>
								</div>
							</div>
							<div class="form-group row my-3 align-items-center">
									<div class="col-sm-3">
										<label for="whatToTransport" class="col-form-label"><strong>Was soll transportiert werden?:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="whatToTransport" id="whatToTransportRadio1" value="complete">
											<label class="form-check-label" for="whatToTransportRadio1">Komplettes Umzugsgut</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="whatToTransport" id="whatToTransportRadio2" value="onlyHeavyBig">
											<label class="form-check-label" for="whatToTransportRadio2">Nur schwere / große Sachen</label>
										</div>
									</div>
								</div>
						</div>
						<!-- Nav Buttons -->
						<div class="row justify-content-center">
							<div class="col-12 col-md-6">
								<button type="button" data-previous class="shadow-card mt-2 btn text-medium bg-company rounded-5 px-5 d-block mx-auto">Zurück</button>
							</div>
							<div class="col-12 col-md-6">
								<button type="button" data-next class="shadow-card mt-2 btn text-medium bg-company rounded-5 px-5 d-block mx-auto">Weiter</button>
							</div>
						</div>
					</div>

					<div class="Umzugsliste p-1 border rounded-4" data-step>
						<h2>3. Umzugsgut</h2>
						
						<p>Bitte füllen Sie die Liste mit den Möbeln, die Sie transportieren möchten. Häufig vorkommende Möbel sind bereits in der Liste aufgeführt. <br>Falls Sie weitere Gegenstände haben, fügen Sie diese bitte der Liste hinzu.</p>
						
						<div class="table-responsive border rounded-4">
							<table class="table align-middle mb-0 table-striped table-borderless table-sm">
								<thead>
									<tr class="table-blue">
										<th scope="col">Menge</th>
										<th scope="col">Objekt</th>
										<th scope="col" class="mx-5">Aktion</th>
									</tr>
								</thead>
								<tbody body-id="1">
									<?php
										$items = array('Fernseher', 'Tisch', 'Sofa je Sitz', 'Buffet', 'Brücke', 'Bücherregal', 'Wohnzimmerschrak je m',  'Pflanze ü. 1,5m', 'Sessel', 'Sideboard', 'Stehlampe', 'Vitrine', 'Deckenlampe', 'Fehrnsehrtisch', 'Kommode', 'Pflanze u. 1,5m', 'Stereoanlage', 'Teppich', 'Kartons');
										$rowElementContent = file_get_contents('include/rowElement.html');
										$rowElementContent =  str_replace('value="1"', 'value="0"', $rowElementContent);
										$count = 0;
										foreach ($items as $item) {
											$itemrowElementContent = str_replace('[ID]', $count, $rowElementContent);
											$itemrowElementContent = str_replace('placeholder="Objekt Name"', 'placeholder="Objekt Name" value="' . $item . '"', $itemrowElementContent);
											echo $itemrowElementContent;
											$count++;
										}
									?>
								</tbody>
								<caption><button type="button" onclick="addRow('1')" class="btn shadow-card bg-company mx-auto rounded-3 d-block"><i class="bi bi-plus"></i> Objekt Hinzufügen</button></caption>
							</table>
						</div>
							
						<!-- Hidden Input for data -->
						<input type="hidden" id="jsonArray" name="jsonArray">
						<input type="hidden" name="form_token" value="<?php echo $token; ?>">

						<!-- Nav Buttons -->
						<div class="row justify-content-center">
							<div class="col-12 col-md-6">
								<button type="button" data-previous class="shadow-card mt-2 btn text-medium bg-company rounded-5 px-5 d-block mx-auto">Zurück</button>
							</div>
							<div class="col-12 col-md-6">
								<button type="submit" class="shadow-card mt-2 btn text-medium bg-company rounded-5 px-5 d-block mx-auto">Absenden</button>
							</div>
						</div>
					</div>
            	</form>
        	</div>
    	</div>
	</div>

	<?php include "include/footer.html" ?>
</body>
</html>