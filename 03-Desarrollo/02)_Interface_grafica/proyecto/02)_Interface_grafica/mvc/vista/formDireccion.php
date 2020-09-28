<?php
include_once '../plantillas/plantilla.php';
include_once '../plantillas/cuerpo/inihtmlN2.php';
include_once '../plantillas/nav/navN2.php';
include_once '../clases/class.ciudad.php';
include_once '../clases/class.localidad.php';




cardtitulo("Direccion");
?>



<div class="col-md-4 mx-auto">
    <div class="row">

        <div class="card card-body ">
            <div class="card card-body shadow col-md-8 mx-auto text-center">
                <h4 class="card-title">Eliga las opciones de ubicaicon</h4>

                <!-- lista 1------------------------------------------------------------------------------------ -->
              
       
	<h2></h2>

			<label>SELECT 1 (ciudad)</label>
			<select id="lista1" name="lista1" class="">

			<?php   
			//include_once 'clases/class.ciudad.php';
		$datos = Ciudad::verCiudad();
			while( $row = $datos->fetch_array()){
				?>
				<option value="<?php echo $row['ID_ciudad'] ?>"><?php echo $row['nom_ciudad'] ?></option>
			<?php }  ?>
			</select>
			</div>

		
			<br>
			<div id="select2lista"></div>
			<div id="select3lista"></div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#lista1').val(2);
		recargarLista();

		$('#lista1').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"ciudad=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>

                
                <!--form group -->

                <!-- lista 2--------------------------------------------------------------------------------------------- -->

                   <!-- lista 2------------------------------------------------------------------------------------ -->

                <!--form group -->

                <!-- lista 2--------------------------------------------------------------------------------------------- -->


                 
            </div><!-- fin de card interna -->



        </div><!-- fin de row -->
    </div><!-- fin del col -->
    <?php
  
    ?>