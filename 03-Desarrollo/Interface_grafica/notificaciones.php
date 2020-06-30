<?php




//include_once 'plantillas/plantilla.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'clases/class.notificaciones.php';

?>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notificaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped bg-bordered bg-white table-sm col-md-10 col-sm-4 col-xs-12 mx-auto">
          <tbody>
            <tr>
              <?php
              if (isset($_SESSION['usuario'])) {
                $datos = Notificaciones::verNotificacion($_SESSION['usuario']['ID_rol_n']);
                while ($row = $datos->fetch_array()) {
              ?>
            <tr>
              <td>
                <a class="btn btn-success btn-circle" href=""><i class="fas fa-bell fa-fw"></i><a href=""><?php echo "  " .$row['nom_tipo'] ?></a></a>
              </td>
            </tr>
        <?php  }
              } else echo "Error No ha inciado sesion"; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php

include_once 'plantillas/cuerpo/finhtml.php';

?>