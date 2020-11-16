<?php 


  include_once 'class.conexion.php';
class Login{
  

protected $tDoc;
protected $nDoc;
protected $pass;

public function __construct($_tDoc, $_nDoc, $_pass)
{
    $this->tDoc = $_tDoc;
    $this->nDoc = $_nDoc;
    $this->pass = $_pass;
}

public function get_tDoc(){
    return $this->tDoc;
}

public function get_nDoc(){
    return $this->nDoc;
}

public function get_pass(){
    return $this->pass;
}

//Metodos









}
