<?php
require 'plantillas/nav2.php';
require 'plantillas/plantilla.php';
require 'clases/class.documento.php';
inihtml();


?>

<!-- col 12 -->
<div class="col-md-12">
    <div class="row">




    <!-- 4 -->
    <div class ="col-md-3 col-mx-4 mx-auto">

    <div class = "card card-body text-center bk-rgb">
        <h5>Login</h5><br>
        <form action="metodos/post.php" method="POST">
            <div class = "form-group">
            <select name="tDoc" class="form-control" >

                <?php 
              
                  $datos = Documento::verDocumeto();
                  while($row = $datos->fetch_array()){
                 ?>
                <option value="<?php echo $row['ID_acronimo']  ?>"><?php echo $row['nom_doc']  ?></option>
                <?php    }   ?>
  
            </select>
            </div>

            <div class="form-group"><input class =  "form-control" placeholder="Numero de documento" type="text" name ="nDoc"></div>
            <div class="form-group"><input class =  "form-control" placeholder="Contraseña" type="text" name ="pass"></div>
            <input type="hidden" name = "accion" value="login">
            
            <input type="submit" name ="submit"  value="Ingresar"  class ="form-control btn btn-primary"><br><br>
            <a href="">¿ a olvidado contraseña ?</a>
        </form>
    </div>


    </div>
    <!-- col 4 -->

    </div>
</div>


<?php



finhtml();
?>