<?php

include_once '../modelo/Usuario.php';
include_once 'StarterController.php';
$starter = new StarterController();

class UsuarioController extends Usuario {

    public function LoginVista(){
        include_once '../vista/usuario/Login.php';
    }

    public function InsertVista(){
        include_once '../vista/usuario/Insert.php';
    }

    public function SaveInfoForModel($nombre, $password, $rol){
        $this->nombre = $nombre;
        $this->pass = $password;
        $this->rol = $rol;
        $this->db = self::conexionPDO();
        $this->InsertUsuario();
    }

    public function VerifyLogin($nombre, $password){
        $this->nombre = $nombre;
        $this->pass = $password;
        $this->db = self::conexionPDO();
        $infousuario = $this->SearchUsuario();
        foreach($infousuario as $usuario){
            if(password_verify($password, $usuario->pass)){
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['pass'] = $usuario->pass;
            $_SESSION['rol'] = $usuario->rol;
            } else {
                echo 'Contraseña Incorrecta';
            }
        }    
            
    }
    
    
}


if(isset($_GET['action']) && $_GET['action'] == 'login'){
    $instanciacontrolador = new UsuarioController();
    $instanciacontrolador->LoginVista();
}

if(isset($_GET['action']) && $_GET['action'] == 'insert'){
    $instanciacontrolador = new UsuarioController();
    $instanciacontrolador->InsertVista();
}

if(isset($_POST['action']) && $_POST['action'] == 'login'){
    $instanciacontrolador = new UsuarioController;
    $instanciacontrolador->VerifyLogin($_POST['name'], $_POST['pass']);

}

if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    $instanciacontrolador = new UsuarioController();
    $password = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $instanciacontrolador->SaveInfoForModel(
        $_POST['nombre'],
        $password,
        $_POST['rol']
    );


}

?>