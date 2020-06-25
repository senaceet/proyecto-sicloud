<?php
include_once '../clases/class.producto.php';
include_once '../plantillas/plantillaN2.php';
include_once '../plantillas/cuerpo/inihtmlN2.php';
include_once '../plantillas/nav/navN2.php';
include_once '../session/sessiones.php';



cardtitulo('Edicion producto')
?>


<li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>



          <li class="nav-item">
      
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>

          <i class="fas fa-fw fa-chart-area"></i>

          <i class="fas fa-fw fa-table"></i>
          <i class="fas fa-search fa-sm"></i>
          <i class="fas fa-bell fa-fw"></i>
          <i class="fas fa-file-alt text-white"></i>
          <i class="fas fa-envelope fa-fw"></i>
    <!-- Nav Item - Messages -->



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Mis datos
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Compras
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

  

                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">

    


        <table class="table table text-center table-striped  table-bordered bg-white table-sm col-md-8 col-sm-4 col-xs-12 mx-auto">
            <thead>
                <tr>
                    <th>ID producto</th>
                    <th>Nombre producto</th>
                    <th>Valor producto</th>
                    <th>Stock producto</th>
                    <th>Estado</th>
                    <th>Categoria</th>
                    <th>Tipo medida</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <?php

            $datos = Producto::verProductos();
            while ($row = $datos->fetch_array()) {

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['ID_prod']  ?></td>
                        <td><?php echo $row['nom_prod'] ?></td>
                        <td><?php echo $row['val_prod'] ?></td>
                        <td><?php echo $row['stok_prod'] ?></td>
                        <td><?php echo $row['estado_prod'] ?></td>
                        <td><?php echo $row['nom_categoria'] ?></td>
                        <td><?php echo $row['nom_medida'] ?></td>
                        <td>
                            <a class="btn-circle btn btn-dark mx-auto  " href="editarProducto.php?id=<?php echo $row['ID_prod'] ?>"><i class="fas fa-marker"></i></a>
                            <a class="btn-circle btn btn-danger mx-auto  " href="../metodos/get.php?accion=EliminarProducto&&id=<?php echo $row['ID_prod'] ?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>



            <?php  } // fin de while 
            ?>
        </table>


        <?php
        include_once '../plantillas/cuerpo/finhtml.php';
        ?>