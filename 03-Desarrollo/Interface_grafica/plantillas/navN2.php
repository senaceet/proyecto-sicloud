<?php
include_once '../session/sessiones.php';
//nclude_once '../session/sessionIni.php'



?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand ml-4" href="#">
    <img src="../fonts/logoportal.png" width="250" height="65" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mx-auto">
      <li class="nav-item active">
        <a class="nav-link lead px-4 " href="../index.php">INICIO<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle lead px-4 " href="../Vision-home.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          FERRETERIA
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">QUIENES SOMOS</a>
          <a class="dropdown-item" href="#">MISION</a>
          <a class="dropdown-item" href="#">VISION</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link lead px-4 " href="../CU008-catalogodeproductos.php">CATALOGO DE PRODUCTOS<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link lead px-4 " href="#">PROMOCIONES<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link lead pl-4 " href="#">CONTACTO<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle lead px-5" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <svg class="bi bi-person-circle ml-5" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: white;">
                  <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                </svg>

          <?php  if(isset($_SESSION['usuario'])){ echo  $_SESSION['usuario']['nom1']; }    ?><span class="sr-only">(current)</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

          
          <a class="dropdown-item" href="#pendiente"><em><strong><?php if(isset($_SESSION['usuario'])){ echo $_SESSION['usuario']['nom_rol']; } ?></strong></em></a> 
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#pendiente">Mis datos</a>
            <a class="dropdown-item" href="">Compras</a>
            <a class="dropdown-item" href="../session/cerrar.php">Salir</a>
          </div>
        </li>
        
    </ul>
  </div>
</nav>
        


