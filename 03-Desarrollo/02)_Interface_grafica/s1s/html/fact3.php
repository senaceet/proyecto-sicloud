<?php
session_start();
$arrSint = ['dr'=>'Dificultad para respirar', 'dg'=>'Dolor de garganta', 'f'=>'Fiebre', 'pg'=>'P�rdida del gusto', 's'=>'Soltura', 't'=>'Tos'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-6  col-lg-4 my-4 mx-auto">
                <div class="card card-body shadow-lg my-2">
                    <h5 class="card-header shadow  my-2">Condiciones de salud</h5>
                    <div class="card-body">
                        <form method="GET">
                            <div class="row">
                                Lugar
                                <div class="form-group col-lg-4 ">
                                    <select class="form-control " name="selectId">
                                        <option value="0">Domicilio</option>
                                        <option value="1">Oficina</option>
                                    </select>
                                </div>
                            </div>
                            <div class="my-4">
                                <div class="col-lg-5 mx-auto">
                                    <label class="">Presenta sintomas: <br><br>

                                    </label>

                                </div>
                                <div>
                                    <div class="col-lg-11 col-md-12 mx-auto card card-body shadow-sm">
                                        <div class="row ">
                                            
<?
foreach ($arrSint as $i=>$v){
   echo '<label class="col-lg-6"><input name="sint[]" type="checkbox" value="'.$i.'"> '.$v.'</label>';
}
?>

                                            <textarea class="form-control my-2" placeholder="Observaciones" name="" id="" cols="20" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-center my-2">Temperatura</p>
                                <div class="form-group col-lg-6 col-md mx-auto"><input class="form-control" name="temp" value="" type="number" step="0.1">
                                </div>
                                <input class="btn btn-success btn-block" value="Enviar" type="submit">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
<script src="/js/bootstrap.min.js"></script>

</html>