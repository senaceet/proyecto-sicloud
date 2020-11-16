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

    <script>
        function mensajeEliminar(id) {
            var confirmacion =
                confirm('Desea eliminar el registro  ' + id + ' ?');
            if (confirmacion) {
                window.location = "controlador/C_metodosGet.php?accion=eliminarMedida&&id=" + id;
            }
        }
    </script>


    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mx-auto my-4">
                <div class="card ">
                    <div class="card-header">Registro</div>
                    <div class="card-body">
                        <form action="controlador/C_metodos.php" method="POST">
                            <div class="form-group"><input class="form-control" type="text" name="nom_medida" placeholder="Medida" required autofocus maxlength="35"></div>
                            <div class="form-group"><input class="form-control" type="text" name="acron_medida" placeholder="Acronimo" required autofocus maxlength="5"></div>
                            <input type="hidden" name="accion" value="insertMedida">
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


            <div class="col-lg-6">
                Tabla
                <table class="table table-bordered table-striped bg-white table-sm">
                    <thead>
                        <tr>
                            <th>ID Medida</th>
                            <th>Medida</th>
                            <th>Acronimo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $medida = Medida::ningunDato();
                        $datos = $medida->verMedida();

                    //  while( $row = $datos->fetch_array()   ){ 
                          foreach ($datos as $dato) {
                        ?>
                            <tr>
                                <td> <?php echo $dato['ID_medida']  ?> </td>
                                <td> <?php echo $dato['nom_medida']  ?> </td>
                                <td> <?php echo $dato['acron_medida']  ?> </td>
                                <td>
                                    <a href="V_edicionMedida.php?accion=editarMedida&&id=<?php echo $dato['ID_medida']   ?>" class="btn btn-primary"> <i class="fas fa-search fa-sm"></i></a>
                                    <a onclick="mensajeEliminar(<?php echo $dato['ID_medida']   ?>)" href="" class="btn btn-danger"> <i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://kit.fontawesome.com/451d49791e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>

</html>