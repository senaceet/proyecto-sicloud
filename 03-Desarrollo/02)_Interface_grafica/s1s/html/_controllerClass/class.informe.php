<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/funciones.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/_modeloClass/factModelo.php' );

class c_Informe{
    public $consulta;
    public $objMod;
    public $arrSum;
    public $totalTiempoM;
    public $concatenaMaquinas;
    public $totalTiros;
    public $campo;
    public $arrCrus;


    public function __construct()
    {
      $this->objMod = new c_reportes;
      $this->consulta;
      $this->arrSum = [];
      $this->totalTiempoM;
      $this->concatenaMaquinas;
      $this->totalTiros;
      $this->campo;
      $this->arrCrus  = [1=>15, 2=>18, 3=>17, 4=>4, 10=>3, 11=>22];
     

    }
//=========================================
    // Metodos que utiliza fact.php
    // VerificaArray
    // CalcularTiempoActividad
    // SumaTiempoConFiltro
//=========================================

   //Fact.php y informes 2
   public function verificaArray($a){
     // echo '<pre>';  print_r($a); echo '<pre>';
       foreach($a as $i => $d){
           if( $a[$i][1] == '' || $a[$i][2] =='' || $a[$i][3] < 0 ){
              unset( $a[$i] );
             }      
        }        
   return $a;
   }
   //Fact.php 
   public function calcularTiempoActividad($a){
      foreach( $a as $i => $d ){
        $tiempoActividad =  strtotime($d[2]) - strtotime($d[1]); 
        $array[$i] = [ $d[0], $d[1], $d[2], $tiempoActividad, $d[4], $d[5],  $d[6] ];
     }
     return $array;
   }
    //Fact.php 
    public function sumaTiempoConFiltro($a,  $filtro){
        $accum = 0;
        foreach($a as $i => $d){
            if  ($a[$i][4] == $filtro){
               $accum += $a[$i][3];  
            }
         }
    return $accum; 
    }

   // Informes 2
   public function sumaPorMaquina($a){
   $accum = $fin = 0; $accumTot =0;
      foreach($a as $i => $d ){
         // Acomulado total
         $accumTot += $a[$i][3];
         if(isset($a[$i+1][4]) && $a[$i][4] == $a[$i+1][4]){ //Verifica el cambio de maquina
            $accum     += $a[$i][3];
            // Descomentar si se quiere hacer suma de fechas en modo prueba "visualiza tiempos de maquina paso a paso"
           // $arrMaq[] = [$a[$i][0], $a[$i][4], $a[$i][5], $a[$i][1], $a[$i][2], $a[$i][3]] ; 
            $fin        = $a[$i+1][3];
         }else{ 
            // captura en array suma por maquina
            $arrMaq[] = [$a[$i][0], $a[$i][4], $a[$i][5], $a[$i][1], $a[$i][2], $a[$i][3], 
            ($accum>0? ($accum+$fin) : $a[$i][3]) ]; 
            $accum      = 0; 
         }
      }
      // Guarda total de tiempo maquinas
      $this->totalTiempoM = $accumTot;
      $a = $arrMaq; 
      // Formateo a un espacios
      foreach( $a as $i => $d ){
        if( $a[$i][6] != '' || $a[$i][6] != 0  ){
           $arrMaqT[]=[ $a[$i][0], $a[$i][1], $a[$i][2], $a[$i][3], $a[$i][4], $a[$i][5], $a[$i][6] ];   
        }
      }
   unset($arrMaq);
   return $arrMaqT;
    } 

    public function sumaF2($a){
       $accum = 0; $accumUnit = 0; $id =0;
       foreach( $a as $i => $d ){
          $accum  += $a[$i][6]; 
          // Suma por maquina los tiros      
         // if(isset($a[$i+1][4]) &&  ($a[$i][4] == $a[$i+1][4]) ){ 
          if(isset($a[$i+1][4]) &&  ($a[$i][4] == $a[$i+1][4]) ){ 
              $id= $d[4]; $accumUnit += $a[$i][6];  $accumIfin = $a[$i+1][6];
          }else{
             // Guarda array de suma por maquina tiros
             $this->arrSum[] = [ $id, $accumUnit ];    
             $accumUnit =0;

          //   echo '<pre>'; print_r($this->arrSum);  echo '</pre>';
          //   echo '<pre>'; print_r($a);  echo '</pre>';
          }
        }
    // Retorna el valor total de tiros todas las maquinas
    return $accum;
    }

   // Informes 2
    public function concatenaMaquinas($a){
       foreach( $a as $i => $d ){
          $arrayTemp [] = $d[2] ;
       }
       $arrayTemp  = array_unique($arrayTemp);
       $string     = implode(' , ', $arrayTemp);
       unset($arrayTemp);
    return $string.' .';
    }

 //====================================================
   public function traeDatosTabla($a , $campo  ){
      $this->campo;
      $this->consulta = $a;
      $actividad = false;      
 //====================================================
       // Captura las fechas de inicio y final
      foreach ( $a as $k => $d ){   
         $tFin = '';  
         if ( $d[2] == 'I' || $d[2] == 'R' ){
            $tIni        = $d[1]; 
            $idMaquina   = $d[4]; 
            $op          = $d[0];
         }  
         if (($d[2]=='F' && $d[4]==$idMaquina ) && ( $op==$d[0] ) || $d[2]=='P' ){ 
            $tFin        = $d[1]; 
            $actividad   = true; 
         }
         if ( $tFin != '')
         $arrTiem[] = [$d[0], $tIni, $tFin, '', $d[4], $d[5] ];   
      }  

    
       $arrTiem = $this->verificaArray($arrTiem);
   
      //=================================================
      // Halla la diferencia de actividad
      foreach( $arrTiem as $i => $d ){
         $tiempoActividad =  strtotime($d[2]) - strtotime($d[1]);
         $array[$i]=[ $d[0], $d[1], $d[2], $tiempoActividad, $d[4], $d[5], $d[6] ];
      }
      $array = $this->verificaArray($array);
      $this->capturaFechas = $array;

      //=================================================
      // Suma por maquina
      $a =  $this->sumaPorMaquina($array);
      //=================================================
      // Concatena las maquinas en un string y lo envia a la clase para getter en la vista
      $this->concatenaMaquinas = $this->concatenaMaquinas($a);
      // Suma valores de F2 y obtiene el valor de tiros unitario que se almacena en la funcion en la clase
      $this->totalTiros = $this->sumaF2($this->consulta);
      //=================================================

      // Crea tabla maquinas
      $b = $this->arrSum;
      foreach ($a as $i => $d){
         $art[] = [ $d[0], $d[1], $d[2] ,$d[3], $d[4], $b[$i][1], $d[6] ];
      }
     $this->codigoMaquinaTipoPedido();
      return $art;
    }





// 
   public function codigoMaquinaTipoPedido(){
    $a = $this->consulta;
    foreach( $a as $i => $d ){
        $arr[] = [ $d[0], $d[1], $d[2], $d[3],
        $d[4], $d[5], $d[6],  
        $this->obtieneFase($this->arrCrus[$d[7]]) ];
    }
 echo '<pre>'; print_r($arr); echo '</pre>'; 
//die('FIN');

//    $this->db->ver($arr);
    return $arr;

}



// capta la fase de Unidad productiva, apartir del codigo de pedido
   public function obtieneFase($tipoMaquina){  $id = $this->arrCrus[$tipoMaquina];
     $id =  explode( ',' , $id );
     $a = $this->objMod->consFases($id); 

     echo '<pre>'; print_r($a ); echo '</pre>';
     foreach($a as $i => $d){
        if( $d  == 'Unid. Productivas'){
                $c = $i;
               break;
            }
        }
    return $c;
    }




    // GETTER
   public function geTtotalTiempoM(){ // 1
      return $this->totalTiempoM;
   } 
   public function geTconcatenaMaquinas(){ // 1
      return $this->concatenaMaquinas;
   } 
   public function geTtotalTiros(){ // 1
      return $this->totalTiros;
   }
}

?>