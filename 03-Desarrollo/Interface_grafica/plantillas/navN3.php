<?php



include_once '../../session/sessiones.php';




?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand ml-4" href="#">
    <img src="../../fonts/logoportal.png" width="250" height="65" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mx-auto">
      <li class="nav-item active">
        <a class="nav-link lead px-4 " href="../../index.php">INICIO<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle lead px-4 " href="../../Vision-home.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          FERRETERIA
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">QUIENES SOMOS</a>
          <a class="dropdown-item" href="#">MISION</a>
          <a class="dropdown-item" href="#">VISION</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link lead px-4 " href="../../CU008-catalogodeproductos.php">CATALOGO DE PRODUCTOS<span class="sr-only">(current)</span></a>
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
          <?php   if(isset($_SESSION['usuario'])){ echo  $_SESSION['usuario']['nom1']; }    ?><span class="sr-only">(current)</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">


          <a class="dropdown-item" href="#pendiente"><em><strong><?php if(isset($_SESSION['usuario'])){ echo $_SESSION['usuario']['nom_rol']; } ?></strong></em></a> 
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#pendiente">Mis datos</a>
            <a class="dropdown-item" href="">Compras</a>
            <a class="dropdown-item" href="../../session/cerrar.php">Salir</a>
          </div>
        </li>
        
    </ul>
  </div><br><br>
</nav>
        

