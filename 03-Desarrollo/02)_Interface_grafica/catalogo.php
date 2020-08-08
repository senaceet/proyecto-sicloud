<?php

include_once 'plantillas/plantilla.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.categoria.php';
include_once 'plantillas/nav/navN1.php';
include_once 'session/sessiones.php';
include_once 'session/config.php';
include_once 'carrito.php';


?>

<div class="col-md-12 mt-5">
    <div class="row">
        <div class="col-md-12 text-center text-white">
            <?php cardAviso();  ?>
        </div>
    </div>



    <div class="col-lg-11   card card-body mx-auto">

        <div class="card card-body shadow ">

            <div class="row">
                <div class="col-lg-6">
                    <!-- linea 1 -->
                    <form class="form-inline">
                        <div class="ml-5"><label class="text-secondary" href="catalogo.php">Digite producto </label></div>
                        <input class="form-control" type="search" placeholder="Busqueda" aria-label="Search" name="busqueda">
                        <button class="btn btn-outline-success " type="submit">Buscar</button>
                    </form>
                </div><!-- fin de primera divicion -->
               
                <div class="col-lg-6">
                    <!-- linea 2 -->
                    <form class="form-inline">
                        <em class="ml-5"> <a class="text-secondary" href="catalogo.php">Seleccione categoria</a></em>

                        <div class="form-group">
                            <select name="cat" id="" class="form-control">
                                <?php
                                $c = Categoria::verCategoria();
                                while ($row = $c->fetch_array()) {
                                ?>
                                    <option value="<?php echo $row['ID_categoria']  ?>"><?php echo $row['nom_categoria']    ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button class="btn btn-outline-success " type="submit">Buscar</button>
                    </form>
                </div><!-- fin de Segunda divicion -->
            </div><!-- fin de row -->
        </div><!-- fin de card de busqda -->


        <?php
                    if (isset($_SESSION['message'])) {
                    ?>
                        <!-- alerta boostrap -->
                        <div class="text-center  alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
                            <?php echo  $_SESSION['message']  ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php  // session_unset();
                        setMessage();
                    } ?>



        <?php
        $num = 0;
        $datos = Producto::verProductos();  // Todos los


        if (isset($_REQUEST['busqueda'])):
            $datos = Producto::buscarPorNombreProducto($_REQUEST['busqueda']);
        endif;


        if (isset($_GET['cat'])):
            $datos = Producto::verPorCategoria($_GET['cat']);
        endif;



        // foreach ($lista as $row) {
        //   if ($num == 3) {
        //     echo "<tr>
        //      ";
        //   $num = 1;
        // } else {
        //     $num++;
        // }

        print_r($_POST);
        ?>



        <div class="container">
            <div class="row">
                <?php
                while ($row = $datos->fetch_assoc()) {
                ?>

                    <div class="mx-2 col-lg-4 col-md-2  card card-body shadow mx-auto  my-4 shadow cards animate__animated  animate__pulse animate__delay-1s">
                        <img class="mx-auto" src="fonts/img/<?php echo $row['img']; ?>" alt="Card image cap" height="250px" width="240px">

                        <div class="">
                            <h5 class="card-title"><?php echo $row['nom_prod']; ?></h5>
                            <p class="card-text lead"><strong><?php echo "$" . number_format(($row['val_prod']), 0, ',', '.'); ?></strong></p>
                            <p class="card-text text-success"><?php $c = $row['val_prod'];
                                                                echo "36 cuotas " . "$" . number_format(($c / 36), 0, ',', '.') . " Sin interes";
                                                                if ($row['estado_prod'] == "Promoción") {
                                                                    echo ",  " .  $row['estado_prod'];
                                                                } ?>


                            </p>
                            <!-- Formulario de envio e incriptacion ------------------------------------>
                            <form action="" method="POST">
                                <input type="hidden" name="img" id="id" value="<?php echo openssl_encrypt($row['img'], COD, KEY);  ?>">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($row['ID_prod'], COD, KEY);  ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($row['nom_prod'], COD, KEY);  ?>">
                                <input type="hidden" name="precio" id="precio" value=" <?php echo openssl_encrypt($row['val_prod'], COD, KEY);  ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value=" <?php echo openssl_encrypt(1, COD, KEY);  ?>">
                                <div class="row">


                                    <input type="submit" class=" btn btn-naranja" value="Agregar" name="btnCatalogo">
                            </form>

                            <form action="detalleProducto.php" method="POST">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($row['ID_prod'], COD, KEY);  ?>">
                                <input type="submit" class="btn-block btn btn-naranja" value="Detalle">
                            </form>
                        </div>



                        <!-- -------------------------------------------------- -->

                    </div>


            </div>




        <?php } ?>
        </div>
    </div>
</div>
</div>


<?php
include_once 'plantillas/cuerpo/footerN1.php';
include_once 'plantillas/cuerpo/finhtml.php';
?>