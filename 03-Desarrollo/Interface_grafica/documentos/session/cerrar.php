<?php  
session_start();
if(isset($_SESSION['usuario'])){
session_unset();
session_destroy();

}
session_start();
$_SESSION['message']= "Cerro sesion"; $_SESSION['color'] = "primary";
header("location: ../index.php");


?>