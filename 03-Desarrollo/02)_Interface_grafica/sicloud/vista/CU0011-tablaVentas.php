<?php

//comprobacion de rol

include_once '../controlador/controladorsession.php';
//comprobacion de rol
$in = false;
switch ($_SESSION['usuario']['ID_rol_n']) {
    case 1:
        $in = true;
    break;
    case 4:
        $in = true;
    break;
    case 3:
        $in = true;
    break;

    default:
        echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    break;
}
if ($in == false) {
    echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
    echo "<script>window.location.replace('index.php');</script>";
} else {
    //--------------------------------------------------------------------------

include_once 'plantillas/plantilla.php';
include_once '../modelo/class.categoria.php';
include_once '../modelo/class.producto.php';
include_once '../modelo/class.factura.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'plantillas/nav/navN1.php';
include_once '../controlador/controlador.php';

$objModFact = new ControllerDoc();
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
        //$datos = Factura::verjoinFactura();
        $datos = $objModFact->verjoinFactura();
        //while($row = $datos->fetch_array()  ){
        foreach($datos as $i => $row){
             
         ?>
            <tbody>
                <tr>
                     <td><?php echo $row['ID_us']    ?></td>
                     <td><?php echo $row['nom1']    ?> </td>
                     <td><?php echo $row['ape1']    ?> </td>
                     <td><?php echo $row['nom_prod']    ?> </td>
                     <td><?php echo $row['fecha']    ?> </td>
                     <td><?php echo $row['nom_tipo_pago']    ?> </td>
                     <td><?php echo $row['total']    ?> </td>
                </tr> 
            </tbody>

            <?php  }   ?>
                </table>
        </div>
    </div>
</div>

<?php

include_once 'plantillas/cuerpo/footerN1.php'; 
include_once 'plantillas/cuerpo/finhtml.php';
    }// finde validar permisos
?>