<?php
//include_once '../../plantillas/nav/navN1.php';
//include_once 'session/sessiones.php';
//echo print_r($_SESSION['usuario']);
//echo print_r($_SESSION['lista']);
include_once 'plantillas/plantilla.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.categoria.php';
include_once 'plantillas/nav/navN1.php';
include_once 'session/sessiones.php';


//$lista = $_SESSION['lista'];
//echo "numero de productos: ". sizeof($lista);
?>

<div class="col-md-12 mt-5">
    <div class="row">
        <div class="col-md-12 text-center text-white">
           <?php cardAviso();  ?>
      
        </div>
    </div>

    <div class="col-md-12 mt-5">
        <div class="row">
            <div class="card col-md-10 mx-auto">

                <div class="row mb-5 mt-3 ">
                    <div class="border card col-md-10 col-sm-12 col-xs-12 mx-auto pt-3 pb-3 shadow ">

                        <div>
                            <form class="form-inline">
                                <em class="ml-5"> <a class="text-secondary" href="index.php">Inicio</a> / <a class="text-secondary" href="catalogo.php">Catalogo de productos</a></em>

                                <div class="searchandselect" style="margin-left: 35%;">


                                    <!--  
                            <form class="form-inline">
                                <input class="form-control" type="search" placeholder="Busqueda" aria-label="Search">                          
                                <button class="btn btn-outline-success " type="submit">Buscar</button>
                            </form>
                            -->


                                    <em class="ml-5"> <a class="text-secondary" href="CU008-catalogodeproductos.php">Categoria</a></em>
                                    <select name="cat" id="" class="form-control">
                                        <?php

                                        $c = Categoria::verCategoria();
                                        while ($row = $c->fetch_array()) {
                                        ?>
                                            <option value="<?php echo $row['ID_categoria']  ?>"><?php echo $row['nom_categoria']    ?></option>

                                        <?php } ?>
                                    </select>

                                        

                                    <button class="btn btn-outline-success " type="submit">Buscar</button>

                            </form>

                        </div><!-- fin de div form linea -->
                    </div>

                </div>
            </div>


            <div class="row">
                <table class="mx-auto table-sm col-md-8">
                    <?php
                    $num = 0;
                    $datos = Producto::verProductos();


                    if (isset($_GET['cat'])) {

                        $datos = Producto::verPorCategoria($_GET['cat']);
                    }



                    // foreach ($lista as $row) {
                    //   if ($num == 3) {
                    //     echo "<tr>
                    //      ";
                    //   $num = 1;
                    // } else {
                    //     $num++;
                    // }

                    while ($row = $datos->fetch_assoc()) {

                        // echo print_r($row);


                        if ($num == 3) {
                            echo "<tr>
                                ";
                            $num = 1;
                        } else {
                            $num++;
                        }



                    ?>
                        <th>
                            <div class="card card-body col-md-11 mx-1 mx-auto my-4 shadow">

                                <img class="card-body  mx-auto" src="fonts/img/<?php echo $row['img']; ?>" alt="Card image cap" height="260px" width="300px">
                                <div class="  card-body my-2">
                                    <h5 class="card-title"><?php echo $row['nom_prod']; ?></h5>
                                    <p class="card-text lead"><strong><?php echo "$" . $row['val_prod']; ?></strong></p>
                                    <p class="card-text text-success"><?php $c = $row['val_prod'];
                                                                        echo "36 cuotas " .  truncateFloat(($c / 36), 1) . " Sin interes"; ?></p>
                                    <a href="CU0015_16(usuario)-solicitudf.php" class="btn btn-primary">Comprar</a>
                                </div>
                        </div>
                </div>
                </th>
            <?php } ?>
            </table>
        

            <div class="col-md-12 ">
                <div class="row mt-5 mx-auto">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example mx-auto ">
                            <ul class="pagination mx-auto">
                                <li class="page-item"><a class="page-link" href="CU008-catalogodeproductos.php">Anterior</a></li>
                                <li class="page-item"><a class="page-link" href="CU008-catalogodeproductos.php">1</a></li>
                                <li class="page-item"><a class="page-link" href="CU008-catalogodeproductospage2.php">2</a></li>
                                <li class="page-item"><a class="page-link" href="CU008-catalogodeproductospage2.php">Siguiente</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div><!-- fin de row -->
    </div><!-- fin de col md-12 -->
</div>




<div class="col-md-12 mt-5"><!-- slider -->
    <div class="row">
        <div class="col-md-12 text-center text-white">

            <hr class="border my-4" />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 mx-auto">
            <div id="carousel-1" class="carousel slide  " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="1" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="0"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="fonts/slideprod0.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="fonts/slideprod1.jpg" alt="Second slide">
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
</div><!-- fin del slider -->

<hr class="border my-4" />


<?php
include_once 'plantillas/cuerpo/footerN1.php';
include_once 'plantillas/cuerpo/finhtml.php';
?>