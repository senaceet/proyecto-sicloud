<?php
include_once '../../../controlador/controladorrutas.php';
rutFromIniN3();
//comprobacion de rol
$in = false;
switch ($_SESSION['usuario']['ID_rol_n']) {
    case 1:
        $in = true;
    break;
    case 3:
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

  //--------------------------------------------------------------------------


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
                  </div>
          </div>
          </div>
          </div>

<?php
}
rutFromFinN3();
?>