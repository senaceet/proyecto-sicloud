<?php


//comprobacion de rol

include_once 'session/sessiones.php';
include_once 'session/valsession.php';

$in = false;
if ($_SESSION['usuario']['ID_rol_n']  == 1) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n'] == 2) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n'] == 3) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n'] == 4) {
    $in = true;
}




if ($_SESSION['usuario']['estado'] == 0) {
    $in = false;
}


if ($in == false) {
    echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
    echo "<script>window.location.replace('index.php');</script>";
} else {

    //--------------------------------------------------------------------------








include_once 'clases/class.categoria.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.usuario.php';
include_once 'clases/class.medida.php';
include_once 'clases/class.proveedor.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'plantillas/nav/navN1.php';
include_once 'plantillas/plantilla.php';


cardtitulo("Alertas");






print_r($_GET);



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
<div class="card card-body col-md-5 mx-auto my-4">
    <div class="col-md-12 mx-auto">
        <div class="row">
            <!-- form filtro por catiegorias -->
            <div class="card col-md-8 mx-auto my-4 shadow ">
                <div class="card-body ">
                    <h5 class="card-title text-center ">Seleccione Tipo de filtro</h5>
                    <!-- INI--FORM fitrol--------------------------------------------------------------------------------- -->
                    <form action="CU0014-alertas.php" method="GET">
                        <select name="filtro" class="form-control">
                            <option class="form-control" value="1">Producto</option>
                            <option class="form-control" value="2">Id producto</option>
                            <option class="form-control" value="3">Categoria</option>
                        </select>
                        <input type="hidden" name="accion" value='filtro'>
                        <br> <input class="btn btn-primary btn-block my-2" type="submit" name="select" value="consulta">
                    </form>
                    <a class="btn  btn-primary btn-block " name = "stockGeneral" type = "submit" href="CU0014-alertas.php?stockGeneral">Stock general</a>

                </div>
            </div>


            <!--   fin de form Filtro---------------------------------------------------------------------------------------------- -->



            <?php
            if (isset($_GET['select'])) {

                // evento select producto--------------------------------------------------------------------------------------------------------
                if ($_GET['filtro'] == 1) {
            ?>
                    <div class="card col-md-8 mx-auto my-4 shadow ">
                        <div class="card-body ">
                            <h5 class="card-title text-center ">Seleccione Producto</h5>
                            <form action="CU0014-alertas.php" method="POST">
                                <select name="producto" class="form-control">
                                    <?php
                                    $datos = Producto::verProductos();
                                    while ($row = $datos->fetch_array()) {
                                    ?>
                                        <option value="<?php echo $row['ID_prod']  ?>"><?php echo $row['nom_prod']  ?></option>
                                    <?php } // fin de while productos    
                                    ?>

                                </select>
                                <input type="hidden" name="accion" value='alertaVerProducto'>
                                <br> <input class="btn btn-primary btn-block my-2" type="submit" name="submit" value="consulta">
                            </form>
                        </div>
                    </div>

                <?php
                } // fin de ver productos-------------------------------------------------------------------

                // evento de busqueda producto por ID
                if ($_GET['filtro'] == 2) { ?>

                    <div class="card col-md-8 mx-auto my-4 shadow ">
                        <div class="card-body ">
                            <h5 class="card-title text-center ">Digite id de producto</h5>
                            <form action="CU0014-alertas.php" method="POST">
                                <div class="form-group"><input id="my-input" class="form-control" type="text" name="idProducto"></div>
                                <input type="hidden" name="accion" value='alertaVerProductoID'>
                                <br> <input class="btn btn-primary btn-block my-2" type="submit" name="submit" value="consulta">
                            </form>
                        </div>
                    </div>

                <?php
                } // fin de filtro 2 busqueda por ID---------------------------------------------------------------------

                // Evento de busquda por categoria
                if ($_GET['filtro'] == 3) {  ?>

                    <div class="card col-md-8 mx-auto my-4 shadow ">
                        <div class="card-body ">
                            <h5 class="card-title text-center ">Seleccione Producto</h5>
                            <form action="CU0014-alertas.php" method="POST">
                                <select name="categoria" class="form-control">
                                    <?php
                                    $datos = Categoria::verCategoria();
                                    while ($row = $datos->fetch_array()) {
                                    ?>
                                        <option value="<?php echo $row['ID_categoria']  ?>"><?php echo $row['nom_categoria']  ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="accion" value='selectCategoria'>
                                <br> <input class="btn btn-primary btn-block my-2" type="submit" name="consulta" value="consulta">
                            </form>
                        </div>
                    </div>

            <?php
                }// fin de filtro 3 busquda por categoria--------------------------------------------------------------------
            } // fin de isset fitro
            ?>
        </div><!-- fin de row -->
    </div><!-- fin de col md  -->
</div><!-- fin de card body -->



<div class="row ">
    <!-- Content Column -->
    <div class="col-lg-6 mb-4 mx-auto">
        <!-- Project Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 shadow p-3 mb-5 bg-white">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo "Producos" ?></h6>
            </div>
            <div class="card-body">
                <?php

//----------------------------------------------------------------------------------------------------------------------------------
                // CAPTURA DE DATOS SEGUN EL EVENTO



                if (isset($_POST['accion'])) {
                    // ver cantidad de productos por nombre
                    if ($_POST['accion'] == 'alertaVerProducto') {
                        $id = $_POST['producto'];
                        $prod = Producto::verProductosId($id);
                    } // Fin de evento ver cantidad de productos por nombre

                    // ver cantidad de productos por ID producto
                    if ($_POST['accion'] == 'alertaVerProductoID') {
                        $id = $_POST['idProducto'];
                        $prod = Producto::verProductosId($id);
                    }// Fin de evento ver cantidad de productos por ID

                    // ver cantidad de productos por categoria
                    if($_POST['accion'] == 'selectCategoria'){
                        $id = $_POST['categoria'];
                        $prod = Producto::verPorCategoria($id);
                    }// Fin de evento ver cantidad de productos por categoria

                    //FIN DE EVENTOS-----------------------------------------------------------------------------------------------------------



                    while ($row = $prod->fetch_array()) {
                        $p  =  $row['stok_prod'];
                        $po  = 10 * $row['stok_prod'];
                        $po = $po . "%";

                        $c = "text";
                        if ($p < 2) {
                            $c = "danger";
                        } elseif ($p <= 6) {
                            $c = "warning";
                        } elseif ($p >= 7) {
                            $c = "success";
                        }
                        $c = "bg-" . $c;

                ?>
                        <h4 class="small font-weight-bold"><?php echo $row['nom_prod']  ?> <span class="float-right"><?php echo  " Cantidad de productos; " . $p ?></span> </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar <?php echo $c ?>" role="progressbar" style="width:<?php echo $po; ?>" aria-valuenow=<?php echo $c ?> aria-valuemin="0" aria-valuemax="100"></div>

                
                        </div>
                    <?php
                    } // fin de while producto
                    ?>
            </div><!-- fin de card body -->
        </div><!-- fin de col categoria  -->

<?php    } // fin de isset accion ?>
       

<?php  
if(isset($_GET['stockGeneral'])){
?>
        <div class="container">
            <div class="card card-body bg-while col-md-11 mx-auto">
                <div class="row">
                    <table class="table table-striped table-hover bg-bordered bg-light table-sm col-md-10 col-sm-4 col-xs-12 mx-auto shadow p-3 mb-5 bg-white">
                        <thead>
                            <tr>
                                <th>Nombre Producto</th>
                                <th>Valor Producto</th>
                                <th>Stock </th>
                                <th>Estado del producto</th>
                                <th>categoria</th>
                                <th>Medida</th>
                                <?php if($_SESSION['usuario']['ID_rol_n'] == 1 || $_SESSION['usuario']['ID_rol_n'] == 1 ){   ?>
                                    <th>Accion</th><?php }  ?>
                            </tr>
                        </thead>
                        <?php
                        $datos = Producto::verProductos();
                        while ($row = $datos->fetch_array()) {
                            $p  =  $row['stok_prod'];


                            $c = "text";
                            if ($p < 2) {
                                $c = "danger";
                            } elseif ($p <= 6) {
                                $c = "warning";
                            } elseif ($p >= 7) {
                                $c = "success";
                            }
                            $c = "bg-" . $c;

                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['nom_prod'] ?></td>
                                    <td><?php echo $row['val_prod'] ?></td>
                                    <td class=" <?php echo  $c  ?>"><?php echo $row['stok_prod'] ?></td>
                                    <td><?php echo $row['estado_prod'] ?></td>
                                    <td><?php echo $row['nom_categoria'] ?></td>
                                    <td><?php echo $row['nom_medida'] ?></td>
                                    <?php if($_SESSION['usuario']['ID_rol_n'] == 1 || $_SESSION['usuario']['ID_rol_n'] == 1 ){   ?>
                                    <td>
                                        <a class = "btn  btn-success" href="CU003-ingresoProducto.php?consulta=Validar+exitencia&&p=<?php echo $row['ID_prod']?>">ingreso</a>


                                    </td><?php }  ?>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                        } // fin de while tabla
                        ?>
                    </table>




                </div>
            </div>
        </div>



    <?php
    }// fin de tabla StockGeneral
}// fin de permisos por rol

             

         
                include_once 'plantillas/cuerpo/finhtml.php';

    ?>