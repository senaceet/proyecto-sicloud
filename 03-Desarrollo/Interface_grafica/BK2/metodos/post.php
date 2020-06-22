<?php
//include 'class.producto.php'; 
include_once '../clases/class.medida.php';
include_once '../clases/class.producto.php';
include_once '../clases/class.empresa.php';
include_once '../clases/class.categoria.php';
include_once '../clases/class.rol.php';
include_once '../clases/class.usuario.php';
include_once '../clases/class.rol_usuario.php';
include_once '../clases/class.login.php';



if (isset($_POST['submit'])) {




    //------------------------------------------------------------
    // USUARIO
    //Update 
    if ($_POST['accion'] == 'insetUpdateUsuario') {
        include_once '../session/sessiones.php';
        $idg = $_GET['id'];
        $ID_us = $_POST['ID_us'];
        $nom1 = $_POST['nom1'];
        $nom2 = $_POST['nom2'];
        $ape1 = $_POST['ape1'];
        $ape2 = $_POST['ape2'];
        $fecha = $_POST['fecha'];
        $pass = $_POST['pass'];
        $foto = $_POST['foto'];
        $correo = $_POST['correo'];
        $FK_tipo_doc = $_POST['FK_tipo_doc'];

        // captura de rol_usuario
        $FK_rol = $_POST['FK_rol'];
        // $FK_us
        // $FK_tipo_doc
        $fecha_as = $_POST['fecha_a'];
        $estado = "0";

        ///METODO INSERSION DE USUARIO UPDATE
        $usuario = new Usuario($ID_us,  $nom1, $nom2, $ape1, $ape2, $fecha, $pass, $foto, $correo, $FK_tipo_doc);
        $r = $usuario->insertUpdateUsuario($idg);
        if ($r1 = true) {
            //METODO DE INSERSION ROL_USUARIO UOPDATE
            $FK = new Rol_us($FK_rol, $ID_us, $FK_tipo_doc, $fecha_as, $estado);
            $insert = $FK->insertUpdateRol($idg);
        } // fin de if $r1

        if ($insert = true) {
            $_SESSION['message'] = "Actualizo Datos de usuario y rol";
            $_SESSION['color'] = "primary";
        } // fin de true if $insert 
        else {
            $_SESSION['message'] = "Error al actualizar Datos de usuario y rol";
            $_SESSION['color'] = "danger";
        } // fin de if fall de $insert 
        header("location: ../CU009-controlUsuarios.php ");
    } // fin del insert update usuario


    //------------------------------------------------------------------------------------
    // USUARIO
    // insert
    if ($_POST['accion'] == 'insetUsuario') {
        include_once '../session/sessiones.php';
        $ID_us = $_POST['ID_us'];
        $nom1 = $_POST['nom1'];
        $nom2 = $_POST['nom2'];
        $ape1 = $_POST['ape1'];
        $ape2 = $_POST['ape2'];
        $fecha = $_POST['fecha'];
        $pass = $_POST['pass'];
        $foto = $_POST['foto'];
        $correo = $_POST['correo'];
        $FK_tipo_doc = $_POST['FK_tipo_doc'];

        // captura de rol_usuario
        $FK_rol = $_POST['FK_rol'];
        // $FK_us
        // $FK_tipo_doc
        $fecha_as = $_POST['fecha_a'];
        $estado = "0";

        ///pendinete revision
        $usuario = new Usuario($ID_us,  $nom1, $nom2, $ape1, $ape2, $fecha, $pass, $foto, $correo, $FK_tipo_doc);
        $r = $usuario->insertUsuario();
        if ($r = true) {

            $FK = new Rol_us($FK_rol, $ID_us, $FK_tipo_doc, $fecha_as, $estado);
            $i = $FK->insertrRolUs();

            if ($i = true) {
                $_SESSION['message'] = "Se creo usuario y rol";
                $_SESSION['color'] = "success";
            } else {
                $_SESSION['message'] = "Erro al crear usuario";
                $_SESSION['color'] = "danger";
            }
            header("location: ../CU002-registrodeUsuario.php ");
        }
    } // fin de insert usuario 




    //----------------------------------------------------------------
    //LOGIN

    if ($_POST['accion'] == 'login') {
        include_once '../session/sessiones.php';
        $tDoc =   $_POST['tDoc'];
        $nDoc = $_POST['nDoc'];
        $pass = $_POST['pass'];
        $login = new Login($tDoc, $nDoc, $pass);
        //print_r($login);
        $_SESSION['login'] = $login;
        print_r($_SESSION['login']);
        echo "<script>window.location.replace('../CU002-registrodeUsuario.php');</script>";
    } // fin de login




    //PRODUCTO------------------------------------------------------------------------------------
    // Update
    if ($_POST['accion'] == 'insertProductoUpdate') {
        $id = $_GET['id'];;
        include_once '../session/sessiones.php';
        $ID_prod = $_POST['ID_prod'];
        $nom_prod = $_POST['nom_prod'];
        $val_prod = $_POST['val_prod'];
        $stok_prod = $_POST['stok_prod'];
        $estado_prod = $_POST['estado_prod'];
        $CF_categoria = $_POST['CF_categoria'];
        $CF_tipo_medida = $_POST['CF_tipo_medida'];

        $producto = new Producto($ID_prod, $nom_prod, $val_prod, $stok_prod, $estado_prod, $CF_categoria, $CF_tipo_medida);
        $_SESSION['producto'] = $producto;
        $producto->editarProducto($id);
    } // fin de insert Producto Update

    //PRODUCTO------------------------------------------------------------
    // Insert      
    if ($_POST['accion'] == 'insertProducto') {
        include_once '../session/sessiones.php';
        //DATOS CAPTURADOS PARA INSERSION EN LA TABLA PRODUCTO
        $ID_prod = $_POST['ID_prod'];
        $nom_prod = $_POST['nom_prod'];
        $val_prod = $_POST['val_prod'];
        $stok_prod = $_POST['stok_prod'];
        $estado_prod = $_POST['estado_prod'];
        $CF_categoria = $_POST['CF_categoria'];
        $CF_tipo_medida = $_POST['CF_tipo_medida'];


        // paso de valores al constructor
        $producto = new Producto($ID_prod, $nom_prod,  $val_prod, $stok_prod, $estado_prod, $CF_categoria, $CF_tipo_medida);
        $_SESSION['producto'] = $producto;
        $producto->insertarProducto();
    } // fin de insersion producto



    //--------------------------------------------------------------------
    //ROL
    // insert
    if ($_POST['accion'] == 'insertRol') {
        include_once '../session/sessiones.php';
        $_rol = $_POST['nom_rol'];
        $rol = new Rol($_rol);
        $_SESSION['rol'] = $rol;
        $rol->insertRol();
    } // fin de insersion rol

    //-------------------------------------------------------------------
    //ROL
    // Update
    if ($_POST['accion'] == 'insertUdateRol') {
        include_once '../session/sessiones.php';
        $id = $_GET['id'];
        $_rol  = $_POST['nom_rol'];
        $rol = new Rol($_rol);
        echo print_r($_POST);
        $rol->insertUpdateRol($id);
    } // fin de insersion update rol



    //---------------------------------------------------------------
    //MEDIDA
    // Insert
    if ($_POST['accion'] == 'insertMedida') {
        include_once '../session/sessiones.php';
        //capturo los datos
        $nom_medida = $_POST['nom_medida'];
        $nom_prod = $_POST['acron_medida'];

        //estancio objeto de clase medida
        $medida = new Medida($nom_medida, $nom_prod);
        $_SESSION['medida'] = $medida;
        $medida->insertMedia();
    } //fin de insertar medida

    //-----------------------------------------------------
    //MEDIDA
    // Update
    if ((isset($_POST['accion']))  && ($_POST['accion'] == 'insertUdateMedia')) {
        include_once '../session/sessiones.php';
        // echo "estoy en insertUpdate";
        $id        =  $_GET['id'];
        $nom_medida = $_POST['nom'];
        $acron_medida = $_POST['acron'];
        $medida = new Medida($nom_medida, $acron_medida);
        $medida->actualizarDatosMedida($id);
    } //fin de insertarUdate



    //--------------------------------------------------   
    //EMPRESA
    //Update
    if ($_POST['accion'] == 'insertUdateEmpresa') {
        include_once '../session/sessiones.php';
        echo 'estoy en insert empresa ';
        $id = $_GET['id'];
        $nom_empresa = $_POST['nom_empresa'];
        //echo print_r($_POST);
        $empresa = new Empresa($id, $nom_empresa);
        $empresa->actualizarDatosEmpresa($id);
    } // fin de actualizar empresa

    //--------------------------------------------------
    //EMPRESA
    //Insert
    if ($_POST['accion'] == 'insertEmpresa') {
        include_once '../session/sessiones.php';
        echo "estoy en insercion de empresa";
        $ID_rut = $_POST['ID_rut'];
        $nom_empresa = $_POST['nom_empresa'];
        $empresa = new Empresa($ID_rut, $nom_empresa);
        $empresa->insertEmpresa();
        //$_SESSION['empresa'] = $empresa;
    } // fin de insersion empresa


    //-------------------------------------------------
    //CATEGORIA
    //Insert
    if ($_POST['accion'] == 'insertCategoria') {
        include_once '../session/sessiones.php';
        echo 'estoy en insertar empresa';
        $ID_categoria = $_POST['ID_categoria'];
        $nom_categoria = $_POST['nom_categoria'];

        $categoria = new Categoria($nom_categoria, $ID_categoria);
        $_SESSION['categoria'] = $categoria;
        // echo print_r($_POST);
        $categoria->insertCategoria();
    } // Fin de categoria

    //-------------------------------------------------
    //CATEGORIA
    //Update
    if ($_POST['accion'] == 'insertUdateCategoria') {
        include_once '../session/sessiones.php';
        $categoria = $_POST['categoria'];
        $id = $_GET['id'];
        $categoria = new Categoria($categoria);
        $categoria->actualizarDatosCategoria($id);
    } // fin de insert update categoria
    ///------------------------------------------------------


} else {
    echo "<script>alert('Estas ingresando por url, ingresa de manera incorrecta att Javier');</script>";
}// fin de else fi no existe submit por post