


<?php
include_once '../plantillas/plantilla.php';
include_once '../clases/class.categoria.php';
include_once '../clases/class.empresa.php';

//require 'class.conexion.php';
inihtml();
include_once '../plantillas/nav.php';
cardtitulo("Categoria");
include_once '../metodos/get.php';
?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-6">
                    <!-- formulario de registro -->
                <div class="col-md-3 col col-mx-10 mx-auto">
                    <div class="card">
                        <div class="card-header">Registro Categoria</div><div class="card-body">
                            <form action="../metodos/post.php" method="POST"  >
                                <div class="form-group"><input class = "form-control" type="text" name="ID_categoria" placeholder="Rut" required autofocus maxlength="20"></div>  
                                <div class="form-group"><input class = "form-control" type="text" name="nom_categoria" placeholder="nom_categoria" required autofocus maxlength="50"></div>
                                <input type="hidden" name="accion" value="insertCategoria">
                                <div class="form-group"><input  class="form-control btn btn-primary" type="submit" name = "submit" value="Registrar categoria" ></div> 
                            </form>       
                        </div><!-- fin card body -->
                    </div><!-- fin de card -->
                </div><!-- fin de col 3 -->
        </div><!-- fin primera divicion -->



        <div class="col-md-6"><!-- inicia segunda divicion -->
        <table class = "  table table-bordered  table-striped bg-white table-sm col-md-10 col-sm-4 col-xs-12 mx-auto">
        <thead>

            <tr>
                <td>ID categoria</td>
                <td>Categoria</td>
                <?php 

                    
                    //$medida = Medida::ningunDatoM();
                    $datos  = Categoria::verCategorias();
                    if(isset($datos)){
                        while($row = $datos->fetch_array()){
                ?>
            </tr>
        </thead>
        <tbody>
            <!-- Los nombres que estan son los mismos de los atributos de la base de datos de lo contrario dara un error -->
            <td><?php echo $row['ID_categoria']?></td>
            <td><?php echo $row['nom_categoria']?></td>


            <!-- formEdicion.php?accion=editarMedia&&id=<?php// echo $row['ID_medida'] ?> -->
            <td>
                <a href="   ../forms/formEdicionCategoria.php?id=<?php echo $row['ID_rut'] ?> "  class = "btn btn-secondary">Editar</a> 
                <a href="../forms/formEmpresa.php?accion=insertUdateCategoria&&id= <?php echo $row['ID_medida'] ?>"    name = "sibmit"       class = "btn btn-success">Aprobar</a>
                <a href="../metodos/get.php?accion=eliminarCategoria&&id=<?php echo $row['ID_rut'] ?>" class = "btn btn-danger">Eliminar</a>

                <!--  get.php?accion=editarMedia?id= -->
                <!-- edit.php?id=<?//php  echo  $row['id_sitio']  ?> -->
            </td>
        </tbody>
        <?php 
          
         }//fin del while
        
     
        
        }
        ?>
    </table>


        </div><!-- fin segunda divicion -->
    </div><!-- fin de row -->
</div><!-- Fin container -->

<?php
finhtml();
?>