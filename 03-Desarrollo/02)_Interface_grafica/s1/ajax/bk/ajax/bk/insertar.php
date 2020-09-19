<?php


include_once '../clases/class.conexion.php';
$nombre = $_POST['nombre'];
$c = new Conexion;
$sql = "INSERT INTO tipo_pago (nom_tipo_pago)VALUES('$nombre')";
$consulta = $c->query($sql);
if($consulta){
    echo "Inserto los datos";
}else{
    echo "error al insertar los datos".$c->error;
}



?>
   