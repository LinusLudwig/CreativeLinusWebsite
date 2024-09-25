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