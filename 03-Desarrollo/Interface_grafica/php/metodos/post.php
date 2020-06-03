<?php
//include 'class.producto.php'; 
include '../clases/class.medida.php';
include_once '../clases/class.producto.php';
include_once '../clases/class.empresa.php';


if(isset($_POST['submit'] )){

if($_POST['accion'] == 'insertUsuario'){

    //-----------------------------------------
    //DATOS CAPTURADOS PARA INSERSION EN LA TABLA PRODUCTO
    $ID_prod = $_POST['ID_prod'];
    $nom_prod = $_POST['nom_prod'];
    $val_prod = $_POST['val_prod'];
    $stok_prod = $_POST['stok_prod'];
    $estado_prod = $_POST['estado_prod'];
    $CF_categoria = $_POST['CF_categoria'];
    $CF_tipo_medida = $_POST['CF_tipo_medida'];

    //----------------------------------------
    //echo print_r($_POST);

    // paso de valores al constructor
    $producto = new Producto( $ID_prod, $nom_prod,  $val_prod, $stok_prod, $estado_prod, $CF_categoria, $CF_tipo_medida );
    echo print_r($producto);
    //Ejecuto el metodo
    $producto->insertarProducto();

}// fin de usario

//-------------------------------------------------------------------------------------------------------------

///POST DE MEDIDA





if($_POST['accion'] == 'insertMedida'){
    //capturo los datos
    $nom_medida = $_POST['nom_medida'];
    $nom_prod = $_POST['acron_medida'];

    //estancio objeto de clase medida
    $medida = new Medida($nom_medida, $nom_prod);
    $medida->insertMedia();
}//fin de insertar medida


IF($_POST['accion'] == 'insertUdateEmpresa')
    echo 'estoy en insert empresa ';
    $ID_rut = $_POST['ID_rut'];
    $nom_empresa = $_POST['nom_empresa'];
    $empresa = new Empresa( $ID_rut, $nom_empresa );
    $empresa->insertEmpresa();


}else{  echo "<script>alert('Estas ingresando por url, ingresa de manera incorrecta att Javier');</script>";  echo "<script>window.location.replace('formMedida.php');</script>";  }  //fin de if de submit




?>