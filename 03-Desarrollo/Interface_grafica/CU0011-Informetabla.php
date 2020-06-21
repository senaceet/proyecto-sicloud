<?php
include_once 'plantillas/navgeneral.php';
require 'plantillas/plantilla.php';
require 'clases/class.categoria.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.factura.php';

//require 'class.medida.php';
require 'clases/class.usuario.php';

require 'clases/class.medida.php';
require 'clases/class.proveedor.php';
include 'plantillas/inihtml.php';

cardtitulo("Informe de venta");

$d = new Conexion;
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
include_once 'plantillas/finhtml.php';
?>
