<?php

require_once '../includes/helpers.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym Herculino - Login</title>
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
    <link rel="stylesheet" href="../assets/css/styleLogin.css">
    <script src="../assets/js/functions.js"> </script>
    <script src="../assets/js/services/globalServices.js"> </script>
</head>

<body>
    <?php require_once '../includes/cabecera.php'; ?>

    <div class="background-container">
        <main>
            <br><br><br>
            <form class="formularioRegistro" action="" method="get" onsubmit="return logearse(event)">
                <div class="container">
                    <div class="container-title">
                        <h3>Inicia sesión</h3>  
                    </div>
                    <div class="container-body">
                        <input type="text" name="txtUsuario" id="txtUsuario">
                        <input type="password" name="txtPass" id="txtPass">
                        <label for="btnRecordar"><input type="checkbox" name="btnRecordar" id="btnRecordar">Recordar usuario</label>
                    </div>
                    <div class="container-footer">
                        <input type="submit" value="Ingresar">
                    </div>
                </div>
            </form>
            <br><br><br>
        </main>
    </div>
    <?php require_once '../includes/pie.php'; ?>

    <script src="../assets/js/scriptLogin.js"> </script>
</body>

</html>