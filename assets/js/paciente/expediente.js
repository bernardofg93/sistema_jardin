const expedienteAction = document.querySelector('#expedienteId'),
    idP = document.querySelector('#idP').value;

eventListener();

function eventListener() {
    expedienteAction.addEventListener('change', expediente);
}

function expediente(e) {

    let linkDoc = document.querySelectorAll('#linkDoc');
    console.log(linkDoc);

    let idExp = e.target.value;

    const data = new FormData();

    data.append('idExp', idExp);
    data.append('idP', idP);

    const xhr = new XMLHttpRequest();
    xhr.open("GET", `http://localhost/soft_jrd/paciente/dataExpediente&idExp=${idExp}&idPac=${idP}`, true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            const res = JSON.parse(xhr.responseText);

                const test = [
                    { texto: 'Datos personales', link: `http://localhost/soft_jrd/paciente/registro&idExp=${idExp}&idPac=${idP}`},
                    { texto: 'Entrevista', link: `http://localhost/soft_jrd/entrevista/paciente&idExp=${idExp}&idPac=${idP}`},
                    { texto: 'Domicilio', link: `http://localhost/soft_jrd/domicilio/paciente&idExp=${idExp}&idPac=${idP}`},
                    { texto: 'Sustancias', link: `http://localhost/soft_jrd/consumo/registro&idExp=${idExp}&idPac=${idP}`},
                    { texto: 'Ficha clinica', link: `http://localhost/soft_jrd/paciente/registro&idExp=${idExp}&idPac=${idP}`}
                ];

                 test.forEach(function (el, index, test) {

                    const $divParentNode = document.querySelector('#containerExpediente');

                    const $divParentCart = document.createElement('div');
                    $divParentCart.setAttribute('class', 'col-lg-3 col-6');

                    const $divboxManila = document.createElement('div');
                    $divboxManila.setAttribute('class', 'small-box bg color-manila');

                    const $innerBox = document.createElement('div');
                    $innerBox.setAttribute('class', 'inner');

                    const $textTitle = document.createElement('p');
                    $textTitle.innerText = el.texto;
                    $innerBox.appendChild($textTitle);
                    $divboxManila.appendChild($innerBox);

                    const $iconBox = document.createElement('div');
                    $iconBox.setAttribute('class', 'icon');

                    const $iconFolder = document.createElement('i');
                    $iconFolder.setAttribute('class', 'fas fa-folder');
                    $iconBox.appendChild($iconFolder);
                    $divboxManila.appendChild($iconBox);

                    const $link = document.createElement('a');
                    $link.setAttribute('class', 'small-box-footer');
                    $link.href = el.link;

                    const $iconLink = document.createElement('i');
                    $iconLink.setAttribute('class', 'fas fa-arrow-circle-right');
                    $link.appendChild($iconLink);

                    $divboxManila.appendChild($link);
                    $divParentCart.appendChild($divboxManila);
                    $divParentNode.appendChild($divParentCart);
                
                 });

            }

        }
    xhr.send(data);
}

//for (let j = 0; j < test.length; j++) {}
