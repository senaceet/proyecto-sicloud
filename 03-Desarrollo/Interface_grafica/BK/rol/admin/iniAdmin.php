
<?php 
//  rol/admin/iniAdmin.php
include_once '../../plantillas/navN3.php';
include_once '../../plantillas/plantilla.php';
include_once '../../plantillas/inihtml.php';
include_once '../../clases/class.empresa.php';
include_once '../../clases/class.conexion.php';
//include_once '../../session/sessionIni.php';
//include_once 'metodos/sessiones.php';
session_start();

if(isset($_SESSION['usuario'])){
    print_r($_SESSION['usuario']);


}


cardtitulo("Modulo de administracion");


echo "modulo administracion";
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

 <h5 class = "mx-auto text-center text-success "><?php  if(isset($_SESSION['usuario'])){ echo "Hola: ".$_SESSION['usuario']['nom1']; ?>

<img src="/jpg;base64," <?php  echo base64_encode($_SESSION['usuario']['foto']); ?> />
<?php
} ?></h5>



<?php $_SESSION['message'] == false; } ?>

<a class = "btn btn-primary"   href="metodos/get.php?cerrarSesion" >Salir de sesion</a>


<!-- On rows -->
<tr class="bg-primary">campo 1</tr>
<tr class="bg-success">...</tr>
<tr class="bg-warning">...</tr>
<tr class="bg-danger">...</tr>
<tr class="bg-info">...</tr>

<!-- On cells (`td` or `th`) -->
<tr>
  <td class="bg-primary">...</td>
  <td class="bg-success">...</td>
  <td class="bg-warning">...</td>
  <td class="bg-danger">...</td>
  <td class="bg-info">...</td>
</tr>


<div class="col-md-auto p-2 ">
            <table class=" table table-bordered  table-striped bg-white table-sm mx-auto   text-center">
                <thead>

                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Accion</th>
                        <?php


                        //$medida = Medida::ningunDatoM();
                        $datos  = Empresa::verEmpresa();
                        if (isset($datos)) {
                            while ($row = $datos->fetch_array()) {
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los nombres que estan son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                    <td class="bg-success"     ><?php echo $row['ID_rut'] ?></td>
                    <td><?php echo $row['nom_empresa'] ?></td>


                    <!-- formEdicion.php?accion=editarMedia&&id=<?php// echo $row['ID_medida'] ?> -->
                    <td>
                        <a href="   ../forms/formEdicionEmpresa.php?id=<?php echo $row['ID_rut'] ?> " class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                        <a href="../metodos/get.php?accion=eliminarEmpresa&&id=<?php echo $row['ID_rut'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>

                        <!--  get.php?accion=editarMedia?id= -->
                        <!-- edit.php?id=<?//php  echo  $row['id_sitio']  ?> -->
                    </td>
                </tbody>
        <?php

                            } //fin del while



                        }
        ?>
            </table>









<?php

include_once '../../plantillas/finhtml.php';
?>