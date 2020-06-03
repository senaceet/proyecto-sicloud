<?php 



class Empresa{
    protected $ID_rut;
    protected $nom_empresa;
   



    public function __construct(  $_ID_rut = '',  $_nom_empresa  )
    {
        $this->ID_rut = $_ID_rut ;
        $this->nom_empresa = $_nom_empresa;
        
    }



    // Creacion de metodos :


    static function ningunDatoP(){
        return new self('','','','','','','');
        }



     


    // metodo insertar 
    public function insertEmpresa(){
    $db = new Conexion;
// insert into sicloud.empresa_provedor (ID_rut , nom_empresa)values('17468875','Tuberias S.A.S'),
    $sql = "INSERT INTO  sicloud.empresa_provedor (ID_rut , nom_empresa)VALUES('$this->ID_rut','$this->nom_empresa')";
    $insert = $db->query($sql);
    if($insert){ echo "<script>alert('Se inserto registro de empresa');</script>"; echo "<script>window.location.replace('../forms/formEmpresa.php');</script>"; }else{  echo "<script>alert('error al crear empresa ');</script>"; echo "<script>window.location.replace('../forms/formEmpresa.php');</script>"; }

}// Fin de insercion



// ver empresa
static function verEmpresa(){
    $db = new Conexion;
    $sql = "SELECT * FROM sicloud.empresa_provedor";
    $result = $db->query($sql);
     return $result;
}

// Eliminar 
static function eliminarEmpresa($id){
$db = new Conexion;
$sql = "DELETE  FROM sicloud.empresa_provedor WHERE ID_rut = $id ";
$ejecucion = $db->query($sql);
if($ejecucion){ echo "<script>alert('Se elimino empresa');</script>"; echo "<script>window.location.replace('../forms/formEmpresa.php');</script>"; }else{  echo "<script>alert('error al crear empresa ');</script>"; echo "<script>window.location.replace('../forms/formEmpresa.php');</script>"; }

}

static function verDatoPorId($id){
    $c = new Conexion;
    $sql = "SELECT * FROM sicloud.empresa_provedor WHERE ID_rut = $id ";
    $result = $c->query($sql);
    return $result;
}

public function actualizarDatosEmpresa($id){
$c = new Conexion;
$sql = "UPDATE sicloud.empresa_provedor SET nom_empresa = '$this->nom_empresa' WHERE ID_rut = $id ";
$consulta = $c->query($sql);
if($consulta){echo "<script>alert('Se elimino empresa');</script>"; echo "<script>window.location.replace('../forms/FormEmpresa.php');</script>"; }else{  echo "<script>alert('error al crear empresa ');</script>"; echo "<script>window.location.replace('FormEmpresa.php');</script>";   }

}













}//fin de clase probedor












  ?>