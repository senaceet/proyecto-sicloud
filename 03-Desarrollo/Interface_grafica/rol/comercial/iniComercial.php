<?php 
//  rol/admin/iniAdmin.php
include_once '../../plantillas/cuerpo/inihtmlN3.php';
include_once '../../plantillas/nav/navN3.php';
include_once '../../plantillas/plantilla.php';
//include_once '../../session/sessionIni.php';
//include_once 'metodos/sessiones.php';




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








include_once '../../plantillas/cuerpo/inihtmlN3.php';
include_once '../../plantillas/nav/navN3.php';
include_once '../../plantillas/plantilla.php';

cardtitulo("<h4><em>Bienvenido a Comercial</em></h4>");
?>




<div class="col-md-10 mt-5 my-4 mx-auto">
    <div class="row">
        <div class="col-md-12 text-center text-white">
            <h5 class = " text-dark">Los mejores productos en IMCOABHER</h5>
            <hr class="border" />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 mx-auto">
            <div id="carousel-1" class="carousel slide  " data-ride="carousel" >
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="../../fonts/f.jpg" alt="First slide" >
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="../../fonts/slideprod1.jpg" alt="Second slide" >
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

<script src="funciones.js"></script>
<div class="col-md-12">
    <div class="row">
    <div class = "card card-body text-center mx-auto bk-rgb col-md-8">
      <div class="col-md-3">
      <input type="submit" class="form-control btn btn-primary" id="btn1" name="Registro" value="Registro de Cliente" href="Index_ComercialAjax.php?cod=1"><br><br>
      </div>
      <div class="col-md-3">
      <input type="submit" class="form-control btn btn-primary" id="btn2" name="Consulta" value="Consulta de Cliente" href="Index_ComercialAjax.php?cod=2"><br><br>
      </div>
      <div class="col-md-3">
      <input type="submit" class="form-control btn btn-primary" id="btn3" name="Catalogo" value="Catalogo de Productos" href="Index_ComercialAjax.php?cod=3"><br><br>
      </div>
      <div class="col-md-3">
      <input type="submit" class="form-control btn btn-primary" id="btn4" name="Facturacion" value="Facturacion" href="Index_ComercialAjax.php?cod=4"><br><br>
      </div>
    </div>
    </div>
</div>
<?php 

?>


   






<?php
include_once '../../plantillas/cuerpo/footerN3.php';

include_once '../../plantillas/cuerpo/finhtml.php';
?>