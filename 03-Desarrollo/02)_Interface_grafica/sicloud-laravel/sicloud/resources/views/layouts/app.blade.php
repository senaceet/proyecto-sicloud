
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Fruteria</title>

</head>
<body style="
background: #005AA7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFDE4, #005AA7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFDE4, #005AA7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

">





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
                <a class="nav-link lead px-4 my-3 " href=" {{ route('welcome')}}">INICIO<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle lead px-4 my-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    FERRETERIA
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('landing.somos')  }}">QUIENES SOMOS</a>
                    <a class="dropdown-item" href="{{ route('landing.mision') }}">MISION Y VISION</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link lead px-4 my-3" id="catalogo" ; href="catalogo.php?ops=1">CATALOGO<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link lead px-4 my-3" href="Promociones.php">PROMOCIONES<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link lead pl-4 my-3"    href="{{ route('landing.contacto') }} ">CONTACTO<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown active">


                <!-- icono de notificacion mensaje -->

                <a class="nav-link mx-3" href="#" id="messagesDropdown" role="button" aria-expanded="false">

                    <!-- Counter - Messages -->

                </a>



            <!-- icono de carrito -->
                <a href="mostrarCarrito.php">
                    <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3 " fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path style="color :#ffff;" fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg ></a>

                <!-- Icono de conteo productos carrito -->
                <span class="badge badge-danger badge-counter">
                 </span>
                <!-- ---------------------------------------------------------------------------------------- -->
                <!-- icono de notificacion campana -->
                <a class="" id="messagesDropdown" data-toggle="modal" data-target="#exampleModal" role="button" aria-expanded="true">
                    <i class="fas fa-bell fa-fw" style="color :#ffff;"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter"></span>
                </a>
                <span class="sr-only">(current)</span>
                </a>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                    <!-- ---------------------------------------------------------------------------------------- -->


                    <strong>




                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">

                        <div class="dropdown-divider"></div>
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        <em><strong></strong></em>
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




        </ul>
    </div>
</nav>





@yield('content')
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>
