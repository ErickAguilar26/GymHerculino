
async function validarFormulario(event) {
    event.preventDefault(); // Evita que se envíe el formulario de forma predeterminada

    var nombre = document.getElementById('txtNombre').value;
    var apellidos = document.getElementById('txtApellidos').value;
    var dni = document.getElementById('txtDni').value;
    var telefono = document.getElementById('txtTelefono').value;
    var email = document.getElementById('txtEmail').value;
    var idUsuario = document.getElementById('txtIdUsuario').value;

    if (nombre === '' || apellidos === '' || telefono === '' || email === '' ) {
        alert('Por favor, complete todos los campos.');
        return false; // Detiene el envío del formulario
    }
    var result = 0;
    await $.ajax({
        method: "POST",
        url: "../../includes/helpers.php",
        data: {
            op: "editarUsuario",
            nombre: nombre,
            apellidos: apellidos,
            dni: dni,
            telefono: telefono,
            email: email,
            idUsuario: idUsuario,
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

        Swal.fire({
            title: "EXITO",
            text: "Usuario editado correctamente",
            icon: 'success',
        });
        window.location.href = 'usuarios.php';
        //return true; // Permite el envío del formulario
    }
    else{
        alert('mala');
        return false
    }
    
    
}

