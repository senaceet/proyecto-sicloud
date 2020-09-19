<?php
//====================================================================
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
require_once('_modeloClass/factModelo.php');
require_once('funciones.php');
require_once('_controllerClass/class.informe.php');
$objMod  = new c_reportes;
$objCon = new c_Informe;
//echo 'hola';


//==========================================================================
//CAPTURA DE DATOS

// CAPTURA DATOS
foreach($_REQUEST['selectId'] as $i){
   $tmp        = explode('|', $i);
   $idMaq[]    = $tmp[1];
   $tm[]       = $tmp[0];
}
$tm = array_unique($tm); 

//$id        = $_REQUEST['selectId'];
$fIni      = $_REQUEST['fIni'];
$fFin      = $_REQUEST['fFin'];
$campo     = implode(',', $tm);
echo '<h1>'.$campo.'</h1>';
$objMod->db->ver($_REQUEST);
$idMaq = implode(',', $idMaq );


// http://javier.kom/informe2.php?&selectId[]=4&selectId[]=25&fIni=2020-08-01&fFin=2020-08-05
// selectId[]=4 selectId[]=25  fIni=2020-08-01  fFin=2020-08-05

//-----------------------------------------------------------------------

$cod_predido = 18;

$objMod->db->ver($tm);
$arrMaqDb    = $objMod->consMaquinasT();
if ($fIni != '' &&  $fFin != ''){
   foreach($tm as $i){
      $objMod->db->ver($i); 
      $c = $objCon->obtieneFase($i);
      $arrPerDb              = $objMod->consFechaMaquina($idMaq, $fIni, $fFin, $c);
   }
   $arrFases              = $objMod->consFases($cod_predido);
   $tabla                 = $objCon->traeDatosTabla($arrPerDb, $campo);
}





//Relaci�n tipos de M�quina con TiposPedido
// primer caracter  viene de  dt_cot_tipoMaquina  - campo = id_tipoMaquina
// segundo caracter viene  de dt_tipospedido - campo = cod_pedido


// si la maquina es 1 es de tipo Digital BW y en tipopedidos es 15 
// la fase es f4 
// asi que esa maquina tiene un id por el mismo se asosia la categoria que 
// si es de tipo 15 en este caso le corresponde la f4


//$objMod->db->ver($arrFases);
//$objMod->db->ver($arrPerDb);
// crear consulta de cons fase 
// recorrela encontrando el campo y almacenarlo





//

$a = $arrPerDb ;
foreach( $a as $i => $d ){
    $in = $d[7]; 
    $arr[] = [ $d[0], $d[1], $d[2], $d[3], $d[4], $d[5], $d[6], $arrTM[$in]  ];

}

//$objMod->db->ver($arrPerDb );












// captura face






// array relacion con fase
///$a = $arrTM;
///foreach(  $a as $i => $d ){
///$arr[] = [           ]
///}




//$objMod->db->ver($tm);
//$tipoMaquina = $tm[0];

//$objMod->db->ver($arrTM );
//$objMod->db->ver( $arrPerDb  );

 //$c = $objCon->obtieneFase($tipoMaquina);


    //echo '<h2>'. $c . '</h2>';
    //switch ($d[$i]) {
    //    case '':
    //        # code...
    //        break;
    //    
    //    default:
    //        # code...
    //        break;
    //}


    // imp .Offset







//========================================================================
// HTML
?>
<!DOCTYPE html>
<html lang="es">
<script src="/JsScripts/jquery-1.9.1.js"></script>
<script src="/JsScripts/Chart_2_9_3/Chartmin.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="/js/fontawesome-all.js"></script>
<SCRIPT src="/archivosMenu/JSCookMenu.js" type=text/javascript> </SCRIPT> <SCRIPT src="/archivosMenu/theme.js" type=text/javascript> </SCRIPT> <head>
   <meta charset="iso-8859-1">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="pragma" content="no-cache">
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <title>Reporte maquinaria</title>
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
            <h4 class="">Reporte maquinaria</h4>
         </div>
      </div><br><br>
      <div class="row ">
         <div class="col-lg-3  col-sm-4 col-md-5 mx-auto my-4  ">
            <card class="shadow-lg card card-body mx-auto">
               <form method="GET">
               <h6 class="card-header shadow my-2">Formulario de busqueda</h6>
                  Maquina
                  <div class="form-group">
                     <select class="form-control" name="selectId[]" multiple size="7">
<?php
//$objMod->db->ver($arrMaqDb);
foreach ($arrMaqDb  as $i) {
    $sel = (isset($_GET['selectId']) && in_array($i[0], $_GET['selectId'])) ? ' selected' : '';
    echo '<option' . $sel . ' value="' . $i[2] .'|'.$i[0] . '">' . $i[1]  . '</option>';
//    echo $arrMaqDb[$i][0] ;
    
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
                  <input class="btn btn-success btn-block" type="submit" value="Buscar maquina">
               </form>
            </card>
         </div>

<?php
if (count($arrPerDb)) {
?>
         <div class="col-lg-8 mx-auto container-fluid ">
            <div class="row my-4">
               <table class="table table-bordered table-striped bg-white table-sm col-lg-12 mx-auto shadow-lg">
                  <thead class="azul-oscuro text-white text-center">
                     <tr>
                        <th>ID Item</th>
                        <th>Id maquina</th>
                        <th>Maquina</th>
                     <!-- <th>H. Inicia</th>   
                        <th>H. Termina</th>  --> 
                       
                        <th>Tiros</th>
                        <th>Tiempo total por maquina</th>
                     </tr>
                  </thead>
                  <tbody>
<?php
   foreach ($tabla as $i => $d) {
?>
                     <tr class="text-center">
                        <td><?= $d[0] ?></td>
                        <td><?= $d[1] ?></td>
                        <td class="text-left"><?= $d[2] ?></td>
            <!--     <td><    $d[3] ?></td>
                     <td><    $d[4] ?></td>  -->
                        <td><?= $d[5] ?></td>                        
                        <td class = 'col-lg-3'><?= humanTimeNotDay( $d[6] ) ?></td>   
                     </tr>
<?php } ?>
                     <tr>
<?php 
   if ( $objCon->getTotalTiempoM()  > 0) {   
?>   
       
       <td colspan="3" class="verde-manzana text-center" >
       <?= $objCon->geTconcatenaMaquinas(); ?></td>
        <!-- <td class="verde-manzana" colspan="2" >&nbsp;</td>  -->   
       <td class="verde-manzana text-center" ><?= 'Total tiros '
       . $objCon->geTtotalTiros();  ?></td>
       <td class="verde-manzana" ><h6  class="verde-manzana text-center " ><?= 'Total:  '
       . humanTimeNotDay($objCon->getTotalTiempoM() ); ?></td>
<?php 
   }
?>
                     </tr>

<?php } else {
    echo '<script>alert("No hay actividad en el rango de fechas")</script>';
}
?>
                  </tbody>
               </table>
            </div>
         </div>