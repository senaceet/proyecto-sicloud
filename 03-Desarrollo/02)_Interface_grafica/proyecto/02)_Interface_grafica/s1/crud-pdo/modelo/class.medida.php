<?php
include_once 'class.conexion.php';


class Medida extends Conexion{
  private $db; 
  private $nom_medida;
  private $acron_medida;


public function __construct( $_nom_medida , $_acron_medida  )
{
  $this->db = self::conexionPDO();
  $this->nom_medida = $_nom_medida;
  $this->acron_medida = $_acron_medida;
}

static function ningunDato(){
  return new self( '', '' );
}

//---------------------------------------------------------------------
//Metodos
public function verMedida(){
//$consulta = $this->db->prepare("SELECT * FROM  tipo_medida ");
$sql = "SELECT * FROM  tipo_medida";
$consulta = $this->db->prepare($sql);
$consulta->execute();
$result = $consulta->fetchAll();
return $result;
}



public function verMedidaId($id){
  $sql = "SELECT * FROM  tipo_medida WHERE :id = ID_medida  ";
  $consulta = $this->db->prepare($sql);
  $consulta->bindValue(":id", $id);
  $consulta->execute();
 $result = $consulta->fetchAll(); 
 //$result = $consulta->fetch(PDO::FETCH_NUM);

  return $result;

}



public function insertarMedida(){
$sql = "INSERT INTO tipo_medida( nom_medida, acron_medida  )values( :nom_medida , :acron_medida )";
$consulta = $this->db->prepare($sql);
$consulta->bindValue(":nom_medida", $this->nom_medida  );
$consulta->bindValue(":acron_medida" , $this->acron_medida );
$insert =  $consulta->execute();
if($insert){
  include_once '../assest/session/sessiones.php';
$_SESSION['message'] = "Registro categoria";
$_SESSION['color'] = "success";
}else{ 
  $_SESSION['message'] = "Registro categoria";
$_SESSION['color'] = "success";
}
}




public function actualizarMedida( $ID_medida ){
  $sql = "UPDATE tipo_medida SET nom_medida = :nom_medida , acron_medida = :acron_medida where ID_medida = :ID_medida";
  $consulta = $this->db->prepare($sql);
  $consulta->bindValue(":nom_medida", $this->nom_medida );
  $consulta->bindValue(":acron_medida", $this->acron_medida);
  $consulta->bindValue(":ID_medida" , $ID_medida);
  $update = $consulta->execute();
  if($update){
      include_once '../assest/session/sessiones.php';
    $_SESSION['message'] = "Actualizo medida";
    $_SESSION['color'] = "success";
    }else{ 
      $_SESSION['message'] = "Error al actualizar medida";
    $_SESSION['color'] = "success";
    }
  }



  public function eliminarMedida($ID_medida){
    $sql = "DELETE FROM tipo_medida WHERE ID_medida = :ID_medida ";
    $consulta = $this->db->prepare($sql);
    $consulta->bindValue( ":ID_medida" , $ID_medida );
    $delete = $consulta->execute();
    if($delete){
      include_once '../assest/session/sessiones.php';
    $_SESSION['message'] = "Elimino medida";
    $_SESSION['color'] = "danger";
    }else{ 
      $_SESSION['message'] = "Error al eliminar medida";
    $_SESSION['color'] = "danger";
    }


  }





}


?>