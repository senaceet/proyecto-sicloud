<?php




?>

<div class="col-lg-10 mx-auto">
    <table class="table table-bordered  table-striped bg-white table-sm">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
        </thead>

        <?php  while( $row = $datos->fetch_assoc()){ ?>

        <tbody>
            <td> <?php echo $row['ID_us']  ?> </td>
            <td><?php echo $row['nom1']." ".$row['nom2']." ".$row['ape1']." ".$row['ape2'] ?> </td>
            <td> <?php echo $row['correo'] ?></td>
        </tbody>
<?php } ?>
    </table>
</div>