<?php
include 'class.conexion.php';
class Usuario
{
      // definicio de accesibilidad de  las varibles 
          protected $ID_us;
          protected $nombre1;
          protected $nombre2;
          protected $apellido1;
          protected $apellido2;
          protected $fecha;
          protected $pass;
          protected $foto;
          protected $correo;
          protected $FK_tipo_doc;
          
      // definicion de constructor //$_id =''
          public function __construct($_id, $_nom1, $_nom2, $_ape1, $_ape2, $_fecha, $_pass, $_foto, $_correo,  $_FK_tipo_doc)
          {
            //creaccion de metodo this para utilizar las varibles desde otras clases
            $this->ID_us = $_id;
            $this->nombre1 = $_nom1;
            $this->nombre2 = $_nom2;
            $this->apellido1 = $_ape1;
            $this->apellido2 = $_ape2;
            $this->fecha = $_fecha;
            $this->pass = $_pass;
            $this->foto = $_foto;
            $this->correo = $_correo;
            $this->FK_tipo_doc = $_FK_tipo_doc;
          }


          //esta funcion es totalmente accesible desde cualquier clase por ser static
          static function ningunDato(){
            return new self('','','','','','','','','','');
          }


          public function insertUsuario(){
          //Llama la conexion a la base de datos
          $db = new Conexion();
        //Crea la consulta y la almasena en la varible $sql
        // ejemplo $sql = "INSERT INTO t_persona( nombre, apellido, email, telefono )VALUES ( '$this->nombre', '$this->apellido','$this->email','$this->telefono' )";

        $sql = "INSERT INTO sicloud.usuario (ID_us,nom1,nom2,ape1,ape2,fecha,pass,foto,correo,FK_tipo_doc)VALUES('$this->ID_us ','$this->nombre1','$this->nombre2','$this->apellido1','$this->apellido2',' $this->fecha ','$this->pass','$this->foto','$this->correo','$this->FK_tipo_doc')";
        //$db->query($sql) ? $m = 'insertado' : $m = 'Hubo un error ';
        //INSERSION A BASE DE DATOS DE LA SENTENCIA
        $db->query($sql);
        if($db->query($sql)){ echo "insertado" ; } else { echo "error de insercion";}
        }//fin de la funcion insert


      // por medio de esta funcionvisualiza los datos
      public function selectUsuario(){
        $db = new Conexion();
       // $sql = " SELECT * FROM usuario ";
        $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.fecha, U.pass, U.foto, U.correo, R_U.estado FROM sicloud.usuario U JOIN  rol_usuario R_U ON R_U.FK_us = ID_us ";
        // Sca realiza la consulta a la base de datos y la guarda es $result
        $result = $db->query($sql);
        return $result;
       }

       //busqueda por ID
        public function selectIdUsuario($id){
          $db = new Conexion();
          $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.fecha, U.pass, U.foto, U.correo, R_U.estado FROM sicloud.usuario U JOIN  rol_usuario R_U ON R_U.FK_us = ID_us WHERE ID_us = $id ";
          $result = $db->query($sql);
          return $result; }


        //Busqueda por estado pendiente
        public function selectUsuariosPendientes($est){ 
          $db = new Conexion();
          $sql = "SELECT U.FK_tipo_doc, U.ID_us, U.nom1, U.nom2, U.ape1, U.ape2, U.fecha, U.pass, U.foto, U.correo, R_U.estado FROM sicloud.usuario U JOIN  rol_usuario R_U ON R_U.FK_us = U.ID_us WHERE R_U.estado = $est";
          $result = $db->query($sql);
          return $result;
          print_r($result);

        }





}



?>