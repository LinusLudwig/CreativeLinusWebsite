var preData = [];
const Wohnzimmer = [
  'Wohnz.-Schrank zerlegb. je angef. m',
  'Bilder über 0,8m',
  'Büffet mit Aufsatz',
  'Fernseher',
  'Fernsehtisch / -schränkchen',
  'Kommode / Truhe',
  'Musikschrank / Turm',
  'Nähmaschine (Schrank)',
  'Pflanze 0,7-1,5m',
	'Regal zerlegbar, je angef. m',
  'Regal nicht zerlegbar',
  'Schreibtisch bis 1,6m',
	'Schreibtisch über 1,6m',
  'Sekretär',
  'Sessel mit Armlehnen',
	'Sessel ohne Armlehnen',
  'Sideboard',
	'Sofa / Couch / Liege, je Sitz',
  'Standuhr',
	'Stehlampe',
  'Stuhl mit Armlehne',
	'Stuhl ohne Armlehnen',
  'Teppich',
	'Tisch bis 1,2m',
	'Tisch über 1,2m',
  'Vitrine / Glasschrank',
  'Bücherkisten',
  'Karton'
];

const Schlafzimmer = [
  'Bett: Doppelbett',
	'Bett: Einzelbett',
	'Bett: Etagenbett',
  'Deckenlampe',
  'Fernseher',
  'Kommode / Truhe',
	'Nachttisch',
	'Schrank bis 2 Türen, nicht zerlegbar',
	'Schrank zerlegbar je angef, m',
	'Spiegel über 0,8m',
	'Stuhl / Hocker',
	'Wäschetruhe',
  'Kleiderbox',
	'Karton',
];

const Küche = [
  'Bessenschrank',
	'Büffet mit Aufsatz',
	'Eckbank je Sitz',
	'Geschirrspülmaschine',
	'Herd',
	'Hängeschrank je Tür',
	'Unterschrank je Tür',
	'Kühlschrank bis 120l',
	'Kühlschrank über 120l',
	'Mikrowelle',
	'Regal zerlegbar je angef. m',
	'Stuhl / Hocker',
	'Tisch bis 1,2m',
	'Tisch über 1,2m',
	'Waschmaschine / Trockner',
	'Karton',
];

const Diele_Bad = [
  'Garderobe / Hut- Kleiderablage',
	'Kommode / Truhe',
	'Schuhschrank',
	'Stuhl / Hocker',
	'Toilettenschrank',
	'Wäscheschrank',
	'Karton',
];

const Kinderzimmer = [
  'Bett: Einzelbett',
	'Bett: Etagenbett',
	'Bett: Kinderbett',
	'Kommode / Truhe',
	'Nachttisch',
	'Schrank bis 2 Türen, nicht zerlegbar',
	'Schrank zerlegbar je angef, m',
	'Schreibtisch bis 1,6m',
	'Schreibtisch über 1,6m',
	'Stuhl / Hocker',
	'Teppich',
	'Tisch bis 1,2m',
	'Karton',
];

const Arbeitszimmer = [
  'Aktenschrank',
  'Bücherregal nicht zerlegb. je m',
	'Bücherregal zerlegb. je angf. m',
	'EDV-Anlage',
	'Schreibtisch bis 1,6m',
	'Schreibtisch über 1,6m',
  'Büro Container',
	'Schreibtischstuhl',
	'Sessel mit Armlehnen',
	'Sessel ohne Armlehnen',
	'Tisch bis 1,2m',
	'Tisch über 1,2m',
	'Bücherkisten',
  'Karton',
];

const Esszimmer = [
  'Büffet mit Aufsatz',
  'Eckbank je Sitz',
  'Sideboard',
  'Stuhl mit Armlehne',
	'Stuhl ohne Armlehnen',
	'Teppich',
	'Tisch bis 1,2m',
	'Tisch über 1,2m',
	'Vitrine / Glasschrank',
];

const Keller = [
  'Autoreifen',
	'Fahrrad / Moped',
	'Kinderwagen',
	'Koffer',
	'Regal zerlegbar je angef. m',
	'Werkbank zerlegbar',
	'Werkzeugschrank',
	'Werkzeugkoffer',
];

const Garage = [
  'Autoreifen',
  'Blumenkübel / Kasten',
	'Dreirad / Kinderrad',
	'Fahrrad / Moped',
	'Klapptisch / Klappstuhl',
	'Leiter je angef. m',
	'Mültonne',
	'Rasenmäher / Motor',
	'Regal zerlegbar je angef. m',
	'Karton',
];

preData.push({
  room: 'Wohnzimmer',
  objects: Wohnzimmer
});

preData.push({
  room: 'Schlafzimmer',
  objects: Schlafzimmer
});

preData.push({
  room: 'Küche',
  objects: Küche
});

preData.push({
  room: 'Diele / Bad',
  objects: Diele_Bad
});

preData.push({
  room: 'Kinderzimmer',
  objects: Kinderzimmer
});

preData.push({
  room: 'Arbeitszimmer',
  objects: Arbeitszimmer
});

preData.push({
  room: 'Esszimmer',
  objects: Esszimmer
});

preData.push({
  room: 'Keller / Speicher',
  objects: Keller
});

preData.push({
  room: 'Garage',
  objects: Garage
});

const roomWrapper = document.getElementById('table-wrapper');


preData.forEach((room) => {
  roomWrapper.querySelectorAll('input').forEach((input) => {input.setAttribute("value", input.value);});
  var roomId = 0;
  fetch('/include/roomElement.html')
  .then(response => response.text())
  .then(data => {
    if (roomWrapper.childElementCount > 0) {
      const lastID = parseInt(roomWrapper.lastElementChild.getAttribute('room_id'));
      roomId = lastID + 1;
      data = data.replace(/ROOMID/gi, roomId);
    } else {
      data = data.replace(/ROOMID/gi, roomId);
    }

    const roomElementDom = document.createRange().createContextualFragment(data);
    roomWrapper.appendChild(roomElementDom);
    roomElementDom.innerHTML += data;
    roomElement = document.getElementById("room_" + roomId);
    roomElement.children[1].classList.remove('show');
    roomElement.children[0].children[1].classList.remove('showCollapse');
    roomName = roomElement.querySelector('#roomName');
    roomName.value = room.room;
    roomName.setAttribute("value", room.room);

    const tbody = roomElement.querySelector('tbody');
    room.objects.forEach((object) => {
      fetch('/include/objectElement.html')
      .then(response => response.text())
      .then(data => {
        data = data.replace(/value="1"/g, 'value="0"');
        data = data.replace(/value=""/g, 'value="' + object + '"');
        tbody.innerHTML += data;
      });
    });
  });
});

// No parking for new place
document.querySelectorAll('input[name="parkingNeu"]').forEach((radio) => {
  if (radio.value === 'ja' || !radio.checked) {
    document.getElementById('NeuNoPark').style.display = 'none';
  } else {
    document.getElementById('NeuNoPark').style.display = 'flex';
  }

  radio.addEventListener('change', () => {
    if (radio.value === 'nein' && radio.checked) {
      document.getElementById('NeuNoPark').style.display = 'flex';
    } else {
      document.getElementById('NeuNoPark').style.display = 'none';
    }
  });
});

// New place type
document.querySelectorAll('input[name="NeuType"]').forEach((radio) => {
  if (radio.value === 'haus' || !radio.checked) {
    document.getElementById('neuApartment').style.display = 'none';
  } else {
    document.getElementById('neuApartment').style.display = 'block';
  }

  radio.addEventListener('change', () => {
    if (radio.value === 'wohnung' && radio.checked) {
      document.getElementById('neuApartment').style.display = 'block';
    } else {
      document.getElementById('neuApartment').style.display = 'none';
    }
  });
});

// No parking for old place
document.querySelectorAll('input[name="parkingOld"]').forEach((radio) => {
  if (radio.value === 'ja' || !radio.checked) {
    document.getElementById('OldNoPark').style.display = 'none';
  } else {
    document.getElementById('OldNoPark').style.display = 'flex';
  }

  radio.addEventListener('change', () => {
    if (radio.value === 'nein' && radio.checked) {
      document.getElementById('OldNoPark').style.display = 'flex';
    } else {
      document.getElementById('OldNoPark').style.display = 'none';
    }
  });
});

// Old place type
document.querySelectorAll('input[name="OldType"]').forEach((radio) => {
  if (radio.value === 'haus' || !radio.checked) {
    document.getElementById('oldApartment').style.display = 'none';
  } else {
    document.getElementById('oldApartment').style.display = 'block';
  }

  radio.addEventListener('change', () => {
    if (radio.value === 'wohnung' && radio.checked) {
      document.getElementById('oldApartment').style.display = 'block';
    } else {
      document.getElementById('oldApartment').style.display = 'none';
    }
  });
});

//step-system
const multiStepForm = document.querySelector("[data-multi-step")
const formSteps = [...multiStepForm.querySelectorAll("[data-step]")]
const formStepDisplay = [...multiStepForm.querySelectorAll("[data-step-display]")]
let currentStep = formSteps.findIndex(step => {
  return step.classList.contains("active")
})

if(currentStep < 0) {
  currentStep = 0
  showCurrentStep()
}

multiStepForm.addEventListener("click", e => {
  let adding
  if (e.target.matches("[data-next]")) {
    adding = 1
  } else if (e.target.matches("[data-previous]")) {
    adding = -1
  }

  if (adding == null) {return}

  const inputs = [...formSteps[currentStep].querySelectorAll("input")]
  const allValid = inputs.every(input => input.checkValidity())
  if (allValid) {
    currentStep +=  adding
    showCurrentStep()
  }else {
    alert("Es wurden nicht alle Pflichfelder ausgefüllt.");
  }
})

function showCurrentStep() {
  document.getElementById("top").scrollIntoView();
  formSteps.forEach((step, index) => {
    step.classList.toggle("active", index === currentStep);
  })
  formStepDisplay.forEach((step, index) => {
    step.classList.toggle("activeNum", index === currentStep);
  })
}

// New Code

function collapseButton(button) {
  button.classList.toggle('showCollapse');
  document.activeElement.blur()
}

function roomDel(button) {
  const parent = button.parentElement;
  const roomNameInput = parent.querySelector('#roomName');
  var roomNameValue = roomNameInput.value;
  if(roomNameValue != "") {
    roomNameValue = roomNameValue + " ";
  }
  var confirmMsg = confirm("Soll der Raum " + roomNameValue + "gelöscht werden? Alle Möbel in diesem Raum werden gelöscht. Wenn ja, klicken Sie auf OK.");
  if (confirmMsg) {
    parent.parentElement.remove();
  }
}

function roomAdd(button) {
  const roomWrapper = button.parentElement.querySelector('#table-wrapper');
  roomWrapper.querySelectorAll('input').forEach((input) => {input.setAttribute("value", input.value);});
  fetch('/include/roomElement.html')
  .then(response => response.text())
  .then(data => {
    if (roomWrapper.childElementCount > 0) {
      const lastID = parseInt(roomWrapper.lastElementChild.getAttribute('room_id'));
      const room_id = lastID + 1;
      data = data.replace(/ROOMID/gi, room_id);
    } else {
      data = data.replace(/ROOMID/gi, 0);
    }
    roomWrapper.innerHTML += data;
  });
}

function objectDel(button) {
  button.parentElement.parentElement.remove();
}

function objectAdd(button) {
  const parent = document.getElementById("room_" + button.getAttribute('room_ID'));
  const tbody = parent.querySelector('tbody');
  tbody.querySelectorAll('input').forEach((input) => {input.setAttribute("value", input.value);});
  fetch('/include/objectElement.html')
  .then(response => response.text())
  .then(data => {
    tbody.innerHTML += data;
  });
}

function sendData(event) {
  event.preventDefault();

  const tablesCollection = document.getElementById('table-wrapper').children;
  const tables = Array.from(tablesCollection);
  var dataArray = [];

  tables.forEach((table) => {
    if(table.children.length > 0) {
      const roomName = table.querySelector('#roomName').value;
      const objectsCollection = table.querySelector('tbody').children;
      const objects = Array.from(objectsCollection);
      objects.forEach((object) => {
        const objectName = object.querySelector('#name').value;
        const objectCount = object.querySelector('#count').value;
        if (objectCount > 0) {
          dataArray.push({
            raum: roomName,
            objekt: objectName,
            anzahl: objectCount
          });
        }
      });
    }
  });

  document.getElementById('jsonArray').value = JSON.stringify(dataArray);
  document.getElementById('form').submit();
  return true;
}