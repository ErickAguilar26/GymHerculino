async function logearse(event) {
    event.preventDefault(); // Evita que se envíe el formulario de forma predeterminada
    var usuario = document.getElementById('txtUsuario').value;
    var contra = document.getElementById('txtPass').value;
    var recordar = document.getElementById('btnRecordar').value;

    if (usuario === '' || contra === '') {
        alert('Por favor, complete todos los campos.');
        return false; // Detiene el envío del formulario
    }
    result = 0;
    await $.ajax({
        method: "POST",
        url: "../includes/helpers.php",
        data: {
            op: "logearse",
            usuario: usuario,
            contra: contra
        },
        success: function(data){
            console.log('data',data);
            if (data.length > 0){
                result = 1;
            }
        },
        error: function(){
            alert("Error de edición");
        }
    });
    if (result != 0){
        Swal.fire({
            title: "EXITO",
            text: "Usuario correcto",
            icon: 'success',
        });
        window.location.href = 'admin';
    }
    else{
        Swal.fire({
            title: "ALERTA",
            text: "Usuario y/o contraseña incorrecta",
            icon: 'error',
        });
    }
    // 
    // return true; // Permite el envío del formulario
}

loader1();