<?php
require 'class.usuario.php';

//Llamar datos del formulariopor post
if(isset($_POST['id'])&&(isset($_POST['nombre'])&&(isset($_POST['rol'])))){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $rol = $_POST['rol'];}
//-------------------------------------------------------------------------

//Crear objeto de la clase usuario
$usuario = new Usuario($id, $nombre, $rol );
session_start();
//--------------------------------------------------------------------------

//Guarda datos de la varible usuario en $_SESSION
$_SESSION['usuario'] = $usuario;
header ("Location: while.php");// Direcciona a while

?>