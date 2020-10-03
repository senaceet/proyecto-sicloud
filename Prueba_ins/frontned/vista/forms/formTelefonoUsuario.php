<?php
require_once '../global/plantillas/plantilla.php';
include_once '../global/plantillas/cuerpo/inihtmlN1.php';
include_once '../global/plantillas/nav/navN1.php';
include_once '../controlador/ControladorSession.php';
include_once '../controlador/controlador';
/*
include_once '../clases/class.medida.php';
include_once '../clases/class.telefono.php';
*/

cardtitulo("Directorio telefonico Usuarios");

?>

<div class="container-fluid col-md col-xl-7">
    <div class="row">
        <!-- formulario de registro -->
        <div class="p-2 col-8 col-sm-6 col-md-4 col-lg-3 col-xl-4  mx-auto">
            <?php
            if (isset($_SESSION['message'])) {
            ?>

                <!-- alerta boostrap -->
                <div class="alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
                    <?php
                    echo  $_SESSION['message']  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



            <?php setMessage();
            } ?>
            <div class="card">
                <div class="card-header">Registro Telefono</div>
                <div class="card-body">
                    <form action="../metodos/post.php" method="POST">
                        <div class="form-group"><input class="form-control" type="text" name="ID_tel" placeholder="Rut" required autofocus maxlength="20"></div>
                        <div class="form-group"><input class="form-control" type="text" name="nom_empresa" placeholder="Empresa" required autofocus maxlength="50"></div>
                        <input type="hidden" name="accion" value="insertEmpresa">
                        <div class="form-group"><input class="form-control btn btn-primary" type="submit" name="submit" value="enviar"></div>
                    </form>
                </div><!-- fin card body -->
            </div><!-- fin de card -->
        </div><!-- fin de div formulario -->

        <!-- inicia segunda divicion -->
        <div class="col-md-auto p-2 ">
            <table class=" table table-bordered  table-striped bg-white table-sm mx-auto   text-center">
                <thead>

                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Accion</th>
                        <?php


                        //$medida = Medida::ningunDatoM();
                        $datos  = Empresa::verEmpresa();
                        if (isset($datos)) {
                            while ($row = $datos->fetch_array()) {
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los nombres que estan son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                    <td><?php echo $row['ID_rut'] ?></td>
                    <td><?php echo $row['nom_empresa'] ?></td>


                    <!-- formEdicion.php?accion=editarMedia&&id=<?php// echo $row['ID_medida'] ?> -->
                    <td>
                        <a href="   ../forms/formEdicionEmpresa.php?id=<?php echo $row['ID_rut'] ?> " class="btn btn-circle btn-secondary"><i class="fas fa-marker"></i></a>
                        <a href="../metodos/get.php?accion=eliminarEmpresa&&id=<?php echo $row['ID_rut'] ?>" class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i></a>

                        <!--  get.php?accion=editarMedia?id= -->
                        <!-- edit.php?id=<?//php  echo  $row['id_sitio']  ?> -->
                    </td>
                </tbody>
        <?php

                            } //fin del while
                        } // fin de ver empresa
        ?>
            </table>


        </div><!-- fin de response table -->
    </div><!-- fin de row -->
</div><!-- Fin container -->

<?php
include_once '../plantillas/cuerpo/finhtml.php';
?>