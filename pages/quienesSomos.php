<?php
  require_once '../includes/helpers.php';
  $miembros = obtenerEntrenadores();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gym Herculino</title>
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
  <link rel="stylesheet" href="../assets/css/styleQuienesSomos.css">
  <script src="../assets/js/functions.js"> </script>
  <script src="../assets/js/services/globalServices.js"> </script>
</head>
<body>
  <?php require_once '../includes/cabecera.php'; ?>

  <section id="quienes-somos">
    <hr>
    <h3>Quienes Somos</h3>
    <div class="image-slider">
      <div class="image-container">
        <img src="../assets/img/1.jpg" alt="200" width="350">
        <img src="../assets/img/2.jpg" alt="200" width="350">
        <img src="../assets/img/3.jpg" alt="200" width="350">
        <img src="../assets/img/4.jpg" alt="200" width="350">
      </div>
      <p class="textoSobrepuesto">Somos un gimnasio comprometido con el bienestar y la salud de nuestros clientes.
        Ofrecemos una amplia variedad de
        clases y entrenamientos, desde yoga y pilates hasta levantamiento de pesas y entrenamiento funcional.<br>
        Nuestros entrenadores altamente capacitados están aquí para ayudarte a alcanzar tus objetivos de fitness y estar
        en
        la mejor forma de tu vida. <br>¡Únete a nuestra comunidad hoy mismo!</p>

    </div>
    <div class="misionVisionValores">
      <div class="card">
        <div class="card-head">
          <img src="../assets/img/ico-vision.png" alt="">
          <h3>Visión</h3>
        </div>
        <div class="card-body">
          <p>Ser el gimnasio líder en nuestra comunidad, brindando un espacio inspirador donde nuestros miembros puedan
            alcanzar sus objetivos de bienestar físico y mental. Buscamos ser reconocidos por nuestra excelencia en
            servicios, instalaciones de vanguardia y un equipo profesional comprometido con el éxito de cada individuo.
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-head">
          <img src="../assets/img/ico-mision.png" alt="">
          <h3>Misión</h3>
        </div>
        <div class="card-body">
          <p>Nuestra misión es proporcionar un ambiente inclusivo y motivador, ofreciendo programas de entrenamiento de
            alta calidad, asesoramiento personalizado y servicios integrales de bienestar. Nos esforzamos por ayudar a
            nuestros miembros a transformar sus vidas, promoviendo la salud, la confianza en sí mismos y el equilibrio
            en todas las áreas.</p>
        </div>
      </div>
      <div class="card">
        <div class="card-head">
          <img src="../assets/img/ico-valores.png" alt="">
          <h3>Valores</h3>
        </div>
        <div class="card-body">
          <p>En nuestro gimnasio, nos regimos por principios fundamentales que nos guían en todas nuestras acciones:
            Compromiso, Integridad, Profesionalismo, Diversidad, Innovación, Pasión, Responsabilidad. Estos valores
            fundamentales nos guían en nuestro compromiso de proporcionar una experiencia excepcional y transformadora a
            nuestros miembros.</p>
        </div>
      </div>
    </div>
    <h3>Nuestro equipo</h3>
    <p class="textoEquipo"><b>Todo nuestro personal esta capacitado para brindarte una buena atencion y para ayudarte en cualquier rutina
      que necesites, estaran a tu disponibilidad.</p></b>
    <!-- <audio src="../assets/audio/musicherculino.mp3   " controls="" autoplay="" loop=""></audio> -->
    <div id="tablaEntrenadores">
    <?php
      // Crear la tabla
      $tabla = "<table>";
      // Crear el encabezado de la tabla con los títulos de columna
      $titulos = ['Nombre', 'Cargo', 'Especialidad'];
      $encabezado = "<tr>";
      foreach ($titulos as $titulo) {
          $celda = "<th>" . ucfirst($titulo) . "</th>"; // Convertir la primera letra en mayúscula
          $encabezado .= $celda;
      }
      $encabezado .= "</tr>";
      $tabla .= $encabezado;
      // Agregar las filas de la tabla con los datos de servicios
      foreach ($miembros as $miembro) {
          // Crear una nueva fila
          $fila = "<tr>";
          // Agregar las celdas de datos
          foreach ($titulos as $tipo) {
              $celdaDatos = "<td>" . $miembro[$tipo] . "</td>";
              $fila .= $celdaDatos;
          }
          $fila .= "</tr>";
          $tabla .= $fila;
      }
      // Cerrar la tabla
      $tabla .= "</table>";
      // Imprimir la tabla
      echo $tabla;
    ?>

    </div>
    <div class="imagenEquipo">
      <img src="../assets/img/equipo.jpg" width="300px" alt="La imagen no a sido encontrada" title="Se parte del cambio">
    </div>
  </section>




  <?php require_once '../includes/pie.php'; ?>

  <script src="../assets/js/scriptQuienesSomos.js"> </script>
</body>

</html>