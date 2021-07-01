const csForm = document.querySelector('#csForm'),
    sendSustanciasForm = document.querySelector('#sendSustancias'),
    sustanciasFormEdit = document.querySelector('#sustEdit'),
    listSustancias = document.querySelector('#listaSuatancias, tbody');

listData();
eventListener();

function eventListener() {
    if (listSustancias) {
        listSustancias.addEventListener('click', readList);
    }
    if (csForm) {
        csForm.addEventListener('submit', readForm);
    }
    if (sustanciasFormEdit) {
        sustanciasFormEdit.addEventListener('click', edit);
    }
    if (sendSustanciasForm) {
        sendSustanciasForm.addEventListener('submit', readDadaSendDb);
    }
}

function readDadaSendDb(e) {
    e.preventDefault();

    let dataSustancias = [];

    document.querySelectorAll('.table-bordered tbody tr').forEach(function (e) {
        let dataTable = {
            sustancia: e.querySelector('.sustancia').innerText,
            frecuencia: e.querySelector('.frecuencia').innerText,
            via: e.querySelector('.via').innerText,
            edad: e.querySelector('.edad').innerText,
            actualmente: e.querySelector('.actualmente').innerText,
            dejo_uso: e.querySelector('.dejo_uso').innerText
        };
        dataSustancias.push(dataTable);
    });

    const radioCert = document.querySelectorAll('input[name="rad-cert"]');
    let radCert;

    for (const rad of radioCert) {
        if (rad.checked) {
            radCert = rad.value;
            break;
        }
    }
    const radioEnf = document.querySelectorAll('input[name="enfRad"]');
    let enfRad;

    for (const rad of radioEnf) {
        if (rad.checked) {
            if (rad.value === 'si') {
                const $inputEnf = document.querySelector('#inputEnf');
                enfRad = $inputEnf.value;
            } else {
                enfRad = rad.value;
            }
            break;
        }
    }
    const radioLes = document.querySelectorAll('input[name="radLes"]');
    let radLes;

    for (const rad of radioLes) {
        if (rad.checked) {
            if (rad.value === 'si') {
                const $inputLes = document.querySelector('#inputLes');
                radLes = $inputLes.value;
            } else {
                radLes = rad.value;
            }
            break;
        }
    }
    const radioIntra = document.querySelectorAll('input[name="rad-intra"]');
    let radIntra;

    for (const rad of radioIntra) {
        if (rad.checked) {
            radIntra = rad.value;
            break;
        }
    }

    const radioVih = document.querySelectorAll('input[name="radvih"]');
    let radVih;
    for (const rad of radioVih) {
        if (rad.checked) {
            radVih = rad.value;
            break;
        }
    }

    const radioSida = document.querySelectorAll('input[name="radsida"]');
    let radsida;
    for (const rad of radioSida) {
        if (rad.checked) {
            radsida = rad.value;
            break;
        }
    }

    const radioTub = document.querySelectorAll('input[name="radtub"]');
    let radTub;
    for (const rad of radioTub) {
        if (rad.checked) {
            radTub = rad.value;
            break;
        }
    }

    const radioHep = document.querySelectorAll('input[name="rad-hep"]');
    let radHep;
    for (const rad of radioHep) {
        if (rad.checked) {
            radHep = rad.value;
            break;
        }
    }

    const radioOtra = document.querySelectorAll('input[name="rad-otra"]');
    let radOtra;
    for (const rad of radioOtra) {
        if (rad.checked) {
            if (rad.checked === 'si') {
                const $inputOtras = document.querySelector('#inputOtras');
                radOtra = $inputOtras.value;
            } else {
                radOtra = rad.value;
            }
            break;
        }
    }

    const estadoIngreso = document.querySelector('#estadoIngreso').value,
        tratamientos = document.querySelector('#numTratamientos').value,
        pacienteId = document.querySelector('#pacienteId').value,
        action = document.querySelector('#action').value;

    const data = new FormData();
    data.append('radCert', radCert);
    data.append('enfRad', enfRad);
    data.append('radLes', radLes);
    data.append('radIntra', radIntra);
    data.append('radVih', radVih);
    data.append('radsida', radsida);
    data.append('radTub', radTub);
    data.append('radHep', radHep);
    data.append('radOtra', radOtra);
    data.append('estadoIngreso', estadoIngreso);
    data.append('tratamientos', tratamientos);
    data.append('pacienteId', pacienteId);
    data.append('action', action);

    //Se conprueba si el array de la tabla sustancias viene vacio
    if (dataSustancias.length != 0) {
        let arrData = JSON.stringify(dataSustancias);
        data.append("arrData", arrData);
    }

    if (action === 'create') {
        sendDb(data);
    } else {

    }
    //console.log(...data);
}

function sendDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost/soft_jrd/consumo/save", true);

    xhr.onload = function () {
        if (this.status === 200) {
            const res = JSON.parse(xhr.responseText);

            res.forEach(function (obj, index) {
                if (obj.result) {
                    sweetAlert('Generado correctamenta', 'success');
                    sendSustanciasForm.reset();
                    localStorage.clear();
                    listData();
                }
            })
        }
    }
    xhr.send(data)
}

function readForm(e) {
    e.preventDefault();

    const sustancia = document.querySelector('#sustancia').value,
        frecuencia = document.querySelector('#frecuencia').value,
        via = document.querySelector('#via').value,
        edad = document.querySelector('#edad_uso').value,
        actualmente = document.querySelector('#actualmente').value,
        dejo_uso = document.querySelector('#dejo_uso').value;

    let sustancias = {
        sustancia,
        frecuencia,
        via,
        edad,
        actualmente,
        dejo_uso
    };

    if (localStorage.getItem("db") === null) {
        let data = [];
        data.push(sustancias);
        localStorage.setItem("db", JSON.stringify(data));
    } else {
        let data = JSON.parse(localStorage.getItem("db"));
        data.push(sustancias);
        localStorage.setItem("db", JSON.stringify(data));
    }
    listData();
    csForm.reset();
}

function listData() {
    let data = JSON.parse(localStorage.getItem('db'));
    document.querySelector('#sustanciasPaciente').innerHTML = "";
    if (data) {
        for (let i = 0; i < data.length; i++) {
            let sustancia = data[i].sustancia;
            let frecuencia = data[i].frecuencia;
            let via = data[i].via;
            let edad = data[i].edad;
            let actualmente = data[i].actualmente;
            let dejo_uso = data[i].dejo_uso;

            const $tbody = document.querySelector('#sustanciasPaciente');
            const $tr = document.createElement('tr');

            const $tdSustancia = document.createElement('td');
            $tdSustancia.setAttribute('class', 'sustancia');
            $tdSustancia.innerText = sustancia;
            $tr.appendChild($tdSustancia);

            const $tdFrecuencia = document.createElement('td');
            $tdFrecuencia.setAttribute('class', 'frecuencia');
            $tdFrecuencia.innerText = frecuencia;
            $tr.appendChild($tdFrecuencia);

            const $tdVia = document.createElement('td');
            $tdVia.setAttribute('class', 'via');
            $tdVia.innerText = via;
            $tr.appendChild($tdVia);

            const $tdEdad = document.createElement('td');
            $tdEdad.setAttribute('class', 'edad');
            $tdEdad.innerText = edad;
            $tr.appendChild($tdEdad);

            const $tdActualmente = document.createElement('td');
            $tdActualmente.setAttribute('class', 'actualmente');
            $tdActualmente.innerText = actualmente;
            $tr.appendChild($tdActualmente);

            const $tduso = document.createElement('td');
            $tduso.setAttribute('class', 'dejo_uso');
            $tduso.innerText = dejo_uso;
            $tr.appendChild($tduso);

            //boton editar
            const $tdButtonEdit = document.createElement('td');
            const $buttonEdit = document.createElement('a');
            $buttonEdit.setAttribute('type', 'button');
            $buttonEdit.setAttribute('class', 'btn btn-primary btn-sm btn-flat b-edit');
            $buttonEdit.setAttribute('data-id', `${i}`);
            $buttonEdit.setAttribute('data-toggle', 'modal');
            $buttonEdit.setAttribute('data-target', '#modalEdit');

            const $iconEdit = document.createElement('i');
            $iconEdit.setAttribute('class', 'fas fa-user-edit b-edit');
            $iconEdit.setAttribute('data-id', `${i}`);
            $buttonEdit.appendChild($iconEdit);
            $tdButtonEdit.appendChild($buttonEdit);
            $tr.appendChild($tdButtonEdit);

            const $tdButtonDelete = document.createElement('td');
            const $ButtonDelete = document.createElement('a');
            $ButtonDelete.setAttribute('type', 'button');
            $ButtonDelete.setAttribute('data-id', `${i}`);
            $ButtonDelete.setAttribute('class', 'btn btn-danger btn-sm btn-flat b-delete');

            const $iconDelete = document.createElement('i');
            $iconDelete.setAttribute('class', 'far fa-trash-alt b-delete');
            $iconDelete.setAttribute('data-id', `${i}`);
            $ButtonDelete.appendChild($iconDelete);
            $tdButtonDelete.appendChild($ButtonDelete);
            $tr.appendChild($tdButtonDelete);

            $tbody.appendChild($tr);
        }
    }
}

function readList(e) {
    if (e.target.classList.contains('b-edit')) {
        const sustanciaId = document.querySelector('#sustanciaId');
        let id = e.target.getAttribute('data-id');

        const sustancia = document.querySelector('#sustanciaEd'),
            frecuencia = document.querySelector('#frecuenciaEd'),
            via = document.querySelector('#viaEd'),
            edad = document.querySelector('#edad_usoEd'),
            actualmente = document.querySelector('#actualmenteEd'),
            dejo_uso = document.querySelector('#dejo_usoEd');

        let data = JSON.parse(localStorage.getItem("db"));
        sustanciaId.value = `${id}`;
        sustancia.value = `${data[id].sustancia}`;
        frecuencia.value = `${data[id].frecuencia}`;
        via.value = `${data[id].via}`;
        edad.value = `${data[id].edad}`;
        actualmente.value = `${data[id].actualmente}`;
        dejo_uso.value = `${data[id].dejo_uso}`;
    }

    if (e.target.classList.contains('b-delete')) {
        let id = e.target.getAttribute('data-id');
        let data = JSON.parse(localStorage.getItem("db"));
        data.splice(id, 1);
        localStorage.setItem("db", JSON.stringify(data));
        listData();
    }
}

function edit(e) {
    e.preventDefault();
    const id = document.querySelector('#sustanciaId').value;
    let data = JSON.parse(localStorage.getItem("db"));

    if (e.target.classList.contains('btnAction')) {
        data[id].sustancia = document.querySelector('#sustanciaEd').value,
            data[id].frecuencia = document.querySelector('#frecuenciaEd').value,
            data[id].via = document.querySelector('#viaEd').value,
            data[id].edad = document.querySelector('#edad_usoEd').value,
            data[id].actualmente = document.querySelector('#actualmenteEd').value,
            data[id].dejo_uso = document.querySelector('#dejo_usoEd').value;
        localStorage.setItem("db", JSON.stringify(data));
        sweetAlert('Actualizado correctamente !', 'success');
    }
    listData();
}


