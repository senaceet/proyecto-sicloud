<?php


//creacion de clase
class Medida
{
    //Definir accesibilidad 
    protected $nom_medida;
    protected $acron_medida;
    protected $id_medida;
    //Definir contractor
    public function __construct($_nom_medida, $_acron_medida, $_id_medida = "")
    {
        $this->nom_medida = $_nom_medida;
        $this->acron_medida = $_acron_medida;
        $this->id_medida = $_id_medida;
    }

    //get
    public function get_nom_medida()
    {
        return $this->nom_medida;
    }

    public function get_acron_medida()
    {
        return $this->nom_medida;
    }

    public function get_id_medida()
    {
        return $this->id_medida;
    }



    //METODO Insertsar medida
    public function insertMedia()
    {
        include_once 'class.conexion.php';
        $db = new Conexion();
        $sql = "INSERT INTO sicloud.tipo_medida(nom_medida, acron_medida)VALUES('$this->nom_medida','$this->acron_medida')";
        $ejecucion = $db->query($sql);
        if ($ejecucion) {
            $_SESSION['message'] = "Se creo medida";
            $_SESSION['color'] = "success";
        } else {
            $_SESSION['message'] = "error al crear medida";
            $_SESSION['color'] = "danger";
        }
        header("location: ../forms/formMedida.php");
    } // fin de insertar medida



    //CREACION DE METODOS acceso sin ser una extancia
    static function ningunDatoM()
    {
        return new self('', '');
    }

    //metodo mostrar datos
    static function verMedida()
    {
        include_once 'class.conexion.php';
        $conexion = new Conexion;
        $sql = "SELECT * FROM  tipo_medida";
        $result = $conexion->query($sql);
        return $result;
    }

    //mostrar datos por ID
    static function verDatoPorId($id)
    {
        include_once 'class.conexion.php';
        $conexion = new Conexion;
        $sql = "SELECT * FROM  tipo_medida WHERE ID_medida = $id ";
        $result = $conexion->query($sql);
        return $result;
    }



    //Actualizar datos 
    public function actualizarDatosMedida($id)
    {
        include_once 'class.conexion.php';
        $c = new Conexion;
        $sql = "UPDATE tipo_medida SET nom_medida = '$this->nom_medida'  , acron_medida = '$this->acron_medida' WHERE ID_medida = '$id' ";
        //"UPDATE sitio_t SET nom_sitio = '$sitio', Fk_capital = '$FK_capital'  WHERE id_sitio = $id "
        $ejecucion = $c->query($sql);
        if ($ejecucion) {
            $_SESSION['message'] = "Se actualizo medida";
            $_SESSION['color'] = "primary";
        } else {
            $_SESSION['message'] = "error al actualizar medida";
            $_SESSION['color'] = "danger";
        }
        header("location: ../forms/formMedida.php");
    }


    //eliminar registros
    static function eliminarDatosMedia($id)
    {
        include_once 'class.conexion.php';
        $con = new Conexion();
        $sql = "DELETE FROM tipo_medida WHERE ID_medida = '$id' ";
        $ejecucion = $con->query($sql);
        if ($ejecucion) {
            $_SESSION['message'] = "Elimino medida";
            $_SESSION['color'] = "danger";
        } else {
            $_SESSION['message'] = "Error Elimino medida";
            $_SESSION['color'] = "danger";
        }
        header("location: ../forms/formMedida.php");
    }
}
