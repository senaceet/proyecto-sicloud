<?php

//Funcion que me permite exportar codigo HTML si repetir 
function inihtml(){?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="jav.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>web</title>
</head>
<body class="body-green">

  <?php } ?>



<?php
function form1(){ ?>
<!-- Plantilla formulario -->
<form action="par_inpar.php" method="POST">
                <div class = "form-group"><input class = "form-control" name ="num1" placeholder="Primer numero" type="number" step ="0.01"></div>
                <div class = "form-group"><button class ="form-control btn btn-primary" type="submit">Ingrese decimales</button></div>
            </form>
<?php  }?>


<?php 
function cardtitulo($x){ 
    $titulo = $x; 

    ?>

<div class ="container-pt-4"></div>
<div class = "card card-body col-md-4 text-center mx-auto bk-rgb "><h4><?php echo $titulo ?></h4>
</div><br><br>
<?php    
return $titulo;
}?>


<?php
function cardtituloS($x){
$titulo = $x;

?>
<div class = "col-md-8 mx-auto card card-body text-center bk-rgb"><h5><?php echo $titulo ?></h5>
</div><br><br>
<?php    
return $titulo;
}?>





  <?php
function finhtml(){?>
    <!-- Complementos bootstrap java script-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>