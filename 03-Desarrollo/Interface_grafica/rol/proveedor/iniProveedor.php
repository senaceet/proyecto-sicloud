
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













<?php

include_once '../../plantillas/finhtml.php';
?>