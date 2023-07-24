<?php

require_once '../includes/helpers.php';

$sedes = ObtenerSedes();
$servicios = ObtenerServicios();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym Herculiano</title>
    <link rel="icon" href="../assets/img/logo-ico.ico" type="image/x-icon">
    <!--CDN de bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--CDN FONTAWESOME-->
    <script src="https://use.fontawesome.com/9fe761f0b1.js"></script>
    <!--CDN DE SWEET ALERT-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--ASSETS PROPIOS-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/animation.css">
    <link rel="stylesheet" href="../assets/css/styleRegistro.css">
    <script src="../assets/js/functions.js"> </script>
    <script src="../assets/js/services/globalServices.js"> </script>
</head>

<body>
    
    <?php require_once '../includes/cabecera.php'; ?>

    <main>
        <div class="contenedorFormulario">
            <form class="formularioRegistro" action="" method="get" onsubmit="return validarFormulario(event)">
                <div class="tituloFormulario">
                    <h4 class="titulos">Formulario de Inscripcion</h4>
                </div>
                <fieldset><legend>Datos personales</legend>
                    <div class="contenedorInput">
                        <label class="textos" for="txtNombre">Nombre: <span style="color:red;">*</span></label>
                        <input class="myInput" type="text" id="txtNombre" name="txtNombre">
                    </div>
                    <div class="contenedorInput">
                        <label for="txtApellidos">Apellidos: <span style="color:red;">*</span></label>
                        <input class="myInput" type="text" id="txtApellidos" name="txtApellidos">
                    </div>
                    <div class="contenedorInput">
                        <label for="txtDni">DNI: <span style="color:red;">*</span></label>
                        <input class="myInput" type="text" id="txtDni" name="txtDni">
                    </div>
                    <div class="contenedorInput">
                        <label for="txtTelefono">Teléfono: <span style="color:red;">*</span></label>
                        <input class="myInput" type="number" id="txtTelefono" name="txtTelefono">
                    </div>
                    <div class="contenedorInput">
                        <label for="txtEmail">Correo electrónico: <span style="color:red;">*</span></label>
                        <input class="myInput" type="email" id="txtEmail" name="txtEmail">
                    </div>
                </fieldset>
                <fieldset><legend>Datos de la inscripción</legend>
                    <div class="contenedorInput">
                        <label for="pregunta1">¿A que clase desea inscribirse? <span style="color:red;">*</span></label><br>
                        <select id="pregunta1" name="pregunta1">
                        <?php
                            $plantillaServicios = '<option value="0">Selecciona una opción</option>';
                            foreach ($servicios as $servicio) {
                                $plantillaServicios .= '<option value="' . $servicio['idServicio'] . '">' . $servicio['nombre'] . '</option>';
                            }
                            echo $plantillaServicios;
                        ?>
                        </select>
                    </div>
                    <div class="contenedorInput">
                        <label for="pregunta2">¿Forma de pago? <span style="color:red;">*</span></label><br>
                        <select id="pregunta2" name="pregunta2">
                            <option value="">Seleccione una opción</option>
                            <option value="pago">Yape</option>
                            <option value="pago">Plin</option>
                            <option value="pago">Deposito a Cuenta Bancaria</option>
                            <option value="pago">Efectivo</option>
                        </select>
                    </div>
                    <div class="contenedorInput">
                        <label for="pregunta3">¿En que sede desea Insribirse? <span style="color:red;">*</span></label><br>
                        <select id="pregunta3" name="pregunta3">
                        <?php
                            $plantillaSedes = '<option value="0">Selecciona una opción</option>';
                            foreach ($sedes as $sede) {
                                $plantillaSedes .= '<option value="' . $sede['idSede'] . '">' . $sede['descripcion'] . '</option>';
                            }
                            echo $plantillaSedes;
                        ?>
                        </select>
                    </div>
                </fieldset>
                <div>
                    <input type="submit" value="Inscibirse" id="btnIncribirse">
                </div>
            </form>
                
        </div>

    </main>
    
    <?php require_once '../includes/pie.php'; ?>

    <script src="../assets/js/scriptRegistro.js"> </script>
</body>

</html>