<?php
class Conexion {

    static function conexionPDO(){
        $DB_HOST = 'localhost';
        $DB_USER = 'root';
        $DB_PASS = '';
        $DB_NAME = 'prueba';
    
        try {
            $dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME";
            $db = new PDO($dsn, $DB_USER ,  $DB_PASS  );
        } catch (PDOException $e) {
            echo 'Error al conectarnos al; ' . $e->getMessage();
        }
        return $db;
    }
    
    }

?>