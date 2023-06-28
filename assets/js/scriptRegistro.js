var sedes= modelSedes.data;
var servicios= modelServicios.data;

var plantillaSedes = `<option value="0">Selecciona una opción</option>`;
var plantillaServicios = `<option value="0">Selecciona una opción</option>`;

//completar select de servicios
for(var x = 0; x < servicios.length ; x++){
    plantillaServicios += `<option value="${servicios[x].idServicio}">${servicios[x].nombre}</option>`;
}
setTimeout(function(){
    document.getElementById("pregunta1").innerHTML = plantillaServicios;
}, 500);

//completar select de sedes
for(var x = 0; x < sedes.length ; x++){
    plantillaSedes += `<option value="${sedes[x].idSede}">${sedes[x].descripcion}</option>`;
}
setTimeout(function(){
    document.getElementById("pregunta3").innerHTML = plantillaSedes;
}, 500);


function validarFormulario(event) {
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
    mostrarLoading();
    setTimeout(function(){
        window.location.href = '/';
        return true; // Permite el envío del formulario
    }, 4000);
}

alertLoading();
loader();