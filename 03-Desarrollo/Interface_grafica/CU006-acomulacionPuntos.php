<?php
include_once 'plantillas/navgeneral.php';
include_once 'plantillas/navN1.php';
include_once 'plantillas/plantilla.php';
include_once 'session/sessiones.php';
include_once 'plantillas/inihtml.php';
include_once 'session/sessiones.php';
include_once 'session/valsession.php';

cardtitulo("Acumulación de puntos de compra");

?>
<div class="card card-body text-center col-md-10 mx-auto">
    <!--<div class="container">-->
    <div class=" container-fluid ">
        <div class="card card-body ">
        </div><br>


        <form action="">
            <div class=col-md-12></div>
            <div class="row">

                <div class="col-md-6">
                    <!-- derecha -->
                    <label for="start">Fecha:</label>
                    <div class="form-group"><input class="form-control" type="date" id="start" name="trip-start" value="2020-05-22" min="0000-00-00" max="9999-99-99"></div>
                    Id CLiente
                    <div class="form-group"><input type="text" class="form-control" placeholder="Id cliente"></div>
                </div>

                <div class="col-md-6">
                    <!-- Izquierda -->
                    Pediodo promedio <br>
                    <select class="form-control">
                        Pediodo promedio
                        <option>Día</option>
                        <option>Mes</option>
                        <option>Año</option>
                    </select><br>

                    <div class="form-group"> <input class="btn btn-primary form-control" type="submit" value="Ver Puntos Acumulados"> </div>

                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Id cliente</th>
                            <th scope="col">Nombre cliente</th>
                            <th scope="col">Puntos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>12-05-2020</td>
                            <td>524354353</td>
                            <td>Juan</td>
                            <td>600</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>04-05-2020</td>
                            <td>524354353</td>
                            <td>Juan</td>
                            <td>600</td>
                        </tr>

                    </tbody>
                </table>
            </div>
    </div>
</div>
</form>


</div>
</div>



</div>


<?php
include_once 'plantillas/finhtml.php';
?>