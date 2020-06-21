<?php 
include_once 'clases/class.conexion.php';
include_once 'plantillas/plantilla.php';
include_once 'plantillas/navgeneral.php';


inihtml();
$query = "SELECT * FROM usuario";
$con = new Conexion();
$result =  $con->query($query);

if(! $result){
    die('Error');
} else {     
    while($data = mysqli_fetch_assoc($result)){

        $arreglo["data"][] = $data;
    }
   echo json_encode($arreglo);
   }








finhtml();

?>