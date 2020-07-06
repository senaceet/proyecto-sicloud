
<?php 








//comprobacion de rol

include_once '../../session/sessiones.php';
include_once '../../session/valsession.php';

$in = false;
if ($_SESSION['usuario']['ID_rol_n']  == 1) {
    $in = true;
}

if ($_SESSION['usuario']['ID_rol_n']  == 5) {
    $in = true;
}


if ($_SESSION['usuario']['estado'] == 0) {
    $in = false;
}


if ($in == false) {
    echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
    echo "<script>window.location.replace('../../index.php');</script>";
} else {

    //--------------------------------------------------------------------------






include_once '../../plantillas/cuerpo/inihtmlN3.php';
include_once '../../plantillas/nav/navN3.php';
include_once '../../plantillas/plantilla.php';




if(isset($_SESSION['usuario'])){
   


}
?>
<div class="my-4">
<?php

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
if(isset($_SESSION['usuario'])){
   


  }
  ?>
  <div class="my-4">
  <?php
  cardtitulo("Modulo Proveedor");
  ?>
  <div class="card card-body  my-2">
              <h3 class="mx-auto">Consultas</h3><!-- incio de card consultas -->
              <div class="col-md-12 my-2">
                <!-- sesion de prodcutos -->
                <div class="row">
                  <div class="col-md-4 ">
                    <a class="btn btn-primary mx-auto btn-block" href="TablaProductos.php">Ver Productos</a>
                  </div><!-- fin de col de 4 1 -->
                  <div class="col-md-4 ">
                    <!--a class="btn btn-primary mx-auto btn-block" href="tablaRegistro.php">Cantidad de procuntos registrados</a-->
  
                  </div><!-- fin de col de 4 2 -->
                  <div class="col-md-4 ">
                    <a class="btn btn-primary mx-auto btn-block" href="../../CU0018-registropedido.php">Stock por categorias</a>
  
                  </div><!-- fin de col de 4 3 -->
                </div><!-- fin de row -->
              </div><!-- fin de col-md-12 -->
            </div><!-- fin de card consulatas -->
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
}
include_once '../../plantillas/cuerpo/finhtml.php';
?>