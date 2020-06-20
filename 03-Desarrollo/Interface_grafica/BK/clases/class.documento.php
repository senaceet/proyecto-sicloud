<?php
require 'class.conexion.php';


class Documento{

    // tipo de acceso

    protected $id_acronimo;
    protected $nom_doc;
    //constructor
    public function __construct($_id_acronimo, $_nom_doc)
    {
        $this->id_acronimo = $_id_acronimo;
        $this->nom_doc = $_nom_doc;
    }


    //static
    static function ningunDatoD(){
        return new self('','');
    }


    static function verDocumeto(){
        $db = new Conexion; 
        $sql = "SELECT * FROM tipo_doc";
        $result = $db->query($sql);
        return $result;
    }

}





?>

