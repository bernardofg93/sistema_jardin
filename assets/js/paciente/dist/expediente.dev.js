"use strict";

var expedienteAction = document.querySelector('#expedienteId'),
    idP = document.querySelector('#idP').value;
eventListener();

function eventListener() {
  expedienteAction.addEventListener('change', expediente);
}

function expediente(e) {
  var linkDoc = document.querySelectorAll('#linkDoc');
  console.log(linkDoc);
  var idExp = e.target.value;
  var data = new FormData();
  data.append('idExp', idExp);
  data.append('idP', idP);
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "http://localhost/soft_jrd/paciente/dataExpediente&idExp=".concat(idExp, "&idPac=").concat(idP), true);

  xhr.onload = function () {
    if (xhr.status === 200) {
      var res = JSON.parse(xhr.responseText);
      console.log(res);
      /*
      let colorExp = document.querySelectorAll('.color-manila');
      for (let i = 0; i < colorExp.length; i++) {
          colorExp[i].classList.remove('color-manila');
          colorExp[i].classList.add('color-manila-2')
      }
      */
      //let texto = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

      var test = [{
        texto: 'Datos personales',
        link: "http://localhost/soft_jrd/paciente/registro&idExp=".concat(idExp, "&idPac=").concat(idP)
      }, {
        texto: 'Entrevista',
        link: "http://localhost/soft_jrd/entrevista/paciente&idExp=".concat(idExp, "&idPac=").concat(idP)
      }, {
        texto: 'Domicilio',
        link: "http://localhost/soft_jrd/domicilio/paciente&idExp=".concat(idExp, "&idPac=").concat(idP)
      }, {
        texto: 'Sustancias',
        link: "http://localhost/soft_jrd/consumo/registro&idExp=".concat(idExp, "&idPac=").concat(idP)
      }, {
        texto: 'Ficha clinica',
        link: "http://localhost/soft_jrd/paciente/registro&idExp=".concat(idExp, "&idPac=").concat(idP)
      }];
      test.forEach(function (el, index, test) {
        var $divParentNode = document.querySelector('#containerExpediente');
        var $divParentCart = document.createElement('div');
        $divParentCart.setAttribute('class', 'col-lg-3 col-6');
        var $divboxManila = document.createElement('div');
        $divboxManila.setAttribute('class', 'small-box bg color-manila');
        var $innerBox = document.createElement('div');
        $innerBox.setAttribute('class', 'inner');
        var $textTitle = document.createElement('p');
        $textTitle.innerText = el.texto;
        $innerBox.appendChild($textTitle);
        $divboxManila.appendChild($innerBox);
        var $iconBox = document.createElement('div');
        $iconBox.setAttribute('class', 'icon');
        var $iconFolder = document.createElement('i');
        $iconFolder.setAttribute('class', 'fas fa-folder');
        $iconBox.appendChild($iconFolder);
        $divboxManila.appendChild($iconBox);
        var $link = document.createElement('a');
        $link.setAttribute('class', 'small-box-footer');
        $link.href = el.link;
        var $iconLink = document.createElement('i');
        $iconLink.setAttribute('class', 'fas fa-arrow-circle-right');
        $link.appendChild($iconLink);
        $divboxManila.appendChild($link);
        $divParentCart.appendChild($divboxManila);
        $divParentNode.appendChild($divParentCart);
      });
    }
  };

  xhr.send(data);
} //for (let j = 0; j < test.length; j++) {}