<?php
  require_once 'includes/helpers.php';

  $servicios = ObtenerServicios();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gym Herculino</title>
  <link rel="icon" href="assets/img/logo-ico.ico" type="image/x-icon">
  <!--CDN de bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--CDN FONTAWESOME-->
  <script src="https://use.fontawesome.com/9fe761f0b1.js"></script>
  <!--CDN DE SWEET ALERT-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--ASSETS PROPIOS-->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/animation.css">
  <link rel="stylesheet" href="assets/css/styleIndex.css">
  <script src="assets/js/functions.js"> </script>
  <script src="assets/js/models/servicios.js"> </script>
</head>
<body>
  <header id="header">
    <div>
      <a href="index.php"><img src="assets/img/logo.png" alt="250px" width="400px"></a>
    </div>
    <nav>
      <ul>
        <li>
          <a href="pages/quienesSomos.php">Quienes Somos</a>
        </li>
        <li>
          <a href="#horarios">Horarios</a>
        </li>
        <li>
          <a href="pages/sedes.php">Sedes</a>
        </li>
        <li>
          <a href="pages/inscripcion.php">Registro</a>
        </li>
        <li>
          <a href="pages/login.php">Login</a>
        </li>
      </ul>
    </nav>
  </header>

  <main>

    <div class="contenedorCarousel">
      <div id="carousel"></div>
    </div>

    <div id="quienesSomos">

      <p>Somos un gimnasio comprometido con el bienestar y la salud de nuestros clientes. Ofrecemos una amplia variedad
        de clases y entrenamientos, desde yoga y pilates hasta levantamiento de pesas y entrenamiento funcional.<br>
        Nuestros entrenadores altamente capacitados están aquí para ayudarte a alcanzar tus objetivos de fitness y estar
        en la mejor forma de tu vida. ¡Únete a nuestra comunidad hoy mismo!</p>
      <p>Se parte de esta maravillosa familia, contamos con sedes en todo el Peru <b>deja las excusas y PONTE A ENTRENAR
          YA.</b></p>
    </div>


    <div id="servicios">
      <H3 font="Area">CONTENIDO GYM HERCULINO (FILM)</H3>
      <table>
        <tr>
          <td><iframe width="310" height="150" src="https://www.youtube.com/embed/NNuSILctLo0"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen></iframe> <br> <b> SUPER RUTINAS</b> <br> Ejercicio de Inicio a fin, L-V Fit</td>
          <td><iframe width="310" height="150" src="https://www.youtube.com/embed/wzIsWDRQmVs"
              title="RUTINA DE ESPALDA - imposible fallar! (Martes) gym topz" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen></iframe><br> <b> ESPALDA TONIFICADA</b> <br> Desarrolo de Masa Muscular</td>
          <td><iframe width="310" height="150" src="https://www.youtube.com/embed/6hW1lU0zSXw"
              title="Rutina Para Marcar Abdominales En Casa (15 MIN) | Adiós Barriga" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen></iframe><br> <b> ABDOMEN TONIFICADO</b> <br> Ejercicios correctos abdominales</td>
          <td><iframe width="310" height="150" src="https://www.youtube.com/embed/dg5NFMrqbqY"
              title="Rutina en Casa Para Marcar Abdominales | Solo 15 Minutos de abs" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen></iframe><br> <b> CONTRACTURA ABDOMINAL</b> <br>Aprovecha cada Sesion, Lo mejor </td>
        </tr>
      </table>
    </div>


    <section id="horarios">
      <h3>HORARIO DE CLASES</h3>
      <?php
      $tabla = '<table>';
      
      // Crear la fila de encabezado
      $tabla .= '<tr>';
      // Crear la celda vacía del encabezado
      $tabla .= '<th class="celdaPrimera"></th>';
      // Agregar las celdas del encabezado de columna (días de la semana)
      $diasSemana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado'];
      foreach ($diasSemana as $dia) {
          $tabla .= '<th>' . ucfirst($dia) . '</th>'; // Convertir la primera letra en mayúscula
      }
      // Cerrar la fila de encabezado
      $tabla .= '</tr>';

      // Agregar las filas de la tabla con los datos de servicios
      foreach ($servicios as $servicio) {
          $tabla .= '<tr>';
          // Agregar la celda del criterio de fila (nombre del servicio)
          $tabla .= '<th>' . $servicio['nombre'] . '</th>';
          // Agregar las celdas de datos
          foreach ($diasSemana as $dia) {
              $celdaDatos = '';
              if ($servicio[$dia] === "0") {
                  $celdaDatos = '<td class="sinservicio">';
                  $celdaDatos .= 'Sin servicio';
              } else if ($servicio[$dia] === "1") {
                  $celdaDatos = '<td>';
                  $rangoHoras = $servicio[$dia . '_rangoHoras'];
                  $celdaDatos .= $rangoHoras;
              }
              $celdaDatos .= '</td>';
              $tabla .= $celdaDatos;
          }
          // Cerrar la fila
          $tabla .= '</tr>';
      }

      // Cerrar la tabla
      $tabla .= '</table>';

      // Retornar el contenido de la tabla
      echo $tabla;
    ?>
    </section>
    

  </main>
  <footer id="footer">
    <div>
      <p><small>Somos Gimnasio Herculino los mejores en entrenamiento.<br>Correo:
          gimherculino05@gmail.com<br>Contacto:
          931-568-656<br>Direccion: Calle Naranjal 203 - Miraflores - Lima</small></p>
    </div>
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.5127310227854!2d-76.96973635337072!3d-12.07701059575384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c654272237ab%3A0x243239c102004611!2sC.%20El%20Naranjal%20203%2C%20Lima%2015023!5e0!3m2!1ses-419!2spe!4v1683480730650!5m2!1ses-419!2spe"
      width="450" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </footer>
  
  <script src="assets/js/script.js"> </script>

</body>

</html>