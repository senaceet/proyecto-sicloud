<?php

include_once 'session/sessiones.php';
include_once 'session/valsession.php';


//comprobacion de rol
$in = false;
if ($_SESSION['usuario']['ID_rol_n']  == 1) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n'] == 4) {
    $in = true;
} elseif ($_SESSION['usuario']['ID_rol_n'] == 3) {
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


    include_once 'plantillas/plantilla.php';
    include_once  'clases/class.medida.php';
    include_once 'clases/class.usuario.php';
    include_once 'clases/class.rol.php';
    include_once 'plantillas/cuerpo/inihtmlN1.php';
    include_once 'plantillas/nav/navN1.php';


    $tabla = false;

?>
    <?php cardtituloS("Administrador de solicitiudes") ?>



    <div class="card card-body col-md-8 mx-auto my-2 text-center">
        <div class="card-title">Filtros</div>

        <div class="row">



            <!-- Primera fila  4 de 12 col-->
            <div class="card card-body col-md-4 shadow">
                <h6>Busqueda por ID</h6>
                <div class="card card-body mx-auto col-10 my-2 shadow border">
                    <!-- form por id -->
                    <form action="CU009-controlUsuarios.php" method="GET">
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
                <h6>Busqueda por Estado de cuenta</h6>
                <div class="card card-body mx-auto col-10 my-2 shadow border">
                    <form action="CU009-controlUsuarios.php" method="POST">
                        <div class="form-group">
                            <select name="estado" class="form-control ">
                                <option value="p">Pendientes</option>
                                <option value="a">Aprobados</option>
                            </select>
                        </div>

                        <input type="hidden" value="estado" name="accion">
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
                        <form action="CU009-controlUsuarios.php" method="POST">
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

    //--- EVENTOS DE FORMULARIO----------------------------------------------------------------------

    // Filtro por id
    if ((isset($_GET['accion'])) &&  ($_GET['accion'] == 'bId')) {
        $tabla = true;
        if ($_GET['documento'] > 0) {
            $id = $_GET['documento'];
            $usuario = Usuario::ningunDato();
            $datos = $usuario->selectIdUsuario($id);
            $_SESSION['message'] = "Filtro por id";
            $_SESSION['color'] = "info";
        } else {
            $_SESSION['message'] = "No ha digitado el ID del usuario";
            $_SESSION['color'] = "danger";
        } // fin de consulta por id
    } // fin de isset accion



    // Filtro por estado de cuenta
    if ((isset($_POST['accion'])) &&  ($_POST['accion'] == 'estado')) {
        $tabla = true;
        if ((isset($_POST['estado']))) {
            if ($_POST['estado'] == "a") {
                $estado = 1;
                $_SESSION['message'] = "Filtro por cuentas activadas";
                $_SESSION['color'] = "info";
            } else {
                $estado = 0;
                $_SESSION['message'] = "Filtro por cuentas deshabilitadas";
                $_SESSION['color'] = "info";
            }
            $usuario = Usuario::ningunDato();
            $datos = $usuario->selectUsuariosPendientes($estado);
        } // fin consulta por estado de cuenta
    } // fin isset accion


    // Filtro por rol de usuario
    if (isset($_POST['consultaRol'])) {
        $tabla = true;
        $id = $_POST['rol'];
        $datos = Usuario::selectUsuarioRol($id);
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



    $

    <?php


    if ((isset($datos))  && ($tabla == true)) { ?>

        <div class="col-lg-12">
            <div class="table-responsive">

                <table id="example" style="width:100%" class=" col-lg-12  table-bordered  table-striped bg-white   mx-auto">
                    <thead>

                        <tr>
                            <th>Foto</th>
                            <th>Tipo doc</th>
                            <th>Documento</th>
                            <th>P. Nombre</th>
                            <th>S. Nombre</th>
                            <th>P. Apellido</th>
                            <th>S. Apellido</th>
                            <th>Rol</th>

                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </tr>

                        <?php

                        while ($row = $datos->fetch_array()) {
                        ?>

                            </tr>
                    </thead>
                    <tbody>
                        <!-- Los nombres que estan en [''] son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                        <td><img class="img-profile ml-3 rounded-circle mx-auto" src="fonts/us/<?php echo $row['foto']; ?>" alt="Card image cap" height="65" width="70"></td>
                        <td><?php echo $row['FK_tipo_doc'] ?></td>
                        <td><?php echo $row['ID_us'] ?></td>
                        <td><?php echo $row['nom1'] ?></td>
                        <td><?php echo $row['nom2'] ?></td>
                        <td><?php echo $row['ape1'] ?></td>
                        <td><?php echo $row['ape2'] ?></td>
                        <td><?php echo $row['nom_rol'] ?></td>

                        <td><?php echo $row['correo'] ?></td>
                        <td><?php if ($row['estado'] == 1) {
                                echo "activo";
                            } else {
                                echo "incativo";
                            }  ?></td>
                        <td>
                            <a href="forms/editarUsuario.php?id= <?php echo $row['ID_us'] ?> " class="btn btn-secondary btn-circle"><i class="fas fa-marker"></i></a>
                            <?php if ($_SESSION['usuario']['ID_rol_n'] == 1) {     ?>
                                <a href="metodos/get.php?accion=aprobarUsuario&&id= <?php echo $row['ID_us']   ?>" class="btn btn-circle btn-success"><i class="fas fa-check-square"></i> </a>
                                <a href="metodos/get.php?accion=desactivarUsuario&&id=  <?php echo $row['ID_us']   ?>  " class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i></a>
                            <?php }  ?>
                        </td>
                    </tbody>
            <?php

                        }
                    }
            ?>
                </table>
            </div>
        </div><!-- div de tablas -->


        </div>


        </div><!-- fin de primera divicion -->


  
                <?php
                 $activos = Usuario::conteoUsuariosActivos();
                $inctivos = Usuario::conteoUsuariosInactivos();
                $totaUs = Usuario::conteoUsuariosTotal();
                
                
                
                ?>
               


   





        <div class="card card-body col-md-11 mx-auto my-4 text-center ">
        <h5 class= "my-2">Usuarios</h5>
            <div class="row col-lg-10 mx-auto">


            

                <!-- -------------------------------------------------------------- -->

                <div class=" col-md-4  mx-auto card card-body shadow">
                <div class="form-group  col-lg-10 row">
                    <label class = "col-sm-10" for="">Activos</label>
                    <input class="form-control col-lg-2" type="text" value="<?php echo $activos ?>" disabled>
                    </div>
                </div>

                <div class=" col-md-4  mx-auto card card-body shadow">
                <div class="form-group  col-lg-10 row">
                    <label class = "col-sm-10" for="">Inactivos</label>
                    <input class="form-control col-lg-2" type="text" value="<?php echo $inctivos ?>" disabled>
                    </div>
                </div>

                <div class=" col-md-4  mx-auto card card-body shadow">
                <div class="form-group  col-lg-10 row">
                    <label class = "col-sm-10" for="">Registrados</label>
                    <input class="form-control col-lg-2" type="text" value="<?php echo $totaUs ?>" disabled>
                    </div>
                </div>
                
               


                <!-- -------------------------------------------------------------- -->
            </div>



            
        <div class="card card-body col-md-12 mx-auto my-4 text-center shadow">
            <div class="row">

                <!-- -------------------------------------------------------------- -->

                <div class=" col-md-3  mx-auto">
                    <a class="btn-block btn btn-dark" href="">Imprimir</a>
                </div>
                <div class=" col-md-3  mx-auto">
                    <a class="btn-block btn btn-dark" href="">Exportar</a>
                </div>
                <div class=" col-md-3  mx-auto">
                    <a class="btn-block btn btn-dark" href="forms/formTelefono.php">Directorio telefonico</a>
                </div>
                <div class=" col-md-3  mx-auto">
                    <a class="btn-block btn btn-dark" href="">Directorio direcciones</a>
                </div>


                <!-- -------------------------------------------------------------- -->
            </div></div>

  

 
        </div>  




        

    <?php

    include_once 'plantillas/cuerpo/footerN1.php';
    include_once 'plantillas/cuerpo/finhtml.php';
} // fin de validadcion y ejecucion de permisos por rol
    ?>