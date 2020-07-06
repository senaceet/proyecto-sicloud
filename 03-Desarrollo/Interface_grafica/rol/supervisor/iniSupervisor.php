<?php



//comprobacion de rol

include_once '../../session/sessiones.php';
include_once '../../session/valsession.php';

$in = false;
if ($_SESSION['usuario']['ID_rol_n']  == 1) {
  $in = true;
}

if ($_SESSION['usuario']['ID_rol_n']  == 3) {
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


  include_once '../../plantillas/plantilla.php';
  include_once '../../session/sessiones.php';
  include_once '../../session/valsession.php';
  include_once '../../plantillas/cuerpo/inihtmlN3.php';
  include_once '../../plantillas/nav/navN3.php';

  //include_once 'metodos/sessiones.php';
  //session_start();



  if (isset($_SESSION['usuario'])) {
    // print_r($_SESSION['usuario']);
  }
?>


  <?php
  cardtitulo("Modulo de Supervisor");
  ?>






  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="card card-body">
          <div class="card card-body shadow">

            <h5 class="mx-auto tex-cennter text-succes ">
              <?php if (isset($_SESSION['usuario'])) {
                echo "Bienvenido " . $_SESSION['usuario']['nom1'];
              } ?></h5>



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

            <?php
            }
            setMessage() ?>


            <div class="card card-body shadow ">
              <h3 class="mx-auto">Consultas de ventas</h3><!-- incio de card consultas -->
              <div class="col-md-12 my-4">
                <!-- sesion de prodcutos -->
                <div class="row">
                  <div class="col-md-4 mx-auto ">
                    <a class="btn btn-primary mx-auto btn-block" href="verFecha.php">Informe de ventas</a>
                  </div><!-- fin de col de 4 1 -->
                  <div class="col-md-4 mx-auto ">
                    <a class="btn btn-primary mx-auto btn-block" href="verRango.php">Informe por rango de fechas</a>

                  </div><!-- fin de col de 4 2 -->
                
                </div><!-- fin de row -->
              </div><!-- fin de col-md-12 -->
            </div><!-- fin de card consulatas -->


            <div class="card card-body my-4 shadow">
            <!-- inicio de sesion productos ------------------------------------------------------  -->
            <h3 class="mx-auto">Consulta de productos</h3>
            <div class="col-md-4 mx-auto my-4">
                    <a class="btn btn-primary mx-auto  btn-block" href="../../CU0014-alertas.php">informe por stock</a>

                  </div><!-- fin de col de 4 3 -->

                  </div>

          <?php
        }
        include_once '../../plantillas/cuerpo/finhtml.php';
          ?>