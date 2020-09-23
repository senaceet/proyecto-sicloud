<?php

include_once '../config/Conexion.php';

class Usuario extends Conexion{
    protected $nombre;
    protected $pass;
    protected $rol;
    protected $db;
    protected $hash;

    protected function InsertUsuario(){
    $sql = "INSERT INTO usuario (nombre, pass, rol) VALUES (?, ?, ?)";
    $insertar = $this->db->prepare($sql);
    $insertar->bindParam(1, $this->nombre);
    $insertar->bindParam(2, $this->pass);
    $insertar->bindParam(3, $this->rol);
    $insertar->execute();
    }
    
    protected function SearchUsuario(){
    $sql = "SELECT * FROM usuario WHERE nombre = '$this->nombre'";
    $consulta = $this->db->prepare($sql);
    $consulta->execute();
    $objconsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
    return $objconsulta;
    }

    }







?>