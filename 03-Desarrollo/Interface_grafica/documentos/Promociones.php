<?php
include_once 'plantillas/plantilla.php';
include_once 'plantillas/nav/navgeneral.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';


cardtitulo('Promociones');

?>

<div class="col-md-12 mt-5 my-5">
    <div class="row">
        <div class="col-md-12 text-center text-white">
            
    

            <hr class="border" />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 mx-auto">
            <div id="carousel-1" class="carousel slide  " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                    <li data-target="#carousel-1" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="fonts/promociones.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="fonts/imagen1.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="fonts/imagen2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="fonts/imagen3.jpg" alt="Second slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<hr class="border"/>

<?php
include_once 'plantillas/cuerpo/finhtml.php';
?>



<?php
//include_once '../../plantillas/nav/navN1.php';
//include_once 'session/sessiones.php';
//echo print_r($_SESSION['usuario']);
//echo print_r($_SESSION['lista']);
include_once 'plantillas/plantilla.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.categoria.php';




//$lista = $_SESSION['lista'];
//echo "numero de productos: ". sizeof($lista);
?>

<div class="col-md-12 mt-5">
    <div class="row">
        <div class="col-md-12 text-center text-white">


        </div>
    </div>


    <h5 class = "mx-auto text-center my-4 e">Promocion por tiempo limitado !!</h5>
    <div class="col-lg-10   card card-body mx-auto">

        <div class="card card-body shadow">
            <div class="row">
              
            </div><!-- fin de row -->
        </div><!-- fin de card de busqda -->




        <div class="row">
            <table class="mx-auto table-sm col-md-8">
                <?php
                $num = 0;
                $datos = Producto::verPromociones();


                // foreach ($lista as $row) {
                //   if ($num == 3) {
                //     echo "<tr>
                //      ";
                //   $num = 1;
                // } else {
                //     $num++;
                // }

                while ($row = $datos->fetch_assoc()) {

                    if ($num == 3) {
                        echo "<tr>
                                ";
                        $num = 1;
                    } else {
                        $num++;
                    }

                ?>
                    <th>
                        <div class="card card-body shadow col-md-11 mx-1 mx-auto my-4 shadow">
                            <img class="card-body  mx-auto" src="fonts/img/<?php echo $row['img']; ?>" alt="Card image cap" height="260px" width="300px">
                 
                            <div class="  card-body my-2">
                                <h5 class="card-title"><?php echo $row['nom_prod']; ?></h5>
                                <p class="card-text lead"><strong><?php echo "$".number_format(($row['val_prod']),0, ',','.' )   ; ?></strong></p>
                                <p class="card-text text-success"><?php $c = $row['val_prod'];
                                                                    echo "36 cuotas " . "$".number_format(($c / 36),1, ',','.') . " Sin interes";
                                                                   if( $row['estado_prod'] == 'Promoción'){
                                                                    echo "<br>".  $row['estado_prod']."<br>" ;
                                                                   }else{echo "<br><br>";} ?>
                                                                    
                                <a href="CU0015_16(usuario)-solicitudf.php" class="btn btn-primary my-2">Comprar</a>
                            </div>
                        </div>
        </div>
        </th>
    <?php } ?>
    </table>


    </div><!-- fin de row -->
</div><!-- fin de col md-12 -->
</div>





<hr class="border my-4" />
</div>

<?php
include_once 'plantillas/cuerpo/footerN1.php';
include_once 'plantillas/cuerpo/finhtml.php';
?>