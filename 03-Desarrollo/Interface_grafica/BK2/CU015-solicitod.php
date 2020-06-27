<?php
include_once 'plantillas/plantilla.php';

include_once 'plantillas/inihtml.php';
include_once 'plantillas/navN1.php';
include_once 'session/sessiones.php';

?>
<!-- Encabesado solicitud -->
<div class = "container-fluid">
   
   
     <?php cardtituloS("Solicitud")?>



    </div>
</div><br><br>

<!-- 2 check -->
<div class ="col-md-12">
    <div class ="row">
        <!-- Medidas de servicios y productos -->
        <div class = "col-md-1"></div>
        <div class = "col-md-5">
            <div class="bk-rgb">
                <div class = "col-md-12">
                    <div class="row">
                        <div class = "col-md-6 col-6">
                            <div class="input-group-text">
                            <input type="radio" aria-label="Radio button for following text input"><h6>Servicios</h6>
                            </div>
                        </div>
                            <div class = "col-md-6 col-6">
                            <div class="input-group-text">
                            <input type="radio" aria-label="Radio button for following text input"> <h6>Productos</h6>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        <div class = "col-md-4">
        </div>
        <div class = "col-md-2"></div>
    </div>
</div><br>





<!-- col 12 -->
<!--  -->

<div class ="col-md-12">
    <div class ="row">
        <!-- Caja relleno -->
    <div class = "col-md-1"></div>

    <!-- caja de derecha -->
    <div class = "col-md-5">
        <div class = "card card-body"><br>
                <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nombre</label>
                       <div class="col-sm-10">
                         <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                      </div>
                      
               </div>
               <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Telefono</label>
                       <div class="col-sm-10">
                         <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                      </div>
                      
               </div>

               <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Correo</label>
                       <div class="col-sm-10">
                         <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                      </div>

               </div>

               <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Producto</label>
                       <div class="col-sm-10">
                         <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                      </div>
                        
               </div>

               <div class="form-group row">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No. productos</label>
                       <div class="col-sm-10">
                         <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                      </div>
                        
               </div>
            
        </div>
    </div>




    <!-- Caja izquierda -->
    <div class = "col-md-5">
        <div class = "card card-body">
            <div class = "card-header text-center"><h5>Consultas</h5></div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Detalles</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <input type="submit" class =" btn btn-primary">
        </form>
        </div>
    </div>
    <div class = "col-md-1"></div>
    </div>
</div><br><br><br><br>

<footer>
<div class = "col-md-12 footer">
    <div class = "row">
        <div class="col-md-1"></div>
        <div class = "card card-body col-md-5">
        <h6>Horario: </h6> 
        </div>
        <div class = "card card-body col-md-5">
        <div class="col-md-1"></div>
             <ul>
                 <li>Direcccion dddddd</li>
                 <li>Correo @@@@</li>
                <li>Telefono  444444 </li>
             </ul>
             <div class = "container-fulid">
             </div>

        </div>
    
    
    
    
    
    
    
    
    
    
    
    </div>
</div>
</footer>




<?php
finhtml();
?>