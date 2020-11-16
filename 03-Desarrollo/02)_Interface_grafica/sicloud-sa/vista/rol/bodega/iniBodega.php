<?php
//comprobacion de rol
include_once '../../../controlador/controladorsession.php';
$objSession =new Session();
$u = $objSession->desencriptaSesion();

//comprobacion de rol
$in = false;
switch ($u['usuario']['ID_rol_n']) {
    case 1:
        $in = true;
    break;
    case 2:
        $in = true;
    break;
    case 0:
        $in = true;
    break;
    default:
        echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    break;
}
if ($in == false) {
    echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
    echo "<script>window.location.replace('index.php');</script>";
} else {

include_once '../../plantillas/plantilla.php';
include_once '../../plantillas/cuerpo/inihtmlN3.php';
include_once '../../plantillas/nav/navN3.php';
  cardtitulo("Modulo de inventario");
?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 mx-auto">

        <div class="card card-body border">
          <div class="card card-body border my-3 shadow p-3 mb-5 bg-white ">

          <hr class="border ">
<div class="col-md-10 my-4 mx-auto">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 mx-auto">
                <div id="carousel-1" class="carousel slide  " data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../../fonts/prov1.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../../fonts/prov2.jpg" alt="tree slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../../fonts/prov3.png" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr class="border ">

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
           


  


            <div class="card card-body shadow p-3 mb-5 bg-white  my-2">
              <h4 class="mx-auto">Informes</h4><!-- incio de card consultas -->
              <div class="col-md-12 my-2">
                <!-- sesion de prodcutos -->
                <div class="row">
                  <div class="col-md-4 ">
                    <a class="btn btn-primary mx-auto btn-block" href="../../tablaCategoria.php"> <i class="fas fa-fw fa-folder"></i>Productos por categoria</a>
                  </div><!-- fin de col de 4 1 -->
                  <div class="col-md-4 ">
                    <a class="btn btn-primary mx-auto btn-block" href="../../tablaRegistro.php"> <i class="fas fa-fw fa-chart-area"></i>Cantidad de productos</a>

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
                    <a class="btn btn-primary mx-auto btn-block" href="../../CU004-crearProductos.php"> <i class="fas fa-fw fa-wrench"></i>Crear producto</a>
                  </div><!-- fin de col de 4 1 -->
                  <div class="col-md-4 ">
                    <a class="btn btn-info mx-auto btn-block" href="../../CU003-ingresoProducto.php "> <i class="fas fa-check"></i>Ingreso de producto pedido</a>
                    <a class="btn btn-primary mx-auto btn-block" href="../../edicionProductoTabla.php"> <i class="fas fa-fw fa-wrench"></i>Editar productos</a>

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
//} // fin de validar permisos
include_once '../../plantillas/cuerpo/footerN3.php';
include_once '../../plantillas/cuerpo/finhtml.php';
}
?>