<?php
include_once '../../clases/class.usuario.php';
include_once '../../clases/class.factura.php';



//  $datos = Usuario::verUsarioId($_GET['u']);

//while($row = $datos->fetch_array()){
//  if( $row['ID_us'] == $_GET['u']){



if (isset($_GET['u']) && ($_GET['u'] > 0)) {
    $datos = Factura::verFactura($_GET['u']);
    if ($datos->num_rows != 0) {
        while ($row = $datos->fetch_array()) {
?>
          
            <!-- col 2 -->
            

            <div class=" card mx-auto container-fluid my-4 col-lg-10">
                <div class="row">
                    <div class="col-lg-6">
                            <img src="../fonts/capsulelogo.PNG" alt="" style="width: 430px; height: 165px;">
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="card p-2">Factura <br><?php echo $row['ID_factura'] ?></div>
                        <div class="card p-3">Fecha: <?php echo $row['fecha'] ?></div>
                    </div>
                </div>    

                    


                <div class="row">
                    <div class="col-lg-10 card card-body">
                        <div class=" row form-group mx-2 my-4 ">
                            <?php echo $row['nom_doc'].":   " . $row['ID_us']; ?> <br>
                            CLIENTE <?php echo ":   " . $row['nom1'] . " " . $row['nom2'] . " " . $row['ape1'];  ?><br>
                            E-MAIL <?php echo ":   " . $row['correo'];  ?><br>
                            DIRECCION <?php echo ":   " . $row['dir']; ?> <br>
                        </div>
                    </div>
                    <div class="col-lg-2 text-center">
                        <div class="row">
                            <div class="col-lg-12 card card-body">ORDEN DE COMPRA <br>N-A</div>
                            <div class="col-lg-12 card card-body">MEDIO DE PAGO<?php echo "<br>" . $row['nom_tipo_pago'];          ?> </div>
                            <div class="col-lg-12 card card-body">TIPO <br> Venta </div> <?php } ?>
                        </div>
                    </div>

                    <div class="col-lg-12 card card-body">
                        <table class=" table table-bordered table-striped bg-white table-sm shadow">
                            <thead>
                                <tr>
                                    <td class="col-3">DESCRIPCION</td>
                                    <td>CANT.</td>
                                    <td>VR.UNIT</td>
                                    <td>IVA</td>
                                    <td>TOTAL</td>
                                    <?php
                                    $datos = Factura::verFactural($_GET['u']);
                                    while ($row = $datos->fetch_array()) {
                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <td class="col-3"><?php echo $row['nom_prod']    ?></td>
                                <td><?php echo $row['cantidad']   ?></td>
                                <td><?php echo  "$" . number_format(($row['val_prod']), 0, ',', '.')    ?></td>
                                <td><?php echo "$" . number_format(((0.19 * ($row['val_prod'] * $row['cantidad']))), 0, ',', '.')   ?></td>
                                <td> <?php echo "$" . number_format((($row['cantidad'] * $row['val_prod'])), 0, ',', '.')
                                        ?></td>
                            <?php   } // verfactural
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <table class="table table-bordered table-striped ">
                    </table>
                </div>
                <div class="col-lg-12 card">
                    <h5>VALOR EN LETRAS</h5>
                </div>
                <div class="col-lg-10 card card-body"></div>
                <div class="col-lg-2 card card-body"></div>
            </div>


        <?php    } else {  ?>
            <div class="row">
                <div class="col-lg-2 mx-auto my-4">
                    <div class="card card-body text-center">
                        <?php echo "No hay registros ";  ?>
                    </div>
                </div>
            </div>
    <?php }
}
    ?>