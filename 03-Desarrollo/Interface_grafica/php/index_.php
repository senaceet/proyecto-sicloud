<?php
require 'plantillas/nav.php';
require 'plantillas/plantilla.php';
require 'clases/class.documento.php';
inihtml();


?>

<!-- col 12 -->
<div class="col-md-12">
    <div class="row">

    <!-- col 4 -->
    <div class ="col-md-5"></div>

    <!-- 4 -->
    <div class ="col-md-2">

    <div class = "card card-body text-center bk-rgb">
        <h5>Login</h5><br>
        <form action="control.php" >
            <div class = "form-group">
            <select name="Tdoc" class="form-control" >

                <?php 
                  $documento = Documento::ningunDatoD();
                  $datos = $documento->verDocumeto();
                  while($row = $datos->fetch_array()){
                 ?>
                <option value="CC"><?php echo $row['nom_doc']  ?></option>
                <?php    }   ?>
  
            </select>
            </div>

            <div class="form-group"><input class =  "form-control" placeholder="Numero de documento" type="text" name ="Ndocumento"></div>
            <div class="form-group"><input class =  "form-control" placeholder="Contraseña" type="text" name ="pass"></div>
            
            <input type="submit" class ="form-control btn btn-primary"><br><br>
            <a href="">¿ a olvidado contraseña ?</a>
        </form>
    </div>


    </div>
    <!-- col 4 -->
    <div class ="col-md-5"></div>
    </div>
</div>


<?php



finhtml();
?>