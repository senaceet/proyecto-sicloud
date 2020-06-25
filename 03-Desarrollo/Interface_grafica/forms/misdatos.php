<?php
require '../plantillas/plantilla.php';

include_once '../plantillas/inihtml.php';
include_once '../plantillas/navN2.php';
include_once '../clases/class.documento.php';
include_once '../clases/class.rol.php';
include_once '../clases/class.login.php';
include_once '../clases/class.usuario.php';
include_once '../session/sessiones.php';

cardtitulo('Mis datos')


?>
<h3 class = "text-center  my-4">Datos Personales</h3>
<div class="container">
    <div class="row">
        <div class="col-md-10 card card-body mx-auto">
            <form class="form-group" action="../metodos/post.php?id=<?php echo $_GET['id'] ?>" method="POST">
            <?php

                $id = $_SESSION['usuario']['ID_us'];
                        //include_once '../clases/class.conexion.php';
                        $c = new Conexion();

                        $datos = Usuario::selectUsuarios($id);
                        while ($row = $datos->fetch_array()) {
                        ?>

                        <h5>Primer nombre: </h5>
                        <input class="form-control" type="text" name="nom1" value="<?php echo $row['nom1'] ?>" required autofocus maxlength="20">
                        <h5>Segundo nombre: </h5>
                        <input class="form-control" type="text" name="nom2" value="<?php echo $row['nom2'] ?>" required autofocus maxlength="20">
                        <h5>Primer apellido: </h5>
                        <input class="form-control" type="text" name="ape1" value="<?php echo $row['ape1'] ?>" required autofocus maxlength="20">
                        <h5>Segundo apellido: </h5>
                        <input class="form-control" type="text" name="ape2" value="<?php echo $row['ape2'] ?>" required autofocus maxlength="20">
                        <h5>Fecha de nacimiento: </h5>
                        <input class="form-control" type="date" name="fecha" value="<?php echo $row['fecha'] ?>"><br>
                    </div>
                </div>
            </div>
            <br>
               
<h3 class = "text-center my-4">Datos de cuenta</h3>
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
            <input type="hidden" name="accion" value="insetUpdateUsuario">
            <input class="btn btn-primary form-control" type="submit" name="submit" value="Actualizar datos">
            </form>
            </div>
        </div>  
    </div>
      
   
       <!-- div de row -->
    <!-- div de container -->










<?php
include_once  '../plantillas/finhtml.php';
?>

               
