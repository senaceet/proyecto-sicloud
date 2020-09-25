<?php
include_once '../plantillas/plantilla.php';
include_once '../plantillas/cuerpo/inihtmlN2.php';
//include_once '../plantillas/nav/navN2.php';
include_once '../clases/class.documento.php';
include_once '../clases/class.rol.php';
include_once '../clases/class.login.php';
include_once '../clases/class.usuario.php';
include_once '../session/sessiones.php';

$id = $_GET['id'];
$datosUsusario    = Usuario::selectUsuarios($id);
$datosDocumento   = Documento::verDocumeto();
$datosRol         = Rol::verRol();

foreach(  $datosRol as $rol ){
    $ID_rol_n =   $rol['ID_rol_n'];
    $nom_rol  =   $rol['nom_rol'];
}


foreach( $datosUsusario as $row ){
   $foto          = $row['foto'];
   $ID_us         = $row['ID_us'];
   $nom1          = $row['nom1'];
   $nom2          = $row['nom2'];
   $ape1          = $row['ape1'];
   $ape2          = $row['ape2'];
   $fecha         = $row['fecha'];
   $pass          = $row['pass'];
   $foto          = $row['foto'];
   $correo        = $row['correo'];
   $FK_tipo_doc   = $row['FK_tipo_doc'];
   $ID_rol_n      = $row['ID_rol_n'];

} 




echo (strtotime("2020-08-06 20:22:20"));

cardtitulo("Actualizar datos de Usuarios");

?>
<div class="container">
    <div class="row">
        <div class="col-md-10 card card-body mx-auto">
            <h5></h5>
            <form class="form-group" action="../metodos/post.php?id=<?php echo $_GET['id'] ?>" method="POST">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card text-center card-title">
                        </div><br>
                        <div class="col-md-12">
                            <div class="row">
                                <!-- contenedor -->
                                <!-- inicion fila selector de documento y rol -->
                                <div class="col-md-6">
   <h5>Seleccione el tipo de documento: </h5>
    <select class="form-control" name="FK_tipo_doc">
<?php 
/// select de documento usaurio
$doc = $FK_tipo_doc;
foreach ($datosDocumento as $row ):
?>
      <option 
<?php 
if(isset($doc) && $doc==$row['ID_acronimo'] ) 
 echo "selected"; 
?>
value="<?= $row['ID_acronimo'] ?>">
       <?= $row['nom_doc']     ?>
      </option>
<?php  
endforeach;  
?>
    </select>

                                 </div><!-- fin de columna de 6 -->
                                  <div class="col-md-6">

<?php
if ($_SESSION['usuario']['ID_rol_n'] == 1):
?>
   <h5>Seleccione rol "Asignar rol"</h5>
                                 <div class="form-group">
   <select name="FK_rol" class="form-control">
<?php /// select de rol usuario


foreach( $datosRol as $row):
?>
         <option 
<?php 
if(isset($ID_rol_n) && $ID_rol_n == $row['ID_rol_n']) 
echo 'selected';
?>   value="    <?=  $row['ID_rol_n']  ?>">
                <?=  $row['nom_rol']   ?>
       </option>                     
<?php 
endforeach;
endif;
?>
</select>
                                   </div><!-- fin de form-group select de  -->
                                </div><!-- fin de columna de 6 -->
                            </div><!-- row fin de fila -->
                        </div><!-- fin contenedor  de selectores -->

                        <?php
                        
                        
                        //include_once '../clases/class.conexion.php';
                       // $c = new Conexion();
   ?>
                        
     

                            <div class="mx-auto text-center my-4">
                                <h5>Foto de perfil</h5>
                                <img class="img-profile ml-3 rounded-circle " src="../fonts/us/<?= $foto   ?>" width="120" height="140">
                                </div>
                               
                                <h5>Numero de identificacion: </h5>
                                <?php echo "Id anterior".$id;  ?>
                                <input class="form-control" type="number" name="ID_us" value="<?=  $ID_us  ?>" required autofocus maxlength="11">
                            
                    </div><br>
                </div>
                
                <h5>Fecha asignacion</h5>
                <div class="form-group"><input class="form-control" type="date" name="fecha_a"></div>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Primer nombre: </h5>
                        <input class="form-control" type="text" name="nom1" value="<?= $nom1 ?>" required autofocus maxlength="20">
                    </div>

                    <div class="col-md-6">
                        <h5>Segundo nombre: </h5>
                        <input class="form-control" type="text" name="nom2" value="<?= $nom2   ?>" required autofocus maxlength="20">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Primer apellido: </h5>
                        <input class="form-control" type="text" name="ape1" value="<?= $ape1  ?>" required autofocus maxlength="20">
                    </div>

                    <div class="col-md-6">
                        <h5>Segundo apellido: </h5>
                        <input class="form-control" type="text" name="ape2" value="<?= $ape2 ?>" required autofocus maxlength="20">
                    </div>
                </div><br>
                <h5>Fecha de nacimiento: </h5>
                <input class="form-control" type="date" name="text" value="<?= $fecha ?>"><br>
                <h5>Digite su contraseña: </h5>
                <input class="form-control" type="password" name="pass" value="<?php $pass  ?>" required autofocus maxlength="25"><br>
                <h5> Foto </h5>
                <input class="form-control" type="password" name="foto" value="<?= $foto ?>" required autofocus maxlength="25"><br>
                <h5> Correo </h5>
                <input class="form-control" type="email" name="correo" value="<?= $correo  ?>" required autofocus maxlength="25"><br>
            <input type="hidden" name="accion" value="insetUpdateUsuario">
            <input class="btn btn-primary form-control" type="submit" name="submit" value="Actualizar datos"><br><br><br>
            <a class="btn btn-primary form-control btn-block" href="../CU009-controlUsuarios.php">Lista usuario</a>
            </form>
        </div>
    </div>
</div>


<?php
include_once  '../plantillas/cuerpo/finhtml.php';
?>