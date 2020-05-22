<?php
require 'nav.php';
require 'plantilla.php';
require 'class.usuario.php';
inihtml();
?>
<div class ="container-fluid">

<?php cardtituloS("Administrador de solicitiudes")?>


<div class = "col-md-12">
    <div class ="row">
        <div class = "col-md-6">
            <div class = "col-md-12">
                <div class = "row">
                    <div class = "col-md-4"><br>
                    <!-- espasio de foto -->
                        <div class = "card card-body col-3 col-md-5 mx-auto img-thumbnail   ">Foto Us</div  width="290">
                    </div>
                    <div class = "col-md-6">
                        <div class = "col-md">
                            <div class ="row">
                                <!-- option de impresion -->
                                <div class ="col-md col-lg-5"><br>
                                    <select name="op" class = "form-control" >
                                        <option value="CSV">CSV</option>
                                        <option value="Excel">Excel</option>
                                        <option value="PDF">PDF</option>
                                    </select><br>
                                    <div class = "form-group"><input type="number" class ="form-control "></div>

                                </div>
                                <!-- Botones de imprimir -->
                                
                                <div class ="col-md col-lg-5"><br>
                                <div class ="form-group"><button class = "btn btn-primary form-control ">Exportar</button></div>
                                <div class ="form-group"><button class = "btn btn-primary form-control ">imprimir</button></div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class = "col-md mx-auto"><br>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class = "col-md-6">
            <div class = "col-md-12">
                <div class = "row">
                    <div class = "col-md-6 "><br>

                    </div>
                    <div class = "col-md-6"><br>
                    <form action="CU0013-ControlUsuarios.php" method = "POST">
                        <div class = "form-group"><input type="text" class="form-control col-md col-lg-4 " placeholder="ID usuario " name = "documento" ></div>
                        <input type="hidden" value= "bId"  name = "accion">
                        <div class = "form-group "><input class = "btn btn-primary form-control col-md col-lg-4" type="submit" value="Buscar id"></div>
                        </form>

                            <form action="CU0013-ControlUsuarios.php" method="POST">


                            <div class= "form-group">
                            <select name="estado" class ="form-control col-md col-lg-4 " >
                            <option value=  "p" >Pendientes</option>
                            <option value=  "a" >Aprobados</option>
                              </select>
                            </div>
                            
                                <input type="hidden" value="estado" name = "accion">
                                <div class = "form-group "><input class = "btn btn-primary form-control col-md col-lg-4" type="submit" value="Reguistros"></div>
                            </form>
                            



                    <?php // Busqueda por id
                   if(  (isset($_POST['accion'])) &&  ($_POST['accion'] == 'bId')){
                       if($_POST['documento']>0){
                        $id = $_POST['documento'];
                        $usuario = Usuario::ningunDato();
                        $datos = $usuario -> selectIdUsuario($id);
                    }else{ echo"<script>alert('Error, digita ID de usuario')</script>";}     }
                    // todos los regusitros
                    //if(  (isset($_POST['accion'])) &&  ($_POST['accion'] == 'todo')){
                     //   $usuario = Usuario::ningunDato();
                    //    $datos = $usuario -> selectUsuario();
                   // }
                   if(  (isset($_POST['accion'])) &&  ($_POST['accion'] == 'estado')){

                    if (     (isset($_POST['estado']))  ){
                        

                        if($_POST['estado'] == "a"){ $estado = 1; }else{ $estado = 0; }
                       $usuario = Usuario::ningunDato();
                       $datos = $usuario -> selectUsuariosPendientes($estado);
                   
                    }
                     }


                    ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br>



    <table class = "  table table-bordered  table-striped bg-white table-sm col-md-10 col-sm-4 col-xs-12 mx-auto">
        <thead>

            <tr>
                <td>Tipo doc</td>
                <td>Documento</td>
                <td>P. Nombre</td>
                <td>S. Nombre</td>
                <td>P. Apellido</td>
                <td>S. Apellido</td>
                <td>Fecha</td>
                <td>Foto</td>
                <td>Correo</td>
                <td>Estado</td>
                <td>Accion</td>
<!-- U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.fecha, U.foto, U.correo, R_U.estado -->
 
                
                <?php 
                //$usuario = Usuario::ningunDato();
                //$datos = $usuario->selectUsuario();

                
                if(isset($datos)){
                    while($row = $datos->fetch_array()){
                ?>

            </tr>
        </thead>
        <tbody>
            <!-- Los nombres que estan en [''] son los mismos de los atributos de la base de datos de lo contrario dara un error -->
            <td><?php echo $row['FK_tipo_doc']?></td>
            <td><?php echo $row['ID_us']?></td>
            <td><?php echo $row['nom1']?></td>
            <td><?php echo $row['nom2']?></td>
            <td><?php echo $row['ape1']?></td>
            <td><?php echo $row['ape2']?></td>
            <td><?php echo $row['fecha']?></td>
            <td><?php echo $row['foto']?></td>
            <td><?php echo $row['correo']?></td>
            <td><?php echo $row['estado']?></td>
            <td>
                <a   href=" get.php?accion=editar&&id  <?php $row['ID_us'] ?>; " class = "btn btn-secondary">Editar</a> 
                <a href="get.php?accion=aprobar" class = "btn btn-success">Aprobar</a>
                <a href="get.php?accion=eliminar" class = "btn btn-danger">Deshabilitar</a>
            </td>
        </tbody>
        <?php 
          
         }}
        ?>
    </table>



</div>


    <!-- Complementos bootstrap java script-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>