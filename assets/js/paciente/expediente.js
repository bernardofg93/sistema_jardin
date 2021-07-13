const expedienteAction = document.querySelector('#expedienteId'),
      test = document.querySelector('#test'),
      idP = document.querySelector('#idP').value;

eventListener()

function eventListener() {
    expedienteAction.addEventListener('change', expediente);
}

function expediente(e) {
    let idExp = e.target.value;
    test.href = `http://localhost/soft_jrd/paciente/registro&idExp=${idExp}&idPac=${idP}`;
}
