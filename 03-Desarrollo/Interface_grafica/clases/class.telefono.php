<?php   
class Telefono{


protected $tel;
protected $CF_us;
protected $CF_tipo_doc;
protected $CF_rut;



public function __construct(  $_tel, $_CF_us , $_CF_tipo_doc , $_CF_rut )
{
    $this->tel = $_tel;
    $this->CF_us = $_CF_us;
    $this->CF_tipo_doc = $_CF_tipo_doc;
    $this->CF_rut = $_CF_rut;

}


// METODOS

public function insertTelefonoUsuario(){
    include_once '../clases/class.conexion.php';
    $c = new Conexion;
    $sql = "INSERT INTO sicloud.telefono ( tel,CF_us)values('$this->tel', '$this->CF_us ')";
    //echo $sql;
    $insert = $c->query($sql);
       
   if($insert){   
    $_SESSION['message'] =  'A registrado telefono para su cuenta, si desea ingresa otro telefono, favor digite';
    $_SESSION['color'] = 'success'; 


}else{
 $_SESSION['message'] =  'No registro telefono';
 $_SESSION['color'] = 'danger'; 

}

//header("location: ../forms/formTelefono.php ");
}// fin de insert telefono usuario



}// fin de la clase telefono


?>