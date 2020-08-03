<?php
include_once 'session/config.php';
include_once 'session/sessiones.php';

$mensaje = "";



// captura los datos que vienen por pos, desemcrita y almacena en varibles
if (isset($_POST['btnCatalogo'])) {
    switch ($_POST['btnCatalogo']) {
        case 'Agregar':
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                $mensajeId = "OK ID" . $ID;
            } else {
                $mensaje = "Upss.. Id incorrecto";
            }


            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                $mensajeNombre = "OK ID" . $NOMBRE;
            } else {
                $mensaje = "Upss.. Id incorrecto";
            }



            if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
                $mensajeCantidad = "OK ID" . $CANTIDAD;
            } else {
                $mensaje = "Upss.. Id incorrecto";
            }


            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                $mensajePrecio = "OK ID" . $PRECIO;
            } else {
                $mensajePrecio = "Upss.. Id incorrecto";
            }

            if (is_string(openssl_decrypt($_POST['img'], COD, KEY))) {
                $IMG = openssl_decrypt($_POST['img'], COD, KEY);
                $mensajeImg = "OK ID" . $IMG;
            } else {
                $mensajePrecio = "Upss.. Id incorrecto";
            }




            if (!isset($_SESSION['CARRITO'])) {
                // ALMACENAR EL VALOR DE LA VARIBLE EN EL ARREGLO $porductos
                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO,
                    'IMG' => $IMG

                );
                // Almacena los datos en session
                $_SESSION['CARRITO'][0] = $producto; // almacena en la pocion 0 "en el primer lemento del carrito"
            } // fin de isset carrito "primer producto"
            else {
                $numeroProductos = count($_SESSION['CARRITO']);
                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO,
                    'IMG' => $IMG
                );
                $_SESSION['CARRITO'][$numeroProductos] = $producto;
            }
            $mensaje = print_r($_SESSION, true);
    } // Fin de switch
}
