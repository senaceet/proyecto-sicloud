<?php

class ErrorLog{

    protected  $descrip_error; 
    protected  $fecha;
    protected  $hora;
    protected  $ID_error;


    public function __construct( $_descrip_error , $_fecha , $_hora , $_ID_error ="" )
    {
        
$this->descrip_error = $_descrip_error;
$this->fecha = $_fecha;
$this->hora = $_hora;
$this->ID_error = $_ID_error;
}
    
static function verError(){
include_once 'class.conexion.php';
$c = new Conexion;
$sql = "SELECT * FROM log_error";
$insert =  $c->query($sql);
return $insert;
}// fin de ver error

static function eliminarErrorLog($id){
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = "DELETE FROM log_error WHERE ID_error = $id";
    $i = $c->query($sql);


    if ($i) {
        $_SESSION['message'] = "Se elimino error";
        $_SESSION['color'] = "danger";
    } else {
        $_SESSION['message'] = "Error al eliminar";
        $_SESSION['color'] = "danger";
    }
    header("location: ../forms/formLogError.php");
}

 

}




?>