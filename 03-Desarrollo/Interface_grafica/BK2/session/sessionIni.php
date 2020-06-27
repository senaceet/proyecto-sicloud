<?php 
session_start();

//--------------------------------
//mensaje
if(isset($_SESSION['message'])){
//print_r( $_SESSION['message']);
}

//------------------------------
//usuario
// accion al no iniciar sesion
if(!isset($_SESSION['usuario'])){
   echo "No a iniciado sesion";
    //header('location: ../index.php');
}else{
    print_r($_SESSION['usuario']);
    // al iniciar sesion
    $_SESSION['message'] = "Login extoso";
    $_SESSION['color'] = "success";
    //----------------------------------------------------------------


//-------------------------------------------------------------------
//Usuario
//rol
    if($_SESSION['usuario']['ID_rol_n'] == 1  ){
        //$_SESSION['usuario']['nom1'];
        header("location: rol/admin/iniAdmin.php");
         $us = $_SESSION['usuarion']['nom1'];
        $_SESSION['message'] = " Bienvenido: Administrador ";
    
    
        echo "hola estoy en inicio admin";
         }//fin de redireccion a modulo usuario
    
    
    
    





    
}// fin de inici de sesion
echo " Hola soy panel de modulo: ";













?>