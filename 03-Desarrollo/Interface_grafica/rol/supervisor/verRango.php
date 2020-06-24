<?php

include_once '../../plantillas/inihtml.php';
include_once '../../plantillas/plantilla.php';
include_once '../../plantillas/navN3.php';
include_once '../../clases/class.categoria.php';
include_once '../../clases/class.producto.php';
include_once '../../clases/class.conexion.php';
require '../../clases/class.factura.php';
include_once '../../session/sessiones.php';
include_once '../../session/valsession.php';



cardtitulo("Vista de Informes de ventas");




if (isset($_SESSION['message'])) {
?>
    <!-- alerta boostrap -->
    <div class="col-md-4 mx-auto alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
        <?php
        echo  $_SESSION['message']  ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    setMessage();
}
?>


<div class="card col-md-4 mx-auto">
    <div class="card-body">
        <h5 class="card-title text-center ">Seleccione Informe</h5>
        <!-- INI--FORM PRODUCTO--------------------------------------------------------------------------------- -->
        <form action="verRango.php" method="POST">
            <select name="ventas" class="form-control">

                <option value="dia">Por Dia</option>
                <option value="semana">Por Semana</option>
                <option value="mes">Por Mes</option>

            </select>
            <input type="hidden" name="accion" value='verRango'>
            <br> <input class="btn btn-primary btn-block my-2" type="submit" name="consulta" value="consulta">

    </div>
</div>
</form>

<div class="col-md-4 p-2 mx-auto my-4 ">
    <table class="table table-bordered  table-striped bg-white table-sm mx-auto   text-center">


        <?php


        if (isset($_POST['ventas'])) {

            if ($_POST['ventas'] == 'dia') {

        ?>

                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Dia</th>
                    </tr>
                </thead>

                <?php


                $datos = Factura::verDia();
                while ($row = $datos->fetch_array()) {
                ?>


                    <tbody>
                        <tr>
                            <td> <?php echo $row['cantidad']  ?></td>
                            <td> <?php echo $row['total']  ?></td>
                            <td> <?php echo $row['dia']  ?></td>
                        </tr>
                    </tbody>


                <?php   } //while
                ?>

    </table>



<?php } // fin de consulta por dia


            //------------------------------------------FIN DE CONSULTA POR DIA-------------------------------------------


            if ($_POST['ventas'] == 'semana') {

?>

    <div class="col-md-4 p-2 mx-auto my-4 ">
        <table class="table table-bordered  table-striped bg-white table-sm mx-auto   text-center">


            <thead>
                <tr>
                    <th>Cantidad de ventas por semana</th>
                    <th>Total</th>
                    <th>Dia cierre ventas</th>
                </tr>
            </thead>

            <?php


                $datos = Factura::verSemana();
                while ($row = $datos->fetch_array()) {
            ?>


                <tbody>
                    <tr>
                        <td> <?php echo $row['cantidad']  ?></td>
                        <td> <?php echo $row['Total']  ?></td>
                        <td> <?php echo $row['dia_final_semana']  ?></td>
                    </tr>
                </tbody>


            <?php   } //while
            ?>

        </table>

    <?php } // fin de consulta por 

    ?>

    </div><!-- fin de tabla responce -->



    <!-- fin busqueda por semana-------------------------------------------------------------------------------- -->



<?php

    if ($_POST['ventas'] == 'mes') {

?>

    <div class="col-md-4 p-2 mx-auto my-4 ">
        <table class="table table-bordered  table-striped bg-white table-sm mx-auto   text-center">


            <thead>
                <tr>
                    <th>Cantidad de ventas por Mes</th>
                    <th>Total</th>
                    <th>Dia cierre ventas</th>
                </tr>
            </thead>

            <?php


                $datos = Factura::verMes();
                while ($row = $datos->fetch_array()) {
            ?>


                <tbody>
                    <tr>
                        <td> <?php echo $row['cantidad']  ?></td>
                        <td> <?php echo $row['Total']  ?></td>
                        <td> <?php echo $row['dia_final_mes']  ?></td>
                    </tr>
                </tbody>


            <?php   } //while
            ?>

        </table>

    <?php } // fin de consulta por 

    ?>

    </div><!-- fin de tabla responce -->
























<?php
        } // fin de isset consulta

        include_once '../../plantillas/finhtml.php';
?>