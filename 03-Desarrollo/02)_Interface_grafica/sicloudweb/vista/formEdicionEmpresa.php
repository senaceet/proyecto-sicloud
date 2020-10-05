<?php
/*
include_once 'plantillas/plantilla.php';
include_once '../controlador/controlador.php';
include_once '../modelo/class.empresa.php';
include_once '../modelo/class.conexion.php';
include_once 'plantillas/cuerpo/inihtmlN2.php';
include_once 'plantillas/nav/navN2.php';
include_once '../controlador/controladorsession.php';
*/
//----------------------------------------------------------------------
include_once '../controlador/controladorrutas.php';
rutFromIni();

cardtitulo('Edicion de empresa');


//accion editar 
if ((isset($_GET['id']))) {
    $id = $_GET['id'];

?>


    <div class="container-fluid  col-md col-xl-6">
        <div class="row">
            <div class="p-2 col-8 col-sm-6 col-md-4 col-lg-3 col-xl-4  mx-auto">
                <div class="card">
                    <div class="card-header">Registro</div>
                    <div class="card-body">
                        <form action="../controlador/post.php?id=<?php echo $_GET['id'] ?>" method="POST">

                            <?php 
                            $objModEmp = new ControllerDoc();
                            $datos = $objModEmp->verDatoPorId($id);
                            //while ($row = $datos->fetch_array()) {
                                foreach($datos as $i => $row){
                             ?>
                                <div class="form-group"><input class="form-control" type="text" name="ID_rut" placeholder="ID_rut" value="<?php echo $row['ID_rut']  ?>" required autofocus maxlength="35"></div>
                                <div class="form-group"><input class="form-control" type="text" name="nom_empresa" placeholder="nom_empresa" value="<?php echo $row['nom_empresa']  ?>" required autofocus maxlength="50"></div>
                            <?php  } ?>

                            <input type="hidden" name="accion" value="insertUdateEmpresa">
                            <div class="form-group"><input class="form-control btn btn-primary" type="submit" name="submit"></div>
                        </form>
                    </div><!-- fin card body -->
                </div><!-- fin de card -->
            </div><!-- fin de div responce formulario -->
        </div><!-- fin de columnas -->
    </div><!-- Fin de container -->


<?php
}
rutFinFooterFrom();
rutFromFin();
?>