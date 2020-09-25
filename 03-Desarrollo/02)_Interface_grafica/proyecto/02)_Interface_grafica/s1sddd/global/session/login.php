<?php
include_once '../clases/class.usuario.php';
include_once '../session/sessionIni.php';


function capturaDatosLogin(){
    $ID_us = ($_POST['nDoc']);
    $pass = ($_POST['pass']);
    $doc = $_POST['tDoc'];
    $us = Usuario::ningunDato();
    $res = $us->DocPass($ID_us, $pass, $doc);
    return $res;
}

function contrasenaIncorrecta(){
    $_SESSION['message'] = "Usuario o contraseña incorrecta";
    $_SESSION['color'] = "danger";
    header("location: ../index.php#formlogin");
}

function capturaDatosSessionInicio($res){
    $datos = $res->fetch_assoc();
    $_SESSION['usuario'] = $datos;
    header("location: ../index.php");
}



//-------------------------------------------------------------------
//LOGIN
//compruba contraseña y almacena sesion de usuario
if (isset($_POST['btnLogin'])) {
    $res = capturaDatosLogin();
    ($res->num_rows == 0) ? contrasenaIncorrecta() : capturaDatosSessionInicio($res);
}//fin de comprobacion de login