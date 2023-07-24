<?php

require_once '../includes/helpers.php';

$departamentos = ObtenerDepartamentos();
$sedes = ObtenerSedes();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym Herculino - Sedes</title>
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
    <link rel="stylesheet" href="../assets/css/styleSedes.css">
    <script src="../assets/js/functions.js"> </script>
    <script src="../assets/js/services/globalServices.js"> </script>
</head>
<body>
    <?php require_once '../includes/cabecera.php'; ?>

    <main>
        <h2>Conoce nuestras sedes:</h2>
        <div class="izquierda">
            <div id="sedes">
            <?php
                $plantillaSedes = "";
                $plantillaLocales = "";

                foreach ($departamentos as $departamento) {
                    $sedesFiltrada = array_filter($sedes, function($sede) use ($departamento) {
                        return $departamento['idDepartamento'] == $sede['idDepartamento'];
                    });
                    
                    $plantillaLocales = "";
                    foreach ($sedesFiltrada as $sede) {
                        $plantillaLocales .= '<tr><td class="local" onClick="renderizadoContenedorSedes(this, ' . $sede['idSede'] . ');">' . $sede['descripcion'] . '</td></tr>';
                    }

                    $plantillaSedes .= '<table>
                    <tr>
                        <th>' . $departamento['descripcion'] . '</th>
                    </tr>' . $plantillaLocales . '
                    </table>';
                }
                echo $plantillaSedes;

            ?>
            </div>
        </div>
        <div class="derecha">
            <div id="contenedorSedes">
                <div class="contenedorsenalizquierda">
                    <img src="../assets/img/señal izquierda.png" alt="señal izquierda" class="senalizquierda">
                </div>
                <div class="contenedorh3senal">
                    <h3>Clickea en alguna opción y conoce más sobre nuestras sedes</h3>
                </div>
            </div>
        </div>
        
    </main>

    <?php require_once '../includes/pie.php'; ?>
    
    <script src="../assets/js/scriptSedes.js" > </script>
</body>
</html>