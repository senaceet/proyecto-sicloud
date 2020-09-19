<?php

include_once 'class.conexion.php';
 


class Tienda{
   
public function listaProductos(){
    include_once   '../session/sessiones.php';
    $cnx=new Conexion;
    $sql = "select * from productos";
    $result= $cnx->query($sql);


    // $result->fetch_array();
   //  while( $row = $result)


    foreach ($result as $row) {
        $lista[]=$row;
    }
    return $lista;
}


}



?>