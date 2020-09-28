<?php   

include_once 'class.conexion.php';
class Telefono extends Conexion{


protected $tel;
protected $CF_us;
protected $CF_tipo_doc;
protected $CF_rut;
protected $db;


public function __construct(  $_tel, $_CF_us , $_CF_tipo_doc , $_CF_rut )
{
    $this->tel = $_tel;
    $this->CF_us = $_CF_us;
    $this->CF_tipo_doc = $_CF_tipo_doc;
    $this->CF_rut = $_CF_rut;
    $this->db = self::conexionPDO();;
}


// METODOS

public function insertTelefonoUsuario(){
    //include_once '../clases/class.conexion.php';
    //$c = new Conexion;
    $sql = "INSERT INTO sicloud.telefono ( tel,CF_us)values('$this->tel', '$this->CF_us ')";
    $stm = $this->db->prepare($sql);
    $stm -> bindValue (":tel",$this->tel);
    $stm -> bindValue (":CF_us",$this->CF_us);
    $insert = $stm->execute();
    //echo $sql;
    //$insert = $c->query($sql);
       
   if($insert){   
    $_SESSION['message'] =  'A registrado telefono para su cuenta, si desea ingresa otro telefono, favor digite';
    $_SESSION['color'] = 'success'; 


    }else{
        $_SESSION['message'] =  'No registro telefono';
        $_SESSION['color'] = 'danger'; 
        }

        header("location: ../vista/formTelefono.php ");
}// fin de insert telefono usuario

// muestra los datos por id------------------------------------------------------------
public function verTelefonosUsuarioPorID($id){
//include_once '../clases/class.conexion.php';
//$c = new Conexion;
    $sql = "SELECT U.ID_us , U.nom1 , U.ape1 , R.nom_rol , T.tel
        from rol R join rol_usuario R_U on R.ID_rol_n = R_U.FK_rol
        join usuario U on R_U.FK_us = U.ID_us
        join telefono T on  U.ID_us = T.CF_us
        where CF_us = $id";
        $consulta= $this->db->prepare($sql);
        $result = $consulta->execute();
        $result = $consulta->fetchAll();
        return $result;
//echo $sql;
//$result= $c->query($sql);
//return $result;
}
// Fin de mostrar datos por id
//------------------------------------------------------------------------------------------



// muestra los datos por id------------------------------------------------------------
public function verTelefonosUsuario(){
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = "SELECT U.ID_us , U.nom1 , U.ape1 , R.nom_rol , T.tel
    from rol R join rol_usuario R_U on R.ID_rol_n = R_U.FK_rol
    join usuario U on R_U.FK_us = U.ID_us
    join telefono T on  U.ID_us = T.CF_us";
    $consulta= $this->db->prepare($sql);
    $result = $consulta->execute();
    $result = $consulta->fetchAll();
    return $result;
    //echo $sql;
    //$result= $c->query($sql);
    //return $result;
    }
    // Fin de mostrar datos por id
    //------------------------------------------------------------------------------------------


// muestra los datos por rol------------------------------------------------------------
public function verTelefonosUsuarioRol($rol){
    //include_once '../clases/class.conexion.php';
    //$c = new Conexion;
    $sql = "SELECT U.ID_us , U.nom1 , U.ape1 , R.nom_rol , T.tel
            from rol R join rol_usuario R_U on R.ID_rol_n = R_U.FK_rol
            join usuario U on R_U.FK_us = U.ID_us
            join telefono T on  U.ID_us = T.CF_us
            where R_U.FK_rol = $rol";
    $consulta= $this->db->prepare($sql);
    $result = $consulta->execute();
    $result = $consulta->fetchAll();
    return $result;
    //echo $sql;
    //$result= $c->query($sql);
    //return $result;
    }
    // Fin de mostrar telefono rol
    //------------------------------------------------------------------------------------------



    
// muestra telefonos de empresa------------------------------------------------------------
public function verTelefonosEmpresa(){
    //include_once '../clases/class.conexion.php';
    //$c = new Conexion;
    $sql = "SELECT E_P.ID_rut , E_P.nom_empresa , T.tel
    from empresa_provedor  E_P join telefono T on E_P.ID_rut = T.CF_rut;";
    $consulta= $this->db->prepare($sql);
    $result = $consulta->execute();
    $result = $consulta->fetchAll();
    return $result;
    //echo $sql;
    //$result= $c->query($sql);
    //return $result;
    }
    // Fin de ver telefonos empresas
    //------------------------------------------------------------------------------------------

}// fin de la clase telefono


?>