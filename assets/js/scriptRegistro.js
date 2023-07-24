
async function validarFormulario(event) {
    event.preventDefault(); // Evita que se envíe el formulario de forma predeterminada

    var nombre = document.getElementById('txtNombre').value;
    var apellidos = document.getElementById('txtApellidos').value;
    var dni = document.getElementById('txtDni').value;
    var telefono = document.getElementById('txtTelefono').value;
    var email = document.getElementById('txtEmail').value;
    var pregunta1Select = document.getElementById('pregunta1');
    var pregunta2Select = document.getElementById('pregunta2');
    var pregunta3Select = document.getElementById('pregunta3');

    if (nombre === '' || apellidos === '' || telefono === '' || email === '' || pregunta1Select.value === '' || pregunta2Select.value === '' || pregunta3Select.value === '') {
        alert('Por favor, complete todos los campos.');
        return false; // Detiene el envío del formulario
    }
    var result = 0;
    await $.ajax({
        method: "POST",
        url: "../includes/helpers.php",
        data: {
            op: "registrarUsuario",
            nombre: nombre,
            apellidos: apellidos,
            dni: dni,
            telefono: telefono,
            email: email,
            pregunta1Select: pregunta1Select.value,
            pregunta2Select: pregunta2Select.value,
            pregunta3Select: pregunta3Select.value
        },
        success: function(data){
            console.log('data',data);
            result = data;
        },
        error: function(){
            alert("Error de edición");
        }
    });
    if(result == 1){
        await mostrarLoading();
        window.location.href = '../index.php';
        return true; // Permite el envío del formulario
    }
    else{
        return false
    }
    
    
}


crearLoading();
loader1();