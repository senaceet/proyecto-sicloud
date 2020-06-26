<?php
include_once 'plantillas/plantilla.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'plantillas/nav/navN1.php';

include_once 'session/sessiones.php';
include_once 'session/valsession.php';
include_once 'clases/class.factura.php';
include_once 'clases/class.conexion.php';

cardtitulo("Informe de Bodega");

?>
<div class="card card-body text-center col-md-10 mx-auto">
    <!--<div class="container">-->
    <div class=" container-fluid ">
        <div class="card card-body ">
        </div><br>


        <form action="CU012-InformeBodega.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <!-- derecha -->
                        <label for="start">Fecha inicial:</label>
                        <div class="form-group"><input class="form-control" type="date" id="start" name="f1" value="2020-05-01" min="0000-00-00" max="9999-99-99"></div>
                        <label for="start">Fecha fin:</label>
                        <div class="form-group"><input class="form-control" type="date" id="start" name="f2" value="2020-05-25" min="0000-00-00" max="9999-99-99"></div>
                    </div><!-- fin primera columna de 6 -->
          

          
                    <div class="col-md-6">
                        <!-- Izquierda -->
                        Formato de descarga <br>
                        <select class="form-control">
                            Periodo promedio
                            <option>CSV</option>
                            <option>EXCEL</option>
                            <option>PDF</option>
                            <option>XML</option>
                        </select><br>

                        <div class="form-group"> <input class="btn btn-primary form-control" type="submit" value="Ver informe" name ="consulta"> </div>
                    </form>
                        <a class="btn btn-block btn-primary my-2" href="">Imprimir informe</a>
                    </div><!-- fin de segunda columna de 6 -->
                
            </div><!-- fin de row -->
    </div><!-- fin de container fluid -->
</div><!-- fin de card -->

<?php  
if(isset($_POST['consulta'])){
$f1 = $_POST['f1'];
$f2 = $_POST['f2'];






?>



<div class="container">
            <div class="my-4">
                <div class="row">
                    <table class="table table-striped table-hover bg-bordered bg-light table-sm col-md-10 col-sm-4 col-xs-12 mx-auto">
                        <thead>
                            <tr>
                                <th>ID factura</th>
                                <th>total</th>
                                <th>fecha</th>
                                <th>sub total</th>
                            </tr>
                        </thead>
                        <?php
                        $datos = Factura::verIntervaloFecha($f1, $f2);
                        while ($row = $datos->fetch_array()) {


                            
        
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['ID_factura'] ?></td>
                                    <td><?php echo $row['total'] ?></td>
                                    <td class=" <?php echo  $c  ?>"><?php echo $row['fecha'] ?></td>
                                    <td><?php echo $row['sub_total'] ?></td>
                                    <td><?php echo "Salida de producto" ?></td>
                                </tr>
                            </tbody>
                        <?php
                        }// fin de while tabla
                        ?>
                    </table>


        

                </div>
            </div>
        </div>




<?php
}
include_once 'plantillas/finhtml.php';
?>