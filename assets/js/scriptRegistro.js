var sedes= [];
var servicios= [];

//completar select de servicios
function renderSelectServicios(){
    return new Promise((resolve, reject) => {
        var plantillaServicios = `<option value="0">Selecciona una opción</option>`;
        for(var x = 0; x < servicios.length ; x++){
            plantillaServicios += `<option value="${servicios[x].idServicio}">${servicios[x].nombre}</option>`;
        }
        resolve(plantillaServicios);
    });
}


//completar select de sedes
function renderSelectSedes(){
    return new Promise((resolve, reject) => {
        var plantillaSedes = `<option value="0">Selecciona una opción</option>`;
        for(var x = 0; x < sedes.length ; x++){
            plantillaSedes += `<option value="${sedes[x].idSede}">${sedes[x].descripcion}</option>`;
        }
        resolve(plantillaSedes);
    });
}


async function validarFormulario(event) {
    event.preventDefault(); // Evita que se envíe el formulario de forma predeterminada

    var nombre = document.getElementById('txtNombre').value;
    var apellidos = document.getElementById('txtApellidos').value;
    var telefono = document.getElementById('txtTelefono').value;
    var email = document.getElementById('txtEmail').value;
    var pregunta1Select = document.getElementById('pregunta1');
    var pregunta2Select = document.getElementById('pregunta2');
    var pregunta3Select = document.getElementById('pregunta3');

    if (nombre === '' || apellidos === '' || telefono === '' || email === '' || pregunta1Select.value === '' || pregunta2Select.value === '' || pregunta3Select.value === '') {
        alert('Por favor, complete todos los campos.');
        return false; // Detiene el envío del formulario
    }
    await mostrarLoading();
    window.location.href = '../index.html';
    return true; // Permite el envío del formulario
}

async function traerSedes() {
    try {
        const response1 = await getSedes();
        const data1 = await response1.json();
        sedes = data1.data;

        const response2 = await getServicios();
        const data2 = await response2.json();
        servicios = data2.data;

        const response3 = await renderSelectServicios();
        document.getElementById("pregunta1").innerHTML = response3;

        const response4 = await renderSelectSedes();
        document.getElementById("pregunta3").innerHTML = response4;
    } catch (error) {
        console.error(error);
        // Manejar el error de forma adecuada
    }
}

traerSedes();

crearLoading();
loader1();