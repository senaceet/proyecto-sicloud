<?php

include_once 'plantillas/plantilla.php';
include_once  'clases/class.medida.php';
include_once 'clases/class.usuario.php';
//require 'clases/class.usuario.php';
//include_once 'clases/class.conexion.php';


include_once 'plantillas/inihtml.php';
include_once 'plantillas/navN1.php';
include_once 'session/sessiones.php';
?>
<div class="container-fluid">

    <?php cardtituloS("Administrador de solicitiudes") ?>


    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"><br>
                            <!-- espasio de foto -->
                            <div class="card card-body col-3 col-md-5 mx-auto img-thumbnail   ">Foto Us</div width="290">
                        </div>
                        <div class="col-md-6">
                            <div class="col-md">
                                <div class="row">
                                    <!-- option de impresion -->
                                    <div class="col-md col-lg-5"><br>


                                        <div class="form-group"><input type="number" class="form-control "></div>

                                    </div>
                                    <!-- Botones de imprimir -->

                                    <div class="col-md col-lg-5"><br>
                                        <div class="form-group"><button class="btn btn-primary form-control ">Exportar</button></div>
                                        <div class="form-group"><button class="btn btn-primary form-control ">imprimir</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md mx-auto"><br>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 "><br>

                        </div>
                        <div class="col-md-6"><br>
                            <form action="CU009-controlUsuarios.php" method="POST">
                                <div class="form-group"><input type="text" class="form-control col-md col-lg-4 " placeholder="ID usuario " name="documento"></div>
                                <input type="hidden" value="bId" name="accion">
                                <div class="form-group "><input class="btn btn-primary form-control col-md col-lg-4" type="submit" value="Buscar id"></div>
                            </form>

                            <form action="CU009-controlUsuarios.php" method="POST">


                                <div class="form-group">
                                    <select name="estado" class="form-control col-md col-lg-4 ">
                                        <option value="p">Pendientes</option>
                                        <option value="a">Aprobados</option>
                                    </select>
                                </div>

                                <input type="hidden" value="estado" name="accion">
                                <div class="form-group "><input class="btn btn-primary form-control col-md col-lg-4" type="submit" value="Reguistros"></div>
                            </form>




                            <?php // Busqueda por id

                            $usuario =  Usuario::ningunDato($id = '1662101568299');
                            $datos = $usuario->selectUsuario();

                            if ((isset($_POST['accion'])) &&  ($_POST['accion'] == 'bId')) {
                                if ($_POST['documento'] > 0) {
                                    $id = $_POST['documento'];
                                    $usuario = Usuario::ningunDato();
                                    $datos = $usuario->selectIdUsuario($id);
                                } else {
                                    echo "<script>alert('Error, digita ID de usuario')</script>";
                                }
                            }




                            if ((isset($_POST['accion'])) &&  ($_POST['accion'] == 'estado')) {

                                if ((isset($_POST['estado']))) {


                                    if ($_POST['estado'] == "a") {
                                        $estado = 1;
                                    } else {
                                        $estado = 0;
                                    }
                                    $usuario = Usuario::ningunDato();
                                    $datos = $usuario->selectUsuariosPendientes($estado);
                                }
                            }


                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>


    <?php
                    if (isset($_SESSION['message'])) {  ?>

                        <!-- alerta boostrap -->
                        <div class="alert text-center col-md-4 mx-auto alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
                            <?php
                            echo  $_SESSION['message']  ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php
                    session_unset(); }
                    ?>

    <div class="col-lg-12">
        <div class="table-responsive">

            <table id="example" style="width:100%" class=" col-lg-12  table-bordered  table-striped bg-white   mx-auto">
                <thead>

                    <tr>
                        <th>Tipo doc</th>
                        <th>Documento</th>
                        <th>P. Nombre</th>
                        <th>S. Nombre</th>
                        <th>P. Apellido</th>
                        <th>S. Apellido</th>
                        <th>Fecha</th>
                        <th>Foto</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                    <!-- U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.fecha, U.foto, U.correo, R_U.estado -->


                    <?php
                    //$usuario = Usuario::ningunDato();
                    //$datos = $usuario->selectUsuario();


                    if (isset($datos)) {
                        while ($row = $datos->fetch_array()) {
                    ?>

                            </tr>
                </thead>
                <tbody>
                    <!-- Los nombres que estan en [''] son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                    <td><?php echo $row['FK_tipo_doc'] ?></td>
                    <td><?php echo $row['ID_us'] ?></td>
                    <td><?php echo $row['nom1'] ?></td>
                    <td><?php echo $row['nom2'] ?></td>
                    <td><?php echo $row['ape1'] ?></td>
                    <td><?php echo $row['ape2'] ?></td>
                    <td><?php echo $row['fecha'] ?></td>
                    <td><?php echo $row['foto'] ?></td>
                    <td><?php echo $row['correo'] ?></td>
                    <td><?php echo $row['estado'] ?></td>
                    <td>
                        <a href="forms/editarUsuario.php?id= <?php echo $row['ID_us'] ?> " class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                        <a href="metodos/get.php?accion=aprobarUsuario&&id= <?php echo $row['ID_us']   ?>" class="btn btn-success"><i class="fas fa-check-square"></i> </a>
                        <a href="metodos/get.php?accion=desactivarUsuario&&id=  <?php echo $row['ID_us']   ?>  " class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tbody>
        <?php

                        }
                    }
        ?>
            </table>
        </div>
    </div><!-- div de tablas -->


</div>


<?php
include_once 'plantillas/finhtml.php';

?>