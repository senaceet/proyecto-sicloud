<?php  
require '../plantillas/plantilla.php';
require '../plantillas/nav.php';
//require 'class.conexion.php';
require '../clases/class.empresa.php';
include_once '../clases/class.conexion.php';
inihtml();


//-----------------------------------------------------------------------------------



//accion editar 
if(  (isset($_GET['id'])) ) {
    $id = $_GET['id'];
   

    
echo 'Estoy adentro del isset id'; ?>




<div class="col-md-2 col col-mx-10 mx-auto">
                <div class="card">
                    <div class="card-header">Registro</div><div class="card-body">
                        <form action="formEdicionEmpresa.php?id=<?php echo $_GET['id']?>" method="POST">


                              <?php

$c = new Conexion;
$sql = "SELECT * FROM sicloud.empresa_provedor WHERE ID_rut = $id ";
$datos = $c->query($sql);
                              //$datos = Empresa::verDatoPorId($id);
                              while($row = $datos->fetch_array()){

                              ?>
                            <div class="form-group"><input class = "form-control" type="text" name="nom" placeholder="Medida" value="<?php echo $row['ID_rut']  ?>" required autofocus maxlength="35"></div>  
                            <div class="form-group"><input class = "form-control" type="text" name="acron" placeholder="Acronimo"  value="<?php echo $row['nom_empresa']  ?>"  required autofocus maxlength="5"></div>
                            <?php } ?>

                            <input type="hidden" name="accion" value="insertUdate">
                            <div class="form-group"><input  class="form-control btn btn-primary" type="submit" ></div>
                        </form>        
                    </div><!-- fin card body -->
                </div><!-- fin de card -->
           </div>


           








    
<?php   
}
  finhtml(); 
  ?>
