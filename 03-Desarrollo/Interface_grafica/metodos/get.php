
<?php
include_once '../clases/class.empresa.php';
include_once '../clases/class.conexion.php';
include_once '../clases/class.categoria.php';
include_once '../clases/class.producto.php';
include_once '../clases/class.usuario.php';
include_once '../clases/class.rol.php';
include_once '../clases/class.medida.php';
include_once '../clases/class.error.php';
//---------------------------------------------------------------

if ((isset($_GET['id'])) && (isset($_GET['accion']))) {

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
        Empresa::eliminarEmpresa($id);
    }


    //--------------------------------------------------------------------
    //CATEGORIA
    //Eliminar
    if ($_GET['accion'] == 'eliminarCategoria') {
        include_once '../session/sessiones.php';
        echo 'estoy en accion eliminar categoria';
        $id =  $_GET['id'];
        Categoria::eliminarCategoria($id);
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
        Usuario::activarCuenta($id);
    }

    //-------------------------------------------------------------
    // USUARIO 
    //descatvar Cuenta
    if ($_GET['accion'] == 'desactivarUsuario') {
        include_once '../session/sessiones.php';
        $id = $_GET['id'];
        Usuario::desactivarCuenta($id);
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
include_once '../session/sessiones.php';
//include_once './metodosDAO.php';
 echo print_r ($_SESSION['usuario']);

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
//-------------------------------------------------------------





?>

