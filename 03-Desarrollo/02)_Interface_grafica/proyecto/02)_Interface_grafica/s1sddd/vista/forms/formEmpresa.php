<?php
//include_once '../plantillas/plantilla.php';
//include_once '../clases/class.medida.php';
include_once '../clases/class.empresa.php';

include_once '../plantillas/cuerpo/inihtmlN2.php';
include_once '../plantillas/nav/navN2.php';
//include_once '../plantillas/'

//include_once '../metodos/get.php';
include_once '../session/sessiones.php';
//cardtitulo("Empresa");
?>

<script>
    function eliminarEm(id_em){
        var confirmacion = confirm('Esta seguro de eliminar empresa con id: ' + id_em +' ?' );
        if(confirmacion){
            window.location ="../metodos/get.php?accion=eliminarEmpresa&&id=" + id_em ;
        }
    }
</script>

<div class="container-fluid col-md col-xl-7">
    <div class="row">
        <!-- formulario de registro -->
        <div class="p-2 col-8 col-sm-6 col-md-4 col-lg-3 col-xl-4  mx-auto">
            <?php
            if (isset($_SESSION['message'])) {
            ?>

                <!-- alerta boostrap -->
                <div class="alert alert-<?php echo $_SESSION['color']   ?> alert-dismissible fade show" role="alert">
                    <?php
                    echo  $_SESSION['message']  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php // setMessage();
            } ?>
            <div class="card">
                <div class="card-header">Registro Empresa</div>
                <div class="card-body">
                    <form action="../metodos/post.php" method="POST">
                        <div class="form-group"><input class="form-control" type="text" name="ID_rut" placeholder="Rut" required autofocus maxlength="20"></div>
                        <div class="form-group"><input class="form-control" type="text" name="nom_empresa" placeholder="Empresa" required autofocus maxlength="50"></div>
                        <input type="hidden" name="accion" value="insertEmpresa">
                        <div class="form-group"><input class="form-control btn btn-primary" type="submit" name="submit" value="enviar"></div>
                    </form>
                </div><!-- fin card body -->
            </div><!-- fin de card -->
        </div><!-- fin de div formulario -->

        <!-- inicia segunda divicion -->
        <div class="col-md-auto p-2 ">
            <table class=" table table-bordered  table-striped bg-white table-sm mx-auto   text-center">
                <thead>

                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Accion</th>
                        <?php
                        //$medida = Medida::ningunDatoM();
                        $objMod  = Empresa::ningunDatoP();
                        $datos   = $objMod->verEmpresa();

                        $objMod->ver( $datos  );

                        if (isset($datos)) {
                         foreach ( $datos as $i => $d){
                             if ( isset($datos[$i][$i+1])   &&    $datos[$i][0] ==  $datos[$i][$i+1]    ){
                                 echo 'la empresas es la empresa'.$i;

                                  $arr[] =[ $d[0], $d[1], $d[2] ] ;

                                  print_r($arr);
                             }else{
                                 echo 'la empresa cambio';
                             }
                        ?>
                    </tr>
                </thead>
                <tbody>
                
                    <!-- Los nombres que estan son los mismos de los atributos de la base de datos de lo contrario dara un error -->
                    <td><?= $d[0] ?></td>
                    <td><?= $d[1] ?></td>


                    <!-- formEdicion.php?accion=editarMedia&&id=<?php// echo $row['ID_medida'] ?> -->
                    <td>
                        <a  href="../forms/formEdicionEmpresa.php?id=<?= $d[0] ?> " class="btn btn-circle btn-secondary"><i class="fas fa-marker"></i></a>
                        <a   href="../metodos/get.php?accion=eliminarEmpresa&&id=<?= $d[0] ?>"    class="  btn btn-circle btn-danger"><i class="far fa-trash-alt"></i></a>

                        <!--  get.php?accion=editarMedia?id= -->
                        <!-- edit.php?id=<?//php  echo  $row['id_sitio']  ?> -->
                    </td>
                </tbody>
        <?php

                            } //fin del while
                        } // fin de ver empresa
        ?>
            </table>


        </div><!-- fin de response table -->
    </div><!-- fin de row -->
</div><!-- Fin container -->

<?php
include_once '../plantillas/cuerpo/finhtml.php';
?>