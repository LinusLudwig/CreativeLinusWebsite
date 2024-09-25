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
  console.log("Top");
  formSteps.forEach((step, index) => {
    step.classList.toggle("active", index === currentStep);
  })
}

//row adding and removing
/*
const body = document.querySelector('[body-id="' + 1 + '"]');
const items = ['Fernseher', 'Tisch', 'Sofa', 'Buffet'];
items.forEach(item => {
  addRow("1", item);
});*/


function addRow(bodyId, /*replaceText=""*/) {
  fetch('/include/rowElement.html')
  .then(response => response.text())
  .then(data => {
    const body = document.querySelector('[body-id="' + bodyId + '"]');
    var newChildId = 0;

    if (body.childElementCount <= 0) {
      data =  data.replace(/\[ID\]/g, "0");
      newChildId = 0;
    } else {
      const chil = document.getElementById("bb").getElementsByTagName("input");
      for (const child of chil) {
        child.setAttribute("value", child.value);
      }

      const lastChild = body.lastElementChild;
      const lastRowId = parseInt(lastChild.getAttribute('row-id'));
      newChildId = lastRowId + 1; 
      data = data.replace(/\[ID\]/g, newChildId);
    }
    
    body.innerHTML += data;
    /*
    if (!replaceText == "") {
      document.getElementById(newChildId + '_count').value = 0;
      document.getElementById(newChildId + '_name').value = replaceText;
    }*/
  });
}

function removeRow(rowId) {
  const row = document.querySelector('[row-id="' + rowId + '"]');
  row.remove();
}

function addRoom() {
  const wrapper = document.getElementById('roomWrapper');
  fetch('/include/roomElement.html')
  .then(response => response.text())
  .then(data => {
    if (wrapper.childElementCount <= 0) {
      data =  data.replace(/\[ID\]/g, "1");
    } else {
      const lastId = parseInt(wrapper.lastElementChild.getAttribute('roomId'));
      data = data.replace(/\[ID\]/g, lastId + 1);
    }
    
    wrapper.innerHTML += data;
  });
}

function submit2(event) {
  event.preventDefault();

  const form =  document.getElementById('form');
  const body = document.querySelector('[body-id="1"]');
  const children = body.children;
  var dataArray = [];

  for (let i = 0; i < children.length; i++) {
    const child = children[i];
    const rowId =  child.getAttribute('row-id')
    const objectcount = child.querySelector('[id="' + rowId + '_count"]').value
    if(objectcount > 0) {
      dataArray.push({
        anzahl: objectcount,
        objekt: child.querySelector('[id="' + rowId + '_name"]').value
      });
    }
  }

  document.getElementById('jsonArray').value = JSON.stringify(dataArray);
  document.getElementById('form').submit();
}

function test() {
  const text = document.getElementById("69");
  text.setAttribute('value', text.value);
  console.log(text.value)

}