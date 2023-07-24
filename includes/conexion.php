<?php

$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'gymherculino';

$conn= new mysqli($servidor,$usuario,$password,$basededatos);

if($conn->connect_error){
    die("Error en la conexion:" . $conn->connect_error);
}

$conn->query("SET NAMES 'utf8'");

if(!isset($_SESSION)){
    session_start();
}

?>