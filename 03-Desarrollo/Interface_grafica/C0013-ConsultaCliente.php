<?php
include_once 'plantillas/navgeneral.php';
require 'plantillas/plantilla.php';
require 'clases/class.categoria.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.factura.php';

//require 'class.medida.php';
require 'clases/class.usuario.php';

require 'clases/class.medida.php';
require 'clases/class.proveedor.php';
include 'plantillas/inihtml.php';

cardtitulo("Consulta de clientes");
$d = new Conexion;
?>

<div class="container"><!-- Division boton -->
    <div class="row">
        <div class="col col-md-4 mx-auto">
            <div class="card card-body bg-secondary">
                <h6 style="font-size: 20px;">Seleccione el mes</h6>
                <div class="form-group">
                <select class="form-control" name="mes" >
                    <option value="">enero</option>
                    <option value="">febrero</option>
                    </div>
                </select><br>
            <a   class="btn btn-success form-control btn-block" >Listar Clientes</a>
            <div class="col col-md-8 "> <br>
                <div class="form-group">
                    <h6 style="font-size: 20px;">Seleccione el id del cliente</h6>
                    <select name="" class="form-control">
                    <?php
                    $datos= Factura::verjoinFactura();
                    while($row = $datos->fetch_array()){
                        ?>
                    <option value="<?php echo $row['ID_us']?>"><?php echo $row['ID_us']?></option>
                               <?php
                                }
                                ?>
                    </select>
                                
                </div>
                <div class="boton"><input type="submit" class =  "btn-block btn btn-primary" value="Consultar"></div>

        </div>
        </div>
        </div><!-- fin division 1 -->
        
    </div>
</div><!-- Fin division boton -->
<br>
<br>
<div class="container">
    <div class="row">
        <div class="card card-body bg-secondary">
            <table class="table table-striped table-hover bg-bordered bg-white table-sm col-md-10 col-sm-4 col-xs-12 mx-auto">
            <thead>
            <tr>
                <th>No. de documento</th>
                <th>Primer nombre</th>
                <th>Primer apellido</th>
                <th>Producto</th>
                <th>Fecha</th>
                <th>Medio de pago</th>
                <th>Total</th>
            </tr>
            </thead>
        <?php  
        
        $datos = Factura::verjoinFactura();
        while($row = $datos->fetch_array()  ){

             
          ?>
            <tbody>
                <tr>
                     <td> <?php   echo $row['ID_us']    ?></td>
                     <td><?php   echo $row['nom1']    ?> </td>
                     <td><?php   echo $row['ape1']    ?> </td>
                     <td><?php   echo $row['nom_prod']    ?> </td>
                     <td><?php   echo $row['fecha']    ?> </td>
                     <td><?php   echo $row['nom_tipo_pago']    ?> </td>
                     <td><?php   echo $row['total']    ?> </td>
      
                </tr> 
            </tbody>

            <?php  }   ?>
            </table>

        </div>

    </div>

</div>

<?php
include_once 'plantillas/finhtml.php';
?>