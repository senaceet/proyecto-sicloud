<?php


include_once '../clases/class.login.php';
include_once 'sessiones.php';

echo "Soy index en modulos";

if(isset($_POST['btnLogin'])){
    $ID_us =($_POST['nDoc']);
   $pass=($_POST['pass']);


   // include 'classes/class.conexion.php';
   $res = Login::DocPass($ID_us, $pass);



     
    
    //}
    //session_start();

    if ($res->num_rows == 0 ){
    $_SESSION['message'] = "Usuario o contraseña incorrecta";  $_SESSION['color'] = "danger";
    header("location: ../index.php");   
   }else{
    $_SESSION['message'] = "Bienvenido...";  $_SESSION['color'] = "success";  
    $datos = $res->fetch_assoc();
    $_SESSION['usuario'] = $datos;
   /// header("../index.php ");
   header('location: ../CU014-home.php');
    

   // echo json_encode(array('error' => false, 'tipo' => $datos[])) 
    }

  


   // header("location:CU014-home.php ");
   }



?>

