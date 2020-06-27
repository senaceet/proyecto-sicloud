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


static function ningunDatoP(){
    return new self('','');
}

//metodo visualizar datos 
public function verProveedor($db){
    $db = new Conexion;
    $sql = "SELECT * FROM empresa_provedor";
    $result = $db->query($sql);
    return $result;
}








}





?>