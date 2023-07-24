<?php

require_once 'conexion.php';
function ObtenerServicios()
{
    global $conn;
    $sql = "select * from servicios";
    $resul = $conn->query($sql);

    if ($resul->num_rows > 0) {
        $articulos = array();
        while ($row = $resul->fetch_assoc()) {
            $articulos[] = $row;
        }
        return $articulos;
    } else {
        return array();
    }
}

function ObtenerSedes()
{
    global $conn;
    $sql = "select * from sedes";
    $resul = $conn->query($sql);

    if ($resul->num_rows > 0) {
        $articulos = array();
        while ($row = $resul->fetch_assoc()) {
            $articulos[] = $row;
        }
        return $articulos;
    } else {
        return array();
    }
}

function ObtenerDepartamentos()
{
    global $conn;
    $sql = "select * from departamentos";
    $resul = $conn->query($sql);

    if ($resul->num_rows > 0) {
        $articulos = array();
        while ($row = $resul->fetch_assoc()) {
            $articulos[] = $row;
        }
        return $articulos;
    } else {
        return array();
    }
}

function ObtenerEmpleados()
{
    global $conn;
    $sql = "select * from empleados";
    $resul = $conn->query($sql);

    if ($resul->num_rows > 0) {
        $articulos = array();
        while ($row = $resul->fetch_assoc()) {
            $articulos[] = $row;
        }
        return $articulos;
    } else {
        return array();
    }
}

function ObtenerCargos()
{
    global $conn;
    $sql = "select * from cargos";
    $resul = $conn->query($sql);

    if ($resul->num_rows > 0) {
        $articulos = array();
        while ($row = $resul->fetch_assoc()) {
            $articulos[] = $row;
        }
        return $articulos;
    } else {
        return array();
    }
}

function ObtenerEspecialidad()
{
    global $conn;
    $sql = "select * from especialidad";
    $resul = $conn->query($sql);

    if ($resul->num_rows > 0) {
        $articulos = array();
        while ($row = $resul->fetch_assoc()) {
            $articulos[] = $row;
        }
        return $articulos;
    } else {
        return array();
    }
}

function obtenerEntrenadores()
{
    global $conn;
    $sql = "SELECT 
                CONCAT(em.nombres, ' ', em.a_materno, ' ', em.a_paterno) AS Nombre, 
                c.nombre AS Cargo, 
                GROUP_CONCAT(CONCAT(' ',es.nombre)) AS Especialidad
            FROM empleados em 
            INNER JOIN cargos c ON em.idCargo = c.idCargo 
            LEFT JOIN ( 
                SELECT ee.idEmpleado, s.nombre 
                FROM especialidad ee 
                INNER JOIN servicios s ON ee.idServicio = s.idServicio
            ) es ON em.idEmpleado = es.idEmpleado 
            WHERE em.idTipoEmpleado IN (3, 4) 
            GROUP BY Nombre, Cargo";

    $resul = $conn->query($sql);
    
    if ($resul->num_rows > 0) {
        $articulos = array();
        while ($row = $resul->fetch_assoc()) {
            $articulos[] = $row;
        }
        return $articulos;
    } else {
        return array();
    }
}

function agregarUsuario($nombre,$apellidos,$dni,$telefono,$email)
{
    global $conn;
    $sql = " INSERT INTO usuario
            (nombre,apellidos,dni,telefono,email, activo)
            VALUES
            ('$nombre','$apellidos', '$dni', '$telefono','$email',1)";
    $conn->query($sql);
}

function editarUsuario($nombre,$apellidos,$dni,$telefono,$email,$idUsuario)
{
    global $conn;
    $sql = " UPDATE usuario SET nombre= '$nombre', apellidos ='$apellidos', dni='$dni', telefono = '$telefono', email = '$email'
            WHERE idUsuario=$idUsuario";
    $conn->query($sql);
}

function logearse($usuario,$contra)
{
    global $conn;
    $sql = "SELECT * FROM empleados WHERE usuario = '$usuario' and contra ='$contra'";

    $resul = $conn->query($sql);
    
    if ($resul->num_rows > 0) {
        $articulos = array();
        while ($row = $resul->fetch_assoc()) {
            $articulos[] = $row;
        }
        return $articulos;
    } else {
        return array();
    }
}

function obtenerUsuarios()
{
    global $conn;
    $sql = "SELECT * FROM usuario";

    $resul = $conn->query($sql);
    
    if ($resul->num_rows > 0) {
        $articulos = array();
        while ($row = $resul->fetch_assoc()) {
            $articulos[] = $row;
        }
        return $articulos;
    } else {
        return array();
    }
}
function obtenerUsuario($idUsuario)
{
    global $conn;
    $sql = "SELECT * FROM usuario where idUsuario = '$idUsuario'";

    $resul = $conn->query($sql);
    
    if ($resul->num_rows > 0) {
        $articulos = array();
        while ($row = $resul->fetch_assoc()) {
            $articulos[] = $row;
        }
        return $articulos;
    } else {
        return array();
    }
}


if(isset($_POST["op"]) && $_POST["op"] == "obtenerSedes"){
    $jsonDatos = ObtenerSedes();
    header('Content-Type: application/json');
    echo json_encode($jsonDatos);
}

if(isset($_POST["op"]) && $_POST["op"] == "registrarUsuario"){
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $pregunta1Select = $_POST["pregunta1Select"];
    $pregunta2Select = $_POST["pregunta2Select"];
    $pregunta3Select = $_POST["pregunta3Select"];

    agregarUsuario($nombre,$apellidos,$dni,$telefono,$email);
    echo 1;
}

if(isset($_POST["op"]) && $_POST["op"] == "editarUsuario"){
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $idUsuario = $_POST["idUsuario"];

    editarUsuario($nombre,$apellidos,$dni,$telefono,$email,$idUsuario);
    echo 1;
}

if(isset($_POST["op"]) && $_POST["op"] == "logearse"){
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];
    $jsonDatos = logearse($usuario, $contra);
    if(count($jsonDatos) > 0){
        $_SESSION['nombreUsuario'] = $jsonDatos[0]['nombres'] . " " . $jsonDatos[0]['a_paterno'] . " " . $jsonDatos[0]['a_materno'];
        $_SESSION['cargo'] = $jsonDatos[0]['idCargo'];
        $_SESSION['usuario'] = $jsonDatos[0]['usuario'];
        $_SESSION['contra'] = $jsonDatos[0]['contra'];
        $_SESSION['idEmpleado'] = $jsonDatos[0]['idEmpleado'];
    }
    header('Content-Type: application/json');
    echo json_encode($jsonDatos);
}