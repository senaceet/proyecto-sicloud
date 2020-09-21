<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="jav.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
include_once '../plantillas/navN1.php';
?>


    <div class="container">
        <div id="result"></div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>



            
            $(document).ready(function(){ // funcion principal

           

                //OBTENIENDO DATOS
                function obtener_datos(){
                    $.ajax({
                        url: "mostrar_datos.php",// crea url
                        type: "POST", // declara el metodo
                        success: function(data){// pasa los datos que envian
                            $("#result").html(data)// captura el dato del id result mediante html lo que envien por data


                        }// fin de funcion data
                    })//fin de ajax
                }//fin de funcion obtener datos
                // se llama la funcion que se creo
                obtener_datos();
                 //OBTENIENDO DATOS

                



                 //AGREGAR DATOS
                 $(document).on("click", "#add", function(){  //cuando se haga un click al boton con id add crea una funcion
                    var nombre_add = $('#nombre_add').text();// captura los datos de la selda  de id #nombre_add
                  //alert(nombre_add);
                  $.ajax({
                        url: "insertar.php",// crea url
                        method: "POST",
                        data: {nombre_add},
                        success: function(data){// pasa los datos que envian
                        obtener_datos();
                           alert(data);
                 

                        }// fin de funcion data
                   })// fin de ajax


                 }// fin funcion 
                  )// fin de click en el boton con id add 






            });//fin de document

        </script>
    </div><!-- fin de container -->
    
</body>
</html>