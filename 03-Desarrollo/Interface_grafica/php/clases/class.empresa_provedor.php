<?php 

class Empresa{
    protected $ID_rut;
    protected $nom_empresa;


    public function __construct( $_ID_rut ,   $_nom_empresa)
    {
        $this->ID_rut;
        $this->nom_empresa;
    }



    // Creacion de metodos


    // metodo insertar 
    public function insertEmpresa(){
    $db = new Conexion;
// insert into sicloud.empresa_provedor (ID_rut , nom_empresa)values('17468875','Tuberias S.A.S'),
    $sql = "INSERT INTO  sicloud.empresa_provedor (ID_rut , nom_empresa)VALUES('$this->ID_rut','$this->nom_empresa')";
    $insert = $db->query($sql);
    if($insert){ echo "<script>alert('Se inserto registro de empresa');</script>"; echo "<script>window.location.replace('FormEmpresa.php');</script>"; }else{  echo "<script>alert('error al crear empresa ');</script>"; echo "<script>window.location.replace('FormEmpresa.php');</script>"; }

}// Fin de insercion



// ver empresa
static function verEmpresa(){
    $db = new Conexion;
    $sql = "SELECT * FROM sicloud.mpresa_provedor";
    $result = $db->query($sql);
     return $result;
}














}//fin de clase probedor












  ?>