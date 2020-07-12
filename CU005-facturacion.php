<?php



include_once 'session/sessiones.php';
include_once 'session/valsession.php';




//comprobacion de rol
$in = false;
if ($_SESSION['usuario']['ID_rol_n']   == 1) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n']   == 4) {
    $in = true;
}

if ($_SESSION['usuario']['estado'] == 0) {
    $in = false;
}


if ($in == false) {
    echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
    echo "<script>window.location.replace('index.php');</script>";
} else {
    //------------------------------------------------------------------------------------




    include_once 'plantillas/plantilla.php';
    include_once 'plantillas/cuerpo/inihtmlN1.php';
    include_once 'plantillas/nav/navN1.php';
    include_once 'clases/class.usuario.php';


?>
    <!-- col 12 -->
    <div class="col-md-12">
        <div class="row">


            <!-- col 2 -->
            <div class="col-md-4">

            </div>
            <!-- 8 -->
            <div class="col-md-4">
                <div class="card card-body text-center ">
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
                    <div class=""><br>
                        <form action="CU009-controlusuarios.php" method="POST">
                            <div class="form-group"><input type="text" class="form-control  " placeholder="ID usuario " name="documento"></div>
                            <input type="hidden" value="bId" name="accion">
                            <div class="form-group "><input class="btn btn-block btn-primary form-control " type="submit" value="Buscar id"></div>
                        </form>
                    </div>
                </div><!--  -->
            </div>
        </div>
        <!-- col 2 -->
        <div class="col-md-4"></div>

    </div>
<?php




    $usuario =  Usuario::ningunDato($id = '1662101568299');
    $datos = $usuario->selectUsuario();

    if ((isset($_POST['accion'])) &&  ($_POST['accion'] == 'bId')) {
        if ($_POST['documento'] > 0) {
            $id = $_POST['documento'];
            $usuario = Usuario::ningunDato();
            $datos = $usuario->selectIdUsuario($id);
        } else {
            echo "<script>alert('Error, digita ID de usuario')</script>";
        }
    }


















    include_once 'plantillas/cuerpo/footerN1.php';
    include_once 'plantillas/cuerpo/finhtml.php';
} // fin de validacion permisos de ingreso
?>