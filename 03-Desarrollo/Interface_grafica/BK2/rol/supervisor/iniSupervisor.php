
<?php  
include_once 'plantillas/inihtml.php';
include_once 'plantillas/plantilla.php';
include_once 'plantillas/navNivel1.php';
//include_once 'metodos/sessiones.php';
session_start();

if(isset($_SESSION['usuario'])){
    print_r($_SESSION['usuario']);


}


cardtitulo("Modulo de administracion");


echo "modulo administracion";
?>


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

<a class = "btn btn-primary"   href="metodos/get.php?cerrarSesion" >Salir de sesion</a>














<?php

include_once 'plantillas/finhtml.php';
?>