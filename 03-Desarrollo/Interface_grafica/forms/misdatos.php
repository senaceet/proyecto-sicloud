<?php
include_once '../plantillas/plantilla.php';

include_once '../plantillas/cuerpo/inihtmlN2.php';
include_once '../plantillas/nav/navN2.php';
include_once '../clases/class.documento.php';
include_once '../clases/class.rol.php';
include_once '../clases/class.login.php';
include_once '../clases/class.usuario.php';
include_once '../session/sessiones.php';

cardtitulo('Mis datos');

?>



<h3 class="text-center   my-4"><em class ="e">Datos Personales</em></h3>
<div class="container">
    <div class="row">
        <div class="col-md-10 card card-body  mx-auto">
            <form class="form-group" action="../metodos/post.php" method="POST">
                <?php

                $id = $_SESSION['usuario']['ID_us'];
                $c = new Conexion();

                $datos = Usuario::selectUsuarios($id);
                while ($row = $datos->fetch_array()) {
                ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Primer nombre: </h5>
                            <input class="form-control" type="text" name="nom1" value="<?php echo $row['nom1'] ?>" required autofocus maxlength="20">
                            <h5>Segundo nombre: </h5>
                            <input class="form-control" type="text" name="nom2" value="<?php echo $row['nom2'] ?>" required autofocus maxlength="20">
                        </div><!-- primer fila de 6 -->

                        <div class="col-md-6">
                            <h5 class="t">Primer apellido: </h5>
                            <input class="form-control" type="text" name="ape1" value="<?php echo $row['ape1'] ?>" required autofocus maxlength="20">
                            <h5>Segundo apellido: </h5>
                            <input class="form-control" type="text" name="ape2" value="<?php echo $row['ape2'] ?>" required autofocus maxlength="20">

                        </div><!-- segunda fila 6 -->
                        <h5>Fecha de nacimiento: </h5>
                        <input class="form-control" type="date" name="fecha" value="<?php echo $row['fecha'] ?>"><br>
                    </div>
        </div>
    </div>
</div>
<br>



<?php

                    if (isset($_SESSION['message'])) {
?>
    <!-- alerta boostrap -->
    <div class="col-md-4 mx-auto alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
        <?php
                        echo  $_SESSION['message']  ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
                        setMessage();
                    }

?>



<p>
  Spice up your type with CSS
  <span>
    Animated text fill
  </span>
  &mdash; no JavaScript required &mdash;
</p>



<h3 class="text-center my-4"><em class ="e" >Datos de cuenta</em></h3>
<div class="container">
    <div class="row">
        <div class="col-md-10 card card-body mx-auto">
            <h5> Correo </h5>
            <input class="form-control" type="email" name="correo" value="<?php echo $row['correo'] ?>" required autofocus maxlength="25"><br>
        <?php } ?>
        </div><!-- div de row -->
    </div> <!--  div de cntainer -->
</div>
br
<div class="container">
    <div class="row">
        <div class="col-md-10 card card-body mx-auto">
            <input type="hidden" name="accion" value="insetUpdateUsuarioUsuario">
            <input class="btn btn-primary form-control" type="submit" name="submit" value="Actualizar datos">
            </form>
            <a class="btn btn-primary btn-block my-4" href="cambioContraseña.php">Cambio de cotraseña</a>
        </div>
    </div>
</div>


<!-- div de row -->
<!-- div de container -->




<?php
include_once  '../plantillas/cuerpo/finhtml.php';
?>