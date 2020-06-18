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
//require 'clases/class.producto.php;';


inihtml();

cardtitulo("Ingreso de producto-Bodega");

$d = new Conexion;
?>
 
<div class="card card-body text-center  col-md-10 mx-auto">
 
<div class="form-group col-md-4 mx-auto" >
    <a   class="btn btn-success form-control btn-block"  href="CU005-crearProductos.php">Crear Producto</a>
        </div>
    
<div class="container">
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4"><!-- inicio de la division -->
                <form action="metodos/post.php" method="POST">
                <div class="form-group">
                    <h5>Id producto</h5>
                    <select  class="form-control" name="ID_prod">
                        <?php 
                        $id_producto= producto::ningunDatoP();
                        $datos=$id_producto->verProductos($d); 
                        while($row=$datos->fetch_array()){                
                                 ?>
                          <option value="<?php echo $row['ID_prod'] ?>"><?php echo $row['ID_prod'] ?></option>
                         <?php 
                         }

                         ?>
                    </select>
                </div>
                    
                    <div class = "form-group">
                         <h5>Nombre Producto</h5>
                         <input  class = "form-control" type="text" class="form-control" placeholder="Nombre producto" name = "nom_prod" required autofocus >
                        </div>
                    <div class = "form-group">
                         <h5>Valor Producto</h5>
                         <input  class = "form-control" type="number" class="form-control" placeholder="Valor" name = "val_prod" required autofocus >
                    </div>
                    <div class = "form-group">
                     <h5>Stock Inicial</h5>
                     <input type="number" class="form-control" placeholder="Stock inicial"  name = "stok_prod" required autofocus  >
                 </div>
               
            </div><!-- fin division -->
            <div class="col-md-4"> <!-- Division 2 -->
                 <div class = "form-group">
                     <h5>ID factura Proveedor</h5>
                     <input type="text" class="form-control" placeholder="Factura proveedor" name="num_fac_ing" required autofocus >
                 </div>
                 <div class = "form-group">
                     <h5>Fecha de resepcion</h5>
                 </label><input type="date" class="form-control" placeholder="Proveedor" value="2020-05-22" min="0000-00-00" max="9999-99-99" name = "fecha" required autofocus>
                 </div>
                 <div class = "form-group">
                     <h5>Estado</h5>
                    
                        <select name="form-control" name="estado_prod" >
                            <?php
                            //Espacio para cuando se haga la clase estado
                            ?>
                            <option  value="Activo"> Activo</option>
                            <option value="Inactivo">Inactivo</option>

                        </select>
                    </div>
                </div><!-- Fin division 2 -->

                <div class="col-md-4"><!-- inicio division 3 -->
                 <div class="form-group">
                    <h5>Categoria de producto</h5>
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
                                   
                                                   
               <div class="form-group">
                   <h5>Medida</h5>
                       <select  class="form-control" name="CF_tipo_medida" >
                             <?php 
                             $medida = Medida::ningunDatoM();
                             $datos = $medida->verMedida($d);
                             while($row = $datos->fetch_array() ){

                             ?>

                     <option value="<?php echo $row['ID_medida'] ?>"><?php echo $row['nom_medida'] ?></option>

                            <?php 
                            }
                            ?>
                     </select>
                    </div><!--  fin de form-group Medida -->
                    <div class =" form-group"><!-- inicio provedor -->
                        <h5>Provedor</h5>  
                            <select  class = "form-control" name="FK_rut"  >
                                <?php 
                                $proveedor =  Proveedor::ningunDatoP();
                                $datos = $proveedor->verProveedor($d); 
                                while($row = $datos->fetch_array() ){
                                ?>
                             <option value="<?php echo $row['ID_rut']  ?>"> <?php echo $row['nom_empresa']  ?> </option>
                                  <?php  
                                  } 
                                  ?>
                            </select>
                    </div><!--  fin Provedor-->
            </div>
            </form>
        </div>
        <input type="hidden" name="accion" value="insertproducto">
                 <div class = "form-group"> <input class ="btn btn-primary form-control" type="submit" name ="submit" > </div>

    </div>
</div>