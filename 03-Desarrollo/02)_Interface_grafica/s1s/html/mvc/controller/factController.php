<?php

echo "controller<br>";
ini_set('display_erros', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
//require_once('..//factModelo.php');
require_once '../model/factModelo.php';
$_SESSION['s_sysIneditto'] = $_SESSION['s_vEmp'] = 'javier';

//$objMod  = new c_ModR;


//class c_infoProduccion extends c_ModR{
class c_infoProduccion extends c_ModR {

   // public $odbc    ;
   // public $arrTiem ;  
   // public $jornada ; 
   // public $otros   ; 
   // public $hExtra  ;  
   // public $nombreUsuarios;
   // public $id      ;
   // public $fFin    ;
   // public $fIni    ;
   // public $arrTotal;
   public $odbc;
   public $operarios;
   public $datosT;
   public $datosTA;
   public $arrTiem;
   public $totReg;
   
  

public function __construct()
{
    parent::__construct();
    $this->odbc      = new c_ModR;
    $this->operarios = $this->odbc->traeEmpleado();
    $this->datosT    = $this->odbc->TraeTodosLosDatos(203, '2020-07-07 00:00:00' , '2020-07-07 23:59:59' );
    $this->datosTA;  
    $this->datosTiem;

}
 //   public function __construct(){
//
 //    $this->objController;
 //     $this->odbc = new c_ModR  ;
 //     $this->fIni = '2020-07-07 00:00:00';
 //     $this->id   = 203;
 //     $this->fFin = '2020-07-07 23:59:59';
 //     $this->arrTiem = [] ;
 //     $this->jornada = [] ;
 //     $this->otros   = [] ;
 //     $this->hExtra  = [] ;
 //     $this->datosT[] = $this->objController->TraeTodosLosDatosC(203, '2020-07-07 00:00:00', '2020-07-07 23:59:59') ;
 //     $this->nombreUsuarios[] = $this->odbc->traeEmpleado();
 //     echo 'Soy el constructor de controller';
 //   }





    public function TraeOperarioC()
    {
         $cons = $this->odbc->traeEmpleado();
        foreach( $cons as $i => $d){
            $this->operarios[$i] = [ $d[0] ,$d[1] ];
        }
    return $this->operarios;
        // return $cons;
    }
        
    //}
    public function TraeTodosLosDatosC(){
        $cons = $this->odbc->TraeTodosLosDatos(203, '2020-07-07 00:00:00' , '2020-07-07 23:59:59');

        foreach( $cons as $i => $d){
         $this->datosTA[$i]  = [ $d[0] ,$d[1] ,$d[2] ,$d[3] ,$d[4] ,$d[5] ,$d[6] ,$d[7] ,$d[8] ,$d[9] ];
         }
         return $this->datosTA;
    }

//================================================================

public function verificaDatos(     ){


    if(  count ($this->datosT) >2 ){
        $entrada = false; $salida = false;
        foreach($this->datosT as $i => $d){
           if( $this->datosT[$i][2] == 'e' ){
              $entrada  = true; 
              //echo '<script>alert("entrada cambio a true");</script>';  
           }
           if( $this->datosT[$i][2] == 's' ){
              $salida = true; 
           }
        }
     
     
        foreach( $this->datosT as $i => $d ){
            if( $this->datosT[$i][2] == 'e' ){    
                if( $entrada == true && $salida == false ){   
                    // Validacion de actividad
                    if( $this->datosT[$i+1][4]!=''    && $this->datosT[$i+1][3] == '' ){
                       // Crea arreglo de actividad "cierre para que se muestre en la grafica"
                       $datosT[$i+2] = 
                       [$this->datosT[$i][0], ( substr($this->datosT[$i][1], 0,10 ).' 23:59:59'), 'P', '', $this->datosT[$i+1][4] , $this->datosT[$i+1][5] , $this->datosT[$i+1][6], $this->datosT[$i+1][7] , $this->datosT[$i+1][8] , $this->datosT[$i+1][9] ];
                     }
                     // Crea arreglo de salida para que se muestre en la grafica
                    $this->datosT[] = [ $this->datosT[$i][0], ( substr($this->datosT[$i][1], 0,10 ).' 23:59:59' )  , 's' , 1 , $this->datosT[$i][4] ]; 
                 //   echo '<script>alert("Usuario no finalizo jornada en la fecha actual");</script>'; 
                }
            }
        }
        $entrada = false; $salida = false; 
     }
     
     
return $this->datosT;
}




//================================================================




    public function saluda(){
        echo "hola";
    }
    

    public function getOperarios(){
        return $this->operarios;
    }    

    public function getDatosT(){
        return $this->datosTA;
    }

}





//$objP = new c_infoProduccion ;
//$nombreUsuarios = $objP->nombreUsuarios;

//$nombreUsuarios  = $objP->odbc->traeEmpleado();
//$datosT          = $objP->datosT;

//echo 'fin de clase del modelo';

//=========================================
//$datosT=  $objMod->TraeTodosLosDatos( 203, '2020-07-07 00:00:00' , '2020-07-07 23:59:59'  );
//$objMod->db->ver($datosT); 
//=========================================

$op = new c_infoProduccion;

//=========================================
//$dat= $op->TraeTodosLosDatosC(203, '2020-07-07 00:00:00' , '2020-07-07 23:59:59'   );
$dat= $op->TraeOperarioC();

//$dat= $op->saluda( 203, '2020-07-07 00:00:00' , '2020-07-07 23:59:59'  );


// este es el bueno
//$op->db->ver($op->getOperarios());

$op->db->ver( $op->verificaDatos());


//  $op->db->ver($dat);

//=========================================


