<?php

include_once '../../plantillas/inihtml.php';
include_once '../../plantillas/plantilla.php';
include_once '../../plantillas/navN3.php';
include_once '../../clases/class.categoria.php';
include_once '../../clases/class.producto.php';



cardtitulo("Conteo de productos");

?>


<div class="col-md-4 p-2 mx-auto my-4 ">
    <table class="table table-bordered  table-striped bg-white table-sm mx-auto   text-center">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Stok</th>
            </tr>
        </thead>
        <?php
        $datos = Producto::ConteoProductosT();
        while ($row = $datos->fetch_array()) {
        ?>
            <tbody>
                <tr>
                    <td> <?php echo $row['nom_prod']  ?></td>
                    <td> <?php echo $row['total']  ?></td>
                </tr>
            </tbody>
        <?php    }  ?>
    </table>
</div><!-- fin de div tabla responce -->

<?php
include_once '../../plantillas/finhtml.php';
?>