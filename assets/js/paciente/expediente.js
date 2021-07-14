const expedienteAction = document.querySelector('#expedienteId'),
      test = document.querySelector('#test'),
      idP = document.querySelector('#idP').value;

eventListener();

function eventListener() {
    expedienteAction.addEventListener('change', expediente);
}

function expediente(e) {
    let idExp = e.target.value;
    test.href = `http://localhost/soft_jrd/paciente/registro&idExp=${idExp}&idPac=${idP}`;

    const data = new FormData();

    data.append('idExp', idExp);
    data.append('idP', idP);

    const xhr = new XMLHttpRequest();
    xhr.open("GET", `http://localhost/soft_jrd/paciente/dataExpediente&idExp=${idExp}&idPac=${idP}`, true);

    xhr.onload = function (){
        if(xhr.status === 200){
            const res = JSON.parse(xhr.responseText);
            console.log(res);
        }
    }
    xhr.send(data);
}


