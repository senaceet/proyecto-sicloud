<?php
include_once '../controlador/ControladorSession.php';
//comprobacion de rol
$in = false;
switch ($_SESSION['usuario']['ID_rol_n']) {
    case 1:
        $in = true;
    break;
    case 2:
        $in = true;
    break;
    case 0:
        $in = true;
    break;
    default:
        echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    break;
}
if ($in == false) {
    echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
    echo "<script>window.location.replace('index.php');</script>";
} else {

include_once '../global/plantillas/cuerpo/inihtmlN1.php';


/*
include_once '../modelo/class.conexion.php';
include_once '../modelo/class.categoria.php';
include_once '../modelo/class.producto.php';
include_once '../modelo/class.medida.php';
include_once '../modelo/class.proveedor.php';
*/

include_once '../controlador/Controlador.php';
include_once '../global/plantillas/nav/navN1.php';
include_once '../global/plantillas/plantilla.php';


function selectProducto(){
    $objCon = new ControllerDoc();
    $datos = $objCon->verProductos();
    foreach($datos as $row) {
    ?>
        <option value="<?= $row['ID_prod'] ?>"><?= $row['nom_prod'] ?></option>
    <?php } 
}
$objCon = new ControllerDoc();
    cardtitulo("Ingreso de producto-Bodega");
//=======================================================================
// Resepcion de datos
        $id = $_GET['p'];
        $formulario = true;
        echo $id;
//========================================================================
// Captura de datos


$id1    = 2041172460;
$datos = $objCon->tablaProducto($id1);
echo '<pre>';
var_dump($datos);
print_r($datos);
echo '</pre>';

foreach($datos as $row ){
    $idProd       =    $row['ID_prod']	 ;        
    $nomProduct   =    $row['nom_prod']	  ;   
    $valProduct   =    $row['val_prod']	  ;     
    $estadoProd   =    $row['estado_prod']  ;	   
    $stokProd     =    $row['stok_prod']	   ;   
    $nomEmpresa   =    $row['nom_empresa']  ;	     
    $nomCategoria =    $row['nom_categoria']  ;	 
    $nomMedida    =    $row['nom_medida'];
    $nomEmpresa   =    $row['nom_empresa'] ;
  } 

?>


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


    <div class="card col-md-4 mx-auto">
        <div class="card-body shadow p-3 mb-5 bg-white">
            <h5 class="card-title text-center ">Seleccione producto</h5>
            <!-- INI--FORM PRODUCTO--------------------------------------------------------------------------------- -->
            <form action="CU003-ingresoProducto.php" method="GET">
                <select name="p" class="form-control">
                <?php selectProducto();   ?>
                </select>
                <br> <input class="btn btn-primary btn-block my-2" type="submit" name="consulta" value="Validar exitencia">

            </form>
            <a class="btn btn-primary btn-block" href="CU004-crearproductos.php">Crear producto</a>
            <a class="btn btn-primary btn-block" href="CU0014-alertas.php">Sistema de alertas</a>
            <!-- fin producto-------------------------------------------------------------------------------- -->

        </div><!-- fin de card-body-->
    </div><!-- fin de card -->


<!-- FORMULARIO REGISTRO -->
<?php


if ($formulario == true){  ?>

        <div class="card card-body text-center  col-md-10 mx-auto my-4 ">
            <div class=" container-fluid ">
                <div class="card card-body shadow mb-2"> <br>
                    <div class="row">



                            <div class="col-md-4">
                                <!-- inicio de divicion 1 -->
                                <!-----------INI FORM INGREZAR CANTIDAD------------------------------------------------------------------------------------------>
                                <form action="metodos/post.php?accion=IngresarCantidad&&id=<?= $idProd ?>" method="POST">
                                    <!-- derecha -->

                                    <div class="form-group"><label for="">ID Producto</label><input class="form-control" value="<?= $idProd ?>" type=»text» disabled=»disabled» laceholder="ID producto" value="<?= $idUs  ?> " ; name="ID_prod"></div>
                                    <div class="form-group"><label for="">Nombre Producto</label><input class="form-control" value="<?= $nomProduct  ?>" type=»text» disabled=»disabled» lass="form-control" placeholder="Nombre producto" name="nom_prod"></div>
                                    <div class="form-group"><label for="">Valor Producto</label><input class="form-control" type=»text» disabled=»disabled» value="<?= $valProduct  ?>" class="form-control" placeholder="Valor" name="val_prod"></div>
                                    <div class="form-group"> <input class="btn btn-primary form-control" type="submit" name="submit" value="Registrar entrega"> </div>

                            </div><!-- fin de primera divicion-->

                            <div class="col-md-4">

                                <!-- inicio de 2 divicion -->
                                <!-- Izquierda -->
                                <div class="form-group"><label for="">Estado</label><input type=»text» disabled=»disabled» class="form-control" value="<?= $estadoProd  ?>" name="estado_prod" required autofocus></div>
                                <div class="form-group"><label for="">Stock Inicial</label><input type=»number» readonly=»readonly» class="form-control" value="<?= $stokProd ?>" name="stok" required autofocus></div>
                                <div class="form-group"><label for="">ID factura Proveedor</label><input type="text" class="form-control" value="" name="num_fac_ing" autofocus></div>
                                <div class="form-group"><label for="">Cantidad</label><input type="number" class="form-control" placeholder="Cantidad" name="cantidad"></div>

                            </div><!-- fin de segunda divicion-->

                            <div class="col-md-4">

                                <div class="form-group"><label for="">Categoria de producto</label>
                                    <input type=»text» disabled=»disabled» value="<?= $nomCategoria ?>" class="form-control">
                                </div><!--  fin de form-group Producto -->
                                <div class="form-group"><label for="">Medida</label><input class="form-control" type="»text»" disabled=»disabled» value="<?= $nomMedida ?>"></div><!--  fin de form-group Medida -->
                                <div class=" form-group"><label for="">Empresa proveedor</label><input class="form-control" type=»text» disabled=»disabled» value="<?=  $nomEmpresa ?> ">
                                </div><!--  fin de form-group Provedor-->
                                <input type="hidden" name="accion" value="inserCantidadProducto">
                                <!-- BOTON A ENLACE TABLA -->
                                </form>
                                <!-- fin de form cantidad----------------------------------------------------------------------------------------------------------  -->
                                <div class="form-group "><a class="btn btn-primary form-control" href="CU004-crearproductos.php?accion=verProducto">Ver productos existentes</a></div>

                            </div><!-- fin de tercera divicion -->
                    </div><!-- row -->
                </div><!-- fin card body interno -->
            </div><!-- fin de container fluid -->
        </div><!-- Card externo -->


<?php
      }else{ echo "No hay datos";} // fin del while
                    // }// fin de mostrar formulario
                    include_once '../global/plantillas/cuerpo/footerN1.php';
                    include_once '../global/plantillas/cuerpo/finhtml.php';
    }
?>