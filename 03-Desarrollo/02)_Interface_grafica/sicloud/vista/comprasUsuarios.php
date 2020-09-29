<?php
include_once 'plantillas/plantilla.php';
include_once 'plantillas/cuerpo/inihtmlN2.php';
include_once 'plantillas/nav/navN2.php';
include_once '../modelo/class.factura.php'; // Se requiere para los datos de la tabla
include_once '../controlador/controlador.php';
//$us = Factura::ningunDato();
$objModFact = new ControllerDoc();
?>

<div class="container-fluid">

    <header class="my-4">
        <?php cardAviso()  ?>
        <header>

            <section class="col-lg-10  mx-auto">
                <table class="table table-bordered table-striped bg-white table-sm">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Perfil</th>
                            <th>Doncumeto</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Fecha compra</th>
                            <th>Compra</th>
                            <th></th>
                    </thead>
                    <?php
                    //$datos = $us->usuariosComprasRealizadas();
                    $datos = $objModFact ->usuariosComprasRealizadas();
                    foreach ($datos as $i => $row) {
                    ?>
                        <tbody>


                            <td> <img class="img-profile ml-3 rounded-circle" src="fonts/us/<?php echo $row['foto'] ?>" alt="usuario" width="60px"> </td>
                            <td><?php echo $row['ID_us'] ?></td>
                            <td><?php echo $row['nom1'] . " " . $row['nom2'] ?></td>
                            <td><?php echo $row['ape1'] . " " . $row['ape2'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php if ($row['fecha'] == '') {
                                    echo 'N / A';
                                } else {
                                    echo $row['fecha'];
                                }  ?> </td>
                            <td><?php if ($row['FK_det_factura'] == '') {
                                    echo "No ha comprado";
                                } else {
                                    echo $row['FK_det_factura'];
                                } ?></td>
                            <td>
                                <a href="../controlador/controlador.php?accion=verFactura&&id=<?php echo $row['FK_det_factura'] ?>" class="btn btn-success btn-circle"> <i class="fas fa-search fa-sm"></i></a>
                            </td>


                        </tbody>
                    <?php  } ?>
                </table>
            </section>

</div>
<?php
include_once 'plantillas/cuerpo/finhtml.php';
?>