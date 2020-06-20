<?php

include_once '../plantillas/plantilla.php';
include_once '../clases/class.medida.php';
include_once '../plantillas/inihtml.php';
include_once '../plantillas/nav2.php';
cardtitulo("Medida");
include '../metodos/get.php';
include_once '../session/sessiones.php';
include_once '../session/valsession.php';
?>

<div class="container-fluid col-md col-xl-6  ">
    <div class="row">

        <div class=" p-2 col-8 col-sm-6 col-md-4 col-lg-3 col-xl-4  mx-auto">
            <!-- formulario de registro -->
            <?php
            if (isset($_SESSION['message'])) {  ?>
            
                <!-- alerta boostrap -->
                <div class="alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
                    <?php
                    echo  $_SESSION['message']  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php
                setMessage();
            }
            ?>
            <div class="card ">
                <div class="card-header">Registro</div>
                <div class="card-body">
                    <form action="../metodos/post.php" method="POST">
                        <div class="form-group"><input class="form-control" type="text" name="nom_medida" placeholder="Medida" required autofocus maxlength="35"></div>
                        <div class="form-group"><input class="form-control" type="text" name="acron_medida" placeholder="Acronimo" required autofocus maxlength="5"></div>
                        <input type="hidden" name="accion" value="insertMedida">
                        <div class="form-group"><input class="form-control btn btn-primary" type="submit" name="submit" value="enviar"></div>
                    </form>
                </div><!-- fin card body -->
            </div><!-- fin de card -->
        </div><!-- fin de div responce formluario -->


        <div class="col-md-auto p2">
            <table class=" table table-bordered  table-striped bg-white table-sm mx-auto   text-center">
                <thead>

                    <tr>
                        <th>ID_medida</th>
                        <th>Medida</th>
                        <th>Acronimo</th>
                        <th>Accion</th>
                        <?php


                        //$medida = Medida::ningunDatoM();
                        $datos  = Medida::verMedida();
                        if (isset($datos)) {
                            while ($row = $datos->fetch_array()) {
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los nombres que estan son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                    <td><?php echo $row['ID_medida'] ?></td>
                    <td><?php echo $row['nom_medida'] ?></td>
                    <td><?php echo $row['acron_medida'] ?></td>
                    <td>
                        <a href=" formEdicionMedida.php?accion=editarMedia&&id=<?php echo $row['ID_medida'] ?>; " class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                        <a href="../metodos/get.php?accion=eliminarMedida&&id=<?php echo $row['ID_medida'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tbody>
        <?php

                            } //fin del while
                        }
        ?>
            </table>
        </div>
    </div><!-- fin de response table div -->
</div><!-- fin de row -->
</div><!-- Fin container -->
<?php
//finhtml();
require '../plantillas/finhtml.php';
?>