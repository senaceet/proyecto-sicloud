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

    //=====================================================================================
    // funciones


    // Filtros

    //--- EVENTOS DE FORMULARIO----------------------------------------------------------------------

    //$tabla = false;
 // Filtro por id
 //$usuario = Usuario::ningunDato();

 $table= false;
 $usuario = Usuario::ningunDato();
 $datos = $usuario->verUsuarios();
 if ((isset($_GET['accion'])) &&  ($_GET['accion'] == 'bId')) {
     $tabla = true;
     if ($_GET['documento'] > 0) {
         $id = $_GET['documento'];
         
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
     $us = Usuario::ningunDato();
     $datos = $us->selectUsuarioRol($id);
 } // fin de isset consulta rol
 function selectRol()
 {
     $datosRol = Rol::verRol();
     foreach ($datosRol as $row) {
?>
            <option value="<?php echo $row['ID_rol_n'] ?>"><?php echo $row['nom_rol'] ?></option>
<?php
        }
    }


    function contenidoTablaUsuarios($datos)
    { if($talbe=true){
        foreach ($datos as $row) { ?>

            <tbody>
                <!-- Los nombres que estan en [''] son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                <td><img class="img-profile ml-3 rounded-circle mx-auto" src="fonts/us/<?php echo $row['foto']; ?>" alt="Card image cap" height="65" width="70"></td>
                <td><?= $row['FK_tipo_doc'] ?></td>
                <td><?= $row['ID_us'] ?></td>
                <td><?= $row['nom1'] ?></td>
                <td><?= $row['nom2'] ?></td>
                <td><?= $row['ape1'] ?></td>
                <td><?= $row['ape2'] ?></td>
                <td><?= $row['nom_rol'] ?></td>
                <td><?= $row['correo'] ?></td>
                <td><?= ($row['estado'] == 1) ? "Activo" : "Inactivo"; ?></td>
                <td>
                    <a href="javascript:window.open('forms/editarUsuario.php?id= <?= $row['ID_us'] ?>','','width=1200,height=1000,left=80,top=90,toolbar=yes');void 0" class="btn btn-secondary btn-circle"><i class="fas fa-marker"></i></a>
                    <?php if ($_SESSION['usuario']['ID_rol_n'] == 1) {     ?>
                        <a href="metodos/get.php?accion=aprobarUsuario&&id= <?php echo $row['ID_us']   ?>" class="btn btn-circle btn-success"><i class="fas fa-check-square"></i> </a>
                        <a onclick="desactivarCuenta( <?php echo $row['ID_us']   ?> )" href="#" class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i></a>
                    <?php } } ?>
                </td>
            </tbody>
        <?php

        }
    }


    function alerta()
    {

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
    }


    ?>
    <?php cardtituloS("Administrador de solicitiudes") ?>

    <script>
        function desactivarCuenta(id_to_delete) {
            var confirmation = confirm('Esta seguro que decea descativar la cuenta con id: ' + id_to_delete + ' ?');
            if (confirmation) {
                window.location = "metodos/get.php?accion=desactivarUsuario&&id=" + id_to_delete;
            }
        }
    </script>


    <div class="card card-body my-4 col-lg-2 mx-auto">
        <button class="btn btn-primary toggle" id="">Buscar Usuario</button>
    </div>
    <div class="card card-body col-md-8 mx-auto my-2 text-center form">
        <div class="card-title ">Filtros</div>
        <div class="row">
            <!-- Primera fila  4 de 12 col-->
            <div class="card card-body col-md-4 shadow ">
                <h6>Busqueda por ID</h6>
                <div class="card card-body mx-auto col-10 my-2 shadow border">
                    <!-- form por id -->
                    <form action="CU009-controlUsuarios.php" method="GET">
                        <div class="form-group"><input type="text" class="form-control " placeholder="ID usuario " name="documento" value="<?= (isset($_GET['documento'])) ?  $_GET['documento'] : "" ?>"></div>
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
                                <?php selectRol();  ?>
                            </select>
                    </div><!-- fin de form control -->
                    <div class="form-group"><input class="form-control btn btn-primary" name="consultaRol" type="submit" value="Filtrar por rol"></div>
                    </form><!-- fin form ver por rol -->
                </div><!-- fin de card -->
            </div><!-- fin de tercera divicion -->

            <!-- -------------------------------------------------------------- -->
        </div><!-- fin de row -->
    </div>
    <?php alerta(); ?>
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
                </thead>

                <?php contenidoTablaUsuarios($datos);  ?>

            </table>
        </div>
    </div><!-- div de tablas -->
    </div>
    </div><!-- fin de primera divicion -->



    <?php
    $us = Usuario::ningunDato();
    $activos =  $us->conteoUsuariosActivos();
    $inactivos = $us->conteoUsuariosInactivos();
    $totaUs = $us->conteoUsuariosTotal();
    ?>

    <div class="card card-body col-lg-11 mx-auto my-4 text-center ">
        <h5 class="my-2">Usuarios</h5>
        <div class="row col-lg-10 mx-auto">

            <!-- -------------------------------------------------------------- -->

            <div class=" col-md-4  mx-auto card card-body shadow ">
                <div class="form-group  col-lg-10 row">
                    <label class="col-sm-9" for="">Activos</label>
                    <input class="form-control col-sm-3" type="text" value="<?= $activos ?>" disabled>
                </div>
            </div>

            <div class=" col-md-4  mx-auto card card-body shadow">
                <div class="form-group  col-lg-10 row">
                    <label class="col-sm-9" for="">Inactivos</label>
                    <input class="form-control col-sm-3" type="text" value="<?= $inactivos ?>" disabled>
                </div>
            </div>

            <div class=" col-md-4  mx-auto card card-body shadow">
                <div class="form-group  col-lg-10 row">
                    <label class="col-sm-9" for="">Registrados</label>
                    <input class="form-control col-sm-3" type="text" value="<?= $totaUs ?>" disabled>
                </div>
            </div>
            <!-- -------------------------------------------------------------- -->
        </div>


        <div class="card card-body col-md-12 mx-auto my-4 text-center shadow">
            <div class="row">
                <!-- -------------------------------------------------------------- -->
                <div class=" col-md-3 my-2 mx-auto">
                    <a class="btn-block btn btn-dark" href="">Imprimir</a>
                </div>
                <div class=" col-md-3 my-2 mx-auto">
                    <a class="btn-block btn btn-dark" href="">Exportar</a>
                </div>
                <div class=" col-md-3 my-2 mx-auto">
                    <a class="btn-block btn btn-dark" href="forms/formTelefono.php">Directorio telefonico</a>
                </div>
                <div class=" col-md-3 my-2 mx-auto">
                    <a class="btn-block btn btn-dark" href="">Directorio direcciones</a>
                </div>
                <!-- -------------------------------------------------------------- -->
            </div>
        </div>
    </div>
<?php
    include_once 'plantillas/cuerpo/footerN1.php';
    include_once 'plantillas/cuerpo/finhtml.php';
} // fin de validadcion y ejecucion de permisos por rol
?>

<script src="js/cUsuariosJquery.js"></script>