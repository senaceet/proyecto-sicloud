<?php

//comprobacion de rol

include_once '../../session/sessiones.php';
include_once '../../session/valsession.php';

$in = false;
if ($_SESSION['usuario']['ID_rol_n']  == 1) {
  $in = true;
}

if ($_SESSION['usuario']['ID_rol_n']  == 2) {
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
  include_once '../../plantillas/cuerpo/inihtmlN3.php';
  include_once '../../plantillas/nav/navN3.php';
  include_once '../../plantillas/plantilla.php';


  cardtitulo("Modulo de inventario");
?>






  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 mx-auto">



        <div class="card card-body border">
          <div class="card card-body border my-3 shadow p-3 mb-5 bg-white ">

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
            <img class="rounded-circle mx-auto" src="http://ferretero.pe/wp-content/uploads/2018/12/Ferretero-C%C3%B3mo-gestionar-ventas-en-Ferretero.jpg" width="200px" height="200px" alt="">


            <!-- Tasks Card Example -->
            <div class="col-xl-6 col-md-8 mb-4 mx-auto">
              <div class="card border-left-info shadow h-100 py-2 shadow p-3 mb-5 bg-white">
                <div class="card-body ">
                  <div class="row no-gutters align-items-center ">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Bodega</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">70%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="card card-body shadow p-3 mb-5 bg-white  my-2">
              <h4 class="mx-auto">Informes</h4><!-- incio de card consultas -->
              <div class="col-md-12 my-2">
                <!-- sesion de prodcutos -->
                <div class="row">
                  <div class="col-md-4 ">
                    <a class="btn btn-primary mx-auto btn-block" href="tablaCategoria.php"> <i class="fas fa-fw fa-folder"></i>Productos por categoria</a>
                  </div><!-- fin de col de 4 1 -->
                  <div class="col-md-4 ">
                    <a class="btn btn-primary mx-auto btn-block" href="tablaRegistro.php"> <i class="fas fa-fw fa-chart-area"></i>Cantidad de productos</a>

                  </div><!-- fin de col de 4 2 -->
                  <div class="col-md-4 ">
                    <a class="btn btn-primary mx-auto btn-block" href="../../CU0014-alertas.php"><i class="fas fa-search fa-sm"></i>Sistema de alertas</a>

                  </div><!-- fin de col de 4 3 -->
                </div><!-- fin de row -->
              </div><!-- fin de col-md-12 -->
            </div><!-- fin de card consulatas -->

            <!-- inicio de sesion productos ------------------------------------------------------  -->

            <div class="card card-body my-2 shadow p-3 mb-5 bg-white">
              <h4 class="mx-auto">Procesos</h4><!-- inicio de card productos -->
              <div class="col-md-12 my-2">
                <!-- sesion de prodcutos -->
                <div class="row">
                  <div class="col-md-4 ">
                    <a class="btn btn-primary mx-auto btn-block" href="../../CU004-crearproductos.php"> <i class="fas fa-fw fa-wrench"></i>Crear producto</a>
                  </div><!-- fin de col de 4 1 -->
                  <div class="col-md-4 ">
                    <a class="btn btn-info mx-auto btn-block" href="../../CU003-ingresoproducto.php "> <i class="fas fa-check"></i>Ingreso de producto pedido</a>
                    <a class="btn btn-primary mx-auto btn-block" href="../../forms/edicionProductoTabla.php"> <i class="fas fa-fw fa-wrench"></i>Editar productos</a>

                  </div><!-- fin de col de 4 2 -->
                  <div class="col-md-4 ">
                    <a class="btn btn-primary mx-auto btn-block" href="../../CU0018-registropedido.php"><i class="fas fa-arrow-right"></i>Solicitar pedido</a>

                  </div><!-- fin de col de 4 3 -->
                </div><!-- fin de row -->
              </div><!-- fin de col-md-12 -->
            </div><!-- fin de card producto -->
            <!-- fin de sesion producos ------------------------------  -->

          </div><!-- fin de card 2 -->
        </div><!-- fin de card 1-->
      </div><!-- fin col md -->
    </div><!-- fin row -->
  </div><!-- container fluid -->



  <?php

  ?>






<?php
} // fin de validar permisos
include_once '../../plantillas/cuerpo/finhtml.php';
?>