<?php

/*
include_once '../clases/class.factura.php'; 
include_once '../clases/class.modificacion.php';
*/

require_once '../global/plantillas/plantilla.php';
include_once '../global/plantillas/cuerpo/inihtmlN1.php';
include_once '../global/plantillas/nav/navN1.php';
include_once '../controlador/ControladorSession.php';
include_once '../controlador/control';
cardtitulo("Control de modificaiones");
?>

<div class="container-fluid ">
    <div class="row">
        <!-- formulario de registro -->
            <?php
            if (isset($_SESSION['message'])) {
            ?>

          
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
        <div class="col-md-12 p-2 mx-auto ">
            <table class=" table table-bordered table-sm table-striped bg-white  mx-auto   text-center">
                <thead>

                   
                        <th>ID modicacion</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>ID usuario</th>
                        <th>Documento</th>
                        <th>P.nombre</th>
                        <th>P.apellido</th>
                        <th>Modificacion</th>
                        <th>Rol</th>
                         </tr>
                        

                        <?php
                        //$medida = Medida::ningunDatoM();
                        $datos  =  Modificacion::verJoinModificacionesDB();
                            while ($row = $datos->fetch_array()) {
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los nombres que estan son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                    <td><?php echo $row['ID_modifc'] ?></td>
                    <td><?php echo $row['descrip'] ?></td>
                    <td><?php echo $row['fecha'] ?></td>
                    <td><?php echo $row['hora'] ?></td>
                    <td><?php echo $row['FK_us'] ?></td>
                    <td><?php echo $row['FK_doc'] ?></td>
                    <td><?php echo $row['nom1'] ?></td>
                    <td><?php echo $row['ape1'] ?></td>
                    <td><?php echo $row['nom_modific'] ?></td>
                    <td><?php echo $row['nom_rol'] ?></td>


                    <!-- formEdicion.php?accion=editarMedia&&id=<?php// echo $row['ID_medida'] ?> -->
                    <td>
                        <a href="../metodos/get.php?accion=eliminarError&&id=<?php echo $row['ID_error'] ?>" class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i></a>

                        <!--  get.php?accion=editarMedia?id= -->
                        <!-- edit.php?id=<?//php  echo  $row['id_sitio']  ?> -->
                    </td>
                </tbody>
        <?php

                            } //fin del while
               
        ?>
            </table>


        </div><!-- fin de response table -->
    </div><!-- fin de row -->
</div><!-- Fin container -->

<?php
include_once '../plantillas/cuerpo/finhtml.php';
?>