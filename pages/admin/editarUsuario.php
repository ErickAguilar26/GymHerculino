<?php

require_once '../../includes/helpers.php';
$data  = obtenerUsuario($_GET["idUsuario"]);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Portal Gym Herculino</title>
  <link rel="icon" href="../../assets/img/logo-ico.ico" type="image/x-icon">
  <!--CDN de bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--CDN FONTAWESOME-->
  <script src="https://use.fontawesome.com/9fe761f0b1.js"></script>
  <!--CDN DE SWEET ALERT-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--ASSETS PROPIOS-->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/animation.css">
  <link rel="stylesheet" href="../../assets/css/styleIndex.css">
  <script src="../../assets/js/functions.js"> </script>
</head>

<body>
    
<main>
    <h3>Portal de mantenedor</h3>
    <div id="menu">
        <?php require_once '../../includes/menu.php'; ?>
    </div>
    <div id="contenedor">
        <div class="contenedorFormulario">
            <form class="formularioRegistro" action="" method="get" onsubmit="return validarFormulario(event)">
                <div class="tituloFormulario">
                    <h4 class="titulos">Formulario de Inscripcion</h4>
                </div>
                <fieldset><legend>Datos personales</legend>
                    <div class="contenedorInput">
                        <label class="textos" for="txtNombre">Nombre: <span style="color:red;">*</span></label>
                        <input class="myInput" type="text" value ="<?=$data[0]['nombre']?>" id="txtNombre" name="txtNombre">
                        <input type="hidden" value ="<?=$_GET["idUsuario"]?>" id="txtIdUsuario" name="txtIdUsuario">
                    </div>
                    <div class="contenedorInput">
                        <label for="txtApellidos">Apellidos: <span style="color:red;">*</span></label>
                        <input class="myInput" type="text" value ="<?=$data[0]['apellidos']?>" id="txtApellidos" name="txtApellidos">
                    </div>
                    <div class="contenedorInput">
                        <label for="txtDni">DNI: <span style="color:red;">*</span></label>
                        <input class="myInput" type="text" value ="<?=$data[0]['dni']?>" id="txtDni" name="txtDni">
                    </div>
                    <div class="contenedorInput">
                        <label for="txtTelefono">Teléfono: <span style="color:red;">*</span></label>
                        <input class="myInput" type="number" value ="<?=$data[0]['telefono']?>" id="txtTelefono" name="txtTelefono">
                    </div>
                    <div class="contenedorInput">
                        <label for="txtEmail">Correo electrónico: <span style="color:red;">*</span></label>
                        <input class="myInput" type="email" value ="<?=$data[0]['email']?>" id="txtEmail" name="txtEmail">
                    </div>
                </fieldset>
                <div>
                    <input type="submit" value="Editar" id="btnIncribirse">
                </div>
            </form>
                
        </div>

    </div>
    
  <script src="../../assets/js/scriptMenu.js"> </script>
</main>
</body>

</html>