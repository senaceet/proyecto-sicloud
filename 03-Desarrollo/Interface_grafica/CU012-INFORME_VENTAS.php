<?php
require 'nav.php';
require 'plantilla.php';
inihtml();

cardtitulo("Informe de ventas");

?>
<div class = "card card-body text-center bk-rgb col-md-10 mx-auto">
 <!--<div class="container">-->
<div class =" container-fluid ">
    <div class = "card card-body "> 
                </div ><br>
            

            <form action=""  >
                        <div class = col-md-12></div>
                                <div class="row">

                                            <div class = "col-md-6">
                                                    <!-- derecha -->
                                                    <label for="start">Fecha inicial:</label>
                                                <div class = "form-group"><input class = "form-control"  type="date" id="start" name="trip-start" value="2020-05-01" min="0000-00-00" max="9999-99-99" ></div> 
                                                <label for="start">Fecha fin:</label>
                                                <div class = "form-group"><input class = "form-control"  type="date" id="start" name="trip-start" value="2020-05-25" min="0000-00-00" max="9999-99-99" ></div>
                                            </div>

                                            <div class = "col-md-6">
                                                    <!-- Izquierda -->
                                                    Formato de descarga <br>
                                                     <select class="form-control">
                                                     Periodo promedio
                                                            <option>CSV</option>
                                                            <option>EXCEL</option>
                                                            <option>PDF</option>
                                                            <option>XML</option>
                                                            </select><br>
                                                    
                                                    <div class = "form-group"> <input class ="btn btn-primary form-control" type="submit" value ="Descargar CSV"> </div>
                                                    
                                            </div>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">factura</th>
                                                    <th scope="col">Productos</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    <th scope="row">1</th>
                                                    <td>12-05-2020</td>
                                                    <td>524354353</td>
                                                    <td>H-43535-45</td>
                                                    <td>60</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">2</th>
                                                    <td>04-05-2020</td>
                                                    <td>524354677</td>
                                                    <td>H-43526-34</td>
                                                    <td>20</td>
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
finhtml();
?>