<?php
include_once 'plantillas/navgeneral.php';
require 'plantillas/nav-CU007-facturacion.php';
require 'plantillas/plantilla.php';
include_once 'session/sessiones.php';
include_once 'plantillas/inihtml.php';
include_once 'session/sessiones.php';
include_once 'session/valsession.php';
?>
<!-- col 12 -->
<div class="col-md-12">
    <div class="row">

        <!-- col 2 -->
        <div class="col-md-4"></div>
        <!-- 8 -->
        <div class="col-md-4">
            <div class="card card-body text-center bk-rgb">
                <h5>Facturación</h5><br>
                <form action="factura.php">
                    <div class="form-group">
                        <input class="form-control" placeholder="ID Usuario" type="text" name="ID_Usuario" required>

                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="ID Cliente" type="text" name="ID_Cliente" required></div>
                    <div class="form-group">
                        <input class="form-control" placeholder="ID Producto" type="text" name="ID_Producto" required></div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Cantidad" type="text" name="CantidadProducto" required></div>
                    <br>
                    <input type="submit" class="form-control btn btn-primary" name="RegistroProducto" value="Registrar" required><br><br>
                    <input type="submit" class="form-control btn btn-primary" name="VisualizarFactura" value="Visualizar factura"><br>
                </form>
            </div>
        </div>
    </div>
    <!-- col 2 -->
    <div class="col-md-4"></div>

</div>
<?php
include_once 'plantillas/finhtml.php';
?>