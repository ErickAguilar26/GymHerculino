<?php

require_once '../includes/helpers.php';

$servicios = ObtenerServicios();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gym Herculino- Inscripción</title>
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
  <link rel="stylesheet" href="../assets/css/styleInscripcion.css">
  <script src="../assets/js/functions.js"> </script>
  <script src="../assets/js/services/globalServices.js"> </script>
</head>
<body>
  
  <?php require_once '../includes/cabecera.php'; ?>

  <main>
    <h3 class="tituloInscripcion">Inscribete y se parte del cambio</h3>
    <div id="contenedorTabla">

    <?php
      // Crear la tabla
      $tabla = '<table id="tabla-color">';
      // Crear la fila de encabezado
      $encabezado = '<tr>';
      // Crear la celda vacía del encabezado
      $celdaVacia = '<th class="filasregistro">Clases</th>';
      $encabezado .= $celdaVacia;
      // Agregar las celdas del encabezado de columna (días de la semana)
      $tipoPago = ['Precio por día', 'Precio por mes'];
      foreach ($tipoPago as $dia) {
          $celda = '<th>' . ucfirst($dia) . '</th>'; // Convertir la primera letra en mayúscula
          $encabezado .= $celda;
      }
      $encabezado .= '</tr>';
      // Agregar el encabezado a la tabla
      $tabla .= $encabezado;

      // Agregar las filas de la tabla con los datos de servicios
      foreach ($servicios as $servicio) {
          $fila = '<tr>';
          // Agregar la celda del criterio de fila (nombre del servicio)
          $celdaServicio = '<th>Clase de ' . $servicio['nombre'] . '</th>';
          if (!empty($servicio['color'])) {
              $celdaServicio = '<th style="background-color: ' . $servicio['color'] . ';">Clase de ' . $servicio['nombre'] . '</th>';
          }
          $fila .= $celdaServicio;
          // Agregar las celdas de datos
          foreach ($tipoPago as $tipo) {
              $celdaDatos = '<td>';
              if ($tipo == 'Precio por día') {
                  $celdaDatos .= $servicio['precio_dia'];
              } else {
                  $celdaDatos .= $servicio['precio_mes'];
              }
              $celdaDatos .= '</td>';
              $fila .= $celdaDatos;
          }
          $fila .= '</tr>';
          // Agregar la fila a la tabla
          $tabla .= $fila;
      }

      $tabla .= '</table>';
      echo $tabla;
    ?>

    </div>

    <div class="botonRegistrarse">
      <a href="registro.php">Registrate ahora y cambia tu vida</a>
    </div>

    <div class="contenedorPresentador">
      <div class="presentador">
        <div class="imagen"></div>
        <!-- <img id="imagen2" src="../assets/img/20.jpg" alt=""> -->
        <div class="frase">
          <h4>LOGRA LO PROPUESTO</h4><BR>
          <h4>"El dolor que sientes hoy es la fuerza que tendrás mañana."</h4>
        </div>
      </div>
  
      <div class="presentador">
        <div class="frase">
          <h4>VENCE TUS LÍMITES</h4><BR>
          <h4>"No importa cuán difícil parezca, recuerda que cada repetición te acerca más a tus metas."</h4>
        </div>
        <div class="imagen"></div>
        <!-- <img id="imagen2" src="../assets/img/20.jpg" alt=""> -->
      </div>
  
      <div class="presentador">
        <div class="imagen"></div>
        <!-- <img id="imagen2" src="../assets/img/20.jpg" alt=""> -->
        <div class="frase">
          <h4>TRANSFORMA TU CUERPO, TRANSFORMA TU VIDA</h4><BR>
          <h4>"Cada gota de sudor es un paso hacia la versión más fuerte y saludable de ti mismo."</h4>
        </div>
      </div>
  
      <div class="presentador">
        <div class="frase">
          <h4>SÉ EL CAMBIO QUE DESEAS VER EN TI</h4><BR>
          <h4>"El cambio comienza cuando decides que ya no estás dispuesto a conformarte con menos de lo que eres capaz."</h4>
        </div>
        <div class="imagen"></div>
        <!-- <img id="imagen2" src="../assets/img/20.jpg" alt=""> -->
      </div>
    </div>
    

    <div class="botonRegistrarse">
      <a href="registro.php">Registrate ahora y cambia tu vida</a>
    </div>
    
    <!-- <hr>
          <p><b>Recalcar que los medio de pago en efectivo se pagan en la misma sede.<br>Con el siguiente formulario que llenara para su incripcion se enviar un mensaje a su correo electronico en donde se confirmara su pago.<br>Para depositos por yape o plin o depositos a cuenta bancaria comunicarse con el siguiente numero 9832440117 en donde se le brindara toda la informacion que necesite.</p><br></b>   
        
      <hr> -->
  </main>
  <?php require_once '../includes/pie.php'; ?>

  <script src="../assets/js/scriptInscripcion.js"> </script>
</body>

</html>