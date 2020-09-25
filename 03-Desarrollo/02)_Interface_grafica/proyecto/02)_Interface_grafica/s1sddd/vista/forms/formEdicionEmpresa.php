<?php
include_once '../plantillas/plantilla.php';

include_once '../clases/class.empresa.php';
include_once '../clases/class.conexion.php';
include_once '../plantillas/cuerpo/inihtmlN2.php';
include_once '../plantillas/nav/navN2.php';
include_once '../session/sessiones.php';
//----------------------------------------------------------------------


if ((isset($_GET['id']))) {
    $id = $_GET['id'];


$objCon = Empresa::ningunDatoP();
$datos = $objCon->verDatoPorId($id);
// $objCon->ver($datos, 1 );


// $objCon->ver($datos, 1);
// $datos = Empresa::verDatoPorId($id);
foreach($datos as $i =>$d){
// while ($row = $datos->fetch_array()) {
    $id  = $d[0];
    $nom = $d[1];
}



cardtitulo('Edicion de empresa');


//accion editar 


?>


    <div class="container-fluid  col-md col-xl-6">
        <div class="row">
            <div class="p-2 col-8 col-sm-6 col-md-4 col-lg-3 col-xl-4  mx-auto">
                <div class="card">
                    <div class="card-header">Registro</div>
                    <div class="card-body">
                        <form action="../metodos/post.php?id=<?= $id  ?>" method="POST">


                                <div class="form-group"><input class="form-control" type="text" name="ID_rut" placeholder="ID_rut" value="<?= $id ?>" required autofocus maxlength="35"></div>
                                <div class="form-group"><input class="form-control" type="text" name="nom_empresa" placeholder="nom_empresa" value="<?=  $nom   ?>" required autofocus maxlength="50"></div>
                            <?php } ?>

                            <input type="hidden" name="accion" value="insertUdateEmpresa">
                            <div class="form-group"><input class="form-control btn btn-primary" type="submit" name="submit"></div>
                        </form>
                    </div><!-- fin card body -->
                </div><!-- fin de card -->
            </div><!-- fin de div responce formulario -->
        </div><!-- fin de columnas -->
    </div><!-- Fin de container -->


<?php

include_once '../plantillas/cuerpo/finhtml.php';
?>