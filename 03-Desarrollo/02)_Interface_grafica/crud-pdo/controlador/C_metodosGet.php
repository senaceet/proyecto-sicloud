<?php

include_once '../modelo/class.medida.php';
echo '<pre>';
var_dump($_GET);
var_dump($_FILES);
echo '</pre>';



//C_metodosGet.php?accion=eliminarMedida&&id

if($_GET['accion'] == 'eliminarMedida'){
    $medida=Medida::ningunDato();
    $medida->eliminarMedida($_GET['id']);
    header("location: ../V_medida.php");
  


}

