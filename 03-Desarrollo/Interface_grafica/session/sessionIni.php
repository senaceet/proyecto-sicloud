<?php 
session_start();

//--------------------------------
//mensaje
if(isset($_SESSION['message'])){
//print_r( $_SESSION['message']);
}
//    CONTROL DE INGESO POR ROL
//------------------------------
//usuario
// accion al no iniciar sesion
if(!isset($_SESSION['usuario'])){

   echo "No ha inciado session";
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
  
        $_SESSION['message'] = " Bienvenido: Administrador ";
    
       //----------------------------------------------------------------------
       //ROL
       //Bodega
         }elseif($_SESSION['usuario']['ID_rol_n'] == 2 ){
            echo "hola estoy en inicio Bodega";
              //$_SESSION['usuario']['nom1'];
        header("location: rol/bodega/iniBodega.php");

       $_SESSION['message'] = " Bienvenido: Inventario ";

       //----------------------------------------------------------------------
       //ROL
       //Supervisor
         }elseif($_SESSION['usuario']['ID_rol_n'] == 3){
            echo "hola estoy en inicio Supervisor";
            header("location: rol/supervisor/iniSupervisor.php");
            $us = $_SESSION['usuarion']['nom1'];
 
           $us = $_SESSION['usuarion']['nom1'];

        //----------------------------------------------------------------------
       //ROL
       //Ventas
         }elseif($_SESSION['usuario']['ID_rol_n'] == 4){
            echo "hola estoy en inicio Comercial";
            header("location: rol/comercial/iniComercial.php");
            $_SESSION['message'] = " Bienvenido: Comercial ";

         

         //-------------------------------------------------------------------
         //ROL
         //Proveedor
      }elseif($_SESSION['usuario']['ID_rol_n'] == 5){
         echo "hola estoy en inicio Comercial";
         header("location: rol/proveedor/iniProveedor.php");
         $_SESSION['message'] = " Bienvenido: Proveedor ";
  

         //----------------------------------------------------------------
         //ROL
         //Supervisor
      }elseif($_SESSION['usuario']['ID_rol_n'] == 6){
         echo "hola estoy en inicio Comercial";
         header("location: rol/supervisor/iniSupervisor.php");
         $_SESSION['message'] = " Bienvenido: Proveedor ";


         //------------------------------------------------------------
         //ROL
         //cliente
      }elseif($_SESSION['usuario']['ID_rol_n'] == 7){
         echo "hola estoy en inicio Comercial";
         header("location: rol/cliente/iniCliente.php");
         $_SESSION['message'] = " Bienvenido: Proveedor ";
      }


    


    
    





    
}// fin de inicio de sesion
echo " Hola soy panel de modulo: ";













?>
