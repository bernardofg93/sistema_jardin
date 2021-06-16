const action = document.querySelector('#data-action .click')
      //buscar = document.querySelector('#buscar');

action.addEventListener('click', manage);

function manage(e) {
    //console.log(e.target.classList.contains('btn-block'));
    if (e.target.classList.contains('btn-danger')) {
        const id = e.target.getAttribute('data-id');        
        const result = confirm('¿Estás Seguro (a), que deseas deshabilitar al usuario ?');
        if(result) {
            const xhr = new XMLHttpRequest();
        
            xhr.open('GET', `http://localhost/soft_jrd/usuario/disable&id=${id}`, true);

            xhr.onload = function() {
                if(this.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const data = e.target.parentElement.parentElement.childNodes[11];
                    //console.log(data[5]);
                  data.innerHTML = `<td>
                        ${response.status}
                    </td>`;
                }
            }
            xhr.send();
        }
    }else if (e.target.classList.contains('btn-secondary')) {
        const id = e.target.getAttribute('data-id');        
        const result = confirm('¿Estás Seguro (a), que deseas habilitar al usuario ?');
        if(result) {
            const xhr = new XMLHttpRequest();
        
            xhr.open('GET', `http://localhost/soft_jrd/usuario/enable&id=${id}`, true);

            xhr.onload = function() {
                if(this.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const data = e.target.parentElement.parentElement.childNodes[11];
                    //console.log(data[5]);
                 const p   = data.innerHTML = `<td>
                        ${response.status}
                    </td>`;
                }
            }
            xhr.send();
        }
    }
}
