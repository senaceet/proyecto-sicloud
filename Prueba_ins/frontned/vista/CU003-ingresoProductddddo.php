<?php
     include_once '../controlador/ControladorSession.php';
   //comprobacion de rol
    include_once 'plantillas/cuerpo/inihtmlN1.php';
    include_once 'clases/class.conexion.php';
    include_once 'clases/class.categoria.php';
    include_once 'clases/class.producto.php';
    include_once 'clases/class.medida.php';
    include_once 'clases/class.proveedor.php';
    include_once 'plantillas/nav/navN1.php';
    include_once 'plantillas/plantilla.php';



   $datos = Producto::verJoin('176974732X');
   echo '<pre>';
   var_dump($datos);
   print_r($datos);
   echo '</pre>';


   foreach($datos as $row ){
   $idUs         =    $row['ID_prod']	 ;        
   $nomProduct   =          $row['nom_prod']	  ;   
   $valProduct   =          $row['val_prod']	  ;     
   $estadoProd   =          $row['estado_prod']  ;	   
   $stokProd     =        $row['stok_prod']	   ;   
   $nomEmpresa   =          $row['nom_empresa']  ;	     
   $nomCategoria =            $row['nom_categoria']  ;	
     
 
 
 
 } 

    echo "hola";


                    include_once 'plantillas/cuerpo/footerN1.php';
                    include_once 'plantillas/cuerpo/finhtml.php';

?>