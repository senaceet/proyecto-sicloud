<?php

include_once '../global/plantillas/plantilla.php';
include_once '../global/plantillas/cuerpo/inihtmlN1.php';
include_once '../modelo/class.producto.php';
include_once '../modelo/class.categoria.php';
include_once '../global/plantillas/nav/navN1.php';
include_once '../controlador/ControladorSession.php';
include_once '../modelo/class.producto.php';
include_once 'carrito.php';

/*

(openssl_decrypt($_REQUEST['id'], COD, KEY));
    $ID = openssl_decrypt($_REQUEST['id'], COD, KEY);
    $mensajeId = "OK ID" . $ID;



  echo $ID;


*/



    $datos = Producto::verProductosIdCarrito($ID);
    while ($row = $datos->fetch_assoc()) {
?>

        <div class="col-md-12 mt-5">
            <div class="row">
                <div class="col-md-12 text-center text-white">
                    <?php cardAviso();  ?>

                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="row">
                    <div class="card card-body col-md-10 mx-auto ">
                        <div class="row">

                            <div class="card col-md-6 mx-1 mx-auto mb-lg-8 ">
                                <img class="card-body   mx-auto" src="fonts/img/<?php echo $row['img']; ?>" alt="Card image cap" height="260px" width="300px">
                            </div>
                            <div class="card col-md-6 mx-1 mx-auto shadow ">
                                <div class="card-body cardst">
                                    <h5 class="card-title"><?php echo $row['nom_prod']  ?></h5>

                                    <p class="card-text lead"><strong><?php $c = $row['val_prod'];
                                                                        echo "$" . number_format(($c), 0, ',', '.');
                                                                        if ($row['estado_prod'] == "Promoción") {
                                                                            echo "<br> " .  $row['estado_prod'];
                                                                        } ?></strong></p>




                                    <p class="card-text text-success"><?php echo "36 cuotas " . "$" . number_format(($c / 36), 1, ',', '.') . " Sin interes"; ?></p>
                                    <P><?php echo $row['descript'] ?> <br></P>



                                    <!-- Formulario de envio e incriptacion ------------------------------------>
                                    <form action="catalogo.php" method="POST">
                                        <input type="hidden" name="img" id="id" value="<?php echo openssl_encrypt($row['img'], COD, KEY);  ?>">
                                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($row['ID_prod'], COD, KEY);  ?>">
                                        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($row['nom_prod'], COD, KEY);  ?>">
                                        <input type="hidden" name="precio" id="precio" value=" <?php echo openssl_encrypt($row['val_prod'], COD, KEY);  ?>">
                                        <label class="card-text lead" for="">Cantidad</label> <input value="1" class=" form-control-sm col-md-2 col-lg-1 col-2" name="cantidad1" type='number'>
                                        <div class="row">
                                        <input type="submit" class=" btn btn-naranja" value="Agregar" name="btnCatalogo">
                                    </form>
                                    <a href="catalogo.php" class="btn btn-naranja">Regresar al catalogo</a>
                                    </div>
                                    <!-- -------------------------------------------------- -->
                                
                                </div>
                            </div>




                    <?php  }
           //} ?>
                        </div>
                    </div>
                </div>