<?php
require 'plantillas/nav.php';
require 'plantillas/plantilla.php';
require 'clases/class.categoria.php';
include_once 'clases/class.producto.php';
//require 'class.medida.php';
require 'clases/class.usuario.php';
//require 'class.conexion.php';
require 'clases/class.medida.php';
require 'clases/class.proveedor.php';
//require 'class.producto.php;';


inihtml();

cardtitulo("Registro producto");

$d = new Conexion;
?>



<div class = "card card-body text-center  col-md-10 mx-auto">
       <div class =" container-fluid ">
                <div class = "card card-body "> <br>
                      <div class="row">

                              <div class = "col-md-4"><!-- inicio de divicion 1 -->
                                        <form action="metodos/post.php" method="POST" >
                                                    <!-- derecha -->
                                                    
                                                    <div class = "form-group"><label for="">ID Producto</label><input class = "form-control" type="text" placeholder="ID producto" name ="ID_prod"></div>
                                                    <div class = "form-group"><label for="">Nombre Producto</label><input  class = "form-control" type="text" class="form-control" placeholder="Nombre producto" name = "nom_prod"></div>
                                                    <div class = "form-group"><label for="">Valor Producto</label><input  class = "form-control" type="number" class="form-control" placeholder="Valor" name = "val_prod"></div>

                                                    <div class = "form-group"> <input class ="btn btn-primary form-control" type="submit" name ="submit" > </div>
                                                   



                                                    <?php
                                                  // $categoria = Categoria::ningunDatoC();
                                                  // $datos = $categoria->verCategorias();
                                                 //  foreach ($ejecutar as $opsiones)


                                                    // while($row = $datos->fetch_array()){

                                                       ?>    
                              </div><!-- fin de primera divicion-->

                              <div class = "col-md-4"><!-- inicio de 2 divicion -->
                                                    <!-- Izquierda -->
                                                    
                                                        <div class = "form-group"><label for="">Estado</label><input class = "form-control"  type="text" placeholder="Activo ?" name="estado_prod" required  autofocus></div>
                                                        <div class = "form-group"><label for="">Stock Inicial</label><input type="number" class="form-control" placeholder="Stock inicial"  name = "stok_prod"     required autofocus  ></div>
                                                        <div class = "form-group"><label for="">ID factura Proveedor</label><input type="text" class="form-control" placeholder="Factura proveedor" name="num_fac_ing" autofocus ></div>
                                                        <div class = "form-group"><label for="">Fecha de resepcion</label><input type="date" class="form-control" placeholder="Proveedor"    value="2020-05-22" min="0000-00-00" max="9999-99-99" name = "fecha"></div>
                                                        
                                                        
                              </div><!-- fin de segunda divicion-->

                              <div class="col-md-4">                                            

                                                    <div class="form-group"><label for="">Categoria de producto</label>
                                                        <select  class="form-control" name="CF_categoria">
                                                                            <?php 
                                                                            $categoria = Categoria::ningunDatoC();
                                                                            $datos = $categoria->verCategorias($d);
                                                                            while($row = $datos->fetch_array() ){
                                                                            
                                                                            ?>
                                                                            <option value="<?php echo $row['ID_categoria'] ?>"><?php echo $row['nom_categoria'] ?></option>
                                                                            <?php }
                                                   
                                                                            ?>
                                                        </select>
                                                    </div><!--  fin de form-group Producto -->
                                   
                                                   
                                                    <div class="form-group"><label for="">Medida</label>
                                                            <select  class="form-control" name="CF_tipo_medida" >
                                                                                <?php 
                                                                                $medida = Medida::ningunDatoM();
                                                                                $datos = $medida->verMedida($d);
                                                                                while($row = $datos->fetch_array() ){

                                                                                ?>

                                                                                <option value="<?php echo $row['ID_medida'] ?>"><?php echo $row['nom_medida'] ?></option>

                                                                                <?php }
                                                                                
                                                                                ?>
                                                            </select>
                                                    </div><!--  fin de form-group Medida -->
                                              

                                                    <div class =" form-group"><label for="">Provedor</label>  
                                                            <select  class = "form-control" name="FK_rut"  >
                                                                <?php 
                                                                $proveedor =  Proveedor::ningunDatoP();
                                                                $datos = $proveedor->verProveedor($d); 
                                                                while($row = $datos->fetch_array() ){
                                                                
                                                                ?>

                                                                    <option value="<?php echo $row['ID_rut']  ?>"> <?php echo $row['nom_empresa']  ?> </option>

                                                                <?php  } ?>
                                                            </select>
                                                    </div><!--  fin de form-group Provedor-->
                                    
                                                    <input type="hidden" name="accion" value="insertUsuario">
                                                    <!-- BOTON A ENLACE TABLA -->  
                                                    <div class = "form-group "><a class = "btn btn-primary form-control" href="CU005-crearProductos.php?accion=verProducto">Ver productos existentes</a></div>

                                         </form>

                              </div><!-- fin de tercera divicion -->       
                      </div><!-- row -->
               </div><!-- fin card body interno -->
        </div><!-- fin de container fluid --> 
</div><!-- Card externo --> <br>


<?php 
if(isset($_GET['accion'])){


echo print_r($_GET);
echo "estoy en el get";

if($_GET['accion'] == 'verProducto');{


?>


<table class="table table table-striped  table-bordered bg-white table-sm col-md-10 col-sm-4 col-xs-12 mx-auto">
    <thead>
        <tr>
            <th>ID producto</th>
            <th>Nombre producto</th>
            <th>Valor producto</th>
            <th>Stock producto</th>
            <th>Estado</th>
            <th>Categoria</th>
            <th>Tipo medida</th>
        </tr>
    </thead>
<?php 

$datos = Producto::verProductos();
while($row = $datos->fetch_array()){

?>


    <tbody>
        <tr>
   
            <td><?php echo $row['ID_prod']  ?></td>
            <td><?php echo $row['nom_prod'] ?></td>
            <td><?php echo $row['val_prod'] ?></td>
            <td><?php echo $row['stok_prod'] ?></td>
            <td><?php echo $row['estado_prod'] ?></td>
            <td><?php echo $row['CF_categoria'] ?></td>
            <td><?php echo $row['CF_tipo_medida'] ?></td>
        </tr>
    
    </tbody>

    <?php  }// fin de while ?>
</table>



<?php

}// fin de accion ver producto
}// fin de asset get accion
finhtml();

?>