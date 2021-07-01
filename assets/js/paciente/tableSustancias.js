const consumoForm = document.querySelector('#consumoForm'),
    listConsumo = document.querySelector('#listConsumo tfoot');

let conter = 0;

//const detectTable = document.querySelector('#data-action tbody');

eventListener();

function eventListener() {
    consumoForm.addEventListener('submit', readForm);

    if (listConsumo) {
        listConsumo.addEventListener('click', readModal);
    }
}

//se resetea el formulario despues de ser editado
document.querySelector('#create').addEventListener('click', function (e) {
    consumoForm.reset();
    action = document.querySelector('#action');
    action.value = 'create';
});

function readForm(e) {
    e.preventDefault();
    const sustancia = document.querySelector('#sustancia').value,
        frecuencia_uso = document.querySelector('#frecuencia_uso').value,
        via_admin = document.querySelector('#via_admin').value,
        edad_uso = document.querySelector('#edad_uso').value,
        actualmente = document.querySelector('#actualmente').value,
        edad_sin_uso = document.querySelector('#edad_sin_uso').value,
        droga_impacto = document.querySelector('#droga_impacto').value,
        action = document.querySelector('#action').value,
        paciente_id = document.querySelector('#paciente_id').value;

    const data = new FormData();
    data.append("sustancia", sustancia);
    data.append("frecuencia_uso", frecuencia_uso);
    data.append("via_admin", via_admin);
    data.append("edad_uso", edad_uso);
    data.append("actualmente", actualmente);
    data.append("edad_sin_uso", edad_sin_uso);
    data.append("droga_impacto", droga_impacto);
    data.append("paciente_id", paciente_id);
    data.append("action", action);

    if (action == "create") {
        const xhr = new XMLHttpRequest();

        xhr.open("POST", "http://localhost/soft_jrd/consumo/save", true);

        xhr.onload = function () {
            if (this.status === 200) {
                const result = JSON.parse(xhr.responseText);
                if (result.result === 'true') {
                    const newSustancy = document.createElement('tr');

                    newSustancy.innerHTML = `
              <td>${result.conter + 1}</td>
              <td>${result.sustancia}</td>
              <td>${result.frecencia}</td>
              <td>${result.via}</td>
              <td>${result.edadUso}</td>
              <td>${result.actual}</td>
              <td>${result.edadSin}</td>
              <td>${result.droga}</td>
           `;

                    //se crea el contenedor padre de los botones
                    const contBtnEdit = document.createElement('td');

                    //se crea el icono de edtiar
                    const iconEdit = document.createElement('i');
                    iconEdit.classList.add('fas', 'fa-pencil-alt', 'btn-actions');
                    iconEdit.setAttribute('data-toggle', 'modal');
                    iconEdit.setAttribute('data-target', '#modalCategory');

                    //se crea el enlace para editar
                    const btnEdit = document.createElement('a');
                    btnEdit.appendChild(iconEdit);
                    btnEdit.classList.add('btn', 'btn-primary', 'btn-sm', 'btn-edit');
                    btnEdit.setAttribute('data-id', result.consumo_id);

                    //agregarlo al padre
                    contBtnEdit.appendChild(btnEdit);

                    //crear el btn eliminar
                    const contBtnDelete = document.createElement('td');

                    const iconDelete = document.createElement('i');
                    iconDelete.classList.add('fas', 'fa-trash', 'btn-actions');

                    //crear el btn enlace eliminar
                    const btnDelete = document.createElement('a');
                    btnDelete.appendChild(iconDelete);
                    btnDelete.classList.add('btn', 'btn-danger', 'btn-sm');

                    contBtnDelete.appendChild(btnDelete);

                    //agregar los botones al tr padre
                    newSustancy.appendChild(contBtnEdit);
                    newSustancy.appendChild(contBtnDelete);

                    listConsumo.appendChild(newSustancy);

                    // mostrar notificación de Correcto
                    mostrarNotificacion('Usuario Creado Correctamente', 'correcto');
                    consumoForm.reset();
                } else {
                    // hubo un error
                    mostrarNotificacion('Hubo un error...', 'error');
                }
                // Después de 3 segundos redireccionar
            }
        }
        xhr.send(data);
    } else {
        consumo_id = document.querySelector('#consumo_id').value;
        data.append("consumo_id", consumo_id);
        editData(data);
    }
}

function editData(data) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost/soft_jrd/consumo/save", true);

    xhr.onload = function () {
        if (this.status === 200) {
            const result = JSON.parse(xhr.responseText);

            if (result.result === 'true') {
                location.reload();

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

function readModal(e) {
    if (e.target.parentElement.classList.contains('btn-edit')) {
        //tomar el id
        const id = e.target.parentElement.getAttribute('data-id');

        const data = new FormData();
        data.append('id', id);

        const xhr = new XMLHttpRequest();

        xhr.open('POST', "http://localhost/soft_jrd/consumo/data", true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                const result = JSON.parse(xhr.responseText);

                const sustancia = document.querySelector('#sustancia'),
                    frecuencia_uso = document.querySelector('#frecuencia_uso'),
                    via_admin = document.querySelector('#via_admin'),
                    edad_uso = document.querySelector('#edad_uso'),
                    actualmente = document.querySelector('#actualmente'),
                    edad_sin_uso = document.querySelector('#edad_sin_uso'),
                    droga_impacto = document.querySelector('#droga_impacto'),
                    consumo_id = document.querySelector('#consumo_id'),
                    action = document.querySelector('#action');

                sustancia.value = result.sustancia;
                frecuencia_uso.value = result.frecuencia;
                via_admin.value = result.via;
                edad_uso.value = result.edadUso;
                actualmente.value = result.actualmente;
                edad_sin_uso.value = result.edadSin;
                droga_impacto.value = result.droga;
                consumo_id.value = result.id;
                action.value = 'edit';

            }
        }
        xhr.send(data)
    }
}

$(function () {
    $('#tblConsumo').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    //Date range picker
    $('#fecha').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });

    //Hora Inicial
    $('#timepicker').datetimepicker({
        format: 'HH:mm',
        enabledHours: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
        stepping: 30
    })

    //Hora Final
    $('#timepicker2').datetimepicker({
        format: 'HH:mm',
        enabledHours: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
        stepping: 30
    })

});

