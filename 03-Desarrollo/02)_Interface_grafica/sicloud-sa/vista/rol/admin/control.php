<?php
//  rol/admin/iniAdmin.php
include_once '../../../controlador/controladorsession.php';
$objSession =new Session();
$u = $objSession->desencriptaSesion();

//comprobacion de rol
$in = false;
switch ($u['usuario']['ID_rol_n']) {
    case 1:
        $in = true;
    break;
    case 0:
        $in = true;
    break;

    default:
        echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    break;
}
if ($in == false) {
    echo "<script>alert('No tiene permiso para ingresar a este modulo');</script>";
    echo "<script>window.location.replace('index.php');</script>";
} else {
  //--------------------------------------------------------------------------

  include_once '../../plantillas/plantilla.php';
  include_once '../../plantillas/cuerpo/inihtmlN3.php';
  include_once '../../plantillas/nav/navN3.php';

  cardtitulo("Controlador de sistema");
?>

  <?php
  if (isset($_SESSION['message'])) {
  ?>
    <!-- alerta boostrap -->
    <div class=" col-md-4 text-center mx-auto alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
      <?php echo  $_SESSION['message']  ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>


  <?php $_SESSION['message'] == false;
  } ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 bg-secondary shadow p-3 mb-5 rounded h-100 py-2 mx-auto">

        <!-- Usuario Card -->
        <div class="card card-body border">
          <div class="my-3 shadow p-3 mb-5 bg-white rounded">

            <h4 class="text-center">
              <svg class="bi bi-gear-fill" width="1em" height="1em" viewBox="0 0 16 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z" />
              </svg> Configuracion global</h4>
          </div>
          <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class=" text-center py-2 my-3">
              <h5>Edicion de registro</h5>
            </div>
            <ul class="list-group list-group-flush">

              <li class="list-group-item">
                <svg class="bi bi-arrow-right-square-fill mr-1" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm5.646 10.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z" />
                </svg>
                <a class="text-dark" href="../../formCategoria.php">Edicion de categorias</a>
              </li>
              <li class="list-group-item">
                <svg class="bi bi-arrow-right-square-fill mr-1" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm5.646 10.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z" />
                </svg>
                <a class="text-dark" href="../../formEmpresa.php">Edicion de empresas</a>
              </li>
              <li class="list-group-item">
                <svg class="bi bi-arrow-right-square-fill mr-1" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm5.646 10.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z" />
                </svg>
                <a class="text-dark" href="../../formMedida.php">Edicion de medidad</a>
              </li>
              <li class="list-group-item">
                <svg class="bi bi-arrow-right-square-fill mr-1" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm5.646 10.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z" />
                </svg>
                <a class="text-dark" href="../../formRol.php">Edicion de roles</a>
              </li>
              <li class="list-group-item">
                <svg class="bi bi-arrow-right-square-fill mr-1" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm5.646 10.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z" />
                </svg>
                <a class="text-dark" href="../../formTelefono.php">Edicion de Telefonos Usuarios</a>
              </li>
              <li class="list-group-item">
                <svg class="bi bi-arrow-right-square-fill mr-1" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm5.646 10.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z" />
                </svg>
                <a class="text-dark" href="../../TablaUsuario.php">Edicion de Cuentas</a>
              </li>
            </ul>
          </div>

          <!-- Productos Card -->
          <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class=" text-center py-2 my-3">
              <h5>Seguiminto sistema</h5>
            </div>
            <ul class="list-group list-group-flush">

              <li class="list-group-item">
                <svg class="bi bi-arrow-right-square-fill mr-1" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm5.646 10.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z" />
                </svg>
                <a class="text-dark" href="../../formLogError.php">Registro de errores</a>
              </li>
              <li class="list-group-item">
                <svg class="bi bi-arrow-right-square-fill mr-1" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm5.646 10.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L9.793 7.5H5a.5.5 0 0 0 0 1h4.793l-2.147 2.146z" />
                </svg>
                <a class="text-dark" href="../../formControl.php">Registro de actividades</a>
              </li>


            </ul>
          </div>

          <a href="iniAdmin.php" class="mx-auto">
            <button type="button" class="btn btn-primary">
              <svg class="bi bi-house-door-fill mr-1" width="1.1em" height="1.1em" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z" />
                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
              </svg>Control general
            </button>
          </a>
        </div>

      </div>
    </div>
  </div>
<?php
//} // fin de validar permisos
include_once '../../plantillas/cuerpo/finhtml.php';
}
?>