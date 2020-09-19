<?php




class c_reportes {
   public $db;
   function __construct(){
      $_SESSION['s_sysIneditto'] = $_SESSION['s_vEmp'] = 'javier';
      require_once('incl/mySQLi.class.php');
      $this->db = new c_MySQLi($_SERVER['DOCUMENT_ROOT'] . '/incl/datos_conex5.php');
   }
   
   public function consultaJornada($id, $fIni, $fFin)
   {
        $sql = 'SELECT
            LEFT(CONCAT(E.emp_nombre, " ", E.emp_apellidos), 15), 
            I.fecha, 
            I.tipo,  I.motivo, 
            CASE motivo 
               WHEN 1 THEN "JORNADA" 
               WHEN 2 THEN "ALMUERZO" 
               WHEN 3 THEN "DESCANSO" 
               WHEN 4 THEN "PERMISO" 
               WHEN 5 THEN "CITA MEDICA" 
               WHEN 6 THEN "LABOR EXTERNA" 
               WHEN 7 THEN "HORAS EXTRAS" 
               END,
            "" , "" , "", "", ""
            FROM dt_sys_ingresoLog  I 
            LEFT JOIN dt_empleado E USING(id_empleado) 
            WHERE I.fecha BETWEEN "'. $fIni.'" AND "'.$fFin.'" 
            AND id_empleado = '.$id.' AND I.motivo >0
            ORDER BY fecha , motivo';      
     return $this->db->m_trae_array($sql)->rows;   }
   
   
   public function consTiempos($id, $fIni, $fFin)
   {
    $sql = 'SELECT  LEFT(CONCAT(E.emp_nombre, "" , E.emp_apellidos), 15), 
    DA.hora,  DA.periodo , "" , OI.referencia, DA.id_item, DA.seccion , CONCAT("TI / ", DSA.nombre), OI.nOrden,
    DP.pedido
    FROM dt_empleado E
    LEFT JOIN dt_prod_avances DA USING(id_empleado)
    LEFT JOIN dt_ordenes_items OI USING(id_item) 
    LEFT JOIN dt_tipospedido DP USING(cod_pedido)
    LEFT JOIN dt_sys_ajustes DSA ON DSA.valor2 =  DA.seccion
    WHERE DA.hora BETWEEN "'.$fIni.'" AND "'.$fFin.'" 
    AND E.id_empleado = ' .$id.'
    ORDER BY motivo, hora';
     return $this->db->m_trae_array($sql)->rows;
   }

   
   public function traeEmpleado()
   {
      $sql = "SELECT  
          id_empleado,   CONCAT( emp_nombre, ' ', emp_apellidos   )
          FROM dt_empleado E
          WHERE cargo_id IN ( 3, 5, 25, 24, 27, 43, 67, 76, 
                             80, 85, 88, 89, 90, 94, 96, 97)
          ORDER BY emp_nombre";
      return $this->db->m_trae_array($sql)->rows;
   }
   

   public function TraeTodosLosDatos($id, $fIni, $fFin){
    $sql = 'SELECT
    LEFT(CONCAT(E.emp_nombre, " ", E.emp_apellidos), 15), 
            I.fecha, 
            I.tipo,  I.motivo, 
            CASE motivo 
               WHEN 1 THEN "JORNADA" 
               WHEN 2 THEN "ALMUERZO" 
               WHEN 3 THEN "DESCANSO" 
               WHEN 4 THEN "PERMISO" 
               WHEN 5 THEN "CITA MEDICA" 
               WHEN 6 THEN "LABOR EXTERNA" 
               WHEN 7 THEN "HORAS EXTRAS" 
               END,
            "" , "" , "", "", ""
            FROM dt_sys_ingresoLog  I 
            LEFT JOIN dt_empleado E USING(id_empleado) 
            WHERE I.fecha BETWEEN "'. $fIni.'" AND "'.$fFin.'" 
            AND id_empleado = '.$id.' AND I.motivo >0
            UNION
            SELECT  LEFT(CONCAT(E.emp_nombre, "" , E.emp_apellidos), 15), 
            DA.hora,  DA.periodo , "" , OI.referencia, DA.id_item, DA.seccion , CONCAT("TI / ", DSA.nombre), OI.nOrden,
            DP.pedido
            FROM dt_empleado E
            LEFT JOIN dt_prod_avances DA USING(id_empleado)
            LEFT JOIN dt_ordenes_items OI USING(id_item) 
            LEFT JOIN dt_tipospedido DP USING(cod_pedido)
            LEFT JOIN dt_sys_ajustes DSA ON DSA.valor2 =  DA.seccion
            WHERE DA.hora BETWEEN "'.$fIni.'" AND "'.$fFin.'" 
            AND E.id_empleado = ' .$id.'
            ORDER BY fecha , motivo';
    return $this->db->m_trae_array($sql)->rows;
   }



   public function consMaquinasT(){
      $sql = 'SELECT M.id_maquina,  
         CONCAT(T.id_tipoMaquina, " / ", T.nom_tipoMaquina, " - " , M.nombre_maquina),
         T.id_tipoMaquina
         FROM dt_cot_maquinas M 
         INNER JOIN dt_cot_tipoMaquina T USING(id_tipoMaquina)
         ORDER BY T.nom_tipoMaquina, nombre_maquina';
   return $this->db->m_trae_array($sql)->rows;
   }


    // c.maquina id  maquina
   public function consFechaMaquina($id, $fIni, $fFin, $campo){
    $sql = 'SELECT A.id_item, A.hora, A.periodo, "", C.maquina , M.nombre_maquina, A.f'.$campo.' , T.id_tipoMaquina
         FROM dt_ordenes_itemsC C
         INNER JOIN dt_prod_avances A USING(id_item)
         INNER JOIN dt_cot_maquinas M ON M.id_maquina = C.maquina
         INNER JOIN dt_cot_tipoMaquina T USING(id_tipoMaquina)
         WHERE C.maquina IN (' .$id.') 
         AND A.hora BETWEEN "'.$fIni.'" AND "'.$fFin.'" 
         ORDER BY maquina, hora ';
      
   return $this->db->m_trae_array($sql)->rows;}
   



//
   public function consFases($cod_pedido){
      //echo '<pre>'; print_r($cod_pedido) ; echo '</pre>';
     // $cod_pedido =  implode( ' ', $cod_pedido);
      
      echo $sql = 'SELECT cod_pedido, fase1, fase2, fase3, fase4, fase5, fase6, fase7, fase8  
         FROM dt_tipospedido
         WHERE cod_pedido = "'.$cod_pedido.'";
      return $this->db->m_trae_array($sql)->row;
   }
//
 

}

// nombre de maquina 
// dt_cot_maquinas.nombre_maquina

// dt_tipospedido
// Llave foranea  dt_tipospedido.cod_pedido


