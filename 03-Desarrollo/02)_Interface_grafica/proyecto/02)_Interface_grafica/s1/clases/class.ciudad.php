<?php
class Ciudad {


protected $nom_ciudad;
protected $ID_ciudad;


public function __construct($_nom_ciudad, $_ID_ciudad = "" )
{
  $this->nom_ciudad = $_nom_ciudad;
  $this->ID_ciudad = $_ID_ciudad; 
}

// METODOS

//-----------------------------------------------------------------
static function verCiudad(){
include_once 'class.conexion.php';
$c = new Conexion;
$sql = "SELECT ID_ciudad , nom_ciudad FROM ciudad ";
$result = $c->query($sql);
return $result;
}// fin de metodo ver datos ciudad
//----------------------------------------------------------------


//-----------------------------------------------------------------
static function verCiudadId($ID_ciudad){
  include_once 'class.conexion.php';
  $c = new Conexion;
  $sql = "SELECT id_ciudad , nom_ciudad FROM ciudad WHERE ID_ciudad = '$ID_ciudad' ORDER BY nom_ciudad ASC ";
  $result = $c->query($sql);
  return $result;
  }// fin de metodo ver datos ciudad
  //----------------------------------------------------------------
  









}// fin de clase ciudad


?>