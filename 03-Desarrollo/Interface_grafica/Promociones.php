<?php
include_once 'plantillas/plantilla.php';
include_once 'plantillas/nav/navgeneral.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';


cardtitulo('Promociones');

?>

<div class="col-md-12 mt-5 my-5">
    <div class="row">
        <div class="col-md-12 text-center text-white">
            <h5>Los mejores ofertas en IMCOABHER</h5>
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
<hr class="border" />

<?php
include_once 'plantillas/cuerpo/finhtml.php';
?>