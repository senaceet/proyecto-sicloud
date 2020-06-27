<?php
require '../plantillas/plantilla.php';
require '../plantillas/navN2.php';
include_once '../plantillas/inihtml.php';
//session_start();



include_once '../clases/class.documento.php';
include_once '../clases/class.rol.php';
include_once '../clases/class.login.php';
include_once '../clases/class.usuario.php';
include_once '../session/sessiones.php';

cardtitulo("Actualizar datos de Usuarios");

?>


<div class="container">
    <div class="row">
        <div class="col-md-10 card card-body mx-auto">
            <h5></h5>
            <form class="form-group" action="../metodos/post.php?id=<?php echo $_GET['id'] ?>" method="POST">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card text-center card-title">


                        </div><br>

                        <div class="col-md-12">
                            <!-- contenedor -->
                            <div class="row">
                                <!-- inicion fila selector de documento y rol -->
                                <div class="col-md-6">

                                    <h5>Seleccione el tipo de documento: </h5>
                                    <select class="form-control" name="FK_tipo_doc">
                                        <?php
                                        $datos = Documento::verDocumeto();
                                        while ($row = $datos->fetch_array()) {
                                        ?>
                                            <option value="<?php echo $row['ID_acronimo'] ?>"><?php echo $row['nom_doc'] ?></option>
                                        <?php  }   ?>
                                    </select>

                                </div><!-- fin de columna de 6 -->
                                <div class="col-md-6">

                                    <h5>Seleccione rol "pendinete aprobar"</h5>
                                    <div class="form-group">

                                        <select name="FK_rol" class="form-control">
                                            <?php
                                            $datos = Rol::verRol();
                                            while ($row = $datos->fetch_array()) {
                                            ?>

                                                <option value="<?php echo $row['ID_rol_n']   ?>"><?php echo $row['nom_rol']   ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div><!-- fin de form-group select de  -->

                                </div><!-- fin de columna de 6 -->
                            </div><!-- row fin de fila -->
                        </div><!-- fin contenedor  de selectores -->



                        <?php

                        $id = $_GET['id'];
                        echo $id;
                        //include_once '../clases/class.conexion.php';

                        $c = new Conexion();

                        $datos = Usuario::selectUsuarios($id);
                        while ($row = $datos->fetch_array()) {



                        ?>
                            <h5>Numero de identificacion: </h5>
                            <input class="form-control" type="number" name="ID_us" value="<?php echo $row['ID_us'] ?>" required autofocus maxlength="11">
                    </div>
                </div><br>

                <h5>Fecha asignacion</h5>
                <div class="form-group"><input class="form-control" type="date" name="fecha_a"></div>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Primer nombre: </h5>
                        <input class="form-control" type="text" name="nom1" value="<?php echo $row['nom1'] ?>" required autofocus maxlength="20">
                    </div>

                    <div class="col-md-6">
                        <h5>Segundo nombre: </h5>
                        <input class="form-control" type="text" name="nom2" value="<?php echo $row['nom2'] ?>" required autofocus maxlength="20">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Primer apellido: </h5>
                        <input class="form-control" type="text" name="ape1" value="<?php echo $row['ape1'] ?>" required autofocus maxlength="20">
                    </div>

                    <div class="col-md-6">
                        <h5>Segundo apellido: </h5>
                        <input class="form-control" type="text" name="ape2" value="<?php echo $row['ape2'] ?>" required autofocus maxlength="20">
                    </div>
                </div><br>

                <h5>Fecha de nacimiento: </h5>
                <input class="form-control" type="date" name="fecha" value="<?php echo $row['fecha'] ?>"><br>

                <h5>Digite su contraseña: </h5>
                <input class="form-control" type="password" name="pass" value="<?php echo $row['pass'] ?>" required autofocus maxlength="25"><br>

                <h5> Foto </h5>
                <input class="form-control" type="password" name="foto" value="<?php echo $row['foto'] ?>" required autofocus maxlength="25"><br>

                <h5> Correo </h5>
                <input class="form-control" type="email" name="correo" value="<?php echo $row['correo'] ?>" required autofocus maxlength="25"><br>

            <?php } ?>


            <!--   
                    <h5>Adjunte Foto de Perfil: </h5>
                    <select class="form-control" name="FK_tipo_doc">
                    <option value="return">...</option>
                        <option value="foto">Seleccione una foto desde su galeria</option>
                        <option value="avatar">Seleccione un Avatar predeterminado</option>
                    </select><br>

                  -->
            <input type="hidden" name="accion" value="insetUpdateUsuario">
            <input class="btn btn-primary form-control" type="submit" name="submit" value="Actualizar datos"><br><br><br>
            <a class="btn btn-primary form-control btn-block" href="CU009-controlUsuarios.php">Lista usuario</a>
            </form>
        </div>
    </div>
</div>








<?php
include_once  '../plantillas/finhtml.php';
?>