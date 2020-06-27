<?php
require 'nav-CU001.php';
require 'plantilla.php';
inihtml();


?>

<!-- col 12 -->
<div class="col-md-12">
    <div class="row">

    <!-- col 4 -->
    <div class ="col-md-4"></div>

    <!-- 4 -->
    <div class ="col-md-4">

    <div class = "card card-body text-center bk-rgb">
        <h5>Iniciar sesión</h5><br>
        <form action="control.php" >
            <div class = "form-group">
            <select name="Tdoc" class="form-control" value="" >
                <option value="CC">Cedula</option>
                <option value="CE">Cedula extranjera</option>
                <option value="PS">Pasaporte</option>
            </select>
            </div>

            <div class="form-group"><input class =  "form-control" placeholder="Numero de documento" type="text" name ="Ndocumento" required></div>
            <div class="form-group"><input class =  "form-control" placeholder="Contraseña" type="text" name ="password" required></div>
            <input type="checkbox" name="cb-autos" value="Permiso"> Acepta terminos y condiciones.<br><br>
            <input type="submit" class ="form-control btn btn-primary" name="InicioSEsion" value="Iniciar sesión" required><br><br>
            <a href="">¿ a olvidado contraseña ?</a>

        </form>
    </div>


    </div>
    <!-- col 4 -->
    <div class ="col-md-4"></div>
    </div>
</div>


<?php



finhtml();
?>