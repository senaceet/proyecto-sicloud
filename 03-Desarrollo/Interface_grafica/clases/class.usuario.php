<?php



//include 'class.conexion.php';
class Usuario
{
  // definicio de accesibilidad de  las varibles 
  protected $ID_us;
  protected $nom1;
  protected $nom2;
  protected $ape1;
  protected $ape2;
  protected $fecha;
  protected $pass;
  protected $foto;
  protected $correo;
  protected $FK_tipo_doc;

  // definicion de constructor //$_id =''
  public function __construct($_ID_us, $_nom1,  $_nom2, $_ape1, $_ape2, $_fecha, $_pass, $_foto, $_correo, $_FK_tipo_doc)
  {
    //creaccion de metodo this para utilizar las varibles desde otras clases
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
  static function ningunDato()
  {
    return new self('', '', '', '', '', '', '', '', '', '');
  }
  //---------------------------------------------------------------

  //fecha actual
  static function fechaActual()
  {
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = "SELECT CURDATE() as fecha";
    $dat =  $c->query($sql);
    $datos = $dat->fetch_assoc();
    $fecha =  $datos['fecha'];

    return $fecha;
  }


  // Actualzacion de datos por rol usuario---------------------------------------------------------
  public function insertUpdateUsuarioCliente($idg)
  {
    include_once 'class.conexion.php';
    include_once 'session/sessiones.php';
    $con = new Conexion;
    $sql1 = "SET FOREIGN_KEY_CHECKS = 0 ";
    $res =   $con->query($sql1);

    if ($res) {
      $sql2 = "UPDATE sicloud.usuario SET  nom1 = '$this->nom1' ,  nom2 = '$this->nom2' ,ape1 = '$this->ape1' , ape2 = '$this->ape2' , fecha = '$this->fecha'   , correo = '$this->correo'  WHERE  ID_us = '$idg' ";
      $res1 = $con->query($sql2);
    }

    if ($res1) {
      $sql3 = "SET FOREIGN_KEY_CHECKS = 1";
      $res2 = $con->query($sql3);
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
  public function insertUpdateUsuario($idg)
  {
    include_once 'class.conexion.php';
    $con = new Conexion;
    $sql1 = "SET FOREIGN_KEY_CHECKS = 0 ";
    $res =   $con->query($sql1);

    if ($res) {
      $sql2 = "UPDATE sicloud.usuario SET ID_us = '$this->ID_us',nom1 = '$this->nom1' ,  nom2 = '$this->nom2' ,ape1 = '$this->ape1' , ape2 = '$this->ape2' , fecha = '$this->fecha' , pass = '$this->pass' , foto = '$this->foto' , correo = '$this->correo' , FK_tipo_doc = '$this->FK_tipo_doc' WHERE  ID_us = $idg   ";
      $res1 = $con->query($sql2);
    }

    if ($res1) {
      $sql3 = "SET FOREIGN_KEY_CHECKS = 1";
      $res2 = $con->query($sql3);
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
  public function insertUsuario()
  {
    //Llama la conexion a la base de datos
    include_once 'class.conexion.php';
    $db_usuario = new Conexion();
    //Crea la consulta y la almasena en la varible $sql
    $sql = "INSERT INTO sicloud.usuario (ID_us,nom1,nom2,ape1,ape2,fecha,pass,foto,correo,FK_tipo_doc)VALUES('$this->ID_us ','$this->nom1','$this->nom2','$this->ape1','$this->ape2',' $this->fecha ','$this->pass','$this->foto','$this->correo','$this->FK_tipo_doc')";
    $db_usuario->query($sql);
    //if($db_usuario){ echo "<script>alert('Se a creado usuario');</script>" ;    echo "<script>window.location.remplace('../CU002-registrodeUsuario.php');</script>";} else { echo "<script>alert('Se a creado usuario');</script>";   echo "<script>window.location.remplace('../CU002-registrodeUsuario.php');</script>";  }
    // if($db_usuario ) {  $_SESSION['message'] = "Se creo usuario"; $_SESSION['color'] = "success";      } else {  $_SESSION['message'] = "Erro al crear usuario"; $_SESSION['color'] = "danger";} header("location: ../CU002-registrodeUsuario.php ");

  } //fin de la funcion insert------------------------------------------------------------------------


  // Muestra los datos en la tabla usuario
  public function selectUsuario()
  {
    include_once 'class.conexion.php';
    $db_usuario = new Conexion();
    // $sql = " SELECT * FROM usuario ";
    $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.fecha, U.pass, U.foto, U.correo, R_U.estado FROM sicloud.usuario U JOIN  rol_usuario R_U ON R_U.FK_us = ID_us ORDER BY R_U.estado desc ";
    $result = $db_usuario->query($sql);
    return $result;
  } // fin de muestra los datos de la tabla usuario



  // Incio de select usuario
  static function selectUsuarios($id)
  {
    include_once 'class.conexion.php';
    $c = new Conexion();
    $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, R.nom_rol, U.pass, U.foto, U.correo, R_U.estado , U.fecha
    FROM sicloud.usuario U JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
   JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n WHERE ID_us = $id ";
    $result = $c->query($sql);
    return $result;
  } // Fin de select usuario

  //ver usuario por un registro id
  static function verUsarioId($idg)
  {
    include_once 'class.conexion.php';
    $db_usuario = new Conexion();
    $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, R.nom_rol, U.pass, U.foto, U.correo, R_U.estado
    FROM sicloud.usuario U JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
   JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n WHERE ID_us = '$idg' ";
    $result = $db_usuario->query($sql);
    return $result;
  } // fin de busqueda por ID



  //busqueda por ID
  public function selectIdUsuario($id)
  {
    include_once 'class.conexion.php';
    $db_usuario = new Conexion();
    $sql = "SELECT distinct U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, R.nom_rol, U.pass, U.foto, U.correo, R_U.estado , R.nom_rol
    FROM sicloud.usuario U JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
   JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n WHERE ID_us = '$id' ";
    $result = $db_usuario->query($sql);
    return $result;
  } // fin de busqueda por ID


  //Busqueda por estado pendiente
  public function selectUsuariosPendientes($est)
  {
    include_once 'class.conexion.php';
    $db_usuario = new Conexion();
    $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, R.nom_rol, U.pass, U.foto, U.correo, R_U.estado
    FROM sicloud.usuario U JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
   JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n WHERE R_U.estado = '$est' ";
    $result = $db_usuario->query($sql);
    return $result;
  } //Busqueda por estado pendiente


  //aprobar solicitud
  static function activarCuenta($id)
  {
    include_once 'class.conexion.php';
    $conexion = new Conexion();
    $sql = " UPDATE sicloud.rol_usuario SET rol_usuario.estado = 1 WHERE rol_usuario.FK_us = $id ";
    $insert = $conexion->query($sql);
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
  static function desactivarCuenta($id)
  {
    include_once 'class.conexion.php';
    $conexion = new Conexion();
    $sql = " UPDATE sicloud.rol_usuario SET rol_usuario.estado = 0 WHERE rol_usuario.FK_us = $id ";
    $conexion->query($sql);
    // if($insert){ echo "<script>alert('Se desactivo cuenta');</script>";   echo "<script>window.location.replace('../CU009-controlUsuarios.php');</script>"; }else{ echo "<script>alert(no se ha activado');</script>"; echo "<script>window.location.remplace('../CU009-controlUsuarios.php');</script>"; } 
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
  static function DocPass($ID_us, $pass, $doc)
  {
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = " SELECT U.ID_us  , U.nom1 , U.nom2 , U.ape1 , U.ape2 , U.fecha , U.pass , U.foto , U.correo , TD.ID_acronimo  , RU.estado , R.ID_rol_n , R.nom_rol 
    FROM tipo_doc TD JOIN usuario U ON TD.ID_acronimo = U.FK_tipo_doc 
    JOIN rol_usuario RU ON U.ID_us = RU.FK_us 
    JOIN rol R ON FK_rol = R.ID_rol_n  WHERE U.ID_us =  '$ID_us' and U.pass = '$pass' and TD.ID_acronimo = '$doc' ";
    $result = $c->query($sql);
    return $result;
  } // fin de comprobar contraseña----------------------------------------------------------------------------------


  //---------------------------------------------------------------------------------------------------------------
  //Cambio de contraseña
  static function cambioPass($id,  $contraseñaNueva)
  {
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = "UPDATE usuario SET pass = '$contraseñaNueva' where ID_us = '$id'";
    // echo $sql;
    $r = $c->query($sql);
    if ($r) {
      $_SESSION['message'] = "Cambio contraseña";
      $_SESSION['color'] = "success";
    } else {
      $_SESSION['message'] = "Error al cambiar contraseña";
      $_SESSION['color'] = "danger";
    }
    //-------------------------------------------------------------------------
  }





  static function validarPass($id, $pass)
  {
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = "SELECT * from usuario where ID_us = '$id' and pass = '$pass'";
    $i = $c->query($sql);
    return $i;
  }



  // Comparar contraseña solo de tabla usuario
  static function DocPassU($ID_us, $pass)
  {
    include_once 'class.conexion.php';
    $c = new Conexion;
    //SELECT * FROM sicloud.usuario WHERE ID_us =  1030607384 and pass = 1030;
    $sql = "SELECT * FROM sicloud.usuario WHERE ID_us =  '$ID_us' and pass = '$pass' ";
    $result = $c->query($sql);
    return $result;
  } // fin de comparar contraseña de clase usuario


  // insertar foto
  static function inserTfoto($destino, $id)
  {
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = "UPDATE  usuario SET foto = ('$destino')
    where ID_us = '$id'";
    $e = $c->query($sql);
    if ($e) {
      header("location: ../CU002-registrodeUsuario.php ");
    }
  }


  // filtro por rol
  static function  selectUsuarioRol($r)
  {
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, R.nom_rol, U.pass, U.foto, U.correo, R_U.estado
    FROM sicloud.usuario U JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us
   JOIN sicloud.rol  R ON R_U.FK_rol = R.ID_rol_n
   WHERE R.ID_rol_n  = '$r'
   order by u.nom1 asc";
    $resultConsulta = $c->query($sql);
    // consulta para mensaje de rol 
    if ($resultConsulta) {
      include_once 'class.conexion.php';
      $c = new Conexion;
      $sql2 = "SELECT nom_rol from rol where ID_rol_n = $r limit 1";
      $datos  = $c->query($sql2);
      $row = $datos->fetch_assoc();
      $rol = $row['nom_rol'];
      $_SESSION['message'] = "Filtro por rol:  " . $rol;
      $_SESSION['color'] = "info";
      return $resultConsulta;
    }
  } // fin de metodo select usaurio



  // ver puntos usuario
  static function verPuntosUs()
  {
    include_once 'class.conexion.php';

    $c = new Conexion;
    $sql = "SELECT P.id_puntos, P.puntos, P.fecha , U.nom1 , U.nom2 , U.ape1
    from puntos P join usuario U ON  P.FK_us =  U.ID_us
    order by U.nom1 asc";
    $con = $c->query($sql);

    return $con;
  }

  static function verPuntosYusuario($id)
  {
    include_once 'class.conexion.php';
    $c = new Conexion;
    $sql = " SELECT U.ID_us  , U.nom1 , U.nom2 , U.ape1 , U.ape2 , U.fecha , U.pass , U.foto , U.correo , TD.nom_doc , RU.estado , R.ID_rol_n , R.nom_rol , P.puntos
    FROM tipo_doc TD JOIN usuario U ON TD.ID_acronimo = U.FK_tipo_doc 
    JOIN rol_usuario RU ON U.ID_us = RU.FK_us 
    JOIN rol R ON FK_rol = R.ID_rol_n JOIN puntos P ON U.ID_us = P.FK_us
    WHERE U.ID_us = '$id'";

    $con = $c->query($sql);
    return $con;
  }
}// fin de clase usaurio
