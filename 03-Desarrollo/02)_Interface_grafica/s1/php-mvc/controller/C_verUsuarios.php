<?php

require 'model/class.usuario.php';


$us = new Usuario();

$datos = $us->GetUser();
print_r($datos);
require 'views/V_verUsuarios.php';






?>