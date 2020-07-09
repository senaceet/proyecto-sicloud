<?php
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'plantillas/nav/navN1.php';
include_once 'session/sessiones.php';
include_once 'plantillas/plantilla.php';
include_once 'clases/class.tienda.php';
?>

<div class="col-md-12 mt-5">
    <div class="row">
        <div class="col-md-12 text-center text-white">
           <?php cardAviso();  ?>
            <hr class="border" />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 mx-auto">
            <div id="carousel-1" class="carousel slide  " data-ride="carousel" >
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="fonts/slideprod0.jpg" alt="First slide" >
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="fonts/slideprod1.jpg" alt="Second slide" >
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

                           <select class="custom-select ml-3" name="" >
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

            
        

            <div class="row">
                <div class="card col-md-3 mx-1 mx-auto">
                    <img class="card-img-top mx-auto" src="fonts/productos/alicates.png" alt="Card image cap" style="width:250px">
                    <div class="card-body">
                        <h5 class="card-title">Alicates</h5>
                        <p class="card-text lead"><strong>$22.000</strong></p>
                        <p class="card-text text-success">Hasta 12x $ 1.833 sin interés</p>
                        <a href="CU0015_16(usuario)-solicitudf.php" class="btn btn-primary">Comprar</a>

                     
                        



                    </div>
                </div>
     
            </div>
        </div>
    </div>
</div>

<?php 

include_once 'plantillas/cuerpo/footerN1.php'; 
include_once 'plantillas/cuerpo/finhtml.php';
?>



  