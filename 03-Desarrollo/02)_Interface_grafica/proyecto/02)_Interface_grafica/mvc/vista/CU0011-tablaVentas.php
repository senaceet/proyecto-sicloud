<?php

//comprobacion de rol

/*

include_once 'session/sessiones.php';
include_once 'session/valsession.php';

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

*/
    //--------------------------------------------------------------------------

include_once '../global/plantillas/plantilla.php';
include_once '../modelo/class.categoria.php';
include_once '../modelo/class.producto.php';
include_once '../modelo/class.factura.php';
include_once '../global/plantillas/cuerpo/inihtmlN1.php';
include_once '../global/plantillas/nav/navN1.php';



cardtitulo("Informe de venta");

//$d = new Conexion;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <table  class = "table table-striped bg-bordered bg-white table-sm col-md-10 col-sm-4 col-xs-12 mx-auto">
            <thead>
            <tr>
                <th>No. de documento</th>
                <th>Primer nombre</th>
                <th>Primer apellido</th>
                <th>Producto</th>
                <th>Fecha</th>
                <th>Medio de pago</th>
                <th>Total</th>
            </tr>
            </thead>
        <?php  
        
        $datos = Factura::verjoinFactura();
        while($row = $datos->fetch_array()  ){

             
          ?>
            <tbody>
                <tr>
                     <td> <?php   echo $row['ID_us']    ?></td>
                     <td><?php   echo $row['nom1']    ?> </td>
                     <td><?php   echo $row['ape1']    ?> </td>
                     <td><?php   echo $row['nom_prod']    ?> </td>
                     <td><?php   echo $row['fecha']    ?> </td>
                     <td><?php   echo $row['nom_tipo_pago']    ?> </td>
                     <td><?php   echo $row['total']    ?> </td>
                </tr> 
            </tbody>

            <?php  }   ?>
                </table>
        </div>
    </div>
</div>

<?php

include_once '../global/plantillas/cuerpo/footerN1.php'; 
include_once '../global/plantillas/cuerpo/finhtml.php';
 //       }// finde validar permisos
?>