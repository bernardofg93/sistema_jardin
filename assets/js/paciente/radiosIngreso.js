const radiosEnfermedad = document.querySelector('.rad-enf #rad-enf'),
    radiosLesion = document.querySelector('.rad-lesion #rad-lesion'),
    radiosOtras = document.querySelector('.rad-otra #rad-otra'),
    pregConsumo = document.querySelector('#pregConsumo');

eventListener();

function actionRadiosEnfermedad(e) {
    let $inputEnf = document.querySelector('#inputEnf');
    if (e.target.classList.contains('enf-si')) {
        $inputEnf.disabled = false;
    } else if (e.target.classList.contains('enf-no')) {
        $inputEnf.disabled = true;
    }
}

function actionRadiosLesion(e) {
    let $inputLes = document.querySelector('#inputLes');
    if (e.target.classList.contains('les-si')) {
        $inputLes.disabled = false;
    } else if (e.target.classList.contains('les-no')) {
        $inputLes.disabled = true;
    }
}

function actionRadiosOtras(e) {
    let $inputOtra = document.querySelector('#inputOtras');
    if (e.target.classList.contains('otra-si')) {
        $inputOtra.disabled = false;
    } else if (e.target.classList.contains('otra-no')) {
        $inputOtra.disabled = true;
    }
}

function pregForm(e) {
    e.preventDefault();

    const radCert1 = document.querySelectorAll('input[name="rad-cert"]');
    let radCert;
    for (const rad of radCert1) {
        if (rad.checked) {
            radCert = rad.value;
            break;
        }
    }

    const enfRad1 = document.querySelectorAll('input[name="enfRad"]');
    let radEnf;
    for (const rad of enfRad1) {
        if (rad.checked) {
            if (rad.value === 'si') {
                radEnf = document.querySelector('#inputEnf').value;
            } else {
                radEnf = rad.value;
            }
            break;
        }
    }

    const radLes1 = document.querySelectorAll('input[name="radLes"]');
    let radLes;
    for (const rad of radLes1) {
        if (rad.checked) {
            if (rad.value === 'si') {
                radLes = document.querySelector('#inputLes').value;
            } else {
                radLes = rad.value;
            }
            break;
        }
    }

    const radIntra1 = document.querySelectorAll('input[name="rad-intra"]');
    let radIntra;
    for (const rad of radIntra1) {
        if (rad.checked) {
            radIntra = rad.value;
            break;
        }
    }

    const radvih1 = document.querySelectorAll('input[name="radvih"]');
    let radVih;
    for (const rad of radvih1) {
        if (rad.checked) {
            radVih = rad.value;
            break;
        }
    }

    const radSida1 = document.querySelectorAll('input[name="radsida"]');
    let radSida;
    for (const rad of radSida1) {
        if (rad.checked) {
            radSida = rad.value;
            break;
        }
    }

    const radtub1 = document.querySelectorAll('input[name="radtub"]');
    let radTub;
    for (const rad of radtub1) {
        if (rad.checked) {
            radTub = rad.value;
            break;
        }
    }

    const radOtra1 = document.querySelectorAll('input[name="rad-otra"]');
    let radOtra;
    for (const rad of radOtra1) {
        if (rad.checked) {
            if (rad.value === 'si') {
                radOtra = document.querySelector('#inputOtras').value;
            } else {
                radOtra = rad.value;
            }
            break;
        }
    }

    const estadoIngreso = document.querySelector('#estadoIngreso').value,
        numTratamientos = document.querySelector('#numTratamientos').value;

    const data = new FormData();
    data.append('radCert', radCert);
    data.append('radEnf', radEnf);
    data.append('radLes', radLes);
    data.append('radIntra', radIntra);
    data.append('radVih', radVih);
    data.append('radSida', radSida);
    data.append('radTub', radTub);
    data.append('radOtra', radOtra);
    data.append('estadoIngreso', estadoIngreso);
    data.append('numTratamientos', numTratamientos);

    //console.log(...data);

}

function eventListener() {
    if (radiosEnfermedad) {
        radiosEnfermedad.addEventListener('click', actionRadiosEnfermedad);
    }
    if (radiosLesion) {
        radiosLesion.addEventListener('click', actionRadiosLesion);
    }
    if (radiosOtras) {
        radiosOtras.addEventListener('click', actionRadiosOtras);
    }
    if (pregConsumo) {
        pregConsumo.addEventListener('submit', pregForm);
    }
}




