<?php

class Conexion{

/*
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
*/

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


//===================================================================

//vista
// $medida = Medida::ningunDato();
// $result = $medida->verMedida();
// print_r($result);
// echo '<pre>';
// var_dump($result );
// echo '</pre>';



