<?php


function human_time($input_seconds, $rs = 1, $normal = 0, $mostrarD = 0)
{ //$rs = muestra segundos // normal=1 deja h m s  como abreviaturas // mostrarD=1 muestra d?as
   $days = floor($input_seconds / 86400);
   $remainder = floor($input_seconds % 86400);
   $hours = floor($remainder / 3600);
   $remainder = floor($remainder % 3600);
   $minutes = floor($remainder / 60);
   $seconds = floor($remainder % 60);


   if ($mostrarD > 0) {
      $hours += $days * 24;
      $days = '';
   } else {
      $days = ($days > 0) ? $days . ($normal == 0 ? ' dias' : 'd') : '';
   }
   $hours = ($hours > 0) ? $hours . ($normal == 0 ? ' horas' : 'h') : '';
   $minutes = ($minutes > 0) ? $minutes . ($normal == 0 ? ' min' : 'm') : '';
   $seconds = ($seconds > 0 && $rs == 1) ? $seconds . ($normal == 0 ? ' seg' : 's') : '';
   return "$days $hours $minutes $seconds";
}

function convierteFecha($fecha)
{
   $valor = str_replace(":", ",", $fecha);
   $valor1 = str_replace("-", ",", $valor);
   $fecha1 = str_replace(" ", ",", $valor1);
   return $fecha1;
}




function humanTimeNotDay($input_seconds, $rs = 1, $normal = 0, $mostrarD = 0)
{ //$rs = muestra segundos // normal=1 deja h m s  como abreviaturas // mostrarD=1 muestra d?as

   $hours = floor($input_seconds / 3600);
   $remainder = floor($input_seconds  % 3600);
   $minutes = floor($remainder / 60);



 
   $hours = ($hours > 0) ? $hours . ($normal == 0 ? ' horas' : 'h') : '';
   $minutes = ($minutes > 0) ? $minutes . ($normal == 0 ? ' min' : 'm') : '';
  
   return "$hours $minutes";
}



//function verificaArray($array){
//    foreach( $array as $i => $d ){
//        if( $array[$i][1] == '' || $array[$i][2] ==''){
//           unset( $array[$i] );
//          }      
//     }        
//return $array;
//}
//
//
//function calcularTiempoActividad($array){
//    foreach( $array as $i => $d ){
//        $tiempoActividad =  strtotime($d[2]) - strtotime($d[1]);   
//        $array[$i]       =  [ $d[0], $d[1], $d[2], $tiempoActividad, $d[4] ];
//        if ( $tiempoActividad >  86400 )  unset( $array[$i] ); 
//    }
//return $array;
//}
//
//
//function sumaTiempoConFiltro( $array,  $filtro ){
//    $accum = 0;
//    foreach($array as $i => $d){
//        if  ($array[$i][4] == $filtro){
//           $accum = $accum + $array[$i][3];  
//        }
//     }
//    return $accum; 
//}












?>