const registroPaciente = document.querySelector('#registroPaciente'),
    action = document.querySelector('#data-radios form'),
    windowScreen = document.querySelector('.container-fluid  #container-buttons'),
    fecha = document.querySelector('#fecha_nac');

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
}

// Calcular fecha con input type date
function getFecha(e) {
    let myDate = e.target.value;
    let fechanac = new Date(myDate);
    let ahora = new Date();
    let agnios = ahora.getFullYear() - fechanac.getFullYear();
    let edad = document.querySelector('#edad');
    edad.value = agnios;
}

//radios buttons actions
const inputOtro = document.querySelector('#otro_acudio');

document.querySelector('#customRadio5').addEventListener('click', function (e) {
    inputOtro.disabled = false;
    const rbs = document.querySelectorAll('input[name="customRadio"]');
    let selectRadio;
    for (const rb of rbs) {
        if (rb.checked) {
            selectRadio = rb;
            break;
        }
    }
    selectRadio.checked = false;
});

document.querySelector('#customRadio1').addEventListener('click', function (e) {
    inputOtro.disabled = true;
    document.querySelector('#customRadio5').checked = false;
});

document.querySelector('#customRadio2').addEventListener('click', function (e) {
    inputOtro.disabled = true;
    document.querySelector('#customRadio5').checked = false;
});

document.querySelector('#customRadio3').addEventListener('click', function (e) {
    inputOtro.disabled = true;
    document.querySelector('#customRadio5').checked = false;
});

document.querySelector('#customRadio4').addEventListener('click', function (e) {
    inputOtro.disabled = true;
    document.querySelector('#customRadio5').checked = false;
});

function readForm(e) {
    e.preventDefault();

    //se obtiene el valor de el radio seleccionado
    const rbs = document.querySelectorAll('input[name="customRadio"]');
    let selectRadio;
    for (const rb of rbs) {
        if (rb.checked) {
            selectRadio = rb.value;
            break;
        }
    }
    if (document.querySelector('#customRadio5').checked) {
        selectRadio = document.querySelector('#otro_acudio').value;
    }

    const nombre = document.querySelector('#nombre').value,
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

    const data = new FormData();
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
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost/soft_jrd/paciente/save", true);

    xhr.onload = function () {
        if (this.status === 200) {
            const result = JSON.parse(xhr.responseText);

            if (result.result === 'true') {
                // mostrar notificación de Correcto
                sweetAlert('Se ejecuto correctamente', 'success');
                registroPaciente.reset();
            } else {
                // hubo un error
                sweetAlert('Error', 'error');
            }
            // Después de 3 segundos redireccionar
        }
    }
    xhr.send(data);
}

function editData(data) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost/soft_jrd/paciente/save", true);

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

function windowsScreen(e) {
    const windowIngreso = document.querySelector('#w-ingreso'),
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
