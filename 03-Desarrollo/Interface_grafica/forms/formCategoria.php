<?php
include_once '../plantillas/plantilla.php';
include_once '../clases/class.categoria.php';
include_once '../plantillas/inihtml.php';
include_once '../plantillas/nav2.php';
cardtitulo("Categoria");
include_once '../metodos/get.php';
include_once '../session/sessiones.php';
?>

<div class="container-fluid col-md col-xl-5">
    <div class="row">
        <!-- formulario de registro -->
        <div class="p-2 col-8 col-sm-6 col-md-4 col-lg-3 col-xl-4  mx-auto">
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

            <div class="card">
                <div class="card-header">Registro Categoria</div>
                <div class="card-body">
                    <form action="../metodos/post.php" method="POST">
                        <div class="form-group"><input class="form-control" type="text" name="nom_categoria" placeholder="Categoria" required autofocus maxlength="30"></div>
                        <input type="hidden" name="accion" value="insertCategoria">
                        <div class="form-group"><input class="form-control btn btn-primary" type="submit" name="submit" value="Registrar categoria"></div>
                    </form>
                </div><!-- fin card body -->
            </div><!-- fin de card -->
        </div><!-- fin de formulario respocibe -->

        <div class="col-md-auto p-2">
            <table class=" table table-bordered  table-striped bg-white table-sm mx-auto   text-center">
                <thead>

                    <tr>
                        <td>ID categoria</td>
                        <td>Categoria</td>
                        <td>Accion</td>
                        <?php

                        $datos  = Categoria::verCategoria();
                        if (isset($datos)) {
                            while ($row = $datos->fetch_array()) {
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <td><?php echo $row['ID_categoria'] ?></td>
                    <td><?php echo $row['nom_categoria'] ?></td>
                    <td>
                        <a href="   ../forms/formEdicionCategoria.php?id=<?php echo $row['ID_categoria'] ?> " class="btn btn-secondary">
                            <i class="fas fa-marker"></i>
                            <a href="../metodos/get.php?accion=eliminarCategoria&&id=<?php echo $row['ID_categoria'] ?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </a>
                    </td>
                </tbody>
        <?php
                            } //fin del while
                        } // fin de ver categoria
        ?>
            </table>
        </div><!-- fin de div col tabla -->
    </div><!-- fin de row -->
</div><!-- Fin container -->

<?php
include_once '../plantillas/finhtml.php';
?>