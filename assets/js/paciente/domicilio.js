const formDomicilio = document.querySelector('#formDomicilio');

eventListener();

function eventListener() {
  formDomicilio.addEventListener('submit', readForm);
}

function readForm(e) {
  e.preventDefault();
  const calle = document.querySelector('#calle').value,
    numero = document.querySelector('#numero').value,
    colonia = document.querySelector('#colonia').value,
    municipio = document.querySelector('#municipio').value,
    telefono = document.querySelector('#telefono').value,
    nombre_familiar = document.querySelector('#nombre_familiar').value,
    telefono_fam = document.querySelector('#telefono_fam').value,
    tipo_parentes = document.querySelector('#tipo_parentes').value,
    domicilio_fam = document.querySelector('#domicilio_fam').value,
    action = document.querySelector('#action').value,
    paciente_id = document.querySelector('#paciente_id').value;

  const data = new FormData();
  data.append("calle", calle);
  data.append("numero", numero);
  data.append("colonia", colonia);
  data.append("municipio", municipio);
  data.append("telefono", telefono);
  data.append("nombre_familiar", nombre_familiar);
  data.append("telefono_fam", telefono_fam);
  data.append("tipo_parentes", tipo_parentes);
  data.append("domicilio_fam", domicilio_fam);
  data.append("action", action);
  data.append("paciente_id", paciente_id);

  if (action == "create") {
    insertData(data);
  } else {
    editData(data);
  }
}

function insertData(data) {
  const xhr = new XMLHttpRequest();

  xhr.open("POST", "http://localhost/soft_jrd/domicilio/save", true);

  xhr.onload = function () {
    if (this.status === 200) {
      const result = JSON.parse(xhr.responseText);

      if (result.result === 'true') {
        // mostrar notificación de Correcto
        mostrarNotificacion('Usuario Creado Correctamente', 'correcto');
        formDomicilio.reset();
      } else {
        // hubo un error
        mostrarNotificacion('Hubo un error...', 'error');
      }
      // Después de 3 segundos redireccionar
    }
  }
  xhr.send(data);
}

function editData(data) {
  const xhr = new XMLHttpRequest();

  xhr.open("POST", "http://localhost/soft_jrd/domicilio/save", true);

  xhr.onload = function () {
    if (this.status === 200) {
      const result = JSON.parse(xhr.responseText);

      if (result.result === 'true') {
        // mostrar notificación de Correcto
        mostrarNotificacion('Usuario Actualizado Correctamente', 'correcto');
      } else {
        // hubo un error
        mostrarNotificacion('Hubo un error...', 'error');
      }
      // Después de 3 segundos redireccionar
    }
  }
  xhr.send(data);
}

// Notifación en pantalla
function mostrarNotificacion(mensaje, clase) {
  const notificacion = document.createElement('div');
  notificacion.classList.add(clase, 'notificacion', 'sombra');
  notificacion.textContent = mensaje;

  // formulario
  formDomicilio.insertBefore(notificacion, document.querySelector('form legend'));

  // Ocultar y Mostrar la notificacion
  setTimeout(() => {
    notificacion.classList.add('visible');
    setTimeout(() => {
      notificacion.classList.remove('visible');
      setTimeout(() => {
        notificacion.remove();
      }, 500)
    }, 3000);
  }, 100);

}




