<?php 

class Conexion extends mysqli{
    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASS = '';
    private $DB_NAME = 'sicloud';

    public function __construct(){     
        parent:: __construct($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);
        $this->set_charset('utf-8');
       
    }


    static function conectar(){
        $c = new Conexion;
        return $c;
    }

    static function prueba(){
        $c = new Conexion;
        $c->connect_errno ? die( 'Error en la conexion'. mysqli_connect_errno()): 
        $m = 'conectado ;D';
       return $m;
    }
}
?>

