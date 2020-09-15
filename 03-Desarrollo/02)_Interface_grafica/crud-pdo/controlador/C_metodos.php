<?php

include_once '../modelo/class.medida.php';
echo '<pre>';
var_dump($_REQUEST);
var_dump($_FILES);
echo '</pre>';

if (isset($_POST['submit'])) {
    if ($_POST['accion'] ==  'insertMedida') {

        $nom_medida = $_POST['nom_medida'];
        $acron_medida = $_POST['acron_medida'];
        $medida = new Medida($nom_medida, $acron_medida);
        $medida->insertarMedida();
        header("location: ../V_medida.php");
    }

//=====================================================

//C_metodos.php?accion=editarMedia&&id=
// <input type="hidden" name="accion" value="insertUpdateMedida">
if($_POST['accion'] == 'insertUpdateMedida' ){
    include_once '../modelo/class.medida.php';
$medida = new Medida($_POST['nom_medida']  , $_POST['acron_medida'] ) ;
echo '<pre>';
var_dump($medida);
echo '</pre>';
$medida->actualizarMedida( $_GET['id'] );
echo $_GET['id'];
header("location: ../V_medida.php");



}




} else {
    echo "Estas ingresando de forma incorrecta al sistema";
}


//=========================================
//Get

