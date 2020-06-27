<?php
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'clases/class.conexion.php';
include_once 'clases/class.categoria.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.medida.php';
include_once 'clases/class.proveedor.php';
include_once 'plantillas/nav/navN1.php';
include_once 'plantillas/plantilla.php';
include_once 'session/sessiones.php';
include_once 'session/valsession.php';




cardtitulo("Ingreso de producto-Bodega");
?>


<?php
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
        <h5 class="card-title text-center ">Seleccione producto</h5>
        <!-- INI--FORM PRODUCTO--------------------------------------------------------------------------------- -->
        <form action="CU003-ingresoProducto.php" method="GET">
            <select name="p" class="form-control">
                <?php
                $datos = Producto::verProductos();
                while ($row = $datos->fetch_array()) {

                ?>
                    <option value="<?php echo $row['ID_prod'] ?>"><?php echo $row['nom_prod'] ?></option>

                <?php } ?>
            </select>
            <br> <input class="btn btn-primary btn-block my-2" type="submit" name="consulta" value="Validar exitencia">

        </form>
        <a class="btn btn-primary btn-block" href="CU004-crearproductos.php">Crear producto</a>
        <!-- fin producto-------------------------------------------------------------------------------- -->

    </div><!-- fin de card-body-->
</div><!-- fin de card -->



<?php
if (isset($_GET['consulta'])) {
    $id = $_GET['p'];
?>

    <div class="card card-body text-center  col-md-10 mx-auto my-4 ">
        <div class=" container-fluid ">
            <div class="card card-body "> <br>
                <div class="row">

                    <?php

                    $datos = Producto::verJoin($id);
                    while ($row = $datos->fetch_array()) {
                    ?>

                        <div class="col-md-4">
                            <!-- inicio de divicion 1 -->
                            <!-----------INI FORM INGREZAR CANTIDAD------------------------------------------------------------------------------------------>
                            <form action="metodos/post.php?accion=IngresarCantidad&&id=<?php echo $row['ID_prod'] ?>" method="POST">
                                <!-- derecha -->

                                <div class="form-group"><label for="">ID Producto</label><input class="form-control" value="<?php echo $row['ID_prod'] ?>" type=»text» disabled=»disabled» laceholder="ID producto" value="<?php $row['ID_prod']  ?> " ; name="ID_prod"></div>
                                <div class="form-group"><label for="">Nombre Producto</label><input class="form-control" value="<?php echo $row['nom_prod']  ?>" type=»text» disabled=»disabled» lass="form-control" placeholder="Nombre producto" name="nom_prod"></div>
                                <div class="form-group"><label for="">Valor Producto</label><input class="form-control" type=»text» disabled=»disabled» value="<?php echo $row['val_prod']  ?>" class="form-control" placeholder="Valor" name="val_prod"></div>
                                <div class="form-group"> <input class="btn btn-primary form-control" type="submit" name="submit" value="Registrar entrega"> </div>

                        </div><!-- fin de primera divicion-->

                        <div class="col-md-4">

                            <!-- inicio de 2 divicion -->
                            <!-- Izquierda -->
                            <div class="form-group"><label for="">Estado</label><input type=»text» disabled=»disabled» class="form-control" value="<?php echo $row['estado_prod'] ?>" name="estado_prod" required autofocus></div>
                            <div class="form-group"><label for="">Stock Inicial</label><input type=»number» readonly=»readonly» class="form-control" value="<?php echo $row['stok_prod'] ?>" name="stok" required autofocus></div>
                            <div class="form-group"><label for="">ID factura Proveedor</label><input type="text" class="form-control" value="<?php echo "" ?>" name="num_fac_ing" autofocus></div>
                            <div class="form-group"><label for="">Fecha de resepcion</label><input type="date" class="form-control" placeholder="Proveedor" name="fecha"></div>
                            <div class="form-group"><label for="">Cantidad</label><input type="number" class="form-control" placeholder="Cantidad" name="cantidad"></div>

                        </div><!-- fin de segunda divicion-->

                        <div class="col-md-4">

                            <div class="form-group"><label for="">Categoria de producto</label>
                                <input type=»text» disabled=»disabled» value="<?php echo $row['nom_categoria']   ?>" class="form-control">
                            </div><!--  fin de form-group Producto -->
                            <div class="form-group"><label for="">Medida</label><input class="form-control" type="»text»" disabled=»disabled» value="<?php echo $row['nom_medida'] ?>"></div><!--  fin de form-group Medida -->
                            <div class=" form-group"><label for="">Empresa proveedor</label><input class="form-control" type=»text» disabled=»disabled» value="<?php echo $row['nom_empresa'] ?> ">
                            </div><!--  fin de form-group Provedor-->
                            <input type="hidden" name="accion" value="inserCatidadProducto">
                            <!-- BOTON A ENLACE TABLA -->
                            </form>
                            <!-- fin de form cantidad----------------------------------------------------------------------------------------------------------  -->
                            <div class="form-group "><a class="btn btn-primary form-control" href="CU004-crearproductos.php?accion=verProducto">Ver productos existentes</a></div>

                        </div><!-- fin de tercera divicion -->
                </div><!-- row -->
            </div><!-- fin card body interno -->
        </div><!-- fin de container fluid -->
    </div><!-- Card externo -->


<?php

                    } // fin del while
                } // fin de isset id get
                include_once 'plantillas/finhtml.php';
?>