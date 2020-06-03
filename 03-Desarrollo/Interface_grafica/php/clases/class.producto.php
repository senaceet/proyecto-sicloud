<?php 
//include 'class.conexion.php';
include_once 'class.conexion.php';


class Producto {
            //definicion accesibilidad de varibles
            protected $ID_prod;
            protected $nom_prod;
            protected $val_prod;
            protected $stok_prod;
            protected $estado_prod;
            protected $CF_categoria;
            protected $CF_tipo_medida;

            //Definicion de contructor
            public function __construct( $_ID_prod, $_nom_prod, $_val_prod, $_stok_prod, $_estado_prod, $_CF_categoria, $_CF_tipo_medida)
            {
                $this->ID_prod = $_ID_prod;
                $this->nom_prod = $_nom_prod;
                $this->val_prod = $_val_prod;
                $this->stok_prod = $_stok_prod;
                $this->estado_prod = $_estado_prod;
                $this->CF_categoria = $_CF_categoria;
                $this->CF_tipo_medida = $_CF_tipo_medida;
            }

            //Funcion estatica
            static function ningunDatoP(){
            return new self('','','','','','','');
            }



            //query insrtar producto
            public function insertarProducto(){
                $db = new Conexion;
                $sql = "INSERT INTO sicloud.producto (ID_prod, nom_prod, val_prod, stok_prod, estado_prod, CF_categoria, CF_tipo_medida)VALUES('$this->ID_prod','$this->nom_prod', '$this->val_prod' , '$this->stok_prod' , '$this->estado_prod', '$this->CF_categoria' , '$this->CF_tipo_medida')";
      //      $sql = "INSERT INTO sicloud.tipo_medida(nom_medida, acron_medida)VALUES('$this->nom_medida','$this->acron_medida')";
               $ejecucion = $db->query($sql);
                if($ejecucion){ echo "<script>alert('Registro de  medida exitioso');</script>"; echo "<script>window.location.replace('../CU005-crearProductos.php');</script>"; }else{  echo "<script>alert('Error al insertar producto ');</script>"; echo "<script>window.location.replace(..'../CU005-crearProductos.php');</script>"; 
                }
            }


            //query ver productos
            static function verProductos(){
                $db = new Conexion;
                $sql = "SELECT * FROM producto";
                $result = $db->query($sql);
                return $result;
            }
}







?> 