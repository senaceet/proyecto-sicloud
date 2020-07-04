<?
class Direccion{

protected $CF_us;
protected $CF_tipo_doc;
protected $CF_rut;
protected $Fk_barrio;
protected $Fk_localidad;
protected $FK_ciudad;
protected $ID_dir;


public function _construct ( $_CF_us,$CF_tipo_doc,$_CF_rut, $_FK_barrio, $_FK_localidad,  $_ID_dir = ""){
   
    $this->CF_us=$_CF_us;
    $this->CF_tipo_doc = $CF_tipo_doc;
    $this->CF_rut=$_CF_rut;
    $this->Fk_barrio=$_FK_barrio;
    $this->Fk_localidad=$_FK_localidad;
    $this->ID_dir=$_ID_dir;
}
//Metodos

public function InsertDireccion(){
    include_once 'class.conexion.php';
    $c = new conexion;
    $sql = "INSERT INTO sicloud.direccion (ID_dir,CF_us,CF_tipo_doc,CF_rut,FK_barrio,FK_Localidad,FK_Ciudad)values('$this->ID_dir','$this->CF_us', '$this->CF_tipo_doc','$this->CF_rut','$this->FK_barrio','$this->FK_localidad', '$this->FK_ciudad')";
    echo $sql;
    $insert = $c->query($sql);

    if($insert){   
        $_SESSION['message'] =  'Se a creado el dirreccio';
        $_SESSION['color'] = 'success'; 
    
    
    }else{
     $_SESSION['message'] =  'Error no se direccion';
     $_SESSION['color'] = 'danger'; 
    
    }
}
}

?>