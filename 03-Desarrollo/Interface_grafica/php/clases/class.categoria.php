<?php



class Categoria{
    protected $ID_categora;
    protected $nom_categora;

    public function __construct($_ID_categora = '', $_nom_categora )
    {
        $this->ID_categora = $_ID_categora;
        $this->nom_categora = $_nom_categora;
    }

    //Metodos
    static function ningunDatoC(){
 
        return new self('','');
    }



    //Ver categorias
    static function verCategorias(){    
        $db = new Conexion;
        $sql = "SELECT * FROM categoria";
        $result = $db->query($sql);
        return $result;
    }




    //Empresa::verEmpresa();






}



?>