<?php


//comprobacion de rol

//include_once 'session/sessiones.php';
//include_once 'session/valsession.php';

/*

$in = false;
if ($_SESSION['usuario']['ID_rol_n']  == 1) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n'] == 4) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n'] == 3) {
    $in = true;
}

if ($_SESSION['usuario']['estado'] == 0) {
    $in = false;
}


if ($in == false) {
    echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
    echo "<script>window.location.replace('index.php');</script>";
} else {


  *///  
    //--------------------------------------------------------------------------



    include_once '../global/plantillas/plantilla.php';
    include_once '../global/plantillas/nav/navN1.php';
    include_once '../global/plantillas/cuerpo/inihtmlN1.php';


    cardtitulo("Informe de ventas");

?>
    <div class="card card-body text-center col-md-10 mx-auto">
        <!--<div class="container">-->
        <div class=" container-fluid ">
            <div class="card card-body ">
            </div><br>


            <form action="CU0011-informeventas.php">
                <div class="row">
                    <div class="col-md-6">
                        <!-- derecha -->
                        <label for="start">Fecha inicial:</label>
                        <div class="form-group"><input class="form-control" type="date" id="start" name="trip-start" value="2020-05-01" min="0000-00-00" max="9999-99-99"></div>
                        <label for="start">Fecha fin:</label>
                        <div class="form-group"><input class="form-control" type="date" id="start" name="trip-start" value="2020-05-25" min="0000-00-00" max="9999-99-99"></div>
                    </div><!-- fin primera columna de 6 -->

                    <div class="col-md-6">
                        <!-- Izquierda -->
                        Formato de descarga <br>
                        <select class="form-control">
                            Periodo promedio
                            <option>CSV</option>
                            <option>EXCEL</option>
                            <option>PDF</option>
                            <option>XML</option>
                        </select><br>

                        <div class="form-group"> <input class="btn btn-primary form-control" type="submit" value="Descargar CSV"> </div>
                        <a class="btn btn-block btn-primary my-2" href="CU0011-tablaVentas.php">Vizualizar informe</a>
                    </div><!-- fin de segunda columna de 6 -->
            </form>
        </div><!-- fin de row -->
    </div><!-- fin de container fluid -->
    </div><!-- fin de card -->




<?php

    include_once '../global/plantillas/cuerpo/footerN1.php';
    include_once '../global/plantillas/cuerpo/finhtml.php';
//} // fin de validar permisos
?>