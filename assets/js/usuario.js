const formUsuario = document.querySelector('#formUsuario'),
    userPass = document.querySelector('#userPass'),
    stateUs = document.querySelector('#checkboxPrimary1');

eventListener();

function eventListener() {
    if (formUsuario) {
        formUsuario.addEventListener('submit', readForm);
    }
    if (userPass) {
        userPass.addEventListener('submit', readPass);
    }
    if (stateUs) {
        stateUs.addEventListener('click', stateUsers);
    }
}

function readForm(e) {
    e.preventDefault();
    const nombre = document.querySelector('#nombre').value,
        apellidos = document.querySelector('#apellidos').value,
        rol = document.querySelector('#rol').value,
        telefono = document.querySelector('#telefono').value,
        email = document.querySelector('#email').value,
        action = document.querySelector('#action').value;

    const data = new FormData();
    data.append("nombre", nombre);
    data.append("apellidos", apellidos);
    data.append("rol", rol);
    data.append("telefono", telefono);
    data.append("email", email);
    data.append("action", action);

    if (nombre === '' || apellidos === '' || rol === '' || telefono === '' || email === '') {
        sweetAlert('Error Todos los campos son obligatorios !', 'error');
    } else {
        if (action == "create") {
            password = document.querySelector('#password').value;
            data.append("password", password);
            insertData(data);
        } else {
            idUsuario = document.querySelector('#id_usuario').value;
            data.append("id_usuario", idUsuario);
            editData(data);
        }
    }
}

function insertData(data) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost/soft_jrd/usuario/save", true);

    xhr.onload = function () {
        if (this.status === 200) {
            const result = JSON.parse(xhr.responseText);

            if (result.result === 'true') {
                // mostrar notificación de Correcto
                sweetAlert('Se creo correctamente !', 'success');
                formUsuario.reset();
            } else {
                // hubo un error
                sweetAlert('Error !', 'false');
            }
            // Después de 3 segundos redireccionar
        }
    }
    xhr.send(data);
}

function editData(data) {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "http://localhost/soft_jrd/usuario/save", true);

    xhr.onload = function () {
        if (this.status === 200) {
            const result = JSON.parse(xhr.responseText);

            if (result.result === 'true') {
                // mostrar notificación de Correcto
                sweetAlert('Se ejecuto correctamente', 'success');
            } else {
                // hubo un error
                sweetAlert('Error', 'error');
            }
            // Después de 3 segundos redireccionar
        }
    }
    xhr.send(data);
}

//cambiar password
function readPass(e) {
    e.preventDefault();

    const pass = document.querySelector('#pass').value,
        newpass = document.querySelector('#newpass').value,
        idUser = document.querySelector('#idUser').value;

    const data = new FormData();
    data.append("pass", pass);
    data.append("newpass", newpass);
    data.append("idUser", idUser);

    if (pass === '' || newpass === '') {
        sweetAlert('Todos los Campos son Obligatorios', 'error');
    } else if (pass != newpass) {
        sweetAlert('Las controaseñas no coinciden', 'error');
    } else {
        const xhr = new XMLHttpRequest();

        xhr.open("POST", "http://localhost/soft_jrd/usuario/changePassword", true);

        xhr.onload = function () {
            if (this.status === 200) {
                const result = JSON.parse(xhr.responseText);
                if (result.result === 'true') {
                    sweetAlert('Se ejecuto correctamente', 'success');
                }
            }
        }
        xhr.send(data);
    }
}

// Funcion para cambiar el estado del usuario si esta activo o inactivo
function stateUsers(e) {
    const state = (e.target);
    const id = (e.target.getAttribute('data-v'));

    if (!state.checked) {
        const res = confirm('¿ Estas seguro que deseas inabilitarlo ?');

        if (res) {
            const xhr = new XMLHttpRequest();

            const status = 0;

            const data = new FormData();
            data.append('status', status);
            data.append('id', id);

            xhr.open("POST", "http://localhost/soft_jrd/usuario/estado", true);

            xhr.onload = function () {
                if (this.status === 200) {
                    const result = JSON.parse(xhr.responseText);
                    if (result.result === 'true') {
                        const status_input = document.querySelector('#estado_us');
                        status_input.value = result.status == 0 ? 'INACTIVO' : '';
                    }
                }
            }
            xhr.send(data);
        }
    } else {
        const res = confirm('¿ Estas seguro que deseas habilitarlo ?');
        if (res) {
            const xhr = new XMLHttpRequest();

            const status = 1;

            const data = new FormData();
            data.append('status', status);
            data.append('id', id);

            xhr.open("POST", "http://localhost/soft_jrd/usuario/estado", true);

            xhr.onload = function () {
                if (this.status === 200) {
                    const result = JSON.parse(xhr.responseText);
                    if (result.result === 'true') {
                        const status_input = document.querySelector('#estado_us');
                        status_input.value = result.status == 1 ? 'ACTIVO' : '';
                    }
                }
            }
            xhr.send(data);
        }
    }
}





