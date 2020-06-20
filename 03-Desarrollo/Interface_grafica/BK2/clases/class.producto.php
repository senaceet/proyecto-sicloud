<?php


class Producto
{
    //definicion accesibilidad de varibles
    protected $ID_prod;
    protected $nom_prod;
    protected $val_prod;
    protected $stok_prod;
    protected $estado_prod;
    protected $CF_categoria;
    protected $CF_tipo_medida;

    //Definicion de contructor
    public function __construct($_ID_prod, $_nom_prod, $_val_prod, $_stok_prod, $_estado_prod, $_CF_categoria, $_CF_tipo_medida)
    {
        $this->ID_prod = $_ID_prod;
        $this->nom_prod = $_nom_prod;
        $this->val_prod = $_val_prod;
        $this->stok_prod = $_stok_prod;
        $this->estado_prod = $_estado_prod;
        $this->CF_categoria = $_CF_categoria;
        $this->CF_tipo_medida = $_CF_tipo_medida;
    }

    public function get_ID_prod()
    {
        return   $this->ID_prod;
    }

    public function get_nom_prod()
    {
        return   $this->nom_prod;
    }

    public function get_val_prod()
    {
        return   $this->val_prod;
    }


    public function get_stok_prod()
    {
        return   $this->stok_prod;
    }


    public function get_estado_prod()
    {
        return   $this->estado_prod;
    }

    public function get_CF_categoria()
    {
        return   $this->CF_categoria;
    }

    public function get_CF_tipo_medida()
    {
        return   $this->tipo_medida;
    }


    //Funcion estatica
    static function ningunDatoP()
    {
        return new self('', '', '', '', '', '', '');
    }

    //query insertar producto                                     C
    public function insertarProducto()
    {
        include_once 'class.conexion.php';
        $db = new Conexion;
        $sql = "INSERT INTO sicloud.producto (ID_prod, nom_prod, val_prod, stok_prod, estado_prod, CF_categoria, CF_tipo_medida)VALUES('$this->ID_prod','$this->nom_prod', '$this->val_prod' , '$this->stok_prod' , '$this->estado_prod', '$this->CF_categoria' , '$this->CF_tipo_medida')";
        //      $sql = "INSERT INTO sicloud.tipo_medida(nom_medida, acron_medida)VALUES('$this->nom_medida','$this->acron_medida')";
        $ejecucion = $db->query($sql);
        if ($ejecucion) {
            $_SESSION['message'] = "Se creo producto";
            $_SESSION['color'] = "success";
        } else {
            $_SESSION['message'] = "No se creo producto";
            $_SESSION['color'] = "danger";
        }
        header("location: ../CU004-crearProductos.php");
    } // fin de javaScript



    //query ver productos                                        R
    static function verProductos()
    {
        include_once 'class.conexion.php';
        $db = new Conexion;
        $sql = "SELECT * FROM producto";
        $result = $db->query($sql);
        return $result;
    } // fin de ver productos


    //query ver productos                                       R
    static function verProductosId($id)
    {
        include_once 'class.conexion.php';
        $db = new Conexion;
        $sql = "SELECT * FROM SICLOUD.producto  WHERE ID_prod = '$id' ";
        //            SELECT * FROM SICLOUD.producto  WHERE ID_prod = '9808953743';
        $result = $db->query($sql);
        return $result;
    } // fin de ver productos por id



    //EDITAR PRODUCTO                                             U
    public function editarProducto($id)
    {
        include_once 'class.conexion.php';
        $con = new Conexion;
        $sql = "UPDATE sicloud.producto SET ID_prod = '$this->ID_prod' , nom_prod = '$this->nom_prod' , val_prod = '$this->val_prod' , stok_prod = '$this->stok_prod' , estado_prod = '$this->estado_prod', CF_categoria = '$this->CF_categoria' , CF_tipo_medida = '$this->CF_tipo_medida'  WHERE ID_prod = '$id' ";
        $r = $con->query($sql);
        if ($r) {
            $_SESSION['message'] = "Actualizacion de producto exitosa";
            $_SESSION['color'] = "primary";
        } else {
            $_SESSION['message'] = "Error al actualizar producto";
            $_SESSION['color'] = "danger";
        }
        header("location: ../CU004-crearProductos.php?accion=verProducto");
    } // fin de editar productos



    //ELIMINAR PRODUCTO                                    D
    static function eliminarProducto($id)
    {
        include_once 'class.conexion.php';
        $con = new Conexion;
        $sql1 = "SET FOREIGN_KEY_CHECKS = 0 ";
        $res =   $con->query($sql1);

        if ($res) {
            $sql2 = " DELETE FROM producto  WHERE ID_prod = '$id'  ";
            $res1 = $con->query($sql2);
        }

        if ($res1) {
            $sql3 = "SET FOREIGN_KEY_CHECKS = 1";
            $res2 = $con->query($sql3);
        }

        if ($res2) {
            $_SESSION['message'] = "Elimino producto";
            $_SESSION['color'] = "danger";
        } else {
            $_SESSION['message'] = "Error al eliminar producto";
            $_SESSION['color'] = "danger";
        }
        header("location: ../CU004-crearProductos.php?accion=verProducto");
    }
}
