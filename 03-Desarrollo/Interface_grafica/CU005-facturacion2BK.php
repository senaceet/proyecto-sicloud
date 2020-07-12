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
    include_once 'clases/class.factura.php';
    include_once 'clases/class.producto.php';




?>
    <!-- col 12 -->



    <div class="container-fluid col-md-8 my-4">
        <div class="row">


            <!-- Formulario datos cliente---------------------------------------------------------------------------------------------- -->
            <div class="col-md-12">
                <h2 class="my-4 e">Nueva venta</h2>
                <p class="e">Datos de cliente</p>
                <div class="card card-body">
                    <form action="CU005-facturacion2.php">
                        <button type="submit" class="btn btn-outline-success col-md-1 my-1 btn-sm">Buscar</button>
                        <div class="card card-body shadow">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group"><label for="">Cedula Cliente</label><input type="text" value= "<?php echo $_GET['ID']?>" class="form-control" name="ID" /></div>

                                </div><!-- fin de primera divicion de 3 -->

                

                    <?php
                
                    if (isset($_GET['ID'])){
                        $id_us=$_GET['ID'];
                        $us = Factura::verUsuarioFactura($_GET['ID']);
                    while ($row = $us->fetch_assoc()) {


                    ?>

                        <div class="col-md-4">
                            <div class="form-group"><label for="">Nombre</label><input type=»text» readonly=»readonly» class="form-control" value="<?php echo $row['nom1'] . $row['nom2'] . " " . $row['ape1'] . " " . $row['ape2'];  ?>" /></div>
                        </div><!-- fin de segunda divicion de 3 -->
                        <div class="col-md-4">
                            <div class="form-group"><label for="">Telefono</label><input type=»text» readonly=»readonly» class="form-control" value="<?php echo $row['tel'] ?>" /></div>
                        </div><!-- fin de tercera divicion de 3 -->
                        <div class="form-group col-md-12"><label for="">Direccion</label><input type=»text» readonly=»readonly» class="form-control" value="<?php echo $row['dir'] ?>" /></div>
                    <?php } } ?>
                </div><!-- fin de div row -->

            </div><!-- fin de card -->

        </div><!-- fin de card -->
    </div>
    <!-- Formulario datos cliente---------------------------------------------------------------------------------------------- -->



    <!-- Formulario datos cliente---------------------------------------------------------------------------------------------- -->
    <div class="col-md-12">
        <br><br><br>
        <p class="e">Datos de venta</p>
        <div class="card card-body ">
            <div class="card card-body  shadow">
                <div class="row">
                    <p>
                        <label for="">Vendedor</label><br>

                        <?php echo $_SESSION['usuario']['nom1'] . " " . $_SESSION['usuario']['ape1'] ?>
                    </p>

                    <div class="ml-auto"><label for="">Accion</label><br><a href="#" class="btn btn-danger  ">Anular</a></div>




                </div><!-- fin de row -->

            </div><!-- fin de row -->
        </div><!-- fin de card -->
    </div><br><br>
    <!-- Formulario datos cliente---------------------------------------------------------------------------------------------- -->
    </div>


    <!-- tabla de productos 01-------------------------------------------------------------------------------------- -->



    <div class="col-md-12">
        <table class="table table-striped bg-bordered bg-white table-sm col-md-12 col-sm-4 col-xs-12 my-4 text-center mx-auto">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th>Codigo</th>
                    <th>Accion</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                   
                </tr>
            </thead>

            <tbody>
                <tr>
                   
                    <td><input type="text" name = "id_p" class = "form-control mx-auto col-md-4"></td>
                   
                    <td>
                        <input type="submit"  class = "btn btn-outline-success  my-1 btn-sm" value ="Buscar">
                        </form>
                        <input type="submit"  class = "btn btn-outline-success  my-1 btn-sm" value ="Agregar">
                </td>

                    <?php
                    if (isset($_GET['id_p'])) {
                        $datos = Producto::verProductosId($_GET['id_p']);
                        while ($row = $datos->fetch_array()) {
                    ?>
                            <td><?php echo $row['nom_prod']    ?> </td>
                            <td><input type="text" name = "cantidad" class = "col-md-4 mx-auto form-control"> </td>
                            <td><?php echo $row['val_prod']    ?> </td>
               
                </tr>
            </tbody>

    <?php  }
                    }  ?>
        </table>
    </div>













    </div>










<?php
    include_once 'plantillas/cuerpo/footerN1.php';
    include_once 'plantillas/cuerpo/finhtml.php';
} // fin de validacion permisos de ingreso
?>