<?php
require 'nav.php';
require 'plantilla.php';
inihtml();

cardtitulo("Registro producto");

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
                                                    ID Producto
                                                    <div class = "form-group"><input class = "form-control" type="text" placeholder="ID producto"></div>
                                                    Nombre Producto
                                                <div class = "form-group"><input  class = "form-control" type="text" class="form-control" placeholder="Nombre producto"></div>
                                                Caracteristicas del Producto
                                                    <div class =" form-group"> <textarea class="form-control" rows="6"></textarea></div>
                                            </div>

                                            <div class = "col-md-6">
                                                    <!-- Izquierda -->
                                                    <label for="start">Fecha Recepción:</label>
                                                        <div class = "form-group"><input class = "form-control"  type="date" id="start" name="trip-start" value="2020-05-22" min="0000-00-00" max="9999-99-99" ></div>

                                                        Stock Inicial
                                                        <div class = "form-group"><input type="text" class="form-control" placeholder="Stock inicial"></div>
                                                        Proveedor
                                                        <div class = "form-group"><input type="text" class="form-control" placeholder="Proveedor"></div>

                                                        <div class = "form-group"> <input class ="btn btn-primary form-control" type="submit" value ="crear producto"> </div>
                                                        <div class = "form-group "><a class = "btn btn-primary form-control" href="">Ver productos existentes</a></div>
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