<?php

//include_once 'class.conexion.php';

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




    public function get_ID_factura()
    {
        return $this->ID_factura;
    }

    public function get_total()
    {
        return $this->total;
    }

    public function get_fecha()
    {
        return $this->fecha;
    }



    public function get_b_total()
    {
        return $this->b_total;
    }


    public function get_iva()
    {
        return $this->iva;
    }


    public function get_FK_c_tipo_pago()
    {
        return $this->FK_c_tipo_pago;
    }



    static function verFecha($f)
    {
        include_once 'class.conexion.php';
        $c = new Conexion;
        $sql = "SELECT cantidad, sum(f.total) as total, day(f.fecha) as dia
    from sicloud.det_factura detf
    join sicloud.factura f on f.ID_factura = detf.FK_det_factura
    where f.fecha = '$f'
    group by dia";
        $dat =   $c->query($sql);
        return $dat;
    } // fin  de ver fecha U







    //  METODOS

    // verjoinFactura

    static function verjoinFactura()
    {
        include_once 'class.conexion.php';

        $sql = "SELECT  ID_us  ,nom1, ape1 ,nom_prod, f.fecha , nom_tipo_pago , total
    from sicloud.det_factura df
    join sicloud.usuario u on df.CF_us = u.ID_us and df.CF_tipo_doc = u.FK_tipo_doc
    join sicloud.producto p on df.FK_det_prod = p.ID_prod
    join sicloud.factura f on df.FK_det_factura = f.ID_factura
    join sicloud.tipo_pago  tp on f.FK_c_tipo_pago = tp.ID_tipo_pago  order by nom1 asc  ";
        $con = new Conexion;
        $dat =  $con->query($sql);
        return $dat;
    } // fin de metodo ver join factura





    static function verDia()
    {
        include_once 'class.conexion.php';
        $c = new Conexion;
        $sql = "SELECT cantidad, sum(f.total) as total, day(f.fecha) as dia
from sicloud.det_factura detf
join sicloud.factura f on f.ID_factura = detf.FK_det_factura
group by dia";
        $dat = $c->query($sql);
        return $dat;
    }



    static function verSemana()
    {
        include_once 'class.conexion.php';
        $c = new Conexion;
        $sql = "SELECT count(*) as 'cantidad',sum(F.total) as Total, DATE_ADD(
    DATE (F.fecha),
    interval(7 - dayofweek(F.fecha)) day)
    dia_final_semana FROM sicloud.factura F
    group by dia_final_semana
    order by fecha asc";
        $i = $c->query($sql);
        return $i;
    }


    static function verMes()
    {
        include_once 'class.conexion.php';
        $c = new Conexion;
        $sql = "SELECT count(*) as 'cantidad',sum(F.total) as Total, DATE_ADD(
        DATE (F.fecha),
        interval(30 - dayofmonth(F.fecha)) day)
        dia_final_mes FROM sicloud.factura F
        group by dia_final_mes
        order by fecha asc";
        $i = $c->query($sql);
        return $i;
    }
}
