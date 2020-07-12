<?php

//PLANTILLA PARA COMPRBAR SI HAY SESSION DE LO CONTRARIO NO HAY INGRESO


//error_reporting(0);
//if(isset($_SESSION['usuario']))


if(!isset($_SESSION['usuario'])){
    echo "<script>alert('no ha inciado sesion');</script>"; echo "<script>window.location.replace('index.php');</script>" ;


if( $_SESSION['usuario']['estado'] ==0){
               echo "<script>alert('Su cuenta esta desctivada, no tiene permiso para ingresar a este modulo');</script>"; echo "<script>window.location.replace('../../index.php');</script>" ;
    }





 //echo "Bienvenido ".$_SESSION['usuario']['nom1'];
// echo "<br>"." Su rol es ".$_SESSION['usuario']['nom_rol'];




}

?>
