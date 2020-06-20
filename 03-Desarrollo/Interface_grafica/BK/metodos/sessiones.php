<?php 
session_start();

//--------------------------------
//mensaje
if(isset($_SESSION['message'])){
print_r( $_SESSION['message']);
}

//------------------------------
//usuario
if(!isset($_SESSION['usuario'])){
    echo "Redirigir al login... No hay usuario ";
    //header('location: ../index.php');
}else{
    print_r($_SESSION['usuario']);
    echo "login exitoso";
    
}
echo " Hola soy panel de modulo: ";


?>