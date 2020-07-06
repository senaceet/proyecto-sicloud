<?php

include_once '../session/sessiones.php';
include_once '../session/valsession.php';




    //--------------------------------------------------------------------------


    include_once '../plantillas/plantilla.php';
    include_once '../clases/class.rol.php';
    include_once '../plantillas/cuerpo/inihtmlN2.php';
    include_once '../plantillas/nav/navN2.php';
    include_once '../clases/class.telefono.php';




?>
    <?php cardtituloS("Directorio telefonico") ?>



    <div class="card card-body col-md-8 mx-auto my-2 text-center">
        <div class="card-title">Filtros</div>

        <div class="row">



            <!-- Primera fila  4 de 12 col-->
            <div class="card card-body col-md-4 shadow">
                <h6>Busqueda por ID Usuario</h6>
                <div class="card card-body mx-auto col-10 my-2 shadow border">
                    <!-- form por id -->
                    <form action="formTelefono.php" method="GET">
                        <div class="form-group"><input type="text" class="form-control " placeholder="ID usuario " name="documento"></div>
                        <input type="hidden" value="bId" name="accion">
                        <div class="form-group "><input class="btn btn-primary form-control " type="submit" value="Buscar id"></div>
                    </form>
                    <!-- fin de form por id -->



                </div><!-- fin de card -->
            </div><!-- fin de primera divicion -->
            <!-- -------------------------------------------------------------- -->

            <!-- Segunda fila 8 de  12 col-->
            <div class="card card-body col-md-4 shadow">
                <h6>Busqueda por entidad</h6>
                <div class="card card-body mx-auto col-10 my-2 shadow border">
                    <form action="formTelefono.php" method="POST">
                        <div class="form-group">
                            <select name="entidad" class="form-control ">
                                <option value="p">Empresas</option>
                                <option value="a">Usuario</option>
                            </select>
                        </div>

                        <input type="hidden" value="entidad" name="accion">
                        <div class="form-group "><input class="btn btn-primary form-control " type="submit" value="Registros"></div>
                    </form><!-- fin de form estado filtro estado de cuenta -->
                </div><!-- fin de card -->
            </div><!-- fin de segundsa divicion -->


            <!-- -------------------------------------------------------------- -->


            <!-- Tercera fila 12 de 12 col bootstrap-->
            <div class="card card-body col-md-4 shadow">
                <h6>Busqueda por rol</h6>
                <div class="card card-body mx-auto col-10 my-2 shadow border">
                    <!-- formulario de filtro por rol -->
                    <div class="form-group">
                        <form action="formTelefono.php" method="POST">
                            <select name="rol" class="form-control ">
                                <?php
                                $datos = Rol::verRol();
                                while ($row = $datos->fetch_array()) {
                                ?>
                                    <option value="<?php echo $row['ID_rol_n'] ?>"><?php echo $row['nom_rol'] ?></option>
                                <?php
                                }  ?>
                            </select>
                    </div><!-- fin de form control -->
                    <div class="form-group"><input class="form-control btn btn-primary" name="consultaRol" type="submit" value="Filtrar por rol"></div>
                    </form><!-- fin form ver por rol -->
                </div><!-- fin de card -->
            </div><!-- fin de tercera divicion -->

            <!-- -------------------------------------------------------------- -->

        </div><!-- fin de row -->
    </div>



    <?php
    $us = false; $em = false;

    //--- EVENTOS DE FORMULARIO----------------------------------------------------------------------

    // Filtro por id
    if ((isset($_GET['accion'])) &&  ($_GET['accion'] == 'bId')) {
        if ($_GET['documento'] > 0) {
            $us = True; $em = false;
            $id = $_GET['documento'];
            $datos = Telefono::verTelefonosUsuarioPorID($id);
            //$datos = $telefono->selectIdUsuario($id);
            $_SESSION['message'] = "Filtro por id";
            $_SESSION['color'] = "info";
        } else {
            $_SESSION['message'] = "No ha digitado el ID del usuario";
            $_SESSION['color'] = "danger";
        } // fin de consulta por id
    } // fin de isset accion



    // Filtro por entidad
    if ((isset($_POST['accion'])) &&  ($_POST['accion'] == 'entidad')) {
        $us = true; $em = false;
        if ((isset($_POST['entidad']))) {
            if ($_POST['entidad'] == "a") {
                $entidad = 1;
                $datos = Telefono::verTelefonosUsuario();
                $_SESSION['message'] = "Filtro por telefono de usuario";
                $_SESSION['color'] = "info";
            } else {
                $us = false; $em = true;
                $entidad = 0;
                $datos = Telefono::verTelefonosEmpresa();
                $_SESSION['message'] = "Filtro por telefono de empresa";
                $_SESSION['color'] = "info";
            }
        } // fin consulta por entidad
    } // fin isset accion


    // Filtro por rol de usuario
    if (isset($_POST['consultaRol'])) {
        $us = True; $em = false;
        $rol = $_POST['rol'];
        $datos= Telefono::verTelefonosUsuarioRol($rol);
    } // fin de isset consulta rol


    if (isset($_SESSION['message'])) {  ?>

        <!-- alerta boostrap -->
        <div class="alert text-center col-md-4 mx-auto alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
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





    <?php


    if ((isset($datos)) ){ 


       if($us ==  true){
        ?>

        <div class="col-lg-12">
            <div class="table-responsive">

                <table id="example" style="width:100%" class=" col-lg-12  table-bordered  table-striped bg-white   mx-auto">
                    <thead>

                        <tr>
                            <th>ID usario</th>
                            <th>P. Nombre</th>
                            <th>P. Apellido</th>
                            <th>Rol</th>
                            <th>Telefono</th>
                            <th>Accion</th>
                        </tr>

                        <?php

                        while ($row = $datos->fetch_array()) {
                        ?>

                            </tr>
                    </thead>
                    <tbody>
                        <!-- Los nombres que estan en [''] son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                        <td><?php echo $row['ID_us'] ?></td>
                        <td><?php echo $row['nom1'] ?></td>
                        <td><?php echo $row['ape1'] ?></td>
                        <td><?php echo $row['nom_rol'] ?></td>
                        <td><?php echo $row['tel'] ?></td>
                        <td>
                            <a href="forms/editarUsuario.php?id= <?php echo $row['ID_us'] ?> " class="btn btn-secondary btn-circle"><i class="fas fa-marker"></i></a>
                            <?php if ($_SESSION['usuario']['ID_rol_n'] == 1) {     ?>
                                <a href="metodos/get.php?accion=aprobarUsuario&&id= <?php echo $row['ID_us']   ?>" class="btn btn-circle btn-success"><i class="fas fa-check-square"></i> </a>
                                <a href="metodos/get.php?accion=desactivarUsuario&&id=  <?php echo $row['ID_us']   ?>  " class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i></a>
                            <?php }  ?>
                        </td>
                    </tbody>
            <?php

                        }// fin de while de muestra telefono usario
                    }// fin de comprobasion de $us = true





                  
                        if($em ==  true){
                         ?>
                 
                         <div class="col-lg-12">
                             <div class="table-responsive">
                 
                                 <table id="example" style="width:100%" class=" col-lg-12  table-bordered  table-striped bg-white   mx-auto">
                                     <thead>
                 
                                         <tr>
                                             <th>ID empresa</th>
                                             <th>Empresa</th>
                                             <th>Telefono</th>
                                             <th>Accion</th>
                                         </tr>
                 
                                         <?php
                 
                                         while ($row = $datos->fetch_array()) {
                                         ?>
                 
                                             </tr>
                                     </thead>
                                     <tbody>
                                         <!-- Los nombres que estan en [''] son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                                         <td><?php echo $row['ID_rut'] ?></td>
                                         <td><?php echo $row['nom_empresa'] ?></td>
                                         <td><?php echo $row['tel'] ?></td>
                                         <td>
                                             <a href="forms/editarUsuario.php?id= <?php echo $row['ID_us'] ?> " class="btn btn-secondary btn-circle"><i class="fas fa-marker"></i></a>
                                             <?php if ($_SESSION['usuario']['ID_rol_n'] == 1) {     ?>
                                                 <a href="metodos/get.php?accion=aprobarUsuario&&id= <?php echo $row['ID_us']   ?>" class="btn btn-circle btn-success"><i class="fas fa-check-square"></i> </a>
                                                 <a href="metodos/get.php?accion=desactivarUsuario&&id=  <?php echo $row['ID_us']   ?>  " class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i></a>
                                             <?php }  ?>
                                         </td>
                                     </tbody>
                             <?php
                                         }// fin de while muestra telefonos de empresa
                                     }// fin de comprobasion de $us = true



























                } // fin de isset datos
            ?>
                </table>
            </div>
        </div><!-- div de tablas -->


        </div>


        </div><!-- fin de primera divicion -->



        <div class="card card-body col-md-12 mx-auto my-4 text-center">
            <div class="row">

                <!-- -------------------------------------------------------------- -->

                <div class=" col-md-3  mx-auto">
                    <a class="btn-block btn btn-dark" href="">Imprimir</a>
                </div>
                <div class=" col-md-3  mx-auto">
                    <a class="btn-block btn btn-dark" href="">Exportar</a>
                </div>
                <div class=" col-md-3  mx-auto">
                    <a class="btn-block btn btn-dark" href="../CU009-controlUsuarios.php">Control usuario</a>
                </div>
                <div class=" col-md-3  mx-auto">
                    <a class="btn-block btn btn-dark" href="">Directorio direcciones</a>
                </div>
                
                <!-- -------------------------------------------------------------- -->
            </div>
        </div>

    <?php

    include_once '../plantillas/cuerpo/footerN2.php';
  // fin de validadcion y ejecucion de permisos por rol
    ?>