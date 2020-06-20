<?php
require 'plantillas/nav2.php';
require 'plantillas/plantilla.php';
require 'clases/class.documento.php';
require 'clases/class.login.php';
include_once 'plantillas/inihtml.php';
include_once 'session/sessionIni.php';
echo "Soy index en modulos";

?>
<!-- col 12 -->
<div class="container-fluid col-md col-xl-6">
    <div class="row">
        <!-- 4 -->
        <div class="p-2 col-8 col-sm-6 col-md-4 col-lg-3 col-xl-4  mx-auto">
            <div class="card card-body text-center ">
                <h5>Login</h5><br>
                <form action="session/login.php" method="POST">
                    <div class="form-group">
                        <select name="tDoc" class="form-control">
                            <?php
                            $datos = Documento::verDocumeto();
                            while ($row = $datos->fetch_array()) {
                            ?>
                                <option value="<?php echo $row['ID_acronimo']  ?>"><?php echo $row['nom_doc']  ?></option>
                            <?php    }   ?>
                        </select>
                    </div>
                    <div class="form-group"><input class="form-control" placeholder="Numero de documento" type="text" name="nDoc"></div>
                    <div class="form-group"><input class="form-control" placeholder="Contraseña" type="password" name="pass"></div>
                    <input type="hidden" name="accion" value="login">
                    <input type="submit" name="btnLogin" value="Ingresar" class="form-control btn btn-primary"><br><br>
                    <a href="RecupContraseña.php">¿ a olvidado contraseña ?</a>
                </form>
            </div><!-- Fin de card form -->

            <?php
            if (isset($_SESSION['message'])) {
            ?>
                <!-- alerta boostrap -->
                <div class="alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
                    <?php echo  $_SESSION['message']  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php  // session_unset();
                setMessage();
            } ?>
        </div>
        <!-- col 4 -->
    </div>
</div>

<?php
include_once 'plantillas/finhtml.php';
?>