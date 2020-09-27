<?php
include_once '../global/plantillas/plantilla.php';
include_once '../global/plantillas/cuerpo/inihtmlN1.php';
include_once '../global/plantillas/nav/navN1.php';
include_once '../controlador/ControladorSession.php';
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

                    <h5>Nombre del proveedor:</h5>
                    <select class="custom-select" name="" >
                        <option selected disabled>Seleccione el proveedor</option>
                        <option value="Tuberias S.A.S">Tuberias S.A.S</option>
                        <option value="Nomad Foods Limited">Nomad Foods Limited</option>
                        <option value="Citigroup Inc">Citigroup Inc</option>
                        <option value="Ekso Bionics Holdings, Inc">Ekso Bionics Holdings, Inc</option>
                        <option value="Eyegate Pharmaceuticals, Inc">Celgene Corporation</option>
                    </select><br><br>

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
                    </select><br><br>

                    <h5>Nombre de la empresa:</h5>
                    <select class="custom-select" name="" required>
                        <option selected disabled >IMCOABHER S.A.S</option>
                    </select><br><br>

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


<?php

include_once '../global/plantillas/cuerpo/footerN1.php'; 
include_once '../global/plantillas/cuerpo/finhtml.php';
?>