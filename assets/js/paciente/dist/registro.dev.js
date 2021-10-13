"use strict";

var registroPaciente = document.querySelector('#registroPaciente'),
    action = document.querySelector('#data-radios form'),
    windowScreen = document.querySelector('.container-fluid  #container-buttons'),
    fecha = document.querySelector('#fecha_nac'),
    inputActions = document.querySelector('.card #groupRadios'),
    inputOtroAcudio = document.querySelector('#inputOtroAcudio');
eventListener();

function eventListener() {
  if (registroPaciente) {
    registroPaciente.addEventListener('submit', readForm);
  }

  if (windowScreen) {
    windowScreen.addEventListener('click', windowsScreen);
  }

  if (fecha) {
    fecha.addEventListener('change', getFecha);
  }

  if (inputActions) {
    inputActions.addEventListener('click', actionRadAcudio);
  }
} // Calcular fecha con input type date


function getFecha(e) {
  var myDate = e.target.value;
  var fechanac = new Date(myDate);
  var ahora = new Date();
  var agnios = ahora.getFullYear() - fechanac.getFullYear();
  var edad = document.querySelector('#edad');
  edad.value = agnios;
} //radio acudio


function actionRadAcudio(e) {
  if (e.target.classList.contains('radioAcudio')) {
    inputOtroAcudio.disabled = false;
  } else {
    inputOtroAcudio.disabled = true;
    inputOtroAcudio.value = "";
  }
} //radios buttons actions


function readForm(e) {
  e.preventDefault(); //se obtiene el valor de el radio seleccionado

  var rbs = document.querySelectorAll('input[name="radAcudio"]');
  var selectRadio;
  var _iteratorNormalCompletion = true;
  var _didIteratorError = false;
  var _iteratorError = undefined;

  try {
    for (var _iterator = rbs[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
      var rb = _step.value;

      if (rb.checked) {
        if (rb.value === 'otro') {
          selectRadio = inputOtroAcudio.value;
        } else {
          selectRadio = rb.value;
        }

        break;
      }
    }
  } catch (err) {
    _didIteratorError = true;
    _iteratorError = err;
  } finally {
    try {
      if (!_iteratorNormalCompletion && _iterator["return"] != null) {
        _iterator["return"]();
      }
    } finally {
      if (_didIteratorError) {
        throw _iteratorError;
      }
    }
  }

  var nombre = document.querySelector('#nombre').value,
      apellido_paterno = document.querySelector('#apellido_paterno').value,
      apellido_materno = document.querySelector('#apellido_materno').value,
      edad = document.querySelector('#edad').value,
      sexo = document.querySelector('#sexo').value,
      escolaridad = document.querySelector('#escolaridad').value,
      fecha_nac = document.querySelector('#fecha_nac').value,
      lugar = document.querySelector('#lugar').value,
      nacionalidad = document.querySelector('#nacionalidad').value,
      lugar_recidencia = document.querySelector('#lugar_recidencia').value,
      edo_civil = document.querySelector('#edo_civil').value,
      sit_laboral = document.querySelector('#sit_laboral').value,
      religion = document.querySelector('#religion').value,
      action = document.querySelector('#action').value;
  var data = new FormData();
  data.append("nombre", nombre);
  data.append("apellido_paterno", apellido_paterno);
  data.append("apellido_materno", apellido_materno);
  data.append("edad", edad);
  data.append("sexo", sexo);
  data.append("escolaridad", escolaridad);
  data.append("fecha_nac", fecha_nac);
  data.append("lugar", lugar);
  data.append("nacionalidad", nacionalidad);
  data.append("lugar_recidencia", lugar_recidencia);
  data.append("edo_civil", edo_civil);
  data.append("sit_laboral", sit_laboral);
  data.append("religion", religion);
  data.append("selectRadio", selectRadio);
  data.append("action", action);

  if (nombre === '' || apellido_paterno === '' || apellido_materno === '') {
    SweetAlert('Se Guardo Correctamente !', 'success');
  } else {
    if (action == "create") {
      insertData(data);
    } else {
      idPaciente = document.querySelector('#id_paciente').value;
      data.append("id_paciente", idPaciente);
      editData(data);
    }
  }
}

function insertData(data) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/soft_jrd/paciente/save", true);

  xhr.onload = function () {
    if (this.status === 200) {
      var result = JSON.parse(xhr.responseText);

      if (result.result === 'true') {
        // mostrar notificación de Correcto
        sweetAlert('Se ejecuto correctamente', 'success'); //PDF
        //Generar Boton PDF

        var $button = document.createElement('a');
        $button.setAttribute('class', 'btn btn-danger btn-flat');
        $button.href = "http://localhost/soft_jrd/docs/ingreso.php?&idP=".concat(result.paciente_id);
        $button.setAttribute('target', '_blank'); //Icon Pdf

        var $icon = document.createElement('i');
        $icon.setAttribute('class', 'fas fa-file-pdf'); //Agregar icono al boton

        $button.appendChild($icon); //Agregar a su contenedor

        var containerButtons = document.querySelector('#container-buttons');
        containerButtons.appendChild($button);
        registroPaciente.reset();
      } else {
        // hubo un error
        sweetAlert('Error', 'error');
      } // Después de 3 segundos redireccionar

    }
  };

  xhr.send(data);
}

function editData(data) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/soft_jrd/paciente/save", true);

  xhr.onload = function () {
    if (this.status === 200) {
      var result = JSON.parse(xhr.responseText);

      if (result.result === 'true') {
        // mostrar notificación de Correcto
        mostrarNotificacion('Usuario Actualizado Correctamente', 'correcto');
      } else {
        // hubo un error
        mostrarNotificacion('Hubo un error...', 'error');
      } // Después de 3 segundos redireccionar

    }
  };

  xhr.send(data);
}

function windowsScreen(e) {
  var windowIngreso = document.querySelector('#w-ingreso'),
      windowSustancias = document.querySelector('#w-sustancias');

  if (e.target.classList.contains('w-size')) {
    windowSustancias.setAttribute('class', 'w-none');
    windowIngreso.setAttribute('class', 'w-show');
  }

  if (e.target.classList.contains('w-minSize')) {
    windowSustancias.classList.remove('class', 'w-none');
    windowSustancias.setAttribute('class', 'w-show');
    windowIngreso.setAttribute('class', 'w-none');
  }
}