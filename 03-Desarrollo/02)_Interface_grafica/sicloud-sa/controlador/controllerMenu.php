<?php
include_once 'controlador.php';


$arrMenu['A'][1]          = ['INICIO','rol/admin/iniAdmin.php'];
$arrMenu['A'][2]          = ['FERRETERIA', ];
$arrMenu['A'][2][1]       = ['QUIENES SOMOS', 'vista/CU000-quienessomos.php'];
$arrMenu['A'][2][2]       = ['MISION Y VISION', '/vista/CU000-misionyvision.php'];
$arrMenu['A'][3]          = ['CATALOGO', 'vista/CU000-quienessomos.php'];
$arrMenu['A'][4]          = ['PROMOCIONES', 'Promociones.php'];
$arrMenu['A'][5]          = ['CONTACTO', 'CU000-contact.php'];
//$arrMenu['A'][2]

class ControllerMenu{
public $aMenu , $aP, $aUserDB;
private $db;

public function __construct(){
    $this->aUserDB = [
        'edgar',
        '2',
        '79445674',
        '01,02,0201,0202,03,04,05',
        '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0',
        'A',
        '',
        '1'
       ];

    $this->aP= [];
    $this->aMenu['A'][1]      = ['INICIO','../controlador/api.php?apicall=inicionRol'];
    $this->aMenu['A'][2]      = ['FERRETERIA', ];
    $this->aMenu['A'][2][1]   = ['QUIENES SOMOS', 'vista/CU000-quienessomos.php'];
    $this->aMenu['A'][2][2]   = ['MISION Y VISION', '/vista/CU000-misionyvision.php'];
    $this->aMenu['A'][3]      = ['CATALOGO', 'vista/CU000-quienessomos.php'];
    $this->aMenu['A'][4]      = ['PROMOCIONES', 'Promociones.php'];
    $this->aMenu['A'][5]      = ['CONTACTO', 'CU000-contact.php'];
    $this->db                 = SQL::ningunDato();
}

public function generaMenu(){
    $aMenu   = $this->aMenu;
    $sPdb    = $this->aUserDB[3];
    $m       = $this->aUserDB[5];

    $aPdb = explode( ',' ,$sPdb);
    $aP = [];
foreach($aPdb as $d ){

    $c = strlen($d);
    //echo '<br>'.$c.'->'.$d.'<br>';
    switch ($c) {
        case 2:
            $v1 = abs($d);
             $aP[$v1] = [$this->aMenu[$m][$v1][0] , $this->aMenu[$m][$v1][1] ];
  
            break;
        case 4:
            echo '<br>'.$d;
            $sP =  str_split($d, 2);
            $v1 =  abs($sP[0]); 
            $v2 =  abs($sP[1]);
            $aP[$v1][$v2]  =  [ $this->aMenu[$m][$v1][$v2][0] , $this->aMenu[$m][$v1][$v2][1] ];
            break;
        case 6:
            $sP =  str_split($d, 2);
            $v1 =  abs($sP[0]); 
            $v2 =  abs($sP[1]);
            $v2 =  abs($sP[2]);
            $aP[$v1][$v2][$v3]  =  [ $this->aMenu[$m][$v1][$v2][$v3][0] , $this->aMenu[$m][$v1][$v2][$v3][1] ];
            break;
    }
  
}

return $aP;
}


}

$obj = new ControllerMenu();
 $aP = $obj->generaMenu();
 ControllerDoc::ver($aP);
?>


<?php
echo '<nav class="navbar-fixed-top navbar navbar-expand-lg navbar-dark bg-dark navbar navbar-expand-lg  sticky-top">
<a class="navbar-brand ml-4" href="#">
  <img src="fonts/logoportal.png" width="250" height="65" alt="">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto mx-auto">';

  foreach($aP as $d){

    if( !is_array($d[0])){ 
        //ControllerDoc::ver($d[0]);
       $url = ( !is_array($d[1]))? $d[1] : '';
        echo '<li class="nav-item active">';
        echo ' <a class="nav-link lead px-4 my-3 " href="'.$url.'">'.$d[0].'<span class="sr-only">(current)</span></a>';
        echo '</li>';






  }

?>



<nav class="navbar-fixed-top navbar navbar-expand-lg navbar-dark bg-dark navbar navbar-expand-lg  sticky-top">
  <a class="navbar-brand ml-4" href="#">
    <img src="fonts/logoportal.png" width="250" height="65" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mx-auto">
      <li class="nav-item active">
        <a class="nav-link lead px-4 my-3 " href="../controlador/api.php?apicall=inicionRol">INICIO<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle lead px-4 my-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          FERRETERIA
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="CU000-quienessomos.php">QUIENES SOMOS</a>
          <a class="dropdown-item" href="CU000-misionyvision.php">MISION Y VISION</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link lead px-4 my-3" id="catalogo" ; href="catalogo.php?ops=1">CATALOGO<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link lead px-4 my-3" href="Promociones.php">PROMOCIONES<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link lead pl-4 my-3" href="CU000-contact.php">CONTACTO<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown active">




        <!-- icono de notificacion mensaje -->

        <a class="nav-link mx-3" href="#" id="messagesDropdown" role="button" aria-expanded="false">

          <!-- Counter - Messages -->

        </a>

        <?php
       

        ?>

                <!-- icono de carrito -->
        <a href="mostrarCarrito.php"> 
        <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3 " fill="white" xmlns="http://www.w3.org/2000/svg">
              <path style="color :#ffff;" fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
            </svg ></a>

            <!-- Icono de conteo productos carrito -->
        <span class="badge badge-danger badge-counter">0</span>
<!-- ---------------------------------------------------------------------------------------- -->
        <!-- icono de notificacion campana -->
        <a class="" id="messagesDropdown" data-toggle="modal" data-target="#exampleModal" role="button" aria-expanded="true">
          <i class="fas fa-bell fa-fw" style="color :#ffff;"></i>
          <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter">9</span></span>
       </a>
        <span class="sr-only">(current)</span>
        </a>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
<!-- ---------------------------------------------------------------------------------------- -->




          <strong>Javier</strong>
          <img class="img-profile ml-3 rounded-circle" src="fonts/us/jav.png" height="65" width="70">
               

        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">
            Hola Javier Reyes<br>                        <div class="dropdown-divider"></div>
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            <em><strong>Administrador</strong></em>
          </a>
          <a class="dropdown-item" href="misdatos.php">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Mis datos
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Compras
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item"   data-target="#logoutModal">
          <a class="dropdown-item" href="../controlador/controladorsession.php?cerrar=1" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Salir

          </a>
        </div>
      </li>