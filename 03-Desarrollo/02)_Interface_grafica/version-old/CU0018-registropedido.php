<?php




//comprobacion de rol

include_once 'session/sessiones.php';
include_once 'session/valsession.php';

$in = false;
if ($_SESSION['usuario']['ID_rol_n']  == 1) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n'] == 2) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n'] == 3) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n'] == 5) {
    $in = true;
}




if ($_SESSION['usuario']['estado'] == 0) {
    $in = false;
}


if ($in == false) {
    echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
    echo "<script>window.location.replace('index.php');</script>";
} else {

    //--------------------------------------------------------------------------





include_once 'plantillas/plantilla.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'plantillas/nav/navN1.php';



?>
<div class="container-fluid">

    <?php cardtituloS("Registro de pedido") ?>


    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="row">
                        <div class="card mx-auto text-center bk-rgb">
                            <div class="card-card-header">
                                <h6>Facturacion</h6>
                            </div>
                            <div class="container-fluid">



                                <!-- desplegables -->

                                <div class="form-group">
                                    <select name="factura" class="form-control mx-auto ">
                                        <option value="Excel">Excel</option>
                                        <option value="PDF">PDF</option>
                                    </select>
                                </div>
                                <div class="form-group  mx-auto"><input type="number" name="NumeroImresion" class="form-control" placeholder="Numero impresion"></div>




                                <!-- Botones -->
                                <div class="">
                                    <div class="form-group "><a class="btn btn-primary form-control" href="">Imprimir</a></div>
                                    <div class="form-group"><a class="btn btn-primary form-control" href="">Exprotar</a></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 "><br>
                            <select name="op2" class="form-control mx-auto col-md col-lg-4 ">
                                <option value="pendientes">Pendientes</option>
                                <option value="Aprobados">Entrgados</option>
                            </select>
                        </div>
                        <div class="col-md-6"><br>
                            <input type="text" class="form-control col-md col-lg-4 " placeholder="ID pedido " name="documento">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>


    <table class=" table table-bordered table-striped bg-white table-sm">
        <thead>
            <tr>
                <td>ID pedido</td>
                <td>Fecha de solicitud</td>
                <td>Fecha entrega</td>
                <td>Estado</td>
                <td>Prorducto</td>
                <td>Cantidad</td>
                <td>Tipo medida</td>
                <td>Valor unitario</td>
                <td>Valor total</td>



            </tr>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td>
                <a href="" class="btn btn-secondary">Posponer</a>
                <a href="" class="btn btn-success">Entregar</a>
            </td>
        </tbody>
    </table>
</div>
<?php
}// fin de validar permisos
include_once 'plantillas/cuerpo/footerN1.php'; 
include_once 'plantillas/cuerpo/finhtml.php';
?>