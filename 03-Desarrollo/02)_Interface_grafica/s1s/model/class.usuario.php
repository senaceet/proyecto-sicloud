<?php

include_once 'class.conexion.php';
class Usuario extends Conexion
{
   // definicio de accesibilidad de  las varibles 
   protected $ID_us, $nom1, $nom2,  $ape1, $ape2, $fecha, $pass, $foto, $correo, $FK_tipo_doc, $db;   
   // definicion de constructor //$_id =''
   public function __construct($_ID_us, $_nom1,  $_nom2, $_ape1, $_ape2, $_fecha, $_pass, $_foto, $_correo, $_FK_tipo_doc)
   {
      //creaccion de metodo this para utilizar las varibles desde otras clases
      $this->db = Conexion::conexionPDO();
      $this->ID_us = $_ID_us;
      $this->nom1 = $_nom1;
      $this->nom2 = $_nom2;
      $this->ape1 = $_ape1;
      $this->ape2 = $_ape2;
      $this->fecha = $_fecha;
      $this->pass = $_pass;
      $this->foto = $_foto;
      $this->correo = $_correo;
      $this->FK_tipo_doc = $_FK_tipo_doc;
  }

  public function get_ID_us()
  {
    return $this->ID_us;
  }

  public function get_nom1()
  {
    return $this->nom1;
  }

  public function get_nom2()
  {
    return $this->nom2;
  }

  public function get_ape1()
  {
    return $this->nom2;
  }

  public function get_ape2()
  {
    return $this->nom2;
  }

  public function get_fecha()
  {
    return $this->fecha;
  }

  public function get_pass()
  {
    return $this->pass;
  }

  public function get_foto()
  {
    return $this->foto;
  }

  public function get_correo()
  {
    return $this->correo;
  }

  public function get_FK_tipo_doc()
  {
    return $this->FK_tipo_doc;
  }


  //esta funcion es totalmente accesible desde cualquier clase por ser static
  static function ningunDato(){
    return new self('', '', '', '', '', '', '', '', '', '');
  }


  public function insertUsuario( $array ){
   $sql = "INSERT INTO sicloud.usuario (ID_us,nom1,nom2,ape1,ape2,fecha,pass,foto,correo,FK_tipo_doc)
   VALUES(:ID_us,:nom1,:nom2,:ape1,:ape2,:fecha,:pass,:foto,:correo,:FK_tipo_doc')";
   $consulta=$this->db->prepare($sql);
   foreach( $array as $i => $d ){
   $consulta->bindValue(':ID_us',        $d[0]  );
   $consulta->bindValue( ':nom1',        $d[1]  );
   $consulta->bindValue( ':nom2',        $d[2]  );
   $consulta->bindValue( ':ape1',        $d[3]  );
   $consulta->bindValue( ':ape2',        $d[4]  );
   $consulta->bindValue( ':fecha',       $d[5]  );
   $consulta->bindValue( ':pass',        $d[6]  );
   $consulta->bindValue( ':foto',        $d[7]  );
   $consulta->bindValue( ':correo',      $d[8]  );
   $consulta->bindValue( ':FK_tipo_doc', $d[9]  );
   $result=$consulta->execute();
   if( $result ){
      return $array;
   }else{
      return false;
   }
}
  // echo $d[8];

  
   return $result;
}

  
  public function loginUsuarioModel($datosModel){
   $sql ="SELECT U.* , TD.ID_acronimo , 
   RU.estado , 
   R.ID_rol_n , R.nom_rol 
   FROM tipo_doc TD 
   JOIN usuario U ON TD.ID_acronimo = U.FK_tipo_doc 
   JOIN rol_usuario RU ON U.ID_us = RU.FK_us 
   JOIN rol R ON FK_rol = R.ID_rol_n  
   WHERE U.ID_us       =  :ID_us  
   AND U.pass          = :pass
   AND TD.ID_acronimo  = :ID_acronimo";
   //AND identificacion = :identificacion";
   $consulta = $this->db->prepare($sql);
   foreach($datosModel as $i =>  $d ){
      $consulta->bindValue( ':ID_us',       $d[0] );
      $consulta->bindValue( ':pass',        $d[1] );
      $consulta->bindValue( ':ID_acronimo', $d[2] );
   }
   $consulta->execute();
   $array = $consulta->fetchAll();
      if( $consulta->rowCount() > 0 ){
         return $array;
      }else{
         return false;
      }
   }

   public function readUsuarioModel(){
      $sql = 'SELECT * FROM usuario';
      $consulta = $this->db->prepare($sql);
      $consulta->execute();
      $result = $consulta->fetchAll();
      return $result;  
   }
   

   public function verUsuarios(){
      $sql = "SELECT distinct U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.pass, U.foto, U.correo, 
         R.nom_rol,  R.nom_rol,
         R_U.estado
         FROM sicloud.usuario U 
         JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
         JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n";
      $consulta = $this->db->prepare($sql);
      $consulta->execute();
      $result = $consulta->fetchAll();
      return $result;  
    } // fin de busqueda por ID
/*
   public function insertUpdateUsuario($idg){
      $sql1 = "SET FOREIGN_KEY_CHECKS = 0 ";
      $consulta1 = $this->db->prepare($sql1);  
      $res = $consulta1->execute();
      if($res){
         $sql2 = "UPDATE sicloud.usuario SET ID_us = '$this->ID_us',nom1 = '$this->nom1' ,  nom2 = '$this->nom2' ,ape1 = '$this->ape1' , ape2 = '$this->ape2' , fecha = '$this->fecha' , pass = '$this->pass' , foto = '$this->foto' , correo = '$this->correo' , FK_tipo_doc = '$this->FK_tipo_doc' WHERE  ID_us = $idg   ";

         $res1 = $this->db->query($sql2);
      }   
      if ($res1) {
         $sql3 = "SET FOREIGN_KEY_CHECKS = 1";
         $res2 = $this->db->query($sql3);
      }
      if ($res2) {
         $_SESSION['message'] = 'Se actualizo cuenta de usuario';
         $_SESSION['color'] = 'primary';
      } else {
         $_SESSION['message'] = 'Error no se cuenta de usuario';
         $_SESSION['color'] = 'danger';
      }

      }



      //Crea la consulta y la almasena en la varible $sql

         

   
  /*
  //---------------------------------------------------------------

  //fecha actual
  public function fechaActual(){
       $sql = "SELECT CURDATE() as fecha";
       $dat =  $this->db->query($sql);
       while ($row = $dat->fetch_assoc()) {
          $fecha = $row['fecha'];
       }
   
       return $fecha;
  }


  // Actualzacion de datos por rol usuario---------------------------------------------------------
  public function insertUpdateUsuarioCliente($idg){
     include_once 'session/sessiones.php';
     $sql1 = "SET FOREIGN_KEY_CHECKS = 0 ";
     $res =   $this->db->query($sql1);   
     if ($res) {
        $sql2 = "UPDATE sicloud.usuario SET  nom1 = '$this->nom1' ,  nom2 = '$this->nom2' ,ape1 = '$this->ape1' , ape2 = '$this->ape2' , fecha = '$this->fecha'   , correo = '$this->correo'  WHERE  ID_us = '$idg' ";
        $res1 = $this->db->query($sql2);
     }   
     if ($res1) {
        $sql3 = "SET FOREIGN_KEY_CHECKS = 1";
        $res2 = $this->db->query($sql3);
     }
     if ($res2) {
        $_SESSION['message'] = $_SESSION['usuario']['nom1'] . ' Actualizo datos';
        $_SESSION['color'] = 'success';
     } else {
        $_SESSION['message'] = 'Error al actualizar datos';
        $_SESSION['color'] = 'danger';
     }
  } //-------------------------------------------------------------------------------------------------------



  // actualizar datos de usario por administrador------------------------------------------------------------
  public function insertUpdateUsuario($idg){
     $sql1 = "SET FOREIGN_KEY_CHECKS = 0 ";
     $res =   $this->db->query($sql1);   
     if ($res) {
        $sql2 = "UPDATE sicloud.usuario SET ID_us = '$this->ID_us',nom1 = '$this->nom1' ,  nom2 = '$this->nom2' ,ape1 = '$this->ape1' , ape2 = '$this->ape2' , fecha = '$this->fecha' , pass = '$this->pass' , foto = '$this->foto' , correo = '$this->correo' , FK_tipo_doc = '$this->FK_tipo_doc' WHERE  ID_us = $idg   ";
        $res1 = $this->db->query($sql2);
     }   
     if ($res1) {
        $sql3 = "SET FOREIGN_KEY_CHECKS = 1";
        $res2 = $this->db->query($sql3);
     }
     if ($res2) {
        $_SESSION['message'] = 'Se actualizo cuenta de usuario';
        $_SESSION['color'] = 'primary';
     } else {
        $_SESSION['message'] = 'Error no se cuenta de usuario';
        $_SESSION['color'] = 'danger';
     }
  } // fin de update usuario----------------------------------------------------------------------------------


  // insersion a usuario------------------------------------------------------------------------------
  public function insertUsuario(){
    //Crea la consulta y la almasena en la varible $sql
    $sql = "INSERT INTO sicloud.usuario (ID_us,nom1,nom2,ape1,ape2,fecha,pass,foto,correo,FK_tipo_doc)
        VALUES('$this->ID_us ','$this->nom1','$this->nom2','$this->ape1','$this->ape2',' $this->fecha ','$this->pass','$this->foto','$this->correo','$this->FK_tipo_doc')";
    $this->db->query($sql);
 

  } //fin de la funcion insert------------------------------------------------------------------------


  // Muestra los datos en la tabla usuario
  public function selectUsuario(){
    $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.fecha, U.pass, U.foto, U.correo, R_U.estado 
        FROM sicloud.usuario U 
        JOIN  rol_usuario R_U ON R_U.FK_us = ID_us 
        ORDER BY R_U.estado desc ";
    $result = $this->db->query($sql);
    return $result;
  } // fin de muestra los datos de la tabla usuario



  // Incio de select usuario
  static function selectUsuarios($id){
    include_once 'class.conexion.php';
    $c = new Conexion();
    $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2,  U.pass, U.foto, U.correo,  U.fecha, 
       R.nom_rol, R_U.estado, R.ID_rol_n
       FROM sicloud.usuario U 
       JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
       JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n 
       WHERE ID_us = $id ";
    $result = $c->query($sql);
    return $result;
  } // Fin de select usuario

  //ver usuario por un registro id
  static function verUsarioId($idg){
    include_once 'class.conexion.php';
    $db_usuario = new Conexion();
    $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, R.nom_rol, U.pass, U.foto, U.correo, 
       R_U.estado
       FROM sicloud.usuario U 
       JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
       JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n 
       WHERE ID_us = '$idg' ";
    $result = $db_usuario->query($sql);
    return $result;
  } // fin de busqueda por ID



  //busqueda por ID
  public function selectIdUsuario($id){
    $sql = "SELECT distinct U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.pass, U.foto, U.correo, 
       R.nom_rol,  R.nom_rol,
       R_U.estado
       FROM sicloud.usuario U 
       JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
       JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n 
       WHERE ID_us = '$id' ";
    $result = $this->db->query($sql);
    return $result;
  } // fin de busqueda por ID


  public function verUsuarios(){
    $sql = "SELECT distinct U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.pass, U.foto, U.correo, 
       R.nom_rol,  R.nom_rol,
       R_U.estado
       FROM sicloud.usuario U 
       JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
       JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n";
    $result = $this->db->query($sql);
    return $result;
  } // fin de busqueda por ID


  //Busqueda por estado pendiente
  public function selectUsuariosPendientes($est){
    $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.pass, U.foto, U.correo,  
       R.nom_rol, 
       R_U.estado
       FROM sicloud.usuario U 
       JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
       JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n 
       WHERE R_U.estado = '$est' ";
    $result = $this->db->query($sql);
    return $result;
  } //Busqueda por estado pendiente


  //aprobar solicitud
  public function activarCuenta($id){
    $sql = " UPDATE sicloud.rol_usuario 
       SET rol_usuario.estado = 1 
       WHERE rol_usuario.FK_us = $id ";
    $insert = $this->db->query($sql);
    // if($insert){ echo "<script>alert('Se desactivo cuenta');</script>";   echo "<script>window.location.replace('../CU009-controlUsuarios.php');</script>"; }else{ echo "<script>alert(no se ha activado');</script>"; echo "<script>window.location.remplace('../CU009-controlUsuarios.php');</script>"; } 
    if ($insert) {
      $_SESSION['message'] = "Activo cuenta de usuario";
      $_SESSION['color'] = "success";
    } else {
      $_SESSION['message'] = "Error al activar cuenta";
      $_SESSION['color'] = "success";
    }
    header("location: ../CU009-controlUsuarios.php ");
  } // fin de aprbar solicitud

  //desactivar cuenta
  public function desactivarCuenta($id){
     $sql = " UPDATE sicloud.rol_usuario 
        SET rol_usuario.estado = 0 
        WHERE rol_usuario.FK_us = $id ";
     $conexion = $this->db->query($sql);
     if ($conexion) {
        $_SESSION['message'] = "Desactivo cuenta de usuario";
        $_SESSION['color'] = "danger";
     } else {
        $_SESSION['message'] = "Error al descativar cuenta";
        $_SESSION['color'] = "danger";
     }
     header("location: ../CU009-controlUsuarios.php ");
  } // fin de desactibar cuenta


  //Compara contraseña tabla usuario--------------------------------------------------------------------------
  public function DocPass($ID_us, $pass, $doc){
     $sql = " SELECT U.* , TD.ID_acronimo , 
        RU.estado , 
        R.ID_rol_n , R.nom_rol 
        FROM tipo_doc TD 
        JOIN usuario U ON TD.ID_acronimo = U.FK_tipo_doc 
        JOIN rol_usuario RU ON U.ID_us = RU.FK_us 
        JOIN rol R ON FK_rol = R.ID_rol_n  
        WHERE U.ID_us =  '$ID_us' 
        AND U.pass = '$pass' 
        AND TD.ID_acronimo = '$doc' ";
     $result = $this->db->query($sql);
     return $result;
  } // fin de comprobar contraseña----------------------------------------------------------------------------------


  //---------------------------------------------------------------------------------------------------------------
  //Cambio de contraseña
  public function cambioPass($id,  $contraseñaNueva){
     $sql = "UPDATE usuario 
        SET pass = '$contraseñaNueva' 
        WHERE ID_us = '$id'";
     // echo $sql;
     $r = $this->db->query($sql);
     if ($r) {
        $_SESSION['message'] = "Cambio contraseña";
        $_SESSION['color'] = "success";
     } else {
        $_SESSION['message'] = "Error al cambiar contraseña";
        $_SESSION['color'] = "danger";
     }
    //-------------------------------------------------------------------------
  }


  public function validarPass($id, $pass){
    $sql = "SELECT * FROM usuario 
       WHERE ID_us = '$id' 
       AND pass = '$pass'";
    $i = $this->db->query($sql);
    return $i;
  }


  // insertar foto
  public function inserTfoto($destino, $id){
     $sql = "UPDATE  usuario 
        SET foto = ('$destino')
        WHERE ID_us = '$id'";
     $e = $this->db->query($sql);
     ($e) ??  header("location: ../CU002-registrodeUsuario.php ");

  }


  // filtro por rol
  public function  selectUsuarioRol($r){
     $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.pass, U.foto, U.correo,
        R.nom_rol,  
        R_U.estado
        FROM sicloud.usuario U 
        JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
        JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n
        WHERE R.ID_rol_n  = '$r'
        ORDER BY u.nom1 asc";
     $resultConsulta = $this->db->query($sql);
     // consulta para mensaje de rol 
     if ($resultConsulta) {   
        $sql2 = "SELECT nom_rol FROM rol 
           WHERE ID_rol_n = $r 
           LIMIT 1";
        $datos  = $this->db->query($sql2);
        $row = $datos->fetch_assoc();
        $rol = $row['nom_rol'];
        $_SESSION['message'] = "Filtro por rol:  " . $rol;
        $_SESSION['color'] = "info";
        return $resultConsulta;
     }
  } // fin de metodo select usaurio



  // ver puntos usuario
  static function verPuntosUs(){
     include_once 'class.conexion.php';
     $c = new Conexion;
     $sql = "SELECT P.id_puntos, P.puntos, P.fecha , 
        U.nom1 , U.nom2 , U.ape1
        FROM puntos P 
        JOIN usuario U ON  P.FK_us =  U.ID_us
        ORDER BY U.nom1 asc";
     $con = $c->query($sql);   
     return $con;
  }

  static function verPuntosYusuario($id){
     include_once 'class.conexion.php';
     $c = new Conexion;
     $sql = " SELECT U.ID_us  , U.nom1 , U.nom2 , U.ape1 , U.ape2 , U.fecha , U.pass , U.foto , U.correo , 
     TD.nom_doc , 
     RU.estado , 
     R.ID_rol_n , R.nom_rol , 
     P.puntos
        FROM tipo_doc TD 
        JOIN usuario U ON TD.ID_acronimo = U.FK_tipo_doc 
        JOIN rol_usuario RU ON U.ID_us = RU.FK_us 
        JOIN rol R ON FK_rol = R.ID_rol_n 
        JOIN puntos P ON U.ID_us = P.FK_us
        WHERE U.ID_us = '$id'";   
     $con = $c->query($sql);
     return $con;
  }



  public function conteoUsuariosActivos(){
     $sql = "SELECT count(*) AS usuariosActivos 
        FROM usuario  U JOIN rol_usuario RU ON RU.FK_us = U.ID_us
        WHERE RU.estado = 1";
     $datos = $this->db->query($sql);
     while ($row = $datos->fetch_assoc()) {
        $con = $row['usuariosActivos'];
     }
     return $con;
  }


  public function conteoUsuariosInactivos(){
     $sql = "SELECT count(*) AS usuariosActivos 
        FROM usuario  U 
        JOIN rol_usuario RU ON RU.FK_us = U.ID_us
        WHERE RU.estado = 0";
     $datos = $this->db->query($sql);
     while ($row = $datos->fetch_assoc()) {
       $con = $row['usuariosActivos'];
     }
     return $con;
  }


  public function conteoUsuariosTotal(){
     $c = new Conexion;
     $sql = "SELECT count(*) AS usuariosActivos 
        FROM usuario  U 
        JOIN rol_usuario RU ON RU.FK_us = U.ID_us
     ";
     $datos = $this->db->query($sql);
     while ($row = $datos->fetch_assoc()) {
       $con = $row['usuariosActivos'];
       }
     return $con;
  }
}// fin de clase usaurio



*/

}

//$objMod = new Usuario();
//$objMod->insertUsuario( 1030 ,' nom1' ,'nom2','ape1','ape2','10-04-2020','pass','foto','correo','CC'  );
?>