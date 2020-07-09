<?php

include_once 'class.conexion.php';
 


class Tienda{
    include_once   '../session/sessiones.php';
public function listaPtoductos(){
    $cnx=new Conexion;
    $sql = "select * from productos";
    $result= $cnx->query($sql);

    foreach ($result as $row) {
        $lista[]=$row;
    }
    return $lista
}


}

















?>