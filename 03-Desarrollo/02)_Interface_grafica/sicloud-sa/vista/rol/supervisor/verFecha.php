

<?php

include_once '../../plantillas/plantilla.php';
include_once '../../plantillas/cuerpo/inihtmlN3.php';
include_once '../../plantillas/nav/navN3.php';
include_once '../../../controlador/ControladorSession.php';

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
        <form action="verFecha.php" method="POST">
           
            <input type="date" name="Fecha" class="form-control">
            <input type="hidden" name="accion" value = 'verFecha'>
            <br> <input class="btn btn-primary btn-block my-2" type="submit" name="consulta" value="consulta">

    </div>
</div>    
 </form>

        <div class="col-md-4 p-2 mx-auto my-4 ">
            <table class="table table-bordered  table-striped bg-white table-sm mx-auto   text-center">


                <?php


if(isset($_POST['accion'])){




                if ($_POST['accion'] == 'verFecha') {
                    $f = $_POST['Fecha'];
        

                ?>

                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Dia</th>
                        <th>Semana</th>
                    </tr>
                </thead>

                <?php
                //echo $f;


                 $datos = Factura::verFecha($f);
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



                <?php } // fin de consulta por fecha
                 ?>


        </div>
        <!-- fin producto-------------------------------------------------------------------------------- -->


        <?php



        ?>



 

        <?php




        ?>

        <?php
        }// fin de isset consulta

        include_once '../../plantillas/cuerpo/finhtml.php';
        ?>












