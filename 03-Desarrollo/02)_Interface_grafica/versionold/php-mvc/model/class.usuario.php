<?php

class Usuario{
    private $db;


    public function __construct()
    {
        include_once 'class.conexion.php';
       $this->db = Conexion::conectar(); 
    }




public function GetUser(){
    $sql = 'SELECT * FROM usuario';
    $consulta = $this->db->query($sql);
    return $consulta;
}







}




?>