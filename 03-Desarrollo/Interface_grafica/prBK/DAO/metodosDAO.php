<?php

class Tienda{
   
public function listaProductos(){
    include_once '../../plantillas/inihtmlN3';
    include_once   '../../session/sessiones.php';
    include_once   '../../clases/class.conexion.php';
    $cnx=new Conexion;
    $sql = "select * from producto";
    $result= $cnx->query($sql);

    //foreach ($result as $row) {
       // $lista[]=$row;
    
  //  while($row = $result->fetch_assoc()){
     $datos =   $result->fetch_all();
        return $datos; 
        //return $lista;
    }

    
    }
 


//}




?>