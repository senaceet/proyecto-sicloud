<?php
require 'plantilla.php';
require 'nav.php';
inihtml();

cardtitulo("Registro de Usuarios");
?>


    <div class="container">
        <div class="row">
            <div class="col-md-12 card card-body mx-auto">
                <form class="form-group" action="" method="post">

                <div class="row">
                    <div class="col-md-12">
                        <h5>Numero de identificacion: </h5>
                        <input class="form-control" type="number" name="ID_us" required autofocus maxlength="11">
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
                        <input class="form-control" type="text" name="nom1" required autofocus maxlength="20">
                    </div>
                
                    <div class="col-md-6">
                        <h5>Segundo apellido: </h5>
                        <input class="form-control" type="text" name="nom2" required autofocus maxlength="20">
                    </div>
                </div><br>

                    <h5>Fecha de nacimiento: </h5>
                    <input class="form-control" type="date" name="fecha"><br>

                    <h5>Digite su contraseña: </h5>
                    <input class="form-control" type="password" name="pass" required autofocus maxlength="25"><br>

                    <h5>Adjunte Foto de Perfil: </h5>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Seleccione una imagen desde su equipo</label>
                    </div><br><br>

                    <h5>Digite su Correo: </h5>
                    <input class="form-control" type="email" name="correo" required autofocus maxlength="50"><br>

                    <h5>Seleccione el tipo de documento: </h5>
                    <select class="form-control" name="FK_tipo_doc">
                        <option value="CC">CC</option>
                        <option value="CE">CE</option>
                        <option value="TI">TI</option>
                    </select><br><br>

                    <input type="hidden" name="accion">
                    <input class="btn btn-success form-control" type="submit" value="Registrar"><br>
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
                    <small>CALLE 78 SUR 78 71 IN 123, BOGOTA, BOGOTA, COLOMBIA</small><br><br>
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