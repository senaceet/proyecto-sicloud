<?php

class Conexion{

    static function conexionMysqli(){
        $DB_HOST = 'localhost';
        $DB_USER = 'root';
        $DB_PASS = '';
        $DB_NAME = 'sicloud';
        $db=mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        $db->set_charset('utf-8');
        $db->connect_errno ? die('Error en la conexion'. mysqli_connect_errno()): $m = 'conectado por Misqli';
        echo $m;
        return $db;
   }


static function conexionPDO(){
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'sicloud';

    try {
        $dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME";
        $db = new PDO($dsn, $DB_USER ,  $DB_PASS  );
    } catch (PDOException $e) {
        echo 'Error al conectarnos al; ' . $e->getMessage();
    }
    return $db;
}

}


//================================================================

class Medida extends Conexion{
    private $db; 
    private $nom_medida;
    private $acron_medida;


public function __construct( $_nom_medida , $_acron_medida  )
{
    $this->db = self::conexionPDO();
    $this->nom_medida = $_nom_medida;
    $this->acron_medida = $_acron_medida;
}

static function ningunDato(){
    return new self( '', '' );
}

//---------------------------------------------------------------------
//Metodos
public function verMedida(){
//$consulta = $this->db->prepare("SELECT * FROM  tipo_medida ");
$sql = "SELECT * FROM  tipo_medida";
$consulta = $this->db->prepare($sql);
$consulta->execute();
$result = $consulta->fetch();
return $result;
}

public function insertarMedida(  ){
$sql = "INSERT INTO tipo_medida( nom_medida, acron_medida  )values( :nom_medida , :acron_medida )";
$consulta = $this->db->prepare($sql);
$consulta->bindValue(":nom_medida", "Javier" );
$consulta->bindValue(":acron_medida" , "JRN" );
$insert =  $consulta->execute();
if($insert){
    echo "inserto los datos";
}else{ echo "error al insertare los datos";}
}
}


//===================================================================

//vista
$medida = Medida::ningunDato();
$result = $medida->verMedida();
$result = $medida->insertarMedida();
print_r($result);
echo '<pre>';
var_dump($result );
echo '</pre>';



