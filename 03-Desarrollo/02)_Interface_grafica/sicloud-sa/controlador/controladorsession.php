<?php
define("KEY", "proyectoSicloud");
define("COD", "AES-128-ECB");
$obj =new Session();

class Session{
   public $obj;


   static function ningunDato(){
      return new self ();
   }

   public function inicioSesion(){
      if(!isset($_SESSION['usuario']) ){
         session_start();
      }
   }

   public function cerrarSesion(){
      $_SESSION['message']= "Cerro sesion"; $_SESSION['color'] = "primary";
      session_unset();
      session_destroy();
      echo '<script>alert("cerro sesion")</script>';
   }


   public function desencriptaSesion(){
      $aV['usuario']['ID_us']         =  openssl_decrypt( $_SESSION['usuario']['ID_us'], COD, KEY); 
      $aV['usuario']['nom1']          =  openssl_decrypt( $_SESSION['usuario']['nom1'], COD, KEY);
      $aV['usuario']['nom2']          =  openssl_decrypt( $_SESSION['usuario']['nom2'], COD, KEY);
      $aV['usuario']['ape1']          =  openssl_decrypt( $_SESSION['usuario']['ape1'], COD, KEY);
      $aV['usuario']['ape2']          =  openssl_decrypt( $_SESSION['usuario']['ape2'], COD, KEY);
      $aV['usuario']['fecha']         =  openssl_decrypt( $_SESSION['usuario']['fecha'], COD, KEY); 
      $aV['usuario']['pass']          =  openssl_decrypt( $_SESSION['usuario']['pass'], COD, KEY);
      $aV['usuario']['foto']          =  openssl_decrypt( $_SESSION['usuario']['foto'], COD, KEY);
      $aV['usuario']['correo']        =  openssl_decrypt( $_SESSION['usuario']['correo'], COD, KEY); 
      $aV['usuario']['FK_tipo_doc']   =  openssl_decrypt( $_SESSION['usuario']['FK_tipo_doc'], COD, KEY);  
      $aV['usuario']['ID_acronimo']   =  openssl_decrypt( $_SESSION['usuario']['ID_acronimo'], COD, KEY);  
      $aV['usuario']['estado']        =  openssl_decrypt( $_SESSION['usuario']['estado'], COD, KEY); 
      $aV['usuario']['ID_rol_n']      =  openssl_decrypt( $_SESSION['usuario']['ID_rol_n'], COD, KEY); 
      $aV['usuario']['nom_rol']       =  openssl_decrypt( $_SESSION['usuario']['nom_rol'], COD, KEY);
      if(isset( $_SESSION['usuario']['puntos'] )){
         $aV['usuario']['puntos']      =  openssl_encrypt( $USER['puntos'], COD, KEY); 
      }
      return $aV;
   }


   public function verificarAcceso(){
      $aV = $this->desencriptaSesion();
      //ROL
      //Administrador 
      if($aV['usuario']['estado'] == 1){
         switch ($aV['usuario']['ID_rol_n']) {
            case 1:
               header('location: ../vista/rol/admin/iniAdmin.php');
               $_SESSION['message'] = ' Bienvenido: Administrador';
               $_SESSION['color']   = 'success';
              
            break;
            case 2:
               header("location: ../vista/rol/bodega/iniBodega.php");
               $_SESSION['message'] = ' Bienvenido: Inventario';
               $_SESSION['color']   = 'success';
            break;
            case 3:
               echo '<h1> Esta en el caso 3 de session </h1>';
               header("location: ../vista/rol/supervisor/iniSupervisor.php");
               $_SESSION['message'] = ' Bienvenido: Supervisor';
               $_SESSION['color']   = 'success';
            break;
            case 4:
               header("location: ../vista/rol/comercial/iniComercial.php");
               $_SESSION['message'] = ' Bienvenido: Inventario';
               $_SESSION['color']   = 'success';
            break;
            case 5:
               header("location: ../vista/rol/proveedor/iniProveedor.php");
               $_SESSION['message'] = 'Bienvenido: Proveedor';
               $_SESSION['color']   = 'success';
            break;
            case 6:
                $id = openssl_decrypt( $_SESSION['usuario']['ID_us'], COD, KEY); 
               include_once './controladorrutas.php';
               rutConCliente();
               $objCon     =  new  ControllerDoc();
               $datos =  $objCon->verPuntosYusuario( $id );
             
               $_SESSION['usuario'] =  $this->encriptaSesion($datos);
               $_SESSION['message'] = 'Bienvenido: Cliente';
               $_SESSION['color']   = 'success';
               header("location: ../vista/rol/cliente/iniCliente.php");
            break; 
            default:
               $_SESSION['message'] = 'Usuario no registrado';
               $_SESSION['color']   = 'danger';
               header("location: ../vista/index.php");
               echo '<script>alert("Usuario no registrado")</script>';
            break;
         }
      }else{
         header("location: ../vista/cuentaInactiva.php");
      }
   }

   public function validarSesion(){
      if(!isset($_SESSION['usuario'])){
            echo "<script>alert('credenciales incorrectas');</script>"; echo "<script>window.location.replace('../vista/index.php');</script>" ;
      }
      $aV = $this->desencriptaSesion();
      if( $aV['usuario']['estado']===0){
         echo "<script>alert('Su cuenta esta desactivada, no tiene permiso para ingresar a este modulo');</script>"; 
         header("location: ../vista/cuentaInactiva.php");
      }
   }


   public function encriptaSesion($USER){
      $_SESSION['usuario']['ID_us']         =  openssl_encrypt( $USER['ID_us'], COD, KEY); 
      $_SESSION['usuario']['nom1']          =  openssl_encrypt( $USER['nom1'], COD, KEY); 
      $_SESSION['usuario']['nom2']          =  openssl_encrypt( $USER['nom2'], COD, KEY); 
      $_SESSION['usuario']['ape1']          =  openssl_encrypt( $USER['ape1'], COD, KEY); 
      $_SESSION['usuario']['ape2']          =  openssl_encrypt( $USER['ape2'], COD, KEY); 
      $_SESSION['usuario']['fecha']         =  openssl_encrypt( $USER['fecha'], COD, KEY); 
      $_SESSION['usuario']['pass']          =  openssl_encrypt( $USER['pass'], COD, KEY); 
      $_SESSION['usuario']['foto']          =  openssl_encrypt( $USER['foto'], COD, KEY); 
      $_SESSION['usuario']['correo']        =  openssl_encrypt( $USER['correo'], COD, KEY); 
      $_SESSION['usuario']['FK_tipo_doc']   =  openssl_encrypt( $USER['FK_tipo_doc'], COD, KEY); 
      $_SESSION['usuario']['ID_acronimo']   =  openssl_encrypt( $USER['ID_acronimo'], COD, KEY); 
      $_SESSION['usuario']['estado']        =  openssl_encrypt( $USER['estado'], COD, KEY); 
      $_SESSION['usuario']['ID_rol_n']      =  openssl_encrypt( $USER['ID_rol_n'], COD, KEY); 
      $_SESSION['usuario']['nom_rol']       =  openssl_encrypt( $USER['nom_rol'], COD, KEY);
      if(isset( $USER['usuario']['puntos'] )){
         $_SESSION['usuario']['puntos']     =  openssl_encrypt( $USER['puntos'], COD, KEY); 
      }
      
      return $_SESSION['usuario'];
   }

   




}

$obj->inicioSesion();
//$obj->validarSesion();

if(isset($_GET['cerrar']) ){

   $obj->cerrarSesion();
   switch ($_GET['cerrar']) {
      case 1:
         header("location: ../index.php");
      break;
      case 2:
         header("location: ../index.php");
      break;
      case 3:
         header("location: ../index.php");
      break;

      default:

      break;
   }
}





?>