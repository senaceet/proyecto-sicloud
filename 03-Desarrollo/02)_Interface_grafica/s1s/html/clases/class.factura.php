
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);



class Factura
{



    protected $ID_factura;
    protected $total;
    protected $fecha;
    protected $b_total;
    protected $iva;
    protected $FK_c_tipo_pago;

    public function __construct($_ID_factura, $_total, $_fecha, $_b_total, $_iva, $_FK_c_tipo_pago)
    {
        $this->ID_factura = $_ID_factura;
        $this->total = $_total;
        $this->fecha = $_fecha;
        $this->b_total = $_b_total;
        $this->iva = $_iva;
        $this->FK_c_tipo_pago = $_FK_c_tipo_pago;
    }









 static function verRegistro(){
      include_once 'clases/class.conexion.php';
          $db = new Conexion; 
          $sql = "SELECT * FROM dt_ad_facturacion";
          $result = $db->query($sql);
          return $result;
      }
   



   static function verCliente($id){
      include_once 'clases/class.conexion.php';
          $db = new Conexion; 
          $sql = "SELECT * FROM `dt_clientes` WHERE  cli_nit = $id ";
          $result = $db->query($sql);
          return $result;
      }


 


   static function verCompra(){
      include_once 'clases/class.conexion.php';
          $db = new Conexion; 
          $sql = "SELECT D.referencia , D.cantidad , D.vrUnitario  
          from  dt_ad_facturacion F
           join dt_ad_facturacionDetalle D using (id_factura)
          where F.nfactura = 64868
          ";
          $result = $db->query($sql);
          return $result;


}


}


   ?>
   





