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
       
if($_SESSION['usuario']['estado'] == 1){

    if($_SESSION['usuario']['ID_rol_n'] == 1   ){
        //$_SESSION['usuario']['nom1'];
        header("location: rol/admin/iniAdmin.php");
  
        $_SESSION['message'] = " Bienvenido: Administrador ";
    
       //----------------------------------------------------------------------
       //ROL
       //Bodega
         }elseif($_SESSION['usuario']['ID_rol_n'] == 2 ){
              //$_SESSION['usuario']['nom1'];
        header("location: rol/bodega/iniBodega.php");

       $_SESSION['message'] = " Bienvenido: Inventario ";

       //----------------------------------------------------------------------
       //ROL
       //Supervisor
         }elseif($_SESSION['usuario']['ID_rol_n'] == 3){
            header("location: rol/supervisor/iniSupervisor.php");
            $us = $_SESSION['usuarion']['nom1'];
 
           $us = $_SESSION['usuarion']['nom1'];

        //----------------------------------------------------------------------
       //ROL
       //Ventas
         }elseif($_SESSION['usuario']['ID_rol_n'] == 4){
            header("location: rol/comercial/iniComercial.php");
            $_SESSION['message'] = " Bienvenido: Comercial ";

         

         //-------------------------------------------------------------------
         //ROL
         //Proveedor
      }elseif($_SESSION['usuario']['ID_rol_n'] == 5){
         header("location: rol/proveedor/iniProveedor.php");
         $_SESSION['message'] = " Bienvenido: Proveedor ";
  

         //----------------------------------------------------------------

         //ROL
         //cliente
      }elseif($_SESSION['usuario']['ID_rol_n'] == 6){
         include_once 'clases/class.usuario.php';
         $res = Usuario::verPuntosYusuario( $_SESSION['usuario']['ID_us']);
         $datos =$res->fetch_assoc();
         $_SESSION['usuario'] = $datos;
         $_SESSION['message'] = " Bienvenido: Cliente";
         header("location: rol/cliente/iniCliente.php");
      }


   }else{
      header("location: forms/cuentaIncativa.php");
   }


    
    





    
}// fin de inicio de sesion
echo " Hola soy panel de modulo: ";













?>
