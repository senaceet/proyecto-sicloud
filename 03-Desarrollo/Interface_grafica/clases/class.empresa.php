<?php

//include_once 'class.conexion.php';


class Empresa
{
    protected $ID_rut;
    protected $nom_empresa;


    public function __construct($_ID_rut = '',  $_nom_empresa)
    {
        $this->ID_rut = $_ID_rut;
        $this->nom_empresa = $_nom_empresa;
    }

//get


public function get_ID_rut(){
    return $this->ID_rut;
}

public function get_nom_empresa(){
    return $this->nom_empresa;
}



    // Creacion de metodos :


    static function ningunDatoP()
    {
        return new self('', '', '', '', '', '', '');
    }


    // metodo insertar 
    public function insertEmpresa()
    {
        $db = new Conexion;
        $sql = "INSERT INTO  sicloud.empresa_provedor (ID_rut , nom_empresa)VALUES('$this->ID_rut','$this->nom_empresa')";
        $insert = $db->query($sql);
        if ($insert) {
            $_SESSION['message'] = "Registro empresa";
            $_SESSION['color'] = "success";
        } else {
            $_SESSION['message'] = "No se creo empresa";
            $_SESSION['color'] = "danger";
        }
        header("location: ../forms/formEmpresa.php");
    } // Fin de insercion



    // ver empresa
    static function verEmpresa()
    {
        $db = new Conexion;
        $sql = "SELECT * FROM sicloud.empresa_provedor";
        $result = $db->query($sql);
        return $result;
    }

    // Eliminar 
    static function eliminarEmpresa($id)
    {
        $con = new Conexion;


        $sql1 = "SET FOREIGN_KEY_CHECKS = 0 ";
        $res =   $con->query($sql1);
   
       if($res){
           $sql2 = "DELETE  FROM sicloud.empresa_provedor WHERE ID_rut = '$id' ";
           $res1 = $con->query($sql2); 
       }
   
       if($res1){
           $sql3 = "SET FOREIGN_KEY_CHECKS = 1";
           $res2 = $con->query($sql3);
       }

        if ($res2) {
            $_SESSION['message'] = "Elimino empresa";
            $_SESSION['color'] = "danger";
        } else {
            $_SESSION['message'] = "Elimino empresa";
            $_SESSION['color'] = "danger";
        }
        header("location: ../forms/formEmpresa.php ");
    }

    static function verDatoPorId($id)
    {
        $c = new Conexion;
        $sql = "SELECT * FROM sicloud.empresa_provedor WHERE ID_rut = '$id' ";
        $result = $c->query($sql);
        return $result;
    }

    public function actualizarDatosEmpresa($id)
    {
        $c = new Conexion;
        $sql = "UPDATE sicloud.empresa_provedor SET nom_empresa = '$this->nom_empresa' WHERE ID_rut = '$id' ";
        $consulta = $c->query($sql);
        if ($consulta) {
            $_SESSION['message'] = "Actualizacion exitosa";
            $_SESSION['color'] = "primary";
        } else {
            $_SESSION['message'] = "Fallo actualizacion";
            $_SESSION['color'] = "danger";
        }
        header("location: ../forms/FormEmpresa.php");
    }
}//fin de clase probedor
