function ConvertFromDate112(date112){
    const fechaNumerica = date112.toString();
    const anio = fechaNumerica.slice(0, 4);
    const mes = parseInt(fechaNumerica.slice(4, 6));
    const dia = fechaNumerica.slice(6, 8);
    
    const meses = [
        "enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
    ];
    
    const mesTexto = meses[mes - 1];
    
    return `${dia} de ${mesTexto} del ${anio}`;
}

  var bodyElement = document.body;
//FUNCION PARA MODAL
function renderModal(){
    //insertAdjacentHTML() es un método que se puede utilizar en los elementos del DOM en JavaScript para insertar contenido HTML en una posición específica en relación con el elemento actual. LOs valores de position puedes ser: 'beforebegin': Inserta el contenido HTML justo antes del elemento. 'afterbegin': Inserta el contenido HTML al comienzo del elemento, como el primer hijo. 'beforeend': Inserta el contenido HTML al final del elemento, como el último hijo. 'afterend': Inserta el contenido HTML justo después del elemento.
    bodyElement.insertAdjacentHTML('afterbegin', `
    <div id="modal" class="modal">
      <div class="modal-content">
        <span id="closeModal" class="close" onClick="ocultarModal();">&times;</span>
        <h2>Título del Modal</h2>
        <p>Contenido del modal...</p>
      </div>
    </div>`);
}

function mostrarModal() {
  document.getElementById('modal').style.display = 'block';
}

function ocultarModal() {
  document.getElementById('modal').style.display = 'none';
}


function crearLoading(){
  var bodyElement = document.body;
    //insertAdjacentHTML() es un método que se puede utilizar en los elementos del DOM en JavaScript para insertar contenido HTML en una posición específica en relación con el elemento actual. LOs valores de position puedes ser: 'beforebegin': Inserta el contenido HTML justo antes del elemento. 'afterbegin': Inserta el contenido HTML al comienzo del elemento, como el primer hijo. 'beforeend': Inserta el contenido HTML al final del elemento, como el último hijo. 'afterend': Inserta el contenido HTML justo después del elemento.
    bodyElement.insertAdjacentHTML('afterbegin', `
    <div id="loading" style="display: none;">
      <img id="logoLoading" src="/assets/img/logo.png" alt="Loading">
      <img id="checkLoading" src="/assets/img/check.png" alt="Check" class="hidden" style="width: 200px!important;">
      <p>Procesando...</p>
    </div>`);
}

function mostrarLoading() {
  return new Promise((resolve, reject) => {
    document.getElementById('loading').style.display = 'flex';
    var logo = document.getElementById('logoLoading');
    var check = document.getElementById('checkLoading');
    setTimeout(function () {
      logo.classList.add('transition');
      setTimeout(function () {
        logo.style.display = 'none';
        check.style.opacity = '';
        check.classList.remove('hidden');
        check.classList.add('transition');
      }, 500);
      check.classList.add('visible');
      setTimeout(function () {
        var loading = document.getElementById('loading');
        loading.style.display = 'none';
        resolve(true);
      }, 2000); // Cambiar el valor a la duración deseada de la transición
    }, 2000);
  });
}


function loader(){
  var bodyElement = document.body;
  //insertAdjacentHTML() es un método que se puede utilizar en los elementos del DOM en JavaScript para insertar contenido HTML en una posición específica en relación con el elemento actual. LOs valores de position puedes ser: 'beforebegin': Inserta el contenido HTML justo antes del elemento. 'afterbegin': Inserta el contenido HTML al comienzo del elemento, como el primer hijo. 'beforeend': Inserta el contenido HTML al final del elemento, como el último hijo. 'afterend': Inserta el contenido HTML justo después del elemento.
  bodyElement.insertAdjacentHTML('afterbegin', `
    <div class="loader" id="loader">
      <div class="loader-inner">
        <img src="assets/img/logo.png" alt="Logo" class="logo">
        <div class="circle"></div>
      </div>
    </div>
  `);
  const loader = document.getElementById('loader');
  const body = document.body;
  loader.classList.add('show');
  body.classList.add('noDrop');
  setTimeout(() => {
      loader.classList.remove('show');
      body.classList.remove('noDrop');
  }, 1500);
}

function loader1(){
    var bodyElement = document.body;
    //insertAdjacentHTML() es un método que se puede utilizar en los elementos del DOM en JavaScript para insertar contenido HTML en una posición específica en relación con el elemento actual. LOs valores de position puedes ser: 'beforebegin': Inserta el contenido HTML justo antes del elemento. 'afterbegin': Inserta el contenido HTML al comienzo del elemento, como el primer hijo. 'beforeend': Inserta el contenido HTML al final del elemento, como el último hijo. 'afterend': Inserta el contenido HTML justo después del elemento.
    bodyElement.insertAdjacentHTML('afterbegin', `
      <div class="loader" id="loader">
        <div class="loader-inner">
          <img src="../assets/img/logo.png" alt="Logo" class="logo">
          <div class="circle"></div>
        </div>
      </div>
    `);
    const loader = document.getElementById('loader');
    const body = document.body;
    loader.classList.add('show');
    body.classList.add('noDrop');
    setTimeout(() => {
        loader.classList.remove('show');
        body.classList.remove('noDrop');
    }, 1500);
}

