<?php
// se comprueba si extiste variable GET
if(  (isset($_GET['accion'])) &&  ($_GET['accion'] == 'editar')){
    // echo 'editar';
    echo $_GET['ID_us'];
}


    if(  (isset($_GET['accion'])) &&  ($_GET['accion'] == 'eliminar')){
      //  echo 'eliminar';
}

?>