<?php
include_once '../../clases/class.conexion.php';
include_once '../../clases/class.ciudad.php';
include_once '../../clases/class.barrio.php';

$id_localidad = $_POST['id_localidad'];
echo $id_ciudad ;
$datosBarrio = Barrio::verBarrioPorLocalidad($id_localidad);
$html = "<option value='0'>Seleccionar Barrio</option>";

while($rowB = $datosBarrio->fetch_assoc()){
$html.= "<option value='".$rowB['ID_barrio']."'>".$rowB['nom_barrio']."</option>";
echo $html;
}

?>
