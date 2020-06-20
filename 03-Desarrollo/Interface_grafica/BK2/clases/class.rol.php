<?php   

//include_once 'class.conexion.php';

class Rol {


protected $nom_rol;
protected $ID_rol;

public function __construct(  $_nom_rol, $_ID_rol = ""  )
{
    $this->nom_rol = $_nom_rol;
    $this->ID_rol = $_ID_rol;
}

public function get_nom_rol(){
    return $this->nom_rol;
}

public function get_id_rol(){
    return $this->ID_rol;
}



// insertar roles                                C  
public function insertRol(){
    include_once 'class.conexion.php';
 
    $con = new Conexion;
    $sql = "INSERT INTO sicloud.rol ( nom_rol )VALUES( '$this->nom_rol' )";
    $rol = $con->query($sql);

   
   if($rol){   
       $_SESSION['message'] =  'Se a creado el rol';
       $_SESSION['color'] = 'success'; 


}else{
    $_SESSION['message'] =  'Error no se a creado rol';
    $_SESSION['color'] = 'danger'; 

}

header("location: ../forms/formRol.php ");
 
}//fin de insertRol



// funcion que no devuelve datos                R
static function ningunDato(){
    return new self ('','');
   }// fin de lectura ningun dato
   

// metodo ver roles                            R
   static function verRol(){
    include_once 'class.conexion.php';
       $con = new Conexion;
       $sql = "SELECT * FROM sicloud.rol";
       $r = $con->query($sql);
       return $r;   
   }// fin de lectura rol
   
   // metodo ver rol por id                   R
   static function verRolId($id){
    include_once 'class.conexion.php';
       $con = new Conexion;
       $sql = "SELECT * FROM sicloud.rol WHERE ID_rol_n = $id";
       $r = $con->query($sql);
       return $r;
   }// fin de ver rol por ID


   // Actualizar datos                       U
public function insertUpdateRol($id){ 
    include_once 'class.conexion.php';

        $con = new Conexion;
        $sql = "UPDATE sicloud.rol SET nom_rol = '$this->nom_rol'  WHERE ID_rol_n = $id";
        $ri = $con->query($sql);
     //   if($r){ echo "<script>alert('Se actualizo Rol exitioso');</script>"; echo "<script>window.location.replace('../forms/formRol.php');</script>"; }else{  echo "<script>alert('Error al actualizar rol ');</script>"; echo "<script>window.location.replace('../forms/formRol.php');</script>"; }
      
     if($ri){
         $_SESSION['message'] = "Se actualizo el rol";
         $_SESSION['color'] = "primary";

     }
     header("location: ../forms/formRol.php ");
    }// fin de insert update rol       
    
    
// Borrar rol                               D
static function eliminarRol($id){ 
    include_once 'class.conexion.php';
  

    $con = new Conexion;
    $sql1 = "SET FOREIGN_KEY_CHECKS = 0 ";
     $res =   $con->query($sql1);

    if($res){
        $sql2 = " DELETE FROM sicloud.rol WHERE ID_rol_n = $id  ";
        $res1 = $con->query($sql2); 
    }

    if($res1){
        $sql3 = "SET FOREIGN_KEY_CHECKS = 1";
        $res2 = $con->query($sql3);
    }

  
    //if($res2){ echo "<script>alert('Se elimino Rol exitioso');</script>"; echo "<script>window.location.replace('../forms/formRol.php');</script>"; }else{  echo "<script>alert('Error al eliminar rol ');</script>"; echo "<script>window.location.replace('../forms/formRol.php');</script>"; }
    if($res2){
        $_SESSION['message'] = "Se elimino el rol";
        $_SESSION['color'] = "danger";

    }else{}
    header("location:../forms/formRol.php ");
}



} // fin de clase rol





















?>