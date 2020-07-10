<?php
//include_once '../../plantillas/nav/navN1.php';
include_once '../../session/sessiones.php';
//echo print_r($_SESSION['usuario']);
echo print_r($_SESSION['lista']);
include_once '../../plantillas/plantilla.php';
include_once '../plantillas/cuerpo/inihtmlN2.php';

$lista = $_SESSION['lista'];
//echo "numero de productos: ". sizeof($lista);
?>

<div class="col-md-12 mt-5">
    <div class="row">
        <div class="col-md-12 text-center text-white">
            <?php cardAviso();  ?>
            <hr class="border" />



        </div>
    </div>
</div>

<div class="col-md-12 mt-5">
    <div class="row">
        <div class="card col-md-12 mx-auto">

            <div class="row mb-5 mt-3 ">
                <div class="border card col-md-11 col-sm-12 col-xs-12 mx-auto pt-3 pb-3 ">
                    <form class="form-inline">
                        <em class="ml-5"> <a class="text-secondary" href="index.php">Inicio</a> / <a class="text-secondary" href="CU008-catalogodeproductos.php">Catalogo de productos</a></em>

                        <div class="searchandselect" style="margin-left: 35%;">
                            <input class="form-control" type="search" placeholder="Busqueda" aria-label="Search">
                            <button class="btn btn-outline-success " type="submit">Buscar</button>

                            <select class="custom-select ml-3" name="">
                                <option selected disabled>Ordenar por</option>
                                <option value="">A a Z</option>
                                <option value="">Z a A</option>
                                <option value="">Mayor precio</option>
                                <option value="">Menor precio</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>


            <h2>CATALOGO DE PRODUCTOS</h2>

            <div class="row">
                <table class="mx-auto">



                    <?php
                    $num = 0;
                    foreach ($lista as $row) {
                        if ($num == 3) {
                            echo "<tr>";
                            $num = 1;
                        } else {
                            $num++;
                        }
                    ?>
                            <th>   <div class="card  col-md-11 mx-1 mx-auto my-4 shadow">
                         
                         <img class="card-body card-img-top  mx-auto" src="../imagenes/<?php echo $row['6']; ?>" alt="Card image cap" height ="180px" width ="600px" >
                            <div class="  card-body my-2">
                                <h5 class="card-title"><?php echo $row['1']; ?></h5>
                                <p class="card-text lead"><strong><?php echo "$".$row['2']; ?></strong></p>
                                <p class="card-text text-success"><?php $c = $row['2']; echo ($c/36)." Sin interes"; ?></p>
                                <a href="CU0015_16(usuario)-solicitudf.php" class="btn btn-primary">Comprar</a>
                            </div>
                          </div>
                          </div>
            </th>
        <?php } ?>



        </table>

        </div>

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
    </div>
</div>

<?php

include_once '../../plantillas/cuerpo/footerN1.php';
include_once '../../plantillas/cuerpo/finhtml.php';
?>