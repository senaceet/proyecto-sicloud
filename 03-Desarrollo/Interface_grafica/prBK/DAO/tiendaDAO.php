<?php

include_once '../../session/sessiones.php';
include_once './metodosDAO.php';
 echo print_r ($_SESSION['usuario']);

include_once './metodosDAO.php';
$op = $_REQUEST['op'];

switch ($op){
    case 1:
        unset($_SESSION['lista']);
        $objMetodo = new Tienda;
        $lista=$objMetodo->listaProductos();
        $_SESSION['lista']=$lista;
        header("Location: ../vistas/Catalogo.php");
        break;
    case 2;
        break; 


}




?>