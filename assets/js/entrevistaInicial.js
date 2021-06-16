const entrevistaInicial = document.querySelector('#entrevistaInicial');

eventListener();

function eventListener() {
    entrevistaInicial.addEventListener('submit', readForm);
}

function readForm(e) {
    e.preventDefault();
    const como_llegaste = document.querySelector('#como_llegaste').value,
        consumo_sustancia = document.querySelector('#consumo_sustancia').value,
        consumo_frecuencia = document.querySelector('#consumo_frecuencia').value,
        inicio_consumo = document.querySelector('#inicio_consumo').value,
        porque_consumo = document.querySelector('#porque_consumo').value,
        fam_ciudad = document.querySelector('#fam_ciudad').value,
        fam_relacion = document.querySelector('#fam_relacion').value,
        consideracion = document.querySelector('#consideracion').value,
        porque_consid = document.querySelector('#porque_consid').value,
        primera_vez = document.querySelector('#primera_vez').value,
        veces_programa = document.querySelector('#veces_programa').value,
        juntas = document.querySelector('#juntas').value,
        recibo_informacion = document.querySelector('#recibo_informacion').value,
        constancia_reunion = document.querySelector('#constancia_reunion').value,
        action = document.querySelector('#action').value;
    paciente_id = document.querySelector('#paciente_id').value;

    const data = new FormData();
    data.append("como_llegaste", como_llegaste);
    data.append("consumo_sustancia", consumo_sustancia);
    data.append("consumo_frecuencia", consumo_frecuencia);
    data.append("inicio_consumo", inicio_consumo);
    data.append("porque_consumo", porque_consumo);
    data.append("fam_ciudad", fam_ciudad);
    data.append("fam_relacion", fam_relacion);
    data.append("consideracion", consideracion);
    data.append("porque_consid", porque_consid);
    data.append("primera_vez", primera_vez);
    data.append("veces_programa", veces_programa);
    data.append("juntas", juntas);
    data.append("recibo_informacion", recibo_informacion);
    data.append("constancia_reunion", constancia_reunion);
    data.append("action", action);
    data.append("paciente_id", paciente_id);

    console.log(...data);

    if (action == "create") {
        insertData(data);
    } else {
        editData(data);
    }
}

function insertData(data) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost/soft_jrd/entrevista/save", true);

    xhr.onload = function () {
        if (this.status === 200) {
            const result = JSON.parse(xhr.responseText);

            if (result.result === 'true') {
                // mostrar notificación de Correcto
                sweetAlert('Generado Correctamente!', 'success');
                entrevistaInicial.reset();
            } else {
                // hubo un error
                sweetAlert('Hubo un error...', 'error');
            }
            // Después de 3 segundos redireccionar
        }
    }
    xhr.send(data);
}

function editData(data) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost/soft_jrd/entrevista/save", true);

    xhr.onload = function () {
        if (this.status === 200) {
            const result = JSON.parse(xhr.responseText);

            if (result.result === 'true') {
                // mostrar notificación de Correcto
                sweetAlert('Generado Correctamente!', 'success');
            } else {
                // hubo un error
                sweetAlert('Hubo un error...', 'error');
            }
            // Después de 3 segundos redireccionar
        }
    }
    xhr.send(data);
}





