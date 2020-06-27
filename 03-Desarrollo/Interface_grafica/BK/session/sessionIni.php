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


       //----------------------------------------------------------------------
       //ROL
       //Administrador
       
    if($_SESSION['usuario']['ID_rol_n'] == 1  ){
        echo "hola estoy en inicio admin";
        //$_SESSION['usuario']['nom1'];
        header("location: rol/admin/iniAdmin.php");
         $us = $_SESSION['usuarion']['nom1'];
        $_SESSION['message'] = " Bienvenido: Administrador ";
    
       //----------------------------------------------------------------------
       //ROL
       //Bodega
         }elseif($_SESSION['usuario']['ID_rol_n'] == 2 ){
            echo "hola estoy en inicio Bodega";
              //$_SESSION['usuario']['nom1'];
        header("location: rol/bodega/iniBodega.php");
        $us = $_SESSION['usuarion']['nom1'];
       $_SESSION['message'] = " Bienvenido: Inventario ";

       //----------------------------------------------------------------------
       //ROL
       //Supervisor
         }elseif($_SESSION['usuario']['ID_rol_n'] == 3){
            echo "hola estoy en inicio Supervisor";
            header("location: rol/supervisor/iniSupervisor.php");
            $us = $_SESSION['usuarion']['nom1'];
           $_SESSION['message'] = " Bienvenido: Supervisor ";
           $us = $_SESSION['usuarion']['nom1'];

        //----------------------------------------------------------------------
       //ROL
       //Ventas
         }elseif($_SESSION['usuario']['ID_rol_n'] == 4){
            echo "hola estoy en inicio Comercial";
            header("location: rol/comercial/iniComercial.php");
            $us = $_SESSION['usuarion']['nom1'];
            $_SESSION['message'] = " Bienvenido: Comercial ";
            $us = $_SESSION['usuarion']['nom1']; 
         }
    


    
    





    
}// fin de inici de sesion
echo " Hola soy panel de modulo: ";













?>