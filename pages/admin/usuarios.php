<?php
  require_once '../../includes/helpers.php';

  $data  = obtenerUsuarios();
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
        <?php
        // Obtener las columnas
        $columns = ['ID','Nombres','Apellidos', 'DNI', 'Telefono','Correo', 'Acción'];
        $columnsMostrar= ['idUsuario','nombre','apellidos', 'dni', 'telefono','email', 'Opciones'];
        // Imprimir el encabezado de la tabla
        echo '<table>';
        echo '<tr>';
        foreach ($columns as $column) {
            echo '<th>' . $column . '</th>';
        }
        echo '</tr>';

        // Imprimir las filas de la tabla con los datos del JSON
        foreach ($data as $row) {
            echo '<tr>';
            foreach ($columnsMostrar as $column) {
                if ($column === 'Opciones') {
                    // Columna de opciones con botones (Editar y Eliminar en este ejemplo)
                    echo '<td>';
                    echo '<a href="editarUsuario.php?idUsuario=' . $row['idUsuario'] . '">Editar</a>';
                    echo '<a href="eliminarUsuario.php?idUsuario=' . $row['idUsuario'] . '">Eliminar</a>';
                    echo '</td>';
                } else {
                    echo '<td>' . (isset($row[$column]) ? $row[$column] : '') . '</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </div>
  </main>
</body>

</html>