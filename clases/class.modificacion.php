<?php
class Modificacion{


protected $descrip;
protected $fecha;
protected $hora;
protected $FK_us;
protected $FK_doc;
protected $FK_modific;

public function __construct(  $_descrip, $_fecha, $_hora, $_FK_us, $_FK_doc, $_FK_modific)
{

    $this->descrip=$_descrip;
    $this->fecha=$_fecha;
    $this->hora=$_hora;
    $this->FK_us=$_FK_us;
    $this->FK_doc = $_FK_doc;
    $this->FK_modific = $_FK_modific;
}


//METODOS


//------------------------------------------
//Ver fecha actual
static function fechaActual()
{
  include_once 'class.conexion.php';
  $c = new Conexion;
  $sql = "SELECT CURDATE() as fecha";
  $dat =  $c->query($sql);
  $datos = $dat->fetch_assoc();
  $fecha =  $datos['fecha'];

  return $fecha;
}
//------------------------------------------
//------------------------------------------
//Ver fecha hora
static function horaActual()
{
  include_once 'class.conexion.php';
  $c = new Conexion;
  $sql = "  SELECT DATE_FORMAT(NOW( ), '%H:%i:%S' )as hora ;";
  $dat =  $c->query($sql);
  $datos = $dat->fetch_assoc();
  $hora =  $datos['hora'];
  return $hora;
}
//------------------------------------------


//------------------------------------------
//insertar modificacion 
public function insertModificacion(){
    include_once 'class.conexion.php';
    $c =  new Conexion;
    $sql = "INSERT into sicloud.modific(descrip , fecha , hora ,FK_us , FK_doc , FK_modific) value ( '$this->descrip' , '$this->fecha' , '$this->hora' , '$this->FK_us' , '$this->FK_doc' , '$this->FK_modific')";
     // insert into sicloud.modific(descrip , fecha , hora ,FK_us , FK_doc , FK_modific) value ( null , '2019-07-14' , '20:30:05' , '2' , 'CC' , '1'  ),
    $insert = $c->query($sql);
    //echo $sql;
    if ($insert) {
        $_SESSION['message'] = "Se inserto registro de modificacion";
        $_SESSION['color'] = "success";
      } else {
        $_SESSION['message'] = "No se inserto registro de modificacion";
        $_SESSION['color'] = "success";
      }
}// fin de insersion modificacion
//------------------------------------------


//------------------------------------------
//ver join de modificaciones
static function verJoinModificacionesDB(){
    include_once 'class.conexion.php';
    $c =  new Conexion;


    $sql = "SELECT M.ID_modifc , M.descrip , M.fecha , M.hora , M.FK_us , M.FK_doc  ,  U.nom1 , U.ape1 ,  T_M.nom_modific , R.nom_rol  
    from tipo_modific T_M JOIN modific M on T_M.ID_t_modific =  M.FK_modific
    JOIN usuario U ON M.FK_us = U.ID_us
    JOIN rol_usuario R_U on U.ID_us = R_U.FK_us
    JOIN rol R on R_U.FK_rol = R.ID_rol_n";
     //insert into sicloud.modific(descrip , fecha , hora ,FK_us , FK_doc , FK_modific) value ( null , '2019-07-14' , '20:30:05' , '2' , 'CC' , '1'  ),
     $consulta=  $c->query($sql);
     return $consulta;
   
      
}// fin de join modificacion
//------------------------------------------

//select ID_modifc , M.descrip , M.fecha , M.hora , M.FK_us , M.FK_doc , M.FK_modific, T_M.nom_modific   
//from modific M JOIN tipo_modific T_M ON T_M.ID_t_modific = M.FK_modific;













}// fin de clase modificacion







?>