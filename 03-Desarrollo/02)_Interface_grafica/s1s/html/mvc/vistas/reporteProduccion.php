<?php


ini_set('display_erros', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
echo 'vista<br>';
require_once '../con_informe/factController.php';


$objP = new c_infoProduccion ;
$nombreUsuarios = $objP->nombreUsuarios;

echo $objP->fitraDatosArray(  );



print_r($nombreUsuarios); //die();
?>


<!DOCTYPE html>
<html lang="es">
<script src="/JsScripts/jquery-1.9.1.js"></script>
<script src="/JsScripts/Chart_2_9_3/Chartmin.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="/js/fontawesome-all.js"></script>
<SCRIPT src="/archivosMenu/JSCookMenu.js" type=text/javascript></SCRIPT>
<SCRIPT src="/archivosMenu/theme.js" type=text/javascript></SCRIPT>

<head>
   <meta charset="iso-8859-1">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="pragma" content="no-cache">
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <title>Reporte operario</title>
   <link href="/css/estilos.css" rel="stylesheet" type="text/css">
   <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" type="text/css" href="/bootstrap/bootstrap.min.css"/>
   <link href="/archivosMenu/theme.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" type="text/css" href="/_clientes/ittpruebas/estilo.css"/>
   <link href="/css/ineditto.css" rel="stylesheet" type="text/css">
</head>
<body>


   <div class="container-fluid ">
      <div class="container-pt-4 my-4">
         <div class="card card-body col-md-4 col-lg-8  text-center mx-auto bk-rgb shadow p-3 mb-5 bg-white ">
            <h4 class="">Reporte de operario</h4>
         </div>
      </div><br><br>
      <div class="row ">
         <div class="col-lg-3  col-sm-4 col-md-5 mx-auto my-4  ">
            <card class="shadow-lg card card-body mx-auto">
               <form method="GET">
               <h6 class="card-header shadow my-2">Formulario de busqueda</h6>
                  Operario
                  <div class="form-group">
                     <select class="form-control" name="selectId">
<?php
foreach ( $nombreUsuarios as $em ) {
   $sel = (isset( $_GET[ 'selectId' ]) && $_GET['selectId']==$em[0] ) ? ' selected' : '';
   echo '<option'. $sel . ' value="'. $em[0] .'">'. $em[1] .'</option>';
}
?>
                     </select>
                  </div>
                  Fecha inicial
                  <div class="form-group"><input class="form-control" name="fIni" value="<?= $fIni ?? date('Y/m/d')  ?>" type="date">
                  </div>
                  Fecha final
                  <div class="form-group"><input class="form-control" name="fFin" value="<?= $fFin ?? date('m/d/Y')  ?>" type="date">
                  </div>
                  <input class="btn btn-success btn-block" type="submit" value="Buscar usuario">
               </form>
            </card>
         </div>

<?php 

if (isset($id)){
   if (count($datosT) > 1){     
?>
         <div class="col-lg-9 mx-auto container-fluid">
            <div class="row my-4"?>
<!DOCTYPE html>
<html lang="es">
<script src="/JsScripts/jquery-1.9.1.js"></script>
<script src="/JsScripts/Chart_2_9_3/Chartmin.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="/js/fontawesome-all.js"></script>
<SCRIPT src="/archivosMenu/JSCookMenu.js" type=text/javascript></SCRIPT>
<SCRIPT src="/archivosMenu/theme.js" type=text/javascript></SCRIPT>

<head>
   <meta charset="iso-8859-1">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="pragma" content="no-cache">
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <title>Reporte operario</title>
   <link href="/css/estilos.css" rel="stylesheet" type="text/css">
   <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" type="text/css" href="/bootstrap/bootstrap.min.css"/>
   <link href="/archivosMenu/theme.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" type="text/css" href="/_clientes/ittpruebas/estilo.css"/>
   <link href="/css/ineditto.css" rel="stylesheet" type="text/css">
</head>
<body>


   <div class="container-fluid ">
      <div class="container-pt-4 my-4">
         <div class="card card-body col-md-4 col-lg-8  text-center mx-auto bk-rgb shadow p-3 mb-5 bg-white ">
            <h4 class="">Reporte de operario</h4>
         </div>
      </div><br><br>
      <div class="row ">
         <div class="col-lg-3  col-sm-4 col-md-5 mx-auto my-4  ">
            <card class="shadow-lg card card-body mx-auto">
               <form method="GET">
               <h6 class="card-header shadow my-2">Formulario de busqueda</h6>
                  Operario
                  <div class="form-group">
                     <select class="form-control" name="selectId">
<?php
foreach ( $nombreUsuarios as $em ) {
   $sel = (isset( $_GET[ 'selectId' ]) && $_GET['selectId']==$em[0] ) ? ' selected' : '';
   echo '<option'. $sel . ' value="'. $em[0] .'">'. $em[1] .'</option>';
}
?>
                     </select>
                  </div>
                  Fecha inicial
                  <div class="form-group"><input class="form-control" name="fIni" value="<?= $fIni ?? date('Y/m/d')  ?>" type="date">
                  </div>>



               <table class="table table-bordered table-striped bg-white table-sm col-lg-12 mx-auto shadow-lg">
                  <thead class="azul-oscuro text-white text-center">
                     <tr>
                        <th>O. P.</th>
                        <th>Tipo de Trabajo</th>
                        <th>Referecia</th>
                        <th>H. Inicia</th>
                        <th>H. Termina</th>
       <th class="col-lg-3">Total Tiempo</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ( $arrTotal as $i => $d ) {
                        ?>
                     <tr>
   <td class ="text-center"><?=  $d[0] ?></td>
                        <td><?=  $d[1] ?></td>
                        <td><?=  $d[2] ?></td>
    <td class="text-center"><?=  $d[3] ?></td>
    <td class="text-center"><?=  $d[4] ?></td>
     <td class="text-center"><?= $d[5] ?><td>
                     </tr>
                     <?php
                     }

                     ?>
<tr>
<?php if($tiemSinLabor >0){   ?>   
<td colspan="5" class="verde-manzana"><h6 class="verde-manzana text-center">TIEMPO IMPRODUCTIVO</h6 ></td>
<td class="verde-manzana" > <h6  class="verde-manzana text-center " ><?= human_time($tiemSinLabor);?></h6></h6></td>
<?php } ?>
</tr>
<tr>
<?php if($tiemProductivo >0){   ?>   
<td colspan="5" class="verde-manzana"><h6 class="verde-manzana text-center">TIEMPO PRODUCTIVO</h6 ></td>
<td class="verde-manzana" > <h6  class="verde-manzana text-center " ><?= human_time($tiemProductivo );?></h6></h6></td>
<?php } ?>
</tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>



   <script>
      google.charts.load( 'current', {
         'packages': [ 'timeline' ]
      } );
      google.charts.setOnLoadCallback( drawChart );

      function drawChart() {
         var container = document.getElementById( 'chrt' );
         var chart = new google.visualization.Timeline( container );
         var data = new google.visualization.DataTable();
         data.addColumn( { type: 'string',id: 'Tipo' } );
         data.addColumn( {type: 'date',id: 'Start'} );
         data.addColumn( {type: 'date',id: 'End'} );

         data.addRows( [
<?php
if (count($arrTotal) != 0){
   foreach($arrTotal as $i => $d){
      $activ = ( $arrTotal[$i][2] != '' )? $arrTotal[$i][2] :  $arrTotal[$i][1]; //Organiza los datos para la grafica
      echo '["'.$activ.'", new Date('.convierteFecha($d[3]).'), new Date(' .   convierteFecha($d[4]) . ')],' . PHP_EOL;
   }
}
?>
         ] );
         var options = { height: <?= $totItem ?>,gantt: {trackHeight: <?= $totItem?>}};
         chart.draw( data );
      }
   </script>

   <?php 
}else{ echo "<script>alert('No hay actividad en fecha solicitada');</script>"; }

}
?>
</body>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/JsScripts/google/loader.js"></script>
</html>