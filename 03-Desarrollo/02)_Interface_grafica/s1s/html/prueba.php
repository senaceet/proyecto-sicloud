<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);


$conexion = mysqli_connect('192.168.2.9', 'javier', 'javier') or die('Se genero un error ');
mysqli_select_db($conexion, 'javier') or die('Se genero un error de conexion /02');
$sql = 'SELECT * FROM dt_ad_facturacion';
$rs = mysqli_query($conexion, $sql);
print_r($rs);
?>
