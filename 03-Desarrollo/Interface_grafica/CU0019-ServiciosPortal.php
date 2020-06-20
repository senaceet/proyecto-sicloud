<?php
include_once 'plantillas/nav.php';
include_once 'plantillas/plantilla.php';
include_once 'plantillas/inihtml.php';
include_once 'session/sessiones.php';
include_once 'session/valsession.php';
?>

    <header>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <img src="fonts/logoportal.png" class="logo">
            </div> 
        </div>
    </header>

        <div class="col-xs-12 col-sm-11 col-md-10 mx-auto" >
            <div id="carousel-1" class="carousel slide  " data-ride="carousel" >
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="fonts/slider0.png" alt="First slide" >
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="fonts/slider1.png" alt="Second slide" >
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="fonts/slider2.png"  alt="Third slide" >
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

        <div class="texthome">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-9 text-center mx-auto">
                        <h2>¿Quien es IMCOABHER?</h2>
                        <p class="lead"><em><b>Imcoabher es una empresa dedica principalmente a comercio al por mayor de materiales de construccion, articulos de ferreteria, pinturas, 
                            productos de vidrio, equipo y materiales de fontaneria y calefaccion."</b></em>
                        </p>
                    </div>
                </div>
            </div>
        </div>


    <div class="seccion1">
        <div class="container">
            <section class="main row">
                <article class="col-xs-6 col-sm-8 col-md-9 ">
                    <strong><h3>HERRAMIENTAS MANUALES</h3></strong>
                    <p>
                    Alicates Universales, Alicates de Corte, Alicates de Puntas, Atornilladores, Picotas Chuzos, Escaleras y Carretillas, 
                    Espátulas, Espátulas, Formones, Juegos de Llaves, Llaves Ajustables, Llaves Francesas, Llaves Punta Corona, Martillos, 
                    Mazos, Combos Martillos, Mazos, Organizadores y cajas de Herramientas, Palas y Hachas, Prensas Prensas, Cuchillos Cartoneros,
                     Otros Accesorios Herramientas Otros Accesorios, Limas, Herramientas Manuales Albañileria, Herramientas y Construcción, 
                     Cajas Ingleteadoras,, Prensa cierre rápido, Escalera articulada, Aluminio 12 escalones, Alicate punta larga cortante, 
                     Huincha de medir, metálica, Martillo mecánico, Espátula lisa Acero.
                    </p>
                </article>

                <div class="col-xs-6 col-sm-4 col-md-3">
                    <img src="fonts/hm0.jpg">
                </div>
            </section>
        </div>
    </div>


    <div class="seccion2">
        <div class="container">
        <section class="main row">
            <article class="col-xs-6 col-sm-8 col-md-9">
                <strong><h3>HERRAMIENTA ELECTRICA</h3></strong>
                <p>
                Taladros sin cable, Taladros con cable,  Sierras,  Herramientas eléctricas, Destornilladores eléctricos 
                Martillos perforadores Amoladoras eléctrica, Lijadoras eléctricas, Sierras circulares Cepillos eléctricos, 
                Fresadoras eléctricas, Pistolas para pintar.
                </p>
            </article>

            <div class="col-xs-6 col-sm-4 col-md-3">
                <img src="fonts/he0.jpg" width="290">
            </div>
        </section>
        </div>
    </div>


    <div class="container">
        <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.92411032952!2d-74.20988058573687!3d4.607607443741915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9e22e1a69dad%3A0x37ca3bcc91bfba65!2sCl.%2078%20Sur%20%2378-71%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1590105646415!5m2!1ses!2sco" width="900" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>



    

<?php
include_once 'plantillas/footer.php';
include_once 'plantillas/finhtml.php';
?>