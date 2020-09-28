<?php
require_once '../global/plantillas/plantilla.php';
include_once '../global/plantillas/cuerpo/inihtmlN1.php';
include_once '../global/plantillas/nav/navN1.php';
include_once '../controlador/ControladorSession.php';
include_once '../controlador/controlador';

/*
include_once '../clases/class.medida.php';
include_once '../clases/class.conexion.php';
*/



//-----------------------------------------------------------------------------------


cardtitulo("Editar medida");


//accion editar 
if ((isset($_GET['id']))) {
    $id = $_GET['id'];

    // se llama un metodo estatic si ser extancia de la clase
    //$medida = Medida::ningunDatoM();
    $datos = Medida::verDatoPorId($id);
    while ($row = $datos->fetch_array()) {
?>


        <div class="container-fluid col-md col-xl-6">
            <div class="row">
                <div class="p-2 col-8 col-sm-6 col-md-4 col-lg-3 col-xl-4  mx-auto">
                    <div class="card">
                        <div class="card-header">Registro</div>
                        <div class="card-body">
                            <form action="../metodos/post.php?id=<?php echo $_GET['id'] ?>" method="POST">
                                <div class="form-group"><input class="form-control" type="text" name="nom" placeholder="Medida" value="<?php echo $row['nom_medida']  ?>" required autofocus maxlength="35"></div>
                                <div class="form-group"><input class="form-control" type="text" name="acron" placeholder="Acronimo" value="<?php echo $row['acron_medida']  ?>" required autofocus maxlength="5"></div>
                                <input type="hidden" name="accion" value="insertUdateMedia">
                                <div class="form-group"><input class="form-control btn btn-primary" type="submit" name="submit"></div>
                            </form>
                        </div><!-- fin card body -->
                    </div><!-- fin de card -->
                </div><!-- fin de col 2 -->
            </div><!-- fin de columnas -->
        </div><!-- Fin de container -->

<?php
    } //fin de while
} //fin de get
?>


<?php
include_once '../plantillas/cuerpo/finhtml.php';
?>