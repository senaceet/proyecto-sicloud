<?php
class Direccion{
    protected $dir;
    protected $CF_us;
    protected $CF_tipo_doc;
    protected $FK_barrio;
    protected $FK_localidad;
    protected $FK_ciudad;
    protected $CF_rut;

    public function __construct( $_dir , $_CF_us , $_CF_tipo_doc , $_FK_barrio , $_FK_localidad , $_FK_ciudad , $_CF_rut ){

        $this->dir = $_dir;
        $this->CF_us = $_CF_us;
        $this->CF_tipo_doc = $_CF_tipo_doc;
        $this->FK_barrio = $_FK_barrio;
        $this->FK_localidad = $_FK_localidad;
        $this->FK_ciudad = $_FK_ciudad;
        $this->CF_rut = $_CF_rut;

    }

//Metodos


public function InsertDireccionUsuario(){
    include_once 'class.conexion.php';
    $c = new conexion;
    $sql = "INSERT INTO sicloud.direccion ( dir,CF_us,CF_tipo_doc,FK_barrio,  FK_localidad, FK_ciudad)values('$this->dir' , '$this->CF_us', '$this->CF_tipo_doc','$this->FK_barrio', '$this->FK_localidad'  , '$this->FK_ciudad')";
    //echo $sql;
    //INSERT INTO sicloud.direccion ( dir,CF_us,CF_tipo_doc,FK_barrio, FK_localidad, FK_ciudad)values('calle 24 No. 8-80','1', 'CC','78','8','1');
    echo $sql;
    $insert = $c->query($sql);

    if($insert){   
        $_SESSION['message'] =  'A registrado direccion para su cuenta, si desea ingresa otra direccion, favor digite';
        $_SESSION['color'] = 'success'; 
    
    
    }else{
     $_SESSION['message'] =  'Error no se registro direccion';
     $_SESSION['color'] = 'danger'; 
    
    }
}








}
