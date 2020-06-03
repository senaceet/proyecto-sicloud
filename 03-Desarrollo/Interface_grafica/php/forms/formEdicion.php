<?php  
require '../plantillas/plantilla.php';
require '../plantillas/nav.php';
//require 'class.conexion.php';
require '../clases/class.medida.php';
include_once '../clases/class.conexion.php';
inihtml();


//-----------------------------------------------------------------------------------



//accion editar 
if(  (isset($_GET['id'])) ){
    $id = $_GET['id'];
    

        // se llama un metodo estatic si ser extancia de la clase
        //$medida = Medida::ningunDatoM();
        $datos = Medida::verDatoPorId($id);
        
        while($row = $datos->fetch_array()  ){
        ?>
            <div class="col-md-2 col col-mx-10 mx-auto">
                <div class="card">
                    <div class="card-header">Registro</div><div class="card-body">
                        <form action="formEdicion.php?id=<?php echo $_GET['id']?>" method="POST">
                            <div class="form-group"><input class = "form-control" type="text" name="nom" placeholder="Medida" value="<?php echo $row['nom_medida']  ?>" required autofocus maxlength="35"></div>  
                            <div class="form-group"><input class = "form-control" type="text" name="acron" placeholder="Acronimo"  value="<?php echo $row['acron_medida']  ?>"  required autofocus maxlength="5"></div>
                            <input type="hidden" name="accion" value="insertUdate">
                            <div class="form-group"><input  class="form-control btn btn-primary" type="submit" ></div>
                        </form>        
                    </div><!-- fin card body -->
                </div><!-- fin de card -->
           </div><!-- fin de col 2 -->
        <?php 
    }//fin de while


    if(   (isset($_POST['accion']))  && ($_POST['accion'] == 'insertUdate')   ){
        echo "estoy en insertUpdate";
        $id        =  $_GET['id'];
        $nom_medida = $_POST['nom'];
        $acron_medida = $_POST['acron'];
        
        $medida = new Medida($nom_medida, $acron_medida );
        $medida->actualizarDatosMedida($id);
        
        }//fin de insertarUdate

 }//fin de get



?>





  <?php 
   
  
  finhtml(); 
  ?>
