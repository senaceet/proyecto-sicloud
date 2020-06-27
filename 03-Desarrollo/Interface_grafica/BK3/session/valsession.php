<?php

//PLANTILLA PARA COMPRBAR SI HAY SESSION DE LO CONTRARIO NO HAY INGRESO


//error_reporting(0);
//if(isset($_SESSION['usuario']))


if(!isset($_SESSION['usuario'])){
    echo "No ha iniciado sesion";
}else{

print_r($_SESSION['usuario']);

}

 echo "Bienvenido ".$_SESSION['usuario']['nom1'];
 echo "<br>"." Su rol es ".$_SESSION['usuario']['nom_rol'];






?>
