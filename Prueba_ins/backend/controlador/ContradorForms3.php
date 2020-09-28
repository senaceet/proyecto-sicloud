
<?php
//session_destroy();
include_once '../../modelo/class.documento.php';
include_once '../../modelo/class.usuario.php';
include_once '../../modelo/class.rol.php';
include_once '../../modelo/class.categoria.php';
include_once '../../modelo/class.medida.php';
include_once '../../modelo/class.proveedor.php';
include_once '../../modelo/class.producto.php';
class ControllerDoc{
    public $obModDoc;
    public $objModUs;
    public $objModRol;
    public $objModCat;
    public function __construct() {
        $this->obModDoc   =  Documento::ningunDatoD();
        $this->objModUs   =  Usuario::ningunDato();
        $this->objModRol  =  Rol::ningunDato();
        $this->objModCat  =  Categoria::ningunDatoC();
        $this->objModMed  =  Medida::ningunDatoM();
        $this->objModPro  =  Proveedor::ningunDatoP();
        $this->objModProd =  Producto::ningunDatoP();
    }


   }