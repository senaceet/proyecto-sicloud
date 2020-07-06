<?php
include_once 'plantillas/plantilla.php';

include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'plantillas/nav/navN1.php';
include_once 'clases/class.documento.php';
include_once 'clases/class.rol.php';
include_once 'clases/class.login.php';
include_once 'session/sessiones.php';
//include_once 'session/valsession.php';
include_once 'clases/class.usuario.php';

cardtitulo("Registro de Usuarios");
?>


<div class="container">
    <div class="row">
        <div class="col-md-10 card card-body mx-auto">
            <h5></h5>
            <form class="form-group" action="metodos/post.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card text-center card-title">
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
                            </em> </h5>


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

                                    <h5>Seleccione rol</h5>
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
                        <h5>Numero de identificacion: </h5>
                        
                        <input class="form-control" type="number"  name="ID_us" required autofocus maxlength="11">
                    </div>
                </div><br>


                <div class="row">
                    <div class="col-md-6">
                        <h5>Primer nombre: </h5>
                        <input class="form-control" type="text" name="nom1" required autofocus maxlength="20">
                    </div>

                    <div class="col-md-6">
                        <h5>Segundo nombre: </h5>
                        <input class="form-control" type="text" name="nom2" required autofocus maxlength="20">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Primer apellido: </h5>
                        <input class="form-control" type="text" name="ape1" required autofocus maxlength="20">
                    </div>

                    <div class="col-md-6">
                        <h5>Segundo apellido: </h5>
                        <input class="form-control" type="text" name="ape2" required autofocus maxlength="20">
                    </div>
                </div><br>

                <h5>Fecha de nacimiento: </h5>
                <input class="form-control" type="date" name="fecha"><br>

                <h5>Digite su contraseña: </h5>
                <input class="form-control" type="password" name="pass" required autofocus maxlength="25"><br>

                <h5>Adjunte Foto de Perfil: </h5>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="foto">
                    <label class="custom-file-label" for="customFile">Seleccione una imagen desde su equipo</label>
                </div><br><br>

                <h5>Digite su Telefono: </h5>
                <input class="form-control" type="varchar" name="tel" required autofocus maxlength="25"><br>

                <h5> Correo </h5>
                <input class="form-control" type="email" name="correo" required autofocus maxlength="25"><br>
                <input type="hidden" name="accion" value="insetUsuario">
                <input class="btn btn-success form-control my-2" type="submit" name="submit" value="Registrar">
                <a class="btn btn-success form-control btn-block" href="CU009-controlusuarios.php">Lista usuario</a>
            </form>
        </div>
    </div>
</div>




<?php 

include_once 'plantillas/cuerpo/footerN1.php'; 
include_once 'plantillas/cuerpo/finhtml.php';
?>