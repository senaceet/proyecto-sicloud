<?php
include_once '../controlador/controladorrutas.php';
rutFromIni();
$objSession = new Session();
$s = $objSession->desencriptaSesion();
cardtitulo('Edicion producto')
?>
        <table class="table table text-center table-striped  table-bordered bg-white table-sm col-md-8 col-sm-4 col-xs-12 mx-auto">
            <thead>
                <tr>
                    <th>ID producto</th>
                    <th>Nombre producto</th>
                    <th>Valor producto</th>
                    <th>Stock producto</th>
                    <th>Estado</th>
                    <th>Categoria</th>
                    <th>Tipo medida</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <?php
            $objP= new ControllerDoc();
            $datos = $objP->verProductos();
            foreach($datos as $i => $row){
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['ID_prod']  ?></td>
                        <td><?php echo $row['nom_prod'] ?></td>
                        <td><?php echo $row['val_prod'] ?></td>
                        <td><?php echo $row['stok_prod'] ?></td>
                        <td><?php echo $row['estado_prod'] ?></td>
                        <td><?php echo $row['nom_categoria'] ?></td>
                        <td><?php echo $row['nom_medida'] ?></td>
                        <td>
                            <a class="btn-circle btn btn-dark mx-auto  " href="editarProducto.php?id=<?= $row['ID_prod'] ?>"><i class="fas fa-marker"></i></a>
                            <?php  if($s['usuario']['ID_rol_n'] == 1) { ?>
                            <a class="btn-circle btn btn-danger mx-auto  " href="../controlador/api.php?apicall=EliminarProducto&&id=<?= $row['ID_prod'] ?>"><i class="far fa-trash-alt"></i></a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>



            <?php  } // fin de while 
            ?>
        </table>


        <?php
rutFinFooterFrom();
rutFromFin();
        ?>