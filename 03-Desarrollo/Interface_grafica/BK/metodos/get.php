
<?php
include_once '../clases/class.empresa.php';
include_once '../clases/class.conexion.php';
include_once '../clases/class.categoria.php';
include_once '../clases/class.producto.php';
include_once '../clases/class.usuario.php';
include_once '../clases/class.rol.php';
include_once '../clases/class.medida.php';
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


   
} // fin de isset accion y id



 //----------------------------------------------
    //SESSION
    //cerrar sesion








//-----------------------------------------------------------------


if(isset($_GET['cerrarSesion'])){

    include_once 'cerrar.php';
    include_once 'sessiones.php';
    $_SESSION['message'] = "Cerro sesion";
    echo "cerro sesion";

    

}








?>

