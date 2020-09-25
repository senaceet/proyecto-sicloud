<?php
include_once 'session/config.php';
include_once 'carrito.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'session/sessiones.php';
include_once 'plantillas/nav/navN1.php';
include_once 'plantillas/plantilla.php';
?>

<br>

<div class="container col-lg-8 mx-auto my-4">
    <div class="card card-body">
        <h3>Lista de carrito de compras</h3>
        <hr class="border">


        <?php if (!empty($_SESSION['CARRITO'])) { ?>
            <table class="table table-bordered bg-white table-sm ">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Total</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>

                <?php $total = 0; ?>



                <?php
            // echo '<pre>';
            // var_dump($_REQUEST);
            // var_dump($_SESSION['CARRITO']);
            // echo '</pre>';


                ?>
                <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) {    ?>
                    <tbody>
                        <tr>
                            <td><img class="card-body mx-auto" src="fonts/img/<?php echo $producto['IMG'];  ?>" alt="Card image cap" height="200px" width="300px">
                            <td><?php echo $producto['NOMBRE'] ?></td>
                            <td class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
                            <td class="text-center"> <?php echo "$" . number_format($producto['PRECIO'], 0, ',', '.'); ?></td>
                            <td class="text-center"><?php echo " $" . number_format(($producto['CANTIDAD'] * $producto['PRECIO']), 0, ',', '.'); ?></td>
                            <td>
                                <!-- elimiar producto del carrito de compras -->
                                <form method="POST">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY);  ?>">
                                    <button class="btn btn-danger" type="submit" name="btnCatalogo" value="Eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php $total = $total + ($producto['CANTIDAD'] * $producto['PRECIO']); ?>
                    <?php  }  ?>
                    <tr>


                        <td colspan="4" align="right">
                            <h3>Total</h3>
                        </td>
                        <td align="right">
                            <h3>$<?php echo number_format($total, 0, ',', '.'); ?></h3>
                        </td>
                    </tr>
                    <?php
                    if (isset($_SESSION['message'])) {
                    ?>
                        <!-- alerta boostrap -->
                        <div class="text-center alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
                            <?php echo  $_SESSION['message']  ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php  // session_unset();
                        setMessage();
                    } ?>
                    </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-success">
                No hay productos en el carrito
            </div>
        <?php } ?>

    </div>
</div>

</div><!-- container -->




</body>

</html>