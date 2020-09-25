<?php
include_once '../plantillas/plantilla.php';

include_once '../clases/class.empresa.php';
include_once '../clases/class.conexion.php';
include_once '../clases/class.categoria.php';
include_once '../plantillas/cuerpo/inihtmlN2.php';
include_once '../plantillas/nav/navN2.php';
include_once '../session/sessiones.php';
//-----------------------------------------------------------------------------------

cardtitulo('Edicion categoria');
//Accion editar 
if ((isset($_GET['id']))) {
    $id = $_GET['id'];
?>
    <div class="col-md-2 col col-mx-10 mx-auto">
        <div class="card">
            <div class="card-header">Registro</div>
            <div class="card-body">
                <form action="../metodos/post.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <?php
                    //$sql = "SELECT * FROM sicloud.empresa_provedor WHERE ID_rut = $id ";
                    $objMod = Categoria::ningunDatoC();
                    $datos =  $objMod->verCategoriaId($id);
            
                    //$datos = $c->query($sql);
                    //$datos = Empresa::verDatoPorId($id);
                   foreach($datos as $i => $d ){

                    ?>
                    
                        <div class="form-group"><input class="form-control" type="text" name="categoria" placeholder="Categoria" value="<?= $d[1]  ?>" required autofocus maxlength="30"></div>
                    <?php } ?>
                    <input type="hidden" name="accion" value="insertUdateCategoria">
                    <div class="form-group"><input class="form-control btn btn-primary" type="submit" name="submit" value="Actualizar categoria"></div>
                </form>
            </div><!-- fin card body -->
        </div><!-- fin de card -->
    </div>
<?php
}
include_once '../plantillas/cuerpo/finhtml.php';
?>