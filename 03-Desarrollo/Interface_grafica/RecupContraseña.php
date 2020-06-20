<?php
require 'plantillas/nav.php';
require 'plantillas/plantilla.php';
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
        <h5>Recuperar contraseña</h5><br>
        <p>Ingrese la direccion de correo electronico donde enviaremos el
            link para reestablecer su contraseña
        </p>
        <form action="control.php" >
            <div class="form-group">
                <input class =  "form-control" placeholder="Correo o tipo de documento" type="email" name ="Rcont">
            </div>            
            <input type="submit" class ="form-control btn btn-primary"><br><br>
        </form>
        <!-- col 4 -->
    <div class ="col-md-8"></div>
    </div>
</div>


<?php



finhtml();
?>