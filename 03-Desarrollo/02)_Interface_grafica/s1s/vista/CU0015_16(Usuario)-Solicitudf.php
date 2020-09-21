<?php
include_once 'plantillas/plantilla.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'plantillas/nav/navN1.php';
include_once 'session/sessiones.php';
include_once 'session/valsession.php';

?>
   
   
     <?php cardtituloS("SOLICITUDES")?>


<!-- 2 check -->
<div class="solicitud1">
    <div class ="col-md-12">
        <div class="container">
            <div class ="row">
                <!-- Medidas de servicios y productos -->
                    <div class="col-md-6 card card-body bg-dark text-white ">
                        <form action="" method="post">
                            <div class="form-check form-check-inline" >
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1"> Servicios</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" checked>
                                <label class="form-check-label" for="exampleRadios2">Productos</label>
                            </div>
                        </form>

                    </div>

                    <div class="container col-md-6" >
                        <div class="card card-body bg-dark text-white text-center">
                            <h3>CONSULTAS</h3>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>



<div class="col-md-12">
    <div class="container">
        <div class="row">
            <div class="col-md-6 card card-body bg-dark text-white">
                <form action="" method="post">

                    <h5>Numero de identificacion:</h5>
                    <input class="form-control" type="number" placeholder="Digite su numero de documento" name="" required autofocus maxlength="11"><br>

                    <h5>Nombre:</h5>
                    <input class="form-control" type="text" placeholder="Digite su nombre" name="" required autofocus maxlength="20"><br>

                    <h5>Apellido:</h5>
                    <input class="form-control" type="text" placeholder="Digite su apellido" name="" required autofocus maxlength="20"><br>

                    <h5>Telefono:</h5>
                    <input class="form-control" type="number" placeholder="Digite su numero" name="" required autofocus maxlength="11"><br>

                    <h5>Correo:</h5>
                    <input class="form-control" type="email" placeholder="Digite su correo electronico" name="" required autofocus maxlength="50"><br>

                    <h5>Nombre del producto:</h5>
                    <select class="custom-select" name="" >
                        <option selected disabled>Seleccione el producto</option>
                        <option value="DESTORNILLADOR">DESTORNILLADOR</option>
                        <option value="TRONZADORA">TRONZADORA</option>
                        <option value="PULIDORA">PULIDORA</option>
                        <option value="Toolrich">Toolrich</option>
                        <option value="Alicates">Alicates</option>
                        <option value="Destornilladores">Destornilladores</option>
                        <option value="Taladro">Taladro</option>
                        <option value="Pegadit">Pegadit</option>
                        <option value="Compresor">Compresor</option>
                        <option value="Linterna">Linterna</option>
                    </select>

                    <h5>Cantidad:</h5>
                    <select class="custom-select" name="" >
                        <option selected disabled>Especifique la cantidad del producto</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </form>
            </div>

            <div class="container col-md-6" >
                <div class="card card-body bg-dark text-white">
                    <form action="" method="post">
                        <h3>Detalles: </h3><br>
                        <textarea class="form-control" name=""  cols="30" rows="10"></textarea><br><br>
                        <input class="form-control btn btn-primary" type="button" value="Enviar"><br><br><br>
                </div>
            </div>
        </div>
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

include_once 'plantillas/cuerpo/footerN1.php'; 
include_once 'plantillas/cuerpo/finhtml.php';
?>