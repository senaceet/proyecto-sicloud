<?php

include_once 'plantillas/plantilla.php';
include_once 'plantillas/cuerpo/inihtmlN1.php';
include_once 'clases/class.producto.php';
include_once 'clases/class.categoria.php';
include_once 'plantillas/nav/navN1.php';
include_once 'session/sessiones.php';
include_once 'clases/class.producto.php';



if(isset($_GET['id'])){

    
    $datos = Producto::verProductosIdCarrito($_GET['id']);
    while(  $row = $datos->fetch_assoc()){
?>

<div class="col-md-12 mt-5">
    <div class="row">
        <div class="col-md-12 text-center text-white">
            <?php cardAviso();  ?>

        </div>
    </div>
    
    <div class="col-md-12 mt-5">
        <div class="row">
            <div class="card card-body col-md-12 mx-auto">
            <div class="row">
        
            <div class="card col-md-6 mx-1 mx-auto mb-lg-8">
                       <img class="card-body  mx-auto" src="fonts/img/<?php echo $row['img']; ?>" alt="Card image cap" height="260px" width="300px">
                </div>
                <div class="card col-md-6 mx-1 mx-auto "> 
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nom_prod']  ?></h5>
            
                        <p class="card-text lead"><?php $c = $row['val_prod'];
                                                                    echo "36 cuotas " . "$".number_format(($c / 36),1, ',','.') . " Sin interes";
                                                                   if( $row['estado_prod'] == "promocion"){
                                                                    echo "<br>".  $row['estado_prod']."<br>" ;
                                                                   } ?></strong></p>



                        
                        <p class="card-text text-success"><?php  echo "36 cuotas " . "$".number_format(($c / 36),1, ',','.') . " Sin interes"; ?></p>
                        <P><?php  echo $row['descript'] ?> <br></P>
                        <a href="catalogo.php" class="btn btn-primary">Agregar al carrito</a>
                        <a href="CU0015_16(usuario)-solicitudf.php" class="btn btn-primary">Ver carrito</a>
                    </div>
            </div>
           

<?php  }  } ?>
        </div>
    </div>
</div>