const
    sendSustanciasForm = document.querySelector('#sendSustancias');
eventListener();

function eventListener() {
    if (sendSustanciasForm) {
        sendSustanciasForm.addEventListener('submit', readDadaSendDb);
    }
}

function readDadaSendDb(e) {
    e.preventDefault();

    const radioCert = document.querySelectorAll('input[name="rad-cert"]');
    let radCert;

    for (const rad of radioCert) {
        if (rad.checked) {
            radCert = rad.value;
            break;
        }
    }
    const radioEnf = document.querySelectorAll('input[name="enfRad"]');
    let enfRad = "";

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
    let radLes = "";

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
    let radOtra = "";
    for (const rad of radioOtra) {
        if (rad.checked) {
            if (rad.value === 'si') {
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

    if (action === 'create') {
        sendDb(data);
    } else {
        const pregId = document.querySelector('#pregId').value;
        data.append('pregId', pregId);
        sendDb(data);
    }
}

function sendDb(data) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost/soft_jrd/consumo/savePreguntas", true);

    xhr.onload = function () {
        if (this.status === 200) {
            const res = JSON.parse(xhr.responseText);
            if (res.result === 'true') {
                sweetAlert('Generado correctamente...', 'success');
            } else {
                sweetAlert('Hubo un error...', 'error');
            }
        }
    }
    xhr.send(data)
}

