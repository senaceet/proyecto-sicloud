<?php
include_once '../../clases/class.conexion.php';
include_once '../../clases/class.ciudad.php';
include_once '../../clases/class.localidad.php';

$id_ciudad = $_POST['id_ciudad'];
echo $id_ciudad ;
$datosLocalidad = Localidad::verLocalidadID($id_ciudad);
$html = "<option value='0'>Seleccionar Ciudad</option>";

while($rowL = $datosLocalidad->fetch_assoc()){
$html = "<option value='".$rowL['ID_localidad']."'>".$rowL['nom_localidad']."</option>";
echo $html;
}

?>

