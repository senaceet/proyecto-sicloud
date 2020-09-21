<?php
class OrdenEntrada{

protected $fecha_ingreso;
protected $CF_rol;
protected $CF_us;
protected $CF_rol_us;
protected $CF_tipo_doc;
protected $ID_ord;


public function __construct($_fecha_ingreso, $_CF_rol, $_CF_us, $_CF_rol_us, $_CF_tipo_doc, $_ID_ord="")
{
    $this->fecha_ingreso = $_fecha_ingreso;
    $this->CF_rol = $_CF_rol;
    $this->CF_us = $_CF_us;
    $this->CF_rol_us =$_CF_rol_us;
    $this->CF_tipo_doc =$_CF_tipo_doc;
    $this->ID_ord = $_ID_ord;
}


//METODOS
//fecha actual
static function fechaActual(){
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql ="SELECT CURDATE() as fecha";
    $dat =  $c->query($sql);
    $datos = $dat->fetch_assoc();
    $fecha =  $datos['fecha'];
   return $fecha;
  }// fin de fecha actual


  public function insertEntrada(){
      include_once 'class.conexion.php';
      $c = new Conexion;
      $sql = "INSERT INTO orden_entrada ( fecha_ingreso , CF_rol , CF_rol_us , CF_tipo_doc) VALUES ('$this->fecha_ingreso' , '$this->CF_rol' , '$this->CF_rol_us' , '$this->CF_tipo_doc' )";
     $query =   $c->query($sql);       
   if($query){   
    $_SESSION['message'] =  'Se a insrtado entrada';
    $_SESSION['color'] = 'success'; 

}else{
 $_SESSION['message'] =  'Error al insertar entrada';
 $_SESSION['color'] = 'danger'; 

}// fin de insrtar datos







  }
















}// fin de clase Entrada producto
