<?php 
include_once 'clases/class.usuario.php';
session_start();


//------------------------------
//usuario
// accion al no iniciar sesion
if(!isset($_SESSION['usuario'])){

  // echo "No ha inciado session";
    //header('location: ../index.php');
}else{
    print_r($_SESSION['usuario']);
    // al iniciar sesion
    $_SESSION['message'] = "Login extoso";
    $_SESSION['color'] = "success";
    //----------------------------------------------------------------



   // ( == 1)??

    switch ($_SESSION['usuario']['estado']) {
         case 1:
            //----------------------------------------------------------------------  
            switch ($_SESSION['usuario']['ID_rol_n']){
               //Administrador
               case 1:
                  header( "location: rol/admin/iniAdmin.php");
               break;
               //Bodega
               case 2;
                  header("location: rol/bodega/iniBodega.php");
                break;
               //Supervisor
                case 3:
                   header("location: rol/supervisor/iniSupervisor.php");
                break;
               //Comercial
                case 4:
                   header("location: rol/comercial/iniComercial.php");
                break;
               //Proveedor
                case 5;
                   header("location: rol/proveedor/iniProveedor.php");
                break;
                case 6:
                  //Cliente
                   $res = Usuario::verPuntosYusuario( $_SESSION['usuario']['ID_us']);
                   $datos =$res->fetch_assoc();
                   $_SESSION['usuario'] = $datos;
                   header("location: rol/cliente/iniCliente.php");
                break;
               default:
               $_SESSION['message'] = " No ha exite el rol en el sistema ";
               $_SESSION['color'] = "danger";
                break;
          }
         break;  
         default:
            header("location: forms/cuentaIncativa.php");
         break;
   }
     
   


    
    





    
}// fin de inicio de sesion
//echo " Hola soy panel de modulo: ";













?>
