<?php

echo "controller<br>";
ini_set('display_erros', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once('../Mod_informe/factModelo.php');
$_SESSION['s_sysIneditto'] = $_SESSION['s_vEmp'] = 'javier';

$objMod  = new c_reportes;


//class c_infoProduccion extends c_ModR{
class c_infoProduccion{

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
  

public function __construct()
{
    $objMod  = new c_reportes;
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





    public function TraeTodosLosDatosC($id, $fIni, $fFin)
    {
         $cons = $this->objMod->TraeTodosLosDatos( $id, $fIni . ' 00:00:00', $fFin . ' 23:59:59' );;
        foreach( $cons as $i => $d){
            $this->datosT = [ $d[0] , $d[1] , $d[2] , $d[3] , $d[4] , $d[5] , $d[6] , $d[7] , $d[8] , $d[9] ];
        }
        return $this->datosT;
    }



}






$objP = new c_infoProduccion ;
//$nombreUsuarios = $objP->nombreUsuarios;

//$nombreUsuarios  = $objP->odbc->traeEmpleado();
//$datosT          = $objP->datosT;

echo 'fin de clase del modelo';


$datosT=  $objMod->TraeTodosLosDatos( 203, '2020-07-07 00:00:00' , '2020-07-07 23:59:59'  );
//$datosT = ( $id, $fIni . ' 00:00:00', $fFin . ' 23:59:59' );


print_r( $datosT ); 






