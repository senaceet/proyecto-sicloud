<?php

echo "hola";


//=======================================================
// Estructora MVC
// modelo
// factModelo.php
 //     class c_reportes {
 //        public $db;
 //        function __construct(){
 //           $_SESSION['s_sysIneditto'] = $_SESSION['s_vEmp'] = 'javier';
 //           require_once('incl/mySQLi.class.php');
 //           $this->db = new c_MySQLi($_SERVER['DOCUMENT_ROOT'] . '/incl/datos_conex5.php');
 //        }
 //        
 //        public function consultaJornada($id, $fIni, $fFin)
 //        {
 //             $sql = 'SELECT
 //                 LEFT(CONCAT(E.emp_nombre, " ", E.emp_apellidos), 15), 
 //                 I.fecha, 
 //                 I.tipo,  I.motivo,
 //                 CASE motivo 
 //                    WHEN 1 THEN "JORNADA" 
 //                    WHEN 2 THEN "ALMUERZO" 
 //                    WHEN 3 THEN "DESCANSO" 
 //                    WHEN 4 THEN "PERMISO" 
 //                    WHEN 5 THEN "CITA MEDICA" 
 //                    WHEN 6 THEN "LABOR EXTERNA" 
 //                    WHEN 7 THEN "HORAS EXTRAS" 
 //                    END,
 //                 "" , "" , "", ""
 //                 FROM dt_sys_ingresoLog  I 
 //                 LEFT JOIN dt_empleado E USING(id_empleado) 
 //                 WHERE I.fecha BETWEEN "'. $fIni.'" AND "'.$fFin.'" 
 //                 AND id_empleado = '.$id.' AND I.motivo >0
 //                 ORDER BY fecha , motivo';      
 //          return $this->db->m_trae_array($sql)->rows;   }
 //        
 //        
 //        public function consTiempos($id, $fIni, $fFin)
 //        {
 //          $sql = 'SELECT  LEFT(CONCAT(E.emp_nombre, "" , E.emp_apellidos), 15), 
 //                 DA.hora,  DA.periodo , "" , OI.referencia, DA.id_item, DA.seccion , CONCAT("TI / ", DSA.nombre), OI.nOrden
 //                 FROM dt_empleado E
 //                 LEFT JOIN dt_prod_avances DA USING(id_empleado)
 //                 LEFT JOIN dt_ordenes_items OI USING(id_item) 
 //                 LEFT JOIN dt_sys_ajustes DSA ON DSA.valor2 =  DA.seccion
 //                 WHERE DA.hora BETWEEN "'.$fIni.'" AND "'.$fFin.'" 
 //                 AND E.id_empleado = ' .$id.'
 //                 ORDER BY hora';
 //          return $this->db->m_trae_array($sql)->rows;
 //        }
 //     
 //        
 //        public function traeEmpleado()
 //        {
 //           $sql = "SELECT  
 //               id_empleado,   CONCAT( emp_nombre, ' ', emp_apellidos   )
 //               FROM dt_empleado E
 //               WHERE cargo_id IN ( 3, 5, 25, 24, 27, 43, 67, 76, 
 //                                  80, 85, 88, 89, 90, 94, 96, 97)
 //               ORDER BY emp_nombre";
 //           return $this->db->m_trae_array($sql)->rows;
 //        }
 //        
 //     }
 //     
//===================================================================
//Vista
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once('factModelo.php');
$objMod = new c_reportes;






//===============================================================================================
//  $totReg  = count($datos);
// $valor = str_replace(":", ",", $fecha);
//$nombreUsuarios = $objMod->traeEmpleado();
//foreach( $datos as $i => $d ){
//$arrTiem[] = [$d[4] ?? strtoupper($d[7]), $tIni, $tFin];
//foreach ($nombreUsuarios as $em) {
//    $sel = (isset($_GET['selectId']) && $_GET['selectId'] == $em[0]) ? ' selected' : '';
//$fecha = substr($jornada[$i+1][2], 0,10 );  
//$hora = substr($datos[$i][1], -9);  

// Comparar array
//echo "<div class = 'row' >";
//echo "<div class = 'row' >";
//echo "<div class = 'col-lg-4' >";
//echo "array cruzado tabla";
//$objMod->db->ver($tabla);
//echo "</div>";
//
//
//echo "<div class = 'col-lg-4' >";
//echo "array antes de conversion";
//$objMod->db->ver($arrTiem);
//echo "</div>";
//
//
//echo "<div class = 'col-lg-4' >";
//echo "array datos de db";
//$objMod->db->ver($datosI);
//echo "</div>";
//echo "</div>";
//

//crea arroglo
//foreach( $arrTiem as $i => $d ){
//    $arrTiem[$i] = [ $d[0], $d[1], $d[2], human_time($d[3]) ];
//}


// Cruce de array
// foreach( $arrTiem as $i => $d ){
//     {  
//         if( $datosI[$i][4] == ''){  $actividad =  $datosI[$i][7]; }
//         else{ $actividad =  $datosI[$i][4];  }
//         $tabla[$i] = [ $datosI[$i][8] , $datosI[$i][9], $actividad ,  
//         $arrTiem[$i][1] , $arrTiem[$i][2] , $arrTiem[$i][3] ];
//     }


// if Simplificado
// $actividad = ($datosI[$i][4] == ''? $datosI[$i][7] : $datosI[$i][4]);
// strlen($valor) cuenta el numero de digitos de un numero
// sort($array); ordena en forma decendente
// rsort($array); oredena de forma acendete
// str_word_count(Cadena) Cuenta el numero de palabras de una cadena
// strlen(Cadena); Obtiene el numero de caracteres de una cadena
//// strpos(Cadena1, Cadena2);</em></h4><br><hr>
//Para encontrar la posicion de la cadena2 dentro de la cadena1, si efectivamente la cadena 2 esta contenida
//en la cadena uno nos retorna el indice del primer caracter, si devuelve un numero mnegativo significa que no
//hay concidencia.

//<h4><em>str_replace(Cadena1, Cadena2, Cadena3);
//Busca dentro de la cadena3 la cadena1 y si la encuentra la remplaza por la cadena2
// explode(Cadena1, cadena2)</em></h4><br><hr>
//Utiliza la cadena 1 como separador para dividir la cadena2 genera un array de cadenas coon todo les fragmetnos obtenidos en la divicion

/*

public function calculaPromedio2($a){
        $accum = $id_venta=$countVentas=$totalVentas=$promedioGeneral=$promedio=$fin=$sumaVentas=0;
        foreach($a as $i => $d  ){
        $totalVentas += $d[2];    

            // Si el id de vendedor siguiente en la matriz existe y es igual a la posion actual
            if( isset($a[$i+1][1] ) && ($d[1] == $a[$i+1][1] )  ){
                $countVentas++;              
                $accum+= $d[2]; 
                if($id_venta <=0   ){  $id_venta =   $d[1];  }
                $ar[] =[ $d[0], $d[1], $d[7], $d[4], $d[2] , 0,0,'true' ];  
            // Si el id $i sub 1 + $i+1 no existes
            }else{
                $countVentas++;
                // Si existe id $i sub 1 en posision $i+1 pero no son iguales 
            $sumaVentas = ($accum + $d[2]);  
                   if(  $countVentas <=0){ $countVentas = 1;}{
                       if( $promedio <= 0 ){ $promedio = $d[2];  }else{( $promedio = $sumaVentas  /$countVentas);
                   }
                }
            $ar[] =[ $d[0], $d[1], $d[7], $d[4], $d[2], $sumaVentas, $promedio, 'else' ];  
            $this->promedioGeneral  =  $promedioGeneral += $promedio;
            $accum = $countVentas= $countVentas=0;
            echo $accum; 
        } 
       }
    $this->totalVentasDB    = $totalVentas;
    return $ar;
    }



*/


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card card-body col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body shadow">
                    <h5 class="card-title">Definicion</h5>
                    <p class="card-text">Permite guargar una colecicon de varibles similar al de otros lenguajes de programacion</p>
                    <p>Ejemplo de declaracion de un array <br> $medicion = [ 15, 43, 56 ] <br> var_dump($medicion) <br></p>
                    <div class="row">
                        <div class="col-lg-4 card">
                            <em>
                                <h4>Indexados: </h4><hr>
                            </em><br> Se utiliza el indice numero de la posisicion para acceder al valor asociado a ella: <br> 0,1,2 <br>
                            - Cada posicion tiene un indeice(de 0 a N) <br><br>
                            - Utilizamos el indice para: asignar, modificar o consultar el valor <br><br>
                            - Las dimenciones del array se modifican al asignar nuevos valores <br><br>
                            <hr>
                            <div class="my-2">
                            $medicacion1[0] = 16;<br>
                            $medicacion1[1] = 44;;<br>
                            $medicacion1[2] = 57;<br>
                           <em>//Agregar nuevo valor a la posicion;</em> <br>
                            $medicacion1[3] = -1;;<br>
                            echo ';<br>

                            print_r($medicacion1);;<br><hr>
                          
                    <?php
                    $medicacion = [15, 43, 56];
                    // modificar valores
                    $medicacion1[0] = 16;
                    $medicacion1[1] = 44;
                    $medicacion1[2] = 57;
                    // agregar nuevo valor a la posicion
                    $medicacion1[3] = -1;
                    echo '<pre>';
                    print_r($medicacion1);
                    echo '</pre>';

                    ?>
                
                        </div>

                        </div>
                        <div class="col-lg-4 card">
                            <em>
                                <h4>Asociativos: </h4><hr>
                            </em><br>
                            Se utiliza claves unicas para acceder a cada una de las posisiones
                            - Cada posicion tiene una clave unica, la clave es un valor que nosotros definimos,<br> "clave"=>"valor"
                            Similar a las tablas Hash en otros lenguajes. <br><hr>
                            $poblacion1 = ["Bogota" => 6.50, "Ibague" =>0.54, "Manizales=>0.42"];<br>
                          <em>// modificar valores</em>   <br>
                            $poblacion1["Bogota"]= 7.70; <br>
                            <em>// agregar nuevo valor en una posisicion</em> <br>
                            $poblacion1["Barranquilla"] = 1.21;<br>
                            var_dump($poblacion1);
                            // Consultar valores <br>
                            echo "Poblacion de Ibague": ". $poblacion1["Ibague"]."br";  <hr>


                            <?php
                            $poblacion1 =["Bogota"=>6.50, "Ibague" =>0.54, "Manizalez" => 0.42];
                            echo '<pre>'; print_r($poblacion1);
                            echo 'Poblacion de Ibague <br>';
                            echo $poblacion1["Ibague"];
                            ?>
                            </div>
                        <div class="col-lg-4 card">
                            <em>
                                <h4>Multidimencionales: </h4><hr>
                            </em>
                            Dentro de cada posicion contiene uno o mas arrays. <br>
                            Son los mas complejos, dentro de cada posicion pueden tener mas arrays, de las mismas o diferentes dimenciones. <hr>

                            $ciudad = ["Cartajena" => array("poblacion" =>array( <br>
                                "Poblacion"=>3.14,<br>
                                "Superficie" => 709,<br>
                                "Departameto" => "Bolivar"<br>

                            ),<br>
                            
                            "Florencia"=>array(<br>
                                "Poblacion" =>.15,<br>
                                "Superficie"=>2292,<br>
                                "Departamento"=>Caqueta",<br>
                                "Region"=>Amazonia"<br>
                            )];<br>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card card-body col-lg-10 my-2 mx-auto">
            <div class="card">
                <div class="card col-lg-3"><h4><em>Recorriendo array asosiativo</em></h4><hr>
                - Para recorrer estos arrays solemos utilizar un bucle foreach, pero de forma diferente a los aarays indexados, en este caso 
                recorremos las claver y los valores de cada posicion. <hr>
                   $poblacion2 = <br> ["Cali"=>2.21, "Medellin" => 2.44, "Pereira"=>0.93];<br>
                   foreach($poblacion2 as  $i => $v){
                       echo $i." : ".$valor.br;
                       <hr>Los elementos de estos 
                   }
                </div>
 
            </div>
        </div>
    </div>

    <div class="row mx-auto">
        <div class="col-lg-10 mx-auto card mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Funciones de array</h5> <a href="https://www.php.net/manual/es/book.array.php">Documetacion php ofcial</a>

                    <div class="row ">
                        <div class="col-lg-4 card">
                            <em>
                                <h4>Funcion count($array) </h4><hr>
                            </em><br>
                            - Cuenta el numero de elementos <br>
                            - Se puede recorrer el array con un for<br>
                            <div class="my-2">
                                $mediciones2 = array(13,27,37);<br>
                                $tam = count($mediciones2); <br>
                                for($i = 0; $i < $tam ; $i++){<br>
                                    echo $i ." : " . $mediciones2[$i] .'br'
                                    }
                            </div>
                        </div>
                        <div class="col-lg-4 card mx-auto">
                        <em>
                            <h4>Funcion sort($array) y rsort($array)</h4><hr>
                            Ordena los elementos de un array indexado de forma ascendente y decendente respectivamente. <br>
                            $mediciones3 = [43, 68, 55];<br>
                            rsort($mediciones3);<br>
                            'pre' print($mediciones);<br>
                            <h4><em>sort</em></h4><br><hr>
                            <?php
                            $medicacion3= [43, 68, 55];
                            sort($medicacion3);
                            echo '<pre>'; print_r($medicacion3);

                            ?>
                        </em><br>
                        <h4><em>rsort</em></h4><br><hr>
                            <?php
                            $medicacion3= [43, 68, 55];
                            rsort($medicacion3);
                            echo '<pre>'; print_r($medicacion3);

                            ?>
                        </em><br>
                            
                        </div>
                        <div class="col-lg-4 card">
                        <h4><em>$array = array_unique($array);</em></h4><hr>
                        Quitar los registros repetidos del array, el array debe de estar en este formato 
                        <br> $arrayTemp [] = $d[2] ; <hr>
                        <h4><em>$string = implode(' , ', $array);</em></h4><hr>
                        Convierte un array en un String separado en este caso por ,<hr>
                        <h4><em>$array = explode(' , ', $String);</em></h4><hr>
                        Convierte una cadena de texto en un array <br>ejemplo <br>
                        $String = 'hola','soy','Javier'; <br>
                        $array = explode(' , ', $String); <hr>
                        <?php
                        $String = 'hola , soy , Javier'; 
                        $array = explode(' , ', $String );
                        echo '<pre>'; print_r($array);
                        ?>
                        
                        <hr>
                        
                        <h4><em>bool = in_array();</em></h4><hr>
                        Verifica si hay un valor en un array eje  <hr> 
                        $array = [ 2, 4, 6, e];
                        e = in_array( "e" , $array); <br>
                        existe
                                            


                        
                        </div>
                    </div>
                    Funcionescadenas de texto <br>
                    <a href="https://www.php.net/manual/es/ref.strings.php">Manual php</a>
               
                    <div class="row">
                        <div class="col-lg-4  card ">
                        <h4><em>strlen(Cadena);</em></h4><br><hr>
                        Para obtener el numero de caracteres que hay en una cadena, los espacios en blanco tambien se cuentan. 
                        </div>
                        <div class="col-lg-4 card">
                        <h4><em>str_word_count(Cadena);</em></h4><br><hr>
                        Para obtener el numero de palabras que hay en una cadena,

                        </div>
                        <div class="col-lg-4 card">
                        <h4><em>strpos(Cadena1, Cadena2);</em></h4><br><hr>
                        Para encontrar la posicion de la cadena2 dentro de la cadena1, si efectivamente la cadena 2 esta contenida
                        en la cadena uno nos retorna el indice del primer caracter, si devuelve un numero mnegativo significa que no
                        hay concidencia.

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 card">
                        <h4><em>str_replace(Cadena1, Cadena2, Cadena3);</em></h4><br><hr>
                        Busca dentro de la cadena3 la cadena1 y si la encuentra la remplaza por la cadena2

                        </div>
                        <div class="col-lg-4 card">
                        <h4><em>substr($datosT[$i][1], 0,10 );</em></h4><br><hr>
                        Extra los pirmeros 10 caracteres de una cadena de texto
                        
                        </div>
                        <div class="col-lg-4 card">
                        <h4><em>explode(Cadena1, cadena2)</em></h4><hr>
                        Utiliza la cadena 1 como separador para dividir la cadena2 genera un array de cadenas coon todo les fragmetnos obtenidos en la divicion
                        </div>

                    

                    </div>
                    <div class="row">
                        <div class="col-lg-4 card">
                            <h4><em>str_repeat("-*",20)</em></h4><hr>
                            Repite un string

                        </div>
                        <div class="col-lg-4 card">
                            <h4><em>date()</em></h4>
                            echo("d/m/Y") <br>
                            echo("H/i/s") <br>
                            <hr>
                            Permite obtener fechas con diferentes formatos, se debe indicar el formato como parametro utilizando una serie de claves.

                        </div>
                        <div class="col-lg-4 card">
                            <h4><em>rand()</em></h4><hr>
                            Permite generar nuemros aleatorios, por defecto genera numeros entr 0 y getrandmax()
                            (numero maximo para aleatorios), tambien podemos establecer un minimo y un maximo.
                      </div>
                      </div>
                      <div class="row">
                      <div class="col-lg-4 card">
                            <h4><em>rand()</em></h4><hr>
                            Permite generar numeros aleatorios, por defecto genera numeros entr 0 y getrandmax()
                            (numero maximo para aleatorios), tambien podemos establecer un minimo y un maximo.
                      </div>
                      <div class="col-lg-4 card">
                            <h4><em>unset( $array[$i] )</em></h4><hr>
                            Elimina un array segun la posicion en $i.
                      </div>
                      <div class="col-lg-4 card">
                            <h4><em>strtotime($d[2])</em></h4><hr>
                            Transforma fechas y horas en segundos pra asi poder operar tiempos de manera correcta
                      </div>

                      <h5>Pruebas</h5><hr>
<?php
$array = [ 'hola', 'soy','array'    ];
echo '<pre>'; print_r($array) ;echo '</pre>';
$array = array_chunk($array, 2);
echo '<pre>'; print_r($array) ;echo '</pre>';

?>
                      
                      </div>
                </div>
            </div>
        </div>
    </div>
    </div>



</body>

</html>



<?php




// $arrayConteo  = array_count_values($array) 
// cuenta los valores repetidos de un array - devuelve un array con los valores correspondientes como llava el caracter que se repite
// $array = array_chunk($array, 2) // divide en varios arrays segun con cantidad de elementos que se defina en parametro 2
// $array = array_column($array, 'nombre'); // filtra todos los valores de la key del parametro 2 que esten contenidos en el array
// $array = array_diff_assoc($array1 , $array2  ) // compara dos array busca los que tienen la misma clave y el mismo valor y crea un nuevo array con los valores encontrados
// $array = array_fill(5, 6, 'banana');  // crea array y coloca en este caso en las key 5 y 6 el valor que tiene el parametro 2 "bana"
// $array = array_flip($array) devuelve un array dado la vuelta, es decir, las claves de array se convierten en valores y los valores de array se convierten en claves. 
// $array = array_intersect_assoc($array1, $array2)// toma array 1 como maestro y devuelve las coinsidencias  con el segundo array
// $array = array_intersect( $array ) // Retorna un array que contiene todos los valores de array1 cuyos valores existen en todos los par�metros. 
// $array = array_key_exists( $array ) // Verifica si el �ndice o clave dada existe en el array
// $array = array_key_first ( $array ) // Consigue la primera clave del array dado sin afectar el puntero de array interno. 
// $array = array_key_last($array) // Consigue ultima clave del array
// $string = end($array); Devuelve el valor del �ltimo elemento o FALSE si el array est� vac�o. 
// $array = array_keys ( $array ) Devuelve un array con todas las key de otro
// $array = array_merge($array1, $array2); // une dos array
// $array = array_multisort($array1, $array2) oredena varios arrays
// $array = array_pop($array )  // elimina el ultimo valor del array





?>
                            <option<?= $sel ?> value="<?= $em[0] ?>"><?= $em[1]; ?></option>
 <?php
// }












?>