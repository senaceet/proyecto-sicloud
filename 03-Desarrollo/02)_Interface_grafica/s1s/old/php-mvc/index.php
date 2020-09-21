<?php

include_once '../plantillas/cuerpo/inihtmlN2.php';
include_once 'model/class.conexion.php';

echo Conexion::prueba();

  require_once 'controller/C_verUsuarios.php';

?>