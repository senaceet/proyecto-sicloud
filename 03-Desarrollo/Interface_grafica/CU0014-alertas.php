<?php


include_once 'clases/class.categoria.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.usuario.php';
include_once 'clases/class.medida.php';
include_once 'clases/class.proveedor.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'plantillas/nav/navN1.php';
include_once 'plantillas/plantilla.php';
include_once 'session/sessiones.php';
include_once 'session/valsession.php';


cardtitulo("Alertas");










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


<div class="card col-md-4 mx-auto my-4">
    <div class="card-body">
        <h5 class="card-title text-center ">Seleccione Categoria</h5>
        <!-- INI--FORM Categria--------------------------------------------------------------------------------- -->
        <form action="CU014-alertas.php" method="POST">
            <select name="categoria" class="form-control">

                <?php
                $datos = Categoria::verCategoria();
                while ($row = $datos->fetch_array()) {
                ?>

                    <option value="<?php echo $row['ID_categoria']  ?>"><?php echo $row['nom_categoria']  ?></option>

                <?php } ?>

            </select>
            <input type="hidden" name="accion" value='selectCategoria'>
            <br> <input class="btn btn-primary btn-block my-2" type="submit" name="consulta" value="consulta">
        </form>
    </div>
</div>


<!--   fin de form categoria---------------------------------------------------------------------------------------------- -->

<?php
if(  (isset($_POST['accion']))   && ($_POST['accion'] == 'selectCategoria')){
$id =  $_POST['categoria'];
?>


<div class="row ">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4 mx-auto">


        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo "Categoria" ?></h6>
            </div>



            <div class="card-body">


                <?php
                $prod = Producto::verPorCategoria($id);
                while($row = $prod->fetch_array()){
                    $p  =  $row['stok_prod'];
                    $po  = 10 * $row['stok_prod'];
                    $po = $po . "%";

                    $c = "text";
                    if ($p < 2){
                        $c = "danger";
                    } elseif ($p < 6) {
                        $c = "warning";
                    } elseif ($p < 7) {
                        $c = "success";
                    }
                    $c = "bg-".$c;

                ?>
                    <h4 class="small font-weight-bold"><?php echo $row['nom_prod']  ?> <span class="float-right"><?php echo  " Cantidad de productos; " . $p ?></span> </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar <?php echo $c ?>" role="progressbar" style="width:<?php echo $po; ?>" aria-valuenow= <?php echo $c ?> aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                <?php
                }// fin de while producto
                ?>
            </div><!-- fin de card body -->
        </div><!-- fin de col categoria  -->



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
                        while ($row = $datos->fetch_array()) {


                            
                    if ($p < 2){
                        $c = "danger";
                    } elseif ($p < 6) {
                        $c = "warning";
                    } elseif ($p < 7) {
                        $c = "success";
                    }
                    $c = "bg-" . $c;

                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['nom_prod'] ?></td>
                                    <td><?php echo $row['val_prod'] ?></td>
                                    <td class=" <?php echo  $c  ?>"><?php echo $row['stok_prod'] ?></td>
                                    <td><?php echo $row['estado_prod'] ?></td>
                                    <td><?php echo $row['nom_categoria'] ?></td>
                                    <td><?php echo $row['nom_medida'] ?></td>
                                </tr>
                            </tbody>
                        <?php
                        }// fin de while tabla
                        ?>
                    </table>


                    <?php } ?>

                </div>
            </div>
        </div>

<?php
include_once 'plantillas/finhtml.php';
?>
