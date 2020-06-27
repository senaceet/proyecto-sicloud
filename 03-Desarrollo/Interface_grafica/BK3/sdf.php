<?php
require 'plantillas/plantilla.php';
require 'plantillas/nav2.php';

inihtml();


include_once 'clases/class.conexion.php';
include_once 'clases/class.documento.php';
include_once 'clases/class.rol.php';


cardtitulo("Registro de Usuarios");
?>


    <div class="container">
        <div class="row">
            <div class="col-md-10 card card-body mx-auto">
                <form class="form-group" action="metodos/post.php" method="POST">

                <div class="row">
                    <div class="col-md-12">


                    <div class="col-md-12"><!-- contenedor -->
                        <div class="row"><!-- inicion fila selector de documento y rol -->
                            <div class="col-md-6">

                                                      <h5>Seleccione el tipo de documento: </h5>
                                              <select class="form-control" name="FK_tipo_doc">
                                                <?php
                                                        $datos = Documento::verDocumeto();         
                                                        while( $row = $datos->fetch_array() ){
                                                        ?>
                                                        <option value="<?php echo $row['ID_acronimo'] ?>"><?php echo $row['nom_doc'] ?></option>
                                                        <?php  }   ?>
                                                </select>

                            </div><!-- fin de columna de 6 -->
                            <div class="col-md-6">

                                                    <h5>Seleccione rol "pendinete aprobar"</h5>
                                                <div class="form-group">

                                                <select name="FK_rol" class = "form-control" >
                                                    <?php
                                                      //  $datos = Rol::verRol();
                                                       // while( $row = $datos->fetch_array() ){
                                                    ?>
                                                    
                                                    <option value="<?php echo $row['ID_rol_n']   ?>"><?php echo $row['nom_rol']   ?></option   >
                                                        <?php //  } ?>
                                                </select>
                                                </div><!-- fin de form-group select de  -->

                            </div><!-- fin de columna de 6 -->
                        </div><!-- row fin de fila -->
                    </div><!-- fin contenedor  de selectores -->
                
                   




                        <h5>Numero de identificacion: </h5>
                        <input class="form-control" type="number" name="ID_us" required autofocus maxlength="11">
                    </div>
                </div><br>

                            <h5>dd</h5>
                            <input type="text" name="dd">

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

                    <h5> Foto </h5>
                    <input class="form-control" type="password" name="foto" required autofocus maxlength="25"><br>

                    <h5> Correo </h5>
                    <input class="form-control" type="email" name="correo" required autofocus maxlength="25"><br>


                    <h5> Correo </h5>
                    <input class="form-control" type="email" name="correo" required autofocus maxlength="25"><br>
                    
                 <!--   
                    <h5>Adjunte Foto de Perfil: </h5>
                    <select class="form-control" name="FK_tipo_doc">
                    <option value="return">...</option>
                        <option value="foto">Seleccione una foto desde su galeria</option>
                        <option value="avatar">Seleccione un Avatar predeterminado</option>
                    </select><br>

                  -->
                    <input type="hidden" name="accion"     value="insetUsuario">
                    <input class="btn btn-success form-control" type="submit" name = "submit" value="Registrar"><br><br><br>
                    <a   class="btn btn-success form-control btn-block"  href="CU0013-ControlUsuarios.php">Lista usuario</a>
                </form>
            </div>
        </div>
    </div>

    <div class="seccion3">
        <div class="container">
            <footer class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Categorías</h5><br>
                        <a href="#" class="subpaginas">Herramientas Manuales</a><br><br>
				        <a href="#" class="subpaginas">Herramientas Electricas</a><br><br>
				        <a href="#" class="subpaginas">Trajes y Equipos</a><br><br>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Información</h5><br>
                    <a href="#" class="subpaginas">Promociones especiales</a><br><br>
				        <a href="#" class="subpaginas">Novedades</a><br><br>
				        <a href="#" class="subpaginas">Términos y condiciones</a><br><br>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5 class="contact">Contáctanos</h5>
                    <img src="fonts/ubicacion.png" class="ubicacion">
                    <small>CALLE 78 SUR 78 71 IN 123, BOGOTA, BOGOTA, COLOMBIA</small><br>
                    <img src="fonts/telefono.png" class="telefono">
                    <small>(1)4493237</small><br><br>
                    <img src="fonts/email.png" class="correo">
                    <small>imcoabhersas@imcoabher.com</small>
                </div>
            </footer>
        </div>
    </div>






<?php
finhtml();
?>