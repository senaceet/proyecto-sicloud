<?php 
//include 'class.conexion.php';

//creacion de clase
class Medida{
    //Definir accesibilidad 
    protected $nom_medida;
    protected $acron_medida;
    //Definir contractor
    public function __construct( $_nom_medida, $_acron_medida)
    {
      $this->nom_medida = $_nom_medida;
      $this->acron_medida = $_acron_medida;  
    }

    //METODO Insertsar medida
    public function insertMedia(){
        $db = new Conexion();
        $sql = "INSERT INTO sicloud.tipo_medida(nom_medida, acron_medida)VALUES('$this->nom_medida','$this->acron_medida')";
        $ejecucion = $db->query($sql);
        if($ejecucion){ echo "<script>alert('Registro de  medida exitioso');</script>"; echo "<script>window.location.replace('../forms/formMedida.php');</script>"; }else{  echo "<script>alert('Error al insertar medida ');</script>"; echo "<script>window.location.replace('../forms/formMedida.php');</script>"; }

    }// fin de insertar medida



    //CREACION DE METODOS acceso sin ser una extancia
    static function ningunDatoM(){
        return new self('','');
    }

    //metodo mostrar datos
    static function verMedida(){
        $conexion = new Conexion;
        $sql = "SELECT * FROM  tipo_medida";
        $result = $conexion->query($sql);
        return $result;
    }

    //mostrar datos por ID
    static function verDatoPorId($id){
        $conexion = new Conexion;
        $sql = "SELECT * FROM  tipo_medida WHERE ID_medida = $id ";
        $result = $conexion->query($sql);
        return $result;
    }



    //Actualizar datos 
    public function actualizarDatosMedida($id){
        $c = new Conexion;
        $sql = "UPDATE tipo_medida SET nom_medida = '$this->nom_medida'  , acron_medida = '$this->acron_medida' WHERE ID_medida = $id ";
        //"UPDATE sitio_t SET nom_sitio = '$sitio', Fk_capital = '$FK_capital'  WHERE id_sitio = $id "
         $ejecucion = $c->query($sql);
        if($ejecucion){ echo "<script>alert('update medida success');</script>"; echo "<script>window.location.replace('../forms/formMedida.php');</script>"; }else{  echo "<script>alert('update medida fall ');</script>"; echo "<script>window.location.replace('formMedida.php');</script>"; }
    }


    //eliminar registros
   static function eliminarDatosMedia($id){

    $con = new Conexion;
    $sql = "DELETE FROM tipo_medida WHERE ID_medida = $id";
    $ejecucion = $con->query($sql);
    if($ejecucion){ echo "<script>alert('se elimino registro');</script>"; echo "<script>window.location.replace('formMedida.php');</script>"; }else{  echo "<script>alert('error al eliminar registro ');</script>"; echo "<script>window.location.replace('formMedida.php');</script>"; }
   }
}







?>