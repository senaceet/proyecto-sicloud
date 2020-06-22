<?php


class Categoria
{


    protected $nom_categoria;
    protected $ID_categoria;

    public function __construct($_nom_categoria, $_ID_categoria =  "")
    {

        $this->nom_categoria = $_nom_categoria;
        $this->ID_categoria = $_ID_categoria;
    }

    //GET

    public function get_nom_categoria(){
        return $this->nom_categoria;
    }

    
    public function get_ID_categoria(){
        return $this->ID_categoria;
    }


    //METODOS

    // retorna ningun dato
    static function ningunDatoC()
    {
        return new self('', '');
    }


    // Insertar datos           C
    public function insertCategoria()
    {
        include_once 'class.conexion.php';
        $con = new Conexion;
        $sql = "INSERT INTO sicloud.categoria (  nom_categoria ) VALUES (  '$this->nom_categoria' )";
        $result = $con->query($sql);
        // if ($result) { echo "<script>alert('Registro de categoria exitoso')</script>"; echo "<script>window.location.replace('../forms/formCategoria.php')</script>"; }else{ echo "<script>alert('Error de registro categoria')</script>"; echo "<script>window.location.replace('../forms/formCategoria.php')</script>";   } 
        if ($result) {
            $_SESSION['message'] = "Se creo categoria";
            $_SESSION['color'] = "success";
        } else {
            $_SESSION['message'] = "No creo categoria";
            $_SESSION['color'] = "danger";
        }
        header("location:../forms/formCategoria.php ");
    }


    // Ver categorias por id    R
    static function verCategoriaId($id)
    {
        include_once 'class.conexion.php';
        $db = new Conexion;
        $sql = "SELECT * FROM categoria WHERE ID_categoria  = $id ";
        $result = $db->query($sql);
        return $result;
    }

    // Ver categorias           R
    static function verCategoria()
    {
        include_once 'class.conexion.php';
        $db = new Conexion;
        $sql = "SELECT * FROM categoria";
        $result = $db->query($sql);
        return $result;
    }


    // Actualizar datos             U
    public function actualizarDatosCategoria($id_get)
    {
        include_once 'class.conexion.php';
        $c = new Conexion;
        $sql = "UPDATE sicloud.categoria SET   nom_categoria = '$this->nom_categoria'   WHERE ID_categoria = $id_get ";
        $result = $c->query($sql);
        //if($result){ echo "<script>alert('Actualizasion categoria exitoso')</script>"; echo "<script>window.location.replace('../forms/formCategoria.php')</script>"; }else{ echo "<script>alert('Error en actualizacion de categoria')</script>"; echo "<script>window.location.replace('../forms/formCategoria.php')</script>";   }  
        if ($result) {
            $_SESSION['message'] = "Se actualizo categoria";
            $_SESSION['color'] = "primary";
        } else {
            $_SESSION['message'] = "No se actualizo categoria";
            $_SESSION['color'] = "danger";
        }
        header("location: ../forms/formCategoria.php");
    }


    // Eliminar categoria           D
    static function eliminarCategoria($id_get)
    {
        include_once 'class.conexion.php';
        $con = new Conexion;
        $sql = "DELETE FROM sicloud.categoria WHERE  ID_categoria = $id_get ";




        $sql1 = "SET FOREIGN_KEY_CHECKS = 0 ";
        $res =   $con->query($sql1);

        if ($res) {
            $sql2 = "DELETE FROM sicloud.categoria WHERE  ID_categoria = $id_get ";
            $res1 = $con->query($sql2);
        }

        if ($res1) {
            $sql3 = "SET FOREIGN_KEY_CHECKS = 1";
            $res2 = $con->query($sql3);

            //if ($result) { echo "<script>alert('Elimino el registro')</script>"; echo "<script>window.location.replace('../forms/formCategoria.php')</script>"; }else{ echo "<script>alert('Error al eliminar el registro categoria')</script>"; echo "<script>window.location.replace('../forms/formCategoria.php')</script>";   } 
            if ($res2) {
                $_SESSION['message'] = "Elimino categoria";
                $_SESSION['color'] = "danger";
            } else {
                $_SESSION['message '] = "No se Elimino categoria";
                $_SESSION['color'] = "danger";
            }
            header("location: ../forms/formCategoria.php");
        }
    } // fin de metodo eliminar categoria

    //Capturar id
    static function capturarId()
    {
        include_once 'class.conexon.php';
        $con = new Conexion;
        $sql = "SELECT * FROM sicloud.categoria ORDER BY ID_categoria DESC LIMIT 1 ";
        $datos = $con->query($sql);
        while ($row = $datos->fetch_array());
        $id = $row['ID_categoria'];
        return $id;
    } // fin de metodo capturar ID

    // Ver categiria sin conexion
    static function verCategorias()
    {
        include_once 'class.conexon.php';
        $d = new Conexion;
        $sql = "SELECT * FROM categoria
        order by nom_categoria asc";
        $result = $d->query($sql);
        return $result;
    } // fin de ver categoria


}
