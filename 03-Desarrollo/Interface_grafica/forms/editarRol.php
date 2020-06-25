<?php
include_once '../plantillas/plantillaN2.php';

include_once '../clases/class.empresa.php';
include_once '../clases/class.conexion.php';
include_once '../clases/class.categoria.php';
include_once '../clases/class.rol.php';
include_once '../plantillas/cuerpo/inihtmlN2.php';
include_once '../plantillas/nav/navN2.php';
include_once '../session/sessiones.php';


//-----------------------------------------------------------------------------------



//accion editar 
if ((isset($_GET['id']))) {
  $id = $_GET['id'];

  cardtitulo("Edicion de rol")
?>
  <div class="container-fluid col-md col-xl-6">
    <div class="row">
      <div class="p-2 col-8 col-sm-6 col-md-4 col-lg-3 col-xl-4  mx-auto">
        <div class="card">
          <div class="card-header">Registro</div>
          <div class="card-body">
            <form action="../metodos/post.php?id=<?php echo $_GET['id'] ?>" method="POST">

              <?php

              $datos = Rol::verRolId($id);
              while ($row = $datos->fetch_array()) {

              ?>
                <div class="form-group"><input class="form-control" type="text" name="ID_rol_n" placeholder="Id" value="<?php echo $row['ID_rol_n']  ?>" required autofocus maxlength="30"></div>
                <div class="form-group"><input class="form-control" type="text" name="nom_rol" placeholder="Rol" value="<?php echo $row['nom_rol']  ?>" required autofocus maxlength="30"></div>
              <?php } ?>
              <input type="hidden" name="accion" value="insertUdateRol">

              <div class="form-group"><input class="form-control btn btn-primary" type="submit" name="submit" value="Actualizar rol"></div>
            </form>
          </div><!-- fin card body -->
        </div><!-- fin de card -->
      </div><!-- fin de div col formulario -->
    </div><!-- fin de columnas -->
  </div><!-- Fin de container -->
  <!--  -->
<?php
}
include_once '../plantillas/cuerpo/finhtml.php';
?>