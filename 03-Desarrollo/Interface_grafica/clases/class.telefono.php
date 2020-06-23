<?php   
class Telefono{


protected $tel;
protected $CF_us;
protected $ID_tel;


public function __construct(  $_tel, $_CF_us, $_ID_tel = "" )
{
    $this->tel = $_tel;
    $this->CF_us = $_CF_us;
    $this->ID_tel = $_ID_tel;
}


// METODOS

public function insertTelefonoUsuario(){
    include_once '../clases/class.conexion.php';
    $c = new Conexion;
    $sql = "INSERT INTO sicloud.telefono ( tel,CF_us)values('$this->tel', '$this->CF_us ')";
    $insert = $c->query($sql);
       
   if($insert){   
    $_SESSION['message'] =  'Se a creado el rol';
    $_SESSION['color'] = 'success'; 


}else{
 $_SESSION['message'] =  'Error no se a creado rol';
 $_SESSION['color'] = 'danger'; 

}

header("location: ../forms/formTelefono.php ");
}// fin de insert telefono usuario



}// fin de la clase telefono


?>