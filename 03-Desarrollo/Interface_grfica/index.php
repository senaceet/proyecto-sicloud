<?php
require 'nav.php';
require 'plantilla.php';
inihtml();


?>

<!-- col 12 -->
<div class="col-md-12">
    <div class="row">

    <!-- col 4 -->
    <div class ="col-md-5"></div>

    <!-- 4 -->
    <div class ="col-md-2">

    <div class = "card card-body text-center bk-rgb">
        <h5>Login</h5><br>
        <form action="control.php" >
            <div class = "form-group">
            <select name="Tdoc" class="form-control" >
                <option value="CC">Cedula</option>
                <option value="CE">Cedula extranjera</option>
                <option value="PS">Pasaporte</option>
            </select>
            </div>

            <div class="form-group"><input class =  "form-control" placeholder="Numero de documento" type="text" name ="Ndocumento"></div>
            <div class="form-group"><input class =  "form-control" placeholder="Contraseña" type="text" name ="pass"></div>
            
            <input type="submit" class ="form-control btn btn-primary"><br><br>
            <a href="">¿ a olvidado contraseña ?</a>
        </form>
    </div>


    </div>
    <!-- col 4 -->
    <div class ="col-md-5"></div>
    </div>
</div>


<?php



finhtml();
?>