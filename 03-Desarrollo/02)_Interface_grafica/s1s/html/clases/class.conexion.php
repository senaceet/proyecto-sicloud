<?php

class Conexion extends mysqli{
    private $DB_HOST = '192.168.2.9';
    private $DB_USER = 'javier';
    private $DB_PASS = 'javier';
    private $DB_NAME = 'javier';

    public function __construct(){
        parent:: __construct($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);

        $this->set_charset('utf-8');
        $this->connect_errno ? die('Error en la conexion'. mysqli_connect_errno()): $m = 'conectado ;D'; 
    }
}

?>