<?php
include_once '../clases/class.factura.php'; 
include_once '../clases/class.error.php';
include_once '../plantillas/plantilla.php';



include_once '../plantillas/inihtml.php';
include_once '../plantillas/navN2.php';

include_once '../metodos/get.php';
include_once '../session/sessiones.php';
cardtitulo("Log error");
?>

<div class="container-fluid col-md col-xl-7">
    <div class="row">
        <!-- formulario de registro --
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
          

        <!-- inicia segunda divicion -->
        <div class="col-md-8 p-2 mx-auto ">
            <table class=" table table-bordered  table-striped bg-white table-sm mx-auto   text-center">
                <thead>

                    <tr>
                        <th>ID error</th>
                        <th>descrip error</th>
                        <th>fecha</th>
                        <th>hora</th>
                        <?php


                        //$medida = Medida::ningunDatoM();
                        $datos  =  ErrorLog::verError();
                        if (isset($datos)) {
                            while ($row = $datos->fetch_array()) {
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los nombres que estan son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                    <td><?php echo $row['ID_error'] ?></td>
                    <td><?php echo $row['descrip_error'] ?></td>
                    <td><?php echo $row['fecha'] ?></td>
                    <td><?php echo $row['hora'] ?></td>


                    <!-- formEdicion.php?accion=editarMedia&&id=<?php// echo $row['ID_medida'] ?> -->
                    <td>
                        <a href="../metodos/get.php?accion=eliminarError&&id=<?php echo $row['ID_error'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>

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
include_once '../plantillas/finhtml.php';
?>