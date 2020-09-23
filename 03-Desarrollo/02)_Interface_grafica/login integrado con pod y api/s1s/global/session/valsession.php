<?php

//PLANTILLA PARA COMPRBAR SI HAY SESSION DE LO CONTRARIO NO HAY INGRESO

function cuentaDesactivada(){
   echo  "<script>alert('Su cuenta esta desctivada, no tiene permiso para ingresar a este modulo');</script>". "<script>window.location.replace('index.php');</script>";  
}

//error_reporting(0);
//if(isset($_SESSION['usuario']))

switch (($_SESSION['usuario'])){
    case null:
        echo "<script>alert('no ha inciado sesion');</script>"; echo "<script>window.location.replace('index.php');</script>" ;
         $_SESSION['usuario']['estado'] ==0 ? cuentaDesactivada(): "";    
    break;
}
