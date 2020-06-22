<?php



include_once '../clases/class.usuario.php';
include_once '../session/sessionIni.php';


echo "Soy index en modulos";


//-------------------------------------------------------------------
//LOGIN
//compruba contraseña y almacena sesion de usuario
if(isset($_POST['btnLogin'])){
    $ID_us =($_POST['nDoc']);
   $pass=($_POST['pass']);
   $doc = $_POST['tDoc'];


   $res = Usuario::DocPass($ID_us, $pass, $doc);

    if ($res->num_rows == 0 ){
    $_SESSION['message'] = "Usuario o contraseña incorrecta";  $_SESSION['color'] = "danger";
    header("location: ../index.php");   
   }else{
    $_SESSION['message'] = "Bienvenido...";  $_SESSION['color'] = "success";  
    $datos = $res->fetch_assoc();
    $_SESSION['usuario'] = $datos;
   /// header("../index.php ");
   header('location: ../index.php');
   // echo json_encode(array('error' => false, 'tipo' => $datos[])) 
    }//fin de if comprobacion de logion  

  



 
 }//fin de comprobacion de login