<?php
include_once '../../clases/class.usuario.php';
include_once '../../clases/class.factura.php';

if (isset($_GET['u']) && ($_GET['u'] > 0)) {
    $datosUs = Factura::verFactura($_GET['u']);
    if ($datosUs->num_rows != 0) {

        echo '<pre>';
        var_dump( $datosUs );
        echo '</pre>';
 //  foreach($datosUs as $indice => $v){
      foreach($datosUs as $indice => $v){
   $nombre     =  $v['nom1'] . $v['nom2'];
   $direccion  =  $v['dir'];
   $idUsuario  =  $v['ID_us'];
   $nom1       =  $v['nom1'];
   $nom2       =  $v['nom2'];
   $ape1       =  $v['ape1'];
   $correo     =  $v['correo'];
}

print_r($nombre);

$datosPro = Factura::verFactural($_GET['u']);
foreach ($datosPro as $i => $v ) {
   $valorProducto = $v['val_prod'];
   $cantidad      = $v['cantidad'];
   $nomProducto   = $v['nom_prod'];
   $idFactura     = $v['ID_factura'];
   $fecha         = $v['fecha'];
}




//  $datos = Usuario::verUsarioId($_GET['u']);

//while($row = $datos->fetch_array()){
//  if( $row['ID_us'] == $_GET['u']){




      //  while ($row = $datos->fetch_array()) {
      
?>
          
            <!-- col 2 -->
            

            <div class=" card mx-auto container-fluid my-4 col-lg-10">
                <div class="row">
                    <div class="col-lg-6">
                            <img src="../fonts/capsulelogo.PNG" alt="" style="width: 430px; height: 165px;">
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="card p-2">Factura <br><?=  $idFactura ?></div>
                        <div class="card p-3">Fecha: <?= $fecha ?></div>
                    </div>
                </div>    

                    


                <div class="row">
                    <div class="col-lg-10 card card-body">
                        <div class=" row form-group mx-2 my-4 ">
                            <?= $nombre.":   " . $idUsuario; ?> <br>
                            CLIENTE <?=  ":   " . $nom1 . " " . $nom2 . " " . $ape1  ?><br>
                            E-MAIL <?=  ":   " . $correo;  ?><br>
                            DIRECCION <?=  ":   " . $direccion ?> <br>
                        </div>
                    </div>
                    <div class="col-lg-2 text-center">
                        <div class="row">
                            <div class="col-lg-12 card card-body">ORDEN DE COMPRA <br>N-A</div>
                            <div class="col-lg-12 card card-body">MEDIO DE PAGO<?= "<br>" . $v['nom_tipo_pago'];          ?> </div>
                            <div class="col-lg-12 card card-body">TIPO <br> Venta </div> 
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

                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <td class="col-3"><?= $nomProducto    ?></td>
                                <td><?= $cantidad   ?></td>
                                <td><?=  "$" . number_format(($valorProducto), 0, ',', '.')    ?></td>
                                <td><?= "$" . number_format(((0.19 * ( $valorProducto * $cantidad ))), 0, ',', '.')   ?></td>
                                <td> <?= "$" . number_format(((  $total = $cantidad * $valorProducto)), 0, ',', '.')
                                        ?></td>
                            <?php    // verfactural
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <table class="table table-bordered table-striped ">
                    </table>
                </div>
                <div class="col-lg-12 card">
                    <h5>VALOR EN LETRAS</h5>



                    <?php

require_once "CifrasEnLetras.php";
$v=new CifrasEnLetras(); 
//Convertimos el total en letras
$totalpagar=$total;
$letra=($v->convertirEurosEnLetras($totalpagar));
 ?>
<div>
<span ><?= $letra; ?></span>
</div>


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
        <?php }}

    ?>