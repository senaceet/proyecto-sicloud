<?php
include_once '../clases/class.conexion.php';
include_once '../clases/class.pago.php';
include_once '../plantillas/inihtml.php';

$datos = Pago::verPago();
// creando tabla
?>
<div class="col-md-6 p-2 mx-auto ">
    <table class=" table table-bordered  table-striped bg-white table-sm mx-auto   text-center">
        <?php
        echo
            "<tr>
    <th>ID pago</th>
    <th>Pago</th>
    <th>Eliminar</th>
</tr>
";



        while ($row = $datos->fetch_array()) {
        ?>
            <tr>
                <td><?php echo  $row['ID_tipo_pago'] ?> </td>
                <td id='nombre_pago' data-id_pago= '<?php echo $row['ID_tipo_pago'] ?>'contenteditable > <?php echo $row['nom_tipo_pago'] ?></td>
                <td><button class='btn btn-primary' id='eliminar'>Eliminar</button></td>
            </tr>
        <?php
        } // fin de while
        ?>
        <tr>
            <td id='pago_add' ></td>
            <td id='nombre_add'   contenteditable    ></td>
            <td><button class="btn btn-primary"  id='add'>Agragar</button></td>
        </tr>


    </table>
</div>





<?php

include_once '../plantillas/finhtml.php';
?>