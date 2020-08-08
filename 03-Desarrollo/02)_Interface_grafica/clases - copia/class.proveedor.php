<?php




// creacion de clase
class Proveedor{

//accecsivilidad
protected $ID_rut;
protected $nom_empresa;

//Constructor
public function __construct($_ID_rut, $_nom_empresa)
{
  $this->ID_rut = $_ID_rut;
  $this->nom_empresa = $_nom_empresa;  
}


public function get_ID_rut (){
  return $this->ID_rut; 
}


public function get_nom_empresa (){
  return $this->nom_empresa; 
}


static function ningunDatoP(){
    return new self('','');
}

//metodo visualizar datos 
public function verProveedor(){
  include_once 'class.conexion.php';
    $db = new Conexion;
    $sql = "SELECT * FROM empresa_provedor";
    $result = $db->query($sql);
    return $result;
}








}





?>