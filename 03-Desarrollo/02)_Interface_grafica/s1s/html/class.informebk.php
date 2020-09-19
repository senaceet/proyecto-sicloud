<?php

require_once('funciones.php');
require_once( 'factModelo.php' );

class c_Informe{
    public $arrTiem;
    public $arrTiemSegun;
    public $objMod;


    public function __construct()
    {
        $this->arrTiemSegun= [];
        $this->arrTiem = []; 
        $this->objMod = new c_reportes;
    }
    
    public function verificaArray($array){
        foreach( $array as $i => $d ){
            if( $array[$i][1] == '' || $array[$i][2] ==''){
               unset( $array[$i] );
              }      
         }        
    return $array;
    }
     
    public function sumaTiempoConFiltro( $array,  $filtro ){
        $accum = 0;
        foreach($array as $i => $d){
            if  ($array[$i][4] == $filtro){
               $accum = $accum + $array[$i][3];  
            }
         }
    return $accum; 
    }

   public function sumaPorMaquina($a){
      $accum = $fin = 0;
      foreach($a as $i => $d ){
         if(isset($a[$i+1][4]) && $a[$i][4] == $a[$i+1][4]){ //Verifica el cambio de m�quina
            $accum     += $a[$i][3];
            $arrMaq[$i] = [$a[$i][0], $a[$i][4], $a[$i][5], $a[$i][1], $a[$i][2], $a[$i][3]] ; 
            $fin        = $a[$i+1][3];
         }else{ 
            $arrMaq[$i] = [$a[$i][0], $a[$i][4], $a[$i][5], $a[$i][1], $a[$i][2], $a[$i][3], ($accum>0? $accum+$fin : $a[$i][3]) ]; 
            $accum      = 0; 
            $ulI        = $i;
         }

      }

      $a = $arrMaq; 
      // formateo a un espacios
      foreach( $a as $i => $d ){
         if( $a[$i][6] != '' || $a[$i][6] != 0  ){
              $arrMaqT[$i] = [ $a[$i][0] , $a[$i][1] , $a[$i][2],  $a[$i][3], $a[$i][4],  $a[$i][5],  $a[$i][6] ];   
         }
      }



      return $arrMaqT;
    } 

    public function sumaF2($array){
        $accum = 0;
        foreach( $array as $i => $d ){
            $accum = $accum + $array[$i][6];
        }
    return $accum;
    }

    public function sumaTiempo( $array ){
        $accum = 0;
        foreach($array as $i => $d){
               $accum = $accum + $array[$i][3];  
         }

       
    return $accum; 
    }

   public function capturaFechas2($datosT){
      $actividad = false; 
      foreach ( $datosT as $k => $d ){
         $tFin = '';  
         if ( $d[2] == 'I' || $d[2] == 'R' ){
            $tIni        = $d[1]; 
            $idMaquina   = $d[4]; 
            $actv        = $d[4];
         }  
         if (($d[2] == 'F' && $d[4] == $actv)  || $d[2] == 'P' ){ 
            $tFin        = $d[1]; 
            $actividad   = true;   
         }
         if ( $tFin != '')
         $arrTiem[] = [$d[0], $tIni, $tFin, '', $d[4], $d[5] ];   
      }  
      
      foreach( $arrTiem as $i => $d ){
         $tiempoActividad =  strtotime($d[2]) - strtotime($d[1]);
         
         if( $tiempoActividad < 0  ){  }   
         $array[$i] =  [ $d[0], $d[1], $d[2], $tiempoActividad, $d[4], $d[5],  $d[6] ];
      }
      return $array;
      //return   $this->calcularTiempoActividad($arrTiem);
      //return $arrTiem;
    }
   
    public function creaArrayTablaMaquinas($array){
        foreach( $array as $i =>  $d ){
            // cambia posicion de array consuta original
           $arrTabla[] = 
           [$d[0], $d[4],$d[5],$d[1],$d[2], human_time($d[3] ) ];
        }
    return $arrTabla;
    }

    
    public function concatenaMaquinas($array){
       foreach( $array as $i => $d ){
          $arrayTemp [] = $d[2] ;
       }
       $arrayTemp  = array_unique($arrayTemp);
       $string     = implode(' , ', $arrayTemp);
      // echo '<pre>'; print_r($arrayTemp );
       unset($arrayTemp);
    return $string.' .';
    }

    // GET
   public function geTarrTiem(){
   return $this->arrTiem;
   }

   public function geTarrTiemSegun(){
   return $this->arrTiemSegun;
   }

   public function seTarrTiem($arrTiem){
   return $this->arrTiem = $arrTiem;
   }

    }

?>