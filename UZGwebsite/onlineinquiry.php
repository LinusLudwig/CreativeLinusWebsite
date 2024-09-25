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

  	<div class="on-scroll-hidden row">
		<div class="col align-self-center" style="height: 5px; background-color:#1F6C7C"></div>
		<div class="col-auto px-3 fs-1" style="font-weight: 600;">Online Anfrage</div>
		<div class="col align-self-center" style="height: 5px; background-color:#1F6C7C"></div>
	</div>

	<div class="on-scroll-hidden mx-max text-center">
		<h4 class="hover-link">
			Auch als PDF verfügbar. <a href="https://www.uzg-transporte.de/Umzugsliste.pdf">Hier Klicken</a>
		</h4>

		<p>Um Ihnen ein passendes Angebot machen zu können füllen Sie bitte das nachstehende Formular aus. Gerne dürfen Sie auch das PDF ausdrucken und ausgefüllt an uns zurück schicken.</p>

		<div class="card rounded-4 p-1 mb-5 border-5" style="border-color: #1f6c7c9f;">
        	<div class="card-body">
				<div class="row m-0">
					<div class="col align-self-center" style="height: 5px; background-color:#1f6c7c9f"></div>
					<div class="col-auto px-3 fs-1" style="font-weight: 600;">Umzugsliste</div>
					<div class="col align-self-center" style="height: 5px; background-color:#1f6c7c9f"></div>
				</div>
            	<form>
					<div class="Basisdaten p-1 border rounded-4">
						<h2>1. Basisdaten</h2>		
						<!-- Personendaten -->
						<div class="mt-2 card rounded-4">
							<h4 class="card-header mb-0 hover-link">
								<a data-bs-toggle="collapse" href="#collapsePersonendaten" role="button" aria-expanded="true" aria-controls="collapsePersonendaten">Personendaten</a>
							</h4>
	
							<div class="collapse show" id="collapsePersonendaten">
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
										<label for="name" class="col-form-label"><strong>Vorname / Nachname:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control rounded-4 text-center" id="name" name="name" placeholder="Herr Max Mustermann" style="border: none; background-color: #f2f2f2;">
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
										<label for="telefon" class="col-form-label"><strong>Telefon:</strong></label>
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
										<label for="strasse" class="col-form-label"><strong>Straße:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control rounded-4 text-center" id="strasse" name="strasse" placeholder="Musterstraße 123" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="plzOld" class="col-form-label"><strong>PLZ / Ort:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control rounded-4 text-center" id="plzOld" name="plzOld" placeholder="12345 Musterhausen" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="zimmerOld" class="col-form-label"><strong>Zimmer:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="number" class="form-control rounded-4 text-center" id="zimmerOld" name="zimmerOld" placeholder="3" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="flaecheOld" class="col-form-label"><strong>Fläche:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" class="rounded-start-4 form-control text-center" id="flaecheOld" name="flaecheOld" placeholder="30" style="border: none; background-color: #f2f2f2;">
											<span class="rounded-end-4 input-group-text px-5" style="border: none; background-color: #f2f2f2;">m²</span>
										</div>
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="tragwegOld" class="col-form-label"><strong>Tragweg:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" class="rounded-start-4 form-control text-center" id="tragwegOld" name="tragwegOld" placeholder="10" style="border: none; background-color: #f2f2f2;">
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
										<label for="strasse" class="col-form-label"><strong>Straße:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control rounded-4 text-center" id="strasse" name="strasse" placeholder="Musterstraße 123" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="plzNeu" class="col-form-label"><strong>PLZ / Ort:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control rounded-4 text-center" id="plzNeu" name="plzNeu" placeholder="12345 Musterhausen" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="zimmerNeu" class="col-form-label"><strong>Zimmer:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="number" class="form-control rounded-4 text-center" id="zimmerNeu" name="zimmerNeu" placeholder="3" style="border: none; background-color: #f2f2f2;">
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="flaecheNeu" class="col-form-label"><strong>Fläche:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" class="rounded-start-4 form-control text-center" id="flaecheNeu" name="flaecheNeu" placeholder="30" style="border: none; background-color: #f2f2f2;">
											<span class="rounded-end-4 input-group-text px-5" style="border: none; background-color: #f2f2f2;">m²</span>
										</div>
									</div>
								</div>
								<div class="form-group row my-3">
									<div class="col-sm-3">
										<label for="tragwegNeu" class="col-form-label"><strong>Tragweg:</strong></label>
									</div>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" class="rounded-start-4 form-control text-center" id="tragwegNeu" name="tragwegNeu" placeholder="10" style="border: none; background-color: #f2f2f2;">
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
										<label for="date" class="col-form-label"><strong>Umzugsdatum:</strong></label>
									</div>
									<div class="col-sm-9">
										<input type="date" class="form-control rounded-4 text-center" id="date" name="date" style="border: none; background-color: #f2f2f2;">
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

						<div class="align-items-center">
							<button type="submit" class="shadow-card mt-2 btn text-medium bg-company rounded-5 px-5 d-block mx-auto">Weiter</button>
						</div>
					</div>
            	</form>
        	</div>
    	</div>
	</div>

	<?php include "include/footer.html" ?>
</body>
</html>