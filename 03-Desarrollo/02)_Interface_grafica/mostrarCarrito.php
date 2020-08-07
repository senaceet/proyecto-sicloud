

<?php
include_once 'session/config.php';
include_once 'carrito.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'session/sessiones.php';
include_once 'plantillas/nav/navN1.php';
?>

<br>

<div class="container col-lg-8 mx-auto my-4">
    <div class="card card-body">
        <h3>Lista de carrito</h3>
        <hr class="border">


        <?php if (!empty($_SESSION['CARRITO'])) { ?>
            <table class="table table-bordered bg-white table-sm ">
                <thead class="bg-dark text-white">
                    <tr>
                    <th>Producto</th>
                        <th  >Descripcion</th>
                        <th   class="text-center">Cantidad</th>
                        <th   class="text-center">Precio</th>
                        <th   class="text-center">Total</th>
                        <th   class="text-center"></th>
                    </tr>
                 </thead>

                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) {  ?>
                        <tbody>
                        <tr>
                           <td ><img class="card-body mx-auto" src="fonts/img/<?php echo $producto['IMG'];  ?>" alt="Card image cap" height="200px" width="300px">                        
                            <td ><?php echo $producto['NOMBRE'] ?></td>
                            <td   class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
                            <td   class="text-center"> <?php   echo "$" . number_format($producto['PRECIO'], 0, ',', '.'); ?></td>
                            <td   class="text-center"><?php echo " $" .number_format(( $producto['CANTIDAD'] * $producto['PRECIO'] ), 0, ',', '.'); ?></td>
                            <td >
                                <button class="btn btn-danger" type="button">Eliminar</button>
                            </td>
                        </tr>
                      

                        <?php $total = $total + ($producto['CANTIDAD'] * $producto['PRECIO']); ?>

                    <?php  } ?>
                    <tr>
                        <td colspan="4" align="right">
                            <h3>Total</h3>
                        </td>
                        <td align="right">


                            <h3>$<?php echo number_format($total, 0, ',', '.'); ?></h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } else { ?>

            <div class="alert-success">
                No hay productos en el carrito
            </div>



        <?php } ?>

    </div>
</div>

</div><!-- container -->




</body>

</html>