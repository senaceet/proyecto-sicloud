
<?php
include_once 'modelo/class.medida.php';
include_once 'assest/plantillas/plantilla.php';
include_once 'assest/session/sessiones.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud </title>
    <link href="" rel="stylesheet">
    <link rel="stylesheet" href="assest/css/bootstrap.css">
    <link rel="stylesheet" href="assest/css/jav.css">

</head>

<body>




<?php 

if($_GET['accion'] == 'editarMedida' ){


$instMedida = Medida::ningunDato();
$datos = $instMedida->verMedidaId($_GET['id']);
foreach( $datos as $dato){

?>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 mx-auto my-4">
            <div class="card ">
                <div class="card-header">Registro</div>
                <div class="card-body">
                    <form action="controlador/C_metodos.php?id=<?php echo $dato['ID_medida'] ?>" method="POST">
                        <div class="form-group"><input class="form-control" type="text" value="<?php echo $dato['nom_medida']  ?>" name="nom_medida" placeholder="Medida" required autofocus maxlength="35"></div>
                        <div class="form-group"><input class="form-control" type="text" value="<?php echo $dato['acron_medida']  ?>" name="acron_medida" placeholder="Acronimo" required autofocus maxlength="5"></div>
                        <input type="hidden" name="accion" value="insertUpdateMedida">
                        <div class="form-group"><input class="form-control btn btn-primary" type="submit" name="submit" value="enviar"></div>
                    </form>
                </div><!-- fin card body -->
            </div><!-- fin de card -->

            <?php
            if (isset($_SESSION['message'])) {
            ?>
                <!-- alerta boostrap -->
                <div class="alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
                    <?php echo  $_SESSION['message']  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php setMessage();
            } ?>

        </div>
    </div>

<?php } }?>
    </body>

</html>