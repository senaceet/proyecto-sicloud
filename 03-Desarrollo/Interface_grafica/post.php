<?php
include 'class.usuario.php';

// si la peticion vienen por metodo POST es decir por el boton del formulario deja ingresar de lo contrario no
if(isset($_POST['submit'])){
            // Valida si lo correspondiente al formulario es un insert
                if($_POST['accion'] == 'insert'){
            //captura los datos del formulario
                    $nom1 = $_POST['nombre1'];
                    $nom2 = $_POST['nombre2'];
                    $ape1 = $_POST['apellido1'];
                    $ape2 = $_POST['apellido2'];
                    $fecha = $_POST['fecha'];
                    $pass = $_POST['pass'];
                    $foto = $_POST['foto'];
                    $correo = $_POST['correo'];
                    $FK_doc = $_POST['FK_tipo_doc'];


            // crea estancia de la clase usuario
                $usuario = new Usuario($nom1, $nom2, $ape1, $ape2, $fecha, $pass, $foto, $correo, $FK_doc);
                }


            // Aca se insertara el metodo para update
                if($_POST['accion'] == 'update'){
                }

//Envia al index en caso que el usaurio acceda indebidamente por url "que el metodo no sea submit"
}else{
    header("location: index.php");
}


?>