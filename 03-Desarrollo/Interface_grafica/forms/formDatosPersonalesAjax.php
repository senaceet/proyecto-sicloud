<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Datos personales</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="jav.css">

    <!-- funcion de localidad---------------------------------------------- -->
    <script lenguage="javascript">
        $(document).ready(function() {
            // detecta cuanto el cbx_ciudad cambie
            $("#cbx_ciudad").change(function() {
                $('#cbx_barrio').find('option').remove().end().append(
                    '<option value="whaterver"></option>').val('whaterver');
                // se trae la opcion que se haya seleccionado
                $("#cbx_ciudad option:selected").each(function() {
                    // guarda el ID
                    id_ciudad = $(this).val();
                    $.post("includes/getLocalidad.php", {
                        id_ciudad: id_ciudad
                    }, function(data) {
                        $("#cbx_localidad").html(data);
                    });
                }); // fin de la funcion each
            }) // fin de la funcion change
        }); // fin de funcion ready
    </script>
    <!-- funcion de localidad---------------------------------------------- -->


    <!-- funcion de barrio---------------------------------------------- -->
    <script lenguage="javascript">
        $(document).ready(function() {
            // detecta cuanto el cbx_ciudad cambie
            $("#cbx_localidad").change(function() {

                // se trae la opcion que se haya seleccionado
                $("#cbx_localidad option:selected").each(function() {
                    // guarda el ID
                    id_localidad = $(this).val();
                    $.post("includes/getBarrio.php", {
                        id_localidad: id_localidad
                    }, function(data) {
                        $("#cbx_barrio").html(data);
                    });
                }); // fin de la funcion each
            }) // fin de la funcion change
        }); // fin de funcion ready
    </script>
    <!-- funcion de barrio---------------------------------------------- -->


</head>

<body>

    <?php


    include_once '../clases/class.ciudad.php';
    include_once '../clases/class.localidad.php';
    include_once '../clases/class.barrio.php';
    include_once '../session/sessiones.php';
    include_once '../plantillas/plantilla.php';



    cardtitulo("Datos personales")

    ?>

    <div class="col-md-10 mx-auto text-center">
        <?php
        if (isset($_SESSION['message'])) {  ?>

            <!-- alerta boostrap -->
            <div class=" my-3 alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
                <?php
                echo  $_SESSION['message']  ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            setMessage();
        }


        $datosCiudad = Ciudad::verCiudad();
        ?>
    </div>



    <div class="col-md-10 mx-auto my-4">

        <div class="row">
            <div class="card card-body  mx-auto">
                <div class="card-title shadow">Direccion</div>
                <div class="card card-body shadow col-md-8 mx-auto text-center">
                    <form id="combo" name="combo" action="../metodos/post.php" method="POST">

                        <!-- ----------------------------------Select Ciudad------------------------------------------------------- -->
                        <div><label>Seleccione Ciudad</label>
                            <div class="form-group">
                                <select id="cbx_ciudad" name="cbx_ciudad" class="form-control">
                                    <option value="0">Seleccionar ciudad</option>
                                    <?php while ($row = $datosCiudad->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['ID_ciudad'] ?>"><?php echo $row['nom_ciudad'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- ----------------------------------Select Ciudad fin------------------------------------------------------- -->
                            <!-- ----------------------------------Select Ciudad------------------------------------------------------- -->
                            <div class=""><label for="">Seleccion Localidad</label>
                                <div class="form-group">
                                    <select class="form-control" name="cbx_localidad" id="cbx_localidad"></select>
                                </div>
                            </div>
                            <!-- ----------------------------------Select Ciudad fin------------------------------------------------------- -->
                            <!-- ----------------------------------Select Barrio------------------------------------------------------- -->
                            <div class=""><label for="">Seleccion Barrio</label>
                                <div class="form-group">
                                    <select class="form-control" name="cbx_barrio" id="cbx_barrio"></select>
                                </div>
                            </div>
                            <!-- ----------------------------------Select Barrio fin------------------------------------------------------- -->
                            <label class="" for="">Digite direccion</label>
                            <div class="form-group "><input type="text" class="form-control" placeholder="Direccion" name="direccion"></div>
                            <input type="hidden" name="accion" value="insertDireccion">
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="registrar direccion">
                    </form>
                </div><!-- fin de card direccion -->
            </div><!-- fin de col 1  card card-body  mx-auto direcccion externa-->
        </div><!-- fin de row 1 -->

        <div class="col-md-6">
            <div class="card card-body my-2 ">
                <form action="../metodos/post.php" method="POST">
                    <div class="card-title shadow">Telefono</div>
                    <br>
                    <br><br><br><br>

                    <div class="card card-body shadow col-md-8 mx-auto text-center ">
                        <div class="form-group"><label for="my-input">Ingrese telefono</label><input id="my-input" class="form-control" type="text" name="telefono"></div>
                        <input class="btn btn-primary btn-block" type="submit" name="submit" value="Registar telefono">
                        <input type="hidden" name="accion" value="insertTelefono">

                    </div><!-- fin de card telefono -->
                </form>
                <br><br><br><br><br>
                <a href="../index.php" class="btn btn-primary col-md-8 mx-auto">Inicio</a><br>
            </div><!-- fin cr card body telefono -->
        </div><!-- fin de col telefono -->

    </div><!-- fin de container -->


</body>

</html>