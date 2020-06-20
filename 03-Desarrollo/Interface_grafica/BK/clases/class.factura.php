<?php

include_once 'class.conexion.php';

class Factura{



protected $ID_factura;
protected $total;
protected $fecha;
protected $b_total;
protected $iva;
protected $FK_c_tipo_pago;

public function __construct( $_ID_factura, $_total, $_fecha, $_b_total, $_iva, $_FK_c_tipo_pago       )
{
    $this->ID_factura = $_ID_factura;
    $this->total = $_total;
    $this->fecha = $_fecha;
    $this->b_total = $_b_total;
    $this->iva = $_iva;
    $this->FK_c_tipo_pago = $_FK_c_tipo_pago;
} 




public function get_ID_factura(){
    return $this->ID_factura;
}

public function get_total(){
    return $this->total;
}

public function get_fecha(){
    return $this->fecha;
}



public function get_b_total(){
    return $this->b_total;
}


public function get_iva(){
    return $this->iva;
}


public function get_FK_c_tipo_pago(){
    return $this->FK_c_tipo_pago;
}


//  METODOS

// verjoinFactura

static function verjoinFactura(){

    $sql = "SELECT  ID_us  ,nom1, ape1 ,nom_prod, f.fecha , nom_tipo_pago , total
    from sicloud.det_factura df
    join sicloud.usuario u on df.CF_us = u.ID_us and df.CF_tipo_doc = u.FK_tipo_doc
    join sicloud.producto p on df.FK_det_prod = p.ID_prod
    join sicloud.factura f on df.FK_det_factura = f.ID_factura
    join sicloud.tipo_pago  tp on f.FK_c_tipo_pago = tp.ID_tipo_pago  order by nom1 asc  ";
    $con = new Conexion;
    $dat =  $con->query( $sql );
    return $dat;

}// fin de metodo ver join factura








/// <td> 121312323123 </td>
// <td> alejandro </td>
//<td> David </td>
//<td> Gutierrez </td>
//<td> Pulido </td>
//<td> Martillo </td>
///<td> 20/04/19</td>
//<td> Efectivo </td>
//<td> 19.0000 </td>















}



?>