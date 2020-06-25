<?php

include_once 'plantillas/plantillaN1.php';
include_once 'clases/class.categoria.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.usuario.php';
include_once 'clases/class.medida.php';
include_once 'clases/class.proveedor.php';
include_once 'plantillas/inihtml.php';
include_once 'plantillas/nav/navN1.php';
include_once 'session/sessiones.php';
include_once 'session/valsession.php';


cardtitulo("Alertas");


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
            <td><?php echo $row['nom_categoria']?></td>
            <td><?php echo $row['nom_medida']?></td>
            </tr>
        </tbody>
        <?php
                }
        ?>
        </table>

        </div>
    </div>
</div>

<?php 
include_once 'plantillas/finhtml.php';
?>