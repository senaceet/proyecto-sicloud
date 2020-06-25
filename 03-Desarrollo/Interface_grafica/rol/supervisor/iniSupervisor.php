

<?php

include_once '../../plantillas/inihtml.php';
include_once '../../plantillas/plantilla.php';
include_once '../../plantillas/navN3.php';
include_once '../../session/sessiones.php';
include_once '../../session/valsession.php';

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
        <div class="card card-body">

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


          <div class="card card-body  my-2">
            <h3 class="mx-auto">Consultas</h3><!-- incio de card consultas -->
            <div class="col-md-12 my-2">
              <!-- sesion de prodcutos -->
              <div class="row">
                <div class="col-md-4 ">
                  <a class="btn btn-primary mx-auto btn-block" href="verFecha.php">Busqueda por fecha</a>
                </div><!-- fin de col de 4 1 -->
                <div class="col-md-4 ">
                  <a class="btn btn-primary mx-auto btn-block" href="verRango.php">Busqueda por rando fechas</a>

                </div><!-- fin de col de 4 2 -->
                <div class="col-md-4 ">
                  <a class="btn btn-primary mx-auto btn-block" href="CU009-controlUsuarios.php">Manejo de Usuarios</a>

                </div><!-- fin de col de 4 3 -->
              </div><!-- fin de row -->
            </div><!-- fin de col-md-12 -->
          </div><!-- fin de card consulatas -->

          <!-- inicio de sesion productos ------------------------------------------------------  -->

      

        </div><!-- fin de card 2 -->
      </div><!-- fin de card 1-->
    </div><!-- fin col md -->
  </div><!-- fin row -->
</div><!-- container fluid -->


<?php

?>














<?php

include_once '../../plantillas/finhtml.php';
?>


























