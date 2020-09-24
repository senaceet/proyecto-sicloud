
<?php

include_once '../modelo/class.documento.php';
include_once '../modelo/class.usuario.php';
include_once '../modelo/class.rol.php';

class ControllerDoc{
    public $obModDoc;
    public $objModUs;
    public $objModRol;

    public function __construct()
    {
        $this->obModDoc  =   Documento::ningunDatoD();
        $this->objModUs   =  Usuario::ningunDato();
        $this->objModRol  =  Rol::ningunDato();
    }

    public function selectDocumento(){
        return $this->objModDoc->verDocumeto();
    }

    public function verRol(){
        return $this->objModRol->verRol();
    }




     public function loginUsuarioController($ID_us,  $pass, $doc){
        $datosController[] = [
            0         => $ID_us,
            1         => $pass,
            2         => $doc
        ];
        return $respuesta = $this->objModUs->loginUsuarioModel($datosController);
    } 


    public function createUsuariosController(
        $ID_us, $nom1, $nom2, $ape1, $ape2, $fecha, $pass, $foto, $correo, $FK_tipo_doc ){
        $datosController[] = [
                 0         =>  $ID_us,
                 1         =>  $nom1,
                 2         =>  $nom2,
                 3         =>  $ape1,
                 4         =>  $ape2,
                 5         =>  $fecha,
                 6         =>  $pass,
                 7         =>  $foto,
                 8         =>  $correo,
                 9         =>  $FK_tipo_doc
        ];
        return $respuesta = $this->objModUs->InsertUsuario($datosController, 'usuario');
    }
        

    public function readUsuariosController(){
        $respuesta = $this->objModUs->readUsuarioModel('vendedor');
            return $respuesta;
    }

    

    }

    if(isset($_GET['action']) && $_GET['action'] == 'login'){
        $instanciacontrolador = Usuario::ningunDato();
        $instanciacontrolador->LoginVista();
    }
    
    if(isset($_GET['accion']) && $_GET['accion'] == 'insert'){
        $instanciacontrolador = Usuario::ningunDato();
        $instanciacontrolador->InsertVista();
    }

    







/*

//include_once '../clases/class.empresa.php';
//include_once '../clases/class.conexion.php';
//include_once '../clases/class.categoria.php';
//include_once '../clases/class.producto.php';
//include_once '../clases/class.usuario.php';
//include_once '../clases/class.rol.php';
//include_once '../clases/class.medida.php';
//include_once '../clases/class.error.php';
//$us = Usuario::ningunDato();

*/

//---------------------------------------------------------------

if ((isset($_GET['id'])) && (isset($_GET['accion']))) {

    //-------------------------------------------------------------------- 
    //USUARIO
    if ($_GET['accion'] == 'eliminarUsuario') {
        echo 'estoy en accion eliminar usuario';
        $id =  $_GET['id'];
        $objCon = Usuario::ningunDato();
        $objCon->eliminarUsuario($id);
    }
    



}
    //--------------------------------------------------------------------

/*
    //-------------------------------------------------------------------- 
    //MEDIDA   
    if ($_GET['accion'] == 'eliminarMedida') {
        include_once '../session/sessiones.php';
        // echo "estoy en eliminar medida";
        $id = $_GET['id'];
        Medida::eliminarDatosMedia($id);
    }

    //--------------------------------------------------------------------
    //EMPRESA
    //Eliminar
    if ($_GET['accion'] == 'eliminarEmpresa') {
        include_once '../session/sessiones.php';
        echo "estoy en accion eliminar empresa";
        $id = $_GET['id'];
        $objCon = Empresa::ningunDatoP();
        $objCon->eliminarEmpresa($id);

    }


    //--------------------------------------------------------------------
    //CATEGORIA
    //Eliminar
    if ($_GET['accion'] == 'eliminarCategoria') {
        include_once '../session/sessiones.php';
        echo 'estoy en accion eliminar categoria';
        $id =  $_GET['id'];
        $objCon = Categoria::ningunDatoC();
        $objCon->eliminarCategoria($id);
    }


    //----------------------------------------------------------------
    //PRODUCTO
    //Eliminar
    if ($_GET['accion'] == 'EliminarProducto') {
        include_once '../session/sessiones.php';
        $id = $_GET['id'];
        $producto =  Producto::eliminarProducto($id);
        Producto::eliminarProducto($id);
    }


    //-------------------------------------------------------------
    // USUARIO 
    //Aprobar Cuenta
    if ($_GET['accion'] == 'aprobarUsuario') {
        include_once '../session/sessiones.php';
        $id = $_GET['id'];
        $us->activarCuenta($id);
    }

    //-------------------------------------------------------------
    // USUARIO 
    //descatvar Cuenta
    if ($_GET['accion'] == 'desactivarUsuario') {
        include_once '../session/sessiones.php';
        $id = $_GET['id'];

     //   $us= Usuario::ningunDato();
        $us->desactivarCuenta($id);
    }


    //-----------------------------------------------------------
    //ROL
    if ($_GET['accion'] == 'eliminarRol') {
        include_once '../session/sessiones.php';
        $id = $_GET['id'];
        Rol::eliminarRol($id);
    }


    //-------------------------------------------------------------------------
    //ERROR
    //Eliminar
    if ($_GET['accion'] == 'eliminarError') {
        $id = $_GET['id'];
        ErrorLog::eliminarErrorLog($id);
    }







//-------------------------------------------------------------
// Ver factura = vista = ComprasUsuarios.php
//../metodos/get.php?accion=verFactura

if( $_REQUEST['accion'] == 'verFactura'){
    echo "Estoy en ver factura";
     $id =  $_REQUEST['id'];
    // header("Location: ../ajax/includes/factura.php?u=$id");
    header("Location: ../ajax/showFactura.php?u=$id");
              
                



}

//-------------------------------------------------------------









} // fin de isset accion y id



//----------------------------------------------
//SESSION
//cerrar sesion








//-----------------------------------------------------------------


if (isset($_GET['cerrarSesion'])) {

    //include_once 'cerrar.php';
    //include_once 'sessiones.php';

    if (isset($_SESSION['usuario'])) {
        session_unset();
        session_destroy();
    }
    session_start();
    $_SESSION['message'] = "Cerro sesion";
    $_SESSION['color'] = "primary";
    header("location: ../index.php");
    $_SESSION['message'] = "Cerro sesion";
    echo "cerro sesion";
}



// Lista de productos en pantalla
//-----------------------------------------------------------
//include_once '../session/sessiones.php';
//include_once './metodosDAO.php';
 //echo print_r ($_SESSION['usuario']);


 if(isset($_GET['ops'])){
$op = $_REQUEST['ops'];
switch ($op){
    case 1:
        unset($_SESSION['lista']);
        $lista=    $objMetodo =Producto::listaProductosImg();
       
        $_SESSION['lista']=$lista;
        header("Location: ../Catalogo.php");
        break;
    case 2;
        break; 

    }
}





//$objMod = Rol::ningunDato();






//-------------------------------------------------------------




// $objCon = new ControllerDoc();
// // $d = $objCon->verRol();
// echo '<pre>';  print_r($d); echo '</pre>'; die();   

*/

?>