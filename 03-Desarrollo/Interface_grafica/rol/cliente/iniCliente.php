
<?php 
//  rol/admin/iniAdmin.php
include_once '../../plantillas/inihtml.php';
include_once '../../plantillas/navN3.php';
include_once '../../plantillas/plantilla.php';
//include_once '../../session/sessionIni.php';
//include_once 'metodos/sessiones.php';




if(isset($_SESSION['usuario'])){
   


}
?>
<div class="my-4">
<?php
cardtitulo("Modulo Cliente");
?>
</div>
<?php
if (isset($_SESSION['message'])) {
?>
  <!-- alerta boostrap -->
  <div class=" col-md-4 text-center mx-auto alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
    <?php echo  $_SESSION['message']  ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

 <h5 class = "mx-auto tex-cennter text-succes "><?php  if(isset($_SESSION['usuario'])){ echo "Hola: ".$_SESSION['usuario']['nom1']; } ?></h5>

<?php $_SESSION['message'] == false; } ?>



<div class="col-md-12 mt-5">
    <div class="row">
        <div class="col-md-12 text-center text-white">
            <h5 class = " text-dark">Los mejores productos en IMCOABHER</h5>
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
                <img class="d-block w-100" src="../../fonts/slideprod0.jpg" alt="First slide" >
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="../../fonts/slideprod1.jpg" alt="Second slide" >
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
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="card text-white" > <img class="card-img" src="https://cr00.epimg.net/radio/imagenes/2020/06/10/barranquilla/1591812515_278093_1591812702_noticia_normal_recorte1.jpg" alt="Card image" width="600px"  height="600px" ><style> .card-img-overlay:hover{ background: black; opacity: 0.75;} .card-img{opacity: 0.90;}</style>
                    <div class="card-img-overlay">
                        <h5 class="card-title"> <em> <b> NOTICIAS </b></em></h5>
                        <p class="card-text">El sector de las cementeras no ha sido exento al impacto económico que ha generado el COVID-19 ya que los despachos cayeron en abril en un 75% y 
                            la producción también ha tenido un golpe del 79% Los propietarios de las ferreterías, quienes al final son la base de 
                            comercialización de este sector, han estado muy golpeados con pérdidas del 23%. Por eso, la empresa Ultracem, con sede principal en Galapa, Atlántico, 
                            lanzó un aplicativo llamado 'UltraRed" para que los ferreteros puedan ofrecer sus productos a través de WhatsApp.
                            "Este es un aporte que estamos haciendo para apoyar en la reactivación económica del sector desde las ferreterías, las cuales pueden hacer parte del aplicativo sin ningún costo de afiliación", señaló el gerente General de Ultracem, 
                            Julián Vásquez.Ultracem es el tercer jugador de las cementeras en Colombia con una producción de 1.200.000 toneladas, genera 800 empleos directos, y recién inauguraron la planta de mortero seco en Barranquilla, en la que se produce una mezcla lista de cemento con arena agilizando el proceso de construcción o remodelación.</p>
                        <p class="card-text">10/06/2020</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12 mt-5">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-5" >
                <div class="card text-white" > <img class="card-img" src="https://fierros.com.co/wp-content/uploads/2015/07/montar-una-ferreteria-1500x800.jpg" alt="Card image" width="600px"  height="600px" ><style> .card-img-overlay:hover{ background: black; opacity: 0.75;} </style>
                    <div class="card-img-overlay">
                        <h5 class="card-title"> <em> <b> NOVEDADES </b></em></h5>
                        <p class="card-text">Aulas móviles han capacitado a más de 70 mil colombianos en construcción e infraestructura</p>
                        <p class="card-text">Más de 70 mil personas han recibido capacitación gracias a los programas de formación que Gerfor ha implementado en los últimos 23 años.
                            Los beneficiarios han sido obreros, constructores, operarios, maestros de obra e incluso madres cabeza de hogar y jóvenes que quisieron incursionar en el sector de la construcción 
                            y la infraestructura.Mediante estos programas de responsabilidad social, esta multinacional colombiana con 51 años en el mercado, ha marcado la vida de muchas familias colombianas 
                            gracias a su labor pedagógica y en la que siempre ha formado llave con el Sena. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.92411032952!2d-74.20988058573687!3d4.607607443741915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9e22e1a69dad%3A0x37ca3bcc91bfba65!2sCl.%2078%20Sur%20%2378-71%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1590105646415!5m2!1ses!2sco" width="900" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>



    <div class="seccion3">
        <div class="container">
            <footer class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Categorías</h5><br>
                        <a href="#" class="subpaginas">Herramientas Manuales</a><br><br>
				        <a href="#" class="subpaginas">Herramientas Electricas</a><br><br>
				        <a href="#" class="subpaginas">Trajes y Equipos</a><br><br>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Información</h5><br>
                    <a href="#" class="subpaginas">Promociones especiales</a><br><br>
				        <a href="#" class="subpaginas">Novedades</a><br><br>
				        <a href="#" class="subpaginas">Términos y condiciones</a><br><br>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5 class="contact">Contáctanos</h5>
                    <img src="fonts/ubicacion.png" class="ubicacion">
                    <small>CALLE 78 SUR 78 71 IN 123, BOGOTA, BOGOTA, COLOMBIA</small><br><br>
                    <img src="fonts/telefono.png" class="telefono">
                    <small>(1)4493237</small><br><br>
                    <img src="fonts/email.png" class="correo">
                    <small>imcoabhersas@imcoabher.com</small>
                </div>
            </footer>
        </div>
    </div>













<?php

include_once '../../plantillas/finhtml.php';
?>