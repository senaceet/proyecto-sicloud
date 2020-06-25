<?php 


include_once '../../plantillas/cuerpo/inihtmlN3.php';
include_once '../../plantillas/nav/navN3.php';
include_once '../../plantillas/plantilla.php';

cardtitulo("<h4><em>Bienvenido a Comercial</em></h4>");
?>
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
include_once '../../plantillas/cuerpo/finhtml.php';
?>