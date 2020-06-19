<?php
require 'plantillas/nav.php';
require 'plantillas/plantilla.php';
require 'clases/class.categoria.php';
include_once 'clases/class.producto.php';

//require 'class.medida.php';
require 'clases/class.usuario.php';
//require 'class.conexion.php';
require 'clases/class.medida.php';
require 'clases/class.proveedor.php';
//require 'clases/class.producto.php;';


inihtml();

cardtitulo("Alertas");

$d = new Conexion;
?>
<div class="container">
    <div class="card card-body bg-secondary">
        <div class="row">
        <table class="table table-striped table-hover bg-bordered bg-light table-sm col-md-10 col-sm-4 col-xs-12 mx-auto">
            <thead>
                <tr>
                <th>Nombre Producto</th>
                <th>Valor Producto</th>
                <th>Stock </th>
                <th>Estado del producto</th>
                <th>categoria</th>
                <th>Medida</th>
                </tr>
            </thead>
            <?php
                $datos = Producto::verProductos();
                while( $row = $datos->fetch_array()){
                ?>
            <tbody>
             <tr>  
            <td><?php echo $row['nom_prod'] ?></td>
            <td><?php echo $row['val_prod']?></td>
            <td class="bg-success"><?php echo $row['stok_prod']?></td>
            <td><?php echo $row['estado_prod']?></td>
            <td><?php echo $row['CF_categoria']?></td>
            <td><?php echo $row['CF_tipo_medida']?></td>
            </tr>
        </tbody>
        <?php
                }
        ?>
        </table>

        </div>
    </div>
</div>