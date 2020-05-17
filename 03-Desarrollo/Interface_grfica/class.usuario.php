<?php

class Usuario{
    private $id_usuario;
    private $nombre;
    private $rol;

    public function __construct($id, $nom, $cargo)
    {
        $this->id_usuario = $id;
        $this->nombre = $nom;
        $this->rol = $cargo;

    }
    public function get_nombre(){
        return $this->nombre;
    }
    public function get_id(){
        return $this->id_usuario;
    }
    public function get_rol(){
        return $this->rol;
    }
}

?>