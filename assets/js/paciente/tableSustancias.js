const consumoForm = document.querySelector('#csForm'),
    listConsumo = document.querySelector('#listaSuatancias, tbody'),
    formSustancia = document.querySelector('#formSustancia'),
    openModal = document.querySelector('#btnCreate');

//const detectTable = document.querySelector('#data-action tbody');
eventListener();

function eventListener() {
    if (consumoForm) {
        consumoForm.addEventListener('submit', readForm);
    }

    if (listConsumo) {
        listConsumo.addEventListener('click', readModal);
    }

    if (formSustancia) {
        formSustancia.addEventListener('submit', readModalSustancia);
    }
    if (openModal) {
        openModal.addEventListener('click', showModalConsumo);
    }
}

//Verifica si se clickea en el boton editar o eliminar
function readModal(e) {

    if (e.target.classList.contains('b-edit')) {

        //tomar el id
        const id = e.target.getAttribute('data-id');

        const data = new FormData();
        data.append('id', id);

        const xhr = new XMLHttpRequest();

        xhr.open('POST', `http://localhost/soft_jrd/consumo/data&id=${id}`, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                const result = JSON.parse(xhr.responseText);
                $('#openModal').modal('show');
                const $sustancia = document.querySelector('#sustanciaEd'),
                    $frecuencia_uso = document.querySelector('#frecuenciaEd'),
                    $via_admin = document.querySelector('#viaEd'),
                    $edad_uso = document.querySelector('#edad_usoEd'),
                    $actualmente = document.querySelector('#actualmenteEd'),
                    $edad_sin_uso = document.querySelector('#dejo_usoEd'),
                    $idHidden = document.querySelector('#consumoId');

                $sustancia.value = result.sustancia;
                $frecuencia_uso.value = result.frecuencia;
                $via_admin.value = result.via;
                $edad_uso.value = result.edadUso;
                $actualmente.value = result.actualmente;
                $edad_sin_uso.value = result.edadSin;
                $idHidden.value = result.idConsumo;

            }
        }
        xhr.send(data)
    }
    if (e.target.classList.contains('b-delete')) {
        const id = e.target.getAttribute('data-id');

        const xhr = new XMLHttpRequest();

        xhr.open('GET', `http://localhost/soft_jrd/consumo/delete&id=${id}`, true)


        xhr.onload = function () {
            if (xhr.status === 200) {
                const result = JSON.parse(xhr.responseText);

                if (result.res === 'true') {
                    e.target.parentElement.parentElement.parentElement.remove();
                }
            }
        }
        xhr.send()

    }
}

// funcion que lee la data del modal
// y verifica si se va a editar algun registro de la bd o crear uno nuevo
function readModalSustancia(e) {
    e.preventDefault();

    const $inputEdadUso = document.querySelector('#edad_usoEd'),
        $inputDejoUso = document.querySelector('#dejo_usoEd'),
        sustancia = document.querySelector('#sustanciaEd').value,
        frecuencia = document.querySelector('#frecuenciaEd').value,
        via = document.querySelector('#viaEd').value,
        edad_uso = document.querySelector('#edad_usoEd').value,
        actualmente = document.querySelector('#actualmenteEd').value,
        dejo_uso = document.querySelector('#dejo_usoEd').value,
        consumoId = document.querySelector('#consumoId').value;

    //Se comprueba si existe id de registro, si existe se manda
    //la accion de editar de lo contrario se manda lalccion de crear
    let action;
    consumoId === '' ? action = 'create' : action = 'edit';

    const data = new FormData();
    data.append("sustancia", sustancia);
    data.append("frecuencia", frecuencia);
    data.append("via", via);
    data.append("edad_uso", edad_uso);
    data.append("actualmente", actualmente);
    data.append("dejo_uso", dejo_uso);
    data.append("consumoId", consumoId);
    data.append("action", action);

    if (action === 'create') {
        const pacienteId = document.querySelector('#pacienteId').value;
        data.append("pacienteId", pacienteId);
    }

    !parseInt(edad_uso) && edad_uso != "" ? $inputEdadUso.classList.add('testNumber') : $inputEdadUso.classList.remove('testNumber');
    !parseInt(dejo_uso) && dejo_uso != "" ? $inputDejoUso.classList.add('testNumber') : $inputDejoUso.classList.remove('testNumber');

    if (dejo_uso === "" && edad_uso === "" || dejo_uso === "" && edad_uso != "" && parseInt(edad_uso)
        || edad_uso === "" && dejo_uso != "" && parseInt(dejo_uso) || parseInt(edad_uso) && parseInt(dejo_uso)) {
        const xhr = new XMLHttpRequest();

        xhr.open('POST', "http://localhost/soft_jrd/consumo/save", true);

        xhr.onload = function () {
            if (this.status === 200) {
                const result = JSON.parse(xhr.responseText);
                if (result.result === 'true') {
                    sweetAlert('Creado correctamente...', 'success');
                    location.reload();
                }
            }
        }
        xhr.send(data);
    }


}


//function para crear un nuevo registro
function sendData(data) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost/soft_jrd/consumo/save", true);

    xhr.onload = function () {
        if (this.status === 200) {
            const res = JSON.parse(xhr.responseText);

            if (res.result === 'true') {
                const $tbody = document.querySelector('#sustanciasPaciente');
                const $tr = document.createElement('tr');

                const $tdSustancia = document.createElement('td');
                $tdSustancia.setAttribute('class', 'sustancia');
                $tdSustancia.innerText = res.sustancia;
                $tr.appendChild($tdSustancia);

                const $tdFrecuencia = document.createElement('td');
                $tdFrecuencia.setAttribute('class', 'frecuencia');
                $tdFrecuencia.innerText = res.frecencia;
                $tr.appendChild($tdFrecuencia);

                const $tdVia = document.createElement('td');
                $tdVia.setAttribute('class', 'via');
                $tdVia.innerText = res.via;
                $tr.appendChild($tdVia);

                const $tdEdad = document.createElement('td');
                $tdEdad.setAttribute('class', 'edad');
                $tdEdad.innerText = res.edadUso;
                $tr.appendChild($tdEdad);

                const $tdActualmente = document.createElement('td');
                $tdActualmente.setAttribute('class', 'actualmente');
                $tdActualmente.innerText = res.actual;
                $tr.appendChild($tdActualmente);

                const $tduso = document.createElement('td');
                $tduso.setAttribute('class', 'dejo_uso');
                $tduso.innerText = res.edadSin;
                $tr.appendChild($tduso);

                //boton editar
                const $tdButtonEdit = document.createElement('td');
                const $buttonEdit = document.createElement('a');
                $buttonEdit.setAttribute('type', 'button');
                $buttonEdit.setAttribute('class', 'btn btn-primary btn-sm btn-flat b-edit');
                $buttonEdit.setAttribute('data-id', `${res.consumo_id}`);
                $buttonEdit.setAttribute('data-toggle', 'modal');
                $buttonEdit.setAttribute('data-target', '#modalEdit');

                const $iconEdit = document.createElement('i');
                $iconEdit.setAttribute('class', 'fas fa-user-edit b-edit');
                $iconEdit.setAttribute('data-id', `${res.consumo_id}`);
                $buttonEdit.appendChild($iconEdit);
                $tdButtonEdit.appendChild($buttonEdit);
                $tr.appendChild($tdButtonEdit);

                const $tdButtonDelete = document.createElement('td');
                const $ButtonDelete = document.createElement('a');
                $ButtonDelete.setAttribute('type', 'button');
                //$ButtonDelete.setAttribute('data-id', `${i}`);
                $ButtonDelete.setAttribute('class', 'btn btn-danger btn-sm btn-flat b-delete');

                const $iconDelete = document.createElement('i');
                $iconDelete.setAttribute('class', 'far fa-trash-alt b-delete');
                $iconDelete.setAttribute('data-id', `${res.consumo_id}`);
                $ButtonDelete.appendChild($iconDelete);
                $tdButtonDelete.appendChild($ButtonDelete);
                $tr.appendChild($tdButtonDelete);

                $tbody.appendChild($tr);
                consumoForm.reset();
            }
        }
    }
    xhr.send(data);

}

function showModalConsumo(e) {
    const consumoId = document.querySelector('#consumoId');
    consumoId.value = "";
    formSustancia.reset();
    $('#openModal').modal('show');
}

