
<?php
include_once '../clases/class.empresa.php';
include_once '../clases/class.conexion.php';


if( (isset($_GET['id'])) && (isset($_GET['accion'])) ){

//accion editar 
if($_GET['accion'] == 'editarMedida'  ){
    echo "estoy en editar medida";



}// fin de accion editar



if($_GET['accion'] == 'eliminarMedida'){
echo "estoy en eliminar medida";
$id = $_GET['id'];
Medida::eliminarDatosMedia($id);
}



if($_GET['accion'] == 'eliminarEmpresa'){
echo "estoy en accion eliminar empresa";
$id = $_GET['id'];
Empresa::eliminarEmpresa($id);
}





}// fin de isset accion y id







?>

