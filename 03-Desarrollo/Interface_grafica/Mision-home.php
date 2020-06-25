<?php

require 'plantillas/plantilla.php';
include_once 'plantillas/inihtml.php';
include_once 'plantillas/navN1.php';
include_once 'session/sessiones.php';

?>
<div class="container">
  <div class="row">
    <div class="card card-body text-center bk-rgb col-xs col-sm col-md col-lg-12">
      <h5>Misión</h5><br>
    </div>
  </div>
</div>


<?php
if (isset($_SESSION['message'])) {
?>
  <!-- alerta boostrap -->
  <div class=" col-md-6 mx-auto alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
    <?php echo  $_SESSION['message']  ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<?php $_SESSION['message'] == false;
  setMessage();
}

if (isset($_SESSION['usuario'])) {
  echo "Hola" . $_SESSION['usuario']['nom1'];
  echo "Hola " . $_SESSION['usuario']['nom_rol'];
}
?>

<?php
include_once 'plantillas/finhtml.php';
?>