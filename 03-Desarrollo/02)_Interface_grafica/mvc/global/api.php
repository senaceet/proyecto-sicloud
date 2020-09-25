<?php
// http://localhost/javier/global/appi.php?apicall=readusuarios
require_once '../controlador/Controlador.php';

// se pasan los parametros requeridos a esta funcion
function isTheseParametersAvailable($params){
   $avaible = true;
   $missingparams = '';

   foreach($params as $param){
      if(!isset($_POST[$param]) || strlen($_POST[$param]) <=0 ){
         $avaible = false;
         $missingparams = $missingparams.','.$param;
      }
   }
   // Si faltan parametros
   if(!$avaible){
      $response =[];
      $response['error'] = true;
      $response['message'] = 'Parametros:'.substr($missingparams, 1, strlen($missingparams)).'vacion'; 
      // Error de visualizacion
      echo json_encode($response);
      // detener la ejecucion adicional
      die();
   }
}

   //Una matriz que muestra la respuesta de la api
   $response = [];

   /*
   Si se trata de una llamada api
   que significa que un parameetro get llamado se establece una URL
   y con estos parametros estamos concluyendo que es una llamada api
   */

if(isset($_GET['apicall'])){
   // Aqui van todos los llamados de la api
   switch ($_GET['apicall']) {
      // Opcion crear usuarios
      case 'createusuario':
      // Primero haremos la verificacion de parametros.
      isTheseParametersAvailable(  [ 'ID_us','nom1','nom2', 'ape1', 'ape2','fecha', 'pass', 'foto', 'correo','FK_tipo_doc' ]  );
      $db = new ControllerDoc();
      $result = $db->createUsuariosController(
         $_POST['ID_us'], 
         $_POST['nom1'],
         $_POST['nom2'],
         $_POST['ape1'],
         $_POST['ape2'],
         $_POST['fecha'],    
         $_POST['pass'],
         $_POST['foto'],
         $_POST['correo'],
         $_POST['FK_tipo_doc']
      );  
      if($result){
         //esto significa que no hay ningun error
         $response['error'] = false;
         //Mensaje que ejecuto correctamente 
         $response['message'] = 'Usuario agregado correctamente';
         $response['contenido'] = $db->readUsuariosController(
            $_POST['ID_us'], 
            $_POST['nom1'],
            $_POST['nom2'],
            $_POST['ape1'],
            $_POST['ape2'],
            $_POST['fecha'],    
            $_POST['pass'] 
         );  
      }else{
         $response['error']   = true;
         $response['message'] = 'ocurrio un error, intenta nuevamente';
      }
      break;
      case 'readusuario';
         $db = new ControllerDoc();
         $response['error'] = false;
         $response['message'] = 'Solicitud completada correctamente';
         $response['contenido'] = $db->readUsuariosController();
      break;
      case 'elimianarUsuario';
         $db = new ControllerDoc();
         $bool =   $db->eliminarUsuario($_GET['id'] );
         if( $bool ){
           $response['error'] = false;
           $response['message'] = 'Elimino usuario';
         }else{
           $response['error'] = true;
           $response['message'] = 'No elimino usuario';
         }
      break;        
      case 'actualizarUsuario';
         $db = new ControllerDoc();
         $array =
         [  
         $_POST['ID_us'], 
         $_POST['nom1'],
         $_POST['nom2'],
         $_POST['ape1'],
         $_POST['ape2'],
         $_POST['fecha'],    
         $_POST['pass' ],
         $_POST['foto' ],    
         $_POST['correo'],
         $_POST['FK_tipo_doc'], 
         ];
         $bool =   $db->actualizarDatosUsuario($_GET['id'], $array );
         if( $bool ){
           $response['error'] = false;
           $response['message'] = 'Actualizo usuario';
         }else{
           $response['error'] = true;
           $response['message'] = 'No elimino usuario';
         }
      break;
      case 'loginusuario':
         isTheseParametersAvailable( ['nDoc', 'pass', 'tDoc'] );
         $db = new ControllerDoc();
         $result = $db->loginUsuarioController(
            $_POST['nDoc'],
            $_POST['pass'],
            $_POST['tDoc']);
         if(!$result){
            $response['error']      = true;
            $response['menssage']   = 'credenciales no validas';
         }else{
            $response['error']      = false;
            $response['message']    = 'Bienvenido'; 
            $response['contenido']  = $result;
         }
      break;
      default:
      $response['error']      = true;
      $response['message']    = 'ingreso a api "no esta en ningun metodo"'; 
      break;
   }
}else{
   // Si no es un api el que se estaq invocando
   // Empujar los valores apropiados en la consulta json
   $response['message'] = 'Llamado invalido del api';
}
echo json_encode($response);
