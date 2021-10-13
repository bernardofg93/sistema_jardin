let checkPaciente = document.querySelector('#checkEstado');

eventListener();

function estadoPaciente(e) {
    if(e.target.classList.contains('statePac')){
        let action = e.target;
        if(action.checked){
            //alert('listo');
           let $tdParent =  e.target.parentElement.parentElement.parentElement;
           $tdParent.innerText = 'locote';
        }else {
            alert('no checked');
        }
    }
}

function eventListener() {
    checkPaciente,addEventListener('click', estadoPaciente);
}