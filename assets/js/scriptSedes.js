$.ajax({
    method: "POST",
    url: "../includes/helpers.php",
    data: {
        op: "obtenerSedes",
        // filtro1: "valor1",
        // filtro2: "valor2"
    },
    success: function(data){
        sedes = data;
    },
    error: function(){
        alert("Error de edición");
    }
});

async function renderizadoContenedorSedes(element, idSede) {
    removeAnimation();
    removeColor();
    renderColor(element);
    let sede = sedes.filter(sede => sede.idSede == idSede);
    var plantillaContenedorSedes = `<h2>Sede ${sede[0].descripcion}</h2>
      <img src="${sede[0].imagen}" alt="">
      <p>${sede[0].observacion}</p>
      <iframe src='https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d961.2009846246216!2d${sede[0].longitud}!3d${sede[0].latitud}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTXCsDI5JzQxLjkiUyA3MMKwMDcnMzguNSJX!5e0!3m2!1ses!2spe!4v1685401340752!5m2!1ses!2spe' style='border:0;' allowfullscreen=' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>
      ${sede[0].mapa}
      <label><b>Fecha de apertura:</b> ${ConvertFromDate112(sede[0].fechaApertura)}</label>`;
    document.getElementById("contenedorSedes").innerHTML = plantillaContenedorSedes;
}

function removeAnimation() {
    let tableRows = document.querySelectorAll('#sedes table tr');
    tableRows.forEach(row => {
        row.classList.remove('intermitenteColorPrrimario');
    });
}

function renderColor(element) {
    element.style.backgroundColor = 'var(--color-secondary)';
}

function removeColor() {
    let tables = document.querySelectorAll('#sedes table');
    tables.forEach(table => {
        let rows = table.querySelectorAll('tr td');
        rows.forEach(row => {
            row.style.backgroundColor = 'white';
        });

    });
}

function inicializador() {
    // Obtener todas las tablas dentro del contenedor
    const tables = document.querySelectorAll('#sedes table');
    // Obtener la primera tabla
    const firstTable = tables[0];
    // Obtener la primera fila de la primera tabla
    const firstRow = firstTable.querySelector('tr:nth-child(2)');
    firstRow.classList.add('intermitenteColorPrrimario');
}


async function init() {
    try {
        inicializador();
        
    } catch (error) {
        console.error(error);
        // Manejar el error de forma adecuada
    }
}

init();
loader1();

