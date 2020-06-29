<?php

class Notificaciones{

protected $estado;
protected $descript;
protected $FK_rol;
protected $FK_not;
protected $ID_not;

public function __construct($_estado , $_descript , $_FK_rol , $_FK_not , $_ID_not = "")
{
    $this->estado = $_estado;
    $this->descript = $_descript;
    $this->FK_rol = $_FK_rol;
    $this->FK_not = $_FK_not;
    $this->ID_not = $_ID_not;
    
}




//METODOS 


//Insertar notificacion
public function insertNotific(){
include_once 'class.conexion.php';
$c = new Conexion;
$sql = "INSERT into sicloud.notificacion( estado, descript, FK_rol , FK_not ) 
VALUES ('$this->estado', $this->descript , '$this->FK_rol', '$this->FK_not')";
$insert = $c->query($sql);
if($insert){   
    $_SESSION['message'] =  'Se a notificacion';
    $_SESSION['color'] = 'success'; 


}else{
 $_SESSION['message'] =  'Error no al insertar notificacion';
 $_SESSION['color'] = 'danger'; 
}

}// fin de insert notificacion


//notificacion leida
static function notificacionLeida($id){
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = "UPDATE sicloud.notificacion SET estado = '$id'
    where ID_not = '1'";
    $leer = $c->query($sql);
    if($leer){   
        $_SESSION['message'] =  'Leyo la notificacion';
        $_SESSION['color'] = 'success'; 
    
    
    }else{
     $_SESSION['message'] =  'No pudo leer la notificacion';
     $_SESSION['color'] = 'danger'; 
    }
}// fin de leer notificacion;



//ver notificacion
static function verNotificacion($id_rol){
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = "SELECT N.ID_not , N.estado , N.descript , N.FK_rol , N.FK_not ,  t.nom_tipo
    FROM notificacion N join tipo_not T ON N.FK_not = T.ID_tipo_not
    join rol R ON N.FK_rol = ID_rol_n
    WHERE R.ID_rol_n = '$id_rol' and  N.estado = '0'";
    $result =  $c->query($sql);
    return $result;

}// fin de ver notificaiones por rol


//conteo de mensajes
static function conteoNotificaciones($id_rol){
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = "SELECT N.ID_not , N.estado , N.descript , N.FK_rol , N.FK_not ,  t.nom_tipo
    FROM notificacion N join tipo_not T ON N.FK_not = T.ID_tipo_not
    join rol R ON N.FK_rol = ID_rol_n
    WHERE R.ID_rol_n = '$id_rol' and  N.estado = '0'";
    $result =  $c->query($sql);
     $count = $result->num_rows;
    return $count;



}






}






















?>
