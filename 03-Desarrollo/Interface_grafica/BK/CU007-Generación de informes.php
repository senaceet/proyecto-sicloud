<?php
require 'plantillas/nav.php';
require 'plantillas/plantilla.php';
require 'clases/class.categoria.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.factura.php';

//require 'class.medida.php';
require 'clases/class.usuario.php';
//require 'class.conexion.php';
require 'clases/class.medida.php';
require 'clases/class.proveedor.php';
//require 'clases/class.producto.php;';
inihtml();

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
<!-- Este codigo de sql lo trate de usar pero no me funciono -->
<!--select  ID_us as "No. Documento" ,nom1 as "Primer nombre",ape1 as "Primer apellido",nom_prod as "Producto",nom_tipo_pago as "Medio de pago", total as "Total"
 from sicloud.det_factura df
join sicloud.usuario u on df.CF_us = u.ID_us and df.CF_tipo_doc = u.FK_tipo_doc
join sicloud.producto p on df.FK_det_prod = p.ID_prod
join sicloud.factura f on df.FK_det_factura = f.ID_factura
join sicloud.tipo_pago  tp on f.FK_c_tipo_pago = tp.ID_tipo_pago  order by nom1 asc; -->