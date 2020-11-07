
@extends('layouts.app')
@section('content')


<script>
    function desactivarCuenta(id_to_delete) {
        var confirmation = confirm('Esta seguro que desea desactivar: ' + id_to_delete + ' ?');
        if (confirmation) {
            window.location = "../controlador/api.php?apicall=desactivarUsuario&&id=" + id_to_delete;
        }
    }
</script>
<script>
    function activarCuenta(id_to_delete) {
        var confirmation = confirm('Esta seguro que desea activar: ' + id_to_delete + ' ?');
        if (confirmation) {
            window.location = "../controlador/api.php?apicall=activarCuenta&&id=" + id_to_delete;
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
                    <div class="form-group"><input type="text" class="form-control " placeholder="ID usuario " name="documento" value=""></div>
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


                        </select>
                </div><!-- fin de form control -->
                <input type="hidden" name="accion" value="consRol">
                <div class="form-group"><input class="form-control btn btn-primary" type="submit"></div>
                </form><!-- fin form ver por rol -->
            </div><!-- fin de card -->
        </div><!-- fin de tercera divicion -->

        <!-- -------------------------------------------------------------- -->
    </div><!-- fin de row -->
</div>




</div><!-- fin de primera divicion -->

<div class="card card-body col-lg-11 mx-auto my-4 text-center ">
    <h5 class="my-2">Usuarios</h5>
    <div class="row col-lg-10 mx-auto">
        <!-- -------------------------------------------------------------- -->
        <div class=" col-md-4  mx-auto card card-body shadow ">
            <div class="form-group  col-lg-10 row">
                <label class="col-sm-9" for="">Activos</label>
                <input class="form-control col-sm-3" type="text" value="" disabled>
            </div>
        </div>

        <div class=" col-md-4  mx-auto card card-body shadow">
            <div class="form-group  col-lg-10 row">
                <label class="col-sm-9" for="">Inactivos</label>
                <input class="form-control col-sm-3" type="text" value="" disabled>
            </div>
        </div>

        <div class=" col-md-4  mx-auto card card-body shadow">
            <div class="form-group  col-lg-10 row">
                <label class="col-sm-9" for="">Registrados</label>
                <input class="form-control col-sm-3" type="text" value="" disabled>
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
                <a class="btn-block btn btn-dark" href="formTelefono.php">Directorio telefonico</a>
            </div>
            <div class=" col-md-3 my-2 mx-auto">
                <a class="btn-block btn btn-dark" href="">Directorio direcciones</a>
            </div>


            <!-- -------------------------------------------------------------- -->
        </div>
    </div>
</div>




<script src="estilos/js/cUsuariosJquery.js"></script>

@endsection
