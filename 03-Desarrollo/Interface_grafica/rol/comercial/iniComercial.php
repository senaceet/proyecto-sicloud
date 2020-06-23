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
cardtitulo("Modulo Vendedor");
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