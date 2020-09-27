<?php
include_once '../global/plantillas/plantilla.php';
include_once '../global/plantillas/nav/navN1.php';
include_once '../global/plantillas/cuerpo/inihtmlN1.php';
include_once '../controlador/ControladorSession.php';
?>


<!-- col 12 -->
<br><br>
<div class="col-md-12 ">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class=" radix  card card-body text-center bk-rgb borde-1-card ">
                <h3 class="card-title">Recuperar contraseña</h3><br><br>
                <h5 class="card-text">Ingrese correo electronico para enviar link de restablecimiento de contraseña</h5><br><br>
                <form action="CU0010-recuperarcontrasena.php" method="POST">
                    <div class="form-group"><input type="text" class="form-control" placeholder="Ingrese correo"></div><br><br>
                    <input type="submit" class="form-control btn btn-primary">
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>



<?php

include_once '../global/plantillas/cuerpo/footerN1.php';
include_once '../global/plantillas/cuerpo/finhtml.php';
?>