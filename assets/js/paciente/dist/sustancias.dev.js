"use strict";

var csForm = document.querySelector('#csForm'),
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
}

function readForm(e) {
  e.preventDefault();
  var sustancia = document.querySelector('#sustancia').value,
      frecuencia = document.querySelector('#frecuencia').value,
      via = document.querySelector('#via').value,
      edad = document.querySelector('#edad_uso').value,
      actualmente = document.querySelector('#actualmente').value,
      dejo_uso = document.querySelector('#dejo_uso').value;
  var sustancias = {
    sustancia: sustancia,
    frecuencia: frecuencia,
    via: via,
    edad: edad,
    actualmente: actualmente,
    dejo_uso: dejo_uso
  };

  if (localStorage.getItem("db") === null) {
    var data = [];
    data.push(sustancias);
    localStorage.setItem("db", JSON.stringify(data));
  } else {
    var _data = JSON.parse(localStorage.getItem("db"));

    _data.push(sustancias);

    localStorage.setItem("db", JSON.stringify(_data));
  }

  listData();
  sweetAlert('Generado correctamente !', 'success');
  csForm.reset();
}

function listData() {
  var data = JSON.parse(localStorage.getItem('db'));
  document.querySelector('#sustanciasPaciente').innerHTML = "";

  if (data) {
    for (var i = 0; i < data.length; i++) {
      var sustancia = data[i].sustancia;
      var frecuencia = data[i].frecuencia;
      var via = data[i].via;
      var edad = data[i].edad;
      var actualmente = data[i].actualmente;
      var dejo_uso = data[i].dejo_uso;
      var $tbody = document.querySelector('#sustanciasPaciente');
      var $tr = document.createElement('tr');
      var $tdSustancia = document.createElement('td');
      $tdSustancia.setAttribute('class', 'sustancia');
      $tdSustancia.innerText = sustancia;
      $tr.appendChild($tdSustancia);
      var $tdFrecuencia = document.createElement('td');
      $tdFrecuencia.setAttribute('class', 'frecuencia');
      $tdFrecuencia.innerText = frecuencia;
      $tr.appendChild($tdFrecuencia);
      var $tdVia = document.createElement('td');
      $tdVia.setAttribute('class', 'via');
      $tdVia.innerText = via;
      $tr.appendChild($tdVia);
      var $tdEdad = document.createElement('td');
      $tdEdad.setAttribute('class', 'edad');
      $tdEdad.innerText = edad;
      $tr.appendChild($tdEdad);
      var $tdActualmente = document.createElement('td');
      $tdActualmente.setAttribute('class', 'actualmente');
      $tdActualmente.innerText = actualmente;
      $tr.appendChild($tdActualmente);
      var $tduso = document.createElement('td');
      $tduso.setAttribute('class', 'dejo_uso');
      $tduso.innerText = dejo_uso;
      $tr.appendChild($tduso); //boton editar

      var $tdButtonEdit = document.createElement('td');
      var $buttonEdit = document.createElement('a');
      $buttonEdit.setAttribute('type', 'button');
      $buttonEdit.setAttribute('class', 'btn btn-primary btn-sm btn-flat b-edit');
      $buttonEdit.setAttribute('data-id', "".concat(i));
      $buttonEdit.setAttribute('data-toggle', 'modal');
      $buttonEdit.setAttribute('data-target', '#modalEdit');
      var $iconEdit = document.createElement('i');
      $iconEdit.setAttribute('class', 'fas fa-user-edit b-edit');
      $iconEdit.setAttribute('data-id', "".concat(i));
      $buttonEdit.appendChild($iconEdit);
      $tdButtonEdit.appendChild($buttonEdit);
      $tr.appendChild($tdButtonEdit);
      var $tdButtonDelete = document.createElement('td');
      var $ButtonDelete = document.createElement('a');
      $ButtonDelete.setAttribute('type', 'button');
      $ButtonDelete.setAttribute('data-id', "".concat(i));
      $ButtonDelete.setAttribute('class', 'btn btn-danger btn-sm btn-flat b-delete');
      var $iconDelete = document.createElement('i');
      $iconDelete.setAttribute('class', 'far fa-trash-alt b-delete');
      $iconDelete.setAttribute('data-id', "".concat(i));
      $ButtonDelete.appendChild($iconDelete);
      $tdButtonDelete.appendChild($ButtonDelete);
      $tr.appendChild($tdButtonDelete);
      $tbody.appendChild($tr);
    }
  }
}

function readList(e) {
  if (e.target.classList.contains('b-edit')) {
    var sustanciaId = document.querySelector('#sustanciaId');
    var id = e.target.getAttribute('data-id');
    var sustancia = document.querySelector('#sustanciaEd'),
        frecuencia = document.querySelector('#frecuenciaEd'),
        via = document.querySelector('#viaEd'),
        edad = document.querySelector('#edad_usoEd'),
        actualmente = document.querySelector('#actualmenteEd'),
        dejo_uso = document.querySelector('#dejo_usoEd');
    var data = JSON.parse(localStorage.getItem("db"));
    sustanciaId.value = "".concat(id);
    sustancia.value = "".concat(data[id].sustancia);
    frecuencia.value = "".concat(data[id].frecuencia);
    via.value = "".concat(data[id].via);
    edad.value = "".concat(data[id].edad);
    actualmente.value = "".concat(data[id].actualmente);
    dejo_uso.value = "".concat(data[id].dejo_uso);
  }

  if (e.target.classList.contains('b-delete')) {
    var _id = e.target.getAttribute('data-id');

    var _data2 = JSON.parse(localStorage.getItem("db"));

    _data2.splice(_id, 1);

    localStorage.setItem("db", JSON.stringify(_data2));
    listData();
  }
}

function edit(e) {
  e.preventDefault();
  var id = document.querySelector('#sustanciaId').value;
  var data = JSON.parse(localStorage.getItem("db"));

  if (e.target.classList.contains('btnAction')) {
    data[id].sustancia = document.querySelector('#sustanciaEd').value, data[id].frecuencia = document.querySelector('#frecuenciaEd').value, data[id].via = document.querySelector('#viaEd').value, data[id].edad = document.querySelector('#edad_usoEd').value, data[id].actualmente = document.querySelector('#actualmenteEd').value, data[id].dejo_uso = document.querySelector('#dejo_usoEd').value;
    localStorage.setItem("db", JSON.stringify(data));
    sweetAlert('Actualizado correctamente !', 'success');
  }

  listData();
}