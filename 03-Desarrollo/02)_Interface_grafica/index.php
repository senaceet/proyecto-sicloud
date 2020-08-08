<?php
include_once 'plantillas/plantilla.php';
include_once 'plantillas/nav/navgeneralvideo.php';
include_once 'clases/class.documento.php';
include_once 'clases/class.login.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'session/sessionIni.php';
?>




<article>
    <div class="container-jav">
        <video loop autoplay muted poster="banner01.jpg" width="100%" class="bk-rgb-video">
            <source src="boston.mp4" type="video/mp4">
        </video>
        <div class="textSobreVideo">
            <h1 class="texto-video animate__animated">Importadora de herramientas</h1>
        </div>
    </div>
</article>


<hr class="border my-4" />




<div class="col-md-12 mx-auto mt-5">
    <div class="row">
        <div class="col-xs-12 col-sm-11 col-md-8 ">
            <div id="carousel-1" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="fonts/slider0.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="fonts/slider1.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="fonts/slider2.png" alt="Third slide">
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




        <div class="p-2 col-sm-12 col-md-4 col-lg-3 col-xl-4">
            <div class="card card-body text-center bg-dark  text-white   ">
                <!--  animate__delay-5s -->
                <h3 id="text" class="animate__animated">Inicia Sesion</h3><br>
                <form action="session/login.php" method="POST">
                    <div id="login" class="form-group">
                        <select name="tDoc" class="form-control nimate__animated in ">
                            <?php
                            $datos = Documento::verDocumeto();
                            while ($row = $datos->fetch_array()) {
                            ?>
                                <option value="<?php echo $row['ID_acronimo']  ?>"><?php echo $row['nom_doc']  ?></option>
                            <?php    }   ?>
                        </select>
                    </div>
                    <div class="form-group"><input class="form-control animate__animated in " placeholder="Numero de documento" type="text" pattern="[A-Za-z0-9_-]{1}{15}" required name="nDoc"></div>
                    <div class="form-group"><input class="form-control animate__animated in " placeholder="Contraseña" type="password" pattern="[A-Za-z0-9_-]{1}{15}" required name="pass"></div>
                    <a href="CU0010-recuperarContrasena.php">¿ Olvido Contraseña ?</a><br><br>
                    <input type="hidden" name="accion" value="login">
                    <input type="submit" name="btnLogin" value="Ingresar" class="form-control btn btn-primary"><br><br>
                    <h5>¿No tienes cuenta?</h5>
                    <a href="CU002-registrodeUsuario.php" class="form-control btn btn-primary">Registrarse</a><br><br>
                </form>



            </div><!-- Fin de card form -->






            <?php
            if (isset($_SESSION['message'])) {
            ?>
                <!-- alerta boostrap -->
                <div class="alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
                    <?php echo  $_SESSION['message']  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php  // session_unset();
                setMessage();
            } ?>
        </div>

    </div>
</div>


<div class=" my-2 e">Noticias</div>

<div class=" mx-auto">
    <button class="btn btn-sm btn-warning toggle" id="">Ocultar Noticias</button>





</div>



<div class="col-md-12 mt-5">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-5 mx-auto">
            <div class="card text-white banner1  "> <img class="card-img" src="fonts/banner05.jpg" alt="Card image" width="600px" height="500px">
                <style>
                    .card-img-overlay:hover {
                        background: black;
                        opacity: 0.75;
                    }

                    .card-img {
                        opacity: 0.90;
                    }
                </style>
                <div class="card-img-overlay banner1 noticia">
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



<button class="btn btn-sm btn-warning toggle">Mostrar Noticias</button>
<div class="col-md-12 mt-5">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-5 mx-auto">
            <div class="card text-white banner1"> <img class="card-img" src="https://deposeguro.com/wp-content/uploads/2019/05/almacen-para-ferreteria.jpg" alt="Card image" width="600px" height="500px">
                <style>
                    .card-img-overlay:hover {
                        background: black opacity 70%
                    }

                    .card-img-overlay {
                        background: linear-gradient(to right, hsla(192, 28%, 27%, 0.904), hsla(62, 89%, 7%, 0.897));
                    }
                </style>
                <div class="card-img-overlay noticia">
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

<section class="banner-2 text-center">
    
<div class="container-text-img" > <h1 class="text-img animate__animated">Herramientas</h1><h3 class="mt-5" >La mejor calidad</h3> <h5 class = "mt-3" >Ventas al por mayor y al detal</h5></div>
</section>







<script src="js/app.js"></script>



<div id="debug"></div>




<div class="container">
    <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.92411032952!2d-74.20988058573687!3d4.607607443741915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9e22e1a69dad%3A0x37ca3bcc91bfba65!2sCl.%2078%20Sur%20%2378-71%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1590105646415!5m2!1ses!2sco" width="900" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</div>



</div>




<script src="js/funcions.js"></script>

<?php

include_once 'plantillas/cuerpo/footerN1.php';
?>

<footer class="sticky-footer bg-dark">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sicloud</span>
        </div>
    </div>
</footer>




<?php




include_once 'plantillas/cuerpo/finhtml.php';

?>


<!--    IMPORTANTE VERIFICAR CONDIGO JQUERY -->
<script src="js/login.js"> </script>