<?php
//============================================================

session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL & ~E_NOTICE);
require_once('_modeloClass/factModelo.php');
require_once('funciones.php');
require_once('_controllerClass/class.informe.php');
$objMod  = new c_reportes;
$objInfo = new c_Informe;

/// 3 5 25 24 27 43  67 76 80 85 88 89 90 94 96 97 
//=========================================================
// CAPTURA DATOS
$id   = $_REQUEST['selectId'];
$fIni = $_REQUEST['fIni'];
$fFin = $_REQUEST['fFin'];

if(isset($id))$datosT = $objMod->TraeTodosLosDatos( $id, $fIni . ' 00:00:00', $fFin . ' 23:59:59' );
      $nombreUsuarios = $objMod->traeEmpleado();

$totReg  = count( $datosT );

$salida = false;
$entrada = false;
//crea array porque no finaliza la jornada
foreach($datosT as $i => $d){

    if( $datosT[$i][2] == 'e' ){
        $entrada  = true; 
      //  echo '<script>alert("entrada cambio a true");</script>';  
    }
    if( $datosT[$i][2] == 's' ){
        $salida = true; 
    }
}


foreach( $datosT as $i => $d ){
    if( $datosT[$i][2] == 'e' ){    
        if( $entrada == true && $salida == false ){   
            // Validacion de actividad
            if( $datosT[$i+1][4]!=''    && $datosT[$i+1][3] == '' ){
               if( isset( $datosT[$i+2])   )
               // Crea arreglo de actividad "cierre para que se muestre en la grafica"
               $datosT[$i+2] = [$datosT[$i][0], ( substr($datosT[$i][1], 0,10 ).' 23:59:59' )  , 'P' , '' , $datosT[$i+1][4] , $datosT[$i+1][5] , $datosT[$i+1][6], $datosT[$i+1][7] , $datosT[$i+1][8] , $datosT[$i+1][9] ];
             }
             // Crea arreglo de salida para que se muestre en la grafica
            $datosT[] = [ $datosT[$i][0], ( substr($datosT[$i][1], 0,10 ).' 23:59:59' )  , 's' , 1 , $datosT[$i][4] ]; 
            echo '<script>alert("Usuario no finalizo jornada en la fecha actual");</script>'; 
        }
    }
}
$salida  = false;
$entrada = false;




//=======================================================
// Elimina registro de doble salida "error marcacion usuario"
foreach( $datosT as $i => $d ){
   if(  $datosT[$i][2] == 's' && $datosT[$i][3] ==1 ){
     if( isset( $datosT[$i+1][2]) &&  $datosT[$i][2] == $datosT[$i+1][2] ) {
        unset($datosT[$i+1]);      
     }
   }
}

// Elimina registro de doble entrada "error marcacion usuario"
foreach ( $datosT as $i => $d ) {
    if( $datosT[$i][2] == 'e' && $datosT[$i+1][2] == 'e' &&
        $datosT[$i][3] == '1' && $datosT[$i+1][3] == '1' ){
        unset( $datosT[$i+1] );
    }
 }

//=======================================================


//=======================================================
// Captura datos de array jornada y otros
foreach ( $datosT as $i => $d ) {
   if ( $d[2]== 'e' && $d[3] == 1 ) $ij = $d[1];
   if ( $d[2]== 's' && $d[3] == 1 )$jornada[$i] = [ $d[4], $ij, $d[1] ];
   if ( $d[2]== 'e' && $d[3] == 2 ) $i1 = $d[1];
   if ( $d[2]== 's' && $d[3] == 2 )  $otros[$i] = [ $d[4], $i1, $d[1], "", 1];
   if ( $d[2]== 's' && $d[3] == 7 ) $hExtra[$i] = [ $d[4], $ij, $d[1] ];
}
//=======================================================



// Usuario no marco entrada, se crea array para generar salida de manera correcta
if( count($jornada) >0 ){
    foreach ( $jornada as $i => $d ){
       if ( isset(  $datosT[$i+1][2]) && isset( $jornada[$i+1]) &&  isset($jornada[$i+3]) &&
          $datosT[$i][2] == 's' && 
          $datosT[$i+1][2] == 's' && 
          $datosT[$i][3]   == $datosT[$i+1][3] ) {
             $fecha           = substr( $jornada[$i+1][2], 0, 10 );
             $hora            = substr( $datosT[$i][1], -9 );
             $temp[]          = $jornada[$i];
             $temp2[]         = [$jornada[$i][0], $jornada[$i+1][2], $fecha . $hora];
             $jornada[$i]     = $temp[0];
             $jornada[$i+1]   = $temp2[0];
            
       }
    }

   //======================================================
   // crea array temporal y lo suscribe con fechas correctas
   foreach($jornada as $i => $d ){
       if( $jornada[$i][1] == ''  ){
           $temp[$i] = $jornada[$i];
           $temp2[$i] = $jornada[$i+2];
           $jornada[$i+2] = [ $temp[0][0],   $temp[0][2] , $temp2[0][2]   ];
           unset($jornada[$i]);
       }
   }
   //
   foreach($datosT as $i => $d){
       if ( isset($jornada[$i+2][2]) && substr($jornada[$i][2], 0,10 ) ==  substr($jornada[$i+2][2], 0,10 )){
           unset( $jornada[$i+2] );
       }
   }
    
}



//======================================================
// Se crea nuevo arreglo  con inicios y finales por labor prod. e improductivos
 $actividad = false;

foreach ( $datosT as $k => $d ){
   if ( $d[2] == 'I' || $d[2] == 'R' )$tIni = $d[1]; $actv = $d[4];
   if ( $d[2] == 'F' && $d[4] == $actv  || $d[2] == 'P' 
   //&& $d[4] == $op 
   ){
     // $tFin = $datosT[$i][1]; 
     
      $tFin = $d[1]; $actividad = true;
   } else {
      $tFin = '';
 
   }
 if ($actividad ==false &&  $datosT[$k+1][6]>1000 ||$d[6]>1000 ) 
    $tFin = $datosT[$k+1][1]; $p=($datosT[$k][4]=='')? 1 : 2; // marca el tiempo sin labor  y labor para posteriormete sumar los valores
    if ( $tFin != '')
   $arrTiem[$k] = [ $d[4] ?? strtoupper( $d[7] ), $tIni, $tFin, $datosT[$k][3] , $p]; 
   
}

$totTiem = count( $arrTiem );
$totItem = ( $totReg + $totTiem ) * 83;
//======================================================
// CATCH errores array arrTiemp
//======================================================
foreach( $arrTiem as $i => $d ){
   if( $arrTiem[$i][3] == 1 ) unset($arrTiem[$i] ); 
}
//========================================================


// CATCH errores de todos los arrays 
    $arrTiem  =  $objInfo->verificaArray( $arrTiem );
    $jornada  =  $objInfo->verificaArray( $jornada );
    $otros    =  $objInfo->verificaArray( $otros   );
    $hExtra   =  $objInfo->verificaArray( $hExtra  );
//========================================================


//Suma array y valida que sean mayor a 0
$arrTotal = [];
if( count($jornada) > 0 ) $arrTotal = $jornada;
if( count($hExtra ) > 0 ) $arrTotal = $arrTotal + $hExtra;
if( count($otros  ) > 0 ) $arrTotal = $arrTotal + $otros;
if( count($arrTiem) > 0 ) $arrTotal = $arrTotal + $arrTiem;
                   

// Operaciones del modulo
//=================================================================
$arrTotal       =  $objInfo->calcularTiempoActividad($arrTotal );// Retorna el tiempo de actividad en segun 
$tiemSinLabor   =  $objInfo->sumaTiempoConFiltro( $arrTotal, 1 );// Retorna tiempo improductivo en segundos
$tiemProductivo =  $objInfo->sumaTiempoConFiltro( $arrTotal, 2 );// Retorna tiempo productivo en segundos



// echo "<div class = 'row' >";
// echo "<div class = 'row' >";
// echo "<div class = 'col-lg-6' >";
// echo "datosT db";
// $objMod->db->ver($datosT);
// echo "</div>";
// 
// 
// echo "<div class = 'col-lg-6' >";
// echo "arrtiemp";
// $objMod->db->ver($arrTiem);
// echo "</div>";
// 
// 
// echo "<div class = 'col-lg-4' >";
// echo "array total";
// $objMod->db->ver($arrTotal);
// echo "</div>";
// echo "</div>";
// 





//=================================================================

// Formateo de datos
//====================================================================
//Se crea array de tabla con formato de hora humain_time
foreach ( $arrTotal as $i => $d ) {
    {
         $referencia =  ( $datosT[$i][3]==''? $datosT[$i][4] : ''             );
         $tTrabajo   =  ( $datosT[$i][9]!=''? $datosT[$i][9] : $datosT[$i][4] );
         $tTrabajo   =  ( $datosT[$i][7]!=''? $datosT[$i][7] : $tTrabajo      );
         $arrTotal[$i] = 
         [ 
         $datosT[$i][8], $tTrabajo, $referencia,
         $arrTotal[$i][1], $arrTotal[$i][2], human_time($arrTotal[$i][3])  
         ];
    }
 }
 //====================================================================


 


//=====================================================================
// HTML
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
               <h6 class="card-header shadow my-2">Formualrio de busqueda</h6>
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
            <div class="row my-4">



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

   <!-- Grafica ---------------------------------------------------------------->
   <div class="container my-4">
      <div class="row">
         <div class="col-md-12">
            <div class="caja-Prod shadow-lg"></div>
            <div class="box-body ">
               <div class="d-flex"></div>
               <div id="chrt" width="768" style="height: <?= $totItem?>px"></div>
            </div>
         </div>
      </div>
   </div>
   <!---------------------------------------------------------------------------->

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